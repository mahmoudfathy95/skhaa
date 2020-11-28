@extends('backend.layout')
@section('title','Update Filters Language | Filters Data Languages')
@section('content')
@include('backend.message')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Filters Language Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/options')}}">Filters</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/options/languages/'.$optionLanguage->option_id)}}">Options Languages</a>
                    </li>
                    <li class="breadcrumb-item">Update Filters Language Data
                    </li>

                </ol>
            </div>
        </div>
    </div>

</div>
<div class="content-body"><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filters Language Data</h4>


                </div>

                @include('backend.options.languages.form')  

            </div>
        </div>
    </div>
</div>





@stop()