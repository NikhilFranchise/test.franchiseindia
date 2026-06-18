@extends('crreAdmin.layout.master')
@section('CAT', 'active open')
@section('CATL', 'active')
@section('content')
    @push('styles')
        <style>
            .search-results {
                margin-top: 63px;
                display: block;
                width: 96%;
            }

            .search-results input {
                width: 400px;
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

            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
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

            */ .custpagin {
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

            #subCatTable td {
                font-size: 13px;
                text-align: center;
            }

            #subCatTable th {
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
    @php
        $language = $lang == 'en' ? 'English' : 'Hindi';
    @endphp
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.subcat.list', ['lang' => $lang]) }}" title="Go to Manage Categories"
                class="tip-bottom"><i class="fa fa-cube"></i> Manage Categories</a>
            <a href="{{ url()->current() }}" class="current">{{ $language }} Sub Categories</a>
        </div>
        <h1>{{ $language }} Sub Categories</h1>
    </div>
    <br>
    <!--End-breadcrumbs-->

    <div class="search-results container-fluid">
        <div class="search-result-inner">

            <a href="{{ route('crreAdmin.subcat.create', ['lang' => $lang]) }}"
                class="greens float-right btn btn-md btn-success">
                <i class="fa fa-plus-circle"></i>{{ ' Add New ' . $language . ' Subcategory' }}
            </a>
            <form action="{{ route('crreAdmin.subcat.list', ['lang' => $lang]) }}" method="get">
                <input type="text" name="search" class="span7"
                    placeholder="Enter Main Category or Category Id to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ route('crreAdmin.subcat.list', ['lang' => $lang]) }}" class="btn btn-secondary"
                    style="margin-top: -12px;">Reset
                    Search</a>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('crreAdmin.cat.list', ['lang' => $lang])) class="active" @endif><a
                            href="{{ route('crreAdmin.cat.list', ['lang' => $lang]) }}">English Main Categories</a></li>
                    <li @if (url()->current() == route('crreAdmin.cat.list', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('crreAdmin.cat.list', ['lang' => 'hi']) }}">Hindi Main Categories</a></li>
                    <li @if (url()->current() == route('crreAdmin.subcat.list', ['lang' => 'en'])) class="active" @endif><a
                            href="{{ route('crreAdmin.subcat.list', ['lang' => 'en']) }}">English Sub Categories</a></li>
                    <li @if (url()->current() == route('crreAdmin.subcat.list', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('crreAdmin.subcat.list', ['lang' => 'hi']) }}">Hindi Sub Categories</a></li>
                </ul>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="fa fa-cube"></i></span>
                        @if (request()->query('search'))
                            <h5>Displaying {{ $totalRecords }} records for the search term
                                '<strong>{{ request()->query('search') }}</strong>'.</h5>
                        @else
                            <h5>Showing a total of {{ $totalRecords }} records.</h5>
                        @endif
                        @php
                            $user = Auth::guard('crreAdmin')->user();
                            $author = $user->author;
                            $canManage = in_array($user->admin_role, ['admin', 'manager']);
                        @endphp
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="subCatTable">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Main Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Slug</th>
                                    {{-- <th>Action</th> --}}
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontent">
                                @php
                                    $url = Config('constants.MainDomain') . '/';
                                @endphp
                                @foreach ($subCat as $data)
                                    <tr class="gradeX">
                                        <td>{{ $data->id }}</td>
                                        @foreach ($data->category as $catname)
                                            <td>{{ $catname->catname }}</td>
                                        @endforeach
                                        <td>{{ $data->subcat_name }}</td>
                                        <td>{{ $data->slug }}</td>
                                        <td><button class="btn btn-medium btn-danger deleteSubCat"
                                                style="border-radius: 4px" data-value="{{ $data->id }}"><i
                                                    class="fa fa-trash-alt"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="custpagin">
            {!! $subCat->appends(['search' => request()->search])->render('pagination::bootstrap-4') !!}
        </div>
    </div>
    @push('scripts')
        <script>
            var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this SubCategory?";
            $('.deleteSubCat').on('click', function(e) {
                e.preventDefault();

                var subCatId = $(this).attr('data-value');

                Swal.fire({
                    title: 'Are you sure?',
                    text: YOUR_MESSAGE_STRING_CONST,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('crreAdmin.subcat.delete', ['lang' => $lang, 'id' => '__ID__']) }}"
                                .replace('__ID__', subCatId),
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The Sub Category has been deleted.',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
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
