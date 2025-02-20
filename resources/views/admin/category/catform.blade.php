<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .typeahead,
        .tt-query,
        .tt-hint {
            border: 2px solid #CCCCCC;
            border-radius: 8px;
            font-size: 22px;
            height: 30px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 850px;
        }

        .typeahead {
            background-color: #FFFFFF;
        }

        .typeahead:focus {
            border: 2px solid #0097CF;
        }

        .tt-query {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }

        .tt-hint {
            color: #999999;
        }

        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 422px;
        }

        .tt-suggestion {
            font-size: 22px;
            padding: 3px 20px;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #0097CF;
            color: #FFFFFF;
        }

        .tt-suggestion p {
            margin: 0;
        }
    </style>
</head>

<body>
    <!--Header-part-->
    @include('admin.includes.header')
    <!--close-top-Header-menu-->

    <!--sidebar-menu-->
    @section('CAT')
        active
    @endsection
    @include('admin.includes.sidebar')
    <!--sidebar-menu-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            @php
                $lang = request()->segment(2);
                //echo $lang; die;
                $locale = $lang == 'en' ? 'English' : 'Hindi';
            @endphp
            <div id="breadcrumb">
                <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i>Home</a>
                <a href="{{ url('admin/' . $lang . '/cat/list') }}" class="tip-bottom">{{ $locale }} Main
                    Category/{{ $locale }} Sub Category</a>
                <a class="current">Create {{ $locale }} Main Category</a>
            </div>
            <h1>Create {{ $locale }} Main Category</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{ $locale }} Main Category Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        @if (!empty(session()->get('failed')))
                            <div class="alert alert-danger">{{ session()->get('failed') }}</div>
                        @endif
                        <form method="POST" class="form-horizontal"
                            action="{{ url('admin/' . $lang . '/create/cat') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="control-group">
                                <label class="control-label">Main Category :</label>
                                <div class="controls">
                                    <input type="text" maxlength="125" required class="span11" name="maincat"
                                        id="maincat" placeholder="Enter Main Category"oninput="chText($lang)" />
                                    <div id="error-message" style="color: red;"></div>
                                </div>
                            </div>
                            @if ($lang == 'hi')
                                <div class="control-group">
                                    <label class="control-label">Slug :</label>
                                    <div class="controls">
                                        <input type="text" maxlength="125" required class="span11" name="slug"
                                            id="slug" placeholder="Slug" />
                                        {{--  <div id="error-message" style="color: red;"></div>  --}}
                                    </div>
                                </div>
                            @endif

                            <div class="form-actions" style="text-align: center;">
                                <button type="submit" id="ariclesubmit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    !--Footer-part-->
    @include('admin.includes.footer')
    <!--end-Footer-part-->

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/typeahead.bundle.js') }}"></script>
    <script src="{{ url('admin/js/matrix.js') }}"></script>
    <script>
        {{--  function chText() {
    var str = document.getElementById("maincat");
    var errorMessage = document.getElementById("error-message");
    var regex = /[^a-zA-Z0-9\s&-]/g;

    if (regex.test(str.value)) {
        errorMessage.textContent = "Only small letters, numbers, capital letters, spaces, &, and - are allowed!";
        str.value = str.value.replace(regex, "");

        // Show the error message for 15 seconds
        setTimeout(function () {
            errorMessage.textContent = "";
        }, 2000);
    } else {
        errorMessage.textContent = "";
    }
}  --}}

        function chText(locale) {
            var str = document.getElementById("maincat");
            var errorMessage = document.getElementById("error-message");
            var regex;

            // Set regex based on locale
            if (locale === 'en') {
                // Allow only English letters, numbers, spaces, &, and -
                regex = /[^a-zA-Z0-9\s&-]/g;
            } else {
                // Allow only Hindi letters, numbers, spaces, &, and -
                regex = /[^\u0900-\u097F\s&-]/g;
            }

            if (regex.test(str.value)) {
                errorMessage.textContent = locale === 'en' ?
                    "Only English letters, numbers, spaces, &, and - are allowed!" :
                    "केवल हिंदी अक्षर, संख्या, स्पेस, &, और - की अनुमति है!";

                str.value = str.value.replace(regex, "");

                // Show the error message for 2 seconds
                setTimeout(function() {
                    errorMessage.textContent = "";
                }, 2000);
            } else {
                errorMessage.textContent = "";
            }
        }
    </script>
</body>

</html>
