<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\App;

class Comment extends Model
{
    protected $fillable = ['comment','name','review','product_id'];

    protected $appends = ['product_name'];


    function getProductNameAttribute(){

        $request = request();
        if($request->has('locale')){
            App::setLocale($request->locale);
        }

        $product= \App\Models\products::find($this->product_id);
        if(is_object($product)){
            $product_name = (App::isLocale('en')) ? $product->product_name : $product->product_name_ar;
            return $product_name;
        }

        return $product;

    }


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
