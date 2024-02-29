<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Product $product)
    {
        $result["product"] = $product;
        $result["items"] = ProductImages::where("product_id", $product->id)->paginate(15);
        return view("admin.products.images.index")->with($result);
    }

    public function create($product_id)
    {
        return view("admin.products.images.create", compact("product_id"));
    }

    public function store(Request $request, $product_id)
    {
        if ($request->image) {
            $data["image"] = $this->storeImage($request->image, "productImages");
            ProductImages::create([
                "product_id" => $product_id,
                "image" => $data["image"],
            ]);
        }
        toast(trans('language.done'), 'success');
        return redirect(url("/admin/products/$product_id/images"));
    }

    public function destroy($product_id, $id)
    {
        ProductImages::findOrFail($id)->delete();
        toast(trans('language.done'), 'success');
        return redirect(url("/admin/products/$product_id/images"));
    }
}
