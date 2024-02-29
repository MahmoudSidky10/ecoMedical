<?php

namespace App\Http\Controllers\Api\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\ClientAddress;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = Order::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        return $this->apiResponse($request, trans('language.orders'), $items, true);
    }

    public function store(Request $request)
    {
        $request->validate([
            "address_id" => "required"
        ]);
        $address = ClientAddress::find($request->address_id);
        $gov = Governorate::find($address->governorate_id);
        $cart = Cart::where("user_id", Auth::id())->first();
        // get Cart info ...
        $items = CartProduct::where("user_id", Auth::id())->get();
        if (count($items) == 0) {
            return $this->apiResponse($request, trans('language.no_data'), null, false, 400);
        }

        // Store steps :-
        $order = Order::create([
            "user_id" => Auth::id(),
            "governorate_id" => $request->address_id,
            "subtotal" => auth()->user()->cartListTotalPrice(),
            "total" => auth()->user()->cartListTotalPrice() + $gov->delivery_cost,
            "delivery_cost" => $gov->delivery_cost,
            "coupon_id" => $cart->coupon_id,
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
        }

        // Empty User Cart ..
        CartProduct::where("cart_id", $cart->id)->delete();
        $cart->delete();
        return $this->apiResponse($request, trans('language.order_details'), $order, true);
    }

    public function show(Request $request)
    {
        $request->validate([
            "order_id" => "required"
        ]);
        $order = Order::find($request->order_id);
        return $this->apiResponse($request, trans('language.order_details'), $order, true);
    }
}
