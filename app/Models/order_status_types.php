<?php

namespace App\Models;

use App\Models\OrderStatusTypeTranslation;
use Illuminate\Database\Eloquent\Model;

class order_status_types extends Model
{
    public function typeTrans()
    {
        return $this->belongsTo(OrderStatusTypeTranslation::class,'order_status_type_id');
    }
}
