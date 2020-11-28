<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class setting extends Model
{
    protected $fillable = ['name', 'data', 'data_ar', 'image'];

/*
    protected $appends = ['branch_name'];

    function getBranchNameAttribute(){

        $request = request();
        if($request->has('locale')){
            App::setLocale($request->locale);
        }
        
        $branch= \App\Models\branches::find($this->branch_id);
        if(is_object($branch)){
            $branch_name = (App::isLocale('en')) ? $branch->branch_name : $branch->branch_name_ar;
            return $branch_name;
        }
            
        return $branch;

    }

    public function branch(){
        return $this->belongsTo(branches::class,'branch_id');
    }
*/

}
