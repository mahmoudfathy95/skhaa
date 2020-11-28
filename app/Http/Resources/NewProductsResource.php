<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

use App\Models\branches;
use App\Models\products;

class NewProductsResource extends Resource
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
        
        //$prods_arr = [];
        //foreach($this->new_products as $product_id){
            
            $product = products::find($this->product_id);
            
        
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
            
            $REVIEWS = $product->comments;
            $add_reviews=0;
            
            //dd($REVIEWS);
            
            if(count($REVIEWS) != 0){
                foreach($REVIEWS as $key)
                {
                   $add_reviews = $add_reviews+$key->review;
                }
            }
            
            //$vat = Config::where('key','vat')->first();
            $branch = branches::find($request->branch_id);
            $vat = $branch->vat;
    
            $prods_arr = [
                'id' => $product->id,
                'name' => (App::isLocale('en')) ? $product->product_name : $product->product_name_ar,
                'price' =>$product->product_price,
                'quantity' =>($product->quantity != null) ? $product->quantity : "",
                'number' => "$product->product_number",//$this->product_number,
                'unit' => $product->measurementUnit->name_ar??null,//($this->product_unit) ? $this->product_unit : "",
                'discount'=> $discount,
                'image'=>asset('uploads/'.$product->product_main_image),
            ];
            
        //}
        
        return $prods_arr;

        //return parent::toArray($request);
    }
}
