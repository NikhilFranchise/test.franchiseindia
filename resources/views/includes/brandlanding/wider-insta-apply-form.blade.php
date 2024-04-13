<div class="tab-section frmwider">
    <form method="post" id="wider-insta-form" action="{{ url('brandcontactinfo') }}">
        <input type="hidden" name="frandetailsid" value="{{$franDetails->franchisor_id}}">
        <p>Interested in {{$franDetails->company_name}} Franchise? Apply here</p>
        <div class="modal-body popcentreq">
            <div class="requested-frm">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="infoname" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select class="form-control blur" name="infostate" onchange="getCityWiderInsta(this.value)">
                                <option value="">Select State for Franchise</option>
                                @php
                                $stateArrVal = Config('location.stateArr');
                            
                                if (is_array($stateList) && count($stateList) > 0) {
                                    $states = array_unique(array_column($stateList, 'state'));
                                    foreach ($states as $state) {
                                        $key = array_search($state, $stateArrVal);
                                        if ($key !== false) {
                                            echo "<option value='$key'>$state</option>";
                                        }
                                    }
                                } else {
                                    asort($stateArrVal);
                                    foreach ($stateArrVal as $key => $value) {
                                        echo "<option value='$key'>$value</option>";
                                    }
                                }
                            @endphp
                            
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="email" name="infoemail" class="form-control check-existing-registered-investor" placeholder="Enter E-mail">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select class="form-control blur" id="city-wider" name="infocity">
                                <option value="">Select City for Franchise</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            <input name="mobile" id="mobile-wider" type="text" pattern="[0-9]{5,10}" minlength="10" maxlength="10" onkeyup="getMobileStatusWider(this.value)" class="form-control blur" placeholder="Enter Mobile">
                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider" style="display:none">edit</span>
                            <span class="vrfy" onclick="validateMobileWider()" id="validate-mobile-contact" style="display:none">VERIFY</span>
                            <span id="success-mobile-wider" class="showhideright" style="display:none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control blur" name="address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" style="display:none" id="otp-block-wider">
                        <div class="form-group pos-rel">
                            <input id="otp-insta-wider" type="text" class="form-control" maxlength="4" placeholder="Enter OTP">
                            <span class="vrfy" id="verify_button_wider" style="display:block" onclick="verifyWiderOTP()">VERIFY</span>
                        </div>
                        <div style="display:none" id="mismatch-wider">OTP Mismatch</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            <input type="text" class="form-control" name="pincode" pattern="[0-9]{5,6}" minlength="6" maxlength="6" placeholder="Enter Pincode">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            <select class="form-control" name="investment_range">
                                <option value="">Select Investment Range</option>
                                @foreach(Config('constants.investRangeInWords') as $index => $value)
                                   @if($franDetails->franchisor_id == 'FIHL456617')
                                        @if($index == 5)
                                            <option value="{{ $index }}">{{ $value }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $index }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group txt-center">
                            <div class="checkbox">
                                <label><input type="checkbox" name="newsletter_sub" checked>Yes, I want to subscribe for weekly Newsletter</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group txt-center">
                            <div class="checkbox">
                                <label><input type="checkbox" name="is_termsagree2"  id="is_termsagree2" checked required="required">I agree to the <a href="{{Config('constants.MainDomain')}}/terms" target="_blank">Terms & Conditions</a></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer txt-center">
         <input type="submit" class="btn btn-default btn-red" id="wider-submit-button" value="Submit Request" style="float: none;">
		 </div>
    </form>
</div>

<!--<div  class="loantxt"><a target="_blank" href="{{Config('constants.MainDomain')}}/property-loan"  >Loan Against Property </a></div>-->
<style type="text/css">
.loantxt {border-top:1px solid #dfdfdf; margin-top: 20px; text-align:center; padding-top: 10px; clear: both;} .loantxt a {color:#e62005;} .loantxt a:hover{ text-decoration: underline;}
</style>
<script type="text/javascript">
    $(function() {

        //$('#success-mobile-wider').attr('disabled', true);
        $('#is_termsagree2').click(function() {

            if ($('#is_termsagree2').is(':checked')) {
                $('#success-mobile-wider').attr('disabled', false);
            }
            else {
                $('#success-mobile-wider').attr('disabled', true);
            }
        })
    })
</script>