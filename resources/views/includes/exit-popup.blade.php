<script language="javascript">


    $(document).ready(function() {
        checkCookieExitPopup();
    });

    function checkCookieExitPopup() {
        var exitpopup = getCookie("exitpopup");
        if (exitpopup == "") {
            bioEp.init({
                html: '<div id="exitpopup" class="formsection"><form id="exitPopupFormStep1">\n' +
                    '                    <div class="exitfdkblk">\n' +
                    '                        <div class="exitheading">Ask our Experts</div>\n' +
                    '                        <p class="simtxt">Please let our business consultant help you to find the right franchisor or franchisee.</p>\n' +
                    '                        <input type="button" id="exitpopupYes" value="Yes" class="btn exitbtn" />\n' +
                    '                        <input type="button" id="exitpopupClose" value="No" class="btn exitbtn" />\n' +
                    '                    </div>\n' +
                    '                </form>' +
                    '<form id="pleaseWait" style="display: none;">\n' +
                    '                    <div class="exitfdkblk">\n' +
                    '                        <div class="exitheading">Please Wait....</div>\n' +
                    '                    </div>\n' +
                    '                </form>\n' +
                    '\n' +
                    '                <form id="exitPopupFormStep2" method="post" action="{{ url('exit-popup-post') }}" style="display: none;">\n' +
                    '                    <div class="exitfdkblk">\n' +
                    '                        <div class="exitheading">Ask our Experts</div>\n' +
                    '                        <div class="input-group">\n' +
                    '                            <span class="input-group-addon"><img src="https://www.franchiseindia.com/images/email.png" alt="email png"></span>\n' +
                    '                            <input type="email" required name="email" class="form-control" placeholder="Enter E-mail">\n' +
                    '                        </div>\n' +
                    '                        <div class="input-group marbtm20">\n' +
                    '                            <span class="input-group-addon"><img src="https://www.franchiseindia.com/images/mobile.png" alt="mobile png"></span>\n' +
                    '                            <input type="text" name="phone_no" required class="form-control" placeholder="Enter Mobile" pattern="[0-9]{10,10}" minlength="10" maxlength="10">\n' +
                    '                        </div>\n' +
                    '                        <input type="submit" id="exitFormSubmit" value="Submit" class="btn exitbtn" />\n' +
                    '                    </div>\n' +
                    '                </form>\n' +
                    '                <form id="exitPopupFormStep3" style="display: none;">\n' +
                    '                    <div class="exitfdkblk">\n' +
                    '                        <div class="exitheading">Thank You</div>\n' +
                    '                        <p class="simtxt">Thank you for sharing your details with us. Our business experts will get in touch with you soon.</p>\n' +
                    '                    </div>\n' +
                    '                </form>' +
                    '<div>',
                css: '#exitpopup { margin-top:0;}\n' +
                    '    .bio_ep_close {    background-color: #fff!important;}\n' +
                    '    .exitfdkblk { width:100%; margin:0 auto; background:#fff; padding:30px; text-align:center;border-radius: 10px}\n' +
                    '    .exitheading { font-size:21px; font-family: \'Open Sans Bold\', serif; line-height:20px; text-transform:capitalize; color:#333333;}\n' +
                    '    .simtxt {font-size:17px; font-family: \'Open Sans Regular\', serif; line-height:20px; color:#666666; margin:20px 0;}\n' +
                    '    .exitbtn { background:#fff; color:#e62005; border-color:#e62005; padding:7px 20px; margin-left:7px;}\n' +
                    '    .exitbtn:hover{background:#e62005; color:#fff;}\n' +
                    '    .exitfdkblk .input-group { width:90%; margin:15px auto 10px;}\n' +
                    '    .exitfdkblk .input-group.marbtm20 { margin-bottom:20px;}\n' +
                    '     #bio_ep .formsection  { margin-bottom:0px;}\n' +

                    '    @media only screen and (min-width:1px) and (max-width:640px){\n' +
                    '        #exitpopup { width:95%;}  #exitpopup .close { right: -6px!important;  top: -8px!important; }\n' +
                    '    }',
                cookieExp: 0
            });

        }
    }

    $(document).ready(function(){

        $('#exitpopupClose').on('click', function () {
            $('#bio_ep_close').trigger('click');
            setCookie('exitpopup', 'exitpopupcookie', 10);
        });

        $('#exitpopupYes').on('click', function () {
            $('#exitPopupFormStep1').hide();
            $('#exitPopupFormStep2').show();
            $('#exitPopupFormStep3').hide();
        });

        $("#exitPopupFormStep2").validate({
            rules: {
                email: {required: true, email: true},
                mobile: {required: true, accept: "[0-9]", minlength: 10, maxlength: 10, number: true},
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent())
            }
        });

    });

    function checkCookie() {
        var username = getCookie("username");
        if (username != "") {
            $("#marwhtap").removeClass('martopbanner50');
            $('#whatsappBanner').hide();
        } else {
            $("#marwhtap").addClass('martopbanner50');
        }
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }



</script>
