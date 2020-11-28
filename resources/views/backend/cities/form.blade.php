<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($city))
    $city = new \App\Models\City ();


?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="create_form" enctype="multipart/form-data">
            <div class="form-body">
                @csrf
              

                <div class="form-group">
                    <div class="row col-sm-12">
                        <div class="col-sm-4">
                        <label class="control-label">الأسم بالعربى </label>
                        <input type="text" class="form-control" name="name_ar" value="{{$city->name_ar}}" required="">
                    </div>
                        <div class="col-sm-4">
                        <label class="control-label">الأسم بالانجليزى </label>
                        <input type="text" class="form-control" name="name_en" value="{{$city->name_en}}" required="">
                    </div>
                        <div class="col-sm-4">
                        <label class="control-label">المنطقه  </label>
                        <select name="area_id" class="form-control select2" required="">
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name_ar}}</option>
                            @endforeach
                        </select>
                    
                    </div>
                      
                    </div>
                </div>
                
                
            </div>
            <div class="form-actions">
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save Changes" />
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function () {

                $("#form").validate({
                    rules: {
                        name: {
                            required: true
                        }
                       
                        


                    }
                });
            });
           
        </script>
    </div>
</div>