<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $fillable = ['value','type','date_from','date_to','code'];
}
