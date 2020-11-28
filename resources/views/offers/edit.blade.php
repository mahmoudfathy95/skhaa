@extends('layout')
@section('title','تعديل العرض')
@section('content')

<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

?>

<?php


if (!isset($offer)) {
    $offer = new \App\Models\offers();
    $offer->offer_main_image = './assets/backend/images/avatar_image.png';
    $offer->offer_products = [];
}
else{
    $offer = $offer[0];
}

$single_or_multi_arr = ['0' => 'Single Product' , '1' => 'Multiple Products']




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
                    <h4 class="card-title"><b>تعديل العرض</b><a href="{{url('backend/offers')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>
                    

                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="offer_id" value="{{$offer->id}}" />
                            @endif

                            <br>

                            <div class="row col-sm-12">


                                <div class="col-sm-3">
                                    <label class="control-label"> اسم العرض بالعربي</label>
                                    <input type="text" class="form-control" name="offer_name_ar" value="{{$offer->offer_name_ar}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> اسم العرض بالانجليزي</label>
                                    <input type="text" class="form-control" name="offer_name" value="{{$offer->offer_name}}" required="">
                                </div>

                            </div>

                            <br>


                            <div class="offer_main_image_cont">
                                @if($status == 'edit')

                                    <input type="hidden" id="offer_main_image" name="offer_main_image" value="{{$offer->offer_main_image}}" />

                                @endif
                            </div>


                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                <p><label class="control-label"> صورة العرض </label></p>
                                    <input type="file" onchange="UploadMainImage(event)" name="select_main_image" id="select_main_image" />
                                </div>
                                <div class="col-sm-6">
                                    <span id="uploaded_image">

                                        <img src="{!! ($status == 'edit')? 'uploads/' : '' !!}{{$offer->offer_main_image}}" class="img-thumbnail" width="300" />

                                    </span>
                                </div>

                            </div>


                            <br><br>


                            <div class="row col-sm-12">

                                <div class="col-sm-4">
                                    <label class="control-label">نوع العرض  </label>
                                    <select class="form-control select" name="single_or_multi" id="selectSingleOrMulti" onchange="cahngeSingleOrMulti(event)" required="required">

                                        @for($i =0; $i<2; $i++)
                                            <option value="{{$i}}" @if($i == $offer->single_or_multi) selected @endif >{{$single_or_multi_arr[$i]}}</option>
                                        @endfor

                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label class="control-label">  المنتجات داخل العرض </label>
                                    <!--<select  class="mdb-select md-form" multiple name="branch_id" id="selectBranchProducts" required="required">-->
                                    <select class="selectpicker dropdown-dense" @if($offer->single_or_multi == '1') multiple="multiple" @endif name="offer_products[]" id="selectBranchProducts" required="required" data-width="100%" data-size="4" data-selected-text-format="count > 3" title="اختر من المنتجات التالية..." data-actions-box="true" data-header="اضافة المنتجات" data-live-search="true" data-live-search-placeholder="بحث...">

                                        <optgroup label="منتجات الفرع">
                                        
                                        <?php
                                            $BranchProducts = \App\Models\products::all()->pluck('product_name_ar','id')->toArray();
                                            //$selectBranchProducts = $branches[$ouroffer->city_id]
                                        ?>

                                        @foreach($BranchProducts as $product_id => $product_name)

                                            <option value="{{$product_id}}" @if(in_array($product_id,$offer->offer_products)) selected @endif >{{$product_name}}</option>

                                        @endforeach



                                    </optgroup>

                                    </select>
                                </div>

                            </div>
                            
                            <br>


                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">الوصف بالعربى </label>
                                    <textarea name="offer_details_ar" class="form-control required" required="">{{$offer->offer_details_ar}}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">الوصف بالانجليزى </label>
                                    <textarea name="offer_details" class="form-control required" required="">{{$offer->offer_details}}</textarea>
                                </div>

                            </div>

                            <br>
                            

                            <div class="row col-sm-12">

                                <div class="col-sm-4">
                                    <label class="control-label">من  </label>
                            
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                      <input placeholder="Select date" type="date" name="offer_from" value="{{$offer->offer_from}}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label class="control-label">الى  </label>
                            
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                      <input placeholder="Select date" type="date" name="offer_to" value="{{$offer->offer_to}}" class="form-control">
                                    </div>
                                    
                                </div>
                            
                            </div>


                            <br><br>
                            <!--
                                <select class="selectpicker dropdown-dense" multiple data-width="100%" data-size="4" data-selected-text-format="count > 3" data-style="btn-primary" title="Choose one of the following..." data-actions-box="true" data-header="اضافة المنتجات" data-live-search="true" data-live-search-placeholder="بحث...">
                                    <optgroup label="Branch Products">
                                        <option data-subtext="Heinz">Ketchup</option>
                                        <option title="Combo 1" >Relish</option>
                                        <option>Tent</option>
                                    </optgroup>
                                    <optgroup label="Camping" data-max-options="2">
                                        <option>Tent</option>
                                        <option>Flashlight</option>
                                        <option>Toilet Paper</option>
                                    </optgroup>
                                </select>
                            -->

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


    function cahngeSingleOrMulti(e) {
        if (e.target.value == 0) {
            $('#selectBranchProducts').removeAttr("multiple");
            $('#selectBranchProducts').selectpicker('destroy');
            $('#selectBranchProducts').selectpicker();
        }
        else{
            $('#selectBranchProducts').attr("multiple","true");
            $('#selectBranchProducts').selectpicker('destroy');
            $('#selectBranchProducts').selectpicker();
            $('#selectBranchProducts').selectpicker('refresh');
        }
    }

    function ChangeBranchProducts(e) {

        @if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))
            var branch_id = e.target.value;

            $.get("getBranchProducts?branch_id="+branch_id, function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
                console.log(data);
                var newBranchProductsOptions = data;
                var $elBranchProducts = $("#selectBranchProducts");

                $elBranchProducts.empty(); // remove old options
                $elBranchProducts.selectpicker('destroy');

                $.each(newBranchProductsOptions, function(key,value) {
                $elBranchProducts.append($("<option></option>")
                    .attr("value", key).text(value));
                });

                $elBranchProducts.selectpicker('render');

            });

        @endif

    }



    var status = @json($status);


    $(document).ready(function () {

        $("#create_form").validate({
            rules: {
                offer_name: {
                    required: true
                }
            }
        });

        $("#secondary_submit_offer").click(function(){
            $("#submit_offer").click();
        });

    });
</script>

<script>


    function UploadMainImage(e) {

        var formData = new FormData();
        formData.append('select_main_image', $('input[type=file]')[0].files[0]);
        formData.append('folder_path', 'offers');

        //event.preventDefault();
        $.ajax({
            headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
            url:"{{ route('ajaxupload.action') }}",
            type:"POST",
            data: formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
                var inp = '<input type="hidden" name="offer_main_image" value="offers/' + data.new_name + '"  />';
                $(".offer_main_image_cont").html(inp);

            }
        });


    }





</script>

@stop()
