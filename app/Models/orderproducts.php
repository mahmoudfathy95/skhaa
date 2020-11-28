<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderproducts extends Model
{
    protected $fillable = ['product_id','order_id','quantity','price','discount'];
    protected $table = 'orderproducts';

    public function product()
    {
        return $this->belongsTo(products::class,'product_id');
    }
}
