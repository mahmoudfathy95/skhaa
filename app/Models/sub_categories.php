<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    protected $fillable = ['category_id','subcategory_name_ar', 'subcategory_name','subcategory_image'];

    protected $appends = ['main_category'];


    function getMainCategoryAttribute(){

        $category= \App\Models\categories::find($this->category_id);
        if(is_object($category))
            return $category->category_name_ar;
        return $category;

        //return 'Category';
    }
}
