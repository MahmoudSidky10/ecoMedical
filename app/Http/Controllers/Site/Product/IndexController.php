<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductProperty;
use App\Models\ProductView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function show($slug)
    {
        $item = Product::where("slug", $slug)->with('category')->with("images")->first();
        if (!$item) {
            return redirect()->route("site.home");
        }
        $next = Product::find($item->id + 1) ?? null;
        $prev = Product::find($item->id - 1) ?? null;
        $randProducts = Product::query()->with('category')->with("images")->inRandomOrder()->take(4)->get();

        // view function ..
        if (Auth::check()) {
            ProductView::create([
                "user_id" => Auth::id(),
                "product_id" => $item->id,
            ]);
        }

        $isHasSale = $item->price_sale ? 1 : 0;

        return view("site.product.details", compact("item", 'next', "prev", "randProducts", "isHasSale"));
    }

    public function offerProducts(Request $request)
    {
        $products = Product::whereNotNull('price_sale');

        if ($request->category_id) {
            $products = $products->where("category_id", $request->category_id);
        }

        if ($request->orderby && $request->orderby != "default") {

            if ($request->orderby == "price-low") {
                $products = $products->orderBy("id", "asc");
            }

            if ($request->orderby == "price-high") {
                $products = $products->orderBy("id", "Desc");
            }

        }

        if ($request->count) {
            $products = $products->paginate($request->count);
        } else {
            $products = $products->paginate(10);
        }

        $categories = Category::all();
        return view("site.product.offer-products", compact("products", 'categories'));
    }

    public function categoryProducts($id, $slug, Request $request)
    {

        $category = Category::where("id", $id)->first();
        if (!$category) {
            abort(404);
        }

        if ($category->parent_id == null) {
            $categorySubs = Category::where("parent_id", $category->id)->pluck("id");
            if (count($categorySubs) > 0) {
                $products = Product::whereIn("category_id", $categorySubs);
            } else {
                $products = Product::where("category_id", $category->id);
            }

        } else {
            $products = Product::where("category_id", $category->id);
        }

        if ($request->orderby && $request->orderby != "default") {

            if ($request->orderby == "price-low") {
                $products = $products->orderBy("id", "asc");
            }

            if ($request->orderby == "price-high") {
                $products = $products->orderBy("id", "Desc");
            }

        }

        if ($request->count) {
            $products = $products->paginate($request->count);
        } else {
            $products = $products->paginate(10);
        }


        return view("site.product.category-products", compact("category", "products"));
    }
}
