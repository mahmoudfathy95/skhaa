<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class BranchesResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($request->has('locale')){
            App::setLocale($request->locale);
        }


        return [
            'id' => $this->id,
            'name' => (App::isLocale('en')) ? $this->branch_name : $this->branch_name_ar,
            'city_id' => $this->city_id,
            //'city_name' => (App::isLocale('en')) ? $this->city->city_name : $this->city->city_name_ar,
            'city_name' => $this->city_name,

        ];
        //return parent::toArray($request);
    }
}
