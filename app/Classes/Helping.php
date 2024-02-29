<?php


namespace App\Classes;

use App\Product;
use Auth;
use Carbon\Carbon;

class Helping
{
    public function getProductByBarcode($barcode)
    {
        $product = Product::where('barcode', $barcode)
            ->user();

        return $product->first();
    }

    static function getProductDetails($product_id)
    {
        $product = Product::where('id', $product_id);
        return $product->first();
    }


    static function getProductsByBarcodeOrNameQuery($barcode, $operator = 'like')
    {
        return Product::query()->where(function ($query) use ($barcode, $operator) {
            $query->where('name_ar', 'like', '%' . $barcode . '%')
                ->orWhere('name_en', 'like', '%' . $barcode . '%');
        });

    }

    public function getCustomersForCurrentUser()
    {
        $customers = Customer::query();

        if (!isSuperUser(user())) {
            $customers = $customers->user();
        }

        return $customers->pluck('name', 'id');
    }

    public function getSuppliersForCurrentUser()
    {
        $suppliers = Supplier::query();

        if (!isSuperUser(user())) {
            $suppliers = $suppliers->user();
        }

        return $suppliers->pluck('name', 'id');
    }


    public function getInvoiceDetails($invoice_id)
    {
        return \DB::select("select * from invoice_details where invoice_id = " . $invoice_id);
    }

    public function createProduct($product, $supplier_id, $isUpdate = false)
    {
        $product_quatntiy = 0;

        if ($isUpdate) {
            $product_quatntiy = Helping::getProductByBarcode($product[0])->quantity;
            $product_price_sale = Helping::getProductByBarcode($product[0])->price_for_sale;

        }

        Product::updateOrCreate(
            [
                'barcode' => $product[0],
            ],
            ['name' => $product[1],
                'price_for_sale' => $product_price_sale,
                'original_price' => $product[2],
                'quantity' => $product[3] + $product_quatntiy,
                'user_id' => user()->id,
                'supplier_id' => $supplier_id,
                'created_at' => Carbon::now()
            ]);
    }

    public function getCountModelForCurrentUser($model)
    {
        $instance = new $model();

        $instance = $instance->query()
            ->user()->get();

        return $instance->count();
    }

    public function createInvoice($data, $invoiceable_type, $payment_id = null)
    {
        $invoice = Invoice::create([
            'invoiceable_id' => $data['invoiceable_id'],
            'Invoiceable_type' => $invoiceable_type,
            'total' => $data['total_amount'],
            'discount' => $data['discount'] ?? 0,
            'total_after_discount' => $data['total_after_discount'],
            'conditions' => $data['conditions'],
            'payment_id' => $payment_id,
        ]);

        $table = 'customers';

        if ($invoiceable_type == Supplier::class) {
            $table = 'suppliers';
        }


        $invoice->invoice_number_user = Invoice::query()
                ->withTrashed()
                ->join($table, function ($joinCustomers) use ($invoiceable_type, $table) {
                    $joinCustomers->on('invoices.invoiceable_id', "$table.id")
                        ->where('invoices.invoiceable_type', $invoiceable_type);
                })->where("$table.user_id", user()->id)
                ->max('invoice_number_user') + 1 ?? 1;


        $invoiceable = $invoice->Invoiceable_type::query()->where('id', $invoice->invoiceable_id)->first();
        $invoice->current_balance = $invoiceable->balance;

        if ($invoiceable_type == Supplier::class) {
            $invoiceable->balance -= $data['total_after_discount'];
        } else {
            $invoiceable->balance += $data['total_after_discount'];
        }

        $invoiceable->save();
        $invoice->save();

        return $invoice->id;
    }

    public function createInvoiceDetail($detail, $invoice_id)
    {
        $product = $this->getProductByBarcode($detail[0]);

        \DB::table('invoice_details')->insert([
            'product_barcode' => $detail[0],
            'product_name' => $detail[1],
            'price_for_sale' => $detail[2],
            'original_price' => $product->original_price,
            'quantity' => $detail[3],
            'total' => $detail[4],
            'invoice_id' => $invoice_id,
            'created_at' => Carbon::now(),
        ]);
    }


