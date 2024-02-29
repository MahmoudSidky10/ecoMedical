<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductsResource extends JsonResource
{
    public function toArray($request)
    {
        $data['id'] = $this->product_id;
        $data['image'] = url("/") . "/" . $this->product->image;
        $data['name'] = $this->product->name;
        $data['categoryName'] = @$this->product->category->name;
        $data["count"] = $this->count;
        $data["price"] = $this->price;
        $data["product_options"] = $this->product_options_return;
        return $data;
    }
}
