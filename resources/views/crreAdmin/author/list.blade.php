@php
    use Carbon\Carbon;

    $user = Auth::guard('crreAdmin')->user();

    // Role logic
    $isSuperAdmin = $user->admin_role === 'superadmin';
    $isAdmin = $user->admin_role === 'admin';
    $isManager = $user->admin_role === 'manager';

    // Permissions
    $canDelete = $isSuperAdmin || ($isAdmin && $user->can_create_author == 1);
    $colspan = $canDelete ? 3 : 2;
@endphp
@extends('crreAdmin.layout.master')
@section('DAU', 'active open')
@section('LA', 'active')
@push('styles')
    <style>
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

        #authorTable td {
            font-size: 13px;
            text-align: center;
        }

        #authorTable th {
            font-size: 13px;
            padding: 7px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        .switch input {
            display: none;
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
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 19px;
            width: 19px;
            left: 1px;
            bottom: 1px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            right: 26px;
            left: auto;
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            box-shadow: none;
        }
    </style>
@endpush
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.list.author') }}" class="tip-bottom" title="Go to Manage Authors"><i
                    class="fa fa-users"></i>
                Manage Authors</a>
            <a href="{{ url()->current() }}" class="current">Author List</a>
        </div>
        <h1>Author List</h1>
    </div>
    <br>
    <!--End-breadcrumbs-->
    <div class="search-results container-fluid">
        <div class="search-result-inner">

            <a href="{{ route('crreAdmin.create.author') }}" class="greens float-right btn btn-md btn-success">
                <i class="fa fa-plus-circle"></i>{{ ' Add New Author' }}
            </a>
            <form action="{{ route('crreAdmin.list.author') }}" method="get">
                <input type="text" name="search" class="span7" placeholder="Enter Author Id or Name to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ route('crreAdmin.list.author') }}" class="btn btn-secondary" style="margin-top: -12px;">Reset
                    Search</a>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="fa fa-users"></i></span>
                        <h5>Showing <strong>{{ $totalRecords }}</strong> Total Records</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="authorTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">Author Id</th>
                                    <th rowspan="2">Author Name</th>
                                    <th rowspan="2">Author Email</th>
                                    <th rowspan="2">Author Role</th>
                                    <th rowspan="2">Total Articles</th>
                                    <th rowspan="2">Last Login</th>
                                    <th colspan="{{ $colspan }}">Action</th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    @if ($canDelete)
                                        <th>Delete</th>
                                    @endif
                                </tr>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    @php
                                        $admin = $author->admin;
                                        $lastLogin = $admin->last_login_at ?? null;
                                        $adminActive = $admin->admin_is_active ?? 0;
                                        $checked = $author->status === 'A' && $adminActive == 1 ? 'checked' : '';
                                    @endphp
                                    <tr class="gradeX">
                                        <td>{{ $author->author_id }}</td>
                                        <td>{{ $author->title ?? $admin->admin_name }}</td>
                                        <td>{{ $author->emailid ?? ($admin->admin_email ?? '') }}</td>
                                        <td>{{ ucwords($admin->admin_role ?? '') }}</td>
                                        <td>{{ $author->total_articles ?? 0 }}</td>
                                        <td>
                                            @if (!$admin)
                                                <span class="text-muted">No Admin Account</span>
                                            @elseif(auth()->id() === $admin->admin_id)
                                                <span class="btn btn-secondary">User Logged In</span>
                                            @elseif($lastLogin)
                                                <span title="{{ Carbon::parse($lastLogin)->format('d M Y, h:i A') }}">
                                                    {{ Carbon::parse($lastLogin)->diffForHumans() }}
                                                </span>
                                            @else
                                                <span class="text-muted">Never Logged In</span>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            <center>
                                                <label class="switch">
                                                    @php
                                                        $check = '';
                                                        if ($author->status == 'A' && $admin_status == 1) {
                                                            $check = 'checked';
                                                        }
                                                    @endphp
                                                    <input type="checkbox" {{ $check }} class="activestate"
                                                        value="{{ $author->author_id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </center>
                                        </td> --}}
                                        <!-- Status toggle -->
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="activestate" value="{{ $author->author_id }}"
                                                    {{ $checked }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>

                                        {{-- <td>
                                            <center><a href="{{ route('crreAdmin.edit.author', $author->author_id) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a></center>
                                        </td> --}}
                                        <!-- Edit -->
                                        <td>
                                            <a href="{{ route('crreAdmin.edit.author', $author->author_id) }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <!-- Delete -->
                                        @if ($canDelete)
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-danger deleteauthor"
                                                    data-id="{{ $author->author_id }}">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="custpagin">
                            {!! $authors->appends(['search' => request()->search])->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @foreach (['success' => 'success', 'warning' => 'warning', 'error' => 'error'] as $type => $icon)
        @if (session($type))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: '{{ $icon }}',
                    title: '{{ ucfirst($type) }}',
                    text: "{{ session($type) }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endforeach

    <script>
        $('.activestate').on('change', function() {
            const id = $(this).val();
            const status = this.checked ? 'A' : 'D';

            $.post("{{ route('crreAdmin.status.author') }}", {
                authorId: id,
                authorstatus: status,
                _token: '{{ csrf_token() }}'
            }).done(function(data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: data.success ? 'success' : 'error',
                    title: data.success ? `Status: ${data.statusText}` : "Error",
                    text: data.message || "",
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        });

        $('.deleteauthor').on('click', function(e) {
            e.preventDefault();

            let id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to delete this author?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ route('crreAdmin.delete.author', '') }}/" + id, {
                        authorId: id,
                        _token: "{{ csrf_token() }}"
                    }).done(() => {
                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => location.reload());
                    });
                }
            });
        });
    </script>
@endpush
