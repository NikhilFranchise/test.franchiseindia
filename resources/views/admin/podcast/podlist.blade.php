@extends('admin.layout.master')
@section('M-POD', 'active open')
@section('POD-L', 'active')
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

            #podTable td {
                font-size: 13px;
                text-align: left;
            }

            #podTable th {
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
        <div id="breadcrumb"> <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i
                    class="fa fa-home"></i> Home</a> <a href="{{ route('podcast.list', ['lang' => $lang]) }}"
                title="Go to Manage Podcast" class="tip-bottom"><i class="fa fa-podcast"></i> Manage Podcasts</a> <a
                href="{{ url()->current() }}" class="current">{{ $language }} Podcasts</a>
        </div>
        <h1>{{ $language }} Podcasts</h1>
    </div>
    <br>
    <!--End-breadcrumbs-->
    <div class="search-results container-fluid">
        <div class="search-result-inner">

            <a href="{{ route('podcast.create', ['lang' => $lang]) }}" class="greens float-right btn btn-md btn-success">
                <i class="fa fa-plus-circle"></i>{{ " Add New {$language} Podcast" }}
            </a>
            <form action="{{ route('podcast.list', ['lang' => $lang]) }}" method="get">
                <input type="text" name="search" class="span7" placeholder="Enter Podcast Id or Title to search"
                    @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                <input type="submit" class="btn btn-secondary" value="Search"
                    style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                <a href="{{ route('podcast.list', ['lang' => $lang]) }}" class="btn btn-secondary"
                    style="margin-top: -12px;">Reset
                    Search</a>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('podcast.list', ['lang' => 'en'])) class="active" @endif><a
                            href="{{ route('podcast.list', ['lang' => 'en']) }}">English Podcasts</a></li>
                    <li @if (url()->current() == route('podcast.list', ['lang' => 'hi'])) class="active" @endif><a
                            href="{{ route('podcast.list', ['lang' => 'hi']) }}">Hindi Podcasts</a></li>
                </ul>
                <div class="widget-box">
                    <div class="widget-title" style="font-size: 13px"><span class="icon"><i
                                class="fa fa-podcast"></i></span>
                        @if (request()->query('search'))
                            <h5>Displaying {{ $totalRecords }} records for the search term
                                '<strong>{{ request()->query('search') }}</strong>'.</h5>
                        @else
                            <h5>Showing a total of {{ $totalRecords }} records.</h5>
                        @endif
                    </div>
                    <div class="widget-content nopadding">
                        @php
                            $user = Auth::guard('admin')->user();
                            $colspan = in_array($user->admin_role, ['admin']) ? 3 : 2;
                            $canDelete = in_array($user->admin_role, ['admin']);
                        @endphp
                        <table class="table table-bordered table-striped" id="podTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">Podcast Id</th>
                                    <th rowspan="2">Title</th>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Link</th>
                                    <th colspan="{{ $colspan }}">Action</th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    @if ($canDelete)
                                        <th>Delete</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="tablecontent">
                                @foreach ($podlist as $data)
                                    <tr class="gradeX">
                                        @php
                                            $url = url('/insights/' . $data->pod_lang . '/podcast');

                                        @endphp
                                        <td>{{ $data->podcast_id }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td title="{{ date('d-M-Y', strtotime($data->created_at)) }}">
                                            {{ $data->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <center><a href="{{ $url }}" target="_blank"
                                                    class="btn btn-secondary"><i class="fa fa-external-link-alt"></i>
                                                </a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="switch">
                                                    <input type="checkbox" value="{{ $data->sno }}" class="activestatus"
                                                        {{ $data->status == 'A' ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </center>
                                        </td>
                                        <td>
                                            <center><button class="btn btn-warning" style="border-radius: 4px"><a
                                                        href="{{ route('podcast.edit', ['id' => $data->sno, 'lang' => $lang]) }}"><i
                                                            class="fa fa-edit"></i></a></button>
                                            </center>
                                        </td>
                                        @if ($canDelete)
                                            <td>
                                                <center>
                                                    <a href="javascript:void(0);" class="btn btn-danger deletepodcast"
                                                        data-id="{{ $data->sno }}">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </center>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="custpagin">{{ $podlist->links('pagination::bootstrap-4') }}</div>
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
            $('.activestatus').on('change', function() {
                const id = this.value; // safer than val()
                const status = this.checked ? 'A' : 'D';

                $.ajax({
                    type: 'POST',
                    url: "{{ route('podcast.status', ['lang' => $lang]) }}",
                    data: {
                        podId: id,
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            const podStatus = (data.status == 'A') ? 'Active' : 'Inactive';
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: `Podcast status changed to ` + podStatus + `!`,
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

            $('.deletepodcast').click(function() {
                var podId = $(this).data('id');
                var lang = '{{ $lang }}';
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this Podcast ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('delete.podcast', ['lang' => $lang, 'id' => '__ID__']) }}"
                                .replace('__ID__', podId),
                            data: {
                                id: podId,
                                lang: lang,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The Podcast has been deleted.',
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
    @endpush
@endsection
