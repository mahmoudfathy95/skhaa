<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_statuses extends Model
{

    public function statusTrans()
    {
        return $this->belongsTo(OrderStatusTranslation::class,'order_status_id');
    }
}
