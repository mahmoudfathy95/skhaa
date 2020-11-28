﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/backend/agbl-hq-globe.png">

        <!-- App title -->
        <title>{{config('cms-backend-auth.projectName')}}</title>

        <!-- App CSS -->
        <link href="{{url('assets/cms-backend-auth/bootstrap.min.css')}}" rel="stylesheet" type="text/css">


    </head>
    <body>

        <div class="container">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                     <div class="user-image">
                <img src="{{url('logo.png')}}" alt="{{config('cms-backend-auth.projectName')}}"  class="img-circle center">
            </div>
                    <div class="panel-heading">

                        <div class="panel-title">{{trans('cms-backend-auth.sign_in')}}</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{url(config('cms-backend-auth.prefix').'forget-password')}}">{{trans('cms-backend-auth.forget_password')}}</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >


                        <?php
                        if (session('error') != '')
                            $error = session('error');
                        ?>
                        @if(!empty($error))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$error}}
                        </div>
                        {!!\Session::forget('error')!!}
                        @endif



                        <form id="loginform" action="dologin"method="get" class="form-horizontal" role="form">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="{{trans('cms-backend-auth.email')}}">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="{{trans('cms-backend-auth.password')}}">
                            </div>

                            {{ csrf_field() }}


                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> {{trans('cms-backend-auth.remmember')}}
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">{{trans('cms-backend-auth.sign_in')}}</button>




                        </form>



                    </div>
                </div>
            </div>


            <script src="{{url('assets/cms-backend-auth/jquery.min.js')}}"></script>
            <script src="{{url('assets/cms-backend-auth/bootstrap.min.js')}}"></script>


            <style>
                .panel-info {
    border-color: white;
        text-align: center;
}
.img-circle{
        height: 75px;
}
            </style>
        </body>
</html>
