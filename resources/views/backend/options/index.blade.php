@extends('backend.layout')
@section('title','Filters Data')
@section('content')
<?php 
use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Filters Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    
                    <li class="breadcrumb-item">Filters Data
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
            <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url(\URL::Current().'/create')}}">Create</a>
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
                    <h4 class="card-title">Filters Data</h4>


                </div>
                <div class="card-content collapse show">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Name</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                    <td>{{$row->language->language->name}}</td>
                                    <td>{{$row->language->name}}</td>
                                    <td>
                                        <a href="{{url(\URL::Current().'/edit/'.$row->id)}}" class=" btn btn-xs btn-outline btn-primary"  id="stepEdit"><i class="fa fa-paste"></i> Update</a>
                                        <a href="{{url(\URL::Current().'/languages/'.$row->id)}}" class=" btn btn-xs btn-outline btn-info"  id="stepLanguages"><i class="fa fa-language"></i> Languages</a>
                                        <a href="{{url('backend/options_values/'.$row->id)}}" class=" btn btn-xs btn-outline btn-success"  ><i class="fa fa-th-list"></i> Options Values</a>

                                        <button type="button" class="btn btn-xs btn-outline btn-warning" data-toggle="modal" data-target="#myModal{{$row->id}}" id="stepPreview"><i class="fa fa-twitch"></i> Preview</button>
                                        <div class="modal inmodal" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Preview All Data</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <blockquote>
                                                            <p>
                                                                <strong style="font-size: 18px;">Slug</strong> : {{$row->slug}}
                                                            </p>

                                                            <p>
                                                                <strong style="font-size: 18px;">Name</strong> : {{$row->language->name}}
                                                            </p>


                                                        
                                                        </blockquote>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {!!Themes::deleteRow($row->id, url(\URL::Current().'/delete'),[])!!}
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