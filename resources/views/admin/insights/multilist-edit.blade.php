<!DOCTYPE html>
<html lang="en">

<head>
    <title>Franchise India Admin Panel</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap.min.css') }}" />
    <link href="{{ url('admin/css/bootstrap-switch.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/css/matrix-media.css') }}" />
    <link href="{{ url('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        ul.quick-edits {
            list-style: none;
            padding-left: 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        a.visit {
            background: #014ea5;
            border-radius: 4px;
            width: 93px;
            display: block;
            color: #ffffff;
            margin: 0px 5px;
            padding: 5px 0px;
        }

        ul.quick-edits li {
            width: 18%;
        }

        ul.quick-edits li.lastitem {
            width: 100% !important;
            margin-bottom: 10px
        }

        ul.quick-edits .form-control {
            width: 100%
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

        .labelwrap {
            display: flex;
            justify-content: space-between;
            padding: 0px 10px 0px 0px;
        }

        .labelwrap label {
            width: 30%;
            font-size: 11px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            display: none;
        }

        ul.quick-edits .select2-selection__choice {
            width: auto;
            margin-bottom: 0px;
        }





        .search-results {
            /* margin-top: 63px; */
            display: block;
            width: 96%;
            margin-top: 5%;
            float: right;
        }

        .search-results input {
            width: 210px;
        }

        .search-result-inner {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
        }

        .search-result-inner a.greens {
            height: 20px;
        }


        .switch input {
            display: none
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: #fff;
            -webkit-transition: .4s;
            transition: .4s
        }

        input:checked+.slider {
            background-color: #2196f3
        }

        input:checked+.slider.round.privacy {
            background-color: #faa732
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196f3
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px)
        }

        .gradeX td,
        th {
            text-align: center;
            border: 1px solid #000;
        }

        .slider.round {
            border-radius: 34px
        }

        .slider.round:before {
            border-radius: 50%
        }

        .round-button-circle {
            width: 45px;
            border-radius: 50%;
            overflow: hidden;
            background: #4679bd;
            box-shadow: 0 0 3px gray
        }

        .round-button-circle:hover {
            background: #30588e
        }

        .round-button a {
            display: block;
            float: left;
            width: 100%;
            padding-top: 35%;
            padding-bottom: 50%;
            line-height: 1em;
            margin-top: -.5em;
            text-align: center;
            color: #e2eaf3;
            font-family: Verdana, "serif";
            font-size: 1.2em;
            font-weight: 700;
            text-decoration: none
        }

        .custpagin {
            background-color: #dfdfdf;
            margin-bottom: 10px
        }

        .custpagin .pagination li {
            display: inline-grid;
            font-size: 20px;
            margin-left: 1px;
            margin-right: 1px;
            border-width: 1px;
            border-radius: 6px
        }

        .custpagin .pagination {
            text-align: right
        }

        .custpagin .pagination li.active {
            background-color: #faa732;
            color: #fff;
            padding: 3px 7px;
            border-radius: 6px;
            border: 1px
        }

        .custpagin .pagination li a {
            padding: 3px 7px;
            background-color: #41bedd;
            color: #fff;
            border-radius: 6px;
            border: 1px
        }

        .form-control {
            width: 16%;
            align-items: center
        }

        .bulk-actions {
            width: 100%;
            padding: 10px
        }

        #apply_bulk {
            margin-left: 8px;
            margin-bottom: 10px
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
        @if (Request::is('admin/hi/multilist-insights'))
            @php
                $saveUrl = 'admin/hi/save-multiple-insights';
                $hi = 'Hindi';
                $type = 'hi';
            @endphp
        @else
            @php
                $saveUrl = 'admin/en/save-multiple-insights';
                $hi = 'English';
                $type = 'en';
            @endphp
        @endif
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="list-insights" class="tip-bottom">Insights List</a>
                <a class="current">{{ 'Quick Edit Insights Dashboard (Hindi/English)' }}</a>
            </div>
            <h1>{{ 'Quick Edit Insights Dashboard (Hindi/English)' }}</h1>
        </div>
        <!--End-breadcrumbs-->
        <br>
        <div class="search-results container-fluid">
            <div class="search-result-inner">
                @php
                    // Determine the correct category model based on locale
                    $locale = request()->segment(2);
                    $catModel =
                        $locale === 'en'
                            ? \App\Models\InsightCategory::class
                            : \App\Models\InsightsHindiCategory::class;

                    // Fetch category name if a category is selected
                    $categoryName = request()->category ? $catModel::find(request()->category)?->catname : null;
                @endphp

                @if (request()->search || request()->type || request()->category)
                    <div style="text-align: center; color: #28b779;">
                        Found <strong>{{ $totalCount }} </strong>Results For:
                        <strong>
                            {{ request()->search ? 'Search: ' . request()->search : '' }}
                            {{ request()->type ? ' | Type: ' . request()->type : '' }}
                            {{ $categoryName ? ' | Category: ' . $categoryName : '' }}
                        </strong>
                    </div>
                @endif


                <div></div>
                <form method="get">
                    <input type="text" name="search"class="span7" placeholder="Enter Title or Insights Id to search"
                        @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                    @if (!empty(request()->search))
                    <select name="type" class="span" onchange="this.form.submit()">
                        <option value="">Insight Types</option>
                        @foreach ($insightTypes as $insightType)
                            <option value="{{ $insightType }}"
                                {{ request()->query('type') == $insightType ? 'selected' : '' }}>
                                {{ $insightType }}
                            </option>
                        @endforeach
                    </select>
                    @endif
                    <select name="category" onchange="this.form.submit()">
                        <option value="">Insights Category</option>
                        @foreach ($InsightCategory as $cat)
                            <option value="{{ $cat->id }}"
                                {{ request()->query('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->catname }}
                            </option>
                        @endforeach
                    </select>
                    {{-- @endif --}}
                    <input type="submit" class="btn"
                        value="Search"style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                    <a href="{{ url('admin/' . $type . '/multilist-insights') }}"
                        class="btn"style="margin-top: -12px;">Reset
                        Search</a>
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="nav nav-tabs">
                        <li @if (url()->current() == url('admin/en/multilist-insights')) class="active" @endif><a
                                href="{{ url('admin/en/multilist-insights') }}">English Insights List</a></li>
                        <li @if (url()->current() == url('admin/hi/multilist-insights')) class="active" @endif><a
                                href="{{ url('admin/hi/multilist-insights') }}">Hindi Insights List</a></li>
                    </ul>
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form method="POST" action="{{ url($saveUrl) }}">
                                @csrf <!-- Include CSRF token for security -->
                                <!-- Global Select Boxes -->
                                {{--  <h3 style="text-align:center">{{$hi . ' Insights List' }}</h3>  --}}
                                <h3 style="text-align:center">Quick Edit Insights Dashboard (Hindi/English)</h3>

                                <p style="text-align: center; color: #28b779;">
                                    Edit multiple insights records at once with a single action.
                                </p>
                                <ul class="quick-edits">
                                    <li>
                                        <label for="">Insight Type</label>
                                        <select required id="global_insight_type" name="global_insight_type[]"
                                            class="form-control">
                                            <option value="">Select Insight Type</option>
                                            <option value="News">News</option>
                                            <option value="Article">Article</option>
                                            <option value="Interview">Interview</option>
                                            <option value="Report">Report</option>
                                            <option value="Event">Event</option>
                                            <option value="Terms">Terms</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label for="">Main Category</label>
                                        <select required id="global_main_category" name="global_main_category[]"
                                            class="form-control" onchange="Subcategoriesdata(this.value)">
                                            <option value="">Select Main Category</option>
                                            @foreach ($InsightCategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->catname }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <label for="">Sub Category</label>
                                        <select id="global_sub_category" name="global_sub_category[]"
                                            class="form-control">
                                            <option value="">Select Sub Category</option>
                                            <!-- Subcategories will be dynamically loaded based on Main Category -->
                                        </select>
                                    </li>
                                    <li>
                                        <label for="">Author</label>
                                        <select required id="global_author" name="global_author[]" class="form-control">
                                            <option value="">Select Author</option>
                                            @foreach ($InsightAuthor as $author)
                                                <option value="{{ $author->author_id }}">{{ $author->title }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <label for="">Status/Privacy</label>
                                        <select required id="global_status" name="global_status[]" class="form-control">
                                            <option value="">Select Status/Privacy</option>
                                            <option value="1">Public</option>
                                            <option value="0">Draft</option>
                                            <option value="2">Private</option>
                                        </select>
                                    </li>
                                    <li class="lastitem">
                                        <label for="">Associated Tags</label>
                                        <select multiple required name="associated_tags[]" id="select3"
                                            class="form-control select2">
                                        </select>
                                    </li>
                                    <center><button type="submit" class="btn btn-primary form-control"
                                            id="apply_bulk">Apply Changes</button></center>
                                </ul>
                                <!-- Table with Insights -->
                                <table>
                                    <thead>
                                        <tr class="gradeX">
                                            <th style="width: 6%;">Check all<input type="checkbox" id="select_all">
                                            </th>
                                            <th style="width: 4%;">News ID</th>
                                            <th style="width: 45%;">Title</th>
                                            <th style="width: 5%;">Insight Type</th>
                                            <th style="width: 6%;">Main Category</th>
                                            <th style="width: 3%;">Sub Category</th>
                                            <th style="width: 2%;">Link</th>
                                            <th style="width: 7%;">Author</th>
                                            <th>Status/Privacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $insights)
                                            <tr class="gradeX">
                                                @php
                                                    $url =
                                                        '/insights/' .
                                                        $type .
                                                        '/' .
                                                        strtolower($insights->insight_type) .
                                                        '/' .
                                                        $insights->slug .
                                                        '.' .
                                                        $insights->news_id;
                                                @endphp
                                                <td style="width: 2%">
                                                    <input type="checkbox" class="bulk-checkbox"
                                                        value="{{ $insights->news_id }}" name="selected_articles[]">
                                                    <input type="hidden" name="insights_slug[]"
                                                        value="{{ $insights->slug }}">
                                                </td>
                                                <td>{{ $insights->news_id }}</td>
                                                <td>{{ $insights->title }}</td>
                                                <td>{{ $insights->insight_type }}</td>
                                                <td>
                                                    @foreach ($insights->category as $category)
                                                        {{ $category->catname }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($insights->subcategory as $subcategory)
                                                        {{ $subcategory->subcat_name }}
                                                    @endforeach
                                                </td>
                                                <td>

                                                    <a href="{{ $url }}" target="_blank"
                                                        class="btn btn-info"><i class="fa fa-external-link"></i></a>
                                                </td>
                                                <td>
                                                    @foreach ($insights->author as $author)
                                                        {{ $author->title }}
                                                    @endforeach

                                                </td>
                                                <td>
                                                    {{-- <label class="switch">
                                                        <input type="checkbox" value="{{ $insights->news_id }}"
                                                            class="activestate"
                                                            {{ $insights->status == 1 ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label> --}}
                                                    <div class="labelwrap">
                                                        <label>
                                                            <input type="radio"
                                                                name="status_{{ $insights->news_id }}"
                                                                id="{{ $insights->news_id }}" value="1"
                                                                class="activestate"
                                                                {{ $insights->status == 1 ? 'checked' : '' }}>
                                                            Public
                                                        </label>
                                                        <label>
                                                            <input type="radio"
                                                                name="status_{{ $insights->news_id }}"
                                                                value="0"id="{{ $insights->news_id }}"
                                                                class="activestate"
                                                                {{ $insights->status == 0 ? 'checked' : '' }}>
                                                            Draft
                                                        </label>
                                                        <label>
                                                            <input type="radio"
                                                                name="status_{{ $insights->news_id }}" value="2"
                                                                class="activestate" id="{{ $insights->news_id }}"
                                                                {{ $insights->status == 2 ? 'checked' : '' }}>
                                                            Private
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>

                            <!-- Modal confirm -->
                            <div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body" id="confirmMessage">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" id="confirmOk">Ok</button>
                                            <button type="button" class="btn btn-default"
                                                id="confirmCancel">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custpagin">
                            {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
                            {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#select3').html("<option>No Data</option>");
            var lang = '{{ $type }}';
            //initialization and maximum values to be selected from text box
            $('#select3').select2({
                placeholder: "Choose Associated Tags...",
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
        });

        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('success') }}")
        @elseif (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.error(" {{ session('error') }}")
        @endif
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.activestate', function() {

                var status = this.value;
                var id = this.id;
                var type = '{{ $type }}';
                // console.log(id + '----' + newsid);
                // var status = id;
                // if (this.checked)
                //     status = id;

                $.ajax({
                    type: "POST",
                    url: '/admin/' + type + '/updateinsightstatus',
                    data: {
                        "News": id,
                        "contentStatus": status,
                        "_token": "{{ csrf_token() }}"
                    }
                });
            });
        });

        var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this news?";
        $('.deleteauthor').click(function() {
            // alert('delete');
            var x = $(this).attr('data-value');
            confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
                $.ajax({
                    type: "POST",
                    url: '/admin/deleteinsights',
                    data: {
                        "contentId": x,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $(document).ajaxStop(function() {
                            window.location.reload();
                        });
                    }
                });
            });
        });

        function confirmDialog(message, onConfirm) {
            var fClose = function() {
                modal.modal("hide");
            };
            var confirm = $("#confirmOk");
            var modal = $("#confirmModal");
            modal.modal("show");
            $("#confirmMessage").empty().append(message);
            confirm.one('click', onConfirm);
            confirm.one('click', fClose);
            $("#confirmCancel").one("click", fClose);
        }

        function Subcategoriesdata(catid) {
            var locale = '{{ request()->segment(2) }}';
            $.ajax({
                url: '{{ url('admin') }}/' + locale + '/getSubcategories/' + catid,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    var subcategoriesSelect = $('#global_sub_category');
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

        $(document).ready(function() {
            // Select All Checkbox Functionality
            $('#select_all').on('change', function() {
                const isChecked = $(this).prop('checked');
                $('.bulk-checkbox').prop('checked', isChecked); // Check or uncheck all rows
            });

            // Synchronize "Select All" with Individual Checkboxes
            $('.bulk-checkbox').on('change', function() {
                const allChecked = $('.bulk-checkbox').length === $('.bulk-checkbox:checked').length;
                $('#select_all').prop('checked', allChecked); // Update Select All status
            });

            // Apply Bulk Changes Functionality
            $('#apply_bulk').on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission

                const selectedArticles = $('.bulk-checkbox:checked');
                if (selectedArticles.length === 0) {
                    alert('Please select at least one insights Data.');
                    return;
                }

                // Get global select box values
                const bulkInsightType = $('#global_insight_type').val();
                const bulkMainCategory = $('#global_main_category').val();
                const bulkSubCategory = $('#global_sub_category').val();
                const bulkStatus = $('#global_status').val();
                const bulkAuthor = $('#global_author').val();
                const bulkprivacy = $('#privacy').val();
                const bulkAssociatedTags = $('#select3').val();
                // alert(bulkInsightType + '--' + bulkMainCategory + '--' + bulkSubCategory + '--' +
                //     bulkStatus + '--' + bulkAuthor + '----' + bulkprivacy + '----' + bulkAssociatedTags);
                // Attach these values to each selected article
                selectedArticles.each(function() {
                    const row = $(this).closest('tr');
                    const articleId = $(this).val();

                    if (bulkInsightType) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][insight_type]`,
                            value: bulkInsightType,
                        }).appendTo(row);
                    }
                    if (bulkMainCategory) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][main_category]`,
                            value: bulkMainCategory,
                        }).appendTo(row);
                    }
                    if (bulkSubCategory) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][sub_category]`,
                            value: bulkSubCategory,
                        }).appendTo(row);
                    }
                    if (bulkStatus) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][status]`,
                            value: bulkStatus,
                        }).appendTo(row);
                    }
                    if (bulkAuthor) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][author]`,
                            value: bulkAuthor,
                        }).appendTo(row);
                    }
                    if (bulkprivacy) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][privacy]`,
                            value: bulkprivacy,
                        }).appendTo(row);
                    }
                    if (bulkAssociatedTags) {
                        $('<input>', {
                            type: 'hidden',
                            name: `articles[${articleId}][associated_tags]`,
                            value: bulkAssociatedTags,
                        }).appendTo(row);
                    }
                });

                // Submit the form
                $(this).closest('form').submit();
            });

        });
    </script>
    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ url('admin/js/select2.min.js') }}"></script> --}}
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('admin/js/matrix.tables.js') }}"></script>
</body>

</html>
