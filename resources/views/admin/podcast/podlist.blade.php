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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
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
            width: 60px;
            height: 34px;
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
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
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
        }

        .gradeX>td {
            text-align: center;
        }

        /* Rounded sliders */
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
    </style>

</head>

<body>
    @php
        $locale = request()->segment(2);
        $lang = $locale == 'en' ? 'English' : 'Hindi';
    @endphp
    <!--Header-part-->
    @include('admin.includes.header')
    <!--close-top-Header-menu-->

    <!--sidebar-menu-->
    @section($lang . '-POD')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->

    <div id="content">

        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Podcast</a> <a
                    href="#" class="current">{{ $lang }} Podcast LIst</a> </div>
            <h1>{{ $lang }} Podcast Listing</h1>
        </div>
        <br>
        <!--End-breadcrumbs-->
        <div class="search-results container-fluid">
            <div class="search-result-inner">

                <a href="{{ url('admin/createpodcast') }}"
                    class="greens float-right btn btn-md btn-success">
                    <i class="fa fa-plus-circle"></i>{{ ' Add New Podcast' }}
                </a>
                <form action="{{ url('admin/'.$locale.'/podcastlist') }}" method="get">
                    <input type="text" name="search"class="span7" placeholder="Enter Podcast Id or Title to search"
                        @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                    <input type="submit" class="btn"
                        value="Search"style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                    <a href="{{ url('admin/'. $locale .'/podcastlist') }}" class="btn"style="margin-top: -12px;">Reset
                        Search</a>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="nav nav-tabs">
                        <li @if (url()->current() == url('admin/en/podcastlist')) class="active" @endif><a
                                href="{{ url('admin/en/podcastlist') }}">English Podcast List</a></li>
                        <li @if (url()->current() == url('admin/hi/podcastlist')) class="active" @endif><a
                                href="{{ url('admin/hi/podcastlist') }}">Hindi Podcast List</a></li>
                    </ul>
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Podcast Id</th>
                                        <th>Spotify Link</th>
                                        <th>Title</th>
                                        <th>Website Link</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontent">
                                    @foreach ($podlist as $data)
                                        <tr class="gradeX">
                                            @php
                                                $url = url('/insights/' . $data->pod_lang . '/podcast');

                                            @endphp
                                            <td>{{ $data->podcast_id }}</td>
                                            <td>{{ $data->podcast_link }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>
                                                <div class="round-button">
                                                    <div class="round-button-circle"><a href="{{ $url }}"
                                                            target="_blank" class="round-button">Go</a></div>
                                                </div>
                                            </td>
                                            <td>
                                                <center>
                                                    <label class="switch">
                                                        <input type="checkbox" value="{{ $data->sno }}"
                                                            class="activestate"
                                                            {{ $data->status == 'A' ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </center>
                                            </td>
                                            <td>
                                                <center><button class="btn btn-medium btn-warning"
                                                        style="border-radius: 4px"><a
                                                            href="/admin/edit-podcast/{{ $data->sno }}">Edit</a></button>
                                                </center>
                                            </td>
                                            <td>
                                                <center><button class="btn btn-medium btn-danger deletepodcast"
                                                        style="border-radius: 4px"
                                                        data-value="{{ $data->sno }}">Delete</button>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <div class="custpagin">{{ $podlist->links('pagination::bootstrap-4') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
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
        $('.activestate').click(function() {
            var id = this.value;
            var status = 'D';
            if (this.checked)
                status = 'A';

            $.ajax({
                type: "POST",
                url: '/updatepodcastatus',
                data: {
                    "podcast_id": id,
                    "status": status,
                    "_token": "{{ csrf_token() }}"
                }
            });
        });

        var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this news?";
        $('.deletepodcast').click(function() {
            var x = $(this).attr('data-value');
            confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
                $.ajax({
                    type: "POST",
                    url: '/deletepodcast',
                    data: {
                        "sno": x,
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
    </script>
    <script src="{{ url('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/select2.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="{{ url('admin/js/matrix.tables.js') }}"></script>
</body>

</html>
