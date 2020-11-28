<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = ['shipping','subTotal','discount','total','address_id','payment','client_id','branch_id','coupon','city','street','street_description',"notes"];

    protected $appends = ['client_name' , 'client_phone', 'order_state', 'delivery_status', 'branch_name'];

    public function getClientNameAttribute()
    {
        $client = $this->client;
        return $client->first_name . " " . $client->last_name;
    }
    
    public function getClientPhoneAttribute()
    {
        $client = $this->client;
        return $client->phone;
    }
    
    public function getOrderStateAttribute()
    {
        $state = ($this->order_status_id == 1) ? 'جديد' : 'قديم' ;
        return $state;
    }
    
     public function getDeliveryStatusAttribute()
    {
        $delivery_status = \App\Models\OrderStatusTypeTranslation::find($this->order_status_type_id)->name_ar;
        return $delivery_status;
    }
    
     public function getBranchNameAttribute()
    {
        return $this->branch->branch_name_ar;
    }
    
    
    
    public function branch()
    {
        return $this->belongsTo(branches::class,'branch_id');
    }

    public function orderProduct()
    {
        return $this->hasMany(orderproducts::class,'order_id');
    }

    public function client()
    {
        return $this->belongsTo(clients::class,'client_id');
    }

    public function address()
    {
        return $this->belongsTo(client_addresses::class,'address_id');
    }

    public function orderHistory()
    {
        return $this->hasMany(order_histories::class,'order_id');
    }

    public function orderstatusType()
    {
        return $this->belongsTo(order_status_types::class,'order_status_type_id');
    }

     public function orderstatus()
    {
        return $this->belongsTo(order_statuses::class,'order_status_id');
    }

}
