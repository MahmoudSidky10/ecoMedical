<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductProperty;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(Product $product)
    {
        $result["product"] = $product;
        $result["items"] = ProductOption::where("product_id", $product->id)->paginate(15);
//        $result["items"] = ProductOption::where("product_id", $product->id)->get();
        $result["categories"] = ProductProperty::all();
        $result["options"] = ProductOption::all()->pluck('title', 'id');
        return view("admin.products.options.index")->with($result);
    }

    public function create($product_id)
    {
        $items = ProductProperty::all();
        return view("admin.products.options.create", compact("product_id", "items"));
    }

    public function store(Request $request, $product_id)
    {
        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $data["product_id"] = $product_id;
        ProductOption::create($data);

        return redirect(url("/admin/products/$product_id/options"));
    }

    public function edit($product_id, $id)
    {
        // $this->authorize("products_edit");
        $items = ProductProperty::all();
        $item = ProductOption::find($id);
        return view('admin.products.options.edit', compact("item", "product_id", "items"));
    }

    public function update(Request $request, $product_id, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $category = ProductOption::find($id);
        $category->update($data);

        return redirect(url("/admin/products/$product_id/options"));
    }


    public function destroy($product_id, $id)
    {
        ProductOption::findOrFail($id)->delete();
        toast(trans('language.done'), 'success');
        return redirect(url("/admin/products/$product_id/options"));
    }
}
