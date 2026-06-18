<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .select2-container .select2-selection { box-sizing: border-box; cursor: pointer; display: block; min-height: 32px; user-select: none; -webkit-user-select: none; width: 812px; }
        .select2-container--default .select2-selection--single .select2-selection__arrow b { display: none; }
    </style>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
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
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
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
    </script>
    <style type="text/css">

        .select2-container .select2-selection--multiple {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            min-height: 32px;
            user-select: none;
            -webkit-user-select: none;
            width: 810px;
        }
        .bs-example {
            font-family: sans-serif;
            position: relative;
            margin: 100px;
        }

    </style>
</head>
<body>
<!--Header-part-->
@include('admin.includes.header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@section('NA')
    active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            <a href="#" class="tip-bottom">News</a>
            <a href="#" class="current">Create-News</a> </div>
        <h1>Create News</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>News Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('admin/update-news') }}">
                        <input type="hidden" name="news_id" value="{{$data->news_id}}"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control-group">
                            <label class="control-label">News Publisher :</label>
                            <div class="controls">
                                <select required class="span11" name="news_publisher" title="author">
                                    <option value="">Select Publisher</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}" @if($author->author_id == $data->author_id) selected @endif>{{ $author->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Kicker :</label>
                            <div class="controls">
                                <select style="display: none;" title="kicker" name="kicker" id="kicker" required>
                                    <option value="{{$data->kicker}}" selected>{{$data->kicker}}</option>
                                </select>
                                {{ "Words: ".str_word_count($data->kicker)}}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Publish Url :</label>
                            <div class="controls">
                               
                                <input type="text" name="slug" id="slugId" oninput="validateInput()" maxlength="125" class="span11" pattern="[a-z0-9\-]+" title="Only small letters, numbers, and hyphens are allowed" value="{{$data->slug}}" />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">News Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="125" class="span11" placeholder="Enter Title" name="title" value="{{$data->title}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">News Home Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="40" class="span11" placeholder="Enter Home Title"  name="home_title" value="{{$data->homeTitle}}"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">News Sub Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="255" class="span11" placeholder="Sub title" name="sub_title" value="{{$data->shortDesc}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="international_check" class="control-label">International Content? :</label>
                            <div class="controls">
                                <input type="checkbox" id="international_check" name="is_intl" value="1" @if( $data->is_intl == 1) checked @endif>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">News Content :</label>
                            <div class="controls span9">
                                <textarea class="span11" placeholder="Content Description" name="content">{{$data->content}}</textarea>
                                <img src="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}" height="106" width="187" style="padding-top: inherit;">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Image :</label>
                            <div class="controls">
                                <input type="hidden" name="old_image" value="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}" />
                                <input type="file" id="showImage" class="span11" name="image">
                                <div style="display: none; color: red;" id="showImage_msg">Please select a valid image (jpg / gif / png)</div>
                                <div style="display: none; color: red;" id="showImage_msg_size">Please select a image of size(Less than 300 KB)</div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="select2" class="control-label">Related Brands :</label>
                            <div class="controls" id="brands">
                                <select multiple style="display: none;" name="brands[]" id="select2" class="span11">
                                    @if(isset($company))
                                        @foreach($company as $companyData)
                                            @if($companyData != "")
                                                <option value="{{$companyData->franchisor_id}}" selected>{{$companyData->company_name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="select3" class="control-label">Associated Tags :</label>
                            <div class="controls" id="associatedTags">
                                <select multiple style="display: none;" name="associated_tags[]" id="select3" class="span11">
                                    @if((isset($assocTags)))
                                        @foreach($assocTags as $assocTagsData)
                                            <option value="{{$assocTagsData->tag_id}}" selected>{{$assocTagsData->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="newssubmit">Save</button>
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

<script src="{{ url('admin/js/jquery.min.js')}}"></script>
<script src="{{ url('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{ url('admin/js/bootstrap.min.js')}}"></script>
<script src="{{ url('admin/js/jquery.uniform.js')}}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
<script src="{{ url('admin/js/matrix.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //initialization and maximum values to be selected from text box
        $('#select3').select2({
            placeholder: "Choose tags...",
            minimumInputLength: 2,
            ajax: {
                url: '/associatedtags',
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
            placeholder: "Select Brand...",
            minimumInputLength: 2,
            ajax: {
                url: '/relatedbrands',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.company_name,
                                id: item.franchisor_id
                            }
                        })
                    };
                },
                cache: true
            }
        });

//initialization and maximum values to be selected from text box
        $('#select1').select2({
            maximumSelectionLength: 1
        });

        //content publisher
        $('#publisher').select2({
            maximumSelectionLength: 1,
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

    //initialozing maximum values to be selected from text box
    $('#kicker').select2({
        placeholder: "Choose kicker...",
        minimumInputLength: 2,
        ajax: {
            url: '{{url("admin/get-kickers?type=1")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });


    $("#showImage").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png':
            $('#showImage_msg').css('display','none');
            $('#newssubmit').prop('disabled',false);
            break;
            default:
                $(this).val('');
                $('#showImage_msg').css('display','block');
                $('#newssubmit').prop('disabled',true);
                break;
        }
    });
    $('#showImage').bind('change', function() {
        if(this.files[0].size > 307200){
            $('#showImage_msg_size').css('display','block');
            $('#newssubmit').prop('disabled',true);
        } else {
            $('#showImage_msg_size').css('display','none');
            $('#newssubmit').prop('disabled',false);
        }
    });
</script>
</body>
</html>
