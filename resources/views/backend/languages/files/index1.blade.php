@extends('backend.layout')
@section('title','Language '.$language->name.' Files Data')
@section('content')
@include('backend.message')
<link href="./assets/backend/ui/css/plugins/codemirror/codemirror.css" rel="stylesheet">
<link href="./assets/backend/ui/css/plugins/codemirror/ambiance.css" rel="stylesheet">
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Language {{$language->name}} Files Data</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li data-action="languages.index">
                <a href="{{url('backend/languages')}}">Languages</a>
            </li>
            <li class="active">
                <strong>Language {{$language->name}} Files</strong>
            </li>
        </ol>
    </div>
</div>
<div class="fh-breadcrumb animated fadeInRight">

    <div class="full-height">
        <div class="full-height-scroll border-left">

            <div class="element-detail-box">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5></h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">
                                        <form method="post" class="form-horizontal">
                                            @foreach($files as $key=>$file)
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false" class="collapsed"><i class="fa fa-file-text-o"></i> {{ucfirst(basename($file))}}
                                                            <div class="agile-detail">
                                                                Last Modified: <?php $date = \File::lastModified($file);?>
                                                                <i class="fa fa-clock-o"></i> {{date('Y/m/d &\nb\sp; g:i A ', $date)}}
                                                            </div></a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <input type="hidden" name="source_file" value="{{$file}}" />
                                                        <textarea name="content" class="code_text" id="code_{{$key}}" data-id="{{$key}}">
                                                        {{\File::get($file)}}
                                                        </textarea>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="sk-spinner sk-spinner-wave loading">
                                                            <div class="sk-rect1"></div>
                                                            <div class="sk-rect2"></div>
                                                            <div class="sk-rect3"></div>
                                                            <div class="sk-rect4"></div>
                                                            <div class="sk-rect5"></div>
                                                        </div>
                                                        <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save Changes" />
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@stop()
@section('js')
<!-- CodeMirror -->
<script src="./assets/backend/ui/js/plugins/codemirror/codemirror.js"></script>
<script src="./assets/backend/ui/js/plugins/codemirror/mode/javascript/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.loading').hide();
    myTextarea = document.getElementsByClassName("code_text");
    var cm = new Array();
    for (i = 0; i < myTextarea.length; i++) {

        cm[i] = CodeMirror.fromTextArea($(myTextarea[i])[0], {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true,
            lineWrapping: true,
            indentUnit: 4,
            height: 500,
            theme: "ambiance"
        });
    }
    ;

    $("input[name=save]").on("click", function (e) {
        e.preventDefault();
        var source_file = $(this).closest(".panel-body").find("input[name=source_file]").val();
        var editor_id = $(this).closest(".panel-body").find("textarea[name=content]").data('id');
        var content = cm[editor_id].getValue();
        $.ajax({
            url: '<?= url('backend/languages/files/' . $language->id); ?>',
            method: 'POST',
            data: {
                source_file: source_file,
                content: content
            },
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (result)
            {
                $('.loading').hide();
            },
            complete: function () {
                $('.loading').hide();
            }
        });
    });

});
</script>
@stop()
