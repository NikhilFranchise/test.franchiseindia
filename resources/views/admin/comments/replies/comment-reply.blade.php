<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.includes.head')s
<style type="text/css">
  
  .select2-container .select2-selection--multiple {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    min-height: 32px;
    user-select: none;
    -webkit-user-select: none;
    width: 700px;
  }
  .bs-example {
    font-family: sans-serif;
    position: relative;
    margin: 100px;
  }
  .typeahead, .tt-query, .tt-hint {
    border: 2px solid #CCCCCC;
    border-radius: 8px;
    font-size: 22px; /* Set input font size */
    height: 30px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 685px;
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
    font-size: 22px;  /* Set suggestion dropdown font size */
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
@section('COM')
  active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
  <!--breadcrumbs-->
<div id="content-header">
  <div id="breadcrumb">
    <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
    <a href="#" class="tip-bottom">Comment</a>
      <a href="#" class="current">edit-Comment</a> </div>
  <h1>edit Comment</h1>
</div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Comment Details</h5>
        </div>
        <div class="widget-content nopadding">
          @if(isset($data))
            <form method="POST" class="form-horizontal" action="{{Config::get('constants.MainDomain')}}/admin/edit-comment-reply/{{ $data->reply_id }}">
          @else
            <form method="POST" class="form-horizontal" action="{{Config::get('constants.MainDomain')}}/admin/article-comment-reply">
          @endif
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $commId }}">
            <div class="control-group">
              <label class="control-label">Comment Content :</label>
              <div class="controls">
               <textarea class="span11" placeholder="Comment Content" name="reply">@if(isset($data)){{$data->reply}}@endif</textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Reply / Update Reply</button>
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

<script src="{{URL::asset('admin/js/jquery.min.js')}}"></script> 
<script src="{{URL::asset('admin/js/jquery.ui.custom.js')}}"></script> 
<script src="{{URL::asset('admin/js/bootstrap.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{URL::asset('admin/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{URL::asset('admin/js/typeahead.bundle.js')}}"></script>
<script src="{{URL::asset('admin/js/matrix.js')}}"></script>
</body>
</html>
