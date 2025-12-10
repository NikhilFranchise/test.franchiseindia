@extends('crreAdmin.layout.master')
@section('IN', 'active open')
@section('QEI', 'active')
@section('content')
    @push('styles')
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
                width: 490px;
                height: 30px;
                overflow: auto;
                border: 1px solid #cccccc;
            }

            .labelwrap {
                display: flex;
                /* justify-content: space-between; */
                /* padding: 0px 30px 0px 20px; */
            }

            .labelwrap label {
                /* width: 30%; */
                font-size: 11px;
            }

            .select2-container--open .select2-dropdown--below {
                background: transparent !important;
                border: none !important;
            }

            .select2-container--default .select2-results>.select2-results__options {
                background: #ffffff;
                border: 1px solid #cccccc;
                width: 488px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow b {
                display: none;
            }

            .select2-container--default .select2-search--inline .select2-search__field {
                line-height: normal;
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
                width: 235px;
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

            .nav-tabs>li.active>a,
            .nav-tabs>li.active>a:hover,
            .nav-tabs>li.active>a:focus {
                color: #fff;
                cursor: default;
                background-color: #4b4f54;
                border: 1px solid #ddd;
                border-bottom-color: transparent;
            }


            .nav-tabs>li>a:hover,
            .nav-tabs>li>a:focus {
                margin-right: 2px;
                line-height: 1.42857143;
                border: 1px solid transparent;
                border-radius: 4px 4px 0 0;
                background-color: #4b4f54;
                color: #fff;
            }

            #quickTable td {
                font-size: 13px;
                text-align: left;
            }

            #quickTable th {
                font-size: 13px;
                padding: 7px;
            }

            .btn-secondary {
                color: #fff;
                background-color: #6c757d;
                border-color: #6c757d;
                box-shadow: none;
            }

            .btn-secondary:hover {
                color: #fff;
                background-color: #5a6268;
                border-color: #545b62;
            }

            .form-actions {
                margin-top: 0;
                margin-bottom: 0;
                width: 100%;
            }

            .widget-box {
                border-bottom: 1px solid #CDCDCD;
            }
        </style>
    @endpush
    @php
        $language = $lang === 'en' ? 'English' : 'Hindi';
    @endphp
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.content.list', ['lang' => $lang]) }}" title="Go to Manage Content"
                class="tip-bottom"><i class="fa fa-newspaper"></i> Manage
                Content</a>
            <a href="{{ url()->current() }}" class="current">{{ 'Quick Edit ' . $language . ' Content' }}</a>
        </div>
        <h1>{{ 'Quick Edit ' . $language . ' Content' }}</h1>
    </div>
    <!--End-breadcrumbs-->
    <br>
    <div class="search-results container-fluid">
        <div class="search-result-inner">
            <div></div>
            <form method="get">
                <input type="text" name="search" class="span7" placeholder="Enter Title or Content Id to search"
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
                    <option value="">Content Category</option>
                    @foreach ($InsightCategory as $cat)
                        <option value="{{ $cat->id }}"
                            {{ request()->query('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->catname }}
                        </option>
                    @endforeach
                </select>
                {{-- @endif --}}
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ route('crreAdmin.content.quick', ['lang' => $lang]) }}" class="btn btn-secondary"
                    style="margin-top: -12px;">Reset
                    Search</a>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('crreAdmin.content.quick', ['lang' => 'en'])) class="active" @endif><a
                            href="{{ route('crreAdmin.content.quick', ['lang' => 'en']) }}">English Content List</a></li>
                    <li @if (url()->current() == route('crreAdmin.content.quick', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('crreAdmin.content.quick', ['lang' => 'hi']) }}">Hindi Content List</a></li>
                </ul>
                <div class="widget-box">
                    <h4 style="text-align:center; cursor:pointer; background:#f5f5f5; padding:10px; border-radius:4px;"
                        id="toggleColaps">
                        Quick Edit {{ $language }} Content
                        <i id="toggleIcon" class="fa fa-chevron-down" style="float:right;"></i> <!-- Arrow icon -->
                    </h4>

                    <div id="colaps">
                        <form method="POST" action="{{ route('crreAdmin.content.bulkStore', ['lang' => $lang]) }}"
                            id="bulkForm">
                            @csrf <!-- Include CSRF token for security -->

                            <p style="text-align: center; color: #28b779; font-size:12px;">
                                Edit multiple Content records at once with a single action.
                            </p>
                            <ul class="quick-edits">
                                <li>
                                    <label for="">Content Type</label>
                                    <select required id="global_insight_type" name="global_insight_type[]"
                                        class="form-control">
                                        <option value="">Select Content Type</option>
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
                                    <select id="global_sub_category" name="global_sub_category[]" class="form-control">
                                        <option value="">Select Sub Category</option>
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
                                    <select multiple required name="associated_tags[]" id="select3" style="display: none;"
                                        class="form-control select2">
                                    </select>
                                </li>

                                <div class="form-actions">
                                    <a href="{{ route('crreAdmin.content.list', ['lang' => $lang]) }}"
                                        class="btn btn-secondary" style="float: left;">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-success" id="apply_bulk"
                                        style="float: right;">
                                        <i class="fa fa-save"></i> Apply Changes
                                    </button>
                                </div>
                            </ul>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="fa fa-newspaper"></i></span>
                        @if (request()->search || request()->type || request()->category)
                            <h5>Displaying {{ $totalRecords }} records for the search term
                                '<strong>
                                    {{ request()->search ? 'Search: ' . request()->search : '' }}
                                    {{ request()->type ? ' | Type: ' . request()->type : '' }}
                                    {{ $categoryName ? ' | Category: ' . $categoryName : '' }}
                                </strong>'</h5>
                        @else
                            <h5>Showing a total of {{ $totalRecords }} records.</h5>
                        @endif
                        @php
                            $user = Auth::guard('crreAdmin')->user();
                            $author = $user->author;
                            $canManage = in_array($user->admin_role, ['admin', 'manager']);
                        @endphp
                        @if ($canManage)
                            <div style="padding-top: 3px; float: right; margin-right: 3px;">
                                <a href="{{ request()->fullUrlWithQuery(['export' => 1]) }}" class="btn btn-secondary"><i
                                        class="fa fa-file-export"></i> Export
                                    Data</a>
                            </div>
                        @else
                            <div style="padding-top: 3px; float: right; margin-right: 3px;">
                                <a class="btn btn-secondary" disabled><i class="fa fa-file-export"></i> Export Data</a>
                            </div>
                        @endif

                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="quickTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">All<input type="checkbox" id="select_all">
                                    </th>
                                    <th rowspan="2">News ID</th>
                                    <th rowspan="2">Title</th>
                                    <th rowspan="2">Content Type</th>
                                    <th colspan="2">Categories</th>
                                    <th rowspan="2">Author</th>
                                    <th colspan="2">Action</th>

                                </tr>
                                <tr>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Link</th>
                                    <th>Status/Privacy</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontent">
                                @foreach ($data as $insights)
                                    <tr class="gradeX">
                                        @php
                                            $url = crreUrl($insights);
                                        @endphp
                                        <td>
                                            <input type="checkbox" class="bulk-checkbox"
                                                value="{{ $insights->news_id }}" name="selected_articles[]">
                                            <input type="hidden" name="insights_slug[]" value="{{ $insights->slug }}">
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
                                            @foreach ($insights->author as $author)
                                                {{ $author->title }}
                                            @endforeach

                                        </td>
                                        <td><a href="{{ $url }}" target="_blank" class="btn btn-secondary"><i
                                                    class="fa fa-external-link-alt"></i></a>
                                        </td>

                                        <td>
                                            <div class="labelwrap">
                                                <label>
                                                    <input type="radio" name="status_{{ $insights->news_id }}"
                                                        id="{{ $insights->news_id }}" value="1" class="activestate"
                                                        {{ $insights->status == 1 ? 'checked' : '' }}>
                                                    Public
                                                </label>
                                                <label>
                                                    <input type="radio" name="status_{{ $insights->news_id }}"
                                                        value="0" id="{{ $insights->news_id }}" class="activestate"
                                                        {{ $insights->status == 0 ? 'checked' : '' }}>
                                                    Draft
                                                </label>
                                                <label>
                                                    <input type="radio" name="status_{{ $insights->news_id }}"
                                                        value="2" class="activestate" id="{{ $insights->news_id }}"
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
                    </div>
                    <div class="custpagin">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ url('admin/js/jquery.min.js') }}"></script>
        <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
        <!-- jQuery Collapse Script -->
        <script>
            /** ------------------------------
             * Select2 for Associated Tags
             * ------------------------------ */
            let lang = '{{ $lang }}';
            $('#select3').select2({
                placeholder: "Choose Associated Tags...",
                minimumInputLength: 2,
                ajax: {
                    url: "{{ route('crreAdmin.tag.associated', ['lang' => $lang]) }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {

                        return {
                            q: params.term,
                            lang: lang
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

            //   Load Subcategories via AJAX

            window.Subcategoriesdata = function(catid) {
                $.ajax({
                    url: "{{ route('crreAdmin.getsubCategories', ['lang' => $lang, 'catid' => '__CATID__']) }}"
                        .replace('__CATID__', catid),
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let subcategoriesSelect = $('#global_sub_category');
                        subcategoriesSelect.empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response, function(index, subcategory) {
                            subcategoriesSelect.append(
                                `<option value="${subcategory.id}">${subcategory.subcat_name}</option>`
                            );
                        });
                    },
                    error: (jqXHR, textStatus, errorThrown) => console.error('AJAX Error:', textStatus,
                        errorThrown)
                });
            };

            /** ------------------------------
             * Toggle Collapse (Quick Edit Box)
             * ------------------------------ */
            $("#colaps").hide();
            $("#toggleColaps").on("click", function() {
                $("#colaps").slideToggle("fast");

                // Toggle arrow icon
                let icon = $("#toggleIcon");
                icon.toggleClass("fa-chevron-down fa-chevron-up");
            });

            /** ------------------------------
             * Select All / Individual Checkbox
             * ------------------------------ */
            $('#select_all').on('change', function() {
                const isChecked = $(this).prop('checked');
                $('.bulk-checkbox').prop('checked', isChecked);
            });

            $('.bulk-checkbox').on('change', function() {
                const allChecked = $('.bulk-checkbox').length === $('.bulk-checkbox:checked')
                    .length;
                $('#select_all').prop('checked', allChecked);
            });

            /** ------------------------------
             * Apply Bulk Changes
             * ------------------------------ */
            $('#apply_bulk').on('click', function(e) {
                e.preventDefault();

                const form = $('#bulkForm');
                const selectedArticles = $('.bulk-checkbox:checked');

                console.log("Selected Articles:", selectedArticles.length);

                // Validate if any record is selected
                if (!selectedArticles.length) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Records Selected',
                        text: 'Please select at least one record.'
                    });
                    return;
                }

                // Remove old hidden inputs except CSRF
                form.find('input[type="hidden"]').not('[name="_token"]').remove();

                // Collect bulk field values
                const bulkInsightType = $('#global_insight_type').val();
                const bulkMainCategory = $('#global_main_category').val();
                const bulkSubCategory = $('#global_sub_category').val();
                const bulkStatus = $('#global_status').val();
                const bulkAuthor = $('#global_author').val();
                const bulkAssociatedTags = $('#select3').val();

                // Check how many bulk fields are selected
                const bulkFields = [
                    bulkInsightType,
                    bulkMainCategory,
                    bulkSubCategory,
                    bulkStatus,
                    bulkAuthor,
                    bulkAssociatedTags
                ].filter(Boolean);

                console.log("Bulk Fields Selected:", bulkFields);
                if (bulkFields.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Field Selected',
                        text: 'Please choose one field to apply changes.'
                    });
                    return;
                }

                // Append selected field only for checked articles
                selectedArticles.each(function() {
                    const articleId = $(this).val();

                    if (bulkInsightType) form.append(
                        `<input type="hidden" name="articles[${articleId}][insight_type]" value="${bulkInsightType}">`
                    );
                    if (bulkMainCategory) form.append(
                        `<input type="hidden" name="articles[${articleId}][main_category]" value="${bulkMainCategory}">`
                    );
                    if (bulkSubCategory) form.append(
                        `<input type="hidden" name="articles[${articleId}][sub_category]" value="${bulkSubCategory}">`
                    );
                    if (bulkStatus) form.append(
                        `<input type="hidden" name="articles[${articleId}][status]" value="${bulkStatus}">`
                    );
                    if (bulkAuthor) form.append(
                        `<input type="hidden" name="articles[${articleId}][author]" value="${bulkAuthor}">`
                    );
                    if (bulkAssociatedTags) form.append(
                        `<input type="hidden" name="articles[${articleId}][associated_tags]" value="${bulkAssociatedTags}">`
                    );
                });
                form.trigger('submit'); // safer than form.submit()
            });
            /** ------------------------------
             * Status Change (Individual)
             * ------------------------------ */
            $('.activestate').click(function() {
                var status = this.value;
                var id = this.id;
                var lang = '{{ $lang }}';
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to change the status?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, change it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('crreAdmin.content.status', ['lang' => $lang]) }}",
                            data: {
                                "id": id,
                                "status": status,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Updated!",
                                    position: "top-end",
                                    toast: true,
                                    text: "Status has been changed.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            },
                            error: function() {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
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

        {{-- // Warning Message --}}
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
                    text: `{!! session('warning ') !!}`,
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
