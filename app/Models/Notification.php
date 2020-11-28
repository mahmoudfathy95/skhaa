<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['product_id','client_id','order_id','title','message','status'];

    public function client()
    {
        return $this->belongsTo(clients::class,'client_id');

    }
}
