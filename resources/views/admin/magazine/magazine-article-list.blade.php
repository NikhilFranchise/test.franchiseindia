  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Franchise India Admin Panel</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{URL::asset('admin/css/bootstrap.min.css')}}" />
    <link href="{{URL::asset('admin/css/bootstrap-switch.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('admin/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('admin/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('admin/css/matrix-media.css')}}" />
    <link href="{{URL::asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
.round-button {
  width:25%;
}
.round-button-circle {
  width: 50px;
  height:50px;
  border-radius: 50%;
  overflow:hidden;
  background: #4679BD; 
  box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
  background:#30588e;
}
.round-button a {
    display:block;
  float:left;
  width:100%;
  padding-top:50%;
    padding-bottom:50%;
  line-height:1em;
  margin-top:-0.5em;
    
  text-align:center;
  color:#e2eaf3;
    font-family:Verdana;
    font-size:1.2em;
    font-weight:bold;
    text-decoration:none;
}
.custpagin  { background-color: #dfdfdf; margin-bottom: 10px;}

.custpagin .pagination li {
    display: inline-grid;
    font-size: 20px;
    margin-left:1px;
    margin-right: 1px;
    border-width: 1px;
    border-radius: 6px;
}

.custpagin .pagination {
  text-align: right;
}
.custpagin .pagination li.active{ background-color: #faa732; color: #fff;padding: 3px 7px;border-radius: 6px; border:1px; }
.custpagin .pagination li a{ padding: 3px 7px; background-color: #41BEDD; color: #fff; border-radius: 6px;border:1px;}
</style>

  </head>
  <body>

  <!--Header-part-->
  @include('admin.includes.header')
  <!--close-top-Header-menu-->

  <!--sidebar-menu-->
  @section('MAG')
    active
  @endsection
  @include('admin.includes.sidebar')
  <!--sidebar-menu-->

  <div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Article</a> <a href="#" class="current">List-Article</a> </div>
    <h1>Article Listing <a href="{{Config::get('constants.MainDomain')}}/admin/create-magazine-article/{{ $caregoryId }}"><button class="btn btn-primary btn-large" style="border-radius: 4px">Create New Article</button></a></h1>

  </div>
  <!--End-breadcrumbs-->

    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
       
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>{{$magazine->title}} Magazine Articles Data</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($articleData as $data)
                  <tr class="gradeX">
                    <td>{{$data->item_id}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->views}}</td>
                    <td>
                      <center>
                        <label class="switch">
                          @php
                            $check="";
                            if ( $data->status == 1)
                              $check="checked";
                          @endphp
                          <input type="checkbox" value="{{$data->item_id}}" {{$check}} class="activestate" >
                          <span class="slider round" ></span>
                        </label>
                      </center>
                    </td>
                    <td><center><a href="{{Config::get('constants.MainDomain')}}/admin/edit-magazine-article/{{$data->item_id}}"><button class="btn btn-medium btn-warning" style="border-radius: 4px">Edit</button></a></center></td>
                    <td><center><button class="btn btn-medium btn-danger deleteauthor" style="border-radius: 4px" data-value="{{$data->item_id}}">Delete</button></center></td>
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
          </div>
        </div>
      </div>
      <div class="custpagin">{{ $articleData->links() }}</div>
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
                url: '/updatemagazinearticlestatus',
                data: {"articleId":id,"contentStatus":"1","_token" :"{{csrf_token()}}"},
            });
         }
      if(!(this.checked)){
          var id = this.value;
           $.ajax({
                type: "POST",
                url: '/updatemagazinearticlestatus',
                data: {"articleId":id,"contentStatus":"0","_token" :"{{csrf_token()}}"},
            });
         }
      });

    var YOUR_MESSAGE_STRING_CONST = "Are you sure to delete this Article?";
      $('.deleteauthor').on('click', function(e){
        var x = $(this).attr('data-value');
        confirmDialog(YOUR_MESSAGE_STRING_CONST, function() {
           $.ajax({
                type: "POST",
                url: '/deletemagazinearticle',
                data: {"articleId":x,"_token" :"{{csrf_token()}}"},
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
  </body>
  </html>
