<!DOCTYPE html>
<html lang="en">
<head>
    <title>Franchise India Admin Panel</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type='text/css' href="{{url('admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type='text/css' href="{{url('admin/css/bootstrap-switch.css')}}" >
    <link rel="stylesheet" type='text/css' href="{{url('admin/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" type='text/css' href="{{url('admin/css/matrix-style.css')}}" />
    <link rel="stylesheet" type='text/css' href="{{url('admin/css/matrix-media.css')}}" />
    <link rel="stylesheet" type='text/css' href="{{url('admin/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

    <style>
        .switch { position: relative; display: inline-block; width: 60px; height: 34px; }
        .switch input {display:none;}
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; -webkit-transition: .4s; transition: .4s; }
        .slider:before { position: absolute; content: ""; height: 26px; width: 26px; left: 4px; bottom: 4px; background-color: white; -webkit-transition: .4s; transition: .4s; }
        input:checked + .slider { background-color: #2196F3; }
        input:focus + .slider { box-shadow: 0 0 1px #2196F3; }
        input:checked + .slider:before { -webkit-transform: translateX(26px); -ms-transform: translateX(26px); transform: translateX(26px); }
        .gradeX > td {text-align: center;}

        /* Rounded sliders */
        .slider.round { border-radius: 34px; }
        .slider.round:before { border-radius: 50%; }
        .round-button-circle { width: 45px; border-radius: 50%; overflow:hidden; background: #4679BD; box-shadow: 0 0 3px gray; }
        .round-button-circle:hover { background:#30588e; }
        .round-button a { display:block; float:left; width:100%; padding-top:35%; padding-bottom:50%; line-height:1em; margin-top:-0.5em; text-align:center; color:#e2eaf3; font-family:"Verdana", "serif"; font-size:1.2em; font-weight:bold; text-decoration:none; }
        .custpagin  { background-color: #dfdfdf; margin-bottom: 10px;}
        .custpagin .pagination li { display: inline-grid; font-size: 20px; margin-left:1px; margin-right: 1px; border-width: 1px; border-radius: 6px; }
        .custpagin .pagination { text-align: right; }
        .custpagin .pagination li.active{ background-color: #faa732; color: #fff;padding: 3px 7px;border-radius: 6px; border:1px; }
        .custpagin .pagination li a{ padding: 3px 7px; background-color: #41BEDD; color: #fff; border-radius: 6px;border:1px;}
    </style>
</head>
<body>

@include('admin.includes.header')
@section('AA')
    active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Article/Interview</a> <a href="#" class="current">List-Article-Interview</a> </div>
        <h1>Article/Interview Listing</h1>
    </div>
    <!--End-breadcrumbs-->
    <br/><br/>
    <div style="margin-top: 5%;float: right;" class="container-fluid">
                <form action="{{url('admin/list-article-interview')}}"
method="get">
                    Search Keyword :  <input type="text" name="search"
class="span7" placeholder="Enter Title or Article Id to search"
@if(!empty(request()->search)) value="{{ request()->search }}" @endif />
                    <input type="submit"  class="btn" value="Search"
style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                    <a href="{{url('admin/list-article-interview')}}"
class="btn" style="margin-top: -12px;">Reset Search</a>
                </form>
            </div>

    <!--<div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span3">
            </div>
            <div class="span9">
                <form action="{{url('admin/list-article-interview')}}" method="get">
                    Search Keyword :  <input type="text" name="search" class="span7" placeholder="Enter Title or Article Id to search" @if(!empty(request()->search)) value="{{ request()->search }}" @endif />
                    <input type="submit"  class="btn" value="Search" style="margin-top: -12px; margin-left: 10px; width: 110px;" />
                    <a href="{{url('admin/list-article-interview')}}" class="btn" style="margin-top: -12px;">Reset Search</a>
                </form>
            </div>
        </div>
    </div>-->

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Link</th>
                                <th>Status</th>
                                @if(session()->get('role') != 'ga') <th>Edit</th> @endif
                                <th>Hindi(New/Update)</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody id="tablecontent">
                            @php
                                $url = Config('constants.MainDomain').'/'.Config('constants.articleArr.'.session()->get('role')).'/';
                            @endphp
                            @foreach($articleInterviewData as $data)
                                <tr class="gradeX">
                                    <td>{{$data->content_id}}</td>
                                    <td>{{$data->contentType}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->views}}</td>
                                    <td><div class="round-button"><div class="round-button-circle"><a href="{{$url.$data->slug.'.'.$data->content_id}}" target="_blank" class="round-button">Go</a></div></div></td>
                                    <td >
                                        <label class="switch" >
                                            <input type="checkbox" value="{{$data->content_id}}" class="activestate" {{( $data->status == 1 ) ? "checked" : ""}}>
                                            <span class="slider round" ></span>
                                        </label>
                                    </td>
                                    <td ><a href="edit-article-interview/{{$data->content_id}}"><button class="btn btn-medium btn-warning" style="border-radius: 4px">Edit</button></a></td>
                                    @if(session()->get('role') != 'ga') <td ><a href="{{url("admin/article/hindi/$data->content_id")}}" class="btn btn-medium btn-{{ $data->is_hindi == 1 ? 'success' : 'danger' }}" style="border-radius: 4px">Hindi</a></td> @endif
                                    <td ><button class="btn btn-medium btn-danger deleteauthor" style="border-radius: 4px" data-value="{{$data->content_id}}">Delete</button></td>
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
                                        <button type="button" class="btn btn-default" id="confirmCancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custpagin">
            {!! $articleInterviewData->appends([ 'search' => request()->search ])->render() !!}
        </div>
    </div>
</div>
<!--Footer-part-->
@include('admin.includes.footer')
<!--end-Footer-part-->

<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/bootstrap.min.js')}}"></script>
<script src="{{url('admin/js/matrix.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
   
    @if (Session::has('success'))
        toastr.options = {
            "closeButton":true,
            "progressBar":true,
        }
        toastr.success("{{ session('success') }}")
    @elseif(Session::has('error'))
    toastr.options = {
            "closeButton":true,
            "progressBar":true,
        }
        toastr.error(" {{session('error')}}") 
    @endif
    
</script>
<script type="text/javascript">

    $('.activestate').click(function() {
        var id = this.value;
        var checked = 1;
        if(!(this.checked))
            checked = 0;

        $.ajax({
            type: "POST",
            url: '/updatearticalinterviewstatus',
            data: {"contentId":id,"contentStatus":checked,"_token" :"{{csrf_token()}}"}
        });
    });

    var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this post?";
    $('.deleteauthor').on('click', function(){
        var x = $(this).attr('data-value');
        confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
            $.ajax({
                type: "POST",
                url: '/deletearticle',
                data: {"contentId":x,"_token" :"{{csrf_token()}}"},
                success: function() {
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                }
            });
        });
    });

    function confirmDialog(message, onConfirm){
        var confirmOk = $("#confirmOk");
        var fClose = function(){ modal.modal("hide"); };
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
