<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_histories extends Model
{
    protected $fillable = ['order_id','order_status_id','comment'];

    public function status()
    {
        return $this->belongsTo(order_statuses::class,'order_status_id');
    }

    public function singlestatus()
    {
        return $this->belongsTo(order_statuses::class,'order_status_id');
    }
}
