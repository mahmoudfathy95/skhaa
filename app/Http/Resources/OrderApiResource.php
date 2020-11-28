<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

use App\Models\OrderStatusTypeTranslation;
use App\Models\OrderStatusTranslation;

class OrderApiResource extends JsonResource
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
            
            "user"=>$this->client->first_name??null,
            /*"city"=>(App::isLocale('en')) ? $this->address->city->city_name??null : $this->address->city->city_name_ar??null,
            "street"=>$this->address->street??null,
            "description"=>$this->address->description??null,
            */
            "city"=> ($this->address) ? ((App::isLocale('en')) ? $this->address->city->city_name : $this->address->city->city_name_ar):$this->branch->city_name,
            "street"=> ($this->address) ? ((App::isLocale('en')) ? $this->address->street : $this->street):$this->branch->street,
            "description"=> ($this->address) ? ((App::isLocale('en')) ? $this->address->street_description : $this->street_description):$this->branch->street_description,
            "long"=>($this->address) ? $this->address->long : $this->branch->longtitude,
            "lat"=>($this->address) ? $this->address->lat : $this->branch->lat,
            //"long"=>$order->address->long??null,
            //"lat"=>$order->address->lat??null,
            "orderStatus_type"=> (App::isLocale('en')) ? OrderStatusTypeTranslation::find($this->orderstatusType->id)->name : OrderStatusTypeTranslation::find($this->orderstatusType->id)->name_ar,
            "orderStatus"=> (App::isLocale('en')) ? OrderStatusTranslation::find($this->order_status_id)->name : OrderStatusTranslation::find($this->order_status_id)->name_ar,
            //'orderStatus'=>$this->orderHistory[count($this->orderHistory)-1]->singlestatus->name,
            //"addressType"=>$this->address?($this->address->type==1?'home':'work'):null,
            "payment"=>$this->payment,
            "notes"=>$this->notes,
            //"order_type"=> ($this->address) ? "توصيل" : "استلام من الفرع",
            'order_date'=>date('Y-m-d H:i:s',strtotime($this->created_at))
        ];


        //return parent::toArray($request);
    }
}
