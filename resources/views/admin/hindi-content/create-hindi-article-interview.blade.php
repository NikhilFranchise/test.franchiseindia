<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .select2-container .select2-selection { box-sizing: border-box; cursor: pointer; display: block; min-height: 32px; user-select: none; -webkit-user-select: none; width: 812px; }
        .select2-container--default .select2-selection--single .select2-selection__arrow b { display: none; }
    </style>
</head>
<body>

<!--Header-part-->
@include('admin.includes.header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@section( $contentType == 2 ? "NA" : "AA" )
    active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            <a href="#" class="tip-bottom">Hindi {{ $contentType == 1 ? "Article/Interview" : "News" }}</a>
            <a href="#" class="current">Hindi Create-{{ $contentType == 1 ? "Article/Interview" : "News" }}</a> </div>
        <h1>Hindi Create {{ $contentType == 1 ? "Article/Interview" : "News" }}</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Hindi {{ $contentType == 1 ? "Article/Interview" : "News" }} Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{url('/admin/hindi/create')}}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" required />
                        <input type="hidden" name="{{ $contentType == 2 ? "news" : "content" }}_id" value="{{ $contentId }}" required />
                        <input type="hidden" name="content_type" value="{{ $contentType }}" required />

                        <div class="control-group">
                            <label class="control-label">Hindi Kicker :</label>
                            <div class="controls">
                                <select style="display: none;" title="kicker" name="kicker" id="select2" required>
                                    @if(!empty($kicker))
                                        <option value="{{ $kicker->tag_id }}" selected>{{ $kicker->name }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hindi Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="128" required class="span11" placeholder="Enter Title" name="title" @if(!empty($hindiContent)) value="{{ $hindiContent->title }}" @endif/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hindi Home Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="128" required class="span11" placeholder="Enter Home Title"  name="home_title" @if(!empty($hindiContent)) value="{{ $hindiContent->home_title }}" @endif/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hindi Short Pharagraph :</label>
                            <div class="controls">
                                <input type="text" class="span11" required placeholder="Short Pharagraph" name="pharagraph" @if(!empty($hindiContent)) value="{{ $hindiContent->short_desc }}" @endif/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Content Publisher :</label>
                            <div class="controls">
                                <select @if($contentType == 1)  style="display: none;" @endif class="span11" title="publisher" required name="content_publisher" @if($contentType == 1) id="publisher" @endif>
                                    @if(($contentType == 1) && !empty($hindiContent))
                                        <option value="{{ $hindiContent->author }}" selected>{{ $hindiContent->author }}</option>
                                    @else
                                        <option value="">Select Publisher</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->author_id }}" @if(isset($hindiContent) && $author->author_id == $hindiContent->author) selected @endif>{{ $author->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hindi Content Description :</label>
                            <div class="controls span9">
                                <textarea placeholder="Content Description" name="desc" required>
                                    @if(!empty($hindiContent))
                                        {{ $hindiContent->content }}
                                    @endif
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Hindi Associated Tags :</label>
                            <div class="controls">
                                <select multiple style="display: none;" title="associated tags" name="associated_tags[]" id ="select3" title="tags" required>
                                    @foreach( $associatedTags as $tag )
                                        <option value="{{ $tag->tag_id }}" selected>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <label><input type="radio" name="status" value="1" {{ $content->is_hindi == 1 ? "checked" : ""}} > Active &nbsp&nbsp
                                <input type="radio" name="status" value="0" {{ $content->is_hindi == 1 ? "" : "checked"}}>  Inactive</label>
                            </div>
                        </div>

                        <div class="form-actions" style="text-align: center;">
                            <button type="submit" id="ariclesubmit" class="btn btn-success">Save</button>
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

<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var editor_config = {
            path_absolute : "/",
            height:300,
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
			remove_script_host: false,
            file_browser_callback : function(field_name, url, type) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type === 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };
        tinymce.init(editor_config);

        //initialization and maximum values to be selected from text box
        $('#select3').select2({
            placeholder: "Choose tags...",
            minimumInputLength: 2,
            ajax: {
                url: '{{url("admin/get-kickers?type=2")}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.tag_id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        //initialozing maximum values to be selected from text box
        $('#select2').select2({
            placeholder: "Choose kicker...",
            minimumInputLength: 2,
            ajax: {
                url: '{{url("admin/get-kickers?type=2")}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.tag_id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        //content publisher
        $('#publisher').select2({
            placeholder: "Select Publisher...",
            minimumInputLength: 2,
            ajax: {
                url: '/publisher',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.title,
                                id: item.title
                            }
                        })
                    };
                },
                cache: true
            }

        });
    });

</script>
<script src="{{url('admin/js/matrix.js')}}"></script>
</body>
</html>
