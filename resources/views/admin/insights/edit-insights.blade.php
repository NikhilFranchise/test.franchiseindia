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
    @php
        $locale = request()->segment(2);
    @endphp
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i>Home</a>
                <a href="{{ url('admin/list-insights') }}" class="tip-bottom">Insights</a>
                <a href="" class="current">Edit-Insights</a>
            </div>
            <h1>Edit Insights</h1>
        </div>
        <!--End-breadcrumbs-->
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Insights Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                            action="{{ url('admin/en/update-insights') }}" id="editform" />
                        <input type="hidden" name="news_id" value="{{ $data->news_id }}" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="control-group">
                            <label class="control-label" for="publisher">Insights Publisher :</label>
                            <div class="controls" id="insights_publisher">
                                <select class="span11" name="insights_publisher" id="publisher">
                                    <option value="{{ $data->author_id }}" selected>{{ $data->author[0]->title }}
                                    </option>
                                </select>
                            </div>
                            @if ($errors->has('insights_publisher'))
                                @foreach ($errors->get('insights_publisher') as $error)
                                    <br><span style="color: red;">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="control-group">
                            <label class="control-label">Insights Type :</label>
                            <div class="controls">
                                <select required class="span11" name="insights_type" title="insights_type">
                                    <option value="">Select Insights Type</option>
                                    <option value="News" @if ($data->insight_type == 'News') selected @endif>News
                                    </option>
                                    <option value="Article" @if ($data->insight_type == 'Article') selected @endif>
                                        Article</option>
                                    <option value="Interview" @if ($data->insight_type == 'Interview') selected @endif>
                                        Interview</option>
                                    <option value="Report" @if ($data->insight_type == 'Report') selected @endif>Report
                                    </option>
                                    <option value="Event" @if ($data->insight_type == 'Event') selected @endif>Event
                                    </option>
                                    <option value="Terms" @if ($data->insight_type == 'Terms') selected @endif>Terms
                                    </option>
                                </select>
                                @if ($errors->has('insights_type'))
                                    @foreach ($errors->get('insights_type') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Main Category :</label>
                            <div class="controls">
                                <select class="span11" name="insights_cat" title="Main Category"
                                    onchange="Subcategoriesdata(value);">
                                    <option value="">Select Main Category</option>
                                    @foreach ($InsightCategory as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $data->cat_id) selected @endif>
                                            {{ $category->catname }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('insights_cat'))
                                    @foreach ($errors->get('insights_cat') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Sub Category :</label>
                            <div class="controls">
                                <select class="span11" name="insights_subcat" id="insights_subcat" title="Sub Category">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($InsightSubcategory as $subcat)
                                        <option value="{{ $subcat->id }}"
                                            @if ($subcat->mcat_id == $data->cat_id && $subcat->id == $data->subcat_id) selected @endif>
                                            {{ $subcat->subcat_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Publish Url :</label>
                            <div class="controls">

                                <input type="text" name="slug" id="slugId" oninput="validateInput()"
                                    maxlength="125" class="span11" pattern="[a-z0-9\-]+"
                                    title="Only small letters, numbers, and hyphens are allowed"
                                    value="{{ $data->slug }}" />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Insights Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="125" class="span11" placeholder="Enter Title"
                                    name="title" value="{{ $data->title }}" />
                                @if ($errors->has('title'))
                                    @foreach ($errors->get('title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Insights Home Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="40" class="span11"
                                    placeholder="Enter Home Title" name="home_title"
                                    value="{{ $data->homeTitle }}" />

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Insights Sub Title :</label>
                            <div class="controls">
                                <input type="text" required maxlength="255" class="span11"
                                    placeholder="Sub title" name="sub_title" value="{{ $data->shortDesc }}" />
                                @if ($errors->has('sub_title'))
                                    @foreach ($errors->get('sub_title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="international_check" class="control-label">International Content?
                                :</label>
                            <div class="controls">
                                <input type="checkbox" id="international_check" name="is_intl" value="1"
                                    @if ($data->is_intl == 1) checked @endif>
                            </div>
                        </div>

                        @php
                            $lang = request()->segment(2);
                        @endphp

                        <div class="control-group">
                            <label for="inputStatus" class="control-label">Insights Content :</label>
                            <div class="controls span9">
                                <div class="form-group">
                                    <textarea name="content" id="inputDescription" class="form-control customError" minlength="2"
                                        placeholder="Content Description" required>{{ $data->content }}</textarea>
                                    @if ($errors->has('content'))
                                        @foreach ($errors->get('content') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif

                                    <img src="{{ \App\Http\Controllers\Admin\AdminController::createimgurl($data->image, $lang) }}"
                                        height="106" width="187" style="padding-top: inherit;">
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Image :</label>
                            <div class="controls">
                                <input type="hidden" name="old_image"
                                    value="{{ \App\Http\Controllers\Admin\AdminController::createimgurl($data->image, $lang) }}" />

                                <input type="file" id="showImage" class="span11" name="image">
                                <div style="display: none; color: red;" id="showImage_msg">Invalid image type! Please
                                    select a valid image format (JPG, GIF, PNG, or WebP)</div>
                                <div style="display: none; color: red;" id="showImage_msg_size">Please select a
                                    image of size(Less than 150 KB)</div>
                                <br />
                                Note : * Image Size 1600x940
                            </div>
                        </div>
                        {{--  @dd($brands);  --}}

                        <div class="control-group">
                            <label for="select2" class="control-label">Related Brands :</label>
                            <div class="controls" id="brands">
                                <select multiple name="brands[]" id="select2" class="span11">
                                    @if (isset($company) && !empty($company))
                                        @foreach ($company as $companyData)
                                            <option value="{{ $companyData->franchisor_id }}"
                                                @if (in_array($companyData->franchisor_id, $brands)) selected @endif>
                                                {{ $companyData->company_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="select3">Associated Tags :</label>
                            <div class="controls" id="associatedTags">
                                <select multiple required name="associated_tags[]" id="select3" class="span11">
                                    @if (isset($assocTags))
                                        @foreach ($assocTags as $assocTagsData)
                                            <option value="{{ $assocTagsData->tag_id }}" selected>
                                                {{ $assocTagsData->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-actions" style="text-align: center">
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

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.uniform.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#select2').html("<option>No Data</option>");
            var lang = '{{ $locale }}';
            //initialization and maximum values to be selected from text box
            $('#select3').select2({
                placeholder: "Choose tags...",
                minimumInputLength: 2,
                ajax: {
                    url: '/associatedtags',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // Search term
                            lang: lang // Language variable
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
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
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
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
                maximumSelectionLength: 1,
            });

            $('#publisher').select2({
                placeholder: "Select Publisher...",
                minimumInputLength: 2,
                ajax: {
                    url: '/publisher',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.author_id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

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


        function checkImageSize(fileInput) {
            if (fileInput.files[0].size > 153600) {
                toastr.error('Image size should be 150 KB or less.');
                $('#showImage_msg_size').css('display', 'block');
                setTimeout(function() {
                    $('#showImage_msg_size').css('display', 'none');
                }, 5000);
                $('#newssubmit').prop('disabled', true);
            } else {
                //toastr.success('Image size is valid. You can proceed.');
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

        function Subcategoriesdata(catid) {

            $.ajax({
                url: '{{ url('admin/en/getSubcategories') }}/' + catid,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    var subcategoriesSelect = $('#insights_subcat');
                    subcategoriesSelect.empty();
                    subcategoriesSelect.append('<option value="">Select Sub Category</option>');


                    $.each(response, function(index, subcategory) {
                        subcategoriesSelect.append('<option value="' + subcategory.id + '">' +
                            subcategory.subcat_name + '</option>');
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }
    </script>
</body>

</html>
