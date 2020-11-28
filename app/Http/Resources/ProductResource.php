<?php

namespace App\Http\Resources;

use App\Models\branches;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class ProductResource extends Resource
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
        
        if($this->discount)
        {
          if($this->discountOption->type==1)
          {
              $discount = $this->discountOption->value;
          }else
          {
            $discount = ($this->discountOption->value*$this->product_price)/100;
          }
        }else
        {
            $discount = 0;
        }
        
        $REVIEWS = $this->comments;
        $add_reviews=0;
        
        //dd($REVIEWS);
        
        if(count($REVIEWS) != 0){
            foreach($REVIEWS as $key)
            {
               $add_reviews = $add_reviews+$key->review;
            }
        }
        
        //$vat = Config::where('key','vat')->first();
        $branch = branches::find($this->branch_id);
        $vat = $branch->vat;
        
        if(count($this->product_images) != 0){
            $product_images =array_map(function($value) { return asset('uploads/'.$value); }, $this->product_images);
        }
        else{
            $product_images = [asset('uploads/'.$this->product_main_image)];
        }

        return [
            'id' => $this->id,
            'name' => (App::isLocale('en')) ? "$this->product_name" : "$this->product_name_ar",
            'description'=> (App::isLocale('en')) ? "$this->product_details" : "$this->product_details_ar",
            'price' => "$this->product_price",
            'quantity' => ($this->quantity != null) ? $this->quantity : "",
            'number' => "$this->product_number",//$this->product_number,
            'unit' => (App::isLocale('en')) ? $this->measurementUnit->name : $this->measurementUnit->name_ar,//($this->product_unit) ? $this->product_unit : "",
            'discount'=> $discount,
            'image'=> asset('uploads/'.$this->product_main_image),
            'images'=> $product_images,
            'reviews'=>(count($REVIEWS) != 0) ? $add_reviews/count($REVIEWS) : 0,
            'comments'=>$this->comments
        ];
        //return parent::toArray($request);
    }
}
