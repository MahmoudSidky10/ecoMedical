<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponDetailsResource;
use App\Http\Resources\NewProductsResource;
use App\Http\Resources\ProductDetailResource;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Product;
use App\ModulesConst\Paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function categoryProducts(Request $request)
    {
        $request->validate([
            "category_id" => "required"
        ]);
        $items = Product::where("category_id", $request->category_id)->paginate(Paginate::value)->getCollection();
        return $this->apiResponse($request, trans('language.products'), NewProductsResource::collection($items), true);
    }

    public function searchProducts(Request $request)
    {
        $request->validate([
            "keyword" => "required"
        ]);
        $items = Product::where("name_ar", 'LIKE', '%' . $request->keyword . '%')->orWhere("name_en", 'LIKE', '%' . $request->keyword . '%')->paginate(Paginate::value)->getCollection();
        return $this->apiResponse($request, trans('language.products'), NewProductsResource::collection($items), true);
    }

    public function details(Request $request)
    {
        $request->validate([
            "product_id" => "required"
        ]);
        $item = Product::find($request->product_id);
        return $this->apiResponse($request, trans('language.product_details'), ProductDetailResource::make($item), true);
    }

    public function couponDetails(Request $request)
    {
        $request->validate([
            "code" => "required"
        ]);
        $item = Coupon::where("code", $request->code)->where("record_state", 1)->whereDate('starts_at', '<=', date('Y-m-d'))->whereDate('expires_at', '>', date('Y-m-d'))->first();

        if (!$item) {
            return $this->apiResponse($request, trans('language.no_data'), null, false, 400);
        }

        $usingCount = CouponUser::where("coupon_id", $item->id)->count();
        if ($usingCount >= $item->max_using) {
            return $this->apiResponse($request, trans('Using count error'), null, false, 400);
        }

        $usingCountForUser = CouponUser::where("coupon_id", $item->id)->where("user_id", Auth::id())->count();
        if ($usingCountForUser > $item->user_max_using) {
            return $this->apiResponse($request, trans('One user Using count error'), null, false, 400);
        }

        return $this->apiResponse($request, trans('language.done'), CouponDetailsResource::make($item), true);
    }
}
