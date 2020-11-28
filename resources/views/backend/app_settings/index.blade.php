@extends('backend.layout')

@section("title") APPSetting @stop

@section('content')
<?php
$type=request()->type;
?>
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/tags/tagsinput.css')}}">

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">APPSetting</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./backend">Home</a>
                </li>
                <li class="breadcrumb-item active">APPSetting
                </li>
            </ol>
        </div>
    </div>
</div>


<div class="content-body">
   <section id="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                         
                            @include('backend.app_settings._form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop

