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
    function toggleSubmitButton() {
        $('#btninsta').prop('disabled', !$("#insta").valid());
    }

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
    function toggleSubmitButton1() {
        const isValid = $("#wider-insta-form").valid();
        $("#wider-submit-button").prop("disabled", !isValid);
    }
    $('#wider-insta-form input, #wider-insta-form select, #wider-insta-form textarea').on('keyup change blur', function () {
        toggleSubmitButton1();
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
// // Function to check mobile status
// function getMobileStatus(value) {
//     if (value.length === 10 && $.isNumeric(value)) {
//         $.ajax({
//             type: 'GET',
//             url: '/mobcheck',
//             data: { mobile: value },
//             success: function (data) {
//                 if (parseInt(data) === 1) {
//                     $('#sub1').show();
//                 } else {
//                     $('#verifybutton').show();
//                     $('#sub1').hide();
//                 }
//             }
//         });
//     } else if (value.length !== 10 && $.isNumeric(value)) {
//         // $('#verifybutton, #sub').hide();
//         $('#sub1').hide();
//         $('#verifybutton').hide();
//     }
// }

// // Function to verify mobile
// function veryfie() {
//     var keyword = $('#txtPhone').val();
//     $.ajax({
//         type: 'get',
//         url: '/verify',
//         data: { mobile: keyword }
//     });
//     $("#otpblk").show();
//     $('#verifybutton').hide();
//     $('#editmobile').show();
//     $('#txtPhone').prop('readonly', true);
// }

// // Function to edit mobile number in insta form
// function editmobileinsta() {
//     $("#otpblk").hide();
//     $('#verifybutton').show();
//     $('#editmobile').hide();
//     $('#txtPhone').prop('readonly', false);
// }

// // Function to check OTP
// function checkinstaotp() {
//     const otp =  $('#otp').val().trim();
//     const mobile = $('#txtPhone').val().trim();
//     // Validate if OTP is empty
//     if (otp === '' || otp.length !== 4) {
//         $('#otpblk1').text('Please enter a valid 4-digit OTP').css('color', 'red').show();
//         return;
//     }

//     // Proceed with AJAX if OTP is not empty
//     $.ajax({
//         type: 'get',
//         url: '/check',
//         data: { otpNo: keyword, mobileNo: mobile },
//         success: function (data) {
//             if (data === 'notexists') {
//                 $('#otpblk1').text('Invalid OTP. Please try again.').css('color', 'red').show();
//             } else {
//                 $('#otpblk1').hide();
//                 $('#otpblk').hide();
//                 $('#txtPhone').prop('readonly', true);
//                 $('#sub1').show();
//                 $('#editmobile').hide();
//             }
//         },
//         error: function () {
//             $('#otpblk1').text('Something went wrong. Please try again.').css('color', 'red').show();
//         }
//     });
// }

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
                } else {
                    $('#sub1').hide();
                    $('#verifybutton').show();
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

// Check the OTP
function checkinstaotp() {
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
            if (response === 'notexists') {
                $('#otpblk1').text('Invalid OTP. Please try again.').css('color', 'red').show();
            } else {
                $('#otpblk1').hide();
                $('#otpblk').hide();
                $('#txtPhone').prop('readonly', true);
                $('#sub1').show();
                $('#editmobile').hide();
            }
        },
        error: function () {
            $('#otpblk1').text('Something went wrong. Please try again.').css('color', 'red').show();
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

// function getMobileStatusWider(value) {
//     if (value.length === 10 && $.isNumeric(value)) {
//         $.ajax({
//             type: 'GET',
//             url: '/mobcheck',
//             data: { mobile: value },
//             success: function (data) {
//                 if (parseInt(data) === 1) {
//                     $('#success-mobile-wider').show();
//                     $('#validate-mobile-contact').hide();
//                     $('#wider-submit-button').prop('disabled', false);
//                 } else {
//                     $('#validate-mobile-contact').show();
//                     $('#success-mobile-wider').hide();
//                     $('#wider-submit-button').prop('disabled', true);
//                 }
//             }
//         });
//     } else if (value.length !== 10 && $.isNumeric(value)) {
//         $('#validate-mobile-contact').hide();
//         $('#success-mobile-wider').hide();
//         $('#edit-mobile-wider').hide();
//         $('#wider-submit-button').prop('disabled', false);
//     }
// }


// function editMobileWider1() {
//     // alert('hello');
//     $("#mobile-wider").prop("readonly", false);
//     $("#edit-mobile-wider1").hide(); // Fix: correct ID
//     $("#validate-mobile-contact").show();
//     $("#otp-block-wider1").hide();
//     $("#wider-submit-button").prop("disabled", true);
// }

// function validateMobileWider() {
//     var mobile = $('#mobile-wider').val();
//     $.ajax({
//         type: 'get',
//         url: '/verify',
//         data: { mobile: mobile }
//     });
//     $("#mobile-wider").prop("readonly", true);
//     $("#edit-mobile-wider1").show();
//     $("#validate-mobile-contact").hide();
//     $("#otp-block-wider1").show();
//     $("#wider-submit-button").prop("disabled", true);
// }

// function verifyWiderOTP() {
//     var otp = $('#otp-insta-wider1').val();
//     var mobile = $('#mobile-wider').val();
//     $.ajax({
//         type: 'get',
//         url: '/investor/verify-otp',
//         data: { otpNo: otp, mobileNo: mobile },
//         success: function (data) {
//             if (data == 0) {
//                 $("#mismatch-wider").show();
//             } else {
//                 $("#success-mobile-wider").show();
//                 $("#wider-submit-button").prop("disabled", false);
//                 $("#otp-block-wider1, #edit-mobile-wider1, #validate-mobile-contact").hide();
//             }
//         }
//     });
// }

function handleMobileInput(value) {
    const mobile = value.trim();
    const isValid = mobile.length === 10 && $.isNumeric(mobile);

    if (isValid) {
        $.get('/mobcheck', { mobile }, function (response) {
            const exists = parseInt(response) === 1;

            $('#mobile-verified-icon').toggle(exists);
            $('#verify-mobile').toggle(!exists);
            $('#edit-mobile').hide();
            $('#wider-submit-button').prop('disabled', !exists);
        });
    } else {
        $('#verify-mobile, #mobile-verified-icon, #edit-mobile').hide();
        $('#wider-submit-button').prop('disabled', false);
    }
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
        } else {
            $('#otp-error').text('OTP Mismatch').show();
        }
    });
}

