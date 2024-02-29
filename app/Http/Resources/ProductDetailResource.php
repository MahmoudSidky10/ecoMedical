<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['image'] = url("/") . "/" . $this->image;
        $data['name'] = $this->name;
        $data['categoryName'] = @$this->category->name;
        $data['price'] = $this->price;
        $data['cost'] = $this->cost;
        $data['sale'] = $this->price_sale;
        $data['salePrice'] = $this->sale_cost;
        $data['salePercentage'] = $this->SalePercentage();
        $data['rate'] = $this->rate;
        // is action
        $data["isFavourite"] = $this->isFavourite();
        $data["isInCart"] = $this->isInCart();
        $data["isInCompare"] = $this->isInCompare();
        // list
        $data['images'] = $this->images;
        $data['properties'] = $this->optionsList();

        
        return $data;
    }
}
