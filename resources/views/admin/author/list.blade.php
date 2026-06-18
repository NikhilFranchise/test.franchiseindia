@php
use Carbon\Carbon;
@endphp
@extends('admin.layout.master')
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
        <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
        <a href="{{ route('list.author') }}" class="tip-bottom" title="Go to Manage Authors"><i class="fa fa-users"></i>
            Manage Authors</a>
        <a href="{{ url()->current() }}" class="current">Author List</a>
    </div>
    <h1>Author List</h1>
</div>
<br>
<!--End-breadcrumbs-->
<div class="search-results container-fluid">
    <div class="search-result-inner">

        <a href="{{ route('create.author') }}" class="greens float-right btn btn-md btn-success">
            <i class="fa fa-plus-circle"></i>{{ ' Add New Author' }}
        </a>
        <form action="{{ route('list.author') }}" method="get">
            <input type="text" name="search" class="span7" placeholder="Enter Author Id or Name to search"
                @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
            <input type="submit" class="btn btn-secondary" value="Search"
                style="margin-top: -12px; margin-left: 10px; width: 110px;" />
            <a href="{{ route('list.author') }}" class="btn btn-secondary" style="margin-top: -12px;">Reset
                Search</a>
        </form>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="fa fa-users"></i></span>
                    <h5>Showing <strong>{{ $totalRecords ?? 0 }}</strong> Total Records</h5>
                </div>
                <div class="widget-content nopadding">
                    @php
                    $user = Auth::guard('admin')->user();
                    $colspan = in_array($user->admin_role, ['admin']) ? 3 : 2;
                    $canDelete = in_array($user->admin_role, ['admin']);
                    @endphp

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
                            <tr class="gradeX">
                                <td>{{ $author->author_id }}</td>
                                <td>{{ $author->title ?? $author->admin->admin_name }}</td>
                                <td>{{ $author->emailid ?? ($author->admin->admin_email ?? '') }}</td>
                                <td>{{ ucwords($author->admin->admin_role ?? '') }}</td>
                                <td>{{ $author->total_articles ?? 0 }}</td>
                                <td>
                                    @if ($author->admin)
                                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->id() === $author->admin->admin_id)
                                    <span class="btn btn-secondary">User Logged In</span>
                                    @elseif ($author->admin->last_login_at)
                                    @php
                                    $lastLogin = Carbon::parse($author->admin->last_login_at);
                                    @endphp
                                    <span title="{{ $lastLogin->format('d M Y, h:i A') }}">
                                        {{ $lastLogin->diffForHumans() }}
                                    </span>
                                    @else
                                    <span class="text-muted">Never Logged In</span>
                                    @endif
                                    @else
                                    <span class="text-muted">No Admin Account</span>
                                    @endif
                                </td>

                                @php
                                $admin_status = $author->admin->admin_is_active ?? 0;
                                $button = 'success';
                                $status = 'active';
                                if ($author->status == 'D' && $admin_status == 0) {
                                $button = 'danger';
                                $status = 'Deactivated';
                                }
                                @endphp
                                <td>
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
                                </td>
                                <td>
                                    <center><a href="{{ route('edit.author', $author->author_id) }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a></center>
                                </td>
                                @if (in_array($user->admin_role, ['admin']) && $user->can_create_author == 1)
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
                        {!! $authors->appends(['search' => request()->search])->render('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
@if (session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        toast: true,
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
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
        text: "{{ session('warning') }}",
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
        text: `{{ session('error') }}`,
        confirmButtonColor: '#dc3545'
    });
</script>
@endif
<script>
    $('.activestate').on('change', function() {
        const id = $(this).val(); // safer than val()
        const status = this.checked ? 'A' : 'D';
        console.log(id);
        $.ajax({
            type: 'POST',
            url: "{{ route('status.author') }}",
            data: {
                authorId: id,
                authorstatus: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.success) {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: `Author status changed to ${data.statusText}.`,
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Unable to update status.',
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                }
            },
            error: function(xhr) {
                let res = xhr.responseJSON;
                let message = res?.message || 'Unexpected error occurred.';
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Error',
                    text: message,
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true
                });
            }
        });
    });


    var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this User?";

    $('.deleteauthor').on('click', function(e) {
        e.preventDefault();

        var authorId = $(this).attr('data-id');
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
                    url: "{{ route('delete.author', '') }}/" + authorId,
                    data: {
                        "authorId": authorId,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'The author has been deleted.',
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
@endpush
@endsection