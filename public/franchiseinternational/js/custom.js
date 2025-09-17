//Slide left instantiation and action.    
var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
});

var slideLeftBtn = document.querySelector('#c-button--slide-left');
slideLeftBtn.addEventListener('click', function (e) {
    e.preventDefault();
    slideLeft.open();
});

$(document).ready(function () {

    var url = $(location).attr('href');
    var parts = url.split("/");
    var last_part = parts[parts.length - 1];

    var cat = "mc";

    if (last_part != "international")
        var cat = "sc";

    function submitSearch() {
        var mainCat = $('#getMainCategoryDataHeaderLoc').val();
        var stateHeader = $('#stateHeader').val();
        var investmentHeader = $('#investment').val();

        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderLoc')).attr('slug');
        var mainCatUrl = $('option:selected', $('#getMainCategoryDataHeaderLoc')).attr('url');
        var stateHeaderText = $('option:selected', $('#stateHeader')).attr('slug');

        var minRange = $('option:selected', $('#investment')).attr('min_range');
        var maxRange = $('option:selected', $('#investment')).attr('max_range');

        var url = '/business-opportunities/';

        if (stateHeader != '' && investmentHeader == '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/" + cat + "-" + mainCat + "/loc-" + stateHeader;
        } else if (stateHeader == '' && investmentHeader != '') {
            url = url + mainCatText + "-in-india/" + cat + "-" + mainCat + "/range-" + minRange + "-" + maxRange;
        } else if (stateHeader != '' && investmentHeader != '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/" + cat + "-" + mainCat + "/loc-" + stateHeader + "/range-" + minRange + "-" + maxRange;
        } else {
            url = mainCatUrl;
        }

        var pathArray = window.location.pathname.split('/');
        if(pathArray[1] == 'hi') {
            // window.location = '/hi'+url;
            window.open('/hi'+url, '_blank');
        } else{
            window.open(url, '_blank');
            // window.location = url;
        }
        return false;
    }

    $('#search-form').on('submit', function (e) {
        e.preventDefault();
        submitSearch();
    });

    function submitSearchTop() {
        var mainCat = $('#getMainCategoryDataHeaderLocTop').val();
        var stateHeader = $('#stateHeaderTop').val();
        var investmentHeader = $('#investmentTop').val();

        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderLocTop')).attr('slug');
        var mainCatUrl = $('option:selected', $('#getMainCategoryDataHeaderLocTop')).attr('url');
        var stateHeaderText = $('option:selected', $('#stateHeaderTop')).attr('slug');

        var minRange = $('option:selected', $('#investmentTop')).attr('min_range');
        var maxRange = $('option:selected', $('#investmentTop')).attr('max_range');

        var url = '/business-opportunities/';

        if (stateHeader != '' && investmentHeader == '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/" + cat + "-" + mainCat + "/loc-" + stateHeader;
        } else if (stateHeader == '' && investmentHeader != '') {
            url = url + mainCatText + "-in-india/" + cat + "-" + mainCat + "/range-" + minRange + "-" + maxRange;
        } else if (stateHeader != '' && investmentHeader != '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/" + cat + "-" + mainCat + "/loc-" + stateHeader + "/range-" + minRange + "-" + maxRange;
        } else {
            url = mainCatUrl;
        }

        var pathArray = window.location.pathname.split('/');
        if(pathArray[1] == 'hi') {
            // window.location = '/hi'+url;
            window.open('/hi'+url, '_blank');
        } else{
            window.open(url, '_blank');
            // window.location = url;
        }
        return false;
    }

    $('#search-form-top').on('submit', function (e) {
        e.preventDefault();
        submitSearchTop();
    });

    $('.flexslider').flexslider({
        animation: 'fade',
        controlsContainer: '.flexslider'
    });

    var listWidth = $('.list-width-new').outerWidth();
    $('.bxslider').bxSlider({
        minSlides: 1,
        maxSlides: 12,
        slideWidth: listWidth,
        slideMargin: 0,
        controls: false,
        adaptiveHeight: 'true'
    });

    $("#testimonial-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [767, 1],
        pagination: false,
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true
    });

    $('#searchopt').click(function () {
        $('.open').click();
        $('.searchoption').toggle(400);
        return false;
    });

    $('#searchopt2').click(function () {
        $('.searchoption').hide(400);
    });

    $('.dropdown-toggle').click(function () {
        $('.searchoption').hide(400);
    });

    $("#buttonAreaHide").click(function () {
        $("#show-full-txt").slideUp("slow");
        $('#buttonAreaHide').hide();
        $('#buttonAreaShow').show();
    });

    $("#buttonAreaShow").click(function () {
        $("#show-full-txt").slideDown("slow");
        $('#buttonAreaHide').show();
        $('#buttonAreaShow').hide();
    });

    function close_accordion_section() {
        $('.demo-show > h5 > a').removeClass('opened');
        $('.demo-show > div').slideUp(300).removeClass('open');
    }

    $('.demo-show > h5 > a').click(function (e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
        if ($(e.target).is('.opened')) {
            close_accordion_section();
        } else {
            close_accordion_section();
            // Add active class to section title
            $(this).addClass('opened');
            // Open up the hidden content panel
            $(currentAttrValue).slideDown(300).addClass('open');
        }
        e.preventDefault();
    });
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
            let type = $("input[name='optionsRadios']:checked").val();
            let name = document.getElementById('namefreeadvice').value;
            let email = document.getElementById('emailfreeadvice').value;
            let mobile = document.getElementById('mobilefreeadvice').value;
            let details = document.getElementById('detailsfreeadvice').value;
            let pincode = document.getElementById('pincodefreeadvice').value;
            let is_newsletter = 0;
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
                    if (data === 'true') {
                        window.location = "/thanks-advice-form"
                    } else document.getElementById("errMsg").style.display = "block"
                }
            });
            return !1
        }
    });

});

