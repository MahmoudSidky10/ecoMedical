<?php

namespace App\Http\Controllers\Api\User\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\WishList;
use App\ModulesConst\Paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = CartProduct::where('user_id', $request->user()->id)->get();
        return $this->apiResponse($request, trans('language.cart'), $items, true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'count' => 'required',
            'productOptions' => 'required', // [1,2,3] => if it null  ..
        ]);

        // check if exist :-
        $checkCart = Cart::where("user_id", Auth::id())->first();
        if (!$checkCart) {
            $checkCart = Cart::create([
                "user_id" => Auth::id()
            ]);
        }

        $check = CartProduct::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if ($check) {
            $check->count = $request->count;
            $check->product_options = $request->productOptions;
            $check->update();
            return $this->apiResponse($request, trans('language.message'), null, true, 200);
        } else {
            CartProduct::create([
                "cart_id" => $checkCart->id,
                "user_id" => Auth::id(),
                "product_id" => $request->product_id,
                "count" => $request->count,
                "price" => $request->price,
                "product_options" => $request->productOptions,
            ]);
        }
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $check = CartProduct::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        $check->delete();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

    public function clear(Request $request)
    {
        CartProduct::where('user_id', $request->user()->id)->delete();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }


}
