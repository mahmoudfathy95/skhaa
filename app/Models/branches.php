<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class branches extends Model
{
    protected $fillable = ['city_id','branch_name_ar', 'branch_name', 'branch_email','lat','longtitude','street','street_description', 'branch_phone', 'free_shipping', 'vat'];

    protected $appends = ['city_name'];


    function getCityNameAttribute(){

        $request = request();
        if($request->has('locale')){
            App::setLocale($request->locale);
        }
        
        $city= \App\Models\cities::find($this->city_id);
        if(is_object($city)){
            $city_name = (App::isLocale('en')) ? $city->city_name : $city->city_name_ar;
            return $city_name;
        }
            
        return $city;

    }

    public function city(){
        return $this->belongsTo(cities::class,'city_id');
    }


}
