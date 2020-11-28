<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
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
            'first_name'=>$this->first_name??null,
            'last_name'=>$this->last_name??null,
            'email'=>$this->email??null,
            'phone'=>$this->phone,
            'city'=>$this->city?$this->city->city_name:null,
        ];
        //return parent::toArray($request);
    }
}
