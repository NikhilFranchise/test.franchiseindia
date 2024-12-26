<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .select2-container .select2-selection {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            min-height: 32px;
            user-select: none;
            -webkit-user-select: none;
            width: 812px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            display: none;
        }
    </style>

</head>

<body>
    <!--Header-part-->
    @include('admin.includes.header')
    <!--close-top-Header-menu-->

    <!--sidebar-menu-->
    @section('IN')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
                <a href="list-insights" class="tip-bottom">Podcast</a>
                <a href="" class="current">Add new Podcast</a>
            </div>
            <h1>Add new Podcast</h1>
        </div>


        <!--End-breadcrumbs-->
        <div class="container-fluid">
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Podcast Details</h5>
                    </div>

                    @php
                        $locale = request()->segment(2);
                    @endphp
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                            action="{{ Config('constants.MainDomain') . '/admin/podcastupdate' }}"
                            id="editform" novalidate>
                            @csrf
                            <input type="hidden" name="p_id" value="{{ $data->sno }}">
                            {{--  <input type="hidden" name="pod_id" value="{{ $data->podcast_id }}">  --}}

                            <div class="control-group">
                                <label class="control-label">Podcast ID :</label>
                                <div class="controls">
                                    <input required class="span11" name="podcastId" title="Podcast ID"
                                        placeholder="Podcast ID" value="{{ $data->podcast_id }}">
                                    @if ($errors->has('podcastId'))
                                        @foreach ($errors->get('podcastId') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Podcast URL :</label>
                                <div class="controls">
                                    <input required class="span11" name="Podcast_url" title="Podcast URL"
                                        placeholder="Podcast URL" value="{{ $data->podcast_link }}" />

                                    @if ($errors->has('Podcast_url'))
                                        @foreach ($errors->get('Podcast_url') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Podcast Title :</label>
                                <div class="controls">
                                    <input type="text" maxlength="125" required class="span11"
                                        placeholder="Enter Title" name="title" value="{{ $data->title }}" />
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Podcast Language :</label>
                                <div class="controls">
                                    <select required class="span11" name="podcast_lang">
                                        <option value="" disabled>Select Language</option>
                                        <option value="en"@if ($data->pod_lang == 'en') selected @endif>English
                                        </option>
                                        <option value="hi"@if ($data->pod_lang == 'hi') selected @endif>Hindi
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Podcast Duration :</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="podcast_dur"
                                        placeholder=" Podcast Duration" value="{{ $data->duration }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="inputStatus" class="control-label">Insights Content :</label>
                                <div class="controls span9">
                                    <div class="form-group">
                                        <textarea name="content" id="inputDescription" class="form-control customError" minlength="2"
                                            placeholder="Content Description" required>{{ $data->description }}</textarea>
                                        @if ($errors->has('content'))
                                            @foreach ($errors->get('content') as $error)
                                                <br><span style="color: red;">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <img src="{{ \App\Http\Controllers\Admin\AdminController::createimgurl($data->image_path, 'en') }}"
                                        height="106" width="187" style="padding-top: inherit;">
                                </div>

                            </div>
                            <div class="control-group">
                                <label class="control-label">Select Image :</label>
                                <div class="controls">
                                    <input type="file" id="showImage" class="span11" name="image">
                                    @if ($errors->has('image'))
                                        @foreach ($errors->get('image') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <div style="display: none; color: red;" id="showImage_msg">Invalid image type!
                                        Please
                                        select a valid image format (JPG, GIF, PNG, or WebP)</div>
                                    <div style="display: none; color: red;" id="showImage_msg_size">Please select a
                                        image
                                        of size(Less than 150 KB)</div>
                                    <br />
                                    Note : * Image Size 478x478
                                </div>
                            </div>

                            <div class="form-actions" style="text-align: center">
                                <button type="submit" class="btn btn-success" id="podcastsubmit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.uniform.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/typeahead.bundle.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        $("#showImage").change(function() {
            var val = $(this).val();
            var fileInput = this;
            val = val.replace('jpeg', 'jpg');
            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'gif':
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'webp':
                    //toastr.success('Valid image type selected. You may proceed.');
                    checkImageSize(fileInput);
                    break;
                default:
                    $(this).val('');
                    toastr.error(
                        'Invalid image type! Please select a valid image format (JPG, GIF, PNG, or WebP).');
                    $('#showImage_msg').css('display', 'block');
                    setTimeout(function() {
                        $('#showImage_msg').css('display', 'none');
                    }, 5000);
                    $('#newssubmit').prop('disabled', true);
                    break;
            }
        });

        // we are using these functions for validate image dimensions start here

        // we are using these functions for validate image dimensions end here

        function checkImageSize(fileInput) {
            if (fileInput.files[0].size > 153600) {
                toastr.error('Image size should be 150 KB or less.');
                $('#showImage_msg_size').css('display', 'block');
                setTimeout(function() {
                    $('#showImage_msg_size').css('display', 'none');
                }, 5000);
                $('#newssubmit').prop('disabled', true);
            } else {
                // toastr.success('Image size is valid. You can proceed.');
                $('#showImage_msg_size').css('display', 'none');
                $('#newssubmit').prop('disabled', false);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            var editor_config = {
                path_absolute: "/",
                height: 300,
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
                relative_urls: false,
                remove_script_host: false,
                file_browser_callback: function(field_name, url, type) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' +
                        field_name;
                    if (type === 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            };
            tinymce.init(editor_config);

            $("#editform").validate({
                rules: {
                    title: {
                        maxlength: 100,
                        minlength: 3
                    },
                    home_title: {
                        maxlength: 65,
                    },
                    short_description: {
                        minlength: 120,
                        maxlength: 350
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.hasClass('customError')) {
                        // custom error placement
                        element.parent().after(error);
                    } else {
                        element.after(error); // default error placement
                    }
                }
            });

        });
    </script>
</body>

</html>
