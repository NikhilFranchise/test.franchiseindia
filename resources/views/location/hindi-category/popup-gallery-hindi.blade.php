<div class="modal fade lg-panel" id="catgalleryform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-content">
            <div class="modal-body">
                <div class="galleryform">
                    <div class="popgallery">
                        <div class="gallery" id="push-gallery">
                        </div>
                    </div>
                    <div class="popupform">
                        <div class="instback">
                            @if(Auth::check() && Auth::user()->profile_type == Config('constants.ProfileType.Investor'))
                                <div id="notApplied" style="display: none;">
                                    @if(!empty($checkData['message']))
                                        {{ $checkData['message'] }}
                                    @endif

                                    @if($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                        <input type="button" value="Submit Your Interest" id="expbtn" class="btn btn-default" />
                                    @endif
                                    <input type="hidden" name="id" id="expIntFranId" value="">
                                    <br>
                                    <div id="expbtnloading" style="display: none; text-align: center;">
                                        <label id="creditRemaining">कृपया प्रतीक्षा करें...</label><br>
                                        <div id="expintbutton" style = "display: none; ">
                                            <Input type="button" class="btn btn-default btn-red" id="proceedInterest" value="हाँ" >
                                            <Input type="button" class="btn btn-default btn-red" id="cancelinterest" value="रद्द करना" >
                                        </div>
                                    </div>

                                    <div class="insta-apply thankscs" id="expmsg" style="display:none;" >
                                        <div class="bigth">धन्यवाद!</div>
                                        <p><span class="popinfohead" id="companyContactinsta"></span></p>
                                        <p><strong>सीओ नाम: </strong><span id="ceocontactinsta"></span></p>
                                        <p><strong>टेलीफोन नंबर: </strong><span id="telephonecontactinsta"></span></p>
                                        <p><strong>पता: </strong><span id="addressocontactinsta"></span></p>
                                        <p><strong>मोबाइल: </strong><span id="mobilecontactinsta"></span></p>
                                        <p><strong>ईमेल: </strong><span id="emailcontactinsta"></span></p>
                                        <p><strong>वेबसाइट: </strong> <span id="websitecontactinsta"></span></p>
                                    </div>
                                    <div class="insta-apply thankscs" id="cancelExpress" style="display: none;">
                                        <div class="green"><div class="bigth">धन्यवाद!</div> <p>आपके आवेदन के लिए</p></div>
                                    </div>
                                </div>

                                <div id="alreadyApplied" style="display: none;">
                                    <div class="insta-apply thankscs">
                                        <div class="green"><div class="bigth">धन्यवाद!</div> <p>पहले से ही लागू</p></div>
                                    </div>
                                </div>
                            @endif

                            @if(!Auth::check() || Auth::user()->profile_type == Config('constants.ProfileType.Franchisor'))
                                <div class="insta-apply" id="show-m">
                                    <div class="ttl" id="instahead">इंस्टा आवेदन करें</div>

                                    <!-- New Application successful msg -->
                                    <div id="instaMsg" style="display:none;" class="green">
                                        <div class="bigth">धन्यवाद!</div>
                                        <p>आपकी रुचि दिखाने के लिए धन्यवाद .</p>
                                        <p>आपका संपर्क विवरण कंपनी के साथ साझा किया गया है। आपको अपने निवेशक प्रोफाइल बनाने और ब्रांड से सीधे संपर्क करने के लिए अपग्रेड करने का अनुरोध किया है.</p>
                                    </div>
                                    <!-- New Application successful msg End -->

                                    <!-- Application Already Applied Msg -->
                                    <div id="existsMsg" style="display:none;" class="green">
                                        <div class="bigth">धन्यवाद!</div>
                                        <p> आपकी रुचि दिखाने के लिए धन्यवाद .</p>
                                        <p> लेकिन आप पहले ही आवेदन कर चुके हैं .</p>
                                    </div>
                                    <!-- Application Already Applied Msg End -->

                                    <div class="frm-sec" id="instaForm">
                                        <form id="insta" action="{{ url('brandcontactinfo') }}" method="post" name="insta">
                                            <input type="hidden" name="frandetailsid" id="franId" value="">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="infoname" placeholder="नाम दर्ज">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control check-existing-registered-investor" name="infoemail" placeholder="ईमेल दर्ज करें">
                                            </div>
                                            <div class="form-group" style="position: relative;">
                                                <input type="text" class="form-control" name="mobile" id='txtPhone' placeholder="मोबाइल नंबर दर्ज करें" maxlength="10" class="trrr" autocomplete="off" onkeyup="getMobileStatus(this.value);"/>
                                                <input class="verif-submitbtn" id="verifybutton" value="Verify" type="button" onclick="veryfie()">
                                                <input class="verif-submitbtn" id="editmobile" value="Edit"  type="button" onclick="editmobileinsta();" style="display: none">
                                            </div>
                                            <div class="form-group" id="otpblk" style="display:none;">
                                                <input type="text" id="otp" class="form-control" placeholder="एक बार इस्तेमाल किये जाने वाला पासवर्ड"/>
                                                <input class="verif-submitbtn" id="submit" value="सत्यापित करें" type="button" onclick="checkinstaotp()">
                                                <span id="mobcat"></span>
                                            </div>
                                            <div class="form-group" id="otpblk1" style="display:none; color:red;">
                                                ओटीपी मेलसमूह ..!
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="state" name="infostate" onchange="getcityinfoinsta(this.value)">
                                                    <option value>राज्य चुनें</option>
                                                    @php
                                                        $stateArrVal = Config('location.stateArr');
                                                        asort($stateArrVal);
                                                        foreach ($stateArrVal as $key => $value) {
                                                            echo "<option value='$key'>$value</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="infocity" id="city">
                                                    <option value="">शहर चुनें</option>
                                                </select>
                                            </div
                                            >
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="pincode" placeholder="पिनकोड दर्ज करें" id="pincode" maxlength="6"/>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="address" placeholder="पता लिखिए" rows="3" id="address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="investment_range_gallery" name="investment_range">
                                                    <option value="">निवेश सीमा का चयन करें</option>
                                                    @foreach(Config('constants.investRangeInWords') as $index => $value)
                                                        <option value="{{ $index }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="expressnewslettern" checked> हां, मैं साप्ताहिक के लिए सदस्यता लेना चाहता हूं समाचार पत्रिका
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label><input type="checkbox" name="need_loan">संपत्ति के खिलाफ ऋण?</label>
                                            </div>

                                            <div class="submit-btn" id="sub">
                                                <input type="submit" id="btninsta" class="btn btn-default btn-red" value="अभी अप्लाई करें" />
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        <!-- Insta Apply section end here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('js/vit-gallery.js') }}"></script>