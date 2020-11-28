@extends('layout')
@section('title','بيانات المنتجات')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>

<div class="content-body" ><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12"><div class="alert {!! Session::has('class') ? Session::get("class") : '' !!}" id="message">{!! Session::has('msg') ? Session::get("msg") : '' !!}</div></div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if(Auth::check())

                        {{Auth::user()->id}}

                        @if(auth()->user()->hasRole('owner'))
                            {{Auth::user()->email}}
                        @endif

                    @endif


                    <h3 class="card-title"><b>بيانات المنتجات</b><a href="{{url('products/create')}}" class="btn btn-primary" style="float:left;">انشاء</a></h3>


                </div>
                <div class="card-content collapse show">

                    <!-- Products Table -->
                    <div class="table-responsive">

                        <table class="table mb-0 table-centered table-bordered" style="width: 100%" id="products-table">

                            <thead>

                                <tr>

                                    <th width="10%">Id</th>

                                    <th width="15%">Product Name</th>

                                    <th width="15%">Product Price</th>

                                    <th width="15%">Product Details</th>

                                    <th width="15%">Created At</th>

                                    <th width="30%">Action</th>

                                </tr>

                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

<script>


    $(function() {


        $('#products-table').DataTable({

            processing: true,

            serverSide: true,

            ajax:{
                url: '{!! route('get.products') !!}',
                'type': 'POST',
                'data': function ( d ) {
                    d._token = "{{ csrf_token() }}";
                }
            },

            columns: [

                { data: 'id', name: 'id' },
                { data: 'product_name_ar', name: 'product_name_ar' },
                { data: 'product_price', name: 'product_price' },
                { data: 'product_details_ar', name: 'product_details_ar' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' , orderable: false},




            ]

        });

    });

</script>


@stop()
