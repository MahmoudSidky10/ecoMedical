<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainCategory extends JsonResource
{
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['icon'] = $this->icon;
        $data['image'] = url("/") . "/" . $this->image;
        return $data;
    }
}
