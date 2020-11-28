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


                    <h3 class="card-title"><b>بيانات الأقسام</b><a href="{{url('branches/create')}}" class="btn btn-primary" style="float:left;">انشاء</a></h3>


                </div>
                <div class="card-content collapse show">

                    <!-- Products Table -->
                    <div class="table-responsive">

                        <table class="table mb-0 table-centered table-bordered" style="width: 100%" id="branches-table">

                            <thead>

                                <tr>

                                    <th width="10%">التسلسل</th>

                                    <th width="15%">الفرع</th>

                                    <th width="15%">المدينة</th>

                                    <th width="15%">اخر تحديث</th>

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


        $('#branches-table').DataTable({

            processing: true,

            serverSide: true,

            ajax:{
                url: '{!! route('get.branches') !!}',
                'type': 'POST',
                'data': function ( d ) {
                    d._token = "{{ csrf_token() }}";
                }
            },

            columns: [

                { data: 'id', name: 'id' },
                { data: 'branch_name_ar', name: 'branch_name_ar' },
                { data: 'city_name', name: 'city_name' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' , orderable: false},




            ]

        });

    });

</script>


@stop()
