@extends('layout')
@section('title','تعديل الطلب')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($order)) {
    $order = new \App\Models\orders();
}

if($order->address !=null){
    $order->city = $order->address->city->city_name;
    $order->street = $order->address->street;
    $order->street_description = $order->address->description;
}else{
    
    $order->city = $order->branch->city_name;
    $order->street = $order->branch->street;
    $order->street_description = $order->branch->street_description;
}


//dd($order->street);


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
                    <h4 class="card-title"><b>تعديل الطلب</b><a href="{{url('backend/orders')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>

                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="order_id" value="{{$order->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">العميل</label>
                                    <input class="form-control" disabled value="{{$order->client_name}}" required="">
                                </div>
                                
                                <div class="col-sm-3">
                                    <label class="control-label">السعر قبل الخصم</label>
                                    <input class="form-control"disabled value="{{$order->subTotal}}" required="">
                                </div>
                                
                                <div class="col-sm-3">
                                    <label class="control-label">السعر بعد الخصم</label>
                                    <input class="form-control" disabled value="{{$order->total}}" required="">
                                </div>
                                

                                <div class="col-sm-3">
                                    <label class="control-label">الشحن </label>
                                    <input class="form-control" disabled value="{{$order->shipping}}" required="">
                                </div>
                            </div>

                            <br>

                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">الخصم</label>
                                    <input class="form-control" disabled value="{{$order->discount}}" required="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label"> طريقة الدفع</label>
                                    <input class="form-control"disabled value="{{$order->payment}}" required="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">الكود </label>
                                    <input class="form-control" disabled value="{{$order->coupon}}" required="">
                                </div>
                            </div>

                            <br>

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">المدينة</label>
                                    <input class="form-control" disabled value="{{$order->city}}" required="">
                                </div>
                                
                                <div class="col-sm-3">
                                    <label class="control-label">الفرع</label>
                                    <input class="form-control" disabled value="{{$order->branch->branch_name_ar}}" required="">
                                </div>
                                
                                <div class="col-sm-3">
                                    <label class="control-label"> الشارع</label>
                                    <input class="form-control"disabled value="{{$order->street}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">وصف الشارع </label>
                                    <input class="form-control" disabled value="{{$order->street_description}}" required="">
                                </div>

                            </div>

                            <br>

                            <div class="row col-sm-12">
                                <label class="control-label">المنتجات :</label>
                                <ul>
                                    @foreach($order->orderProduct as $product)
                                        <ol style="margin-top: 5px;background-color: lightgreen;padding:5px;border-radius: 2px;">{{$product->product->product_name}}</ol>
                                    @endforeach
                                </ul>
                            </div>

                            <br>

                            <div class="row col-sm-12">


                                <div class="col-sm-4">
                                    <label class="control-label"> نوع حالة الطلب</label>
                                    <select class="form-control select" name="order_status_type_id" disabled required="required">
                                        <?php $types_opts = App\Models\order_status_types::all(); ?>
                                        @foreach($types_opts as $type)
                                            <option value="{{$type->id}}" @if($type->id == $order->order_status_type_id) selected @endif><?php echo \App\Models\OrderStatusTypeTranslation::where('order_status_type_id',$type->id)->get()[0]->name; ?></option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-4">
                                    <label class="control-label">حالة الطلب</label>
                                    <select class="form-control select" name="order_status_id" required="required">
                                        <?php $statuses_opts = App\Models\order_statuses::all(); ?>
                                        @foreach($statuses_opts as $status)
                                            <option value="{{$status->id}}" @if($status->id == $order->order_status_id) selected @endif><?php echo \App\Models\OrderStatusTranslation::where('order_status_id',$status->id)->get()[0]->name; ?></option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label">التعليق</label>
                                    <input type="text" class="form-control" name="comment" disabled value="@if(!$order->orderHistory->isEmpty()){{$order->orderHistory[0]->comment}} @endif" required="">
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
