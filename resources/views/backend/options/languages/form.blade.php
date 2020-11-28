<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($optionLanguage))
    $optionLanguage = new \App\Models\OptionsLanguages;
?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" placeholder="Please Enter Name" class="form-control required" value="{{Functions::issetPost('name', $optionLanguage->name)}}" required="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label">Language</label>
                        <select name="language_id" required="" class="form-control">


                            @foreach($languages as $language)
                            @if($language->symbol=='en')

                            <option value="{{$language->id}}" {{Functions::selectedPost('language_id', $optionLanguage->language_id, $language->id)}}>{{$language->name}}</option>
                            @endif
                            @endforeach
                        </select>
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
                        },
                        language_id: {
                            required: true
                        }


                    }
                });
            });
        </script>
    </div>
</div>