if (screen.width > 1199) {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('#headstickae').addClass("bothheadae");
            $('.headlink').hide(200);
            $('.smedia').hide(200);
            $('.headersearch').show(400);
            $('.searhomeblk').hide();
        } else {
            $('.headersearch').hide(200);
            $('.headlink').show(200);
            $('.smedia').show(200);
            $('.searhomeblk').show();
            $('#headstickae').removeClass("bothheadae");
        }
    });
}

$('#registerselect').click(function () {
    $('#registeractive').click();
});

$('#loginselect').click(function () {
    $('#loginactive').click();
});

$('#mobilereg').click(function () {
    $('#registeractive').click();
});

$('#registerselect1').click(function () {
    $('#login').addClass("active");
    $('#register').removeClass("active");
    $('#loginactiveopen').addClass("active");
    $('#registeractiveopen').removeClass("active");
});

$('#loginselect1').click(function () {
    $('#login').removeClass("active");
    $('#register').addClass("active");
    $('#loginactiveopen').removeClass("active");
    $('#registeractiveopen').addClass("active");
});

function frg_panel() {
    $("#lg-pnl").hide();
    $("#frg-pnl").show();
}

function lg_panel() {
    $("#lg-pnl").show();
    $("#loginactive").click();
    $("#frg-pnl").hide();
}
//Awesomplete
const input = document.getElementById('dealer-bar-search');
// Init awesomplete
const awesomplete = new Awesomplete(input);
const navBarSearch = $("#dealer-bar-search");
//navBarSearch.keypress(function () {
navBarSearch.on('keypress keyup keypress blur change', function () {
    var search_keyword = $(this).val();
    // Check if atleast 2 chars are typed
    if (search_keyword.length >= 2) {
        $.ajax({
            url: '/dealers-search/' + search_keyword,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                prepareList(JSON.parse(JSON.stringify(response)));

            },
            error: function (err) {
                console.log(err);

            }
        });
    }
});
function prepareList(list) {
    var c_list = [];
    list.forEach(item => {
        c_list.push(item.name);
    });
    // Assigned the c_list to the list property of Awesomplete instance
    awesomplete.list = c_list;
}

navBarSearch.on('awesomplete-selectcomplete', function () {
    if ($("#dealer-bar-search").val() != "") {
        var value = $("#dealer-bar-search").val();
        var items = value.split(' - <strong> in');
        if (items.length > 1)
            value = items[0];
        // window.location.href = '/dealers-india/search/' + value;
        window.open('/dealers-india/search/' + value, '_blank');
    }
});

$("#searchSubmitButton").on('click', function () {
    if ($("#dealer-bar-search").val() != "") {
        var value = $("#dealer-bar-search").val();
        var items = value.split(' - <strong> in');
        if (items.length > 1)
            value = items[0];
        // window.location.href = '/dealers-india/search/' + value;
        window.open('/dealers-india/search/' + value, '_blank');
    }
});
var otpInterval;

    function checkInputType() {
        var input = $('#email_or_mobile').val();
        var isEmail = validateEmail(input);
        console.log(input + "custom");
        if (isEmail) {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        } else if (validateMobile(input)) {
            $('#password_group').hide();
            $('#get_otp_btn').show();
            $('#sign_in_btn').prop('disabled', true);
        } else {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        }
    }

    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validateMobile(mobile) {
        var re = /^\d{10}$/;
        return re.test(mobile);
    }

    function validateLoginMobileOTP() {
        var mobile = $('#email_or_mobile').val();
        $.ajax({
            type: 'get',
            url: '/login_verify_mobile',
            data: {
                mobile: mobile
            },
            success: function(data) {
                if (data.data == 0) {
                    $("#mismatch-mob").show();
                    $("#email_or_mobile").prop("readonly", true);
                    $("#sign_in_btn").prop("disabled", true);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").hide();
                    $("#get_otp_btn").hide();
                } else {
                    $("#email_or_mobile").prop("readonly", true);
                    $("#mismatch-mob").hide();
                    $("#sign_in_btn").prop("disabled", false);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").show();
                    $("#get_otp_btn").hide();
                    startOTPTimer();
                }
            }
        });
    }

    function editMobileWider() {
        // alert('hello');
        $("#email_or_mobile").prop("readonly", false);
        $("#edit-mobile-wider").hide();
        $("#mismatch-mob").hide();
        $("#otp-block-wider").hide();
        $("#sign_in_btn").prop("disabled", true);
        clearInterval(otpInterval);
        $('#otp_timer').hide();
        $('#resend_otp').hide();
    }

    function startOTPTimer() {
        var timer = 60;
        $('#resend_otp').hide();
        $('#otp_timer').show();

        otpInterval = setInterval(function() {
            if (timer > 0) {
                timer--;
                $('#otp_timer').text(timer + 'sec');
            } else {
                clearInterval(otpInterval);
                $('#otp_timer').hide();
                $('#resend_otp').show();
                $("#sign_in_btn").prop("disabled", true);
            }
        }, 1000);
    }

    function resendOTP() {
        clearInterval(otpInterval);
        var mobile = $('#email_or_mobile').val();
        startOTPTimer();
        validateLoginMobileOTP();
    }
