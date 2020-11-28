@extends('backend.layout')
@section('title','Contacts Data')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Contacts Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>


                    <li class="breadcrumb-item">الاستفسارات
                    </li>

                </ol>
            </div>
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
                    <div class="row">
                        <div class="col-md-6"><h4 class="card-title">الاستفسارات</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url(URL::current().'?status=0')}}" class="d-inline btn btn-xs btn-primary">قيد المراجعه </a>          
                            <a href="{{url(URL::current().'?status=1')}}" class="d-inline btn btn-xs btn-primary">مجاب</a>          
                            <a href="{{url(URL::current())}}" class="d-inline btn btn-xs btn-primary">الأحدث</a>          
                        </div>
                    </div>
                </div>
                <div class="card-content collapse show">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>مسلسل</th>
                                    <th>التاريخ</th>
                                    <th>الاسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>اسم الأسره</th>
                                   
                                    <th>الإستفسار</th>
                                    <th>الحاله</th>
                                    <th>الاعدادات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>


                                    <td>{{$row->id}}</td>
                                    <td>{{date('Y-m-d',strtotime($row->created_at))}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->family_name}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>@if($row->type==1) شكوى @else مقترح @endif</td>
                                    <td>{{$row->subject}}</td>
                                    <td>@if($row->status==1)<span class="btn btn-success"> تم الرد @elseif($row->status==0)<span class="btn btn-warning"> قيد المراجعة @endif</span></td>

                                    <td>
                                        <button type="button" class="btn btn-xs btn-outline btn-warning" data-toggle="modal" data-target="#myModal{{$row->id}}" id="stepPreview"><i class="fa fa-twitch"></i> معاينه</button>
                                        <button type="button" class="btn btn-xs btn-outline btn-warning" data-toggle="modal" data-target="#myMod{{$row->id}}" id="stepPreview"><i class="fa fa-twitch"></i> أضف الرد</button>
                                        <div class="modal inmodal" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Preview All Data</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                        <div class=" col-md-12">
                                                            <table class="table-bordered">
                                                        <tr>
                                                            <td>رقم الاستفسار</td>
                                                            <td>{{$row->id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>اسم العميل</td>
                                                            <td>{{$row->name}}</td>
                                                        </tr>
                                                        </table>
                                                        </div>
                                                        <div class=" col-md-12">
                                                        <table class="table-bordered">
                                                        <tr>
                                                            <td>التاريخ</td>
                                                            <td>{{date('Y-m-d',strtotime($row->id))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>اسم الاسره</td>
                                                            <td>{{$row->family_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>الهاتف/الجوالي</td>
                                                            <td>{{$row->phone}}</td>
                                                        </tr>
                                                        </table>
                                                        </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="row ">
                                                            <table class="table-bordered">
                                                                <tr>
                                                                    <td>الرساله</td>
                                                                    <td>{{$row->message}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الرد</td>
                                                                    <td>{{$row->replay}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>




                                                   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="myMod{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">اضافه رد </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <div class="row ">
                                                        <div class=" col-md-12">
                                                            <table class="table-bordered">
                                                        <tr>
                                                            <td>رقم الاستفسار</td>
                                                            <td>{{$row->id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>اسم العميل</td>
                                                            <td>{{$row->name}}</td>
                                                        </tr>
                                                        </table>
                                                        </div>
                                                        <div class=" col-md-12">
                                                        <table class="table-bordered">
                                                        <tr>
                                                            <td>التاريخ</td>
                                                            <td>{{date('Y-m-d',strtotime($row->id))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>البريد الإلكتروني</td>
                                                            <td>{{$row->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>الهاتف/الجوالي</td>
                                                            <td>{{$row->phone}}</td>
                                                        </tr>
                                                        </table>
                                                        </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="row">
                                                            <table class="table-bordered">
                                                                <tr>
                                                                    <td>الرساله</td>
                                                                    <td>{{$row->message}}</td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>
                                                        <blockquote>

                                                            <form action="{{url('backend/contacts/send/'.$row->id)}}" method="post">
                                                                <div class="form-group">
                                                                    <input type="hidden" placeholder="Enter Emails seperated by Comma " value="{{$row->email}}" name="email" class="form-control" required="">

                                                                </div>
                          @csrf
                                                                <div class="form-group">
                                                                    <label>الرد</label>
                                                                    <textarea class="form-control" name="message" placeholder="Enter Message"required></textarea>

                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Send" name="submit" class="btn btn-primary">

                                                                </div>
                                                            </form>







                                                        </blockquote>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!--                                        {!!Themes::deleteRow($row->id, url('contacts/delete'),['data-action'=>"options.delete"])!!}-->
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

      <?php  $search_query = \Illuminate\Support\Facades\Input::except('page');
                    $result->appends($search_query); ?>
            {!! $result->links()!!}
                    
</div>

@stop()