<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .typeahead,
        .tt-query,
        .tt-hint {
            border: 2px solid #CCCCCC;
            border-radius: 8px;
            font-size: 22px;
            height: 30px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 850px;
        }

        .typeahead {
            background-color: #FFFFFF;
        }

        .typeahead:focus {
            border: 2px solid #0097CF;
        }

        .tt-query {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }

        .tt-hint {
            color: #999999;
        }

        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 422px;
        }

        .tt-suggestion {
            font-size: 22px;
            padding: 3px 20px;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #0097CF;
            color: #FFFFFF;
        }

        .tt-suggestion p {
            margin: 0;
        }

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
    @section('CAT')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->
    <div id="content">
        <!--breadcrumbs-->
        @php
            $locale = request()->segment(2);
            $lang = $locale == 'en' ? 'English' : 'Hindi';
        @endphp
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i>Home</a>
                <a href="#" class="tip-bottom">{{ $lang }} Main Category/{{ $lang }} Sub
                    Category</a>
                <a href="#" class="current">Create {{ $lang }} Sub Category</a>
            </div>
            <h1>Create {{ $lang }} Sub Category</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Sub Category Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        @if (!empty(session()->get('failed')))
                            <div class="alert alert-danger">{{ session()->get('failed') }}</div>
                        @endif
                        <form method="POST" class="form-horizontal"
                            action="{{ url('admin/' . $locale . '/create/subcat') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="control-group">
                                <label class="control-label">Main Category :</label>
                                <div class="controls">

                                    <select class="span11" name="maincat" spellcheck="false">
                                        <option value="">Select Main Category</option>
                                        @foreach ($cat as $value)
                                            <option value="{{ $value->id }}">{{ $value->catname }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('maincat')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub Category :</label>
                                <div class="controls" id="sub_categories">
                                    <select multiple style="display: none;" name="sub_categories[]"
                                        id="select3"></select>
                                    @error('sub_categories')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($locale == 'hi')
                                <div class="control-group">
                                    <label class="control-label">Sub Category Slug:</label>
                                    <div class="controls">
                                        <input class="span11" required name="sub_catslug[]" />
                                    </div>
                                </div>
                            @endif

                            <div class="form-actions" style="text-align: center;">
                                <button type="submit" id="ariclesubmit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    !--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/typeahead.bundle.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Add this line for jQuery -->

    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.uniform.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/typeahead.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Define your English and Hindi categories
            var businessCategories = @json($subCategories);
            console.log(businessCategories);

            // Get current locale
            var locale = "{{ $locale }}";

            // Filter by language
            var categories = businessCategories.filter(function(category) {
                return category.lang === locale;
            });

            // Map to Select2 format using subcat_name
            var tagArray = categories.map(function(category) {
                return {
                    id: category.subcat_name, // What gets submitted
                    text: category.subcat_name // What gets shown
                };
            });

            // Initialize Select2
            $('#select3').select2({
                placeholder: locale === 'en' ? "Choose Subcategories..." : "उप श्रेणियाँ चुनें...",
                minimumInputLength: 2,
                tags: true,
                data: tagArray,
                createTag: function(params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }
                    return {
                        id: term, // Save subcat_name directly
                        text: term // Display it as-is
                    };
                }
            });
        });
    </script>

</body>

</html>
