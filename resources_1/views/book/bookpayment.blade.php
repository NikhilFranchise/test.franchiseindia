@extends('layout.master')
@section('content')
    <style type="text/css">#bookform-payment_mode ul{margin-top:20px;margin-left:20px}#bookform-payment_mode ul li{display:inline-block}</style>
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"><h1>{{$book}} </h1>
                <p><br/><br/></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 row-no-padding">
            <form class="form-horizontal" id="paymentFormbook" method="post" action="{{ url('bookpaymentsubmit') }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="bookid" value="{{$book}}">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="user franchise india" src="{{url('images/user.png')}}"></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" maxlength="30">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="mobile franchise india" src="{{url('images/mobile.png')}}"></span>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="email franchise india" src="{{url('images/email.png')}}"></span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter  Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="city franchise india" src="{{url('images/city.png')}}"></span>
                            <input type="text" class="form-control" id="city" minlength="3" name="city" placeholder="Enter City">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Company Name
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="company franchise india" src="{{url('images/company.png')}}"></span>
                            <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Enter company name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="state franchise india" src="{{url('images/state.png')}}"></span>
                            <input type="text" class="form-control" minlength="3" id="state" name="state" placeholder="Enter State">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="country franchise india" src="{{url('images/country.png')}}"></span>
                            <input type="text" name="country" id="country" class="form-control" value="India" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img alt="address franchise india" src="{{url('images/addreess.png')}}"></span>
                            <textarea class="form-control height100" id="address" name="address" placeholder="Enter Your Addreess" maxlength="50"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pincode" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img alt="pincode franchise india" src="{{url('images/pincode.png')}}"></span>
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" maxlength="6">
                        </div>
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="amount" class="col-xs-12 col-sm-4 com4mod control-label mandatory">Total Amount</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6 padtop20">
                        <input type="number" class="form-control" id="amount" name="amount" maxlength="6" value="{{str_replace('Rs ','',$price)}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-xs-12 col-sm-4 com4mod control-label mandatory">Payment mode</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6 padtop20">
                        <select name="payment_mode" id="payment_mode" class="form-control">
                            <option value="OPTCRDC">Mode Of Payment</option>
                            <option value="OPTCRDC">Credit Card</option>
                            <option value="OPTDBCRD">Debit Card</option>
                            <option value="CHEQUE">Cheque</option>
                            <option value="OPTNBK">Net Banking</option>
                        </select>
                    </div>
                </div>

                <div style="text-align: center;">
                    <input type="submit" class="btn btn-default" id="paymentbtn" value="Pay Now"/>
                </div>
            </form>
        </div>
    </div>
    <div class="height40"></div>
    <script type="text/javascript">$(document).ready(function(){$('input[title!=""]').hint();$('textarea[title!=""]').hint();$('select[title!=""]').hint();$("#paymentFormbook").validate({rules:{name:{required:true,accept:"[a-zA-Zs]+",minlength:3,maxlength:35},email:{required:true,email:true},state:{required:true},city:{required:true},mobile:{required:true,accept:"[0-9]",minlength:10,maxlength:10,number:true},pincode:{required:true,accept:"[0-9]",minlength:6,maxlength:6,number:true},details:{required:true,minlength:3,maxlength:255},country:"required",ammount:{required:true,accept:"[0-9]",minlength:1,maxlength:8,number:true},address:{required:true,minlength:3,maxlength:255}},messages:{name:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format("")},email:{required:"",email:""},mobile:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format(""),number:""},pincode:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format(""),number:""},details:{required:"",minlength:jQuery.format(""),maxlength:jQuery.format("")},state:{required:""},city:{required:""},country:"",ammount:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format(""),number:""},address:{required:"",minlength:jQuery.format(""),maxlength:jQuery.format("")}}})});</script>
@endsection