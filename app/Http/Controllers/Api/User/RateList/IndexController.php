<?php

namespace App\Http\Controllers\Api\User\RateList;

use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use App\ModulesConst\Paginate;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = ProductRating::where('user_id', $request->user()->id)->orderBy('id', 'desc')->paginate(Paginate::value)->getCollection();
        return $this->apiResponse($request, trans('language.rates'), $items, true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'rate' => 'required',
        ]);

        $rate = ProductRating::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if ($rate) {
            $rate->rate = $request->rate;
            $rate->save();
            return $this->apiResponse($request, trans('language.message'), $rate, true, 200);
        }
        $data['user_id'] = $request->user()->id;
        $rate = ProductRating::create($data);
        return $this->apiResponse($request, trans('language.message'), $rate, true);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $check = ProductRating::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if (!$check) {
            return $this->apiResponse($request, trans('language.no_data'), null, false, 400);
        }
        $check->delete();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
