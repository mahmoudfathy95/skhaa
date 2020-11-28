<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FavouriteAddressResource extends Resource
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
            'address_id'=>$this->address->id,
            'city'=>$this->address->city->city_name,
            'shipping_amount'=>5,//$this->address->city->shipping_amount,
            'street'=>$this->address->street,
            'description'=>$this->address->description,
            'long'=>$this->address->long,
            'lat'=>$this->address->lat,
            'type'=>$this->address->type,//$this->address->type==1? 'home' : 'work',
        ];
        //return parent::toArray($request);
    }
}
