@extends('admin.layout.master')
@section('IN', 'active open')
@section('INL', 'active')
@push('styles')
    <style>
        .labelwrap {
            display: flex;
            justify-content: space-between;
            padding: 0px 10px 0px 0px;
        }

        .labelwrap label {
            width: 30%;
            font-size: 11px;
        }

        .search-results {
            margin-top: 63px;
            display: block;
            width: 96%;
        }

        .search-results input {
            width: 240px;
        }

        .search-results select {
            width: 160px;
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

        .round-button-circle {
            width: 45px;
            border-radius: 50%;
            overflow: hidden;
            background: #4679BD;
            box-shadow: 0 0 3px gray;
        }

        .round-button-circle:hover {
            background: #30588e;
        }

        .round-button a {
            display: block;
            float: left;
            width: 100%;
            padding-top: 35%;
            padding-bottom: 50%;
            line-height: 1em;
            margin-top: -0.5em;
            text-align: center;
            color: #e2eaf3;
            font-family: "Verdana", "serif";
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
        }

        .custpagin {
            background-color: #dfdfdf;
            margin-bottom: 10px;
        }

        .custpagin .pagination li {
            display: inline-grid;
            font-size: 20px;
            margin-left: 1px;
            margin-right: 1px;
            border-width: 1px;
            border-radius: 6px;
        }

        .custpagin .pagination {
            text-align: right;
        }

        .custpagin .pagination li.active {
            background-color: #faa732;
            color: #fff;
            padding: 3px 7px;
            border-radius: 6px;
            border: 1px;
        }

        .custpagin .pagination li a {
            padding: 3px 7px;
            background-color: #41BEDD;
            color: #fff;
            border-radius: 6px;
            border: 1px;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            box-shadow: none;
        }

        .table td {
            padding: 6px !important;
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

        #insightsTable td {
            font-size: 13px;
            text-align: left;
        }

        #insightsTable th {
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
    </style>
@endpush
@section('content')
    @php
        $language = $lang == 'en' ? 'English' : 'Hindi';
        $user = Auth::guard('admin')->user();
        $author = $user->author;
        $canManage = in_array($user->admin_role, ['admin', 'manager']);
    @endphp
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('admin.Dashboard', ['lang' => $lang]) }}" title="Go to Home" class="tip-bottom">
                <i class="fa fa-home"></i> Home</a>
            <a href="{{ route('insights.list', ['lang' => $lang]) }}" class="tip-bottom" title="Go to Manager Insights">
                <i class="fa fa-newspaper"></i> Manage Insights</a>
            <a href="{{ url()->current() }}" class="current">{{ $language }} Insights</a>
        </div>
        <h1>{{ $language }} Insights</h1>
    </div>
    <br>
    <!--End-breadcrumbs-->
    <div class="search-results container-fluid">
        <div class="search-result-inner">

            <a href="{{ route('insights.create', ['lang' => $lang]) }}" class="greens float-right btn btn-md btn-success">
                <i class="fa fa-plus-circle"></i>{{ ' Add ' . $language . ' Insights' }}
            </a>
            <form method="get" action="{{ route('insights.list', ['lang' => $lang]) }}">
                <input type="text" name="search" class="span7" placeholder="Enter Title or Insights Id to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />

                <select name="type" class="span7" onchange="this.form.submit()" style="width:160px;">
                    <option value="">Select Insight Type</option>
                    @foreach ($insightTypes as $insightType)
                        <option value="{{ $insightType }}"
                            {{ request()->query('type') == $insightType ? 'selected' : '' }}>{{ $insightType }}</option>
                    @endforeach
                </select>

                <select name="category" class="span7" onchange="this.form.submit()" style="width:150px;">
                    <option value="">Select Category</option>
                    @foreach ($InsightsCategory as $cat)
                        <option value="{{ $cat->id }}"
                            {{ request()->query('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->catname }}
                        </option>
                    @endforeach
                </select>

                <select id="authorFilter" name="author" onchange="this.form.submit()" class="span7"
                    style="width:130px; font-size:13px;">
                    <option value="">All Authors</option>

                    @if ($canManage)
                        {{-- Show all authors for admin/manager --}}
                        @foreach ($Authors as $item)
                            <option value="{{ $item->author_id }}"
                                {{ request('author') == $item->author_id ? 'selected' : '' }}>
                                {{ $item->title }}
                            </option>
                        @endforeach
                    @else
                        {{-- Show only current author --}}
                        <option value="{{ $author->author_id }}"
                            {{ request('author') == $author->author_id ? 'selected' : '' }}>
                            {{ $author->title }}
                        </option>
                    @endif
                </select>
                {{-- <input type="date" name="fromDate" id="fromDate" placeholder="From Date">
                <input type="date" name="toDate" id="toDate" placeholder="To Date"> --}}
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />

                <a href="{{ route('insights.list', ['lang' => $lang]) }}" class="btn btn-secondary"
                    style="margin-top: -12px;">
                    Reset
                </a>
            </form>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('insights.list', ['lang' => 'en'])) class="active" @endif><a
                            href="{{ route('insights.list', ['lang' => 'en']) }}">English Insights</a></li>
                    <li @if (url()->current() == route('insights.list', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('insights.list', ['lang' => 'hi']) }}">Hindi Insights</a></li>
                </ul>

                <div class="widget-box">
                    <div class="widget-title d-flex justify-content-between align-items-center">
                        <span class="icon"><i class="fa fa-newspaper"></i></span>
                        @if (request()->search || request()->type || $categoryName || $authorName)
                            <h5>Displaying {{ $totalRecords }} records for the search term
                                '<strong>
                                    {{ request()->search ? 'Search: ' . request()->search : '' }}
                                    {{ request()->type ? ' | Type: ' . request()->type : '' }}
                                    {{ $categoryName ? ' | Category: ' . $categoryName : '' }}
                                    {{ $authorName ? ' | Author: ' . $authorName : '' }}
                                </strong>'.</h5>
                        @else
                            <h5>Showing a total of {{ $totalRecords }} records.</h5>
                        @endif

                        @if ($canManage)
                            <div style="padding-top: 3px; float: right; margin-right: 3px;">
                                <a href="{{ request()->fullUrlWithQuery(['export' => 1]) }}" class="btn btn-secondary"><i
                                        class="fa fa-file-export"></i> Export
                                    Data</a>
                            </div>
                        @else
                            <div style="padding-top: 3px; float: right; margin-right: 3px;">
                                <a class="btn btn-secondary" style="cursor:not-allowed;" disabled><i
                                        class="fa fa-file-export"></i>
                                    Export
                                    Data</a>
                            </div>
                        @endif

                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="insightsTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">Id</th>
                                    <th rowspan="2">Title</th>
                                    <th rowspan="2">Insights Type/ (Views)</th>
                                    {{-- <th rowspan="2">Views</th> --}}
                                    <th rowspan="2">Author</th>
                                    <th colspan="2">Date</th>
                                    <th colspan="4">Action</th>
                                </tr>
                                <tr>
                                    <th>Created Date</th>
                                    <th>Published Date</th>
                                    <th>Link</th>
                                    <th>Status/Privacy</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontent">
                                @forelse ($data as $insights)
                                    {{-- @foreach ($data as $insights) --}}
                                    {{-- @dd($insights->author->first()); --}}
                                    @php
                                        $slug = !empty($insights->slug) ? $insights->slug : Str::slug($insights->title);
                                        $url =
                                            '/insights/' .
                                            $lang .
                                            '/' .
                                            strtolower($insights->insight_type) .
                                            '/' .
                                            $slug .
                                            '.' .
                                            $insights->news_id;
                                        $date = $insights->published_date ?: $insights->created_at;
                                        // permissions
                                        $user = Auth::guard('admin')->user();
                                        $author = $user->author;
                                        $canManage = in_array($user->admin_role, ['admin', 'manager']);
                                        $isOwnArticle =
                                            $user->admin_role === 'author' &&
                                            $author->author_id == $insights->author_id;
                                        $canEditDelete = $canManage || $isOwnArticle;
                                    @endphp
                                    <tr class="gradeX">
                                        <td>{{ $insights->news_id }}</td>
                                        <td>{{ $insights->title }}</td>
                                        <td>{{ empty($insights->insight_type) ? 'No Insights Type' : $insights->insight_type }}
                                            / {{ '(' . $insights->views . ')' }}
                                        </td>
                                        {{-- <td>{{ $insights->views }}</td> --}}
                                        <td>{{ $insights->author->first()->title ?? '' }}</td>
                                        <td>{{ date('d-m-Y', strtotime($insights->created_at)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($date)) }}</td>
                                        <td><a href="{{ $url }}" target="_blank" class="btn btn-secondary">
                                                <i class="fa fa-external-link-alt"></i></a></td>
                                        <td>
                                            <center>
                                                <div class="labelwrap">
                                                    @if ($canEditDelete)
                                                        <label>
                                                            <input type="radio" name="status_{{ $insights->news_id }}"
                                                                id="{{ $insights->news_id }}" value="1"
                                                                class="activestate"
                                                                {{ $insights->status == 1 ? 'checked' : '' }}> Public
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="status_{{ $insights->news_id }}"
                                                                id="{{ $insights->news_id }}" value="0"
                                                                class="activestate"
                                                                {{ $insights->status == 0 ? 'checked' : '' }}> Draft
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="status_{{ $insights->news_id }}"
                                                                id="{{ $insights->news_id }}" value="2"
                                                                class="activestate"
                                                                {{ $insights->status == 2 ? 'checked' : '' }}> Private
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" disabled
                                                                {{ $insights->status == 1 ? 'checked' : '' }}> Public
                                                        </label>
                                                        <label>
                                                            <input type="radio" disabled
                                                                {{ $insights->status == 0 ? 'checked' : '' }}> Draft
                                                        </label>
                                                        <label>
                                                            <input type="radio" disabled
                                                                {{ $insights->status == 2 ? 'checked' : '' }}> Private
                                                        </label>
                                                    @endif
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                @if ($canEditDelete)
                                                    <a href="{{ route('insights.edit', ['lang' => $lang, 'id' => $insights->news_id]) }}"
                                                        class="btn btn-warning" style="border-radius: 4px"
                                                        title="Edit Article">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-warning"
                                                        style="border-radius: 4px;cursor:not-allowed;" disabled
                                                        title="Not Allowed">
                                                        <i class="fa fa-edit text-muted"></i>
                                                    </button>
                                                @endif
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                @if ($canEditDelete)
                                                    <button class="btn btn-danger deleteInsight"
                                                        style="border-radius: 4px" data-value="{{ $insights->news_id }}"
                                                        data-type="{{ $insights->insight_type }}" title="Delete Article">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger"
                                                        style="border-radius: 4px;cursor:not-allowed;" disabled
                                                        title="Not Allowed">
                                                        <i class="fa fa-trash-alt text-muted"></i>

                                                    </button>
                                                @endif
                                            </center>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                @empty
                                    <tr>
                                        <td colspan="11" style="text-align: center;">Records not found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="custpagin">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('.activestate').click(function() {
                var status = this.value;
                var id = this.id;
                var lang = '{{ $lang }}';
                let inStatus = '';
                Swal.fire({
                    title: "Are you sure ?",
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
                            url: "{{ route('insights.status', ['lang' => $lang]) }}",
                            data: {
                                "id": id,
                                "status": status,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                switch (response.status) {
                                    case '1':
                                        inStatus = 'Public';
                                        break;
                                    case '0':
                                        inStatus = 'Draft';
                                        break;
                                    case '2':
                                        inStatus = 'Private';
                                        break;
                                    default:
                                        inStatus = 'Unknown';
                                }
                                Swal.fire({
                                    title: "Updated!",
                                    toast: true,
                                    position: 'top-end',
                                    title: `Insights status changed to ` + inStatus + `!`,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                            },
                            error: function() {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });

            $('.deleteInsight').click(function() {
                var insightId = $(this).data('value');
                var insightType = $(this).data('type');
                var lang = '{{ $lang }}';

                var capitalizedType = insightType.charAt(0).toUpperCase() + insightType.slice(1);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this " + capitalizedType + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('delete.insights', ['lang' => $lang, 'id' => '__ID__']) }}"
                                .replace('__ID__', insightId),
                            data: {
                                insightId: insightId,
                                insightType: insightType,
                                lang: lang,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    title: capitalizedType + ' deleted!',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!'
                                });
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
                    text: `{!! session('warning') !!}`,
                    confirmButtonColor: '#ffc107'
                });
            </script>
        @endif

        {{-- Error Messages (validation or manual) --}}
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
