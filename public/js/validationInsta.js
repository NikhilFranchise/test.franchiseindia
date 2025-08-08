// Custom method to validate accepted characters
jQuery.validator.addMethod("accept", function (value, element, param) {
    return value.match(new RegExp("." + param + "$"));
});

$(document).ready(function () {
    // Initialize hints for input, textarea, and select elements with titles
    $('input[title!=""]').hint();
    $('textarea[title!=""]').hint();
    $('select[title!=""]').hint();

    // Validation for the homepage form
    $("#homepage").validate({
        rules: {
            namefreeadvice: {
                required: true,
                accept: "[a-zA-Z\\s]+",
                minlength: 3,
                maxlength: 35
            },
            emailfreeadvice: {
                required: true,
                email: true
            },
            mobilefreeadvice: {
                required: true,
                accept: "[0-9]",
                minlength: 10,
                maxlength: 10,
                number: true
            },
            pincodefreeadvice: {
                required: true,
                number: true
            },
            detailsfreeadvice: "required"
        },
        messages: {
            namefreeadvice: { required: "", accept: "" },
            emailfreeadvice: { required: "", email: "" },
            mobilefreeadvice: { required: "", accept: "", number: "" },
            pincodefreeadvice: "",
            detailsfreeadvice: ""
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent());
        },
        submitHandler: function () {
            var type = $("input[name='optionsRadios']:checked").val();
            var name = $('#namefreeadvice').val();
            var email = $('#emailfreeadvice').val();
            var mobile = $('#mobilefreeadvice').val();
            var details = $('#detailsfreeadvice').val();
            var pincode = $('#pincodefreeadvice').val();
            var is_newsletter = $('#is_newsletterfreeadvice').is(':checked') ? 1 : 0;

            $.ajax({
                type: 'post',
                url: '/freeadvice',
                data: {
                    optionsRadios: type,
                    name: name,
                    pincode: pincode,
                    email: email,
                    mobile: mobile,
                    details: details,
                    is_newsletter: is_newsletter
                },
                success: function (data) {
                    const newText = data.split(/\s/).join('');
                    if (newText === 'true') {
                        window.location = "/thanks-advice-form";
                    } else {
                        $("#errMsg").show();
                    }
                }
            });
            return false;
        }
    });

    // Validation for the insta form
    $("#insta").validate({
        rules: {
            infoname: {
                required: true,
                accept: "[a-zA-Z\\s]+",
                minlength: 3,
                maxlength: 35
            },
            infoemail: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                accept: "[0-9]",
                minlength: 10,
                maxlength: 10,
                number: true
            },
            infostate: "required",
            infocity: { required: true },
            pincode: {
                required: true,
                accept: "[0-9]",
                minlength: 6,
                maxlength: 6,
                number: true
            },
            address: "required",
            investment_range: "required"
        },
        messages: {
            infoname: { required: "", accept: "" },
            infoemail: { required: "", email: "" },
            mobile: { required: "", accept: "Please enter 10 digit mobile no", number: "" },
            infostate: "",
            infocity: { required: "" },
            pincode: { required: "", accept: "", number: "" },
            address: "",
            investment_range: ""
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent());
        }
    });

    $('#insta input, #insta select, #insta textarea').on('keyup change blur', function () {
        toggleSubmitButton();
    });

    // Additional validation for wider insta form
    $("#wider-insta-form").validate({
        rules: {
            infoname: {
                required: true,
                accept: "[a-zA-Z\\s]+",
                minlength: 3,
                maxlength: 35
            },
            infoemail: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                accept: "[0-9]",
                minlength: 10,
                maxlength: 10,
                number: true
            },
            infostate: "required",
            infocity: { required: true },
            pincode: {
                required: true,
                accept: "[0-9]",
                minlength: 6,
                maxlength: 6,
                number: true
            },
            address: "required",
            investment_range: "required"
        },
        messages: {
            infoname: { required: "", accept: "" },
            infoemail: { required: "", email: "" },
            mobile: { required: "", accept: "Please enter 10 digit mobile no", number: "" },
            infostate: "",
            infocity: { required: "" },
            pincode: { required: "", accept: "", number: "" },
            address: "",
            investment_range: ""
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent());
        }
    });

    $('#wider-insta-form input, #wider-insta-form select, #wider-insta-form textarea').on('keyup change blur', function () {
        toggleSubmitButton1();
    });
});

