<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("orders_access");

        $items = Order::query();
        $result['items'] = $this->filter($request, $items);
        return view('admin.orders.index')->with($result);
    }


    public function filter($request, $items)
    {
        if ($request->name) {
            $items = $items->where("name_en", 'LIKE', '%' . $request->name . '%')->orWhere("name_ar", 'LIKE', '%' . $request->name . '%');
        }

        if ($request->status) {
            $items = $items->where("status", $request->status);
        }

        if ($request->start_at and $request->end_at) {
            $from = $request->start_at;
            $to = $request->end_at;
            $items = $items->whereBetween('created_at', ["$from", "$to"]);
        } elseif ($request->start_at and !$request->end_at) {
            $from = $request->start_at;
            $items = $items->whereDate('created_at', ">", $from);
        } elseif (!$request->start_at and $request->end_at) {
            $to = $request->end_at;
            $items = $items->whereDate('created_at', "<", $to);
        } else {
            // skip ...
        }


        $items = $items->orderBy("id", "desc")->paginate(15);
        return $items;
    }

    public function create()
    {
        // $this->authorize("orders_create");

        return view('admin.orders.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "orders");
        }


        Order::create($data);

        return redirect()->route('admin.orders.index');
    }

    public function edit($id)
    {
        // $this->authorize("orders_edit");

        $result['item'] = Order::find($id);
        return view('admin.orders.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "orders");
        }


        $category = Order::find($id);
        $category->update($data);

        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        // $this->authorize("orders_delete");
        Order::findOrFail($id)->delete();
        return back();
    }

    public function products($order_id)
    {
        $items = OrderProduct::where("order_id", $order_id)->paginate(100);
        return view("admin.orders.products", compact("items"));
    }

}
