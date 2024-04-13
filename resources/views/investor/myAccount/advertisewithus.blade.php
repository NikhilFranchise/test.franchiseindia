@extends('layout.master')
@section('AWU')
class="selected"
@endsection
@section('content')
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
        @include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
 		<h1 class="myhead marleft">Advertise With us</h1>
        <div class="bor-radius backwhite marleft">
	        <div class="col-xs-12 pad30 showbg">  
		      <br/>
		        <strong>Mobile /</strong> <a href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg" class="sts"></a>: + 91 (0) 9312650021<br />
		        <strong>Email:</strong> <a href="mailto:advertise@franchiseindia.com">advertise@franchiseindia.com</a><br/> <br/>

           <br/>
                <strong>Email:</strong> <a href="mailto:bos@franchiseindia.com">bos@franchiseindia.com</a><br/>
	        </div>    
	        <div class="clearfix"></div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
