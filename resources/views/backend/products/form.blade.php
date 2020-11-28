<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($product)) {
    $product = new \App\Models\Product();
    $product->image = './assets/backend/images/avatar_image.png';
}
$ids = \App\Models\MainSpecialistProducts::where('product_id', $product->id)->pluck('category_id')->toArray();
$fids = \App\Models\FiltersProducts::where('product_id', $product->id)->pluck('filter_id')->toArray();
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="create_form" enctype="multipart/form-data">
            <div class="form-body">
                @csrf



                <div class="row col-sm-12">
                    <div class="col-sm-4">
                        <label class="control-label">الأسم بالعربى </label>
                        <input type="text" class="form-control" name="name_ar" value="{{$product->name_ar}}" required="">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label">الأسم بالانجليزى</label>
                        <input type="text" class="form-control" name="name_en" value="{{$product->name_en}}" required="">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label">أسم ألقسم</label>
                        <select class="form-control select2" name="category_id[]" required="" multiple="">


                            @foreach($categories as $category)


                            <option value="{{$category->id}}" @if(in_array($category->id, $ids)) selected @endif >{{$category->name}}</option>

                            @endforeach

                        </select>
                    </div>



                </div>
                <div class="row col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">الوصف بالعربى </label>
                        <textarea name="description_ar" class="form-control required" required="">{{$product->description_ar}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">الوصف بالانجليزى </label>
                        <textarea name="description_en" class="form-control required" required="">{{$product->description_en}}</textarea>
                    </div>

                </div>
                <div class="row col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">أسم الفلتر</label>
                        <select class="form-control select2" name="filter_id[]" required="" multiple="">


                            @foreach($filters as $filter)


                            <option value="{{$filter->id}}"@if(in_array($filter->id, $fids)) selected @endif> {{$filter->name}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">ألوحده</label>
                        <select class="form-control select2" name="volume_id" required="" >


                            @foreach($volumes as $one)


                            <option value="{{$one->id}}"@if($one->id== $product->volume_id)) selected @endif> {{$one->name}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">الباركود</label>
                        <input type="text" class="form-control" name="barcode" value="{{$product->barcode}}"/>
                    </div> <div class="col-sm-6">
                        <label class="control-label">طريقه التحضير</label>
                        <select class="form-control select2" name="prepare_id" >
                            <option value=""></option>

                            @foreach($prepares as $prepare)


                            <option value="{{$prepare->id}}" @if($prepare->id== $product->prepare)) selected @endif> {{$prepare->name}}</option>

                            @endforeach

                        </select>
                    </div>
                    
                </div>
                <div class="row col-sm-12">
                    <div class="col-sm-5">
                        <label class="control-label">السعر </label>
                        <input type="number" step="any"  class="form-control" name="price" value="{{$product->price}}" required="">
                    </div>
                    <div class="col-sm-5">
                        <label class="control-label"> الخصم </label>
                        <input type="number" step="any"  class="form-control" min="0" name="discount" value="{{$product->discount}}" required="">
                    </div>
                <div class="row col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label"> الصوره </label>
                        <?= Components::uploader($product->image); ?>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="label-control" >
                                الصور :</label>
                            <input type="file" id="file" multiple=""/>
                            <img src="./assets/images/loading.gif" style="display: none" id="image-loading"/>
                            <div id="images">
                                @foreach($product->images as $image)
                                <div class="file" style="font-size: 11px;"><a href="javascript:void(0)" class="remove-sec-attach"><i class="fa fa-trash text-danger" aria-hidden="true"></i> </a> <img style="height:150px" src="{{$image->image_id}}"  />
                                    <input type="hidden" name="images[]" value="{{$image->image_id}}"  /></div> <br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                </div>



            </div>


    </div>
    <div class="form-actions">
        <div class="form-group">
            <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save Changes" />
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {

        $("#form").validate({
            rules: {
                name: {
                    required: true
                }




            }
        });
    });
    $(document).ready(function () {
           $('.remove-sec-attach').click(function () {
       console.log('hi');
            $(this).closest('div.file').remove();
        });
        $('#file').change(function(){
        var file_data = document.getElementById('file').files.length;
        console.log(file_data);
        var form_data = new FormData();
        for (var index = 0; index < file_data; index++) {
        form_data.append("files[]", document.getElementById('file').files[index]);
        }
        $('#image-loading').show();
        $.ajax({
        url: './backend/upload', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response){
                var data = jQuery.parseJSON(response);
                //alert(response);
                if (data.status === 'ok'){
                    console.log(data.data);
                $('#image-loading').hide();
                for(var i=0;i<data.data.length;i++){
                $('#images').append('<div class="file" style="font-size: 11px;"><a href="javascript:void(0)" class="remove-sec-attach"><i class="fa fa-trash text-danger" aria-hidden="true"></i> </a> <img style="height:150px" src="' + data.data[i] + '"><input type="hidden" name="images[]" value="' + data.data[i] + '"  /></div> <br/>');
        }
} else{
                $('#{name}-result').html('<div class="alert alert-danger alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' +
                        '' + data.data + '.</div>');
                $('#{name}-loading').hide();
                $('#upload-{name}').show();
                }
                }
        });
        });
           
    });
</script>
</div>
</div>