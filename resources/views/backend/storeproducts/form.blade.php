<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($product)) {
    $product = new \App\Models\Product();
    $product->image = './assets/backend/images/avatar_image.png';
}
$x = 0;
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="create_form" enctype="multipart/form-data">
            <div class="form-body">
                @csrf



                <div class="row col-sm-12">
                    <div class="col-sm-4">
                        <label class="control-label">العدد </label>
                        <input type="number" min="0" class="form-control" name="number" value="{{$product->number}}" required="">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label">أسم المنتج</label>
                        <select class="form-control select2" name="product_id" required="">
                        


                            @foreach($products as $one)

                            <option value="{{$one->id}}" {{Functions::selectedPost('product_id', $product->product_id, $one->id)}}>{{$one->name}}- {{$one->barcode}}</option>

                            @endforeach

                        </select>
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
        $('#option-add').click(function () {
            var option_html = $('#elements').find('div.option-row');
            $('.options').append(option_html.html());
        });
        $('#color-add').click(function () {

            var x = $('.color_id').length;
            x = x - 1;
            var option_html = $('#colors').find('div.color-row');
            var text = option_html.html();
            var res = text.replace(/_x_/g, x);
            var res = res.replace(/_y_/g, x);
            $('.colors').append(res);

        });
//delete option on click 
        $(document).on('click', '.color-delete', function () {
            console.log($(this).parent('div.color-row').html());
            $(this).closest('div.color-row').remove();
        });
    });
</script>
</div>
</div>