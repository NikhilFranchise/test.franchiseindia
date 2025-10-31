@extends('admin.layout.master')
@section('IN', 'active open')
@section('INL', 'active')
@section('content')
    @push('styles')
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
        $language = $lang === 'en' ? 'English' : 'Hindi';
    @endphp
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{ route('insights.list', ['lang' => $lang]) }}" class="tip-bottom" title="Go to Manage Insights"><i
                    class="fa fa-newspaper"></i> Manage Insights</a>
            <a href="{{ url()->current() }}" class="current">{{ 'Add ' . $language . ' Insights' }}</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="fa fa-newspaper"></i></span>
                    <h5>{{ 'Add ' . $language . ' Insights' }}</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                        action="{{ route('insights.store', ['lang' => $lang]) }}" id="insightform" novalidate>
                        @csrf

                        <div class="control-group">
                            <label class="control-label" for="publisher">Insights Publisher :</label>
                            <div class="controls" id="insights_publisher">
                                <select name="insights_publisher" id="publisher"
                                    @if ($role === 'author') disabled @endif>
                                    @foreach ($authorData as $author)
                                        <option value="{{ $author['author_id'] ?? $author->author_id }}">
                                            {{ $author['title'] ?? $author->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($role === 'author')
                                <input type="hidden" name="insights_publisher"
                                    value="{{ $authorData[0]['author_id'] ?? $authorData[0]->author_id }}">
                            @endif
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
                                <input type="text" maxlength="125" required class="span11" id="title"
                                    placeholder="Enter Title" name="title" oninput="updateCharCount('title')" />
                                @if ($errors->has('title'))
                                    @foreach ($errors->get('title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                                <p id="title_count" style="color: gray; margin-top: 5px;">(0 / 125 characters)</p>

                            </div>
                        </div>
                        <!-- Slug Input (Editable) -->
                        <div class="control-group" id="slug-container" style="display: none;">
                            <label class="control-label">Published URL :</label>
                            <div class="controls">
                                <input type="text" class="span11" id="slug" name="slug" pattern="[a-z0-9\-]+"
                                    title="Only small letters, numbers, and hyphens are allowed" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Insights Sub Title :</label>
                            <div class="controls">
                                <input type="text" maxlength="255" required class="span11" placeholder="Sub title"
                                    name="sub_title" id="sub_title" oninput="updateCharCount('sub_title')" />
                                @if ($errors->has('sub_title'))
                                    @foreach ($errors->get('sub_title') as $error)
                                        <br><span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                                <p id="sub_title_count" style="color: gray; margin-top: 5px;">(0 / 255 characters)</p>
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
                                    of size(Less than 300 KB)</div>
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
                        <div class="form-actions">
                            <a href="{{ route('insights.list', ['lang' => $lang]) }}" class="btn btn-secondary"><i
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
        <script src="{{ url('admin/js/jquery.min.js') }}"></script>
        <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
        <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@indic-transliteration/sanscript"></script>
        <script>
            $(document).ready(function() {
                $('#select2').html("<option>No Data</option>");
                var lang = '{{ $lang }}';
                $('#select3').select2({
                    placeholder: "Choose tags...",
                    minimumInputLength: 2,
                    ajax: {
                        url: "{{ route('associated.tag', ['lang' => $lang]) }}",
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

                //initialization and maximum values to be selected from text box
                $('#select1').select2({
                    maximumSelectionLength: 1,
                });


                $('#publisher').select2({
                    placeholder: "Select Publisher...",
                    minimumInputLength: 2,
                    ajax: {
                        url: "{{ route('author.select') }}",
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

            function Subcategoriesdata(catid) {
                var lang = '{{ $lang }}';
                $.ajax({
                    url: "{{ route('getsubCategories', ['lang' => $lang, 'catid' => '__CATID__']) }}"
                        .replace('__CATID__', catid),
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
                        $("#altText").show(); // Show alt input
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
                        $("#altText").hide();
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
                    $("#altText").hide();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Valid image size!',
                        text: 'You can proceed.',
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true,
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
                        $("#altText").show();
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
            });

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

                async function generateSlug() {
                    const title = titleInput.value.trim();
                    const lang = '{{ $lang }}';
                    let slug = '';

                    if (lang === 'hi') {
                        // Convert Hindi (Devanagari) to Latin using Sanscript
                        const transliterated = Sanscript.t(title, 'devanagari', 'itrans');
                        // Generate Slug
                        slug = transliterated.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                    } else {
                        slug = title.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                    }
                    slugInput.value = slug;
                }

                function validateSlug() {
                    let slug = slugInput.value;
                    slug = slug.toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
                        .replace(/\s+/g, "-") // Replace spaces with hyphens
                        .replace(/-+/g, "-"); // Remove multiple dashes

                    slugInput.value = slug;
                }


            });

            function updateCharCount(fieldId) {
                const input = document.getElementById(fieldId);
                const countDisplay = document.getElementById(fieldId + '_count');

                if (!input || !countDisplay) return; // Safety check

                const currentLength = input.value.length;
                const maxLength = input.getAttribute('maxlength');

                countDisplay.textContent = `(${currentLength} / ${maxLength} characters)`;
            }



            document.getElementById("insightform").addEventListener("submit", function(e) {
                let errors = [];

                // Publisher
                let publisher = document.getElementById("publisher");
                if (publisher && publisher.value === "") {
                    errors.push("Please select an Insights Publisher.");
                }

                // Insights Type
                let insightsType = document.querySelector("select[name='insights_type']");
                if (!insightsType.value) {
                    errors.push("Please select an Insights Type.");
                }

                // Main Category
                let mainCat = document.querySelector("select[name='insights_cat']");
                if (!mainCat.value) {
                    errors.push("Please select a Main Category.");
                }

                // Title
                let title = document.getElementById("title");
                if (!title.value || title.value.length < 3 || title.value.length > 125) {
                    errors.push("Insights Title must be between 3 and 125 characters.");
                }

                // Sub Title
                let subTitle = document.getElementById("sub_title");
                if (!subTitle.value || subTitle.value.length > 255) {
                    errors.push("Sub Title is required and max 255 characters.");
                }

                // Content
                let content = document.getElementById("inputDescription");
                if (!content.value || content.value.length < 2) {
                    errors.push("Insights Content must have at least 2 characters.");
                }

                // Image (required only for create)
                let image = document.getElementById("showImage");
                if (image && image.files.length === 0) {
                    errors.push("Please upload an image.");
                }

                if (errors.length > 0) {
                    e.preventDefault(); // stop form submission
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errors.join("<br>"),
                        confirmButtonText: 'OK'
                    });
                }
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
                    timerProgressBar: true,
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
                    timerProgressBar: true,
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
