@extends('backend.layout')
@section('title','بيانات المستخدم')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">بيانات المستخدم</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/users')}}">المستخدمين</a>
                    </li>


                    <li class="breadcrumb-item">بيانات المستخدم
                    </li>

                </ol>
            </div>
        </div>
    </div>

</div>

<div class="content-body" ><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات العضو</h4>

                    <div class="content-header-right col-md-6 col-12">
                        
                    </div>
                </div>

                <div class="card-content collapse show">
                    <div class="row col-12">
                        <h3 class="card-title"><i class="fa fa-shopping-cart"></i>بيانات العضو</h3>
                        <div class="col-md-4">
                            <div class="card card-default">
                                <div class="card-heading">
                                </div>
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td>رقم العضوية:</td>
                                            <td>{{$user->id}}</td>
                                        </tr>
                                   
                                       
                                        <tr>
                                            <td>الاسم الاول:</td>
                                            <td>{{$user->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>البريد الالكترونى:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>الجنسية:</td>
                                            <td>@if($user->country){{$user->country->name_ar}} @endif</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-default">
                                <div class="card-heading">
                                </div>
                                <table class="table">
                                    <tbody>

                                           <tr>
                                            <td>تاريخ ألانضمام:</td>
                                            <td>{{date('Y-m-d',strtotime($user->created_at))}}</td>
                                        </tr>
                                          <tr>
                                            <td>الاسم ألاخير:</td>
                                            <td>{{$user->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهاتف</td>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>الفائمة البريدية</td>
                                            <td>@if($user->newsletter==1) <span class="btn btn-success"> مشترك@else <span class="btn btn-danger">غير مشترك @endif</span></td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card card-default">
                                <div class="card-heading">
                                    <h3>العناوين</h3>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>الدوله</th>
                                        <th>المدينه</th>
                                        <th>العنوان </th>
                                        <th>الرقم البريدى </th>
                                        <th>الاسم الاول</th>
                                        <th>الاسم الاخير</th>
                                        <th>رقم الهاتف</th>

                                    </tr>
                                    
                                    @foreach($user->addresses as $key=>$address)
                                    <tr>
                                        <td>عنوان{{$key+1}}</td>
                                        <td>{{$address->countryobject->name_ar}}</td>
                                        <td>@if($address->cityobject){{$address->cityobject->name_ar}}@else {{$address->city}} @endif</td>
                                        <td>{{$address->address}}</td>
                                        <td>{{$address->postal_code}}</td>
                                        <td>{{$address->firstname}}</td>
                                        <td>{{$address->lastname}}</td>
                                        <td>{{$address->phone}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card card-default">
                                <div class="card-heading">
                                    <h3>الطلبات</h3>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>تاريخ الطلب</th>
                                        <th>حاله الطلب </th>
                                        <th>الاجمالى</th>


                                    </tr>
                                    @foreach($user->orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{status[$order->status_id]}}</td>
                                        <td>{{$order->discount_price}}</td>

                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card card-default">
                                <div class="card-heading">
                                    <h3>التقييمات</h3>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>المنتج</th>
                                        <th>التقييم</th>
                                        <th>التعليق </th>
                                        <th>الحاله </th>


                                    </tr>
                                    @foreach($user->rates as $rate)
                                    <tr>
                                        <td>{{$rate->product->language->name}}</td>
                                        <td>@for($i=1;$i<=$rate->rating;$i++)<i class="ft-star"> </i>@endfor</td>
                                        <td>{{$rate->feed_back}}</td>
                                        <td>{{rate_status[$rate->active]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form method="post" class="form-horizontal" id="form">
                                    <div class="form-body">

                                        <div class="form-group">

                                            <input type="hidden" name="is_special" value="0">

                                            <label class="control-label">اضف إلى القائمة المميزة</label>
                                            <input type="checkbox" name="is_special" value="1" @if($user->is_special==1) checked @endif>


@csrf
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="submit" name="save" class="btn btn-outline btn-primary" value="تحديث" />
                                            </div> 
                                            <div class="col-6">
                                                <a href="{{url('backend/users/active/'.$user->id)}}" class=" btn btn-primary" > @if($user->active==1) إلغاء الحساب @else تفعيل @endif</a>

                                            </div> 

                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

    @stop()