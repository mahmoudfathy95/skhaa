@extends('layout')
@section('title','تعديل أحدث المنتجات')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($newproducts)) {
    $new_products = new \App\newproducts();
    $new_products->product_id = '';
    $new_products->new_products = [];
}
else{

    $new_products = $newproducts;


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

                    <h4 class="card-title"><b>تعديل المنتج</b><a href="{{url('backend/newproducts')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}


                            <br><br>


                            <div class="row col-sm-12">

                                <div class="col-sm-8">
                                    <label class="control-label">  المنتجات </label>
                                    <!--<select  class="mdb-select md-form" multiple name="branch_id" id="selectBranchProducts" required="required">-->
                                    <select class="selectpicker dropdown-dense" name="new_products[]" multiple="multiple" id="selectBranchProducts" required="required" data-width="100%" data-size="4" data-selected-text-format="count > 3" title="اختر من المنتجات التالية..." data-actions-box="true" data-header="اضافة المنتجات" data-live-search="true" data-live-search-placeholder="بحث...">

                                        <optgroup label="منتجات الفرع">
                                       
                                            <?php
                                                $BranchProducts = \App\Models\products::all()->pluck('product_name_ar','id')->toArray();
                                                $new_products_arr = $new_products->pluck('product_id')->toArray();
                                                //dd($new_products);

                                            ?>
                                       

                                        @foreach($BranchProducts as $product_id => $product_name)

                                            <option value="{{$product_id}}" @if(in_array($product_id , $new_products_arr)) selected @endif >{{$product_name}}</option>

                                        @endforeach



                                    </optgroup>

                                    </select>
                                </div>

                            </div>
                            <br><br>


                        </div>

                        <div class="form-actions">
                            <div class="form-group">
                                <input type="submit" name="save" id="submit_offer" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                            </div>
                        </div>



                    </form>

                    <br><br>


                </div>
            </div>
        </div>
    </div>


</div>





<script>


    $(function () {
        $('#selectBranchProducts').selectpicker();
    });



    $(document).ready(function () {

        $("#create_form").validate({
            rules: {
                name: {
                    required: true
                }
            }
        });

        $("#secondary_submit_offer").click(function(){
            $("#submit_offer").click();
        });

    });
</script>


@stop()
