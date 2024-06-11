@extends('admin.layout.master')
@section('DAU')
    active
@endsection
@section('content')
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        let editor_config = {
            path_absolute: "/",
            height: 300,
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                let cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>

    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Author</a> <a href="#" class="current">{{ isset($author) ? "Update" : "Create" }}-Author</a></div>
        <h1>{{ isset($author) ? "Update" : "Create" }} Author</h1>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">

            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Author Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url( isset($author) ?  'admin/author-edit' : 'admin/author-register')}}">
                        <input type="hidden" class="span11" name="id" value="{{isset($author) ? $author->author_id : ""}}"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label">Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="name" placeholder="Enter your Name" value="{{isset($author) ? $author->title : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Office Email-Id :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="email" placeholder="Enter email-id" value="{{isset($author) ? $author->emailid : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Office Contact No :</label>
                            <div class="controls">
                                <input type="text" required class="span11" name="phone_no" placeholder="Enter Contact Number" value="{{isset($author) ? $author->phone_no : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Office Address :</label>
                            <div class="controls">
                                <input type="text" required class="span11" name="address" placeholder="Enter Address" value="{{isset($author) ? $author->address : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Linkedin Profile :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="linkedin_profile" placeholder="Enter Linkedin Profile" value="{{isset($author) ? $author->linkedin_profile : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Facebook Profile :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="facebook_profile" placeholder="Enter Facebook Profile" value="{{isset($author) ? $author->facebook_profile : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Twitter Profile :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="twitter_profile" placeholder="Enter Twitter Profile" value="{{isset($author) ? $author->twitter_profile : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Company :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="company" placeholder="Enter Company name" value="{{isset($author) ? $author->company : ""}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Designation :</label>
                            <div class="controls">
                                <input type="text" name="designation" class="span11" placeholder="Enter designation" value="{{isset($author) ? $author->designation : ""}}"/>
                                @if(isset($author))
                                    <img src="{{isset($author) ? Config('constants.franAwsS3Url').ltrim($author->image, '/') : "" }}" height="106" width="187" style="padding-top: inherit;">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Image :</label>
                            <div class="controls">
                                @if(isset($author))
                                    <input type="hidden" name="old_image" value="{{isset($author) ? Config('constants.franAwsS3Url').ltrim($author->image, '/') : "" }}"/>
                                @endif
                                <input type="file" name="image" class="span11">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description :</label>
                            <div class="controls span9">
                                <textarea name="desc" placeholder="Description">{{isset($author) ? $author->text : ""}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="international_check" class="control-label">News Writer? :</label>
                            <div class="controls">
                                <input type="checkbox" name="news_upload_capability" value="1" @if( isset($author) && $author->news_upload_capability == 1) checked @endif>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" class="btn btn-success" value="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection