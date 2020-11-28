<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class product_quantity extends Model
{
    protected $fillable = ['branch_id', 'product_id', 'quantity'];



}
