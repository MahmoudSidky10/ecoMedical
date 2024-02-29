<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class subCategoryResource extends JsonResource
{

    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['image'] = url("/") . "/" . $this->image;
        $data['category'] = @MainCategory::make($this->parent);
        return $data;
    }
}
