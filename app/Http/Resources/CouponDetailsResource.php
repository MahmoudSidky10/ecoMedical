<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponDetailsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'discount' => $this->discount,
            'max_using' => $this->max_using,
            'user_max_using' => $this->user_max_using,
            'record_state' => $this->record_state,
        ];
    }
}
