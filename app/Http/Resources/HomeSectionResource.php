<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeSectionResource extends JsonResource
{
    public function toArray($request)
    {
        $data["id"] = $this->category_id;
        $data["design"] = @$this->design_id;
        $data["name"] = @$this->section->name;
        $data["sectionProducts"] = NewProductsResource::collection($this->section->latestTenProducts());
        return $data;
    }
}
