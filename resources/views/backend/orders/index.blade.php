@extends('backend.layout')
@section('title','بيانات الطلبات')
@section('content')
@include('backend.message')

<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">بيانات الطلبات</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">بيانات الطلبات
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
       
    </div>
</div>

<div class="content-body" ><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الطلبات</h4>


                </div>
                <div class="card-content collapse show">

                    <div class="table-responsive">
                        <table class="table mb-0 table-centered table-bordered zero-configuration" data-order='[[ 0, "desc" ]]'>
                            <thead>
                                <tr>
                                    <th>المسلسل</th>
                                    <th>الاسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>الأجمالى</th>
                                    <th>الحالة</th>
                                    <th>طريقة التوصيل</th>
                                    
                                
                                    <th>الفرع</th>
                                    <th>التاريخ</th>
                                    <th>الأعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                                                  
                                    <td>{{$row->id}}</td>
                                    <td>@if($row->user) {{$row->user->first_name}} {{$row->user->last_name}} @endif </td>
                                    <td>@if($row->user){{$row->user->phone}} @endif</td>
                                    <td>{{$row->total}}</td>
                                    <td><a href="{{url('backend/orders/show/'.$row->id)}}"  id="stepEdit">{{status[$row->status_id]}}</a></td>
                                    <td>{{$row->order_type}}</td>
                                    <td>@if($row->branch){{$row->branch->storename}}@endif</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                         <button type="button" class="btn btn-xs btn-outline btn-warning" data-toggle="modal" data-target="#myModal{{$row->id}}" id="stepPreview"><i class="fa fa-twitch"></i> معايبنه</button>
                                        <div class="modal inmodal" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Preview All Data</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <blockquote>


                                                            </p>
                                                            <p>
                                                                <strong style="font-size: 18px;">منجات الطلب</strong> :
                                                            <table >
                                                                <tr><th>المنتج</th><th>السعر</th><th>العدد</th></tr>
                                                                @foreach($row->details as $price)
                                                                <tr>
                                                                    <td>@if($price->oneproduct){{$price->oneproduct->name}} @endif</td>
                                                                  
                                                                    <td> @if($price->oneproduct){{$price->oneproduct->price_after_discount}}@endif</td>
                                                                    <td>{{$price->number}}</td>
                                                                </tr>
                                                                
                                                                @endforeach
                                                            </table>
                                                            </p>



                                                        </blockquote>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <a href="{{url('backend/orders/show/'.$row->id)}}" class=" btn btn-xs btn-outline btn-primary" target="_blank"  id="stepEdit"><i class="fa fa-eye"></i> show</a>
                                      

                                        <!--{!!Themes::deleteRow($row->id, url('backend/orders/delete'),[])!!}-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

@stop()