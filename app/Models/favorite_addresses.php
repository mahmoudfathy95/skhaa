<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite_addresses extends Model
{
    protected $fillable = ['client_id','address_id'];

    public function address()
    {
        return $this->belongsTo(client_addresses::class,'address_id');
    }
}
