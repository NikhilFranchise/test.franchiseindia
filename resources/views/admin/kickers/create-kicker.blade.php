<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .typeahead, .tt-query, .tt-hint { border: 2px solid #CCCCCC; border-radius: 8px; font-size: 22px; height: 30px; line-height: 30px; outline: medium none; padding: 8px 12px; width: 850px; }
        .typeahead { background-color: #FFFFFF; }
        .typeahead:focus { border: 2px solid #0097CF; }
        .tt-query { box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; }
        .tt-hint { color: #999999; }
        .tt-menu { background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 8px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); margin-top: 12px; padding: 8px 0; width: 422px; }
        .tt-suggestion { font-size: 22px; padding: 3px 20px; }
        .tt-suggestion:hover { cursor: pointer; background-color: #0097CF; color: #FFFFFF; }
        .tt-suggestion p { margin: 0; }
    </style>
</head>
<body>
<!--Header-part-->
@include('admin.includes.header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@section('KICK')
    active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->
@php
    $lang = $type == 'english' ? 'English' : 'Hindi';
@endphp
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            <a href="#" class="tip-bottom">Tag</a>
            <a href="#" class="current">{{ $lang }} Tag</a> </div>
        <h1>Create {{ $lang }} Tag</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>{{ $lang }} tag Details</h5>
                </div>
                <div class="widget-content nopadding">
                    @if (!empty(session()->get('failed')))
                        <div class="alert alert-danger">{{ session()->get('failed') }}</div>
                    @endif
                    <form method="POST" class="form-horizontal" action="{{url('admin/create/kicker/'. $type )}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control-group">
                            <label class="control-label">{{ $lang }} Tag :</label>
                            <div class="controls">
                                <input type="text"  maxlength="125" required class="typeahead tt-query" autocomplete="off" spellcheck="false" name="kicker" placeholder="Enter Tag">
                            </div>
                        </div>

                        <div class="form-actions" style="text-align: center;">
                            <button type="submit" id="ariclesubmit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer-part-->
@include('admin.includes.footer')
<!--end-Footer-part-->

<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/typeahead.bundle.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Defining the local dataset
        var kicker = [<?php foreach($kickers as $kicker) echo '"'.preg_replace('/[^A-Za-z0-9\- &]/', '', $kicker).'",';?>];

        // Constructing the suggestion engine
        var kicker = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: kicker
        });

        // Initializing the typeahead
        $('.typeahead').typeahead({
                hint: true,
                highlight: true, /* Enable substring highlighting */
                minLength: 1     /* Specify minimum characters required for showing result */
            },
            {
                name: 'kicker',
                source: kicker
            });
    });

</script>
<script src="{{url('admin/js/matrix.js')}}"></script>
</body>
</html>
