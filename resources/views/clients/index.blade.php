@extends('layout')
@section('title','بيانات العملاء')
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



                </div>
                <div class="card-content collapse show">

                    <!-- Products Table -->
                    <div class="table-responsive">

                        <table class="table mb-0 table-centered table-bordered" style="width: 100%" id="clients-table">

                            <thead>

                                <tr>

                                    <th width="10%">التسلسل</th>

                                    <th width="15%">الاسم </th>
                                    
                                    <th width="15%">المدينة </th>
                                    
                                    <th width="15%">رقم الهاتف </th>

                                    <th width="15%">تاريخ التسجيل</th>

                                    <th width="15%"> عدد الطلبات</th>
                                    
                                    <th width="15%">مجموع قيمة الفواتير </th>
                                    
                                    <th width="15%">تاريخ اخر طلب </th>

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


        $('#clients-table').DataTable({
            
            dom: 'Bfrtip',
            charset: 'utf-8',
            bom: true,
            
            buttons: [{ extend: 'pdfHtml5'}],

            processing: true,

            serverSide: true,

            ajax:{
                url: '{!! route('get.clients') !!}',
                'type': 'POST',
                'data': function ( d ) {
                    d._token = "{{ csrf_token() }}";
                }
            },

            columns: [

                { data: 'id', name: 'id' },
                { data: 'client_name' , name: 'client_name' },
                { data: 'city_name', name: 'city_name' },
                { data: 'phone', name: 'phone' },
                { data: 'created_at', name: 'created_at' },
                { data: 'orders_count', name: 'orders_count' },
                { data: 'orders_total_price', name: 'orders_total_price' },
                { data: 'last_order_date', name: 'last_order_date' },
                { data: 'action', name: 'action' , orderable: false},




            ]

        });

    });

</script>


@stop()
