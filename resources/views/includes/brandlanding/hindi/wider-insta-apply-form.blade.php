<div class="tab-section frmwider">
    <form method="post" id="wider-insta-form" action="{{ url('brandcontactinfo') }}">
        @csrf
        <input type="hidden" name="frandetailsid" value="{{$franDetails->franchisor_id}}">
        <p>उपरोक्त ब्रांड में रुचि रखते हैं? अपनी रुचि यहां जमा करें।</p>
        <div class="modal-body popcentreq">
            <div class="requested-frm">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="infoname" class="form-control" placeholder="नाम दर्ज">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select class="form-control blur" name="infostate" onchange="getCityWiderInsta(this.value)">
                                <option value="">राज्य चुनें</option>
                                @php
                                    $states = array_unique(array_column($stateList, 'state'));
                                    if (count($states) > 0) {
                                    foreach ($states as $state) {
                                        $key = 0;
                                        $array = Config('location.stateArr');
                                        while ($arrayState = current($array)) {
                                            if ($arrayState == $state) {
                                                $key = key($array);
                                            }
                                            next($array);
                                        }
                                        echo "<option value='$key'>$state</option>";
                                    }
                                    } else {
                                        $stateArrVal = Config('location.stateArr');
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
                            <input type="email" name="infoemail" class="form-control check-existing-registered-investor" placeholder="ईमेल दर्ज करें">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select class="form-control blur" id="city-wider" name="infocity">
                                <option value="">शहर चुनें</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            {{-- <input name="mobile" id="mobile-wider" type="text" pattern="[0-9]{5,10}" minlength="10" maxlength="10" onkeyup="getMobileStatusWider(this.value)" class="form-control blur" placeholder="मोबाइल दर्ज करें">
                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider" style="display:none">संपादित करें</span>
                            <span class="vrfy" onclick="validateMobileWider()" id="validate-mobile-contact" style="display:none">सत्यापित करें</span>
                            <span id="success-mobile-wider" class="showhideright" style="display:none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span> --}}
                            \\192.168.2.157\htdocs\franchiseindia.com\resources\views\includes\brandlanding\hindi\wider-insta-apply-form.blade.php
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control blur" name="address" placeholder="पता लिखिए">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6" style="display:none" id="otp-block-wider">
                        <div class="form-group pos-rel">
                            <input id="otp-insta-wider" type="text" class="form-control" maxlength="4" placeholder="OTP दर्ज करें">
                            <span class="vrfy" id="verify_button_wider" style="display:block" onclick="verifyWiderOTP()">VERIFY</span>
                        </div>
                        <div style="display:none" id="mismatch-wider">ओटीपी मिसमैच</div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            <input type="text" class="form-control" name="pincode" pattern="[0-9]{5,6}" minlength="6" maxlength="6" placeholder="पिनकोड दर्ज करें">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group pos-rel">
                            <select class="form-control" name="investment_range">
                                <option value="">निवेश सीमा का चयन करें</option>
                                @foreach(Config('constants.investRangeInWords') as $index => $value)
                                    <option value="{{ $index }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group txt-center">
                            <div class="checkbox">
                                <label><input type="checkbox" name="newsletter_sub" checked>हां, मैं साप्ताहिक न्यूज़लेटर का ग्राहक बनना चाहूंगा</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group txt-center">
                            <div class="checkbox">
                                <label><input type="checkbox" name="need_loan">संपत्ति के खिलाफ ऋण?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer txt-center">
            <button type="submit" class="btn btn-default btn-red" id="success-mobile-wider">अनुरोध प्रस्तुत करें</button>
        </div>
    </form>
</div>