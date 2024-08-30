<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<body>
@include('admin.includes.header')
@section('COM') active @endsection
@section('displayComment') style = "display:block;" @endsection
@include('admin.includes.sidebar')
@php
    $postUrl = "edit-article-interview-comment";
    if(request()->segment(2) == "edit-mag-comment")
        $postUrl = "update-magazine-comment";
    if(request()->segment(2) == "edit-news-comment")
        $postUrl = "edit-news-comment";
@endphp

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            <a href="#" class="tip-bottom">Comment</a>
            <a href="#" class="current">edit-Comment</a>
        </div>
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
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{Config('constants.MainDomain')}}/admin/{{ $postUrl }}">
                        <input type="hidden" name="id" value="{{$data->commentID}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label">Comment Email :</label>
                            <div class="controls">
                                <input type="email" class="span11" name="email" placeholder="Comment Email" value="{{$data->comment_email}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Comment Mobile :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="mobile" placeholder="Comment Mobile" value="{{$data->mobile}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Rating :</label>
                            <div class="controls">
                                <input type="number" class="span11" placeholder="Ratings" name="rating" value="{{$data->rating}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Comment User :</label>
                            <div class="controls">
                                <input type="text"  class="span11" placeholder="Enter Home Title"  name="comment_user" value="{{$data->comment_user}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Comment Content :</label>
                            <div class="controls">
                                <textarea class="span11" placeholder="Comment Content" name="content" required>{{$data->comment_content}}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
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
<script src="{{url('admin/js/matrix.js')}}"></script>
</body>
</html>
