@extends('backend.layout')
@section('title','المتاجر')
@section('content')
@include('backend.message')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
use Illuminate\Support\Facades\Input;
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title mb-0">بيانات المتاجر</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">بيانات المتاجر
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
            <div class="input-group-btn">

                <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url('backend/stores/create')}}">اضافه </a>

            </div>    </div>
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
                        <table class="table mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th>الرقم التسلسلى</th>
                                    <th>الاسم </th>


                                    <th>البريد الألكترونى</th>


                                    <th>الاعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>


                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}} </td>


                                    <td>{{$row->email}}</td>


                                    <td>
                                        <a href="{{url('backend/stores/update/'.$row->id)}}" class=" btn btn-xs btn-outline btn-success" ><i class="glyphicon glyphicon-pencil"></i>Update</a>

                                        {!!Themes::deleteRow($row->id, url('backend/users/delete'),[])!!}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php $search_query = \Illuminate\Support\Facades\Input::except('page');
                    $result->appends($search_query);
                    ?>
                    {!! $result->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>

        @stop()