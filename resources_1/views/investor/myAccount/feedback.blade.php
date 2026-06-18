@extends('layout.master')
@section('content')
<div class="container row-no-padding">
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
@include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                @php
                    $hide = "";
                    if (Session::has('hide'))   
                        $hide = Session::get('hide');
                @endphp
            <h1 class="myhead marleft" style="{{ $hide }}">
            Feedback - Tell us What You Think !</h1>
            <div class="bor-radius backwhite marleft">
              @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <form class="form-horizontal formInv" name="form_investor" id="invfeedbackform" action="feedback" method="POST"  role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="profile_id" value="FIHL617594">
                <div class="col-xs-12 pad30 showbg">
                  @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                  @endif
                  @if (Session::has('Success'))
                     <div class="alert alert-info">{{ Session::get('Success') }}</div>
                  @endif
                   @if (Session::has('failed'))
                     <div class="alert alert-info">{{ Session::get('failed') }}</div>
                  @endif
                    <div class="form-group" style="{{ $hide }}">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Topic </label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/topic.png')}}" alt="topic"></span>
                                <input type="text"  value="" name="topic" class="form-control"  placeholder="Enter  topic">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="{{ $hide }}">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Feedback </label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="input-group">
                                <span class="input-group-addon height100" ><img src="{{URL::asset('images/comment.png')}}" alt="comment"></span>
                                <textarea class="form-control height100" name="feedbackContent" placeholder="Enter Your Feedback"></textarea>
                            </div>
                        </div>
                    </div> 
                </div>    
                <div class="clearfix"></div>
                <div class="row colbg" style="{{ $hide }}">
                    <center>
                        <input type="submit"  class="btn btn-default" value="Submit Feedback"/> 
                    </center>
                </div>  
            </form>
        </div>
    </div>
    </div>  
    </div>
</div> 
</div>
<script >
$( "#invfeedbackform" ).validate({
  rules: {
    topic:{
        required: true,
        minlength: 3
    },
    feedbackContent:{
        required: true,
        minlength: 10
    }
  },
  messages: {
    topic:{
        required: "please enter topic name",
        minlength: jQuery.format("Please enter at least {0} word length topic"),
    },
    feedbackContent:{
        required: "please enter your feedback",
        minlength: jQuery.format("Please enter at least {0} word length feedbacksssss"),
    }
  },
   errorPlacement: function(error, element) {  
      error.appendTo( element.parent().parent())
      }
});
</script>
@endsection
