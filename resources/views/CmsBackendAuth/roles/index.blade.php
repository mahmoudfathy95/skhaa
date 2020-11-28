@extends(config('cms-backend-auth.extends'))
@section(config('cms-backend-auth.contentArea'))
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">الصلاحيه</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    
                    <li class="breadcrumb-item">الصلاحيات
                    </li>

                </ol>
            </div>
        </div>
    </div>
       <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
                <div class="input-group-btn">
               
                     <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url('backend/roles/create')}}">اضافه صلاحيه</a>
                 
            </div>    </div>
    </div>
    </div>
  <div class="content-body" ><!-- Default styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Settings Data</h4>


                </div>
                <div class="card-content collapse show">

                    @if(\Session::get('errors')!==null)


                    <div class="alert alert-danger">
                        {{\Session::get('errors')}}
                    </div>

                    @endif
                    @if(\Session::get('success')!==null)


                    <div class="alert alert-success">
                        {{\Session::get('success')}}
                    </div>

                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('cms-backend-auth.name')}}</th>
                                <th>{{trans('cms-backend-auth.setting')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key=>$role)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$role->name}}</td>
                                <td><a href="{{url(config('cms-backend-auth.prefix').'/roles/update/'.$role->id)}}" class=" btn btn-xs btn-outline btn-success" ><i class="glyphicon glyphicon-pencil"></i> {{trans('cms-backend-auth.update')}}</a>
                                    <a href="{{url(config('cms-backend-auth.prefix').'/roles/delete/'.$role->id)}}" onclick="return confirm('are you sure you want delete this page')" class=" btn btn-xs btn-outline btn-danger" ><i class="glyphicon glyphicon-trash"></i> {{trans('cms-backend-auth.delete')}}</a>
                                    <a href="{{url(config('cms-backend-auth.prefix').'/roles/actions/'.$role->id)}}"  class=" btn btn-xs btn-outline btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> {{trans('cms-backend-auth.roles-actions')}}</a>
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
<?php
\Session::forget('errors');
\Session::forget('success');
?>
@endsection