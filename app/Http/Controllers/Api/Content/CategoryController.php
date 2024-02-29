<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Http\Resources\FullCategory;
use App\Http\Resources\MainCategory;
use App\Http\Resources\subCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(Request $request)
    {
        $items = Category::query()->where("parent_id", null)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.categories'), FullCategory::collection($items), true, 200);
    }

    public function index(Request $request)
    {
        $items = Category::query()->where("parent_id", null)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.mainCategories'), MainCategory::collection($items), true, 200);
    }

    public function subCategories(Request $request)
    {
        $request->validate([
            "category_id" => "required"
        ]);

        $items = Category::query()->where("parent_id", $request->category_id)->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.mainCategories'), subCategoryResource::collection($items), true, 200);
    }
}
