@extends('backend.layout')
@section('title','بيانات الاختصاصات الاساسيه')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">بيانات الاختصاصات الاساسيه</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">بيانات الاختصاصات الاساسيه
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
            <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url('backend/main_specialist/create')}}">انشاء</a>
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
                    <h4 class="card-title">بيانات الاختصاصات الاساسيه</h4>


                </div>
                <div class="card-content collapse show">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>الصوره</th>

                                    <th>الاسم</th>



                                    <th>الأعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                    <td><img class="media-object rounded-circle" src="{{url($row->image)}}" style="width: 150px; height: 100px;"/></td>

                                    <td>{{$row->name_ar}}</td>


                                    <td>
                                        <a href="{{url('backend/main_specialist/edit/'.$row->id)}}" class=" btn btn-xs btn-outline btn-primary"  id="stepEdit"><i class="fa fa-paste"></i> تعديل</a>


                                        {!!Themes::deleteRow($row->id, url('backend/main_specialist/delete'),[])!!}
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