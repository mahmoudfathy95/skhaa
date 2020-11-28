@extends('backend.layout')
@section('title','العملاء')
@section('content')
@include('backend.message')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
use Illuminate\Support\Facades\Input;
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title mb-0">بيانات العملاء</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">بيانات العملاء
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
  <a href="{{url(URL::current().'/download')}}" class="d-inline btn btn-xs btn-primary">Download Sheet </a>          
                                  
    </div>
</div>

<div class="content-body" ><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="width: 100%">
                    <div class="table-responsive">
                        <table class="table mb-0 table-centered table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>الرقم التسلسلى</th>
                                    <th>الاسم </th>
                                    <th>المدينه </th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ التسجيل </th>
                                    <th>عدد الطلبات  </th>
                                    <th>مجموع قيمة الفواتير  </th>
                                    <th>تاريخ اخر طلب</th>
                                    <th>الاعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>


                                    <td>{{$row->id}}</td>
                                    <td>{{$row->first_name}} {{$row->last_name}}</td>
                                    <td>{{$row->city}}</td>

                                    <td>{{$row->phone}}</td>
                                    <td>{{date('Y-m-d',strtotime($row->created_at))}}</td>
                                    <td><a href="{{url('backend/allorders?user_id='.$row->id)}}">{{$row->orders()->count()}}</a></td>
                                    <td><a href="{{url('backend/allorders?user_id='.$row->id)}}">{{$row->orders()->sum('total')}}</a></td>
                                    <td><?php $or=$row->orders()->orderBy('id','desc')->first(); ?> @if(is_object($or)){{date('Y-m-d',strtotime($or->created_at))}} @endif</td>


                                    <td>

                                        {!!Themes::deleteRow($row->id, url('backend/users/delete'),[])!!}

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