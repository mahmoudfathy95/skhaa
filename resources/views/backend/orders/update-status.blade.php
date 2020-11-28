@extends('backend.layout')
@section('title','Create New Status | Status Data')
@section('content')
@include('backend.message')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Brands Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">{{trans('backend.home')}}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/orders')}}">{{trans('backend.orders')}}</a>
                    </li>
                    <li class="breadcrumb-item">{{trans('backend.update_status')}}
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
                    <h4 class="card-title">{{trans('backend.orders')}}</h4>


                </div>
                <div class="card-body">
                    @include('backend.orders.form')  

                </div>
            </div>
        </div>
    </div>
</div>





@stop()