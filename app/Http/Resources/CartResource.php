<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->discount)
       {
           if($this->discountOption->type == 1)
           {
               $discount = $this->discountOption->value;
           }else
           {
              $discount = ($this->discountOption->value * $this->product_price)/100;
           }

       }else
       {
           $discount = 0;
       }
       //$vat = Config::where('key','vat')->first()->value;
       if($request->has('locale')){
            App::setLocale($request->locale);
        }

       return [
           'id'=>$this->id,
           'name'=> (App::isLocale('en')) ? $this->product_name : $this->product_name_ar,
           //'price'=>$this->price+$this->price*$vat/100,
           'price'=>$this->product_price,
           'availableQuantity'=>$this->quantity,
           'number'=>"$this->product_number",
           //'unit'=>$this->measurementUnit->name??null,
           'unit'=>(App::isLocale('en')) ? $this->measurementUnit->name : $this->measurementUnit->name_ar,//$this->product_unit??null,
           'available'=>$this->avaliable,
           'quantity'=>$this->sendquantity,
           'discount'=>$discount,
           'image'=>asset('uploads/'.$this->product_main_image)
       ];
   }
}
