@extends(config('cms-backend-auth.extends'))
@section(config('cms-backend-auth.contentArea'))
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">{{$role->name}}</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('backend/roles')}}">ألصلاحيات</a>
                    </li>

                    <li class="breadcrumb-item">الصلاحيات
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
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="col-md-4">
                                <input name="actions[]" type="checkbox" id="checkall" >
                                <label class="control-label">Select All</label>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="row col-md-12">
                            @foreach($pages as $page)
                            <div class="col-sm-4">

                                <input type="checkbox" value="{{$page->id}}"  @if(in_array($page->id,$actions)) checked='checked' @endif name="actions[]" >
                                       <label class="control-label">{{$page->module}}.{{$page->action}}</label>

                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <button class="btn btn-purple waves-effect m-b-5" type="submit">{{trans('cms-backend-auth.save')}}</button>






                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $("#checkall").change(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<?php
\Session::forget('errors');
\Session::forget('success');
?>
@endsection