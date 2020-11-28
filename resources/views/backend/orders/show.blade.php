@extends('backend.layout')
@section('title')
{{trans('backend.orders')}}
@endsection
@section('content')
@include('backend.message')

<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Orders Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">{{trans('backend.home')}}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/orders')}}">{{trans('backend.orders')}}</a>
                    </li>


                    <li class="breadcrumb-item">{{trans('backend.orders')}}
                    </li>

                </ol>
            </div>
        </div>
    </div>

    <div class="content-header-right col-md-6 col-12 mb-2">
        <button class="btn btn-primary" onclick="printDiv('printbill')"><i class="fa fa-print"></i></button>
        <button class="btn btn-success" onclick="printDiv('printship')"><i class="fa fa-truck"></i></button>
    </div>
</div>

<div class="content-body" ><!-- Default styling start -->
    <div class="container">
        <!-- Default styling end -->
        <!-- Table header styling start -->
        <div class="row" id="header-styling"  style="">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('backend.orders')}}</h4>


                    </div>
                    <div class="card-content collapse show">
                        <div id="print">
                            <div class="row col-12">
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-heading">
                                            <h3 class="card-title"><i class="fa fa-shopping-cart"></i> تفاصيل الطلب</h3>
                                        </div>
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="تاريخ الاضافة:"><i class="fa fa-calendar fa-fw"></i></button></td>
                                                    <td>{{$order->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="طريقة الدفع:"><i class="fa fa-credit-card fa-fw"></i></button></td>
                                                    <td>{{$order->pay_method}}</td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="طريقة الشحن:"><i class="fa fa-truck fa-fw"></i></button></td>
                                                    <td>@if($order->branch){{$order->branch->storename}}@endif</td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="نوع الطلب:"><i class="fa fa-truck fa-fw"></i></button></td>
                                                    <td>{{$order->order_type}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-heading">
                                            <h3 class="card-title"><i class="fa fa-user"></i> تفاصيل العميل</h3>
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="مجموعة العميل:"><i class="fa fa-group fa-fw"></i></button></td>
                                                    <td>عملاء التجزئة</td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="اسم العميل:"><i class="fa fa-user fa-fw"></i></button></td>
                                                    <td>@if($order->user){{$order->user->first_name}} {{$order->user->last_name}} @endif</td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="البريد الالكتروني:"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                                                    <td><a href="mailto:@if($order->user){{$order->user->email}}@endif">@if($order->user){{$order->user->email}}@endif</a></td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="رقم الهاتف أو الجوال:"><i class="fa fa-phone fa-fw"></i></button></td>
                                                    <td>@if($order->user){{$order->user->phone}}@endif</td>
                                                </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default" >
                                <div class="card-heading">
                                    <h3 class="card-title"><i class="fa fa-info-circle"></i> تفاصيل الطلب (#{{$order->id}})</h3>
                                </div>
                                <div class="card-body " style="direction: RTL; text-align: right;">
                                    <table class="table table-bordered" style="text-align: right;">
                                        <thead>
                                            <tr>
                                                <td style="width: 50%;" class="text-right">أسم المستلم </td>
                                                <td style="width: 50%;" class="text-right">عنوان الشحن                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-right">@if($order->user){{$order->user->first_name}} {{$order->user->last_name}} @endif</td>
                                                <td class="text-right">@if($order->user){{$order->user->first_name}} {{$order->user->last_name}} @endif<br>@if($order->addresses)<a target='_blank' href="https://www.google.com/maps/place/{{$order->addresses->lat}},{{$order->addresses->lng}}">{{$order->addresses->name}}</a> @endif</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td class="text-right">الطلبات</td>
       <td class="text-right">الباركود</td>

                                                <td class="text-right">الكمية</td>
                                                <td class="text-right">سعر الوحدة</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->details as $price)
                                            <tr>
                                                <td>@if($price->oneproduct){{$price->oneproduct->name}} @endif</td>
                                                  <td>@if($price->oneproduct){{$price->oneproduct->barcode}} @endif</td>

                                                <td>{{$price->number}}</td>
                                                <td> @if($price->oneproduct){{$price->oneproduct->price_after_discount}}@endif</td>
                                            </tr> @endforeach
                                            <tr>
                                                <td colspan="4" class="text-right">الاجمالي</td>
                                                <td class="text-right">{{$order->total}}</td>
                                            </tr>
                                            @if($order->promo)
                                            <tr>
                                                <td colspan="4" class="text-right">الخصم</td>
                                                <td class="text-right">-{{$order->discount}}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="4" class="text-right">كود الكوبون</td>
                                                <td class="text-right">{{$order->promo->code}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">الأجمالى</td>
                                                <td class="text-right">{{$order->total}}</td>
                                            </tr>
                                            @endif
                                            
                                            <tr>
                                                <td colspan="4" class="text-right">الخصم</td>
                                                <td class="text-right">{{$order->shipping}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">الأجمالى</td>
                                                <td class="text-right">{{$order->total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                 
                        <div class="col-12">
                            <h3>إضافة إلى سجل الطلبات</h3>
                            @include('backend.orders..form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    function printDiv(id)
    {

        var divToPrint = document.getElementById(id);

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html direction="rtl"><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        //setTimeout(function () {
        //    newWin.close();
        // }, 10);

    }
</script>
@stop()