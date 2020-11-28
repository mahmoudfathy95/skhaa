@extends('backend.layout')
@section('title','Languages Data')
@section('content')
<div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Options Data</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item">Options Data
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
                <h4 class="card-title">Options Data</h4>
           
             
            </div>
            <div class="card-content collapse show">
               
                <div class="table-responsive">
                    <table class="table">
                       <thead>
                                            <tr>
                                                <th>Slug</th>
                                                <th>Name</th>
                                                <th>Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $row)
                                            <tr>
                                                <td>{{$row->slug}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    <a href="{{url(\URL::Current().'/edit/'.$row->id)}}" class=" btn btn-xs btn-outline btn-primary" data-action="options.edit" id="stepEdit"><i class="fa fa-paste"></i> Update</a>
                                                    <a href="{{url(\URL::Current().'/languages/'.$row->id)}}" class=" btn btn-xs btn-outline btn-info" data-action="options.languages" id="stepLanguages"><i class="fa fa-language"></i> Languages</a>
                                                    @if(count($row->optionsValues))
                                                    <a href="{{url(\URL::Current().'/option-values/'.$row->id)}}" class=" btn btn-xs btn-outline btn-info" data-action="options.optionvalues"><i class="fa fa-list-ol"></i> Option Values</a>
                                                    @endif
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
                                                                            <strong style="font-size: 18px;">Name</strong> : {{$row->name}}
                                                                        </p>

                                                          
                                                                        <p>
                                                                            <strong style="font-size: 18px;">Create By</strong> : 
                                                                            {{$row->language->name}} 
                                                                        </p>
                                                                    </blockquote>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!!Themes::deleteRow($row->id, url(\URL::Current().'/delete'),['data-action'=>"options.delete"])!!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$result->render()}}
                </div>
             
            </div>
        </div>
    </div>
</div>


        </div>
@stop()