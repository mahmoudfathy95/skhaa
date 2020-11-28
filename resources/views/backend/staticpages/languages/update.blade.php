@extends('backend.layout')
@section('title','Update StaticPage Language | StaticPages Data Languages')
@section('content')
@include('backend.message')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">StaticPages Language Data</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/staticpages')}}">StaticPages</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/staticpages/languages/'.$staticpageLanguage->static_page_id)}}">StaticPage Languages</a>
                    </li>
                    <li class="breadcrumb-item">Update StaticPages Language Data
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
                    <h4 class="card-title">StaticPages Language Data</h4>


                </div>

                @include('backend.staticpages.languages.form')  

            </div>
        </div>
    </div>
</div>





@stop()