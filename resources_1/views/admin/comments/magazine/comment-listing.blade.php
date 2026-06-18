<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<style>
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
        <div id="breadcrumb">
            <a href="{{Config('constants.MainDomain')}}/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" class="tip-bottom">Comment Magazine Articles</a>
            <a href="#" class="current">List-Comment Magazine articles</a>
        </div>
        <h1>Magazine comment listing</h1>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Magazine comment listing</h5>
                        <div class="" style=" position: relative; left:550px; padding-top: 2px;">
                            <label>Search: <input type="text" id="articleinterviewcommentsearch"
                                                  placeholder="Enter Magzine ID to search"></label>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Comment Id</th>
                                <th>Content Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Article Title</th>
                                <th>Comment</th>
                                <th>Comment Date</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="tablecontent">
                            @foreach ($comments as $comment)
                                @php
                                    $titleView = "";
                                    foreach($titles as $title) {
                                      if( $title->item_id == $comment->magzID ) {
                                          $titleView = $title->title;
                                      }
                                    }
                                @endphp
                                <tr class="gradeX">
                                    <td>{{$comment->commentID}}</td>
                                    <td>{{$comment->magzID}}</td>
                                    <td>{{$comment->comment_user}}</td>
                                    <td>{{$comment->comment_email}}</td>
                                    <td>{{$comment->mobile}}</td>
                                    <td>{{$titleView}}</td>
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
                                                <input type="checkbox" value="{{$comment->commentID}}"
                                                       class="activestate" {{$checked}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td style="text-align: center;"><a href="edit-mag-comment/{{$comment->commentID}}">
                                            <button class="btn btn-medium btn-warning" style="border-radius: 4px">Edit
                                            </button>
                                        </a>
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
                                            <button type="button" class="btn btn-default" id="confirmCancel">Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="custpagin">{{ $comments->links() }}</div>
            </div>
        </div>

    </div>
</div>

<!--Footer-part-->
@include('admin.includes.footer')
<!--end-Footer-part-->

<script src="{{url()->asset('admin/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $('.activestate').click(function () {
        if (this.checked) {
            let id = this.value;
            $.ajax({
                type: "POST",
                url: '/admin/update-mag-comment-status',
                data: {"commentId": id, "contentStatus": "Y", "_token": "{{csrf_token()}}"},
            });
        }
        if (!(this.checked)) {
            let id = this.value;
            $.ajax({
                type: "POST",
                url: '/admin/update-mag-comment-status',
                data: {"commentId": id, "contentStatus": "N", "_token": "{{csrf_token()}}"},
            });
        }
    });
</script>
<script src="{{url()->asset('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{url()->asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{url()->asset('admin/js/select2.min.js')}}"></script>
<script src="{{url()->asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url()->asset('admin/js/matrix.js')}}"></script>
<script src="{{url()->asset('admin/js/matrix.tables.js')}}"></script>
<script type="text/javascript">
    $("#articleinterviewcommentsearch").keyup(function () {
        let value = $("#articleinterviewcommentsearch").val();
        $.ajax({
            type: 'get',
            url: '{{ url()->to('admin/magzine-comment-search') }}',
            data: {'search': value},
            success: function (data) {
                $('#tablecontent').html(data);
                $('.custpagin').html("");
            }
        })
    });
</script>
</body>
</html>
