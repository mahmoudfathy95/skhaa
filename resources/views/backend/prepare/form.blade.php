<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
if (!isset($prepare)){
    $prepare = new \App\Models\Prepare();
  
}


?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="create_form" enctype="multipart/form-data">
            <div class="form-body">
                @csrf
              

                <div class="form-group">
                    <div class="row col-sm-12">
                        <div class="col-sm-4">
                        <label class="control-label">الاسم بالعربى </label>
                        <input type="text" class="form-control" name="name_ar" value="{{$prepare->name_ar}}" required="">
                    </div>
                        <div class="col-sm-4">
                        <label class="control-label">الاسم بالانجليزى </label>
                        <input type="text" class="form-control" name="name_en" value="{{$prepare->name_en}}" required="">
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