<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
    protected $fillable = ['value','type','product_id'];

    public function product()
    {
        return $this->belongsTo(products::class,'product_id');
    }
}
