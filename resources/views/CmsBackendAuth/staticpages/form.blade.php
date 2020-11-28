<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($staticpage))
    $staticpage = new \App\Models\StaticPages();

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
                    <div class="row">

                        <div class="col-6">
                            <label class="control-label">Title</label>
                            <input type="text" name="name" placeholder="Please Enter Title" class="form-control required" value="{{Functions::issetPost('title', $staticpageLanguage->title)}}" required="">
                        </div>
                        <div class="col-6">
                            <label class="control-label">Slug</label>
                            <input type="text" name="slug" placeholder="Please Enter Slug" class="form-control required" value="{{Functions::issetPost('slug', $staticpage->slug)}}" required="">

                        </div>
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
                <input type="hidden" name="media_id" value="{{Functions::issetPost('media_id', $staticpage->media_id)}}">
                <div class="form-group">
                    <div class="col-sm-12" id="image-container">
                        <label class="control-label">Image</label>
                        @if($staticpage->media) 
                        <a href="#" class="featured-preview set-post-thumbnail"><img  height="150px" width="100px" src="{{URL('uploads/'.$staticpage->media->media_path)}}"></a>
                        @endif
                        <div class="row">
                            <a href="#" class="set-post-thumbnail btn btn-blue">Set Media</a>
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
                $(function () {
                    $(".set-post-thumbnail").click(function (e) {
                        e.preventDefault();
                    });
                    $(".set-post-thumbnail").filemanager({

                        done: function (files) {
                            if (files.length) {
                                var formContainer = $('#create_form');
                                var imageContainer = $('#image-container');
                                var file = files[0];
                                imageContainer.find($('a.featured-preview')).remove();
                                $('#featured_image_id').remove();
                                imageContainer.append($('<input>', {
                                    'type': 'hidden',
                                    'name': 'media_id',
                                    'id': 'featured_image_id',
                                    'value': file.media_id
                                }));
                                imageContainer.prepend($('<a>', {
                                    'href': '#',
                                    'class': 'featured-preview set-post-thumbnail'
                                }).append($('<img>', {
                                    'src': file.media_thumbnail,
                                    'width': '150px',
                                    'height': '100px',
                                })));
                            }
                        },

                    });
                });
            });
        </script>
    </div>
</div>