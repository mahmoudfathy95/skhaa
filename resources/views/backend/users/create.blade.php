@extends('backend.layout')
@section('title','انشاء | المستخدمين')
@section('content')
@include('backend.message')
<div class="row" >
    <div class="col-sm-12" style="float: right;">
        
            <div class="page-title-box">
                <div class="float-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">الرئيسيه</a></li>
                        <li class="breadcrumb-item"><a href="{{url('backend/users')}}">الأطفال</a></li>
                        <li class="breadcrumb-item"><a href="">أنشاء طفل</a></li>

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
            <h4 class="mt-0 header-title">انشاء طفل</h4>
            <form method="post"  id="form">
                <div class="form-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">الاسم</label>
                                <input type="text" name="name" placeholder="أدخل الأسم" class="form-control required"  required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">الرقم التسلسلى</label>
                                <input type="text" name="serial_number" placeholder="ادخل الرقم التسلسلى" class="form-control required"  required="">

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">رقم الهاتف</label>
                                <input type="text" name="phone" placeholder="أدخل رقم الهاتف" class="form-control required"  required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">تاريخ الميلاد</label>
                                <input type="date" name="date_of_birth" placeholder="أدخل تاريخ الميلاد" class="form-control required"  >

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">


                            <div class="col-6">
                                <label class="control-label">الأعاقه</label>
                                <input type="text" name="disablity" placeholder="أدخل الأعاقة" class="form-control required"  >

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">الرقم السرى</label>
                                <input type="password" name="password" placeholder="أدخل الرقم السرى" class="form-control required"  required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">اعاده الرقم السرى</label>
                                <input type="password" name="confirm_password" placeholder="أدخل اعاده الرقم السرى" class="form-control required"  >

                            </div>
                        </div>
                    </div>
                         <div class="text-center">
                        <button type="button" title="Add New" class="btn btn-primary" id="option-add"><i class="fa fa-plus-square"></i></button>
                    </div>
                                        <div class="options">
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
     <div id="elements" style="display: none">
            <div class="row option-row">
                <div class="row option-row">
               
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">فريق العمل</label>
                            <input type="text" name="doctors[]" value="" placeholder="فريق العمل" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-2">
                        <br/><br/>
                        <button title="Remove Row" type="button"  class="btn btn-danger option-delete"><i class="fa fa-times-circle"></i></button>
                    </div>
                </div>
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
                            $('#option-add').click(function () {
                    var option_html = $('#elements').find('div.option-row');
                    $('.options').append(option_html.html());
                });

                //delete option on click 
                $(document).on('click', '.option-delete', function () {
                    console.log($(this).parent('div.option-row').html());
                    $(this).closest('div.option-row').remove();
                });
                        });
                    </script>
                </div>
            </form>

        </div>
    </div>
</div>






@stop()