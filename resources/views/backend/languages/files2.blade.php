@extends('backend.layout')
@section('title','Language '.$language->name.' Files Data')
@section('content')
@include('backend.message')
<link href="./assets/backend/ui/css/plugins/codemirror/codemirror.css" rel="stylesheet">
<link href="./assets/backend/ui/css/plugins/codemirror/ambiance.css" rel="stylesheet">
<?php

use App\Http\Controllers\Helpers\Html\Themes;
use App\Http\Controllers\Helpers\Functions;

$en_path = resource_path('lang/en/');
$lang_path = resource_path('lang/' . strtolower($language->symbol) . '/');
$key = -1;
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-7">
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

    <div class="col-sm-4">
    </div>
</div>

<div class="fh-breadcrumb animated fadeInRight">

    <div class="full-height">
        <div class="full-height-scroll border-left">

            <div class="element-detail-box">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($files['result'] as $group_k=>$files_group)
                        @if($files_group)
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{ucfirst(str_replace('_',' ',$group_k))}}</h5>

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
                                        @foreach($files_group as $f)
                                        <form method="post" class="form-horizontal file-form">
                                            <?php
                                            $key++;
                                            $file = new SplFileInfo($lang_path . $f['filename']);
                                            $error_msg = '';
                                            $invalid_keys = [];
                                            switch ($group_k)
                                            {
                                                case 'not_found':
                                                    $file = new SplFileInfo($en_path . $f['filename']);
                                                    break;
                                                case 'syntax_error':
                                                    $error_msg = $f['error'];
                                                    break;
                                                case 'invalid_keys':
                                                    $error_msg = 'Not found keys: ' . count($f['keys']);
                                                    $invalid_keys = $f['keys'];
                                                    break;

                                                default:
                                                    break;
                                            }
                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false" class="collapsed"><i class="fa fa-file-text-o"></i> {{ucfirst(basename($file))}}
                                                            <div class="agile-detail">
                                                                @if($group_k != 'not_found')
                                                                Last Modified: <?php $date = \File::lastModified($file); ?>
                                                                <i class="fa fa-clock-o"></i> {{date('Y/m/d &\nb\sp; g:i A ', $date)}} <br/><span class="text-warning">{{$error_msg}}</span>
                                                                @else
                                                                <span style="color: lightgreen;">New file</span>
                                                                @endif
                                                            </div></a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <input type="hidden" name="source_file" value="{{basename($file)}}" required />

                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover example3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Key</th>
                                                                        <th>Value</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach(Functions::MultiArrayToArray(Functions::fileToArray($file)) as $index => $value)
                                                                    <tr>
                                                                        <td>{{$index}}</td>
                                                                        <td>
                                                                            <textarea class="col-lg-12" name="file[{{$index}}]" required>{{$value}}</textarea>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @foreach($invalid_keys as $index)
                                                                    <tr class="text-warning">
                                                                        <td>{{$index}}</td>
                                                                        <td>
                                                                            <textarea class="col-lg-12" name="file[{{$index}}]" required></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="sk-spinner sk-spinner-wave loading">
                                                            <div class="sk-rect1"></div>
                                                            <div class="sk-rect2"></div>
                                                            <div class="sk-rect3"></div>
                                                            <div class="sk-rect4"></div>
                                                            <div class="sk-rect5"></div>
                                                        </div>
                                                        <input type="submit" class="btn btn-outline btn-primary btn-save" value="Save Changes" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@stop()
@section('js')
<script>
    $(document).ready(function () {

        $.validator.addMethod(
                "requiredPlaceholder",
                function (value, element) {
                    var ret = true;
                    var orignPlaceholders = $(element).data('placeholder-arr').split(',').filter(Boolean);
                    var userPlaceholders = value.match(/:([A-Za-z])\w+/g) || [];
                    if (orignPlaceholders.length == userPlaceholders.length) {
                        for (var i = orignPlaceholders.length - 1; i >= 0; i--) {
                            if (orignPlaceholders[i] != userPlaceholders[i])
                                return false;
                        }
                    } else {
                        ret = false;
                    }
                    return ret;
                },
                "Missing or wrong placeholder"
                );

        var rules = {
            source_file: {
                required: true
            },
            content_file: {
                required: true
            }
        };
        for (var i = $(".file-form").length - 1; i >= 0; i--) {
            var form = $(".file-form").get(i);
            for (var j = $(form).find('textarea').length - 1; j >= 0; j--) {
                var textarea = $($(form).find('textarea')[j]);
                var placeholderMatch = textarea.html().match(/:([A-Za-z])\w+/g);
                var placeholderArr = placeholderMatch ? placeholderMatch.join(',') : '';
                textarea.data('placeholder-arr', placeholderArr);
                rules[textarea.attr('name')] = {requiredPlaceholder: true};
            }
            $(form).validate({
                ignore: [],
                rules: rules
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.loading').hide();

        $(".file-form").on("submit", function (e) {
            e.preventDefault();
            if ($(this).valid())
                $.ajax({
                    url: '<?= url('backend/languages/files/' . $language->id); ?>',
                    method: 'POST',
                    data: $(this).serialize(),
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
