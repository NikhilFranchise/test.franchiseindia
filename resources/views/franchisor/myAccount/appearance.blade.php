@extends('layout.master')
@section('AP')
class="selected"
@endsection
@section('content')

<style type="text/css">
    .formsection .checkmarginnew { margin-top:15px;}
    #option1 .modal-dialog, #option2 .modal-dialog ,#option3 .modal-dialog  { width:98%;}
    .option  { width:100%;}
    .option img  { width:100%;}

    @media only screen and (min-width:250px) and (max-width:767px){
        #option1 .modal-dialog, #option2 .modal-dialog ,#option3 .modal-dialog  { width:95%;}
    }
    @media only screen and (min-width:768px) and (max-width:1023px){
    .optlink a {  font-size:12px; }
    }
</style>

<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
        @include('includes.myfranchiseleft')
    <!-- MY ACCOUNT  LEFT END -->
        <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
            <h1 class="myhead marleft">Appearance</h1>
            <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal" id="appearanceformcng" action="updateappearance" method="POST"  role="form" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                            @endif
                            @if (Session::has('failed'))
                                <div class="alert alert-info">{{ Session::get('failed') }}</div>
                            @endif    

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span class="mandatory">Layout Option</span><br></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>                
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                     <div class="row checkmarginnew">
                                        <div class="col-sm-12 row-no-padding optlink">
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" id="optionsel" value="1" checked data-toggle="modal" data-target="#layoutoption1" @if($franData->page_layout_type == 1) checked @endif />Basic Layout &nbsp
                                                <a href="#"  data-toggle="modal" data-target="#layoutoption1"> ( View Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" id="optionsel" value="2" data-toggle="modal" data-target="#layoutoption2" @if($franData->page_layout_type == 2) checked @endif />Sliding Layout &nbsp
                                                <a href="#"  data-toggle="modal" data-target="#layoutoption2"> ( View Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" id="optionsel" value="3"  data-toggle="modal" data-target="#layoutoption3" @if($franData->page_layout_type == 3) checked @endif />Gallery Layout &nbsp
                                                <a href="#"  data-toggle="modal" data-target="#layoutoption3"> ( View Example )</a>
                                            </label>
                                        </div>
                                     </div>  
                                </div>
                            </div>

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">           
                                <div class="modal-body option">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="{{URL::asset('images/layoutoption1.jpg')}}" alt="layout 1">
                                </div>
                                </div>
                                </div>
                            </div>
                            <!---->
                            
                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">           
                                <div class="modal-body option">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="{{URL::asset('images/layoutoption2.jpg')}}" alt="layout 1">
                                </div>
                                </div>
                                </div>
                            </div>
                            <!---->
                            
                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">           
                                <div class="modal-body option">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img src="{{URL::asset('images/layoutoption3.jpg')}}" alt="layout 1">
                                </div>
                                </div>
                                </div>
                            </div>
                            <!---->

                            @php $i = 0; @endphp

                            @foreach($sliderData as $slider)
                                <div class="form-group posl" >
                                    <label class="col-xs-12  col-sm-4 com4mod control-label @if($loop->index == 0) mandatory @endif ">@if($loop->index == 0)Upload Slides Pic @endif</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <strong> Image : {{ $loop->index + 1 }} </strong>

                                        @php
                                            $imageUrl = $slider->pre_approved_image;
                                            if(empty($imageUrl))
                                                $imageUrl = $slider->image_type_slider1;
                                            if(empty($imageUrl))
                                                $imageUrl = $slider->image_type_slider2;
                                        @endphp

                                        <style type="text/css">
                                            .MyaccImgApp {width: 90%; margin-bottom: 7px;}
                                            .MyaccImgApp img{ width: 100%; border: 1px solid #666; border-radius:4px; }
                                        </style>

                                        <div class="MyaccImgApp"><img src="{{ $imageUrl }}" alt="slider image" /></div>
                                        
                                        <strong style="@if($slider->status != 1) color: red; @endif">
                                            ( {{ Config::get('constants.imageStatus.'.$slider->status) }} ) &nbsp -- &nbsp
                                            @if(empty($slider->image_type_slider1))
                                                <span style="color: red;">Sliding Image (Not Existing) </span> &nbsp --&nbsp 
                                            @else
                                                Sliding Image (Existing)&nbsp --&nbsp 
                                            @endif
                                            @if(empty($slider->image_type_slider2))
                                                <span style="color: red;"> Gallery Image (Not Existing) </span>
                                            @else
                                                Gallery Image (Existing)
                                            @endif
                                        </strong>
                                    </div>
                                </div>    
                                <hr>                
                            @endforeach

                            @for( $i = (count($sliderData)+1); $i <= 5; $i++ )
                                <div class="form-group posl" >
                                    <label class="col-xs-12  col-sm-4 com4mod control-label @if(count($sliderData) == 0) mandatory @endif ">
                                        @if(count($sliderData) == 0)Upload Slides Pic @endif
                                    </label>                
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <strong> Image : {{ $i }} </strong>
                                        <div class="input-group">
                                            <span class="input-group-addon"><img alt="upload image" src="{{URL::asset('images/img-uplaod.png')}}"></span>
                                            <input type="file" name="sliderimage{{$i}}" id="sliderimage{{$i}}" class="form-control fileUpload2" @if($i < 5) required @endif>
                                        </div>
                                    </div>
                                </div>    
                                <hr> 
                            @endfor

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 com4mod control-label ">Video Link </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="video link" src="{{URL::asset('images/video-link.png')}}"></span>
                                        <input type="text" class="form-control" name="video_link" placeholder="Enter Your Video link" value="{{$franData->video_link}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center><input type="submit"  class="btn btn-default" value="Update" id="submitButton" /></center>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $( "#appearanceformcng" ).submit(function() {
      $( "#submitButton" ).prop('disabled', true);
    });




    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 5 MB');

    jQuery(function ($) {
        $('#appearanceformcng').validate({
            rules: {
                sliderimage1: { filesize: 5*1024*1024 },
                sliderimage2: { filesize: 5*1024*1024 },
                sliderimage3: { filesize: 5*1024*1024 },
                sliderimage4: { filesize: 5*1024*1024 },
                sliderimage5: { filesize: 5*1024*1024 },
            },
            errorPlacement: function(error, element) {  
                error.appendTo( element.parent().parent())
            },
        });
    });



    //image size and height validation
    $(".fileUpload2").on("change", function (event) {
        flag                   = 0;
        var thisId             = $(this).attr('id');
        var message            = "";
        //Get reference of FileUpload.
        var fileUpload         = $(this)[0];
        //Initiate the FileReader object.
        var reader             = new FileReader();
        //Read the contents of Image File.
        reader.readAsDataURL(fileUpload.files[0]);
        reader.onload          = function (e) {
            //Initiate the JavaScript Image object.
            var image          = new Image();
            //Set the Base64 string return from FileReader as source.
            image.src          = e.target.result;
            image.onload       = function () {
                //Determine the Height and Width.
                var height     = this.height;
                var width      = this.width;
                /*if (width < 2560 || height < 825) {
                    $("#errorMsg").html("Please Provide The Correct Image Sizes");
                    flag       = 1;
                    message    = "Width and Height of image must not be less than 2560px * 825px.";
                }*/
				if (width < 1900 || height < 600) {
                    $("#errorMsg").html("Please Provide The Correct Image Sizes");
                    flag       = 1;
                    message    = "Width and Height of image must not be less than 1900px * 600px.";
                }
                if (flag == 1) {
                   alert(message);
                   $('#'+thisId).val('');
                }
            };
        }
    });

</script>

@endsection