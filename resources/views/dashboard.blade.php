@extends('layout')
@section('title','الصفحة الرئيسية')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>

        <div class="content-header row">
        </div>
        <style>
            h5{
                color: black;
            }
        </style>
        <div class="content-body" style="height: 600px;">
            <div class="row">


        </div>
        <div class="row">
         <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="fa fa-shopping-cart font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Total Sales</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 5</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="fa fa-shopping-basket font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Orders</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 8</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="fa fa-usd font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Avarage Orders Price</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 7</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="fa fa-list font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Items Sold</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 88</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
        <div class="row match-height">

        </div>
    </div>

@stop()
