@extends('layout.master')
@section('content')
<script>
$( document ).ready(function() {
    console.log( "ready!" );
    $('#paymentbtn').click();
});
</script>
<!--form start here -->
        <form class="form-horizontal" name="franform" id="paymentForm" method="post" action="{{Config::get('constants.MainDomain')}}/franpaymentsubmit" style="display:none">
            <input type="hidden" name="name"  value="{{$name}}">
            <input type="hidden" name="mobile"  value="{{$phone}}">
            <input type="hidden" name="email"  value="{{$email}}">
            <input type="hidden" name="country"  value="{{$country}}">
            <input type="hidden" name="address"  value="{{$address}}">
            <input type="hidden" name="details"  value="{{$detail}}">
            <input type="hidden" name="camount"  value="{{$amount}}">
            <input type="hidden" name="tranId"  value="{{$tranId}}">
            <input type="hidden" name="mopt"  value="{{$mopt}}">
            <center>
                <input type="submit" class="btn btn-default" id="paymentbtn"/>
            </center>
        </form> 
<!--form end here -->
@endsection
