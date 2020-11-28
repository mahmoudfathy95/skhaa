@extends('backend.layout')
@section('title','أنشاء ملف | بيانات المرحلة الدراسيه')
@section('content')
@include('backend.message')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">بيانات المرحلة الدراسيه</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/grades')}}">بيانات المرحلة الدراسيه</a>
                    </li>
                    <li class="breadcrumb-item"> بيانات المرحلة الدراسيه
                    </li>

                </ol>
            </div>
        </div>
    </div>

</div>
<div class="content-body"><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات المرحلة الدراسيه</h4>


                </div>

                @include('backend.grades.form')  

            </div>
        </div>
    </div>
</div>





@stop()