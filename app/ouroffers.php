<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ouroffers extends Model
{
    protected $fillable = ['user_id','city_id','branch_id','single_or_multi','ouroffer_products'];
    //protected $fillable = ['user_id','city_id','branch_id','single_or_multi','ouroffer_products','ouroffer_main_image','ouroffer_name','ouroffer_name_ar'];

    protected $casts = [
        'ouroffer_products' => 'array',
    ];
    
    //protected $appends = ['branch_name'];
    /*
    public function getBranchNameAttribute()
    {
        return \App\Models\branches::find($this->branch_id)->branch_name_ar;
    }
    */
    public function getOurOfferProdsAttribute()
    {
        $new_products = $this->ouroffer_products;

        $arr = [];
        foreach ($new_products as $new_product) {
            $arr[] = \App\Models\products::find($new_product);
        }

        return $arr;
    }


/*
    public function getOurOfferProductAttribute()
    {
        $ouroffer_product = $this->ouroffer_products;
        $product = \App\Models\products::find($ouroffer_product);

        return $product;
    }
*/

}
