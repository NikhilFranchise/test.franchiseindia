<!DOCTYPE html>
<html lang="en">

<head>
    <title>Franchise India Admin Panel</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type='text/css' href="{{ url('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type='text/css' href="{{ url('admin/css/bootstrap-switch.css') }}">
    <link rel="stylesheet" type='text/css' href="{{ url('admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" type='text/css' href="{{ url('admin/css/matrix-style.css') }}" />
    <link rel="stylesheet" type='text/css' href="{{ url('admin/css/matrix-media.css') }}" />
    <link rel="stylesheet" type='text/css' href="{{ url('admin/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' />
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

    @include('admin.includes.header')
    @section('KICK')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->
    @php
        $locale = request()->segment(4);
        $lang = $locale == 'english' ? 'English' : 'Hindi';
    @endphp
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Tags</a> <a href="#"
                    class="current">Tags-List</a> </div>
            <h1>Tags Listing</h1>
        </div>
        <!--End-breadcrumbs-->

        <br>
        <!--End-breadcrumbs-->
        <div class="search-results container-fluid">
            <div class="search-result-inner">

                <a href="{{ url('admin/kicker/create/' . $type) }}" class="greens float-right btn btn-md btn-success">
                    <i class="fa fa-plus-circle"></i>{{ ' Add New ' . $lang . ' Tag' }}
                </a>

                <form action="{{ url('admin/kickers/list/' . $type) }}" method="get">
                    <input type="text" name="search"class="span7" placeholder="Enter Tag name or Id to search"
                        @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                    <input type="submit" class="btn"
                        value="Search"style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                    <a href="{{ url('admin/kickers/list/' . $type) }}" class="btn"style="margin-top: -12px;">Reset
                        Search</a>
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="nav nav-tabs">
                        <li @if (url()->current() == url('admin/kickers/list/english')) class="active" @endif><a
                                href="{{ url('admin/kickers/list/english') }}">English Tags List</a></li>
                        <li @if (url()->current() == url('admin/kickers/list/hindi')) class="active" @endif><a
                                href="{{ url('admin/kickers/list/hindi') }}">Hindi Tags List</a></li>
                    </ul>
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            @if (!empty(session()->get('success')))
                                <div class="alert alert-success">{{ session()->get('success') }}</div>
                            @endif
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tag Id</th>
                                        <th>Name</th>
                                        <th>Frequency</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontent">
                                    @php
                                        $url = Config('constants.MainDomain') . '/';
                                    @endphp
                                    @foreach ($kickers as $kicker)
                                        <tr class="gradeX">
                                            <td>{{ $kicker->tag_id }}</td>
                                            <td>{{ $kicker->name }}</td>
                                            <td>{{ $kicker->frequency }}</td>
                                            <td><button class="btn btn-medium btn-danger deletetag"
                                                    style="border-radius: 4px"
                                                    data-value="{{ $kicker->tag_id }}">Delete</button></td>
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
                    </div>
                </div>
            </div>
            <div class="custpagin">
                {!! $kickers->appends(['search' => request()->search])->render('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>

    <script type="text/javascript">
        var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this kicker?";
        $('.deletetag').on('click', function() {
            var x = $(this).attr('data-value');
            confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
                $.ajax({
                    type: "POST",
                    url: '{{ url('admin/delete-kicker') }}',
                    data: {
                        "tag_id": x,
                        "type": '{{ $type }}',
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function() {
                        $(document).ajaxStop(function() {
                            window.location.reload();
                        });
                    }
                });
            });
        });

        function confirmDialog(message, onConfirm) {
            var confirmOk = $("#confirmOk");
            var fClose = function() {
                modal.modal("hide");
            };
            var modal = $("#confirmModal");
            modal.modal("show");
            $("#confirmMessage").empty().append(message);
            confirmOk.one('click', onConfirm);
            confirmOk.one('click', fClose);
            $("#confirmCancel").one("click", fClose);
        }
    </script>
</body>

</html>
