<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class SubcategoryResource extends Resource
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
            'name' => (App::isLocale('en')) ? $this->subcategory_name : $this->subcategory_name_ar,
            'image'=>asset('uploads/'.$this->category_image),
        ];
        //return parent::toArray($request);
    }
}
