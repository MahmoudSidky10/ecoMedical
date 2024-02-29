<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeSectionResource;
use App\Http\Resources\NewProductsResource;
use App\Models\Brand;
use App\Models\HomeSection;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomeSortSections(Request $request)
    {
        $items = HomeSection::where("record_state", 1)->orderBy("sort", "asc")->get();
        return $this->apiResponse($request, trans('language.sections'), HomeSectionResource::collection($items), true, 200);
    }

    public function sliders(Request $request)
    {
        $items = Slider::query()->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.sliders'), $items, true, 200);
    }

    public function brands(Request $request)
    {
        $items = Brand::query()->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.brands'), $items, true, 200);
    }

    public function newProducts(Request $request)
    {
        $items = Product::query()->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.newProducts'), NewProductsResource::collection($items), true, 200);
    }

    public function specialProducts(Request $request)
    {
        $items = Product::query()->where("is_deal_product", 1)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.newProducts'), NewProductsResource::collection($items), true, 200);
    }

    public function discountProducts(Request $request)
    {
        $items = Product::query()->where("price_sale", ">", 0)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.newProducts'), NewProductsResource::collection($items), true, 200);
    }

    public function popularProducts(Request $request)
    {
        $ids = ProductView::orderBy('id', "desc")->pluck("product_id");
        $items = Product::query()->whereIn("id", $ids)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.newProducts'), NewProductsResource::collection($items), true, 200);
    }
}
