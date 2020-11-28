<?php

namespace App\Http\Resources;


use App\Models\favorite_addresses;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class ClientAddressResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($request->has('locale')){
            App::setLocale($request->locale);
        }

        return [
            'id'=>$this->id,
            'branch_id'=>$this->branch_id,
            'city'=> (App::isLocale('en')) ? $this->city->city_name : $this->city->city_name_ar,
            'shipping_amount'=> 5,//$this->city->shipping_amount,
            'street'=>$this->street,
            'description'=>$this->description,
            'long'=>$this->long,
            'lat'=>$this->lat,
            'type'=>$this->type,//$this->type==1? 'home' : 'work',
            'favourite'=>favorite_addresses::where('address_id',$this->id)->first()? 'yes': 'no',
        ];

        //return parent::toArray($request);
    }
}
