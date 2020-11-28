@extends('layout')
@section('title','من نحن')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($contact)) {
    $contact = new \App\Models\contact();
}
else{
    $contact = $contact;
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
                    <h4 class="card-title"><b>تعديل </b><a href="{{url('backend/contacts')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>
                
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            
                            @if($status == 'edit')
                                <input type="hidden" name="setting_id" value="{{$contact->id}}" />
                            @endif
                            
                            
                            <br>


                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">الاسم بالعربى </label>
                                    <input type="text" name="name_ar" class="form-control required" required="" value="{{$contact->name_ar}}" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">الاسم بالانجليزي  </label>
                                    <input type="text" name="name" class="form-control required" required="" value="{{$contact->name}}" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">الرابط  </label>
                                    <input type="text" name="link" class="form-control required" required="" value="{{$contact->link}}" />
                                </div>

                            </div>

                            <br><br>


                            <div class="image_cont">
                                @if($status == 'edit')

                                    <input type="hidden" id="image" name="image" value="{{$contact->image}}"  />

                                @endif
                            </div>


                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                <p><label class="control-label"> صورة  </label></p>
                                    <input type="file" onchange="UploadMainImage(event)" name="select_main_image" id="select_main_image" />
                                </div>
                                <div class="col-sm-6">
                                    <span id="uploaded_image">

                                        <img src="{!! ($status == 'edit')? 'uploads/' : '' !!}{{$contact->image}}" class="img-thumbnail" width="300" />

                                    </span>
                                </div>

                            </div>


                            <br><br>

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
        formData.append('folder_path', 'contact');

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
                var inp = '<input type="hidden" name="image" value="contact/' + data.new_name + '"  />';
                $(".image_cont").html(inp);

            }
        });


    }





</script>



@stop()
