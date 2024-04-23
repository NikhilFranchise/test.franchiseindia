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
@section('AA')
    active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            <a href="#" class="tip-bottom">Article/Interview</a>
            <a href="#" class="current">Create-Article/Interview</a> </div>
        <h1>Create Article/Interview</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Article/Interview Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{Config::get('constants.MainDomain')}}/admin/article-interview-edit">
                        <input type="hidden" name="artical_interview_id" value="{{$data->content_id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="role" value="{{ session()->get('role') }}">
                        <div class="control-group">
                            <label class="control-label">Radio inputs</label>
                            <div class="controls">
                                @php
                                    $article   = "";
                                    $interview = "";
                                    if ($data->contentType == "Article")
                                      $article   = "checked";
                                    if ($data->contentType == "Interview")
                                      $interview   = "checked";
                                @endphp
                                <label><input type="radio" name="content_type" value="Article" {{$article}}></span>Article</label>
                                @if(session()->get('role') != 'ga')
                                    <label><input type="radio" name="content_type" value="Interview" {{$interview}}></span>Interview</label>
                                @endif
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
                            <label class="control-label">Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="128" required class="span11" placeholder="Enter Title" name="title" value="{{$data->title}}">
                                {{ "Words: ".str_word_count($data->title)}}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Home Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="45" required class="span11" placeholder="Enter Home Title"  name="home_title" value="{{$data->homeTitle}}"/>
                                {{ "Words: ".str_word_count($data->homeTitle)}}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Short Pharagraph :</label>
                            <div class="controls">
                                <input type="text" class="span11" required placeholder="Short Pharagraph" name="pharagraph" value="{{$data->shortDesc}}"/>
                                {{ "Words: ".str_word_count($data->shortDesc)}}
                            </div>
                        </div>
                        @if(session()->get('role') != 'ga')
                            <div class="control-group">
                                <label class="control-label">Company :</label>
                                <div class="controls">
                                    <input type="text" maxlength="155" class="span11" placeholder="Name Of The InterViewee Conpany" name="company" value="{{$data->company}}"/>
                                    {{ "Words: ".str_word_count($data->company)}}
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Interviewee :</label>
                                    <div class="controls">
                                        <input type="text" maxlength="155" class="span11" placeholder="InterViewee" name="interviewee" value="{{$data->interviewee}}"/>
                                        {{ "Words: ".str_word_count($data->interviewee)}}
                                    </div>
                                </div>
                                @endif
                                <div class="control-group">
                                    <label class="control-label">Content Publisher :</label>
                                    <div class="controls">
                                        <select multiple required style="display: none;" name="content_publisher" id ="publisher">
                                            <option value="{{$data->author}}" selected>{{$data->author}}</option>
                                        </select>
                                    </div>
                                </div>
                                @if(session()->get('role') != 'ga')
                                    <div id="nonsliderContent">

                                        <div class="control-group">
                                            <label class="control-label">International Content? :</label>
                                            <div class="controls">
                                                <input type="checkbox" name="is_intl" value="1" @if( $data->is_intl == 1) checked @endif>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">No Index / No Follow? :</label>
                                            <div class="controls">
                                                <input type="checkbox" name="is_noindexnofollow" value="1" @if( $data->is_noindexnofollow == 1) checked @endif>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Content Description :</label>
                                            <div class="controls span9">
                                                <textarea placeholder="Content Description" name="desc">{{$data->content}}</textarea>
                                                <img src="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}" height="106" width="187" style="padding-top: inherit;">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Image :</label>
                                            <div class="controls">
                                                <input type="hidden" name="old_image" value="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}" />
                                                <input type="file" class="span11" name="image"  id="showImage">
                                                <div style="display: none; color: red;" id="showImage_msg">Please select a valid image (jpg / gif / png)</div>
                                                <div style="display: none; color: red;" id="showImage_msg_size">Please select a image of size(Less than 300 KB)</div>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    <div id="sliderContent" @if(session()->get('role') != 'ga') style="display: none;" @endif>
                                        @foreach($sliderData as $slider)
                                            <div class="control-group">
                                                <label class="control-label">Content Description {{$loop->index+1}} :</label>
                                                <div class="controls span9">
                                                    <textarea class="span11" placeholder="Content Description" name="desc{{$loop->index+1}}">{{$slider->content}}</textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Image {{$loop->index+1}}:</label>
                                                <div class="controls">
                                                    <img src="{{$slider->image}}" style="width: 400px;" />
                                                    <input type="hidden" name="delete{{$loop->index+1}}" value="{{$slider->image}}">
                                                    <p><input type="file" class="span11 showImage" name="image{{$loop->index+1}}">
                                                        <input type="button" class="btn btn-danger" id="{{$slider->slider_id}}" onClick="deleteslider(this.id)" value="Delete" />
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach

                                        @for($i = count($sliderData)+1; $i <= 15; $i++)
                                            <div class="control-group">
                                                <label class="control-label">Content Description {{$i}} :</label>
                                                <div class="controls span9">
                                                    <textarea placeholder="Content Description" name="desc{{$i}}"></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Image {{$i}}:</label>
                                                <div class="controls">
                                                    <input type="file" class="span11 showImage" name="image{{$i}}">
                                                </div>
                                            </div>
                                        @endfor

                                    </div>

                                @endif
                                <div class="control-group">
                                    <label class="control-label">Related Brands :</label>
                                    <div class="controls" id="brands">
                                        <select class="span11" multiple style="display: none;" name="brands[]" id ="brand">
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
                                    <label class="control-label">Related Categories :</label>
                                    <div class="controls">
                                        <select class="span11" name="main_cat" onChange="getSubCategory(this.value);">
                                            <option value="">Select Category</option>
                                            @foreach ( Config::get('constants.CategoryArr') as $key=>$value )
                                                @if ( $data->related_category_id == $key )
                                                    <option value="{{$key}}" selected>{{$value}}</option>
                                                @endif
                                                @if ( $data->related_category_id != $key )
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Related Sub Categories :</label>
                                    <div class="controls">
                                        <select class="span11" name="sub_cat[]" multiple id="getSubCategoryData"  onchange="getSubsubCategory(this.value);">
                                            @if($data->related_category_id != "" && !empty(Config('constants.subCategoryArr.'.$data->related_category_id)))
                                                @foreach ( Config::get('constants.subCategoryArr.'.$data->related_category_id) as $key=>$value )
                                                    @if (in_array($key, $subCat))
                                                        <option value="{{$key}}" selected>{{$value}}</option>
                                                    @endif
                                                    @if (!in_array($key, $subCat))
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Related Sub sub Categories :</label>
                                    <div class="controls">
                                        <select class="span11" name="sub_sub_cat[]" name="sdf" multiple id="getSubCatCategoryData">
                                            @if($data->related_category_id != "")
                                                @if(count($subCat)!=0)
                                                    @foreach($subCat as $subCategory)
                                                        @if(is_array (Config::get('constants.subSubCategoryArr.'.$subCategory)))
                                                            @foreach ( Config::get('constants.subSubCategoryArr.'.$subCategory) as $key=>$value)
                                                                @if (in_array($key, $subSubCat))
                                                                    <option value="{{$key}}" selected>{{$value}}</option>
                                                                @endif
                                                                @if (!in_array($key, $subSubCat))
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Associated Tags :</label>
                                    <div class="controls" id="associatedTags">
                                        <select multiple style="display: none;" name="associated_tags[]" id ="select3">
                                            @if((isset($assocTags)))
                                                @foreach($assocTags as $assocTagsData)
                                                    <option value="{{$assocTagsData->tag_id}}" selected>{{$assocTagsData->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" id="ariclesubmit" class="btn btn-success">Save</button>
                                </div>
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
<script src="{{url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
<script type="text/javascript">

    //get sub category
    function getSubCategory(value){
        $.ajax({
            type:'GET',
            url:'/getsubcategoryarticle',
            data:{categoryID : value},
            success:function(data){
                $("#getSubCategoryData").html(data);
                $("#getSubCatCategoryData").html("<option></option>");
            }
        });
    }

    //get sub sub category
    function getSubsubCategory(value){
        $.ajax({
            type:'GET',
            url:'/getsubcatcategoryarticle',
            data:{subcategoryID : value},
            success:function(data){
                $("#getSubCatCategoryData").append(data);
            }
        });
    }

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
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
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



        var brands = $('#brand');

        {{-- brands.html("<option>No Data</option>"); --}}

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
        brands.select2({
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
        $('#select1').select2({ maximumSelectionLength: 1 });

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



    var showImages = $(".showImage");
    showImages.change(function() {
        var val = $(this).val();
        var showImage = $('#showImage_msg');
        var submit = $('#ariclesubmit');
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png':
            showImage.css('display','none');
            submit.prop('disabled',false);
            break;
            default:
                $(this).val('');
                showImage.css('display','block');
                submit.prop('disabled',true);
                break;
        }
    });

    showImages.bind('change', function() {
        if(this.files[0].size > 307200){
            $('#showImage_msg_size').css('display','block');
            $('#ariclesubmit').prop('disabled',true);
        } else {
            $('#showImage_msg_size').css('display','none');
            $('#ariclesubmit').prop('disabled',false);
        }
    });
</script>
<script src="{{url('admin/js/matrix.js')}}"></script>
{{-- <script type="text/javascript">

        //get sub category
        function getSubCategory(value){
            $.ajax({
                type:'GET',
                url:'/getsubcategoryarticle',
                data:{categoryID : value},
                success:function(data){
                    $("#getSubCategoryData").html(data);
                    $("#getSubCatCategoryData").html("<option></option>");
                }
            });
        }

    //get sub sub category
    function getSubsubCategory(value){
        $.ajax({
            type:'GET',
            url:'/getsubcatcategoryarticle',
            data:{subcategoryID : value},
            success:function(data){
                $("#getSubCatCategoryData").append(data);
            }
        });
    }

    $(document).ready(function(){

        var editor_config = {
            path_absolute : "/",
            height:300,
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern forecolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
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
        $('#select1').select2({ maximumSelectionLength: 1 });

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



    var showImages = $(".showImage");
    showImages.change(function() {
        var val = $(this).val();
        var showImage = $('#showImage_msg');
        var submit = $('#ariclesubmit');
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png':
            showImage.css('display','none');
            submit.prop('disabled',false);
            break;
            default:
                $(this).val('');
                showImage.css('display','block');
                submit.prop('disabled',true);
                break;
        }
    });

    showImages.bind('change', function() {
        if(this.files[0].size > 307200){
            $('#showImage_msg_size').css('display','block');
            $('#ariclesubmit').prop('disabled',true);
        } else {
            $('#showImage_msg_size').css('display','none');
            $('#ariclesubmit').prop('disabled',false);
        }
    });
    function validateInput() {
    var slugId = document.getElementById('slugId');
    var slugValue = slugId.value;

    // Convert the input to lowercase
    slugValue = slugValue.toLowerCase();

    // Remove any characters that are not small letters or hyphens
    slugValue = slugValue..replace(/[^a-z0-9\-]/g, '');

    // Update the input value
    slugId.value = slugValue;
}
</script>
<script src="{{url('admin/js/matrix.js')}}"></script> --}}
</body>
</html>
