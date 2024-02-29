<?php

namespace App\Http\Controllers\Api\User\WishList;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use App\ModulesConst\Paginate;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = WishList::where('user_id', $request->user()->id)->orderBy('id', 'desc')->paginate(Paginate::value)->getCollection();
        return $this->apiResponse($request, trans('language.wishlist'), $items, true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
        ]);

        $check = WishList::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if ($check) {
            return $this->apiResponse($request, trans('language.exist'), null, false, 400);
        }
        $data['user_id'] = $request->user()->id;
        WishList::create($data);
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $check = WishList::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if (!$check) {
            return $this->apiResponse($request, trans('language.no_data'), null, false, 400);
        }
        $check->delete();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }


}
