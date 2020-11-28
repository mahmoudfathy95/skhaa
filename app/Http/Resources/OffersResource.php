<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class OffersResource extends Resource
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
        $arr = [];
        foreach ($this->offer_prods as $product) {

            $arr[] = [
                'id' => $product->id,
                'name' => (App::isLocale('en')) ? "$product->product_name" : "$product->product_name_ar",
                'description'=> (App::isLocale('en')) ? "$product->product_details" : "$product->product_details_ar",
                'price' => "$product->product_price",
                'quantity' => ($product->product_quantity) ? $product->product_quantity : "",
                'number' => "55",//$this->product_number,
                'unit' => ($product->product_unit) ? $product->product_unit : "",
                'discount'=> $product->discount,
                'image'=> asset('uploads/'.$product->product_main_image),
                'images'=>array_map(function($value) { return asset('uploads/'.$value); }, $product->product_images),
            ];
        };

        return [
            'id' => $this->id,
            'name' => (App::isLocale('en')) ? $this->offer_name : $this->offer_name_ar,
            'details' => (App::isLocale('en')) ? $this->offer_details : $this->offer_details_ar,
            'price' => $this->offer_price,
            'from' => $this->offer_from,
            'to' => $this->offer_to,
            'image' => asset('uploads/'.$this->offer_main_image),
            'type' => ($this->single_or_multi == 1)? 'Multi':'single',
            'singleProductId' => $this->single_or_multi == 1? '': $arr[0],
            //'products' => $arr ,
        ];

        //return parent::toArray($request);
    }
}
