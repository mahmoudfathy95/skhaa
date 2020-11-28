@extends(config('cms-backend-auth.extends'))
@section(config('cms-backend-auth.contentArea'))
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">معلومات المديرين</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/backend_users')}}">المديرين</a>
                    </li>
                    <li class="breadcrumb-item">اضافه مدير
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
                    <h4 class="card-title">المديرين</h4>


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
                    <div class="card-body">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{trans('cms-backend-auth.name')}}</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" placeholder="{{trans('cms-backend-auth.enter-user-name')}}" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{trans('cms-backend-auth.email')}}</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" name="email" placeholder="{{trans('cms-backend-auth.enter-user-email')}}" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{trans('cms-backend-auth.role')}}</label>
                            <div class="col-md-10">
                                <select class="form-control" name="role_id" required="">
                                    <option value="">{{trans('cms-backend-auth.choose-role')}}</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" >{{trans('cms-backend-auth.password')}}</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" placeholder="{{trans('cms-backend-auth.enter-password')}}" required="">
                            </div>
                        </div>

                      
                        {{ csrf_field() }}
                        <button class="btn btn-purple waves-effect m-b-5" type="submit">{{trans('cms-backend-auth.save')}}</button>






                    </form>
                < </div>

            </div>
        </div>
    </div>
</div>


<?php
\Session::forget('errors');
\Session::forget('success');
?>
@endsection