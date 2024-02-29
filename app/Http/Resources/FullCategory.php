<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FullCategory extends JsonResource
{
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['image'] = url("/") . "/" . $this->image;
        $data['name'] = $this->name;
        $data['icon'] = $this->icon;
        $data['subCategories'] = subCategoryInMainCategoryResource::collection($this->childCategories);
        return $data;
    }

}
