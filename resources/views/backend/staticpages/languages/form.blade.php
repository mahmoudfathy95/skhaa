<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($staticpageLanguage))
    $staticpageLanguage = new \App\Models\StaticPagesLanguages();
?>
<?= \Elsayednofal\FroalaEditor\Froala::initCss(); ?>
<?= \Elsayednofal\FroalaEditor\Froala::initJs(); ?>
<div class="card-content collapse show">
    <div class="card-body">
        <form method="post" class="form-horizontal" id="form">
            <div class="form-body">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label">Title</label>
                        <input type="text" name="name" placeholder="Please Enter Title" class="form-control required" value="{{Functions::issetPost('title', $staticpageLanguage->title)}}" required="">
                    </div>
                </div>
                <div class="form-group">

                    <div class="row col-sm-12">
                        <div class="col-6">
                            <label class="control-label">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Please Enter Meta Title" class="form-control" value="{{Functions::issetPost('meta_title', $staticpageLanguage->meta_title)}}" required="">

                        </div>
                        <div class="col-6">
                            <label class="control-label">Meta KeyWord sepereted by Comma</label>
                            <input type="text" name="keywords" placeholder="Please Enter Meta KeyWords" class="form-control" value="{{Functions::issetPost('keywords', $staticpageLanguage->keywords)}}" required="">

                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-12">
                        <label class="control-label">Meta Description</label>
                        <textarea name="sub_description" placeholder="Please Enter Meta Description" class="form-control" required=""> {{Functions::issetPost('meta_description', $staticpageLanguage->meta_description)}} </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label">Description</label>
                        <textarea name="description" placeholder="Please Enter Description" class="form-control required editor" required=""> {{Functions::issetPost('description', $staticpageLanguage->description)}} </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label">Language</label>
                        <select name="language_id" required="" class="form-control">
                            <option value="">Select Language</option>

                            @foreach($languages as $language)
                            <option value="{{$language->id}}" {{Functions::selectedPost('language_id', $staticpageLanguage->language_id, $language->id)}}>{{$language->name}}</option>
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
