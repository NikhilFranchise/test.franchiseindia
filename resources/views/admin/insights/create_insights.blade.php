<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
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
            <a href="list-insights" class="tip-bottom">Insights</a>
            <a href="" class="current">Create-Insights</a></div>
        <h1>Create Insights</h1>
    </div>
    
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Insights Details</h5>
                </div>
                {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{Config('constants.MainDomain')}}/admin/create-insights" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control-group">
                            <label class="control-label">Insights Publisher :</label>
                            <div class="controls">
                                <select required class="span11" name="insights_publisher" title="author">
                                    <option value="">Select Publisher</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}">{{ $author->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('insights_publisher'))
                                    @foreach ($errors->get('insights_publisher') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- <div class="control-group">
                            <label class="control-label">Kicker :</label>
                            <div class="controls">
                                <select style="display: none;" title="kicker" name="kicker" id="kicker" required></select>
                            </div>
                        </div> --}}
                        <div class="control-group">
                            <label class="control-label">Insights Type :</label>
                            <div class="controls">
                                <select required class="span11" name="insights_type" title="insights_type">
                                    <option value="">Select Insights Type</option>
                                    <option value="News">News</option>
                                    <option value="Article">Article</option>
                                    <option value="Interview">Interview</option>
                                    <option value="Report">Report</option>
                                    <option value="Event">Event</option>
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
                                <select required class="span11" name="insights_cat" title="Main Category" onchange="Subcategoriesdata(value);">
                                    <option value="">Select Main Category</option>
                                    @foreach($InsightCategory as $category)
                                    <option value="{{$category->id}}">{{$category->catname}}</option>
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
                                <select required class="span11" name="insights_subcat" id="insights_subcat" title="Sub Category">
                                    <option value="">Select Sub Category</option>
                                </select>
                                {{-- @if ($errors->has('insights_subcat'))
                                    @foreach ($errors->get('insights_subcat') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif --}}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Insights Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="125" required class="span11" placeholder="Enter Title" name="title"/>
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
                                <input type="text" maxlength="40" required class="span11" placeholder="Enter Home Title" name="home_title"/>
                                 {{-- @if ($errors->has('home_title'))
                                    @foreach ($errors->get('home_title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif --}}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">International Content? :</label>
                            <div class="controls">
                                <input type="checkbox" name="is_intl" value="1">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Insights Sub Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="255" required class="span11" placeholder="Sub title" name="sub_title"/>
                                 @if ($errors->has('sub_title'))
                                    @foreach ($errors->get('sub_title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="inputStatus" class="control-label">Insights Content :</label>
                            <div class="controls span9">
                                <div class="form-group">
                                    <textarea name="content" id="inputDescription" class="form-control customError" minlength="2" placeholder="Content Description" required></textarea>
                                     @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Image :</label>
                            <div class="controls">
                                <input type="file" required id="showImage" class="span11" name="image">
                                 @if ($errors->has('image'))
                                    @foreach ($errors->get('image') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                                <div style="display: none; color: red;" id="showImage_msg">Please select a valid image (jpg / gif / png)</div>
                                <div style="display: none; color: red;" id="showImage_msg_size">Please select a image of size(Less than 150 KB)</div>
                                <br/>
                            Note : * Image Size 680x435 
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="select2">Related Brands :</label>
                            <div class="controls" id="brands">
                                <select multiple style="display: none;" name="brands[]" id="select2"></select>
                                 {{-- @if ($errors->has('brands'))
                                    @foreach ($errors->get('brands') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif --}}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="select3">Associated Tags :</label>
                            <div class="controls" id="associatedTags">
                                <select multiple required style="display: none;" name="associated_tags[]" id="select3"></select>
                                 {{-- @if ($errors->has('associated_tags'))
                                    @foreach ($errors->get('associated_tags') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif --}}
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{url('admin/js/bootstrap.min.js')}}"></script>
<script src="{{url('admin/js/jquery.uniform.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>
<script src="{{url('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/js/typeahead.bundle.js')}}"></script>
<script src="{{url('admin/js/matrix.js')}}"></script>
<script src="{{url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#select2').html("<option>No Data</option>");

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
                        results: $.map(data, function (item) {
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
                        results: $.map(data, function (item) {
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
                        results: $.map(data, function (item) {
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
                    results: $.map(data, function (item) {
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

    // $("#showImage").change(function () {
    //     var val = $(this).val();
    //     switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
    //         case 'gif':
    //         case 'jpg':
    //         case 'png':
    //             $('#showImage_msg').css('display', 'none');
    //             $('#newssubmit').prop('disabled', false);
    //             break;
    //         default:
    //             $(this).val('');
    //             $('#showImage_msg').css('display', 'block');
    //             $('#newssubmit').prop('disabled', true);
    //             break;
    //     }
    // });
    
    // $('#showImage').bind('change', function () {
    //     if (this.files[0].size > 153600) {
    //         $('#showImage_msg_size').css('display', 'block');
    //         $('#newssubmit').prop('disabled', true);
    //     } else {
    //         $('#showImage_msg_size').css('display', 'none');
    //         $('#newssubmit').prop('disabled', false);
    //     }
    // });
    $("#showImage").change(function () {
    var val = $(this).val();
    var fileInput = this;
     val = val.replace('jpeg', 'jpg');
    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'jpeg':
        case 'png':
            readImageDimensions(fileInput.files[0], function (width, height) {
                if (width === 680 && height === 435) {
                    $('#showImage_msg_dimensions').css('display', 'none');
                    checkImageSize(fileInput);
                } else {
                    toastr.error('Please select an image with dimensions 680x435.');
                    // alert('Please select an image with dimensions 680x435.');
                    $(fileInput).val('');
                    $('#showImage_msg_dimensions').css('display', 'block');
                    $('#newssubmit').prop('disabled', true);
                }
            });
            break;
        default:
            $(this).val('');
            $('#showImage_msg').css('display', 'block');
            $('#newssubmit').prop('disabled', true);
            break;
    }
});

function readImageDimensions(file, callback) {
    var reader = new FileReader();
    reader.onload = function (e) {
        var img = new Image();
        img.onload = function () {
            callback(img.width, img.height);
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function checkImageSize(fileInput) {
    if (fileInput.files[0].size > 153600) {
        $('#showImage_msg_size').css('display', 'block');
        $('#newssubmit').prop('disabled', true);
    } else {
        $('#showImage_msg_size').css('display', 'none');
        $('#newssubmit').prop('disabled', false);
    }
}

$('#showImage').bind('change', function () {
    checkImageSize(this);
});


</script>

    <script>
        $( document ).ready(function() {
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

            $("#editform").validate(
                {
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
                    errorPlacement: function (error, element) {
                        if (element.hasClass('customError')) {
                            // custom error placement
                            element.parent().after(error);
                        } else {
                            element.after(error); // default error placement
                        }
                    }
                }
            );

            $('#authorId').select2({
                placeholder: "Choose Publisher...",
                minimumInputLength: 2,

                ajax: {
                    url: '{{url("admin/articles/english/get-authors")}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#associatedTags').select2({
                placeholder: "Choose Associated Tags...",
                minimumInputLength: 2,

                ajax: {
                    url: '{{url("admin/articles/english/get-kickers")}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#tagId').select2({
                placeholder: "Choose Associated Tags...",
                minimumInputLength: 2,

                ajax: {
                    url: '{{url("admin/articles/english/get-kickers")}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#audioId').select2({
                placeholder: "Choose Audio Files...",
                minimumInputLength: 2,

                ajax: {
                    url: '{{url("admin/articles/english/get-audio-files")}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

        });

       function Subcategoriesdata(catid) {
        
        $.ajax({
        url: '{{ url("admin/getSubcategories") }}/' + catid,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            
            var subcategoriesSelect = $('#insights_subcat');
            subcategoriesSelect.empty(); 
            subcategoriesSelect.append('<option value="">Select Sub Category</option>'); 

            
            $.each(response, function(index, subcategory) {
                subcategoriesSelect.append('<option value="' + subcategory.id + '">' + subcategory.subcat_name + '</option>');
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
