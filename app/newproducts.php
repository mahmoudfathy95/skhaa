<?php

namespace App;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;

class newproducts extends Model
{
    
    protected $fillable = ['user_id','product_id','new_products'];
    //protected $fillable = ['user_id','city_id','branch_id','name','product_id','new_products'];

    protected $casts = [
        'new_products' => 'array',
    ];
    
    /*
    protected $appends = ['branch_name'];
    
     public function getBranchNameAttribute()
    {
        return \App\Models\branches::find($this->branch_id)->branch_name_ar;
    }
    */

    public function newProduct(){

        return $this->hasOne('\App\Models\products','id','product_id');
    }
    

    public function getNewProdsAttribute()
    {
        /*
        $product_id = $this->product_id;
        $new_product = \App\Models\products::find($product_id);
        */
        
        $new_products = $this->new_products;
        
        $arr = [];
        foreach ($new_products as $new_product) {
            $product = \App\Models\products::find($new_product);
            if(! empty($product)){
                $arr[] = $product;
            }
            
        }
        
        return $arr;
    }


}
