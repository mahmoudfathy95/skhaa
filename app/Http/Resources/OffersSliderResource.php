<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OffersSliderResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'slider_name'=>$this->slider_name,
            'image'=>asset('uploads/'.$this->image),
        ];


        //return parent::toArray($request);
    }
}
