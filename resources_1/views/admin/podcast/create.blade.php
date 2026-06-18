@extends('admin.layout.master')
@section('M-POD', 'active open')
@section('POD-L', 'active')
@section('content')
    @push('styles')
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

            .btn-secondary {
                background-color: #6c757d;
                border-color: #5a6268;
                color: #fff;
                box-shadow: none;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
                border-color: #545b62;
                color: #fff;
            }
        </style>
    @endpush
    @php
        $language = $lang == 'en' ? 'English' : 'Hindi';
    @endphp
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{ route('podcast.list', ['lang' => $lang]) }}" title="Go to Manange Podcasts" class="tip-bottom"><i
                    class="fa fa-podcast"></i> Manage Podcasts</a>
            <a href="{{ url()->current() }}" class="current">Add {{ $language }} Podcast</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="fa fa-podcast"></i> </span>
                    <h5>Add {{ $language }} Podcast</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                        action="{{ route('podcast.store', ['lang' => $lang]) }}" id="podform" novalidate>
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Podcast ID :</label>
                            <div class="controls">
                                <input required type="text" class="span11" name="podcastId" title="Podcast ID"
                                    placeholder="Podcast ID" value="{{ old('podcastId', '') }}">
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
                                <input required type="text" class="span11" name="Podcast_url" title="Podcast URL"
                                    placeholder="Podcast URL" value="{{ old('Podcast_url', '') }}" />

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
                                <input type="text" maxlength="125" required class="span11" placeholder="Enter Title"
                                    name="title" value="{{ old('title', '') }}" />
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
                                    <option value="en" {{ $lang == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="hi" {{ $lang == 'hi' ? 'selected' : '' }}>Hindi</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Podcast Duration :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="podcast_dur" placeholder="Podcast Duration"
                                    value="{{ old('podcast_dur', '') }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="inputStatus" class="control-label">Podcast Description :</label>
                            <div class="controls span9">
                                <div class="form-group">
                                    <textarea name="content" id="inputDescription" class="form-control customError" minlength="2"
                                        placeholder="Content Description" required>{{ old('content', '') }}</textarea>
                                    @if ($errors->has('content'))
                                        @foreach ($errors->get('content') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Image :</label>
                            <div class="controls">
                                <input type="file" required id="showImage" class="span11" name="image"
                                    value="{{ old('image', '') }}">
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
                                Note : * Image Size 512x512
                            </div>
                            <!-- Image Preview Section -->
                            <br>
                            <img id="imagePreview" src="#" alt="Image Preview"
                                style="display: none; max-width: 300px; margin:0px 195px 15px; border-radius: 5px;">
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('podcast.list', ['lang' => $lang]) }}" class="btn btn-secondary"><i
                                    class="fa fa-times"></i> Cancel</a>
                            <button type="submit" class="btn btn-success" style="float: right;" id="newssubmit"><i
                                    class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ url('admin/js/jquery.min.js') }}"></script>
        <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
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

            });
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
                        checkImageSize(fileInput);
                        previewImage(fileInput); // Show image preview
                        // $("#altText").show(); // Show alt input
                        break;

                    default:
                        $(this).val('');
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            title: 'Invalid image type!',
                            text: 'Please select JPG, GIF, PNG, or WebP format.',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            background: '#f8d7da',
                            color: '#721c24',
                        });
                        $('#showImage_msg').css('display', 'block');
                        $('#newssubmit').prop('disabled', true);
                        $('#imagePreview').hide();
                        // $("#altText").hide();
                        break;
                }
            });

            function checkImageSize(fileInput) {
                if (fileInput.files[0].size > 307200) {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'error',
                        title: 'Image size too large!',
                        text: 'Image size should be 300 KB or less.',
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        background: '#f8d7da',
                        color: '#721c24',
                    });
                    $('#showImage_msg_size').css('display', 'block');
                    $('#newssubmit').prop('disabled', true);
                    $('#imagePreview').hide();
                    // $("#altText").hide();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Valid image size!',
                        text: 'You can proceed.',
                        timer: 3000,
                        showConfirmButton: false,
                        background: '#f0f9f4',
                        color: '#155724',
                    });
                    $('#showImage_msg_size').css('display', 'none');
                    $('#newssubmit').prop('disabled', false);
                }
            }

            function previewImage(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                        // $("#altText").show();
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        </script>
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Success!',
                    text: `{!! session('success') !!}`,
                    timer: 3000,
                    showConfirmButton: false,
                    background: '#f0f9f4',
                    color: '#155724',
                    confirmButtonColor: '#28a745'
                });
            </script>
        @endif
        @if (session('warning'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    timer: 3000,
                    showConfirmButton: false,
                    background: '#fff3cd',
                    color: '#856404',
                    icon: 'warning',
                    title: 'Warning!',
                    text: `{!! session('warning') !!}`,
                    confirmButtonColor: '#ffc107'
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#fff3cd',
                    color: '#856404',
                    icon: 'error',
                    title: 'Oops!',
                    html: `{!! session('error') !!}`,
                    confirmButtonColor: '#dc3545'
                });
            </script>
        @endif
    @endpush
@endsection
