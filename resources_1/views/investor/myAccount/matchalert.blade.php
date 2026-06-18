@extends('layout.master')
@section('wma')
class="selected"
@endsection
@section('content')
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
@include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
     		<h1 class="myhead marleft">Weekly Match Alert</h1>
            <div class="bor-radius backwhite marleft">
                <form class="form-horizontal formInv" name="form_investor" id="invmatchalertform" action="updatematchalert" method="POST"  role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="profile_id" value="{{session()->get('profileId')}}">
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
                        <div class="blinkline10"></div>
                        <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padtop0check">Weekly Match Alert
        				</label>
                        <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="row checkmargin">
                                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                    <label class="col-xs-4 col-sm-3 col-md-3"> <input type="radio" name="v" value="Enable" id=""> Enable </label>                       
                                    <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="v" id="" value="Disable" checked="checked">Disable</label>
                                </div>                     
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
@endsection
