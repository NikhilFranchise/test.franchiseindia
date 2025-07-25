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
// Function to check mobile status
function getMobileStatus(value) {
    if (value.length === 10 && $.isNumeric(value)) {
        $.ajax({
            type: 'GET',
            url: '/mobcheck',
            data: { mobile: value },
            success: function (data) {
                if (parseInt(data) === 1) {
                    $('#sub1').show();
                } else {
                    $('#verifybutton').show();
                    $('#sub1').hide();
                }
            }
        });
    } else if (value.length !== 10 && $.isNumeric(value)) {
        // $('#verifybutton, #sub').hide();
        $('#sub1').hide();
        $('#verifybutton').hide();
    }
}

// Function to verify mobile
function veryfie() {
    var keyword = $('#txtPhone').val();
    $.ajax({
        type: 'get',
        url: '/verify',
        data: { mobile: keyword }
    });
    $("#otpblk").show();
    $('#verifybutton').hide();
    $('#editmobile').show();
    $('#txtPhone').prop('readonly', true);
}

// Function to edit mobile number in insta form
function editmobileinsta() {
    $("#otpblk1").hide();
    $('#verifybutton').show();
    $('#editmobile').hide();
    $('#txtPhone').prop('readonly', false);
}

// Function to check OTP
function checkinstaotp() {
    var keyword = $('#otp').val();
    var mobile = $('#txtPhone').val();
    $.ajax({
        type: 'get',
        url: '/check',
        data: { otpNo: keyword, mobileNo: mobile },
        success: function (data) {
            if (data == 'notexists') {
                $('#otpblk1').show();
            } else {
                $('#otpblk1').hide();
                $('#otpblk').hide();
                $('#txtPhone').prop('readonly', true);
                $('#sub1').show();
                $('#editmobile').hide();
            }
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

function getMobileStatusWider(value) {
    if (value.length === 10 && $.isNumeric(value)) {
        $.ajax({
            type: 'GET',
            url: '/mobcheck',
            data: { mobile: value },
            success: function (data) {
                if (parseInt(data) === 1) {
                    $('#success-mobile-wider').show();
                    $('#validate-mobile-contact').hide();
                    $('#wider-submit-button').prop('disabled', false);
                } else {
                    $('#validate-mobile-contact').show();
                    $('#success-mobile-wider').hide();
                    $('#wider-submit-button').prop('disabled', true);
                }
            }
        });
    } else if (value.length !== 10 && $.isNumeric(value)) {
        $('#validate-mobile-contact').hide();
        $('#success-mobile-wider').hide();
        $('#edit-mobile-wider').hide();
        $('#wider-submit-button').prop('disabled', false);
    }
}


function editMobileWider1() {
    // alert('hello');
    $("#mobile-wider").prop("readonly", false);
    $("#edit-mobile-wider1").hide(); // Fix: correct ID
    $("#validate-mobile-contact").show();
    $("#otp-block-wider1").hide();
    $("#wider-submit-button").prop("disabled", true);
}

function validateMobileWider() {
    var mobile = $('#mobile-wider').val();
    $.ajax({
        type: 'get',
        url: '/verify',
        data: { mobile: mobile }
    });
    $("#mobile-wider").prop("readonly", true);
    $("#edit-mobile-wider1").show();
    $("#validate-mobile-contact").hide();
    $("#otp-block-wider1").show();
    $("#wider-submit-button").prop("disabled", true);
}

function verifyWiderOTP() {
    var otp = $('#otp-insta-wider1').val();
    var mobile = $('#mobile-wider').val();
    $.ajax({
        type: 'get',
        url: '/investor/verify-otp',
        data: { otpNo: otp, mobileNo: mobile },
        success: function (data) {
            if (data == 0) {
                $("#mismatch-wider").show();
            } else {
                $("#success-mobile-wider").show();
                $("#wider-submit-button").prop("disabled", false);
                $("#otp-block-wider1, #edit-mobile-wider1, #validate-mobile-contact").hide();
            }
        }
    });
}
