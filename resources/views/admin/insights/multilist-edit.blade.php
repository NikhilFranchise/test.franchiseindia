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
    <style>
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
            border: 1px solid #000
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
                $url = 'admin/hi/save-multiple-insights';
                $hi = 'Hindi';
                $type = 'hi';
            @endphp
        @else
            @php
                $url = 'admin/en/save-multiple-insights';
                $hi = 'English';
                $type = 'en';
            @endphp
        @endif
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="list-insights" class="tip-bottom">List Insights</a>
                <a href="" class="current">{{ 'Multiple ' . $hi . ' Insights' }}</a>
            </div>
            <h1>{{ $hi . ' Insights List' }}</h1>
        </div>
        <!--End-breadcrumbs-->
        <br>
        <div style="margin-top: 5%;float: right;" class="container-fluid">
            <form action="{{ url('admin/' . $type . '/list-insights') }}" method="get">
                Search Keyword : <input type="text" name="search"class="span7"
                    placeholder="Enter Title or Insights Id to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                <input type="submit" class="btn"
                    value="Search"style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ url('admin/' . $type . '/list-insights') }}" class="btn"style="margin-top: -12px;">Reset Search</a>
            </form>
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
                            <form method="POST" action="{{ url($url) }}">
                                @csrf <!-- Include CSRF token for security -->
                                <!-- Global Select Boxes -->
                                {{--  <h3 style="text-align:center">{{$hi . ' Insights List' }}</h3>  --}}
                                <h3 style="text-align:center">Bulk Edit {{ $hi }} Insights</h3>

                                <p style="text-align: center; color: #faa732;">
                                    Make changes to multiple insights in a single action.
                                </p>
                                <div class="bulk-actions">
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

                                    <select required id="global_main_category" name="global_main_category[]"
                                        class="form-control" onchange="Subcategoriesdata(this.value)">
                                        <option value="">Select Main Category</option>
                                        @foreach ($InsightCategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->catname }}</option>
                                        @endforeach
                                    </select>

                                    <select id="global_sub_category" name="global_sub_category[]" class="form-control">
                                        <option value="">Select Sub Category</option>
                                        <!-- Subcategories will be dynamically loaded based on Main Category -->
                                    </select>

                                    <select required id="global_status" name="global_status[]" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                    <select required id="global_author" name="global_author[]" class="form-control">
                                        <option value="">Select Author</option>
                                        @foreach ($InsightAuthor as $author)
                                            <option value="{{ $author->author_id }}">{{ $author->title }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-primary form-control" id="apply_bulk">Apply
                                        Changes</button>
                                </div>
                                <!-- Table with Insights -->
                                <table>
                                    <thead>
                                        <tr class="gradeX">
                                            <th style="width:6%;">Check all<input type="checkbox" id="select_all"></th>
                                            <th>News ID</th>
                                            <th>Title</th>
                                            <th>Insight Type</th>
                                            <th>Main Category</th>
                                            <th>Sub Category</th>
                                            <th>Link</th>
                                            <th>Author</th>
                                            <th>Status</th>
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
                                                <td>
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
                                                    <div class="round-button">
                                                        <div class="round-button-circle"><a
                                                                href="{{ $url }}" target="_blank"
                                                                class="round-button">Go</a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @foreach ($insights->author as $author)
                                                        {{ $author->title }}
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" value="{{ $insights->news_id }}"
                                                                class="activestate"
                                                                {{ $insights->status == 1 ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </center>
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
                        <div class="custpagin">{{ $data->links('pagination::bootstrap-4') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
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

                var id = this.value;
                var type = '{{ $type }}';
                var status = 0;
                if (this.checked)
                    status = 1;

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
                // alert(bulkInsightType +'--'+ bulkMainCategory +'--'+ bulkSubCategory +'--'+ bulkStatus +'--'+ bulkAuthor);
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
                });

                // Submit the form
                $(this).closest('form').submit();
            });
        });
    </script>
    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('admin/js/matrix.tables.js') }}"></script>
</body>

</html>
