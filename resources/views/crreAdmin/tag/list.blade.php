@extends('crreAdmin.layout.master')
@section('TAG', 'active open')
@section('ATL', 'active')
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
                height: auto;
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

            #tagTable td {
                font-size: 13px;
                text-align: center;
            }

            #tagTable th {
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
    <!-- breadcrumb -->
    @php
        $language = $lang == 'en' ? 'English' : 'Hindi';
    @endphp
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.tag.list', ['lang' => $lang]) }}" class="tip-bottom"> <i class="fa fa-tags"></i>
                Manage Tags</a>
            <a href="{{ url()->current() }}" class="current">{{ $language }} Tags</a>
        </div>
        <h1>{{ $language }} Tags</h1>
    </div>
    {{-- breadcrumb --}}
    <br>
    <div class="search-results container-fluid">
        <div class="search-result-inner">

            <a href="{{ route('crreAdmin.tag.create', ['lang' => $lang]) }}"
                class="greens float-right btn btn-md btn-success">
                <i class="fa fa-plus-circle"></i>{{ ' Add New ' . $language . ' Tag' }}
            </a>

            <form action="{{ route('crreAdmin.tag.list', ['lang' => $lang]) }}" method="get">
                <input type="text" name="search" class="span7" placeholder="Enter Tag name or Id to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ route('crreAdmin.tag.list', ['lang' => $lang]) }}" class="btn btn-secondary"
                    style="margin-top: -12px;">Reset
                    Search</a>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('crreAdmin.tag.list', ['lang' => 'en'])) class="active" @endif><a
                            href="{{ route('crreAdmin.tag.list', ['lang' => 'en']) }}">English Tags List</a></li>
                    <li @if (url()->current() == route('crreAdmin.tag.list', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('crreAdmin.tag.list', ['lang' => 'hi']) }}">Hindi Tags List</a></li>
                </ul>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="fa fa-tags"></i></span>
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
                        @if (!empty(session()->get('success')))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        <table class="table table-bordered table-striped" id="tagTable">
                            <thead>
                                <tr>
                                    <th>Tag Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Frequency</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontent">
                                @php
                                    $url = Config('constants.MainDomain') . '/';
                                @endphp
                                @foreach ($tags as $tag)
                                    <tr class="gradeX">
                                        <td>{{ $tag->tag_id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ Str::slug($tag->name) }}</td>
                                        <td>{{ $tag->frequency }}</td>
                                        <td><button class="btn btn-medium btn-danger deletetag" style="border-radius: 4px"
                                                data-value="{{ $tag->tag_id }}"><i class="fa fa-trash-alt"></i>
                                                Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="custpagin">
            {!! $tags->appends(['search' => request()->search])->render('pagination::bootstrap-4') !!}
        </div>
    </div>
    @push('scripts')
        <script>
            var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this Tag ?";
            $('.deletetag').on('click', function(e) {
                e.preventDefault();

                var tagId = $(this).attr('data-value');

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
                            url: "{{ route('crreAdmin.tag.delete', ['lang' => $lang, 'id' => '__ID__']) }}"
                                .replace('__ID__', tagId),
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The Tag has been deleted.',
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
