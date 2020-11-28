@extends('layout')
@section('title','تعديل الكود')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($coupon)) {
    $coupon = new \App\Models\coupon();
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
                    <h4 class="card-title"><b>تعديل الكوبون</b><a href="{{url('backend/coupons')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>

                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="coupon_id" value="{{$coupon->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">النوع</label>
                                    <select class="form-control select" name="type" value="{{$coupon->type}}" required="required">
                                        <option value="value" @if($coupon->type == 'value') selected @endif>قيمة</option>
                                        <option value="percent" @if($coupon->type == 'percent') selected @endif>نسبة مئوية</option>
                                        <option value="free_shipping" @if($coupon->type == 'free_shipping') selected @endif>شحن مجاني</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">القيمة </label>
                                    <input type="text" class="form-control" name="value" value="{{$coupon->value}}" required="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">الكود </label>
                                    <input type="text" class="form-control" name="code" value="{{$coupon->code}}" required="">
                                </div>

                            </div>

                            <br>

                            <div class="row col-sm-12">

                                <div class="col-sm-6">
                                    <label class="control-label">من</label>
                                    <input type="date" class="form-control" name="date_from" value="{{$coupon->date_from}}" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">الى</label>
                                    <input type="date" class="form-control" name="date_to" value="{{$coupon->date_to}}" required="">
                                </div>


                            </div>

                        </div>

                        <br><br>

                        <div class="form-actions">
                            <div class="form-group">
                                <input type="submit" name="save" id="submit_unit" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                            </div>
                        </div>



                    </form>

                </div>

            </div>
        </div>
    </div>


</div>

@stop()
