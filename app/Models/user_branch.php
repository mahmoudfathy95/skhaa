<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_branch extends Model
{

    protected $fillable = ['user_id' , 'branch_id'];

    function getBranchcityAttribute(){
        $branch= \App\Models\branches::find($this->branch_id);
        if(is_object($branch))
            return $branch->city_id;
        return $branch;
    }

}
