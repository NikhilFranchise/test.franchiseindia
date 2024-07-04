JQuery.validator.addMethod("accept", function (value, element, param) { return value.match(new RegExp("." + param + "$")) });
$(document).ready(function () {
    $('input[title!=""]').hint();
    $('textarea[title!=""]').hint();
    $('select[title!=""]').hint();
    $("#homepage").validate({
        rules: {
            namefreeadvice: {required: !0, accept: "[a-zA-Z\s]+", minlength: 3, maxlength: 35},
            emailfreeadvice: {required: !0, email: !0},
            mobilefreeadvice: {required: !0, accept: "[0-9]", minlength: 10, maxlength: 10, number: !0},
            pincodefreeadvice: {required: !0, number: !0},
            detailsfreeadvice: "required"
        },
        messages: {
            namefreeadvice: {required: "", accept: ""},
            emailfreeadvice: {required: "", email: ""},
            mobilefreeadvice: {required: "", accept: "", number: ""},
            pincodefreeadvice: "",
            detailsfreeadvice: ""
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent())
        },
        submitHandler: function () {
            var type = $("input[name='optionsRadios']:checked").val();
            var name = document.getElementById('namefreeadvice').value;
            var email = document.getElementById('emailfreeadvice').value;
            var mobile = document.getElementById('mobilefreeadvice').value;
            var details = document.getElementById('detailsfreeadvice').value;
            var pincode = document.getElementById('pincodefreeadvice').value;
            var is_newsletter = 0;
            if ($('#is_newsletterfreeadvice').is(':checked')) is_newsletter = 1;
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
					//alert(data);
					const text = data;
					const newText = text.split(/\s/).join('');
					if (newText == 'true') {
						// alert('ok');
						// document.getElementById("askForm").style.display = "none";
						// document.getElementById("askMsg").style.display = "block";
						// if (window.location.pathname !== "/" && window.location.pathname !== "/premium")
						window.location = "/thanks-advice-form";
					} else {
						//alert('failed');
						document.getElementById("errMsg").style.display = "block";
					}
				}


            });
            return !1
        }
    });
    $("#insta").validate({
        rules: {
            infoname: {required: !0, accept: "[a-zA-Z\s]+", minlength: 3, maxlength: 35},
            infoemail: {required: !0, email: !0},
            mobile: {required: !0, accept: "[0-9]", minlength: 10, maxlength: 10, number: !0},
            infostate: "required",
            infocity: {required: !0},
            pincode: {required: !0, accept: "[0-9]", minlength: 6, maxlength: 6, number: !0},
            address: "required",
            investment_range: "required"
        },
        messages: {
            name: {required: "", accept: ""},
            email: {required: "", email: ""},
            mobile: {required: "", accept: "Please enter 10 digit mobile no", number: ""},
            state: "",
            city: {required: ""},
            pincode: {required: "", accept: "", number: ""},
            address: "",
            investment_range: ""
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent())
        }
    })
});
function getMobileStatus(value) {
    if (value.length === 10) {
        if ($.isNumeric(value)) {
            $.ajax({
                type: 'GET', url: '/mobcheck', data: {mobile: value}, success: function (data) {
                    if (parseInt(data) === 1) {
                        $('#sub').css('display', 'block')
                    }
                    if (parseInt(data) === 0) {
                        $('#verifybutton').css('display', 'block');
                        $('#sub').css('display', 'none')
                    }
                }
            })
        }
    }
    if (value.length !== 10) {
        if ($.isNumeric(value)) {
            $('#verifybutton').css('display', 'none');
            $('#sub').css('display', 'none')
        }
    }
}
function veryfie() {
    var keyword = document.getElementById('txtPhone').value;
    $.ajax({type: 'get', url: '/verify', data: {mobile: keyword}});
    document.getElementById("otpblk").style.display = "block";
    $('#verifybutton').css('display', 'none');
    $('#editmobile').css('display', 'block');
    document.getElementById("txtPhone").readOnly = !0
}
function editmobileinsta() {
    document.getElementById("otpblk1").style.display = "none";
    $('#verifybutton').css('display', 'block');
    $('#editmobile').css('display', 'none');
    document.getElementById("txtPhone").readOnly = !1
}
function checkinstaotp() {
    var keyword = document.getElementById('otp').value;
    var mobile = document.getElementById('txtPhone').value;
    $.ajax({
        type: 'get', url: '/check', data: {otpNo: keyword, mobileNo: mobile}, success: function (data) {
            if (data == 'notexists') {
                $('#otpblk1').css('display', 'block')
            } else {
                $('#otpblk1').css('display', 'none');
                document.getElementById("otpblk").style.display = "none";
                document.getElementById("txtPhone").readOnly = !0;
                document.getElementById("sub").style.display = "block";
                $('#editmobile').css('display', 'none')
            }
        }
    })
}
$("#wider-insta-form").validate({rules:{infoname:{required:!0,accept:"[a-zA-Zs]+",minlength:3,maxlength:35},infoemail:{required:!0,email:!0},mobile:{required:!0,accept:"[0-9]",minlength:10,maxlength:10,number:!0},infostate:"required",infocity:{required:!0},pincode:{required:!0,accept:"[0-9]",minlength:6,maxlength:6,number:!0},address:"required",investment_range:"required"},messages:{infoname:{required:"",accept:""},infoemail:{required:"",email:""},mobile:{required:"",accept:"Please enter 10 digit mobile no",number:""},infostate:"",infocity:{required:""},pincode:{required:"",accept:"",number:""},address:"",investment_range:""},errorPlacement:function(a,b){a.appendTo(b.parent().parent())}});function getCityWiderInsta(a){var b=document.getElementById("freeinfovalue").value;$.ajax({type:"GET",url:"/get-city-list-landing-page",data:{state:a,franId:b},success:function(c){$("#city-wider").html(c)}})}function getMobileStatusWider(a){if($("#success-mobile-wider").css("display")!="block"){if(parseInt(a.length)===10){if($.isNumeric(a)){$.ajax({type:"GET",url:"/mobcheck",data:{mobile:a},success:function(b){if(parseInt(b)===1){$("#success-mobile-wider").css("display","block")}if(parseInt(b)===0){$("#wider-submit-button").prop("disabled",true);$("#validate-mobile-contact").css("display","block");$("#success-mobile-wider").css("display","none")}}})}}if(parseInt(a.length)!==10){if($.isNumeric(a)){$("#success-mobile-wider").css("display","none");$("#wider-submit-button").prop("disabled",false);$("#edit-mobile-wider").css("display","none");$("#validate-mobile-contact").css("display","none")}}}}function editMobileWider(){$("#mobile-wider").attr("readonly",false);$("#edit-mobile-wider").css("display","none");$("#validate-mobile-contact").css("display","block");$("#otp-block-wider").css("display","none")}function validateMobileWider(){var a=document.getElementById("mobile-wider").value;$.ajax({type:"get",url:"/verify",data:{mobile:a}});$("#mobile-wider").attr("readonly",true);$("#edit-mobile-wider").css("display","block");$("#validate-mobile-contact").css("display","none");document.getElementById("otp-block-wider").style.display="block";$("#wider-submit-button").prop("disabled",true)}function verifyWiderOTP(){var b=document.getElementById("otp-insta-wider").value;var a=document.getElementById("mobile-wider").value;$.ajax({type:"get",url:"/investor/verify-otp",data:{otpNo:b,mobileNo:a},success:function(c){if(c==0){$("#mismatch-wider").css("display","block")}else{$("#success-mobile-wider").css("display","block");$("#wider-submit-button").prop("disabled",false);$("#otp-block-wider").css("display","none");$("#edit-mobile-wider").css("display","none");$("#validate-mobile-contact").css("display","none")}}})};
