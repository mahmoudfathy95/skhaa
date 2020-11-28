<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
    <!-- BEGIN: Head-->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <base href='<?= URL::to('/public/') ?>' />
        <script>
            var base = '<?= URL::to('/public/') ?>';
        </script>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>الوطنية @yield('title')</title>
        <link rel="apple-touch-icon" href="{{url('final_logo_white(2).png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('final_logo_white(2).png')}}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/vendors/css/vendors-rtl.min.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/bootstrap-extended.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/colors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/components.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/custom-rtl.min.css')}}">
        <!-- END: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/select2.min.css')}}">
        <link href="{{url('assets/backend/css/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{url('assets/backend/css/jsTree/style.css')}}" rel="stylesheet">
        <link href="{{url('assets/backend/uploader/popup.ltr.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/forms/tags/tagging.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/vendors/css/tables/datatable/datatables.min.css')}}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/core/menu/menu-types/vertical-menu.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css-rtl/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <script src="{{url('assets/backend/js/jquery.min.js')}}" type="text/javascript"></script>
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
        @include('backend.include.fixed_top')


        <!-- BEGIN: Main Menu-->
        @include('backend.include.menu')   
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <!-- END: Content-->



        <!-- End: Customizer-->



        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light navbar-border">
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">PIXINVENT 			</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
        </footer>
        <!-- END: Footer-->

        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN VENDOR JS-->
        <script src="{{url('assets/backend/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN PAGE VENDOR JS-->
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/ui/jquery.sticky.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="{{url('assets/backend/js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{url('assets/backend/js/validate/jquery.validate.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/js/summernote/summernote.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/js/select2.full.min.js')}}"></script>
        <script src="{{url('assets/backend/vendors/js/extensions/jquery.steps.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/js/tagging.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/forms/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/js/tags-input/jquery.tagsinput.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/pickers/pickadate/picker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/backend/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
        <script src="{{url('assets/backend/js/ckeditor/ckeditor.js')}}"></script>
        <script src="{{url('assets/backend/js/scripts/forms/tags/tagging.min.js')}}"></script>
        <script src="{{url('assets/backend/js/scripts/forms/checkbox-radio.min.js')}}"></script>

        <script src="{{url('assets/backend/uploader/jquery.ui.widget.js')}}"></script>
        <script src="{{url('assets/backend/uploader/jquery.fileupload.js')}}"></script>
        <script src="{{url('assets/backend/uploader/popup.js')}}"></script>
        <script src="{{url('assets/backend/js/scripts/forms/wizard-steps.min.js')}}"></script>
        <script src="{{url('assets/backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
        <script src="{{url('assets/backend/js/scripts/tables/datatables/datatable-basic.min.js')}}"></script>
<script src="{{url('assets/backend/js/core/app-menu.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/backend/js/core/app.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/backend/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
        <!-- END STACK JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script type="text/javascript" src="{{url('assets/backend/js/scripts/ui/breadcrumbs-with-stats.min.js')}}"></script>
        <!-- END PAGE LEVEL JS-->
        <!-- END: Page JS-->
        <script>
            $(function () {
                var pgurl = window.location.pathname;
                var res = pgurl.split('/');
                var i = res.indexOf("backend");
                var link = res[i + 1];
                console.log(link);
                $('a[href*="' + link + '"]').each(function () {
                    console.log($(this));

                    $(this).closest('li').addClass('active');
                    $(this).closest('.has-sub').addClass('open');

                });

            });
            $(document).ready(function () {

                $('.select2').select2();
                if ($(".editor").length > 0) {
                    // $(".editor").summernote({'width': '100%', 'height': '300px'});

                    $('.editor:not([id])').each(function (e) {
                        $(this).attr('id', 'txt_' + Math.round(Math.random() * 1000));
                    });
                    if (CKEDITOR) {
                        CKEDITOR.config.contentsCss = "{{url('/assets/css/style.css')}}";
                        CKEDITOR.on('dialogDefinition', function (ev)
                        {
                            // Take the dialog name and its definition from the event data.
                            var dialogName = ev.data.name;
                            var dialogDefinition = ev.data.definition;

                            // Check if the definition is from the dialog we're
                            // interested in (the 'image' dialog). This dialog name found using DevTools plugin
                            if (dialogName == 'image')
                            {
                                // Get a reference to the 'Image Info' tab.
                                var infoTab = dialogDefinition.getContents('info');

                                // Add Select from Media button instead of filebrowser
                                infoTab.elements[0].children[0].children[1] = {
                                    type: 'button',
                                    id: 'selectMedia',
                                    style: 'display:inline-block;margin-top:17px;',
                                    align: 'center',
                                    label: 'Select from Media',
                                    onLoad: function () {
                                        var btnId = this.getDialog()._.contents.info.selectMedia.domId;
                                        var urlId = this.getDialog()._.contents.info.txtUrl._.inputId;
                                        if (typeof (jQuery) == "function" && $().filemanager) {
                                            $('#' + btnId).filemanager({
                                                types: "png|jpg|jpeg|gif|bmp",
                                                done: function (files) {
                                                    if (files.length) {
                                                        $('#' + urlId).val(files[0].media_thumbnail);
                                                    }
                                                }
                                            });
                                        }
                                    }
                                };
                            }
                        });

                        $('.editor').each(function () {
                            $(this).parent().css('padding-bottom', '20px');
                            CKEDITOR.replace(this.id);
                        });
                    }
                }
                $('a[href="https://www.froala.com/wysiwyg-editor?k=u"]').remove();
                jQuery.validator.addMethod("english_only", function (value, element) {
                    return this.optional(element) || /^[a-z\s]+$/i.test(value);
                }, "English Letters only please");

            });
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            //
            //            $(document).ready(function () {
            //               
            //                $('*[data-action]').each(function () {
            //                    var action = $(this).data('action');
            ////console.log(role_actions);
            //                    if (role_actions.indexOf(action) === -1) {
            ////                        console.log(11111);
            //                        // $(this).remove();
            //                        console.log(this);
            //                    }
            //
            //                });
            //            });
        </script>
        @yield('scripts')
        @stack('script')
    </body>
    <!-- END: Body-->
</html>