<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'value' => $this->value,
            'type' => $this->type,
            'from' => $this->date_from,
            'to' => $this->date_to,
        ];
        //return parent::toArray($request);
    }
}
