<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf


                <div class="form-group">
                    <div class="row col-md-12">
                        <div class="col-md-6">

                            <label class="control-label">Balance</label>
                            <input name="balance" required="" class="form-control" type="number" placeholder="Please Insert Balance">

                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Description</label>
                            <textarea name="description" required="" class="form-control" ></textarea>
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
                        statue_id: {
                            required: true
                        }



                    }
                });
            });

        </script>
    </div>
</div>