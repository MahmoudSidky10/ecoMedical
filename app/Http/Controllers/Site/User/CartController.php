<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\ClientAddress;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Paytabscom\Laravel_paytabs\Facades\paypage; 


class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where("user_id", Auth::id())->first();
        if ($cart) {
            $cartProducts = CartProduct::where("cart_id", $cart->id)->get();
        } else {
            $cartProducts = [];
        }
        return view("site.user.cart.index", compact("cart", "cartProducts"));
    }

    public function removeItemFromCartList(Request $request)
    {
        $item = CartProduct::find($request->item_id);
        if ($item) {
            $item->delete();
        }
        return response()->json();
    }

    public function storeItemIntoCart(Request $request)
    {
        // check if exist :-
        $checkCart = Cart::where("user_id", Auth::id())->first();
        if (!$checkCart) {
            $checkCart = Cart::create([
                "user_id" => Auth::id()
            ]);
        }

        $item = CartProduct::where("user_id", Auth::id())->where("product_id", $request->item_id)->first();
        $product = Product::find($request->item_id);
        $productPrice = $product->price_sale ? $product->price_sale : $product->price;
        $optionsPrice = 0;
        if ($request->optionsId) {
            foreach ($request->optionsId as $optionsId) {
                $optionsPrice += ProductOption::find($optionsId)->price;
            }
        }

        if (!$item) {
            CartProduct::create([
                "cart_id" => $checkCart->id,
                "user_id" => Auth::id(),
                "product_id" => $request->item_id,
                "count" => 1,
                "price" => $productPrice + $optionsPrice,
                "product_options" => json_encode($request->optionsId),
            ]);
            $data["status"] = "create";
        } else {
            $item->delete();
            $data["status"] = "delete";
        }
        return response()->json($data);
    }

    public function updateItemCountIntoCart(Request $request)
    {
        $item = CartProduct::find($request->item_id);
        $count = $request->count;
        $item->count = $count;
        $item->save();
        return response()->json();
    }

    public function store(Request $request)
    {
        $request->validate([
            "address_id" => "required"
        ]);

        $couponId = $request->couponId;

        $address = ClientAddress::find($request->address_id);
        $gov = Governorate::find($address->governorate_id);
        $delivery_cost = $gov ? $gov->delivery_cost : 0;
        $cart = Cart::where("user_id", Auth::id())->first();
        // get Cart info ...
        $items = CartProduct::where("user_id", Auth::id())->get();

        // Store steps :-
        $discount = 0;
        $subtotal = auth()->user()->cartListTotalPrice();
        if ($couponId) {
            $coupon = Coupon::find($couponId);
            $discount = ($coupon->discount / 100) * $subtotal;
            $subtotal = $subtotal - $discount;
        }

        $order = Order::create([
            "user_id" => Auth::id(),
            "governorate_id" => $request->address_id,
            "subtotal" => $subtotal,
            "total" => $subtotal + $delivery_cost,
            "delivery_cost" => $delivery_cost,
            "coupon_id" => $couponId,
            "coupon_discount" => $discount,
        ]);
        foreach ($items as $item) {
            OrderProduct::create([
                "order_id" => $order->id,
                "user_id" => Auth::id(),
                "product_id" => $item->product_id,
                "count" => $item->count,
                "price" => $item->price,
                "product_options" => $item->product_options,
            ]);

            // sub this count from product
            Product::find($item->product_id)->decrement('stock_quantity', $item->count);
        }

        // save this coupon to user using .
        if ($couponId) {
            CouponUser::create([
                "user_id" => Auth::id(),
                "coupon_id" => $couponId,
                "order_id" => $order->id,
            ]);
        }


        // Empty User Cart ..
        CartProduct::where("cart_id", $cart->id)->delete();
        $cart->delete();

        // return to invoice page
        return redirect()->route("user.cart.products.invoice", $order->guid);

    }

    public function invoice($order_guid)
    {
        $order = Order::where("guid", $order_guid)->first();
        $user = User::find($order->user_id);
        
        $return   = "";
        $callback = "";
        
        $pay = paypage::sendPaymentCode("mada")
            ->sendTransaction('sale','ecom')
            ->sendCart($order->id, (float)$order->total, $order->id)
            ->sendCustomerDetails($user->name, $user->email, $user->mobile, "street name", "city name", "state name", "country name", "123456", "12345678")
           // ->sendShippingDetails($same_as_billing, $name = null, $email = null, $phone = null, $street1= null, $city = null, $state = null, $country = null, $zip = null, $ip = null)
            ->sendHideShipping($on = false)
            ->sendURLs($return, $callback)
            ->sendLanguage("ar")
            ->sendFramed($on = false)
            ->create_pay_page(); // to initiate payment page


        return view("site.user.cart.checkout", compact("order",'pay'));
    }

}
