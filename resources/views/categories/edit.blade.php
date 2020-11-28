@extends('layout')
@section('title','تعديل القسم')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($category)) {
    $category = new \App\Models\categories();
}
else{
    $category = $category[0];
}




?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<div class="container">



</div>



<div class="content-body" ><!-- Default styling start -->



    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">

        <div class="col-12"><div class="alert {!! Session::has('class') ? Session::get("class") : '' !!}" id="message">{!! Session::has('msg') ? Session::get("msg") : '' !!}</div></div>

        <div class="col-12"><div class="alert" id="message" style="display: none"></div></div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                
                    <h4 class="card-title"><b>تعديل القسم</b><a href="{{url('backend/categories')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>


                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="category_id" value="{{$category->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">الأسم بالعربى </label>
                                    <input type="text" class="form-control" name="category_name_ar" value="{{$category->category_name_ar}}" required="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">الأسم بالانجليزى</label>
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" required="">
                                </div>

                            </div>

                            <br><br>

                            <div class="category_image_cont">
                                @if($status == 'edit')

                                    <input type="hidden" id="category_image" name="category_image" value="{{$category->category_image}}"  />

                                @endif
                            </div>

                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                    <p><label class="control-label"> صورة القسم </label></p>
                                    <input type="file" onchange="UploadMainImage(event)" name="select_main_image" id="select_main_image" />
                                </div>
                                <div class="col-sm-6">
                                    <span id="uploaded_image">

                                        <img src="{!! ($status == 'edit')? 'uploads/' : '' !!}{{$category->category_image}}" class="img-thumbnail" width="300" />

                                    </span>
                                </div>

                            </div>




                        </div>

                        <br><br>

                        <div class="form-actions">
                            <div class="form-group">
                                <input type="submit" name="save" id="submit_category" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                            </div>
                        </div>



                    </form>




                </div>
            </div>
        </div>
    </div>


</div>

<script>


    function UploadMainImage(e) {

        var formData = new FormData();
        formData.append('select_main_image', $('input[type=file]')[0].files[0]);
        formData.append('folder_path', 'categories');

        //event.preventDefault();
        $.ajax({
            headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
            url:"{{ route('ajaxupload.action') }}",
            type:"POST",
            data: formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
                var inp = '<input type="hidden" name="category_image" value="categories/' + data.new_name + '"  />';
                $(".category_image_cont").html(inp);

            }
        });


    }





</script>







@stop()
