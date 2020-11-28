<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
if (!isset($secondary_specialist)){
    $secondary_specialist = new \App\Models\SecondarySpecialist();
   $secondary_specialist->image='./assets/images/avatar_image.png';
}


?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="create_form" enctype="multipart/form-data">
            <div class="form-body">
                @csrf
              

                <div class="form-group">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                        <label class="control-label">الاسم </label>
                        <input type="text" class="form-control" name="name" value="{{$secondary_specialist->name}}" required="">
                    </div>
                       
                       
                    </div>
                
                </div>
                 <div class="form-group">
                    <div class="row col-sm-12">
                        <select class="form-control" name="main_specialist_id" required="">
                            <option value="">أختار الخدمه الرئيسية</option>
                            @foreach($main_specialists as $main)
                            <option value="{{$main->id}}"  {{Functions::selectedPost('main_specialist_id', $secondary_specialist->main_specialist_id, $main->id)}}>{{$main->name}}</option>
                            @endforeach
                        </select>
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