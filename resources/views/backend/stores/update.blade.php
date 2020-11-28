@extends('backend.layout')
@section('title','تعديل | المتاجر')
@section('content')
@include('backend.message')

<div class="row" >
    <div class="col-sm-12" style="float: right;">

        <div class="page-title-box">
            <div class="float-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">الرئيسيه</a></li>
                    <li class="breadcrumb-item"><a href="{{url('backend/stores')}}">المتاجر</a></li>
                    <li class="breadcrumb-item"><a href="">تعديل مورد</a></li>

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
                <h4 class="mt-0 header-title">تعديل المتاجر</h4>
                        @include('backend.stores.form')

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