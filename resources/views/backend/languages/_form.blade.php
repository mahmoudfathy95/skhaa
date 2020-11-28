<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if(!isset($language))
    $language = new \App\Models\Languages;
?>
<form method="post" class="form-horizontal" id="form">
@csrf
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Name</label>
            <input type="text" name="name" placeholder="Please Enter Name" class="form-control required" value="{{Functions::issetPost('name', $language->name)}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Symbol</label>
            <input type="text" name="symbol" placeholder="Please Enter Symbol" class="form-control required" value="{{Functions::issetPost('symbol', $language->symbol)}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Direction</label>
            <div class="i-checks">
                <label> 
                    <input type="radio" name="direction" {{Functions::checkedPost('direction', $language->direction, 'rtl')}} value="rtl" required> 
                    <i></i> RTL 
                </label>
            </div>
            <div class="i-checks">
                <label> 
                    <input type="radio" name="direction" {{Functions::checkedPost('direction', $language->direction, 'ltr')}} value="ltr" required> 
                    <i></i> LTR 
                </label>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save Changes" />
    </div>
</form>
<script>
    $(document).ready(function () {

        $("#form").validate({
            rules: {
                name: {
                    required: true
                },
                symbol: {
                    required: true
                },
                rtl: {
                    required: true
                }
            }
        });
    });
</script>