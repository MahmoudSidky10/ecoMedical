<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetController extends Controller
{
    public function slug()
    {
        $products = Product::get();
        foreach ($products as $product) {
            if ($product->name_en) {
                $data["slug"] = Str::slug($product->name_en);
            } else {
                $data["slug"] = Str::slug($product->name_ar);
            }
            $product->update($data);
        }

        $categories = Category::get();
        foreach ($categories as $category) {
            if ($category->name_en) {
                $data["slug"] = Str::slug($category->name_en);
            } else {
                $data["slug"] = Str::slug($category->name_ar);
            }
            $category->update($data);
        }
        
        dd("slugs updated successfully");
    }
}
