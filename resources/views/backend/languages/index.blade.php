@extends('backend.layout')
@section('title','Languages Data')
@section('content')
@include('backend.message')

<?php 
use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Languages Data</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item">Languages Data
                  </li>
                
                </ol>
              </div>
                 
            </div>
          </div>
           <div class="content-header-right col-md-6 col-12">
                      <div class="media width-250 float-right">
                      <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url(\URL::Current().'/create')}}">Create</a>
                  </div>
                  </div
        </div>
        </div>
        <div class="content-body"><!-- Default styling start -->

<!-- Default styling end -->
<!-- Table header styling start -->
<div class="row" id="header-styling">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Languages Data</h4>
           
             
            </div>
            <div class="card-content collapse show">
               
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-success">
                            <tr>
                                <th>Name</th>
                                <th>Symbol</th>
                                <th>Direction</th>
                                <th data-action="languages.defaulting" id="stepIsDefault">Is Default</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($languages as $language)
                                            <tr>
                                                <td>{{$language->name}}</td>
                                                <td>{{$language->symbol}}</td>
                                                <td>@if($language->direction == 'ltr') <span class="label label-primary font-bold">{{$language->direction}}</span> @else <span class="label label-warning font-bold">{{$language->direction}}</span> @endif</td>
                                             
                                                <td>{!!Themes::radioInput('is_default',$language->id, url(\URL::Current().'/defaulting'),Functions::checked($language->is_default, true),['data-action'=>"languages.defaulting"])!!}</td>
                                                <td>
                                                    <a href="{{url(\URL::Current().'/edit/'.$language->id)}}" class=" btn btn-xs btn-outline btn-primary" data-action="languages.edit" id="stepEdit"><i class="fa fa-paste"></i> Update</a>
                                                    <a href="{{url(\URL::Current().'/files/'.$language->id)}}" class=" btn btn-xs btn-outline btn-info" data-action="languages.files" id="stepFiles"><i class="fa fa-file-code-o"></i> Files</a>
                                                   
                                                    {!!Themes::deleteRow($language->id, url(\URL::Current().'/delete'),['data-action'=>"languages.delete"])!!}
                                                    {!!Themes::checkboxInput($language->is_active, $language->id, url(\URL::Current().'/activated'),  Functions::checked($language->is_active, true),['data-action'=>"languages.activated"])!!}
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