$(document).ready(function () {
    // Custom rule for mobile number
    $.validator.addMethod("indianMobile", function (value, element) {
        return this.optional(element) || /^[6-9]\d{9}$/.test(value);
    }, "Please enter a valid 10-digit mobile number starting with 6-9");

    // Custom rule for OTP (if needed)
    $.validator.addMethod("otp", function (value, element) {
        return this.optional(element) || /^\d{4}$/.test(value);
    }, "Enter a valid 4-digit OTP");

    $("#freeinfoform").validate({
        rules: {
            infoname: {
                required: true,
                minlength: 2
            },
            infoemail: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                indianMobile: true
            },
            infostate: {
                required: true
            },
            infocity: {
                required: true
            },
            address: {
                required: true,
                minlength: 5
            },
            pincode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            otpcontact: {
                otp: true // optional field if you want to validate
            },
            mobileStatus: {
                required: true
            }
        },
        messages: {
            infoname: {
                required: "Please enter your name",
                minlength: "Name must be at least 2 characters"
            },
            infoemail: {
                required: "Please enter your email",
                email: "Enter a valid email address"
            },
            mobile: {
                required: "Please enter your mobile number"
            },
            infostate: {
                required: "Please select a state"
            },
            infocity: {
                required: "Please select a city"
            },
            address: {
                required: "Please enter your address",
                minlength: "Address must be at least 5 characters"
            },
            pincode: {
                required: "Please enter your pincode",
                digits: "Only numeric values allowed",
                minlength: "Pincode must be 6 digits",
                maxlength: "Pincode must be 6 digits"
            }
        },
        errorElement: "span",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        submitHandler: function (form) {
            // You can manually enable submit button if needed
            $('#contactsubmit').prop('disabled', false);
            form.submit();
        }
    });



    // Optional: Enable submit button only when form is valid
    $('#freeinfoform input, #freeinfoform select').on('change keyup', function () {
        toggleSubmitButtonfreeInfo();
    });
});
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    // Allow: backspace (8), delete (46), arrow keys (37-40)
    if ([8, 46, 37, 38, 39, 40].includes(charCode)) {
        return true;
    }

    // Only allow number keys (0–9)
    if (charCode < 48 || charCode > 57) {
        evt.preventDefault();
        return false;
    }

    return true;
}

function toggleSubmitButton() {
    var isMobileVerified = $('#isMobileVerified').val() === '1';
    var isFormValid = $("#insta").valid();

    if (isFormValid && isMobileVerified) {
        $('#btninsta').prop('disabled', false);
    } else {
        $('#btninsta').prop('disabled', true);
    }
}

function toggleSubmitButton1() {
    var isMobileVerified = $('#isWiderMobileVerified').val() === '1';
    var isFormValid = $("#wider-insta-form").valid();

    if (isFormValid && isMobileVerified) {
        $('#wider-submit-button').prop('disabled', false);
    } else {
        $('#wider-submit-button').prop('disabled', true);
    }
}

function toggleSubmitButtonfreeInfo() {
    var isMobileVerified = $('#mobileStatus').val() === '1'; // Assumes '1' means verified
    var isFormValid = $("#freeinfoform").valid();

    if (isFormValid && isMobileVerified) {
        $('#contactsubmit').prop('disabled', false);
    } else {
        $('#contactsubmit').prop('disabled', true);
    }
}

// Check mobile status on keyup
function getMobileStatus(value) {
    const mobile = value.trim();
    if (mobile.length === 10 && $.isNumeric(mobile)) {
        $.ajax({
            type: 'GET',
            url: '/mobcheck',
            data: { mobile },
            success: function (response) {
                if (parseInt(response) === 1) {
                    $('#sub1').show();
                    $('#verifybutton').hide();
                    $('#isMobileVerified').val('1');
                    toggleSubmitButton();
                } else {
                    $('#sub1').hide();
                    $('#verifybutton').show();
                    $('#isMobileVerified').val('0');
                    toggleSubmitButton();
                }
            },
            error: function () {
                console.error('Mobile check failed');
            }
        });
    } else {
        $('#sub1').hide();
        $('#verifybutton').hide();
    }
}

