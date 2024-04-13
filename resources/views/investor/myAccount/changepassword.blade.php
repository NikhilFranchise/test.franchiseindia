@extends('layout.master')
@section('cp')
class="selected"
@endsection
@section('content')
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
@include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
      <h1 class="myhead marleft">Change Password</h1>
      <div class="bor-radius backwhite marleft">     
          <form class="form-horizontal formInv" name="form_investor" id="invchangepasswordform" action="updatepassword" method="POST" role="form" autocomplete="off">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Old Password</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                      <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/pwd.png')}}" alt="password"></span>
                        <input type="password" id="oldpassword" name="password" class="form-control"  placeholder="Enter Old Password" autocomplete="off">
                        <center><span  onClick="toggle_password('oldpassword');" id="showoldpassword" class="showhidecng">Show</span></center>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">New Password</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                      <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/pwd.png')}}" alt="password"></span>
                        <input type="password"  id="password" name="new_password" class="form-control"  placeholder="Enter New Password" autocomplete="off">
                        <center><span  onClick="toggle_password('password');" id="showpassword" class="showhidecng">Show</span></center>
                      </div>
                    </div>
                  </div>
                                  
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Confirm Password</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                      <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/pwd.png')}}" alt="password"></span>
                        <input type="password" name="password_again" class="form-control"  placeholder="Enter  Confirm  Password" autocomplete="off">
                      </div>
                    </div>
                  </div>

              </div>    
              <div class="clearfix"></div>
              <div class="row colbg">
                  <center>
                      <input type="submit"  class="btn btn-default" value="Update"/> 
                  </center>
              </div>  
          </form>
      </div>
    </div>
    </div>  
    </div>
</div> 

<script>

  function toggle_password(target)
{
    var  tag= document.getElementById(target);
    var dv="show"+target;
    var tag2 = document.getElementById(dv);
    if (tag2.innerHTML == 'Show')
    {
            tag.setAttribute('type', 'text');   
            tag2.innerHTML = 'Hide';                                        
    } 
    else 
    {
            tag.setAttribute('type', 'password');   
            tag2.innerHTML = 'Show';
    }
}

  $.validator.addMethod("pwdcheck1", function(value) {
   return /^[A-Za-z0-9\d=!@#$%\^&*(){}[\]<>?/|\-_]*$/.test(value) // consists of only these
       && /[A-Z]/.test(value) // has a uppercase letter
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit   
       && /[!@#$%\^&*(){}[\]<>?/|\-_]/.test(value) // has a special charcter  
  }, "please enter the password combination of uppercase, lowercase, digit and special character");

$( "#invchangepasswordform" ).validate({
  rules: {

    new_password: {
        required:true,
        pwdcheck1:true
    },
    password_again: {
      equalTo: "#password"
    }
  },
  messages: {

    new_password: {
        required:"please enter the password combination of uppercase, lowercase, digit and special character"
    },
    password_again: {
      equalTo: "please enter password as same as the new password"
    }
  },
  errorPlacement: function(error, element) {  
      error.appendTo( element.parent().parent())
  },
  submitHandler: function() {
    disableSubmitButtons(this);
  },
});
</script>
@endsection
