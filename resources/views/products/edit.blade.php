@extends('layout')
@section('title','تعديل المنتج')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php


if (!isset($product)) {
    $product = new \App\Models\products();
    $product->product_main_image = './assets/backend/images/avatar_image.png';
    $product->discount = 0;
}
else{
    $product->product_main_image = $product->product_main_image;
}

$admin_status = 0;
if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
    $admin_status = 1;
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
                    <h4 class="card-title"><b>تعديل المنتج</b><a href="{{url('backend/products')}}" class="btn btn-primary" style="float:left;">رجوع</a></h4>

                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            @if($status == 'edit')
                                <input type="hidden" name="product_id" value="{{$product->id}}" />
                            @endif
                            
                            @if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))


                            <div class="row col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">الأسم بالعربى </label>
                                    <input type="text" class="form-control" name="product_name_ar" value="{{$product->product_name_ar}}" required="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">الأسم بالانجليزى</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" required="">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> السعر</label>
                                    <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}" required="">
                                </div>

                            </div>

                            <br>
                            
                            

                            <div class="row col-sm-12">

                                <!--
                                    <div class="col-sm-3">
                                        <label class="control-label"> الخصم</label>
                                        <input type="text" class="form-control" name="discount" value="">
                                    </div>
                                -->

                                <div class="col-sm-3">
                                    <label class="control-label">نوع الخصم</label>
                                    <select class="form-control select" name="discount" required="required">
                                        <?php $discount_opts = ['NoN Discount','Value','Percent']; ?>
                                        @for($x=0; $x<3; $x++)
                                            <option value="{{$x}}" @if($product->discount) @if($x == $product->discountOption->type) selected @endif @endif>{{$discount_opts[$x]}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> قيمة الخصم</label>
                                    <input type="text" class="form-control" name="discount_value" value="@if($product->discount) {{$product->discountOption->value}} @endif">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> product number</label>
                                    <input type="text" class="form-control" name="product_number" value="{{$product->product_number}}">
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> الوحدة</label>
                                    <!--<input type="text" class="form-control" name="product_unit" value="">-->
                                    <select class="form-control select" name="product_unit" required="required">
                                        <?php $unit_opts = App\Models\units::all(); ?>
                                        @foreach($unit_opts as $unit)
                                            <option value="{{$unit->id}}" @if($unit->id == $product->product_unit) selected @endif>{{$unit->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <br>
                            <div class="row col-sm-12">

                           
                                <div class="col-sm-3">
                                    <label class="control-label"> الباركود</label>
                                    <input type="text" class="form-control" name="barcode" value="{{$product->barcode}}">
                                </div>
                            
                            
                            </div>
                            
                            <br>
                            


                            <div class="row col-sm-12">


                                    <div class="col-sm-3">
                                        <label class="control-label">أسم المدينة</label>
                                        <select class="form-control select" name="city_id" id="selectCities"  @if(! $admin_status) onchange="cahngeCityBranches(event)" @endif required="required">
                                            
                                            <?php $counter = 0; ?>

                                            @foreach($cities as $city_id => $city_name)
                                            
                                            <?php
                                                if($counter == 0){
                                                    $main_city_id = $city_id;
                                                    $counter++;
                                                }
                                                
                                            ?>

                                                <option value="{{$city_id}}" @if($city_id == $product->city_id) selected @endif >{{$city_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                            <label class="control-label"> اسم الفرع </label>
                                            <select class="form-control select" name="branch_id" id="selectBranches" required="required">
                                                @if($status == 'edit')
                                                    <?php $selectBranches = $branches[$product->city_id] ?>
                                                @else
                                                    <?php $selectBranches = $branches[$main_city_id] ?>
                                                @endif
    
                                                @foreach($selectBranches as $branch_id => $branch_name)
    
                                                    <option value="{{$branch_id}}" @if($branch_id == $product->branch_id) selected @endif >{{$branch_name}}</option>
    
                                                @endforeach
    
                                            </select>
                                        </div>

                                <div class="col-sm-3">
                                    <label class="control-label"> اسم القسم</label>
                                    <select class="form-control select" name="category_id" id="selectCategories" onchange="cahngeCategorySubs(event)" required="required">

                                        <?php $counter = 0; ?>
                                        
                                        @foreach($categories as $category_id => $category_name)
                                        
                                        <?php
                                            if($counter == 0){
                                                $main_category_id = $category_id;
                                                $counter++;
                                            }
                                            
                                        ?>

                                            <option value="{{$category_id}}" @if($category_id == $product->category_id) selected @endif >{{$category_name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                
                                <div class="col-sm-3">
                                    <label class="control-label">أسم القسم الفرعي</label>
                                    <select class="form-control select" name="subcategory_id" id="selectSubCategories" required="required">

                                        @if($status == 'edit')
                                            <?php $selectSubCategories = $sub_categories[$product->category_id] ?>
                                        @else
                                            <?php $selectSubCategories = $sub_categories[$main_category_id] ?>
                                        @endif

                                        @foreach($selectSubCategories as $subcategory_id => $subcategory_name)

                                            <option value="{{$subcategory_id}}" @if($subcategory_id == $product->category_id) selected @endif >{{$subcategory_name}}</option>

                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <br>


                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">الوصف بالعربى </label>
                                    <textarea name="product_details_ar" class="form-control required" required="">{{$product->product_details_ar}}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">الوصف بالانجليزى </label>
                                    <textarea name="product_details" class="form-control required" required="">{{$product->product_details}}</textarea>
                                </div>

                            </div>

                            <br>


                            <div class="product_main_image_cont">
                                @if($status == 'edit')

                                    <input type="hidden" id="product_main_image" name="product_main_image" value="{{$product->product_main_image}}"  />

                                @endif
                            </div>


                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                <p><label class="control-label"> صورة المنتج </label></p>
                                    <input type="file" onchange="UploadMainImage(event)" name="select_main_image" id="select_main_image" />
                                </div>
                                <div class="col-sm-6">
                                    <span id="uploaded_image">

                                        <img src="{!! ($status == 'edit')? 'uploads/' : '' !!}{{$product->product_main_image}}" class="img-thumbnail" width="300" />

                                    </span>
                                </div>

                            </div>

                            <!-- Product Image $ Gallery -->


                            <div class="product_images_cont">
                                @if($status == 'edit')
                                    @foreach($product->product_images as $image)
                                        <input type="hidden" id="product_images" name="product_images[]" value="{{$image}}"  />
                                    @endforeach
                                @endif
                            </div>

                            <!-- End Of Product Image $ Gallery -->



                        </div>
                        @else
                        
                        <div class="row col-sm-12">
                            <div class="col-sm-3">
                                <label class="control-label"> الكمية</label>
                                <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" required="">
                            </div>
                        </div>
                        
                        @endif

                        <input type="submit" style="display: none;" name="save" id="submit_product" class="btn btn-outline btn-primary" value="حفظ التغييرات" />


                    </form>

                    <br><br>

                    @if($admin_status)
                        <label>معرض المنتج</label>
                        <form method="post" action="{{url('products/uploadmultipleimages')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                            @csrf
                        </form>
    
                        <br>
                    @endif
                    
                    <div class="form-actions">
                        <div class="form-group">
                            <input type="button" id="secondary_submit_product" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>






<script>

    var status = @json($status);
    var branchesoptions = @json($branches);
    var subCategoriesOptions = @json($sub_categories);
    
@if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))

    if (status == 'add') {

        var CitiesOptions = @json($cities);
        var CategoriesOptions = @json($categories);
        //alert(JSON.stringify(Options));

        var newBranchesOptions = @json($branches[$main_city_id]);
        var newsubCategoriesOptions = @json($sub_categories[$main_category_id]);

        var $elCities = $("#selectCities");
        $elCities.empty(); // remove old options
        $.each(CitiesOptions, function(key,value) {
        $elCities.append($("<option></option>")
            .attr("value", key).text(value));
        });

        var $elBranches = $("#selectBranches");
        $elBranches.empty(); // remove old options
        $.each(newBranchesOptions, function(key,value) {
        $elBranches.append($("<option></option>")
            .attr("value", key).text(value));
        });

        var $elCategories = $("#selectCategories");
        $elCategories.empty(); // remove old options
        $.each(CategoriesOptions, function(key,value) {
        $elCategories.append($("<option></option>")
            .attr("value", key).text(value));
        });

        var $elSubCategories = $("#selectSubCategories");
        $elSubCategories.empty(); // remove old options
        $.each(newsubCategoriesOptions, function(key,value) {
        $elSubCategories.append($("<option></option>")
            .attr("value", key).text(value));
        });

    }
@endif

    function cahngeCityBranches(e) {
        //alert(e.target.value);
        var newOptions = branchesoptions[e.target.value];
        var $elBranches = $("#selectBranches");
        $elBranches.empty(); // remove old options
        $.each(newOptions, function(key,value) {
        $elBranches.append($("<option></option>")
            .attr("value", key).text(value));
        });
    }

    function cahngeCategorySubs(e) {
        //alert(e.target.value);
        var newOptions = subCategoriesOptions[e.target.value];
        var $elBranches = $("#selectSubCategories");
        $elBranches.empty(); // remove old options
        $.each(newOptions, function(key,value) {
        $elBranches.append($("<option></option>")
            .attr("value", key).text(value));
        });

    }

    $(document).ready(function () {

        $("#create_form").validate({
            rules: {
                product_name: {
                    required: true
                }
            }
        });

        $("#secondary_submit_product").click(function(){
            $("#submit_product").click();
        });

    });
</script>

<script>


    function UploadMainImage(e) {

        var formData = new FormData();
        formData.append('select_main_image', $('input[type=file]')[0].files[0]);
        formData.append('folder_path', 'products');

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
                var inp = '<input type="hidden" name="product_main_image" value="products/' + data.new_name + '"  />';
                $(".product_main_image_cont").html(inp);

            }
        });


    }



    //alert({!! json_encode($product->product_images) !!});
    var imgs = @json($product->product_images);
    var file_list = @json($product->product_images);
    var i = 0;
    //alert(imgs[0]);
    Dropzone.options.dropzone =
    {

        url: 'products/uploadmultipleimages',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
        return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        init: function() {


            this.on("addedfile", function(file) {
                //alert('added');
                //alert(file.name);
                //alert(file_list);
                //file_list[] = file.name;

            });

            let dzObj = this;
            <!-- 4 -->
            $.get('getimages?images=' + @json($product->product_images), function(data) {
                
                //console.log(data);

                <!-- 5 -->
                $.each(data, function(key,value){
                    // If the thumbnail is already in the right size on your server:
                    let mockFile = { name: value.name, size: value.size, dataURL: 'uploads/' + value.name };
                    // Call the default addedfile event handler
                    dzObj.emit("addedfile", mockFile);
                    dzObj.createThumbnailFromUrl(mockFile, dzObj.options.thumbnailWidth, dzObj.options.thumbnailHeight, dzObj.options.thumbnailMethod, true, function (dataUrl) {
                        dzObj.emit("thumbnail", mockFile, dataUrl);
                    });

                    // Make sure that there is no progress bar, etc...
                    dzObj.emit("complete", mockFile);
                    dzObj.files.push(mockFile);

                });
            });





            //dzObj.options.maxFiles = dzObj.options.maxFiles - 1;


        },
        timeout: 50000,
        removedfile: function(file)
        {

            var name = '';
            if(file.hasOwnProperty('upload')){
                //alert(file.upload.filename);
                name = file.upload.filename;
            }
            else{
                //alert(file.name);
                name = file.name;
            }

            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response)
        {
            var inp = '<input type="hidden" id="product_images" name="product_images[]" value="products/' + response.success + '"  />';
            $(".product_images_cont").append(inp);

            console.log(response.success);

        },
        error: function(file, response)
        {
            console.log(response);
            return false;
        }
    };

</script>

@stop()
