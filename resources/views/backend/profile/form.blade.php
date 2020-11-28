<?php
dd('hi');
use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
$supplier = \App\Models\Supplier::where('store_id', \Session::get('backendUser')->id)->first();

if (!is_object($supplier)) {
    $supplier = new \App\Models\Supplier();
if(Functions::getCurrent()['status']==true){
    $supplier->lat=Functions::getCurrent()['lat'];
    $supplier->lng=Functions::getCurrent()['lng'];
}

}

?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">

                <div class="form-group">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                    <div class="form-group">
                        <div class="form-group">
                            <div class="row col-sm-12">
                                <div class="col-6">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control required" value="{{$supplier->name}}" name="name" required="">
                                </div>

                                <div class="col-6">
                                    <label>معلومات الاتصال</label>
                                    <textarea name="contact" class="form-control required" required="">{{$supplier->contact}}</textarea>
                                </div>
                                <div class="col-6">
                                    <label>معلومات الدفع</label>
                                    <textarea name="payment_info" class="form-control required" required="">{{$supplier->payment_info}}</textarea>
                                </div>
                            </div>
                   
                            <div class="row">
                                <label>الموقع</label>

                                <?= Components::editGoogleMap1($supplier->lat, $supplier->lng, $supplier->zoom) ?>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-actions">
                    <div class="form-group">
                        <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save Changes" />
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function () {

                $("#form").validate({
                    rules: {

                        password: {
                            required: true
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#password"
                        }


                    }
                });
            });
        </script>
    </div>
</div>