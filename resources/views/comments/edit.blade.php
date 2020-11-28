@extends('layout')
@section('title','تعديل التعليق')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($branch)) {
    $branch = new \App\Models\branches();
}
else{
    $branch = $branch[0];
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

                    <h4 class="card-title"><b>تعديل التعليق</b><a href="{{url('backend/comments')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>


                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="branch_id" value="{{$branch->id}}" />
                            @endif

                            <div class="row col-sm-12">

                                <div class="col-sm-3">
                                    <label class="control-label"> المدينة</label>
                                    <select class="form-control select" name="city_id" id="selectCities" required="required">

                                        @foreach($cities as $city_id => $city_name)

                                            <option value="{{$city_id}}" @if($city_id == $branch->city_id) selected @endif >{{$city_name}}</option>

                                        @endforeach

                                    </select>
                                </div>


                            </div>

                            <br>

                            <label class="control-label"><h3> الفرع </h3></label>

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">الأسم بالعربى </label>
                                    <input type="text" class="form-control" name="branch_name_ar" value="{{$branch->branch_name_ar}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">الأسم بالانجليزى</label>
                                    <input type="text" class="form-control" name="branch_name" value="{{$branch->branch_name}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> البريد الالكتروني</label>
                                    <input type="text" class="form-control" name="branch_email" value="{{$branch->branch_email}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> التليفون</label>
                                    <input type="text" class="form-control" name="branch_phone" value="{{$branch->branch_phone}}" required="">
                                </div>

                            </div>

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label"> Free Shipping </label>
                                    <input type="text" class="form-control" name="free_shipping" value="{{$branch->free_shipping}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> VAT </label>
                                    <input type="text" class="form-control" name="vat" value="{{$branch->vat}}" required="">
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
