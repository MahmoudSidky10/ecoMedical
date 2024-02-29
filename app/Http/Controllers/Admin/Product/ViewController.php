<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Product $product)
    {
        $result["product"] = $product;
        $result["items"] = ProductView::where("product_id", $product->id)->paginate(15);
        return view("admin.products.views.index")->with($result);
    }
}
