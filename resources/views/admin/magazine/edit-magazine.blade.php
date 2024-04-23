@extends('admin.layout.master')
  @section('MAG')
    active
  @endsection
@section('content')
<!--breadcrumbs-->
<div id="content-header">
  <div id="breadcrumb"> <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Magazine</a> <a href="#" class="current">Create-Magazine</a> </div>
  <h1>Create Magazine</h1>
</div>
<!--End-breadcrumbs-->

<div class="container-fluid">
  <hr>
  <div class="row-fluid">

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Magazine Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{Config::get('constants.MainDomain')}}/admin/edit-magazine" >
          <input type="hidden" name="magazine_id" value="{{$magazineData->category_id}}"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
              <label class="control-label">Magazine Title :</label>
              <div class="controls">
                <input type="text" required class="span11" name="title" value="{{$magazineData->title}}" placeholder="Enter Magazine Title" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Magazine Month :</label>
              <div class="controls">
                <input type="text" required class="span11" name="month" value="{{$magazineData->iss_month}}" placeholder="Enter Magazine Month" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Magazine Year :</label>
              <div class="controls">
                <input type="text" required class="span11" name="year" value="{{$magazineData->iss_year}}" placeholder="Enter Magazine Year" />
                <img src="{{ Config('constants.franAwsS3Url').ltrim($magazineData->image, '/') }}" height="106" width="187" style="padding-top: inherit;">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image :</label>
              <div class="controls">
                <input type="hidden" name="old_image" value="{{ Config('constants.franAwsS3Url').ltrim($magazineData->image, '/') }}" />
                <input type="file" name="image" class="span11" id="showImage">
                <div style="display: none; color: red;" id="showImage_msg">Please select a valid image (jpg / gif / png)</div>
                <div style="display: none; color: red;" id="showImage_msg_size">Please select a image of size(Less than 300 KB)</div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Slug :</label>
              <div class="controls">
                <input type="text" required name="slug" id="slug" class="span11" value="{{$magazineData->slug}}" placeholder="Enter Slug"  />
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" class="btn btn-success" value="save" id="magazinesubmit">
            </div>
          </form>
        </div>
      </div>
</div>
</div>
<script src="{{URL::asset('admin/js/jquery.min.js')}}"></script> 
<script type="text/javascript">
  $("#showImage").change(function() {
    var val = $(this).val();
    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
      case 'gif': case 'jpg': case 'png':
          $('#showImage_msg').css('display','none');
          $('#magazinesubmit').prop('disabled',false);
          break;
      default:
          $(this).val('');
          $('#showImage_msg').css('display','block');
          $('#magazinesubmit').prop('disabled',true);
          break;
    }
  });
  $('#showImage').bind('change', function() {
    if(this.files[0].size > 307200){
        $('#showImage_msg_size').css('display','block');
        $('#magazinesubmit').prop('disabled',true);
    } else {
        $('#showImage_msg_size').css('display','none');
        $('#magazinesubmit').prop('disabled',false);
    }
  });
</script>
@endsection