@extends('backend.layout')
@section('title','الصفحة الرئيسية')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <style>
            h5{
                color: black;
            }
        </style>
        <div class="content-body">
            <div class="row match-height">
              
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="height: 438.075px;">
                        <div class="card-header">

                            <a class="heading-elements-toggle"><i class="fa fa-user font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <h4 class="card-title">Products</h4>
                             
                                <a href="{{url('backend/storeproducts')}}" class="btn btn-outline-amber">Products</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="height: 438.075px;">
                        <div class="card-header">

                            <a class="heading-elements-toggle"><i class="fa fa-user font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <h4 class="card-title">Orders</h4>
                           
                                <a href="{{url('backend/orders')}}" class="btn btn-outline-amber">Products</a>
                            
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@stop()