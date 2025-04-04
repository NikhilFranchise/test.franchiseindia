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
        $lang = $locale == 'en' ? 'English' : 'Hindi';

    @endphp
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
                <a href="list-insights" class="tip-bottom">{{ $lang . ' Insights' }}</a>
                <a href="" class="current">{{ 'Create ' . $lang . ' Insights' }}</a>
            </div>
            {{-- <h1>Create Hindi Insights</h1> --}}
        </div>
        <!--End-breadcrumbs-->
        <div class="container-fluid">
            {{-- <hr> --}}
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{ 'Create ' . $lang . ' Insights' }}</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                            action="{{ Config('constants.MainDomain') }}/admin/hi/create-insights" id="editform"
                            novalidate>
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="publisher">Insights Publisher :</label>
                                <div class="controls" id="insights_publisher">
                                    <select style="display: none;" name="insights_publisher" id="publisher"
                                        class=""></select>
                                    @if ($errors->has('insights_publisher'))
                                        @foreach ($errors->get('insights_publisher') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
                                        <option value="Terms">Terms</option>
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
                                    <select required class="span11" name="insights_cat" title="Main Category"
                                        onchange="Subcategoriesdata(value);">
                                        <option value="">Select Main Category</option>
                                        @foreach ($InsightCategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->catname }}</option>
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
                                    <select required class="span11" name="insights_subcat" id="insights_subcat"
                                        title="Sub Category">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Insights Title :</label>
                                <div class="controls">
                                    <input type="text" maxlength="125" required class="span11"
                                        placeholder="Enter Title" name="title" id="title" />
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- Slug Input (Editable) -->
                            <div class="control-group" id="slug-container" style="display: none;">
                                <label class="control-label">Published URL :</label>
                                <div class="controls">
                                    <input type="text" class="span11" id="slug" name="slug"
                                        pattern="[a-z0-9\-]+"
                                        title="Only small letters, numbers, and hyphens are allowed" />
                                </div>
                            </div>
                            {{-- <div class="control-group">
                            <label class="control-label">Insights Home Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="40" required class="span11"
                                    placeholder="Enter Home Title" name="home_title" />
                            </div>
                        </div> --}}
                            {{-- <div class="control-group">
                            <label class="control-label">International Content? :</label>
                            <div class="controls">
                                <input type="checkbox" name="is_intl" value="1">
                            </div>
                        </div> --}}
                            <div class="control-group">
                                <label class="control-label">Insights Sub Title :</label>
                                <div class="controls">
                                    <input type="text" maxlength="255" required class="span11"
                                        placeholder="Sub title" id="sub_title" name="sub_title"
                                        oninput="updateCharCount()" />
                                    @if ($errors->has('sub_title'))
                                        @foreach ($errors->get('sub_title') as $error)
                                            <br><span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <p id="char_count" style="color: gray; margin-top: 5px;">(0 / 255 characters)</p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputStatus" class="control-label">Insights Content :</label>
                                <div class="controls span9">
                                    <div class="form-group">
                                        <textarea name="content" id="inputDescription" class="form-control customError" minlength="2"
                                            placeholder="Content Description" required></textarea>
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
                                    <div style="display: none; color: red;" id="showImage_msg">Invalid image type!
                                        Please
                                        select a valid image format (JPG, GIF, PNG, or WebP)</div>
                                    <div style="display: none; color: red;" id="showImage_msg_size">Please select a
                                        image
                                        of size(Less than 150 KB)</div>
                                    <br />
                                    Note : * Image Size 1600x940
                                    <!-- Alt Text Input (Initially Hidden) -->
                                    <br>
                                    <input type="text" id="altText" name="img_alt" class="span11"
                                        placeholder="Enter image alt text" style="display: none; margin-top: 10px;">

                                    <!-- Image Preview Section -->
                                    <br>
                                    <img id="imagePreview" src="#" alt="Image Preview"
                                        style="display: none; max-width: 300px; margin-top: 10px; border-radius: 5px;">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select3">Associated Tags :</label>
                                <div class="controls" id="associatedTags">
                                    <select multiple required style="display: none;" name="associated_tags[]"
                                        id="select3"></select>
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

            //content publisher
            $('#publisher').select2({
                maximumSelectionLength: 1,
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
                    //toastr.success('Valid image type selected. You may proceed.');
                    checkImageSize(fileInput);
                    previewImage(fileInput); // Show image preview
                    $("#altText").show(); // Show alt input

                    break;
                default:
                    $(this).val('');
                    toastr.error(
                        'Invalid image type! Please select a valid image format (JPG, GIF, PNG, or WebP).');
                    $('#showImage_msg').css('display', 'block');
                    // setTimeout(function() {
                    //     $('#showImage_msg').css('display', 'none');
                    // }, 5000);
                    $('#newssubmit').prop('disabled', true);
                    $('#imagePreview').hide(); // Hide preview if invalid

                    break;
            }
        });


        // we are using these functions for validate image dimensions end here

        function checkImageSize(fileInput) {
            if (fileInput.files[0].size > 153600) {
                toastr.error('Image size should be 150 KB or less.');
                $('#showImage_msg_size').css('display', 'block');
                // setTimeout(function() {
                //     $('#showImage_msg_size').css('display', 'none');
                // }, 5000);
                $('#newssubmit').prop('disabled', true);
                $('#imagePreview').hide(); // Hide preview if invalid
                $("#altText").hide(); // Hide alt input if invalid
            } else {
                toastr.success('Image size is valid. You can proceed.');
                $('#showImage_msg_size').css('display', 'none');
                $('#newssubmit').prop('disabled', false);
            }
        }

        function previewImage(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                    $("#altText").show(); // Show alt input on image preview

                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        $(document).ready(function() {
            var editor_config = {
                path_absolute: "/",
                height: 300,
                selector: "textarea",
                plugins: [
                    "table advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor | table",
                relative_urls: false,
                remove_script_host: false,
                table_default_attributes: {
                    border: "1"
                },
                table_default_styles: {
                    width: "100%",
                    borderCollapse: "collapse"
                },
                table_template: `
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>`,
                setup: function(editor) {
                    // Automatically transform first row into <thead> when inserting a new table
                    editor.on('BeforeSetContent', function(event) {
                        var content = event.content;
                        if (content.includes("<table")) {
                            var parser = new DOMParser();
                            var doc = parser.parseFromString(content, "text/html");
                            var tables = doc.querySelectorAll("table");

                            tables.forEach(function(table) {
                                var firstRow = table.querySelector("tr");
                                var existingThead = table.querySelector("thead");
                                var existingTbody = table.querySelector("tbody");

                                // Convert first row into <thead> with <th>
                                if (!existingThead && firstRow) {
                                    var thead = document.createElement("thead");
                                    var headerRow = document.createElement("tr");

                                    firstRow.querySelectorAll("td").forEach(function(td) {
                                        var th = document.createElement("th");
                                        th.innerHTML = td.innerHTML;
                                        headerRow.appendChild(th);
                                    });

                                    thead.appendChild(headerRow);
                                    table.insertBefore(thead, table.firstChild);
                                    firstRow.remove();
                                }

                                // Move remaining rows into <tbody>
                                if (!existingTbody) {
                                    var tbody = document.createElement("tbody");
                                    var rows = table.querySelectorAll("tr");

                                    rows.forEach((row, index) => {
                                        if (index !== 0) {
                                            tbody.appendChild(row);
                                        }
                                    });

                                    table.appendChild(tbody);
                                }
                            });

                            event.content = doc.body.innerHTML;
                        }
                    });
                },
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
                url: '{{ url('admin/hi/getSubcategories') }}/' + catid,
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
        document.addEventListener("DOMContentLoaded", function() {
            let titleInput = document.getElementById("title");
            let slugInput = document.getElementById("slug");
            let slugContainer = document.getElementById("slug-container");
            let subTitleInput = document.getElementById("sub_title");
            let isSlugModified = false; // Track if the slug is manually changed

            // Detect manual slug changes
            slugInput.addEventListener("input", function() {
                isSlugModified = true;
                validateSlug();
            });

            // Generate slug when moving to "Sub Title" field
            subTitleInput.addEventListener("focus", function() {
                let title = titleInput.value.trim();
                if (title === "") {
                    slugContainer.style.display = "none"; // Hide slug if title is empty
                } else {
                    if (!isSlugModified) {
                        generateSlug();
                    }
                    slugContainer.style.display = "block"; // Show slug field
                }
            });

            // Hide slug field if title is empty while typing
            titleInput.addEventListener("input", function() {
                let title = titleInput.value.trim();
                if (title === "") {
                    slugContainer.style.display = "none";
                }
            });

            function generateSlug() {
                let title = titleInput.value.trim();
                let slug = transliterate(title) // Convert Hindi to English
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
                    .replace(/\s+/g, "-") // Replace spaces with hyphens
                    .replace(/-+/g, "-"); // Remove multiple hyphens

                slugInput.value = slug;
            }

            function validateSlug() {
                let slug = slugInput.value;
                slug = slug.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
                    .replace(/\s+/g, "-") // Replace spaces with hyphens
                    .replace(/-+/g, "-"); // Remove multiple hyphens

                slugInput.value = slug;
            }

            // Improved Hindi to English transliteration function
            function transliterate(text) {
                const mapping = {
                    "अ": "a",
                    "आ": "aa",
                    "इ": "i",
                    "ई": "ee",
                    "उ": "u",
                    "ऊ": "oo",
                    "ए": "e",
                    "ऐ": "ai",
                    "ओ": "o",
                    "औ": "au",
                    "क": "k",
                    "ख": "kh",
                    "ग": "g",
                    "घ": "gh",
                    "च": "ch",
                    "छ": "chh",
                    "ज": "j",
                    "झ": "jh",
                    "ट": "t",
                    "ठ": "th",
                    "ड": "d",
                    "ढ": "dh",
                    "ण": "n",
                    "त": "t",
                    "थ": "th",
                    "द": "d",
                    "ध": "dh",
                    "न": "n",
                    "प": "p",
                    "फ": "ph",
                    "ब": "b",
                    "भ": "bh",
                    "म": "m",
                    "य": "y",
                    "र": "r",
                    "ल": "l",
                    "व": "v",
                    "श": "sh",
                    "ष": "sh",
                    "स": "s",
                    "ह": "h",
                    "ज्ञ": "gy",
                    "श्र": "shr",
                    "त्र": "tra",
                    "क्ष": "ksh",
                    "एं": "en",
                    "ऑ": "o",
                    "इं": "in",
                    "ईं": "een",
                    "उं": "un",
                    "ऊं": "oon",
                    " ": "-",
                    "1": "1",
                    "2": "2",
                    "3": "3",
                    "4": "4",
                    "5": "5",
                    "6": "6",
                    "7": "7",
                    "8": "8",
                    "9": "9",
                    "0": "0"
                };

                return text.split("").map(char => mapping[char] || char).join("");
            }
        });

        function updateCharCount() {
            let inputField = document.getElementById('sub_title');
            let charCount = inputField.value.length;
            let maxLength = inputField.getAttribute('maxlength');
            document.getElementById('char_count').textContent = charCount + " / " + maxLength + " characters";
        }
    </script>
</body>

</html>
