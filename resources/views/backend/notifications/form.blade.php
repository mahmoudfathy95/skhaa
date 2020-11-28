<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
$genders=[1=>'ذكر','2'=>'أنثى'];
if (!isset($promocode)){
    $promocode = new \App\Models\Promocodes();
    $promocode->image='assets/images/avatar_image.png';
    
}
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf
                <div class="form-group">
                    <div class="form-group">


                        <div class="row col-md-12">
                           
                                <label class="control-label">@if($type==1) العملاء @elseif($type==2) المناديب @endif</label><input type="checkbox" id="checkbox" >أختار الكل
                                <select name="user_id[]" id="e1" class="form-control select2" required="" multiple="">
                                  
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                           
                            
                        </div>
                        <div class="row col-md-12">
                            <label>الرساله</label>
                            <textarea class="form-control" name="message"></textarea>
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
$("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $("#e1 > option").prop("selected","selected");
        $("#e1").trigger("change");
    }else{
    console.log('hi');
        $("#e1 > option").removeAttr("selected");
         $("#e1").trigger("change");
     }
});
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
    $(document).ready(function () {
        $('#option-add').click(function () {
            var option_html = $('#elements').find('div.option-row');
            $('.options').append(option_html.html());
            console.log(option_html.html());
        });

        //delete option on click 
        $(document).on('click', '.option-delete', function () {
            console.log($(this).parent('div.option-row').html());
            $(this).closest('div.option-row').remove();
        });
    });
</script>
</div>
</div>