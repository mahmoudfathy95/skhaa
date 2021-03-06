<?php

namespace App\Http\Resources;

use App\Http\Resources\OrderProductsApiResource;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleOrderApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            "id"=>$this->id,
            "subTotal"=>"$this->subTotal",
            "discountCoupon"=>"$this->discount",
            "total"=>"$this->total",
            "user"=>$this->client->first_name,
            "city"=>(App::isLocale('en')) ? $this->address->city->city_name??null : $this->address->city->city_name_ar,
            "street"=>$this->address->street??null,
            "description"=>$this->address->description??null,
            "long"=>$this->address->long??null,
            "lat"=>$this->address->lat??null,
            "addressType"=>($this->address)?($this->address->type==1?'home':'work'):null,
            "payment"=>"$this->payment",
            //"orderStatus_type"=>$this->orderstatusType->name,
            //'orderStatus'=>$this->orderHistory[count($this->orderHistory)-1]->singlestatus->name,
            "date"=>$this->created_at->format('Y-m-d'),
            "shipping"=>$this->shipping,
            'products'=>OrderProductsApiResource::collection($this->orderProduct)
        ];

        //return parent::toArray($request);
    }
}
