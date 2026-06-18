<div class="modal fade lg-panel" id="modalGetFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="freeinfoform" method="post" action="{{ Config('constants.MainDomain') }}/getfreeinfo">
                @csrf
                <input type="hidden" name="frandetailsid" id="freeinfovalue" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">You have requested information For Brands</h4>
                </div>
                <div class="modal-body">
                    <div class="business-list">
                        <div class="row" id="companyblockrequest">
                        </div>
                    </div>
                    <div class="requested-frm">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="infoname" id="infoname" class="form-control" placeholder="Enter Name" required>
                                    <input type="hidden" name="lasturl" value="{{ url()->current() }}">
                                    <span class=""></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="infostate" required onchange="getcityinfo(this.value)" id="statesforinfo">
                                        <option value="">Select State</option>
                                        @foreach(Config('location.stateArr') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control check-existing-registered-investor" placeholder="Enter E-mail" required name="infoemail">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="infocity" required id="getinfocity">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group pos-rel">
                                    <input name="mobile" id="mobile" type="text" pattern="[0-9]{5,10}" minlength="10" maxlength="10" onkeyup="getMobileStatuscontact(this.value);" onkeypress="return isNumberKey(event);" class="form-control" placeholder="Enter Mobile" required>
                                    <span class="vrfy" onClick="editmobile();" id="editmobilecontact" style="display: none;">EDIT</span>
                                    <span class="vrfy" onClick="validatemobile();" id="validatemobile" style="display: none">VERIFY</span>
                                    <span id="successmobile" class="showhideright" style="display: none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                                    <input type="hidden" id="mobileStatus" name="mobileStatus" value="0">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none;" id="otpblock">
                                <div class="form-group pos-rel">
                                    <input id="otpcontact" type="text" class="form-control" maxlength="4" placeholder="Enter OTP">
                                    <span class="vrfy" id="verify_button" onclick="verify()">VERIFY</span>
                                    <span style="display: none; color:red; font-size:12px;" id="mismatch">OTP Mismatch</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode" required pattern="[0-9]{5,6}" minlength="6" maxlength="6">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="newsletter_sub" checked value="1">Yes, I want to subscribe for weekly Newsletter</label>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group txt-center">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="need_loan">Need loan against property?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer txt-center">
                    <button type="submit" class="btn btn-default btn-red" id="contactsubmit" disabled>Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="clear:both"></div>
