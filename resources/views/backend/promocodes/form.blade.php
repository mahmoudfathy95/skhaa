<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($promocode))
    $promocode = new \App\Models\PromoCodes();
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-8">
                            <label class="control-label">Code</label>
                            <input type="text" name="code" id="promo" placeholder="Please Enter Code" class="form-control required" value="{{Functions::issetPost('code', $promocode->code)}}" required="">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label"></label>
                            <button id="gen_promo" class="form-control btn btn-info" type="button" style="margin-left: 10px;">Generate Code</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label class="control-label">Type </label>
                            <select name="type" class="form-control required" required="">
                                <option value="1" @if($promocode->type==1) selected @endif>Precentage</option>
                                <option value="2" @if($promocode->type==1) selected @endif>Fixed</option>
                            </select>
                        </div>

                          <div class="col-4">
                            <label class="control-label">Max Discount</label>
                            <input type="number" step="any" name="max_discount" placeholder="Please Enter Max Discount" class="form-control required" value="{{Functions::issetPost('max_discount', $promocode->max_discount)}}" required="">
                      
                        </div>
                          <div class="col-4">
                            <label class="control-label">Minmum Total</label>
                            <input type="number" name="min_total" placeholder="Please Enter Min total" class="form-control required" value="{{Functions::issetPost('min_total', $promocode->min_total)}}" required="">
                      
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label class="control-label">Discount  </label>
                            <input type="number" name="discount_precent" placeholder="Please Enter Discount Precentage" class="form-control required" value="{{Functions::issetPost('discount_precent', $promocode->discount_precent)}}" required="">
                      
                        </div>

                          <div class="col-6">
                            <label class="control-label">Expiration Date</label>
                            <input type="date" name="expire" placeholder="Please Enter Expiration Date" class="form-control required" value="{{Functions::issetPost('expire', $promocode->expire)}}" required="">
                      
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
                        code: {
                            required: true
                        }



                    }
                });

                $("#gen_promo").on('click', function () {
                    console.log('hi')

                    var text = "";
                    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_=+()*&^%#@~!";
                    for (var i = 0; i < 7; i++)
                        text += possible.charAt(Math.floor(Math.random() * possible.length));
                    $('#promo').val(text);
                    return false;
                });

            });
        </script>
    </div>
</div>