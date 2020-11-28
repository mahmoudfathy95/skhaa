@extends('backend.layout')
@section('title','StaticPages Data')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">StaticPages Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">StaticPages Data
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
                    <h4 class="card-title">StaticPages Data</h4>


                </div>
                <div class="card-content collapse show">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Primary Language</th>

                                    <th>Title</th>
                                    <th>Languages Complete</th>

                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                    <td><div class="media">
                                            <div class="media-left pr-1">
                                                <?php $img = ''; ?>
                                                @if($row->media)

                                                @if($row->media->providertype=="image")
                                                <?php $img = $row->media->mediauploadpath; ?>
                                                @elseif($row->media->providertype=="youtube")
                                                <?php $img = $row->media->media_provider_image; ?>
                                                @else
                                                <?php $img = url('assets/backend/file.jpg'); ?>

                                                @endif

                                                <img class="media-object img-xl" src="{{$img}}" alt="Generic placeholder image">
                                                @endif
                                            </div>

                                        </div></td>
                                    <td>{{$row->language->language->name}}</td>

                                    <td>{{$row->language->title}}</td>
                                    <td>@if($row->status) <span class="btn btn-success">True</span> @else <span class="btn btn-danger">False</span> @endif</td>

                                    <td>
                                        <a href="{{url(\URL::Current().'/edit/'.$row->id)}}" class=" btn btn-xs btn-outline btn-primary"  id="stepEdit"><i class="fa fa-paste"></i> Update</a>
                                        <a href="{{url(\URL::Current().'/languages/'.$row->id)}}" class=" btn btn-xs btn-outline btn-info"  id="stepLanguages"><i class="fa fa-language"></i> Languages</a>


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