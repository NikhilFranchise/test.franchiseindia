
<div class="col-xs-12 col-sm-3 col-md-3 mdy-width">
    <div class="ph-pnl formsection">
        <div class="ph-img"><img src="{{url('images/ph.jpg')}}" alt="phone" /></div>

        <div class="frm-sec">
            <div id="askMsg" style="display:none;">
                <div class="green">
                    {{ (Request::segment(1) == 'hi') ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                </div>
            </div>
            <div class="frm-container" id="askForm">
                <form id="homepage" name="homepage" method="post">
                    <h2 class="ttl">{{ (Request::segment(1) == 'hi') ? 'नि: शुल्क सलाह - हमारे विशेषज्ञों से पूछें' : 'Free Advice - Ask Our Experts1' }}</h2>
                    <div id="errMsg" style="display:none;"><font color="red"> {{ (Request::segment(1) == 'hi') ? 'कृपया एक विकल्प चुनें ..!' : 'Please select one option..!' }} </font></div>
                    <div class="frm-type">
                        <div class="radio">
                            <label><input type="radio" name="optionsRadios" id="optionsRadios3" checked value="franchisor"> {{ (Request::segment(1) == 'hi') ? 'मेरा ब्रांड विस्तृत करें' : 'Expand My Brand' }} </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optionsRadios" id="optionsRadios1"  value="investor"> {{ (Request::segment(1) == 'hi') ? 'एक फ्रेंचाइजी खरीदें' : 'Buy a Franchise' }}</label>
                        </div>

                    </div>
                    <div class="frm-input">
                        <div class="input-group">
                            <span class="input-group-addon"><div class="usersprite"></div></span>
                            <input type="text" class="form-control" name="namefreeadvice" id="namefreeadvice" placeholder="{{ (Request::segment(1) == 'hi') ? 'नाम दर्ज करें' : 'Enter Name' }}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><div class="emailsprite"></div></span>
                            <input type="text" name="emailfreeadvice" id="emailfreeadvice" class="form-control" placeholder="{{ (Request::segment(1) == 'hi') ? 'ईमेल दर्ज करें' : 'Enter Email' }}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><div class="usersprite"></div></span>
                            <input type="text" class="form-control" maxlength="10" name="mobilefreeadvice" id="mobilefreeadvice" placeholder="{{ (Request::segment(1) == 'hi') ? 'मोबाइल दर्ज करें' : 'Enter Mobile No' }}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ Config('constants.MainDomain') }}/images/pincode.png" alt="pincode" /></span>
                            <input type="text" name="pincodefreeadvice" id="pincodefreeadvice" class="form-control" maxlength="6" placeholder="{{ (Request::segment(1) == 'hi') ? 'पिनकोड दर्ज करें' : 'Enter Pincode' }}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon height80"><div class="addreesssprite"></div></span>
                            <textarea class="form-control height80" name="detailsfreeadvice" id="detailsfreeadvice" placeholder="{{ (Request::segment(1) == 'hi') ? 'विवरण दर्ज करें' : 'Enter Details' }}"></textarea>
                        </div>
                        <div class="checkbox rm-prop">
                            <label>
                                <input type="checkbox" name="is_newsletterfreeadvice" id="is_newsletterfreeadvice" value="1" checked> {{ (Request::segment(1) == 'hi') ? 'हां, मैं साप्ताहिक समाचार पत्रिका के लिए सदस्यता लेना चाहता हूं' : 'Yes, I want to subscribe for weekly Newsletter' }}
                            </label>
                        </div>
                        <div class="checkbox rm-prop">
                            <label>
                                <input type="checkbox" name="is_termsagree" id="is_termsagree" value="1" checked>
                                @if (Request::segment(1) == 'hi')
                                    I have one record!

                                @else
                                    I agree to the <a href="{{Config('constants.MainDomain')}}/terms" target="_blank">Terms & Conditions</a>
                                @endif
                            </label>
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                <input type="submit" id="btnhome" class="btn btn-default btn-red" value="{{ (Request::segment(1) == 'hi') ? 'हमारे विशेषज्ञों से पूछें' : 'Ask Our Experts' }}" >
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
    $(function() {
        $('#btnhome').prop('disabled', false);
        $('#is_termsagree').click(function() {
            if ($('#is_termsagree').is(':checked')) {
                $('#btnhome').prop('disabled', false);
            }
            else {
                $('#btnhome').prop('disabled', true);
            }
        })
    })
</script>