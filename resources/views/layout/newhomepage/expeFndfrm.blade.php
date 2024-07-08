<!-- Login/ Registration Model -->
@if (request()->segment(1) == 'hi')
    <div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frm-sec">
                        <div id="askMsg" style="display:none;">
                            <div class="green">
                                मुफ्त सलाह के लिए जानकारी प्रस्तुत करने के लिए धन्यवाद!!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">
                            <form id="homepage" name="homepage" method="post">
                                <h2 class="ttl">मुफ्त सलाह - हमारे विशेषज्ञों से पूछें</h2>
                                <div id="errMsg1" style="display:none;">
                                    <font color="red"> कृपया फॉर्म भरे! </font>
                                </div>
                                <div class="frm-type">
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                                checked="" value="franchisor"> मेरा ब्रांड का विस्तार करें </label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                                value="investor"> एक फ्रैंचाइज़ खरीदें</label>
                                    </div>

                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" name="namefreeadvice1"
                                            id="namefreeadvice1" placeholder="नाम दर्ज करें" required="required">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="ईमेल दर्ज करें" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1"
                                            placeholder="मोबाइल नंबर दर्ज करें" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="पिनकोड दर्ज करें">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="विवरण दर्ज करें"></textarea>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice1"
                                                id="is_newsletterfreeadvice1" value="1" checked=""> हां, मैं
                                            साप्ताहिक न्यूज़लेटर का ग्राहक बनना चाहूंगा
                                        </label>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                                value="1" checked="">
                                            मैं सहमत हुॅं <a href="https://www.franchiseindia.com/terms"
                                                target="_blank">नियमों और शर्तों से</a>
                                        </label>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                                value="हमारे विशेषज्ञों से पूछें">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@else
    <div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frm-sec">
                        <div id="askMsg" style="display:none;">
                            <div class="green">
                                Thank You for Submitting information for Free Advice!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">
                            <form id="homepage" name="homepage" method="post">
                                <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                                <div id="errMsg1" style="display:none;">
                                    <font color="red"> Please Fill The form! </font>
                                </div>
                                <div class="frm-type">
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                                checked="" value="franchisor"> Expand My Brand </label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                                value="investor"> Buy a Franchise</label>
                                    </div>

                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" name="namefreeadvice1"
                                            id="namefreeadvice1" placeholder="Enter Name" required="required">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="Enter Email" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1"
                                            placeholder="Enter Mobile No" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="Enter Details"></textarea>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice1"
                                                id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i
                                            want to subscribe for weekly Newsletter
                                        </label>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                                value="1" checked="">
                                            I agree to the <a href="https://www.franchiseindia.com/terms"
                                                target="_blank">Terms &amp; Conditions</a>
                                        </label>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                                value="Ask Our Experts">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endif
<!-- Login/ Registration Model End-->
