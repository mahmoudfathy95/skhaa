<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['category_name_ar', 'category_name','category_image'];

    public function subs()
    {
        return $this->hasMany(sub_categories::class,'category_id');
    }


    public function products()
    {
        return $this->hasMany(products::class,'category_id');
    }


}
