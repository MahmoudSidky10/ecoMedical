<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("products_access");
        $items = Product::query();
        $categories = Category::where("parent_id", null)->get();
        $items = $this->filter($request, $items);
        return view('admin.products.index', compact('items', 'categories'));
    }

    public function filter($request, $items)
    {
        if ($request->category_id) {
            $items = Category::find($request->category_id)->latestQueryProducts();
        }

        if ($request->name) {
            $items = $items->where('name_ar', 'LIKE', '%' . $request->name . '%')
                ->orWhere('name_en', 'LIKE', '%' . $request->name . '%');
        }
        $items = $items->orderBy('id', 'desc')->paginate(10);
        return $items;
    }

    public function create()
    {
        // $this->authorize("products_create");
        $brands = Brand::all();
        return view('admin.products.create', compact("brands"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "stock_quantity" => "required|numeric",
            "name_ar" => "required",
            "price" => "required",
            "main_category_id" => "required",
        ], [
            "name_ar.required" => "لابد من ادخال اسم المنتج ",
            "price.required" => "لابد من ادخال سعر المنتج ",
            "main_category_id.required" => "لابد من ادخال قسم المنتج ",
            "stock_quantity.required" => "لابد من ادخال عدد المنتج في المخزن",
            "stock_quantity.numeric" => "لابد ان يكون العدد رقم",
        ]);

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if (!$request->category_id) {
            $data["category_id"] = $request->main_category_id;
        }
        $product = Product::create($data);
        // create product images ...
        if ($request->images) {
            foreach ($request->images as $img) {
                $data["image"] = $this->storeImage($img, "productImages");
                ProductImages::create([
                    "product_id" => $product->id,
                    "image" => $data["image"],
                ]);
            }
        }
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/products'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $this->authorize("products_edit");
        $item = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::where("parent_id", @$item->category->parent_id)->get();
        return view('admin.products.edit', compact('item', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }
        if ($request->name_en) {
            $data["slug"] = Str::slug($request->name_en);
        } else {
            $data["slug"] = Str::slug($request->name_ar);
        }

        if ($request->brand_id) {
            $data["brand_id"] = $request->brand_id;
        } else {
            $data["brand_id"] = null;
        }
        $item->update($data);
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/products'));
    }

    public function destroy($id)
    {
        // $this->authorize("products_delete");
        Product::findOrFail($id)->delete();
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/products'));
    }
}
