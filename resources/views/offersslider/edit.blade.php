@extends('layout')
@section('title','تعديل السلايدر')
@section('content')
<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>

<?php

if (!isset($offerslider)) {
    $offerslider = new \App\offersslider();
    //$offerslider->image = './assets/backend/images/avatar_image.png';
    $slider_images = [];
}
else{
    $offerslider = $offerslider[0];
    $slider_images = $offerslider->pluck('image')->toArray();
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
                    <h4 class="card-title"><b>تعديل السلايدر   </b></h4>

                </div>
                <div class="card-content collapse show">

                    <form action="{{$action}}" method="POST" class="form-horizontal" id="create_form" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}


                            <br>


                            <!--
                            <div class="row col-sm-12">

                                <div class="col-sm-6">
                                    <label class="control-label"> اسم السلايدر بالعربي</label>
                                    <input type="text" class="form-control" name="offer_name_ar" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label"> اسم السلايدر بالانجليزي</label>
                                    <input type="text" class="form-control" name="offer_name" value="" required="">
                                </div>
                            </div>
                            -->

                            <br>

                            <!-- Slider Image $ Gallery -->


                            <div class="slider_images_cont">
                                @if($status == 'edit')
                                    @foreach($slider_images as $image)
                                        <input type="hidden" id="{{$image}}" name="slider_images[]" value="{{$image}}"  />
                                    @endforeach
                                @endif
                            </div>

                            <!-- End Of Slider Image $ Gallery -->


                            <br><br>


                        </div>

                        <!-- <button class="btn btn-success">Add New</button> -->

                        
                        
                        <input type="submit" style="display: none;" name="save" id="submit_slider" class="btn btn-outline btn-primary" value="حفظ التغييرات" />



                    </form>
                    
                    <label>معرض المنتج</label>
                    <form method="post" action="{{url('offersslider/uploadmultipleimages')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                        @csrf
                    </form>

                    <br>

                    <br><br>
                    
                    <div class="form-actions">
                        <div class="form-group">
                            <input type="button" id="secondary_submit_slider" class="btn btn-outline btn-primary" value="حفظ التغييرات" />
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>





<script>

    $(document).ready(function () {

        $("#create_form").validate({
            rules: {
                offer_name: {
                    required: true
                }
            }
        });

        $("#secondary_submit_slider").click(function(){
            $("#submit_slider").click();
        });

    });
    
</script>

<script>


    var imgs = @json($slider_images);
    var file_list = @json($slider_images);
    var i = 0;
    //alert(imgs[0]);
    Dropzone.options.dropzone =
    {

        url: 'offersslider/uploadmultipleimages',
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
            $.get('getimages?images=' + @json($slider_images), function(data) {
                
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
            
            var deletedElm = document.getElementById(name);

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
                deletedElm.remove();
                return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
     
        },

        success: function(file, response)
        {
            var inp = '<input type="hidden" id="offerssliders/"' + response.success + ' name="slider_images[]" value="offerssliders/' + response.success + '"  />';
            $(".slider_images_cont").append(inp);

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