// Start OTP verification after clicking "Verify"
function verifyMobile() {
    const mobile = $('#txtPhone').val().trim();

    if (mobile === '' || mobile.length !== 10 || !$.isNumeric(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return;
    }

    $.ajax({
        type: 'GET',
        url: '/verify',
        data: { mobile },
        success: function () {
            $('#otpblk').show();
            $('#verifybutton').hide();
            $('#editmobile').show();
            $('#txtPhone').prop('readonly', true);
        },
        error: function () {
            alert('Something went wrong during mobile verification.');
        }
    });
}

// Allow editing of mobile number
function editMobile() {
    $('#otpblk').hide();
    $('#verifybutton').show();
    $('#editmobile').hide();
    $('#sub1').hide();
    $('#txtPhone').prop('readonly', false);
    $('#otpblk1').hide();
    $('#otp').val('');
}

function verifySmsOTP() {
    const otp = $('#otp').val().trim();
    const mobile = $('#txtPhone').val().trim();

    if (otp === '' || otp.length !== 4 || !$.isNumeric(otp)) {
        $('#otpblk1').text('Please enter a valid 4-digit OTP').css('color', 'red').show();
        return;
    }

    $.ajax({
        type: 'GET',
        url: '/check',
        data: { otpNo: otp, mobileNo: mobile },
        success: function (response) {
            console.log(response);
            if (response === 'Notexists') {
                $('#otpblk1').text('Invalid OTP. Please try again.').css('color', 'red').show();
            } else {
                $('#otpblk1').hide();
                $('#otpblk').hide();
                $('#txtPhone').prop('readonly', true);
                $('#sub1').show();
                $('#editmobile').hide();

                // ✅ Mark as verified
                $('#isMobileVerified').val('1');
                toggleSubmitButton(); // recheck the button state
            }
        },
        error: function () {
            $('#otpblk1').text('Something went wrong. Please try again.').css('color', 'red').show();
        }
    });
}


// Start OTP verification after clicking "Verify"
function verify_insta_Mobile() {
    const mobile = $('#txtPhone').val().trim();

    if (mobile === '' || mobile.length !== 10 || !$.isNumeric(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return;
    }

    $.ajax({
        type: 'GET',
        url: '/verify',
        data: { mobile },
        success: function () {
            $('#otpblk22').show();
            $('#verifybutton').hide();
            $('#editmobile').show();
            $('#txtPhone').prop('readonly', true);
        },
        error: function () {
            alert('Something went wrong during mobile verification.');
        }
    });
}

// Allow editing of mobile number
function edit_insta_Mobile() {
    $('#otpblk22').hide();
    $('#verifybutton').show();
    $('#editmobile').hide();
    $('#sub1').hide();
    $('#txtPhone').prop('readonly', false);
    $('#otpblk11').hide();
    $('#otp').val('');
}

// Check the OTP Insta apply detail page
function verify_insta_apply_otp() {
    // console.log('yes i am called');
    const otp = $('#otp').val().trim();
    const mobile = $('#txtPhone').val().trim();

    if (otp === '' || otp.length !== 4 || !$.isNumeric(otp)) {
        $('#otpblk11').text('Please enter a valid 4-digit OTP').css('color', 'red').show();
        return;
    }
    $.ajax({
        type: 'GET',
        url: '/check',
        data: { otpNo: otp, mobileNo: mobile },
        success: function (response) {
            console.log(response);
            if (response === 'notexists') {
                $('#otpblk1').text('Invalid OTP. Please try again.').css('color', 'red').show();
            } else {
                $('#otpblk11').hide();
                $('#otpblk22').hide();
                $('#txtPhone').prop('readonly', true);
                $('#sub1').show();
                $('#editmobile').hide();
            }
        },
        error: function () {
            $('#otpblk11').text('Something went wrong. Please try again.').css('color', 'red').show();
        }
    });
}
// Additional functions for wider insta form
function getCityWiderInsta(state) {
    var franId = $('#freeinfovalue').val();
    $.ajax({
        type: 'GET',
        url: '/get-city-list-landing-page',
        data: { state: state, franId: franId },
        success: function (data) {
            $("#city-wider").html(data);
        }
    });
}

function handleMobileInput() {
    const mobile = $('#mobile-wider').val().trim();

    if (mobile === '' || mobile.length !== 10 || !$.isNumeric(mobile)) {
        $('#verify-mobile, #mobile-verified-icon, #edit-mobile').hide();
        $('#wider-submit-button').prop('disabled', true);
        return;
    }

    $.ajax({
        type: 'GET',
        url: '/mobcheck',
        data: { mobile: mobile },
        success: function (response) {
            const exists = parseInt(response) === 1;

            if (exists) {
                $('#mobile-verified-icon').show();
                $('#verify-mobile').hide();
                $('#isWiderMobileVerified').val('1');
                // Re-check submit button state
                toggleSubmitButton1();
            } else {
                $('#mobile-verified-icon').hide();
                $('#verify-mobile').show();
                $('#isWiderMobileVerified').val('0');
                toggleSubmitButton1();
            }

            $('#edit-mobile').hide();


        },
        error: function () {
            console.error('Mobile verification request failed.');
            $('#verify-mobile, #mobile-verified-icon, #edit-mobile').hide();
            $('#wider-submit-button').prop('disabled', true);
        }
    });
}


function enableMobileEdit() {
    $('#mobile-wider').prop('readonly', false);
    $('#edit-mobile').hide();
    $('#verify-mobile').show();
    $('#otp-block').hide();
    $('#wider-submit-button').prop('disabled', true);
}

function sendOTP() {
    const mobile = $('#mobile-wider').val().trim();

    if (mobile.length === 10 && $.isNumeric(mobile)) {
        $.get('/verify', { mobile });

        $('#mobile-wider').prop('readonly', true);
        $('#edit-mobile').show();
        $('#verify-mobile').hide();
        $('#otp-block').show();
        $('#wider-submit-button').prop('disabled', true);
    }
}

function verifyOTP() {
    const otp = $('#otp-input').val().trim();
    const mobile = $('#mobile-wider').val().trim();

    if (otp.length !== 4 || !$.isNumeric(otp)) {
        $('#otp-error').text('Please enter a valid 4-digit OTP').show();
        return;
    }

    $.get('/investor/verify-otp', { otpNo: otp, mobileNo: mobile }, function (response) {
        if (parseInt(response) === 1) {
            $('#mobile-verified-icon').show();
            $('#wider-submit-button').prop('disabled', false);
            $('#otp-block, #edit-mobile, #verify-mobile').hide();
            $('#otp-error').hide();
            $('#isWiderMobileVerified').val('1');
            toggleSubmitButton1();
        } else {
            $('#otp-error').text('Invalid OTP. Please try again').show();
        }
    });
}
$(document).ready(function () {
    const $mobile = $('#mobile');
    const $validateMobile = $('#validatemobile');
    const $editMobile = $('#editmobilecontact');
    const $successMobile = $('#successmobile');
    const $contactSubmit = $('#contactsubmit');
    const $otpBlock = $('#otpblock');
    const $otpInput = $('#otpcontact');
    const $verifyButton = $('#verify_button');
    const $mismatch = $('#mismatch')

    // Mobile input change
    window.getMobileStatuscontact = function (value) {
        if (value.length === 10 && $.isNumeric(value)) {
            $.ajax({
                type: 'GET',
                url: '/mobcheck',
                data: {
                    mobile: value
                },
                success: function (data) {
                    if (data == 1) {
                        // Mobile exists
                        $successMobile.show();
                        $validateMobile.hide();
                        $editMobile.hide();
                        $contactSubmit.prop('disabled', false);
                        $otpBlock.hide();
                        $('#mobileStatus').val('1');
                        toggleSubmitButtonfreeInfo();
                    } else {
                        // Mobile does not exist
                        $successMobile.hide();
                        $validateMobile.show();
                        $editMobile.hide();
                        $contactSubmit.prop('disabled', true);
                        $otpBlock.hide();
                        $('#mobileStatus').val('0');
                        toggleSubmitButtonfreeInfo();
                    }
                }
            });
        } else {
            $successMobile.hide();
            $validateMobile.hide();
            $editMobile.hide();
            $otpBlock.hide();
            $contactSubmit.prop('disabled', true);
        }
    };

    // When clicking on Edit
    window.editmobile = function () {
        $mobile.prop('readonly', false).focus();
        $editMobile.hide();
        $validateMobile.hide();
        $successMobile.hide();
        $otpBlock.hide();
        $contactSubmit.prop('disabled', true);
    };

    // When clicking on VERIFY
    window.validatemobile = function () {
        const mobileVal = $mobile.val();
        if (mobileVal.length !== 10 || !$.isNumeric(mobileVal)) return;

        $.ajax({
            type: 'GET',
            url: '/verify',
            data: {
                mobile: mobileVal
            },
            success: function () {
                $mobile.prop('readonly', true);
                $validateMobile.hide();
                $editMobile.show();
                $otpBlock.show();
                $contactSubmit.prop('disabled', true);
            }
        });
    };

    // OTP verification
    window.verify = function () {
        const otp = $otpInput.val();
        const mobile = $mobile.val();

        if (otp.length !== 4) {
            $mismatch.text('Please enter a valid 4-digit OTP').show();
            return;
        }

        $.ajax({
            type: 'GET',
            url: '/investor/verify-otp',
            data: {
                otpNo: otp,
                mobileNo: mobile
            },
            success: function (data) {
                if (data == 0) {
                    $mismatch.text('OTP Mismatch').show();


                } else {
                    $successMobile.show();
                    $contactSubmit.prop('disabled', false);
                    $otpBlock.hide();
                    $editMobile.hide();
                    $validateMobile.hide();
                    $mismatch.hide();
                    $('#mobileStatus').val('1');
                    toggleSubmitButtonfreeInfo();
                }
            }
        });
    };
});

