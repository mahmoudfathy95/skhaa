@extends('layout')
@section('title','بيانات العميل ')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($order)) {
    $clients = new \App\Models\clients();
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
                    <h4 class="card-title"><b>بيانات العميل</b><a href="{{url('backend/clients')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>

                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="client_id" value="{{$client->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">العميل</label>
                                    <input class="form-control" disabled value="{{$client->client_name}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">التليفون</label>
                                    <input class="form-control" disabled value="{{$client->phone}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"> البريد الالكتروني</label>
                                    <input class="form-control"disabled value="{{$client->email}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">الصورة </label>
                                    <input class="form-control" disabled value="{{$client->image}}" required="">
                                </div>
                            </div>


                        </div>

                        <br><br>




                    </form>

                </div>

            </div>
        </div>
    </div>


</div>

@stop()
