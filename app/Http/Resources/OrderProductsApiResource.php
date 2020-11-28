<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

use App\Models\products;

class OrderProductsApiResource extends JsonResource
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
        //$locale = App::getLocale();
        //dd($locale);
        //dd(__('users.firstname'));
        /*
        $product = products::find($this->product_id);
        
        if($product->discount)
        {
          if($product->discountOption->type==1)
          {
              $product = $product->discountOption->value;
          }else
          {
            $product = ($product->discountOption->value*$product->product_price)/100;
          }
        }else
        {
            $discount = 0;
        }
        */
        
        $product = products::where('id' , $this->product_id)->get()[0];
       //dd($product);
       $branch = \App\Models\branches::all();
      // dd($branch);
       $vat = $branch[0]->vat;
       $ret_vat = $vat;
        //dd($vat);
       if($product->discount)
        {
          if($product->discountOption->type==1)
          {
            $discount = $product->discountOption->value;
          }else
          {
            $discount = ($product->discountOption->value*$product->product_price)/100;
          }
        }else
        {
            $discount = 0;
        }
        //dd($vat);

        //$vat = ($product->product_price * $vat)/100;
        $divided_vat = (1 . "." . $vat);
        $vat = $product->product_price - ($product->product_price/$divided_vat);
        $vat = number_format((float)$vat, 2, '.', '');
        
        $price = ($product->product_price)-($discount);
        //$price = ($product->product_price+$vat)-($discount);
        //dd($price);

        return [
            //"lang"=>$request->locale,
            "id"=>$product->id,
            "quantity"=>$this->quantity,
            "price"=>$this->price, //"$price",
            "discount"=>$this->discount,
            "product_id"=>$this->product_id,
            "product"=>(App::isLocale('en')) ? $this->product->product_name : $this->product->product_name_ar,
            "vat"=>"$vat",
            "image"=>asset('uploads/'.$this->product->product_main_image)
        ];

        //return parent::toArray($request);
    }
}
