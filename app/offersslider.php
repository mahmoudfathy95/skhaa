<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offersslider extends Model
{
    
    protected $fillable = ['user_id','city_id','branch_id','slider_name','slider_name_ar','type','parent','image'];
    
    protected $appends = ['branch_name'];
    
    public function getBranchNameAttribute()
    {
        return \App\Models\branches::find($this->branch_id)->branch_name_ar;
    }
    
}
