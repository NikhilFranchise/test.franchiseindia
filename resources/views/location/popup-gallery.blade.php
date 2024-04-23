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
                                    <input type="button" value="Submit Your Interest" id="expbtn" class="btn btn-default" />
                                    <input type="hidden" name="id" id="expIntFranId" value="">
                                    <br>
                                    <div id="expbtnloading" style="display: none;" >Please Wait...</div>
                                    <label id="creditRemaining"></label><br>
                                    <div id="expintbutton" style = "display: none; ">
                                        <Input type="button" class="btn btn-default btn-red" id="proceedInterest" value="Yes" />
                                        <Input type="button" class="btn btn-default btn-red" id="cancelinterest" value="Cancel" />
                                    </div>
                                </div>
                                <div class="insta-apply thankscs" id="expmsg" style="display:none;" >
                                    <div>
                                        <div class="bigth">Thank You!</div>
                                        <p><span class="popinfohead" id="companyContactinsta"></span></p>
                                        <p><strong>Ceo Name: </strong><span id="ceocontactinsta"></span></p>
                                        <p><strong>Tel No: </strong><span id="telephonecontactinsta"></span></p>
                                        <p><strong>Address: </strong><span id="addressocontactinsta"></span></p>
                                        <p><strong>Mobile: </strong><span id="mobilecontactinsta"></span></p>
                                        <p><strong>Email: </strong><span id="emailcontactinsta"></span></p>
                                        <p><strong>Website: </strong> <span id="websitecontactinsta"></span></p>
                                    </div>
                                </div>
                                <div class="insta-apply thankscs" id="cancelExpress" style="display: none;">
                                    <div class="green"><div class="bigth">Thank You!</div> <p>For your application</p></div>
                                </div>

                        </div>

                        <div id="alreadyApplied" style="display: none;">
                            <div class="insta-apply thankscs">
                                <div class="green"><div class="bigth">Thank You!</div> <p>Already Applied</p></div>
                            </div>
                        </div>
                        @endif

                        @if(!Auth::check() || Auth::user()->profile_type == Config('constants.ProfileType.Franchisor'))
                            <div class="insta-apply" id="show-m">
                                <div class="ttl" id="instahead">Insta Apply</div>

                                <!-- New Application successful msg -->
                                <div id="instaMsg" style="display:none;" class="green">
                                    <div class="bigth">Thank You!</div>
                                    <p>Thanks for showing your interest in .</p>
                                    <p> Your contact detail has been shared with the company. requested you to create your investor profile and upgrade to directly contact the brand.</p>
                                </div>
                                <!-- New Application successful msg End -->

                                <!-- Application Already Applied Msg -->
                                <div id="existsMsg" style="display:none;" class="green">
                                    <div class="bigth">Thank You!</div>
                                    <p> Thanks for showing your interest in .</p>
                                    <p> But you have already applied for .</p>
                                </div>
                                <!-- Application Already Applied Msg End -->

                                <div class="frm-sec" id="instaForm">
                                    <form id="insta" action="{{ url('brandcontactinfo') }}" method="post" name="insta">
                                        <input type="hidden" name="frandetailsid" id="franId" value="">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="infoname" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control check-existing-registered-investor" id="newemail" name="infoemail" placeholder="Enter email">
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <input type="text" name="mobile" id='txtPhone' class="form-control" placeholder="Enter Mobile No" maxlength="10" autocomplete="off" onkeyup="getMobileStatus(this.value);"/>
                                            <input class="verif-submitbtn" id="verifybutton" value="Verify" type="button" onclick="veryfie()">
                                            <input class="verif-submitbtn" id="editmobile" value="Edit" type="button" onclick="editmobileinsta();" style="display: none">
                                        </div>
                                        <div class="form-group" id="otpblk" style="display:none;">
                                            <input type="text" id="otp" class="form-control" placeholder="one time password"/>
                                            <input class="verif-submitbtn" id="submit" value="verify" type="button" onclick="checkinstaotp()">
                                            <span id="mobcat"></span>
                                        </div>
                                        <div class="form-group" id="otpblk1" style="display:none; color:red;">
                                            OTP mismatch..!
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="state" name="infostate" onchange="getcityinfoinsta(this.value)">
                                                <option value>select state</option>
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
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="6"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="address" placeholder="Enter Address" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" id="investment_range_gallery" name="investment_range">
                                                <option value="">Select Investment Range</option>
                                                @foreach(Config('constants.investRangeInWords') as $index => $value)l
                                                <option value="{{ $index }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="newsletter_sub" checked> Yes, I want to subscribe for weekly Newsletter
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label><input type="checkbox" name="need_loan">Need loan against property?</label>
                                        </div>

                                        <div class="submit-btn" id="sub">
                                            <input type="submit" id="btninsta" class="btn btn-default btn-red" value="Apply Now">
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

<script src="{{url('js/vit-gallery.js')}}"></script>
