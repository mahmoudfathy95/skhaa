<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
if (!isset($advertisement)){
    $advertisement = new \App\Models\Advertisements();
    $advertisement->image='./assets/backend/images/avatar_image.png';
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
                        <label class="control-label">العنوان </label>
                        <input type="text" class="form-control" name="title" value="{{$advertisement->title}}" required="">
                    </div>
                        <div class="col-sm-6">
                        <label class="control-label">رقم الهاتف </label>
                        <input type="text" class="form-control" name="phone" value="{{$advertisement->phone}}" required="">
                    </div>
                      
                    </div>
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                        <label class="control-label">الأسم </label>
                        <input type="text" class="form-control" name="name" value="{{$advertisement->name}}" required="">
                    </div>
                        <div class="col-sm-6">
                        <label class="control-label"> المده </label>
                        <input type="number" min="1" class="form-control" name="period" value="{{$advertisement->period}}" required="">
                    </div>
                      
                    </div>
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                        <label class="control-label">اسم الأسره </label>
                        <input type="text" class="form-control" name="family" value="{{$advertisement->family}}" required="">
                    </div>
                        <div class="col-sm-6">
                        <label class="control-label"> الصوره </label>
                        <?=Components::uploader($advertisement->image); ?>
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