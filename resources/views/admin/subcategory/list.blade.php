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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <style>
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
    @section('CAT')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->
    @php
        $locale = request()->segment(2);
        $lang = $locale == 'en' ? 'English' : 'Hindi';
    @endphp
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">{{ $lang }} Main
                    Category/{{ $lang }} Sub Category</a>
                <a href="#" class="current">List {{ $lang }} Sub Category</a>
            </div>
            <h1>{{ $lang }} Sub Category Listing</h1>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span3">
                </div>
                <div class="span9">
                    <form action="{{ url('admin/cat/list/') }}" method="get">
                        Search Keyword : <input type="text" name="search" class="span7"
                            placeholder="Enter Sub Category or Category Id to search"
                            @if (!empty(request()->search)) value="{{ request()->search }}" @endif />
                        <input type="submit" class="btn" value="Search"
                            style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                        <a href="{{ url('admin/cat/list/') }}" class="btn" style="margin-top: -12px;">Reset
                            Search</a>
                    </form>
                </div>
            </div>
            <hr>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            {{--  @dd(session()->has('success'));  --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Main Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Slug</th>
                                        <th colspan='2'>Action</th>
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
                                            {{-- <td><center><button class="btn btn-medium btn-warning" style="border-radius: 4px"><a href="edit/{{$data->id}}">Edit</a></button></center></td> --}}
                                            <td><button class="btn btn-medium btn-danger deletetag"
                                                    style="border-radius: 4px"
                                                    data-value="{{ $data->id }}">Delete</button></td>
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
                {!! $subCat->appends(['search' => request()->search])->render('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this category?";
        $('.deletetag').on('click', function() {
            var x = $(this).attr('data-value');
            var lang = '{{ $locale }}';
            confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
                $.ajax({
                    type: "POST",
                    url: `{{ url('admin/') }}/${lang}/delete-subcategory`,
                    data: {
                        "id": x,
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
</body>

</html>
