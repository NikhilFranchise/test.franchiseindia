<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<style>
  .switch { position: relative; display: inline-block; width: 60px; height: 34px; }
  .switch input {display:none;}
  .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; -webkit-transition: .4s; transition: .4s; }
  .slider:before { position: absolute; content: ""; height: 26px; width: 26px; left: 4px; bottom: 4px; background-color: white; -webkit-transition: .4s; transition: .4s; }
  input:checked + .slider { background-color: #2196F3; }
  input:focus + .slider { box-shadow: 0 0 1px #2196F3; }
  input:checked + .slider:before { -webkit-transform: translateX(26px); -ms-transform: translateX(26px); transform: translateX(26px); }
  .slider.round { border-radius: 34px; }
  .slider.round:before { border-radius: 50%; }
  .custpagin  { background-color: #dfdfdf; margin-bottom: 10px;}
  .custpagin .pagination li { display: inline-grid; font-size: 20px; margin-left:1px; margin-right: 1px; border-width: 1px; border-radius: 6px; }
  .custpagin .pagination { text-align: right; }
  .custpagin .pagination li.active{ background-color: #faa732; color: #fff;padding: 3px 7px;border-radius: 6px; border:1px; }
  .custpagin .pagination li a{ padding: 3px 7px; background-color: #41BEDD; color: #fff; border-radius: 6px;border:1px;}
</style>
<body>
@section('COM') active @endsection
@section('displayComment') style = "display:block;" @endsection

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
    <div id="breadcrumb"> <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Comment News</a> <a href="#" class="current">List-Comment News</a> </div>
    <h1>Comment News Listing</h1>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Comment News Data</h5>
            <div class="" style=" position: relative; left:620px; padding-top: 2px;"><label>Search:
                <input type="text" id="newscommentsearch" placeholder="enter News Id to search">
              </label></div>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Comment Id</th>
                <th>News Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>News Title</th>
                <th>Comment Type</th>
                <th>Comment</th>
                <th>Comment Date</th>
                <th>Status</th>
                <th>Edit</th>
              </tr>
              </thead>
              <tbody id="tablecontent">
              @foreach ($data as $comment)
                @php
                  $titleView = "";
                  foreach($titles as $title) {
                    if($title->news_id == $comment->newsID ) {
                      $titleView = $title->title;
                    }
                  }
                @endphp
                <tr class="gradeX">
                  <td>{{$comment->commentID}}</td>
                  <td>{{$comment->newsID}}</td>
                  <td>{{$comment->comment_user}}</td>
                  <td>{{$comment->comment_email}}</td>
                  <td>{{$comment->mobile}}</td>
                  <td>{{$titleView}}</td>
                  <td>{{$comment->contentType}}</td>
                  <td>{{$comment->comment_content}}</td>
                  <td>{{$comment->comment_date}}</td>
                  <td>
                    <div style="text-align: center;">
                      <label class="switch">
                        @php
                          $checked = "";
                          if ($comment->status == "Y")
                            $checked = "checked";
                        @endphp
                        <input type="checkbox" value="{{$comment->commentID}}" class="activestate" {{$checked}}>
                        <span class="slider round" ></span>
                      </label>
                    </div>
                  </td>
                  <td style="text-align: center;"><a href="edit-news-comment/{{$comment->commentID}}"><button class="btn btn-medium btn-warning" style="border-radius: 4px">Edit</button></a>
                  </td>
                </tr>
              @endforeach

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

              </tbody>
            </table>
          </div>
          <div class="custpagin">{{ $data->links() }}</div>
        </div>
      </div>
    </div>

  </div>
</div>
<!--Footer-part-->
@include('admin.includes.footer')
<!--end-Footer-part-->

<script src="{{URL::asset('admin/js/jquery.min.js')}}"></script>
<script type="text/javascript">
  $('.activestate').click(function() {
    if(this.checked){
      var id = this.value;
      $.ajax({
        type: "POST",
        url: '/updatenewscommentstatus',
        data: {"NewsCommentId":id,"contentStatus":"Y","_token" :"{{csrf_token()}}"},
      });
    }
    if(!(this.checked)){
      var id = this.value;
      $.ajax({
        type: "POST",
        url: '/updatenewscommentstatus',
        data: {"NewsCommentId":id,"contentStatus":"N","_token" :"{{csrf_token()}}"},
      });
    }
  });

  var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this news?";
  $('.deleteauthor').on('click', function(e){
    var x = $(this).attr('data-value');
    confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
      $.ajax({
        type: "POST",
        url: '/deletenews',
        data: {"contentId":x,"_token" :"{{csrf_token()}}"},
        success: function(data) {
          $(document).ajaxStop(function(){
            window.location.reload();
          });
        },
      });
    });
  });

  function confirmDialog(message, onConfirm){
    var fClose = function(){
      modal.modal("hide");
    };
    var modal = $("#confirmModal");
    modal.modal("show");
    $("#confirmMessage").empty().append(message);
    $("#confirmOk").one('click', onConfirm);
    $("#confirmOk").one('click', fClose);
    $("#confirmCancel").one("click", fClose);
  }
</script>
<script src="{{URL::asset('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{URL::asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admin/js/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin/js/matrix.js')}}"></script>
<script src="{{URL::asset('admin/js/matrix.tables.js')}}"></script>
<script type="text/javascript">
  $( "#newscommentsearch" ).keyup(function() {
    var value = $("#newscommentsearch").val();;
    $.ajax({
      type : 'get',
      url  : '{{URL::to('newscommentsearch')}}',
      data : {'search':value},
      success:function(data){
        $('#tablecontent').html(data);
        $('.custpagin').html("");
      }
    })
  });
</script>
</body>
</html>
