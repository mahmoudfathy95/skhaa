<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone','status','code','city_id','api_token','firebase_token'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['client_name','city_name','orders_count','orders_total_price','last_order_date'];


    public function getClientNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
  
 
    public function getCityNameAttribute()
    {
        $city_name = ($this->city_id != null) ? $this->city->city_name_ar : '';
        return $city_name;
    }
    

    public function getOrdersCountAttribute()
    {

        $orders_count = \App\Models\orders::where('client_id',$this->id)->get()->count();
        return $orders_count;

    }
    
    public function getOrdersTotalPriceAttribute()
    {
        $orders = \App\Models\orders::where('client_id',$this->id)->get();
        $total = $orders->sum('total');
        return $total;
    }
    
    public function getLastOrderDateAttribute()
    {
        $orders_count = \App\Models\orders::latest()->where('client_id',$this->id)->get()->count();
        if($orders_count != 0){
            $order = \App\Models\orders::latest()->where('client_id',$this->id)->first();
            $created_at = $order->created_at->format('m/d/Y');
        }else{
            $created_at = "";
        }
        return $created_at;
    }


    public function addresses()
    {
        return $this->hasMany(client_addresses::class);
    }
    
     public function orders()
    {
        return $this->hasMany(orders::class,'client_id');
    }

    public function city()
    {
        return $this->belongsTo(cities::class,'city_id');
    }

    public function favouriteAddress()
    {
        return $this->belongsToMany(favorite_addresses::class, 'favorite_addresses','client_id','address_id');
    }


}
