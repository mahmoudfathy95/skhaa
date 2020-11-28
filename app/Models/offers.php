<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offers extends Model
{
    protected $fillable = ['user_id','city_id','branch_id','single_or_multi','offer_products','offer_main_image','offer_name','offer_name_ar','offer_from','offer_to'];

    protected $casts = [
        'offer_products' => 'array',
    ];
    
    protected $appends = ['type_name'];
    
    /*
    protected $appends = ['type_name', 'branch_name'];
    
    public function getBranchNameAttribute()
    {
        return \App\Models\branches::find($this->branch_id)->branch_name_ar;
    }
    */
    
    public function newProduct(){

        return $this->hasOne('\App\Models\products','id','product_id');
    }

    public function getOfferProdsAttribute()
    {
        $new_products = $this->offer_products;

        $arr = [];
        foreach ($new_products as $new_product) {
            $arr[] = \App\Models\products::find($new_product);
        }

        return $arr;
    }
    
    public function getTypeNameAttribute()
    {
        if($this->single_or_multi == 0){
            $type_name = "Single";
        }else{
            $type_name = "Multi";
        }

        return $type_name;
    }


}
