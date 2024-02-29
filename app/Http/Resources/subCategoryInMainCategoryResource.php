<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class subCategoryInMainCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['image'] = url("/") . "/" . $this->image;
        return $data;
    }
}
