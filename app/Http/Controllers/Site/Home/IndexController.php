<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSection;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $brands = Brand::whereHas("products")->with("products")->get();
        $sliders = Slider::all();
        $topCategories = Category::where('parent_id', null)->get();
        $homeSections = HomeSection::where("record_state", 1)->with("section")->orderBy("sort", "asc")->get();
        return view("site.home.index", compact('brands', 'homeSections', 'sliders', 'topCategories'));
    }

    public function subscribeStore(Request $request)
    {
        $check = Subscribe::where("email", $request->email)->first();
        if (!$check) {
            Subscribe::create([
                'email' => $request->email
            ]);
        }
        return redirect()->route("subscribe.thanks");
    }

    public function subscribeThanks()
    {
        return view("site.home.subscribe");
    }

    public function search(Request $request)
    {
        $products = Product::query();

        if ($request->name) {
            $products->where('name_ar', 'LIKE', '%' . $request->name . '%')
                ->orWhere('name_en', 'LIKE', '%' . $request->name . '%');
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


        return view("site.product.search-products", compact("products"));
    }
}
