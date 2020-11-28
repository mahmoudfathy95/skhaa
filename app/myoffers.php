<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myoffers extends Model
{
    protected $fillable = ['user_id','city_id','branch_id','offer_name','offer_name_ar','type','parent','image'];
}
