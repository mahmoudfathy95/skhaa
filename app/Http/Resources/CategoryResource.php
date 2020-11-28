<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class CategoryResource extends Resource
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
        foreach ($this->subs as $sub) {

            $arr[] = [
                'id' => $sub->id,
                'name' => (App::isLocale('en')) ? $sub->subcategory_name : $sub->subcategory_name_ar,
                'category_id' => $sub->category_id,
                'subcategory_image' => asset('uploads/'.$sub->subcategory_image),
            ];
        };
        //$products = $this->products;
        $this->branch_id = $request->branch_id;
        $products_count = \App\Models\products::whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('product_quantities')
                      ->whereRaw("product_quantities.product_id = products.id")
                      ->whereRaw("product_quantities.branch_id = $this->branch_id")
                      ->whereRaw("product_quantities.quantity != 0");
            })
            ->where(function ($query) {
                    $query->where('category_id' , $this->id);
                            
                })
            ->count();

        return [
            'id'=>$this->id,
            'name'=> (App::isLocale('en')) ? $this->category_name : $this->category_name_ar,
            'products_count'=> $products_count,//$this->products->count(),
            'subs' => $arr,
            'image'=>asset('uploads/'.$this->category_image),

        ];


        //return parent::toArray($request);
    }
}
