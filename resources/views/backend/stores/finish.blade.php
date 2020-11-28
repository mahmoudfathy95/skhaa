@extends('backend.layout')
@section('title','تعديل | البروفايل')
@section('content')
@include('backend.message')
<div class="row" >
    <div class="col-sm-12" style="float: right;">
        
            <div class="page-title-box">
                <div class="float-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">الرئيسيه</a></li>
                     
                        <li class="breadcrumb-item"><a href="">تعديل بروفايل</a></li>

                    </ol>
                    <!--end breadcrumb-->
                </div>

                <div class="content-header-right ">
                    <div class="media width-250 float-right">
                        <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{url('backend/users/create')}}">انشاء</a>
                    </div>
                </div>
            </div>
            </div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">تعديل برفايل</h4>
            <form method="post"  id="form">
                <div class="form-body">
                    @csrf
                
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">اسم المصنع</label>
                                <input type="text" name="name" placeholder="أدخل الاسم" class="form-control required" value="{{$supplier->name}}"  required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">المدن</label>
                                <select class="form-control required select2" name="cities" required="">
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-group">
                            <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save" />
                        </div>
                    </div>
                </div>
            </form>
                </div>
    </div>
</div>
</div>

                    <script>
                        $(document).ready(function () {

                            $("#form").validate({
                                rules: {
                                    name: {
                                        required: true
                                    },
                                    slug: {
                                        required: true
                                    },
                                    language_id: {
                                        required: true
                                    },
                                    images: {

                                    }


                                }
                            });
                        });
                    </script>
                </div>
            </form>

        </div>
    </div>
</div>






@stop()