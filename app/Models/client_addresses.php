<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client_addresses extends Model
{

    protected $fillable = ['client_id','city_id','zone_id','street','description','long','lat','branch_id','type'];

    public function city()
    {
        return $this->belongsTo(cities::class);
    }

    public function zone()
    {
        return $this->belongsTo(zones::class);
    }
}
