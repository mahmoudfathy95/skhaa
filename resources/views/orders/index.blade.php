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


                </div>
                <div class="card-content collapse show">

                    <!-- Products Table -->
                    <div class="table-responsive">

                        <table class="table mb-0 table-centered table-bordered" style="width: 100%" id="comments-table">

                            <thead>

                                <tr>

                                    <th width="10%">التسلسل</th>

                                    <th width="15%">الاسم</th>

                                    <th width="15%">رقم الهاتف</th>

                                    <th width="15%"> الاجمالي</th>
                                    
                                    <th width="15%"> الحالة</th>

                                    <th width="15%"> طريقة التوصيل</th>
                                    
                                    <th width="15%"> الفرع</th>
                                    
                                    <th width="15%"> اخر تحديث</th>

                                    <th width="30%">Actions</th>

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


        $('#comments-table').DataTable({

            processing: true,

            serverSide: true,

            ajax:{
                url: '{!! route('get.orders') !!}',
                'type': 'POST',
                'data': function ( d ) {
                    d._token = "{{ csrf_token() }}";
                }
            },

            columns: [

                { data: 'id', name: 'id' },
                { data: 'client_name', name: 'client_name' },
                { data: 'client_phone', name: 'client_phone' },
                { data: 'total', name: 'total' },
                { data: 'order_state', name: 'order_state' },
                { data: 'delivery_status', name: 'delivery_status' },
                { data: 'branch_name', name: 'branch_name' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' , orderable: false},




            ]

        });

    });

</script>


@stop()
