i<style type="text/css">
    .modal.brandpopup { text-align: center; padding: 0 !important; }
    .modal.brandpopup:before { content: ''; display: inline-block; height: 100%; vertical-align: middle; margin-right: -4px; }
    .modal.brandpopup .modal-dialog { display: inline-block; vertical-align: middle; width: 400px; padding-bottom: 20px; }
    .modal.brandpopup .modal-content { padding: 10px; }
    .popbrand { font-family: "Open Sans Bold", "serif"; font-size: 17px; line-height: 22px; color: #333; text-transform: uppercase; margin-bottom: 0; padding-bottom: 15px; }
    .popbrand span { display: block; color: #666; font-family: "Open Sans Light", "serif"; text-transform: capitalize; line-height: 20px; font-size: 15px; }
    .modal.brandpopup .btn-default.btn-red { font-family: "Open Sans Regular", "serif"; font-size: 16px; font-weight: 400; text-transform: uppercase; }
    .popback { background: #f7f7f7; padding: 10px; margin-bottom: 20px; border: 1px solid #dfdfdf; }
    .popbackblk { font-family: "Open Sans Bold", "serif"; color: #333; font-size: 15px; text-align: left; }
    .popbackblk span { font-family: "Open Sans Regular", "serif"; text-align: right; float: right; }
    #leadPopupSuccessButton { margin: 10px; }
    #successMobileBrandLeadPopup { position: absolute; right: 7px; top: 7px; }
    @media only screen and (min-width: 320px) and (max-width: 479px) {
        .modal.brandpopup .modal-dialog { width: 96%; margin: 0 auto; }
        .modal.brandpopup .modal-content { padding-bottom: 5px; }
        .popbackblk { font-size: 12px; }
    }
</style>

<!--brand pop section start here -->
<div id="brandpopup" class="modal brandpopup" aria-hidden="true" tabindex="-1" role="dialog" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popbrand">{{$franDetails->company_name}}
                    <span>{{Config('constants.subSubCategoryArr.'.$franDetails->ind_cat.'.'.$franDetails->ind_sub_cat)}}</span>
                </div>
                @php
                // Safely handle property area
                $area = '-N/A-'; // Default value
                if (!empty($franDetails->prop_area_min)) {
                    if (!empty($franDetails->prop_area_max)) {
                        $area = $franDetails->prop_area_min . ' - ' . $franDetails->prop_area_max . ' Sq.ft';
                    } else {
                        $area = $franDetails->prop_area_min . ' Sq.ft';
                    }
                }
            
                // Initialize and validate min and max investment values
                $minValue = is_numeric($franDetails->unit_inv_min) ? $franDetails->unit_inv_min : 0;
                $maxValue = is_numeric($franDetails->unit_inv_max) ? $franDetails->unit_inv_max : 0;
            
                // Format min value
                if ($minValue >= 10000 && $minValue < 100000) {
                    $minValue = number_format($minValue / 1000, 2) . ' K';
                } elseif ($minValue >= 100000 && $minValue <= 9999999) {
                    $minValue = number_format($minValue / 100000, 2) . ' Lac';
                } elseif ($minValue > 9999999) {
                    $minValue = number_format($minValue / 10000000, 2) . ' Cr';
                }
            
                // Format max value
                if ($maxValue >= 10000 && $maxValue < 100000) {
                    $maxValue = number_format($maxValue / 1000, 2) . ' K';
                } elseif ($maxValue >= 100000 && $maxValue <= 9999999) {
                    $maxValue = number_format($maxValue / 100000, 2) . ' Lac';
                } elseif ($maxValue > 9999999) {
                    $maxValue = number_format($maxValue / 10000000, 2) . ' Cr';
                }
            @endphp
            

                <div class="popback">
                    <div class="popbackblk">Area Req <span>{{ $area }}</span></div>
                    <div class="popbackblk">Investment Range <span> INR {{ $minValue  }} - {{ $maxValue }} </span></div>
                    <div class="popbackblk">Franchise Outlets <span>{{$franDetails->no_fran_outlets ?: '- NA -'}}</span>
                    </div>
                </div>


                <div class="frm-sec">
                    <form id="pleaseWaitBlock" style="display: none;">
                        <div class="exitfdkblk">
                            <div class="exitheading">Please Wait....</div>
                        </div>
                    </form>
                    <form id="pleaseWaitBlockResult" style="display: none;">
                        <div class="exitfdkblk">
                            <div class="exitheading">
                                <span id="finalLeadPopupResult" ></span>
                            </div>
                            <div class="exitheading">
                                <a href="{{ url()->current() }}" class="btn btn-success" id="leadPopupSuccessButton">See Brand Complete Info</a>
                            </div>
                        </div>
                    </form>
                    <form id="instaLeadPopup" method="post" name="insta_lead_popup">
                        <input type="hidden" name="frandetailsid" value="{{$franDetails->franchisor_id}}">
                        <input type="hidden" name="check_lead_popup" value="lead">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control blur" name="infoname" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control blur" name="infoemail" placeholder="Enter email">
                        </div>
                        <div class="form-group" style="position: relative;">
                            <input type="text" id="mobileBrandLeadPopup" class="form-control blur" name="mobile" placeholder="Enter Mobile No" pattern="[789][0-9]{9}" maxlength="10" autocomplete="off" onkeyup="getMobileStatusContactBrandLeadPopup(this.value);"/>
                            <input class="verif-submitbtn" id="validateMobileBrandLeadPopup" style="display: none;" value="Verify" type="button" onclick="validateMobilePopup()">
                            <input class="verif-submitbtn" id="editMobileContactBrandLeadPopup" value="Edit" type="button" onclick="editMobileLeadPopup();" style="display: none">
                            <span id="successMobileBrandLeadPopup" class="showhideright" style="display: none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                        </div>
                        <div class="form-group" id="otpBlockLeadPopup" style="position: relative; display:none;">
                            <input type="text" id="otpContactBrandLeadPopup" class="form-control" maxlength="4" placeholder="one time password (only numeric)"/>
                            <input class="verif-submitbtn" value="verify" type="button" onclick="verifyOtpBrandLeadPopup()">
                            <span id="mobcat"></span>
                        </div>
                        <div class="form-group" id="otpMismatchContactBrandLeadPopup" style="display:none; color:red;">
                            OTP mismatch..!
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="infostate">
                                <option value>Select State for Franchise</option>
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

                        <div class="form-group">
                            <input type="text" class="form-control blur" name="infocity" placeholder="Enter City">
                        </div>
                        <div class="submit-btn" id="sub">
                            <input type="submit" id="instaLeadPopupFormSubmit" class="btn btn-default btn-red" value="Insta Apply Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--brand pop section end  here -->
<script language="javascript">

    function getMobileStatusContactBrandLeadPopup(value){
        if(parseInt(value.length) === 10){
            if ($.isNumeric( value )){
                $.ajax({
                    type:'GET',
                    url:'/mobile-verified-check',
                    data:{mobile : value},
                    success:function(data){
                        if(parseInt(data) === 1){
                            $('#successMobileBrandLeadPopup').show();
                            $('#editMobileContactBrandLeadPopup').hide();
                        }else {
                            $('#instaLeadPopupFormSubmit').prop('disabled',true);
                            $('#validateMobileBrandLeadPopup').show();
                            $('#successMobileBrandLeadPopup').hide();
                        }
                    }
                });
            }
        }
        if(parseInt(value.length) !== 10){
            if ($.isNumeric( value )){
                $('#successMobileBrandLeadPopup').hide();
                $('#instaLeadPopupFormSubmit').prop('disabled',false);
                $('#otpBlockLeadPopup').hide();
                $('#validateMobileBrandLeadPopup').hide();
            }
        }
    }

    function editMobileLeadPopup(){
        $('#mobileBrandLeadPopup').attr('readonly',false);
        $('#otpBlockLeadPopup').hide();
        $('#validateMobileBrandLeadPopup').show();
        $('#editMobileContactBrandLeadPopup').hide();
        $('#otpMismatchContactBrandLeadPopup').hide();
    }

    function validateMobilePopup(){
        var mobileNumber = $('#mobileBrandLeadPopup');

        $.ajax({
            type: 'get',
            url: '/verify',
            data: {mobile: mobileNumber.val()}
        });

        mobileNumber.attr('readonly',true);
        $('#editMobileContactBrandLeadPopup').show();
        $('#validateMobileBrandLeadPopup').hide();
        $('#otpBlockLeadPopup').show();
        $('#instaLeadPopupFormSubmit').prop('disabled',true);
    }

    function verifyOtpBrandLeadPopup() {
        var otp = $('#otpContactBrandLeadPopup').val();
        var mobile  = $('#mobileBrandLeadPopup').val();
        $.ajax({
            type    : 'get',
            url     : '/mobile/verify-otp',
            data    : {otpNo: otp, mobileNo: mobile},
            success : function (data) {
                if (parseInt(data.check) === 0) {
                    $('#otpMismatchContactBrandLeadPopup').show();
                } else {
                    $('#instaLeadPopupFormSubmit').prop('disabled',false);
                    $('#otpBlockLeadPopup').hide();
                    $('#otpMismatchContactBrandLeadPopup').hide();
                    $('#successMobileBrandLeadPopup').show();
                    $('#editMobileContactBrandLeadPopup').hide();
                    $('#validateMobileBrandLeadPopup').hide();
                }
            }

        });
    }

    $(document).ready(function () {
        $('#brandpopup').modal('show');
        $("#instaLeadPopup").validate({
            rules: {
                infoname: {required: true, minlength: 2, maxlength: 50},
                infoemail: {required: true, email: true, minlength: 3, maxlength: 100},
                infostate: {required: true},
                infocity: {required: true, minlength: 2, maxlength: 50},
                mobile: {required: true, accept: "[0-9]", minlength: 10, maxlength: 10, number: true},
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent())
            },
            submitHandler: function () {
                var form = $('#instaLeadPopup');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('brandcontactinfo') }}',
                    dataType: "json",
                    data: form.serialize(),
                    beforeSend: function () {
                        $("#pleaseWaitBlock").show();
                        $('#instaLeadPopup').hide();
                        $('#instaLeadPopupFormSubmit').attr('disabled', true);
                    },
                    success: function (data) {
                        $("#pleaseWaitBlock").hide();
                        $('#finalLeadPopupResult').html(data);
                        $('#pleaseWaitBlockResult').show();
                    }
                });
                return false;
            }
        });
    });

</script>
