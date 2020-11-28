<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" action="{{url('backend/orders/update_status/'.$order->id)}}" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf


                <div class="form-group">
                    <div class="row col-md-12">
                        <div class="col-md-6">

                            <label class="control-label">الحاله</label>
                            <select name="statue_id" required="" class="form-control">
                                <option value="">Change Status</option>
                                @foreach(status as $key=>$statue)
                                <option @if($order->status_id==$key) selected @endif value="{{$key}}">{{$statue}}</option>
                                @endforeach
                            </select>

                        </div>
                      

                    </div>
                    <div class="row col-md-12">
                        <label class="control-label">تنبيه العميل</label>
                        <input type="checkbox" name="alert" value="1">
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
                        statue_id: {
                            required: true
                        }



                    }
                });
            });

        </script>
    </div>
</div>