<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.includes.head')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="{{URL::asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script src="{{URL::asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
  tinymce.init({  selector:'textarea',
                  theme : "advanced",
                  plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                  // Theme options
                  theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                  theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                  theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                  theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
                  theme_advanced_toolbar_location : "top",
                  theme_advanced_toolbar_align : "left",
                  theme_advanced_statusbar_location : "bottom",
                  theme_advanced_resizing : true,

                  // Skin options
                  skin : "o2k7",
                  skin_variant : "silver",

                  // Example content CSS (should be your site CSS)
                  content_css : "css/example.css",

                  // Drop lists for link/image/media/template dialogs
                  template_external_list_url : "js/template_list.js",
                  external_link_list_url : "js/link_list.js",
                  external_image_list_url : "js/image_list.js",
                  media_external_list_url : "js/media_list.js",

                  // Replace values for the template plugin
                  template_replace_values : {
                      username : "Some User",
                      staffid : "991234"
                       height : 300 }});
</script>
<script>
  var editor_config = {
    path_absolute : "/",
    height:300,
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
      remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
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
@section('MAG')
  active
@endsection
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<div id="content">
  <!--breadcrumbs-->
<div id="content-header">
  <div id="breadcrumb">
    <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
    <a href="#" class="tip-bottom">Article</a>
      <a href="#" class="current">Edit-Article</a> </div>
  <h1>Edit Article</h1>
</div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Article Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{Config::get('constants.MainDomain')}}/admin/update-magazine-article">
          <input type="hidden" name="category_id" value="{{$data->category_id}}"/>
          <input type="hidden" name="item_id" value="{{$data->item_id}}"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="control-group">
              <label class="control-label">Article Title :</label>
              <div class="controls">
                <input type="text" required class="span11" value="{{$data->title}}" placeholder="Enter Title" name="article_title" required/>
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Author :</label>
              <div class="controls">
               <select multiple="true" style="display: none;" value="" required name="author" id ="publisher" required>
                 <option value="{{$data->author}}" selected>{{$data->author}}</option>
               </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Summery :</label>
              <div class="controls">
                <input type="text" required class="span11" value="{{$data->subtitle}}" placeholder="Summery" name="summery"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Article Pharagraph :</label>
              <div class="controls">
                <input type="text" required class="span11" value="{{$data->subparagraph}}" placeholder="Pharagraph" name="pharagraph"/>
            </div>
            <div class="control-group">
              <label class="control-label">Magazine Article Description :</label>
              <div class="controls">
               <textarea class="span11" placeholder="Content Description" name="desc">{{$data->content}}</textarea>
               <img src="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}" height="106" width="187" style="padding-top: inherit;">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image :</label>
              <div class="controls">        
                  <input type="hidden" class="span11" name="old_image" value="{{ Config('constants.franAwsS3Url').ltrim($data->image, '/') }}">
                  <input type="file" class="span11" name="image" id="showImage">
                  <div style="display: none; color: red;" id="showImage_msg">Please select a valid image (jpg / gif / png)</div>
                  <div style="display: none; color: red;" id="showImage_msg_size">Please select a image of size(Less than 300 KB)</div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tags :</label>
              <div class="controls" id="associatedTags">
                <select multiple="true" required style="display: none;" name="tags[]" id ="select3">
                  @if((isset($assocTags)))
                    @foreach($assocTags as $assocTagsData)
                      <option value="{{$assocTagsData->tag_id}}" selected>{{$assocTagsData->name}}</option>
                    @endforeach
                  @endif  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">slug :</label>
              <div class="controls">
                <input type="text" required class="span11" value="{{ $data->slug }}" placeholder="Enter slug" name="slug"/>
              </div>
            </div> 
            <div class="form-actions">
              <center><button type="submit" class="btn btn-success" id="magazinesubmit">Update</button></center>
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
<script src="{{URL::asset('admin/js/jquery.uniform.js')}}"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{URL::asset('admin/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{URL::asset('admin/js/typeahead.bundle.js')}}"></script>
<script src="{{URL::asset('admin/js/matrix.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){

  //initialization and maximum values to be selected from text box
  $('#select3').select2({
    placeholder: "Choose tags...",
    minimumInputLength: 2,
    ajax: {
      url: '/associatedtags',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.tag_id
                }
            })
        };
      },
      cache: true
    }
  });


//initialization and maximum values to be selected from text box
  $('#select1').select2({
    maximumSelectionLength: 1,
  });

  //content publisher
   $('#publisher').select2({
    maximumSelectionLength: 1,
    placeholder: "Select Publisher...",
    minimumInputLength: 2,
    ajax: {
      url: '/publisher',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.title,
                    id: item.title
                }
            })
        };
      },
      cache: true
    }

  }); 
});

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
</body>
</html>
