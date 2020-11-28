<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $fillable = ['user_id','city_id','branch_id','category_id','subcategory_id','product_name','product_name_ar','product_details','product_details_ar',
                            'product_price','product_number','barcode','product_unit','discount','views','product_main_image','product_images'];

    protected $casts = [
        'product_images' => 'array',
    ];
    
    protected $appends = ['quantity'];
    
    function getQuantityAttribute(){
        
        $request = request();
        
        $adminStatus = 0;
        
        if(auth()->user()){
            if(! auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
                $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                $branch_id = $user_branch[0]->branch_id;
            }else{
                $adminStatus = 1;
            }
            
        }else{
            $branch_id = $request->branch_id;
        }
        
        if($adminStatus){
            return 0;
        }else{
            $product_quantity = product_quantity::where('branch_id',$branch_id)->where('product_id',$this->id)->get();
            $quantity = $product_quantity[0]->quantity;
            return $quantity;
        }

    }
    
    
    public function measurementUnit()
    {
        return $this->belongsTo(units::class,'product_unit');
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class,'product_id')->select('id','name','comment','review');
    }

    public function discountOption()
    {
        return $this->hasOne(discounts::class,'product_id');
    }


}
