  <!DOCTYPE html>
  <html lang="en">
  <head>
    @include('admin.includes.head')
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

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

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

  </head>
  <body>

  <!--Header-part-->
  @include('admin.includes.header')
  <!--close-top-Header-menu-->

  <!--sidebar-menu-->
  @section('DAU')
    active
  @endsection
  @include('admin.includes.sidebar')
  <!--sidebar-menu-->

  <div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Author</a> <a href="#" class="current">List-Author</a> </div>
    <h1>Author Listing</h1>
  </div>
  <!--End-breadcrumbs-->

    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Author Data</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Author Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <!-- <th>Delete</th> -->
                  </tr>
                </thead>
                <tbody>
                @foreach($author as $author)
                  <tr class="gradeX">
                    <td>{{$author->author_id}}</td>
                    <td>{{$author->title}}</td>
                    @php
                      $button = 'success';
                      $status = 'active';
                      if ( $author->status == 'D') {
                        $button = 'danger';
                        $status = 'Deactivated';
                      }
                    @endphp
                    <td><center>
                      <label class="switch">
                      @php
                      $check = "";
                        if (  $author->status == 'A')
                          $check = "checked";
                      @endphp
                        <input type="checkbox" {{$check}} class="activestate" id="sdkdkjbs" value="{{$author->author_id}}">
                        <span class="slider round" ></span>
                      </label>
                    </center></td>
                    <td><center><a href="edit-author/{{$author->author_id}}"><button class="btn btn-medium btn-warning" style="border-radius: 4px">Edit</button></a></center></td>
                    <!-- <td><center><button class="btn btn-medium btn-danger deleteauthor" style="border-radius: 4px" data-value="{{$author->author_id}}">Delete</button></center></td> -->
                  </tr>
                @endforeach
                </tbody>
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
              </table>
            </div>
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
                url: '/updateauthorstatus',
                data: {"authorId":id,"authorstatus":"A","_token" :"{{csrf_token()}}"},
                success: function(data) {
                    alert(data.ratings);
                },
            });
         }
      if(!(this.checked)){
          var id = this.value;
           $.ajax({
                type: "POST",
                url: '/updateauthorstatus',
                data: {"authorId":id,"authorstatus":"D","_token" :"{{csrf_token()}}"},
                success: function(data) {
                    alert(data.ratings);
                },
            });
         }
      });

    var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this post?";
      $('.deleteauthor').on('click', function(e){
        var x = $(this).attr('data-value');
        confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
           $.ajax({
                type: "POST",
                url: '/deleteauthor',
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
  <!-- <script src="{{URL::asset('admin/js/jquery.uniform.js')}}"></script>  -->
  <script src="{{URL::asset('admin/js/select2.min.js')}}"></script>
  <script src="{{URL::asset('admin/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('admin/js/matrix.js')}}"></script>
  <script src="{{URL::asset('admin/js/matrix.tables.js')}}"></script>
  </body>
  </html>