    protected function getTotalRevenueForCurrentUser()
    {
//        $sales_amount = Invoice::query()
//            ->userCustomers()
//            ->where('invoiceable_type', Customer::class)
//            ->sum('invoices.total_after_discount');

        $payments_amount = Payment::query()
            ->join('invoices', 'invoices.payment_id', 'payments.id')
            ->customersAndSuppliers()
            ->where('payments.payment_type', 'qbd')
            ->sum('payments.amount');


        $payments_without_invoices_ids = Payment::query()
            ->join('invoices', 'invoices.payment_id', 'payments.id')
            ->customersAndSuppliers()
            ->where('payments.payment_type', 'qbd')->pluck('payments.id')->toArray();


        $payments_without_invoices_amount = Payment::query()
            ->customersAndSuppliers()
            ->where('payments.payment_type', 'qbd')
            ->whereNotIn('payments.id', $payments_without_invoices_ids)
            ->sum('payments.cash');

        $total = $payments_amount + $payments_without_invoices_amount;

        return $total;
    }

    protected function getTotalExpenditureForCurrentUser()
    {
        $payments_amount = Payment::query()->customersAndSuppliers()
            ->where('payments.payment_type', 'srf')
            ->sum('payments.cash');

        $total = $payments_amount;

        return $total;
    }

    public function getUserBalance()
    {
        return $this->getTotalRevenueForCurrentUser() - $this->getTotalExpenditureForCurrentUser();
    }

    public function getLatestInvoices($limit = 3)
    {
        $invoices = Invoice::query()->customersAndSuppliers()->take($limit)->get();

        return $invoices;
    }

    public function getLatestPayments($limit = 3)
    {
        $payments = Payment::query()->customersAndSuppliers()->take($limit)->get();

        return $payments;
    }

    public function getExpenses()
    {
        $payments_amount = Payment::query()
            ->where('payments.paymentable_type', \App\Models\User::class)
            ->where('payments.paymentable_id', user()->id)
            ->sum('payments.cash');
        return $payments_amount;
    }

    public function getProductsFor($user)
    {
        if (is_null($user)) {
            $user = user();
        }
        $products = Product::query()->where('user_id', $user->id)->pluck('name');

        return $products;
    }

    /**
     * @param Carbon $fromDate
     * @param Carbon $toDate
     * @param string $invoiceableType
     * @return mixed
     */
    public function getUserRevenue(Carbon $fromDate, Carbon $toDate, $invoiceableType = Customer::class)
    {
        return \App\Models\Invoice::query()
            ->join('customers', function ($joinCustomers) use ($invoiceableType) {
                $joinCustomers->on('customers.id', 'invoices.invoiceable_id')
                    ->where('invoices.invoiceable_type', $invoiceableType);
            })->join('invoice_details', function ($joinInvoiceDetails) {
                $joinInvoiceDetails->on('invoices.id', 'invoice_details.invoice_id');
            })->selectRaw("sum(  (invoice_details.total - (invoice_details.original_price * invoice_details.quantity) ) - invoices.discount) as revenue")
            ->groupBy('invoices.id')
            ->whereBetween('invoices.created_at', [$fromDate->startOfDay()->toDateTimeString(), $toDate->endOfDay()->toDateTimeString()])
            ->where('customers.user_id', user()->id)
            ->pluck('revenue')
            ->sum();
    }

    /**
     * @return mixed
     */
    public function getWarnedProducts()
    {
        return user()->products()
            ->whereColumn('products.quantity', '<=', 'products.warn_me_when_quantity_is')
            ->where('products.warn_me_when_quantity_is', '>=', 0)
            ->get();

    }

    /**
     * @return int|mixed
     */
    public function getMaxPaymentUserNumber()
    {
        return Payment::query()
                ->leftJoin('customers', function ($joinCustomers) {
                    $joinCustomers->on('payments.paymentable_id', "customers.id")
                        ->where('payments.paymentable_type', Customer::class);
                })->leftJoin('suppliers', function ($joinSuppliers) {
                    $joinSuppliers->on('payments.paymentable_id', "suppliers.id")
                        ->where('payments.paymentable_type', Supplier::class);
                })
                ->where("customers.user_id", user()->id)
                ->orWhere('suppliers.user_id', user()->id)
                ->max('payment_number_user') + 1 ?? 1;
    }
}
