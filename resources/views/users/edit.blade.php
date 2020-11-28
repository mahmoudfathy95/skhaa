@extends('layout')
@section('title','تعديل بيانات المستخدم')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php

$user_roles_arr = [];
if (!isset($user)) {
    $user = new \App\User();
}
else {
    foreach ($user->roles as $role) {
        $user_roles_arr[] = $role->id;
    }
}


?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<div class="container">



</div>



<div class="content-body" ><!-- Default styling start -->



    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">

        <div class="col-12"><div class="alert {!! Session::has('class') ? Session::get("class") : '' !!}" id="message">{!! Session::has('msg') ? Session::get("msg") : '' !!}</div></div>

        <div class="col-12"><div class="alert" id="message" style="display: none"></div></div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>تعديل بيانات المستخدم</b><a href="{{url('backend/users')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>
                </div>

                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="user_id" value="{{$user->id}}" />
                            @endif

                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">الاسم</label>
                                    <input class="form-control" name="name" value="{{$user->name}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">التليفون</label>
                                    <input class="form-control" name="phone" value="{{$user->phone}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"> البريد الالكتروني</label>
                                    <input class="form-control" name="email" value="{{$user->email}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> الرقم السري</label>
                                    <input class="form-control" name="password" value="@if($status == 'edit'){{trim(decrypt($user->encrypted_password))}}@endif" required="">
                                </div>

                            </div>

                            
                            <br>

                            <div class="row col-sm-12">
                                <select name="user_branch" id="user_branch">
                                    @foreach (\App\Models\branches::all() as $branch)

                                        <option value="{{$branch->id}}" @if($status == 'edit') @if($branch->id == $user->user_branch_id) selected @endif @endif>{{$branch->branch_name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            
                            <br>


                            <div class="row col-sm-12">
                                
                                @foreach (\App\Role::all() as $role)

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="roles[]" type="checkbox" @if(in_array($role->id,$user_roles_arr)) checked @endif id="inlineCheckbox{{$role->id}}" value="{{$role->id}}">
                                        <label class="form-check-label" for="inlineCheckbox{{$role->id}}">{{$role->display_name}}</label>
                                    </div>
                                    
                                    
                                @endforeach

                            </div>


                        </div>

                        <br><br>

                        <div class="form-actions">
                            <div class="form-group">
                                <input type="submit" name="save" id="submit_unit" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                            </div>
                        </div>



                    </form>

                </div>

            </div>
        </div>
    </div>


</div>

@stop()
