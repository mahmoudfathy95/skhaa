<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    protected $fillable = ['city_name_ar', 'city_name'];

    public function branches()
    {
        return $this->hasMany(branches::class,'city_id');
    }


}
