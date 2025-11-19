@extends('admin.layout.master')
@section('VID', 'active open')
@section('VL', 'active')
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

    .is-invalid {
        border: 1px solid red !important;
        background-color: #ffe6e6;
    }
</style>
@endpush
@php
$language = $lang == 'en' ? 'English' : 'Hindi';
@endphp
<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb">
        <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
        <a href="{{ route('video.list', ['lang' => $lang]) }}" title="Go to Manage Videos" class="tip-bottom"><i
                class="fa fa-video"></i> Manage Videos</a>
        <a href="{{ url()->current() }}" class="current">Add {{ $language }} Video</a>
    </div>
    {{-- <h1>Add New Video</h1> --}}
</div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="fa fa-video"></i> </span>
                <h5>Add {{ $language }} Video</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('video.store', ['lang' => $lang]) }}" id="videoform" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="control-group">
                        <label class="control-label">Video ID :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="videoId" title="Video ID" placeholder="Video ID"
                                required>
                            @if ($errors->has('videoId'))
                            @foreach ($errors->get('videoId') as $error)
                            <br><span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Video Title :</label>
                        <div class="controls">
                            <input type="text" maxlength="125" required class="span11"
                                placeholder="Enter Video Title" name="title" />
                            @if ($errors->has('title'))
                            @foreach ($errors->get('title') as $error)
                            <br><span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Video Category :</label>
                        <div class="controls">
                            <select class="span11" name="category" id="category">
                                <option value="">Select Category</option>
                                @foreach ($category as $cate)
                                <option value="{{ $cate->catid }}">{{ $cate->catname }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                            @foreach ($errors->get('category') as $error)
                            <br><span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Video Language :</label>
                        <div class="controls">
                            <select required class="span11" name="pod_lang">
                                <option value="" disabled>Select Language</option>
                                <option value="en" {{ $lang == 'en' ? 'selected' : '' }}>English</option>
                                <option value="hi" {{ $lang == 'hi' ? 'selected' : '' }}>Hindi</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Video Duration :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="video_duration" placeholder="Video Duration">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="inputStatus" class="control-label">Video Description :</label>
                        <div class="controls span9">
                            <div class="form-group">
                                <textarea name="content" id="inputDescription" class="span11" minlength="2" placeholder="Content Description" required></textarea>
                                @if ($errors->has('content'))
                                @foreach ($errors->get('content') as $error)
                                <br><span style="color: red;">{{ $error }}</span>
                                @endforeach
                                @endif
                            </div>
                        </div>
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
{{-- @if ($errors->any())
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                    });
                });
            </script>
        @endif --}}
@endpush
@endsection