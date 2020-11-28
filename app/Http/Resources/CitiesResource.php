<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class CitiesResource extends Resource
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
        $arr = [];
        foreach ($this->branches as $branch) {

            $arr[] = [
                'id' => $branch->id,
                'name' => (App::isLocale('en')) ? $branch->branch_name : $branch->branch_name_ar,
                'city_id' => $branch->city_id,
                'city_name' => (App::isLocale('en')) ? $this->city_name : $this->city_name_ar,
            ];
        };

        return [
            'id'=>$this->id,
            'name'=>(App::isLocale('en')) ? $this->city_name : $this->city_name_ar,
            'branches' => $arr,
        ];

        //return parent::toArray($request);
    }
}
