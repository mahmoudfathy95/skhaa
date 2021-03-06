@extends('layout')
@section('title','تعديل المدينة')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($city)) {
    $city = new \App\Models\cities();
}
else{
    $city = $city[0];
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
                    <h4 class="card-title"><b>تعديل المدينة</b><a href="{{url('backend/cities')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="city_id" value="{{$city->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">الأسم بالعربى </label>
                                    <input type="text" class="form-control" name="city_name_ar" value="{{$city->city_name_ar}}" required="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">الأسم بالانجليزى</label>
                                    <input type="text" class="form-control" name="city_name" value="{{$city->city_name}}" required="">
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









@stop()
