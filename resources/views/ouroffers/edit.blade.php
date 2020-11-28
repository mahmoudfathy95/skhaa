@extends('layout')
@section('title','تعديل عروضنا')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php



if (!isset($ouroffer)) {
    $ouroffer = new \App\ouroffers();
    $ouroffer->ouroffer_main_image = './assets/backend/images/avatar_image.png';
    //$ouroffer->ouroffer_product = '';
    $ouroffer->ouroffer_products = [];
}
else{
    $ouroffer = $ouroffer[0];
}

//$single_or_multi_arr = ['0' => 'Single Product' , '1' => 'Multiple Products']




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
                    <h4 class="card-title"><b>تعديل عروضنا</b><a href="{{url('backend/ouroffers')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>


                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="ouroffer_id" value="{{$ouroffer->id}}" />
                            @endif

                            <br>

                            <div class="row col-sm-12">

                                @if(! auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))

                
                                    <?php

                                        $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                                        $user_branch_id = $user_branch[0]->branch_id;

                                    ?>

                                @endif

                             

                            </div>

                            <br><br>
                            
                            <div class="row col-sm-12">

                                <div class="col-sm-8">
                                    <label class="control-label">  المنتجات داخل العرض </label>
                                    <!--<select  class="mdb-select md-form" multiple name="branch_id" id="selectBranchProducts" required="required">-->
                                    <select class="selectpicker dropdown-dense" name="ouroffer_products[]" multiple="multiple" id="selectBranchProducts" required="required" data-width="100%" data-size="4" data-selected-text-format="count > 3" title="اختر من المنتجات التالية..." data-actions-box="true" data-header="اضافة المنتجات" data-live-search="true" data-live-search-placeholder="بحث...">

                                        <optgroup label="منتجات الفرع">
                                        
                                            <?php
                                                $BranchProducts = \App\Models\products::all()->pluck('product_name_ar','id')->toArray();
                                                //$selectBranchProducts = $branches[$ouroffer->city_id]
                                            ?>
                                        
                                        

                                        @foreach($BranchProducts as $product_id => $product_name)

                                            <option value="{{$product_id}}" @if(in_array($product_id , $ouroffer->ouroffer_products)) selected @endif >{{$product_name}}</option>

                                        @endforeach



                                    </optgroup>

                                    </select>
                                </div>

                            </div>
                            <br><br>

                        </div>

                        <div class="form-actions">
                            <div class="form-group">
                                <input type="submit" name="save" id="submit_ouroffer" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
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
                ouroffer_name: {
                    required: true
                }
            }
        });

        $("#secondary_submit_ouroffer").click(function(){
            $("#submit_ouroffer").click();
        });

    });
</script>

<script>


    function UploadMainImage(e) {

        var formData = new FormData();
        formData.append('select_main_image', $('input[type=file]')[0].files[0]);
        formData.append('folder_path', 'ouroffers');

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
                var inp = '<input type="hidden" name="ouroffer_main_image" value="ouroffers/' + data.new_name + '"  />';
                $(".ouroffer_main_image_cont").html(inp);

            }
        });


    }





</script>

@stop()
