<div class="modal fade lg-panel" id="modalGetFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ Config('constants.MainDomain')}}/getfreeinfo">
                <input type="hidden" name="frandetailsid" id="freeinfovalue" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">आपने ब्रांड्स के लिए जानकारी का अनुरोध किया है</h4>
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
                                    <input type="text" name="infoname" class="form-control" placeholder="नाम दर्ज" required>
                                    <input type="hidden" name="lasturl" value="{{ url()->current() }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="infostate" required onchange="getcityinfo(this.value)" id="statesforinfo" title="state">
                                        <option value="">राज्य चुनें</option>
                                        @foreach(Config('location.stateArr') as $key => $value)
                                            <option value="{{$key}}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control check-existing-registered-investor" placeholder="ईमेल दर्ज करें" required name="infoemail">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="infocity" required id="getinfocity" title="city">
                                        <option value="">शहर चुनें</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group pos-rel">
                                    <input name="mobile" id="mobile" type="text" pattern="[0-9]{5,10}" minlength="10" maxlength="10" onkeyup="getMobileStatuscontact(this.value);" class="form-control" placeholder="मोबाइल दर्ज करें" required>
                                    <span class="vrfy" onClick="editmobile();" id="editmobilecontact" style="display: none;">संपादित करें</span>
                                    <span class="vrfy" onClick="validatemobile();" id="validatemobile" style="display: none">सत्यापित करें</span>
                                    <span id="successmobile" class="showhideright" style="display: none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="पता लिखिए" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none;" id="otpblock">
                                <div class="form-group pos-rel">
                                    <input id="otpcontact" type="text" class="form-control" maxlength="4" placeholder="ओटीपी दर्ज करें">
                                    <span class="vrfy" id="verify_button" onclick="verify()">सत्यापित करें</span>
                                </div>
                                <div style="display: none; color:red;" id="mismatch">ओटीपी मिस्चैच</div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pincode" placeholder="पिनकोड दर्ज करें" required pattern="[0-9]{5,6}" minlength="6" maxlength="6">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <select class="form-control" name="investment_range" required>
                                    <option value="">निवेश सीमा का चयन करें</option>
                                    @foreach(Config('constants.investRangeInWords') as $index => $value)
                                        <option value="{{ $index }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="newsletter_sub" checked value="1">हां, मैं साप्ताहिक न्यूज़लेटर का ग्राहक बनना चाहूंगा</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="need_loan">संपत्ति के खिलाफ ऋण?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer txt-center">
                    <button type="submit" class="btn btn-default btn-red" id="contactsubmit">अनुरोध प्रस्तुत करें</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="clear:both"></div>