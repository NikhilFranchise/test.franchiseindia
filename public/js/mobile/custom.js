/**
 * Created by gulshan on 5/7/19.
 */
//action on submit your interest
$('#expbtn').on('click', function() {
    var franId = document.getElementById('expIntFranId').value;
    $("#expbtnloading").show();
    $("#expbtn").hide();
    $.ajax({
        type: 'post',
        url: '/inv-lead?flag=expint',
        data: {
            franId: franId
        },
        success: function (data) {

            if ( $.isNumeric(data) ) {
                $("#expbtnloading").hide();
                $('#expintbutton').css('display', 'block');
                $('#creditRemaining').html('You have '+ data +' credits remaining. Do you want to use the credit');
            } else if ( data == "showMsg" ) {
                window.location.assign('/investor/myaccount/payment');
            } else {
                document.getElementById("expbtnloading").style.display = "none";
                document.getElementById("notApplied").style.display = "none";
                document.getElementById("expmsg").style.display = "block";
                $('#companyContactinsta').html(data.user.company_name);
                $('#ceocontactinsta').html(data.user.ceo_name);
                $('#telephonecontactinsta').html(data.user.telephone);
                $('#addressocontactinsta').html(data.user.fran_address+", "+data.user.city+", "+data.user.state+", "+data.user.pincode);
                $('#emailcontactinsta').html("<a href='mailto:"+data.user.email+"' target='_blank'>"+data.user.email+"</a>");
                $('#mobilecontactinsta').html(data.user.mobile);
                $('#websitecontactinsta').html("<a href='http://"+data.user.website+"' target='_blank'>"+data.user.website+"</a>");
            }
        }
    });
});


$('#proceedInterest').on('click', function () {

    $('#expintbutton').css('display', 'none');
    document.getElementById("expbtnloading").style.display = "block";
    document.getElementById("creditRemaining").style.display = "none";
    var franId = document.getElementById('expIntFranId').value;
    $.ajax({
        type: 'post',
        url: '/inv-lead',
        data: {
            franId: franId
        },
        success: function (data) {
            document.getElementById("expbtnloading").style.display = "none";
            document.getElementById("expmsg").style.display = "block";
            $('#companyContactinsta').html(data.user.company_name);
            $('#ceocontactinsta').html(data.user.ceo_name);
            $('#telephonecontactinsta').html(data.user.telephone);
            $('#addressocontactinsta').html(data.user.fran_address+", "+data.user.city+", "+data.user.state+", "+data.user.pincode);
            $('#emailcontactinsta').html("<a href='mailto:"+data.user.email+"' target='_blank'>"+data.user.email+"</a>");
            $('#mobilecontactinsta').html(data.user.mobile);
            $('#websitecontactinsta').html("<a href='http://"+data.user.website+"' target='_blank'>"+data.user.website+"</a>");
        }
    });

});

$('#cancelinterest').on('click', function () {
    $('#creditRemaining').html('Please wait...');
    $('#expintbutton').css('display', 'none');
    var franId = document.getElementById('expIntFranId').value;
    $.ajax({
        type: 'post',
        url: '/inv-lead-normal',
        data: {
            franId: franId
        },
        success: function (data) {
            document.getElementById("creditRemaining").style.display = "none";
            $('#expbtnloading').css('display', 'none');
            $('#cancelExpress').css('display', 'block');
        }
    });
});



$(document).ready(function() {
    $('#brand-search').typeahead({
        ajax: {
            url: "/search-brand"
        },
        onSelect: function() {
            window.location.assign("/category/search?text="+$("#brand-search").val());
        }
    });
});

$('#textcompany').click( function() {
    window.location.assign("/category/search?text="+$("#brand-search").val());
});

var loadingImage = $('.loading');

function socialSharing(value){
    $('#sharingBrandUrl').val($(value).attr('url'));
    $('#facebookShare').attr('href', "https://www.facebook.com/sharer.php?u=" + $(value).attr('url'));
    $('#twitterShare').attr('href',"https://twitter.com/intent/tweet?url=" + $(value).attr('url'));
    $('#linkedinShare').attr('href',"https://www.linkedin.com/shareArticle?mini=true&url=" + $(value).attr('url'));
}

function copy() {
    var copyText = document.querySelector("#sharingBrandUrl");
    copyText.select();
    document.execCommand("copy");
    return false;
}
document.querySelector("#copyUrlShare").addEventListener("click", copy);

var getfreecount = 0;
var getCompareCount = 0;

function getBrandsForComparison() {
    var compareCheckedCheckboxes = $('.comparechk input[type="checkbox"]:checked');
    var screenWiseCount = 3;
    var comparePopup = $("#comparepopup");
    getCompareCount = compareCheckedCheckboxes.length;


    comparePopup.find(".count").html(getCompareCount);

    if(getCompareCount > 0) {
        $("input:checkbox[name=getFreeInfo]").attr("disabled", true);
    } else {
        $("input:checkbox[name=getFreeInfo]").attr("disabled", false);
    }


    if(window.screen.width < 767 ) {
        screenWiseCount = 2;
    }

    if(getCompareCount >= screenWiseCount) {
        $('.comparechk input[type="checkbox"]:not(:checked)').attr("disabled", true);
        compareCheckedCheckboxes.attr("disabled", false);
    } else {
        $('.comparechk input[type="checkbox"]').attr("disabled", false);

    }

    var r = [];

    if(getCompareCount > 0) {
        comparePopup.css("bottom", "7px");
        comparePopup.css("display", 'block');
    }
    else {
        comparePopup.css("bottom", "-100vh");
        comparePopup.css("display", 'none');
    }

    compareCheckedCheckboxes.each(function() {
        r.push($(this).val())
    });
    $("#franchisorsForComparison").attr("value", r);
}

function getFree() {
    var checkedInputBoxes = $("input:checkbox[name=getFreeInfo]:checked");
    var valueFran = $("#franchisorsForInv");
    var imageFran = '';
    var popupBrand = $("#brandspopup");
    var imageFranSelected = '';
    for (var e = document.getElementsByName("getFreeInfo"), t = "none", r = [], i = 0; i < e.length; i++) e[i].checked && (t = "block");

    popupBrand.find(".count").html(checkedInputBoxes.length);

    if(checkedInputBoxes.length > 0) {
        popupBrand.css("bottom", "7px");
        popupBrand.css("display", 'block');
    }
    else {
        popupBrand.css("bottom", "-100vh");
        popupBrand.css("display", 'none');
    }

    if(checkedInputBoxes.length > 0) {
        $('.comparechk input[type="checkbox"]').attr("disabled", true);
    } else {
        $('.comparechk input[type="checkbox"]').attr("disabled", false);
    }

    valueFran.attr("value", "");
    checkedInputBoxes.each(function() {

        var thisId = $(this).attr('id');
        thisId = thisId.replace("slider_", "");

        var image = $("#logo_"+thisId).attr('src');
        imageFranSelected = imageFranSelected + '<div class="selected_brand"><img src="'+image+'" alt=""></div>';
        imageFran = imageFran + '<div class="single-brand" ><img src="'+image+'" alt=""></div>';
        r.push($(this).attr("id"))
    });
    valueFran.attr("value", r);
    $('#freeBrandSingle').html(imageFran);
    $('#popupBrandFreeInfo').html(imageFranSelected);
}

$('.categories-list input[type="checkbox"]').click(function() {
    var e = [];
    var checkedCategoryInputBoxes = $('.categories-list input[type="checkbox"]:not(:checked)');
    getfreecount >= 4 ? checkedCategoryInputBoxes.attr("disabled", !0) : checkedCategoryInputBoxes.attr("disabled", !1);
    $(this).is(":checked") ? getfreecount += 1 : $(this).is(":not(:checked)") && (getfreecount -= 1);
    var t = "";
    $("input:checkbox[name=getFreeInfo]:checked").each(function() {
        t = t + '<div class="col-xs-12 col-sm-4 col-md-4"><div class="business-detail"><div class="business-name">' + $("#brandnamecategory" + $(this).attr("id")).html() + '</div><div class="business-val">' + $("#brandinvestment" + $(this).attr("id")).html() + "</div></div></div>", $("#companyblockrequest").html(t), e.push($(this).attr("id"))
    });
    $("#freeinfovalue").attr("value", e);
    $("#brandspopup").find(".count").html(getfreecount);

    if(getfreecount != 0)
        $(".brandCompareCheckbox").attr("disabled", true);
    else
        $(".brandCompareCheckbox").attr("disabled", false);
});

function getCityInfo(value){
    $.ajax({
        type:'GET',
        url:'/getcitylist',
        data:{state : value},
        success:function(data){
            $(".get-info-city").html(data);
        }
    });
}

//edit the entered mobile field
function editMobile(){
    $('#mobile').attr('readonly',false);
    $('#editmobile').css('display','none');
    $('#validatemobile').css('display','block');
    $('#otpblock').css('display','none');
}

//validate mobile from table
function validateMobile() {
    var keyword = document.getElementById('mobile').value;
    $.ajax({
        type: 'get',
        url: '/verify',
        data: {mobile: keyword},
        success : function (data) {
            if (data.check == 'numexists') {
                $('#mobile').attr('readonly',true);
            } else {
                $('#mobile').attr('readonly',true);
                $('#editmobilecontact').css('display','block');
                $('#validatemobile').css('display','none');
                document.getElementById("otpblock").style.display = "block";
                $('#galleryPopup').prop('disabled',true);
            }
        }
    });
}

//verify the otp
function verify() {
    var otp = document.getElementById('otpcontact').value;
    var mobile  = document.getElementById('mobile').value;
    $.ajax({
        type    : 'get',
        url     : '/investor/verifyotp',
        data    : {otpNo: otp, mobileNo: mobile},
        success : function (data) {
            if (data.check == 0) {
                alert("Otp Mismatch");
            } else {
                //$('#successmobile').css('display','block');
                $('#galleryPopup').prop('disabled',false);
                $('#contactsubmit').prop('disabled',false);
                $('#otpblock').css('display','none');
                $('#editmobilecontact').css('display','none');
                $('#validatemobile').css('display','none');
            }
        }

    });
}

function getMobileStatusContact(value){
    //if($('#successmobile').css('display') != "block"){
        if(value.length == 10){
            if ($.isNumeric( value )){
                $.ajax({
                    type:'GET',
                    url:'/mobcheck',
                    data:{mobile : value},
                    success:function(data){
                        if(data != 1){
                            $('#contactsubmit').prop('disabled',true);
                            $('#validatemobile').css('display','block');
                            // $('#successmobile').css('display','none');
                        }
                    }
                });
            }
        }
    // }
    if(value.length != 10){
        if ($.isNumeric( value )){
            // $('#successmobile').css('display','none');
            $('#contactsubmit').prop('disabled',false);
            $('#editmobile').css('display','none');
            $('#validatemobile').css('display','none');
        }
    }
}

function getImages(id) {
    id = id.replace("franslider_", "");
    id = id.replace("fran_", "");
    var i = 0;
    $.ajax({
        type:"GET",
        url : "/brand-gallery-images",
        data:{franId : id},
        success:function(data){

            if($(".gallery-slider").not('.slick-initialized').length == 0) {
                $('.gallery-slider').slick('unslick');
                $('.gallery-thumb').slick('unslick');
            }

            var mainImages = "";
            $.each(data, function(index, value) {
                mainImages = mainImages + '<div class="slide" style="background-image: url( '+ value['image']+ ' );"></div>';
            });

            $("#mainGalleryImages").html(mainImages);

            var thumbImages = "";
            $.each(data, function(index, value) {
                thumbImages = thumbImages + '<div class="thumbnail" style="display: inline-block;"><img src="'+ value['image']+ '" alt=""></div>';
            });
            $("#thumbGalleryImages").html(thumbImages);
            $('#expIntFranId').val(id);
            $('#franId').val(id);


            setTimeout(function () {
                $('.gallery-slider').slick({
                    prevArrow: $('.gsa_prev_arr'),
                    nextArrow: $('.gsa_next_arr'),
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    pauseOnFocus: false,
                    pauseOnHover: false,
                    pauseOnDotsHover: false,
                    asNavFor: '.gallery-thumb'
                });

                $("#GalleryModal").css("opacity","1");

                $('.gallery-thumb').slick({
                    asNavFor: '.gallery-slider',
                    slidesToShow: 5,
                    focusOnSelect: true,
                    arrows: true,
                    nextArrow: $('.gta_next_arr'),
                    prevArrow: $('.gta_prev_arr'),
                    infinite: false
                });
            }, 200);

        }
    });
}

function getMobileStatus(value) {
    if (value.length === 10) {
        if ($.isNumeric(value)) {
            $.ajax({
                type: 'GET', url: '/mobcheck', data: {mobile: value}, success: function (data) {
                    if (parseInt(data) === 1) {
                        $('#galleryPopup').prop('disabled', false);
                    } else {
                        $('#verifybutton').css('display', 'block');
                        $('#galleryPopup').prop('disabled', true);
                    }
                }
            })
        }
    }
    if (value.length !== 10) {
        if ($.isNumeric(value)) {
            $('#verifybutton').css('display', 'none');
            $('#galleryPopup').prop('disabled', true);
        }
    }
}

function verifyInstaOtp() {
    var keyword = document.getElementById('txtPhone').value;
    $.ajax({type: 'get', url: '/verify', data: {mobile: keyword}});
    document.getElementById("otpblk").style.display = "block";
    $('#verifybutton').css('display', 'none');
    $('#editmobile').css('display', 'block');
    document.getElementById("txtPhone").readOnly = !0
}
function editMobileInsta() {
    $('#verifybutton').css('display', 'block');
    $('#editmobile').css('display', 'none');
    $('#otpblk').css('display', 'none');
    document.getElementById("txtPhone").readOnly = !1
}
function checkInstaOtp() {
    var keyword = document.getElementById('otp').value;
    var mobile = document.getElementById('txtPhone').value;
    $.ajax({
        type: 'get', url: '/check', data: {otpNo: keyword, mobileNo: mobile}, success: function (data) {
            if (data === 'notexists') {
                alert("Otp Mismatch...");
            } else {
                document.getElementById("otpblk").style.display = "none";
                document.getElementById("txtPhone").readOnly = !0;
                $('#galleryPopup').prop('disabled', false);
                $('#editmobile').css('display', 'none')
            }
        }
    })
}

$("#insta").validate({
    rules: {
        name: {required: !0, accept: "[a-zA-Z\s]+", minlength: 3, maxlength: 35},
        instaemail: {required: !0, email: !0},
        mobile: {required: !0, accept: "[0-9]", minlength: 10, maxlength: 10, number: !0},
        state: "required",
        city: {required: !0},
        pincode: {required: !0, accept: "[0-9]", minlength: 6, maxlength: 6, number: !0},
        address: "required"
    },
    messages: {
        name: {required: "", accept: ""},
        email: {required: "", email: ""},
        mobile: {required: "", accept: "Please enter 10 digit mobile no", number: ""},
        state: "",
        city: {required: ""},
        pincode: {required: "", accept: "", number: ""},
        address: ""
    },
    errorPlacement: function (error, element) {
        error.appendTo(element.parent().parent())
    },
    submitHandler: function () {
        $('#btninsta').prop('disabled', !0);
        var franId = document.getElementById('franId').value;
        var name = document.getElementById('name').value;
        var email = document.getElementById('newemail').value;
        var mobile = document.getElementById('txtPhone').value;
        var state = document.getElementById('state').value;
        var city = document.getElementById('city').value;
        var pin = document.getElementById('pincode').value;
        var addr = document.getElementById('address').value;
        var newsletter = 0;
        if ($('#expressnewslettern').is(':checked')) {
            newsletter = 1
        }
        $.ajax({
            type: 'post',
            url: '/brandcontactinfo?flag=1',
            data: {
                infoname: name,
                mobile: mobile,
                infoemail: email,
                infostate: state,
                infocity: city,
                pincode: pin,
                address: addr,
                frandetailsid: franId,
                newsletter_sub: newsletter
            },
            success: function (data) {
                if (parseInt(data) === 1) {
                    $('#show-m').addClass("thankscs");
                    document.getElementById("instaMsg").style.display = "block";
                    document.getElementById("existsMsg").style.display = "none";
                    document.getElementById("insta").style.display = "none";
                }
                if (parseInt(data) === 2) {
                    $('#show-m').addClass("thankscs");
                    document.getElementById("existsMsg").style.display = "block";
                    document.getElementById("instaMsg").style.display = "none";
                    document.getElementById("insta").style.display = "none";
                }
            }
        });
        return !1
    }
});

// jQuery add toggleAttr function
jQuery.fn.toggleAttr = function (attr) {
    return this.each(function () {
        var $this = $(this);
        $this.prop(attr) ? $this.removeProp(attr) : $this.prop(attr, attr);
    });
};

// sidebar label anchor check
$('.category_selector label a').click(function (e) {
    e.preventDefault();
    if($(this).siblings('input:first').prop('checked') === true) {
        if($(this).siblings('input:first').attr('class') == "main_cat"){
            $(".main_subcat").prop('checked', false);
            $(this).siblings('input:first').prop('checked', true);
        } else if ($(this).siblings('input:first').attr('class') == "main_subcat"){
            $(".subSubCat").prop('checked', false);
            $(this).siblings('input:first').prop('checked', true);
        } else {
            $(this).siblings('input:first').prop('checked', false);
        }

    } else {
        $(this).siblings('input:first').prop('checked', true);
    }
    //getCategoryList();
});

if ($('#investment_range_sldier').length > 0) {

    var handlesSlider = document.getElementById('investment_range_sldier');

    noUiSlider.create(handlesSlider, {
        start: [$('#minvaluerange').val(), $('#maxvaluerange').val()],
        range: {
            'min': [10000],
            'max': [100000000]
        }
    });

    handlesSlider.noUiSlider.on('update', function (values, handle) {
        var start = Math.trunc(values[0]);
        var end = Math.trunc(values[1]);

        getPriceRange(start,end);

        // calculate starting value
        if (start >= 10000000) {
            start = (start / 10000000).toFixed(2) + ' Cr';
        }
        else if (start >= 100000) {
            start = (start / 100000).toFixed(2) + ' Lac';
        }
        else if (start > 10000) {
            start = ( start / 1000 ).toFixed(2) + ' K';
        }

        // calculate ending value
        if (end >= 10000000) {
            end = (end / 10000000).toFixed(2) + ' Cr';
        } else if (end >= 100000) {
            end = ( end / 100000 ).toFixed(2) + ' Lac';
        } else if (end > 10000) {
            end = (end / 1000).toFixed(2) + ' K';
        }

        $('.val_high').html(start);
        $('.val_low').html(end);

    });

}

function getPriceRange(a,b) {
    var minvaluerange = a;
    var maxvaluerange = b;
    $('#minvaluerange').prop('value',minvaluerange);
    $('#maxvaluerange').prop('value',maxvaluerange);
}

function getLocationType() {
    var location_str = [];
    $('input[name="state[]"]:checked').each(function () {
        location_str.push($(this).val());
    });
    return location_str;
}

function getFranchiseType() {
    return $("input:radio[name=franchise_type]:checked").val();
}

function getMainCatId() {
    var mainCatId = $("input:radio[name=main_cat]:checked").val();
    return (mainCatId !== undefined) ? mainCatId: '';
}

function getSubCatId() {
    var subCatId = $("input:radio[name=subCat]:checked").val();
    return (subCatId !== undefined) ? subCatId: '';
}

function getSubSubCatId() {

    var subSubCat = [];
    $('input[name="subSubCat[]"]:checked').each(function () {
        subSubCat.push($(this).val());
    });
    return subSubCat;
}

function selectSortBy(sortBy) {
    $(".sort-by").removeClass("active");
    $(sortBy).addClass("active");
    $("#active-class").removeAttr("id");
    $(sortBy).attr("id", 'active-class');
    $('.nc_sort').removeClass('sort_open');
    getSortBy();
    getCategoryList();
}

function getSortBy() {
    return $("#active-class").attr("value");
}

// $(".search-element").on('click', function(){ getCategoryList(); });

function getCategoryList() {
    var locStr        = getLocationType();
    var franchiseType = getFranchiseType();
    var mainCatmId    = getMainCatId();
    var subCat        = getSubCatId();
    var subSubCat     = getSubSubCatId();
    var sortby        = getSortBy();
    var rangeMin = $('#minvaluerange').val();
    var rangeMax = $('#maxvaluerange').val();
    var sort = (sortby && typeof(sortby) != 'undefined') ? "?sortby=" + sortby : "";

    locStr.sort(function(a, b){
        return parseInt(a)- parseInt(b);
    });

    // console.log(franchiseType);
    // console.log(mainCatmId);
    // console.log(locStr.length );
    // console.log(subSubCat.length);
    // console.log(rangeMin);
    // console.log(rangeMax);
    // return ;
    //only price filter is changed
    if(franchiseType=="" && subSubCat.length ===0 && mainCatmId == '' && locStr.length === 0 && (rangeMin != 10000 || rangeMax != 100000000)) {
        window.location = "/business-opportunities/business/range-" + rangeMin + "-" + rangeMax + sort;
        return;
    }

    //only single Franchise Type with all
    if(franchiseType=="" && subSubCat.length ===0 && mainCatmId == '' && locStr.length === 0 && rangeMin == 10000 && rangeMax == 100000000) {
        window.location = "/business-opportunities/all/all" +  sort;
        return;
    }

    //only single Franchise Type is selected
    if(franchiseType>=1 && subSubCat.length ===0 && mainCatmId == '' && locStr.length === 0 && rangeMin == 10000 && rangeMax == 100000000) {
        window.location = $("input:radio[value='" + franchiseType + "'][class='franType']").attr('url') + sort;
        return;
    }

    //only single sub sub category is selected
    if(subSubCat.length ===1 && locStr.length === 0 && franchiseType == '' && rangeMin == 10000 && rangeMax == 100000000){
        window.location = $("input:checkbox[value='" + subSubCat[0] + "'][class='subSubCat']").attr('url') + sort;
        return;
    }

    //only single location is selected
    if(subSubCat.length ===0 && mainCatmId == ''  && franchiseType =='' && locStr.length === 1 && rangeMin == 10000 && rangeMax == 100000000){
        window.location = $("input:checkbox[value='" + locStr[0] + "'][class='statecheckbox']").attr('url') + sort;
        return;
    }

    //single location with franchise Type is selected
    if(subSubCat.length ===0 && mainCatmId == '' && locStr.length === 1 && franchiseType>=1 && rangeMin == 10000 && rangeMax == 100000000){
        var ft = $("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug');
        var loc = $("input:checkbox[value='" + locStr[0] + "'][class='statecheckbox']").attr('slug');
        window.location = "/business-opportunities/business-"+ft+"-in-"+loc+"/loc-" + locStr.join("-") + "/ft-" +franchiseType + sort;
        return;
    }

    //multiple location is with franchise Type selected
    if(subSubCat.length ===0 && mainCatmId == '' && locStr.length > 1 && franchiseType>=1 && rangeMin == 10000 && rangeMax == 100000000){
        var ft = $("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug');
        window.location = "/business-opportunities/business-"+ft+"-in-india/loc-" + locStr.join("-") + "/ft-" +franchiseType + sort;
        return;
    }

    //multiple location is selected
    if(subSubCat.length ===0 && mainCatmId == '' && locStr.length > 1 && rangeMin == 10000 && rangeMax == 100000000){
        window.location = "/business-opportunities/business-in-india/loc-" + locStr.join("-") + sort;
        return;
    }

    //only single sub category is selected
    if(subSubCat.length ===0 && subCat !== '' && locStr.length === 0 && franchiseType == '' && rangeMin == 10000 && rangeMax == 100000000){
        window.location = $("input:radio[value='"+subCat+"'][class='main_subcat']").attr('url') + sort;
        return;
    }

    //only single main category is selected
    if(subSubCat.length ===0 && mainCatmId !== ''  && locStr.length === 0 && franchiseType == '' && rangeMin == 10000 && rangeMax == 100000000){
        window.location = $("input:radio[value='"+mainCatmId+"'][class='main_cat']").attr('url') + sort;
        return;
    }

    // alert(12);
    $('#loc').prop('value',locStr);
    $('#ftype').prop('value',franchiseType);
    $('#mc').prop('value',mainCatmId);
    $('#sc').prop('value',subCat);
    $('#ssc').prop('value',subSubCat);
    $('#sortby').prop('value',sortby);


    var location = "india";
    var catText = $("input:radio[value='"+mainCatmId+"'][class='main_cat']").attr('slug');
    var catId = "mc-" + mainCatmId;
    if(locStr.length === 1){
        location = $("input:checkbox[value='" + locStr[0] + "'][class='statecheckbox']").attr('slug');
    }
    if(subSubCat.length === 1){
        catText = $("input:checkbox[value='" + subSubCat[0] + "'][class='subSubCat']").attr('slug');
        catId = "ssc-"+subSubCat[0];
    }else if((subSubCat.length > 1) || (subSubCat.length === 0 && subCat) ){
        catText  = $("input:radio[value='"+subCat+"'][class='main_subcat']").attr('slug');
        if(subSubCat.length > 1) {
            catId = "ssc-"+subSubCat.join('-');
        }else{
            catId = "sc-"+subCat;
        }
    }
    var url = "/business-opportunities/";

    if(typeof catText != "undefined")
        url = url + catText;
    else
        url = url + "business";

    if(franchiseType && franchiseType>=1){
        url += "-" + $("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug');
    }
    url += "-in-" + location;
    if(franchiseType && franchiseType>=1){
        url +=  "/ft-"+franchiseType;
    }
    url += "/" + catId;

    if(locStr.length > 0){
        url += "/loc-" + locStr.join("-");
    }
    if(rangeMin != 10000 || rangeMax != 100000000){
        url += "/range-" + rangeMin + "-" + rangeMax;
    }

    window.location =url + sort;
    $('#loading').css('display','block');

}

// $('#investment_range_sldier').on('click keyup change', function(e) { getCategoryList(); });

// $('.statecheckbox, .franType, .subSubCat').on('change', function(e) { getCategoryList(); });
$('.apply_filter').on('click', function() { getCategoryList(); $('.category_selector').removeClass('filter_open');});

window.onscroll = function() {
    if(loadingImage.is(":hidden")){
        if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight-1000)) {
            loadingImage.show();
            $.ajax({
                type: "get",
                url: window.location.href,
                data: {offset: $('.brand-count').length},
                success: function(data) {
                    var newHtml = "";
                    var smallAds = $('.ad-image').length + 1;
                    var totalCount = parseInt($("#currentCount").html()) + data.length;
                    $("#currentCount").html(totalCount);

                    if(data.length > 0)
                        pageCountDisplay();

                    $.each(data, function(index, value) {
                        newHtml = newHtml + '<div class="col-xl-4 col-lg-4 col-sm-6 brand-count">' +
                            '<div>' +
                            '<div class="franchise-card card">' +
                            '<div class="card-inner">' +
                            '<a href="'+ value['brand_url'] +'">' +
                            '<div class="card-header">' +
                            '<div class="fimg">' +
                            '<img src="'+ value['logo'] +'" alt="'+ value['company_name'] +'" id="logo_'+ value['franchisor_id'] +'">' +
                            '</div>' +
                            '</div>' +
                            '</a>' +

                            '<div class="card-body body-inner">' +
                            '<div class="flinks">' +
                            '<a href="'+ value['brand_url'] +'" class="ftitle">'+ value['company_name'] +'</a>' +
                            '<a href="#" class="fcategory">'+ value['sub_category'] +'</a>' +
                            '</div>' +
                            '<div class="fcontent">' +
                            '<div class="fsingle">' +
                            '<span class="ftitle">Investment</span>' +
                            '<span class="fcontent">'+ value['investment'] +'</span>' +
                            '</div>' +
                            '<div class="fsingle">' +
                            '<span class="ftitle">Space req.</span>' +
                            '<span class="fcontent">'+ value['area'] +'</span>' +
                            '</div>' +
                            '<div class="fsingle">' +
                            '<span class="ftitle">Outlet</span>' +
                            '<span class="fcontent">'+ value['no_fran_outlets'] +'</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="card-overlay">' +
                            '<div class="card-header">' +
                            '<a href="'+ value['brand_url'] +'" class="fmeta">' +
                            '<img src="'+ value['logo'] +'" alt="">' +
                            '</a>' +
                            '<div class="fmeta">' +
                            '<div class="ftitle btn-compare comparechk">' +
                            '<label><input type="checkbox" id="compare'+ index +'" class="brandCompareCheckbox" name="compareCheckbox" value="'+ value['franchisor_id'] +'" >' +
                            '<span class="compare"><strong>Add To Compare</strong></span></label>' +
                            '</div>' +
                            '<div class="fdesc">' +
                            '<span class="set1">' +
                            '<i class="fa fa-thumbs-up like_gm" aria-hidden="true"></i>' +
                            '<span class="count">'+ value['likes'] +'</span>' +
                            '</span>' +
                            '<span class="social-share" data-toggle="modal" data-target="#socialsharepopup" onclick="socialSharing(this)" url="'+ value['brand_url'] +'">' +
                            '<i class="fa fa-share-alt share_gm" aria-hidden="true"></i>' +
                            '</span>' +
                            '<div class="set1">' +
                            '<i class="fas fa-star like_gm"></i>' +
                            '<span class="count">'+ value['ratings'] +'</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="flocation"><strong>Locations looking for expansion :</strong> '+ value['states'] +'</div>' +
                            '<div class="fcontent">'+
                            '<div class="fsingle">'+
                            '<span class="ftitle">'+ value['type'] +'</span>'+
                            '<span class="fcontent">'+ value['partner_type'] +'</span>' +
                            '</div>'+
                            '<div class="fsingle">'+
                            '<span class="ftitle">Headquarter</span>'+
                            '<span class="fcontent">'+ value['city'] +'</span>'+
                            '</div>'+
                            '<div class="fsingle">'+
                            '<span class="ftitle">Year Estd.</span>'+
                            '<span class="fcontent">'+ value['franchise_start_year'] +'</span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="fright">' +
                            '<a class="btn btn-danger" href="'+ value['brand_url'] +'">View Brand</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="card-footer">' +
                            '<a href="#" data-toggle="modal" data-target="#GalleryModal" onclick="getImages(this.id)" id="fran_'+ value['franchisor_id'] +'"';

                        if( value['premium'] != 1 )
                            newHtml = newHtml + 'style="display:none;"';

                        newHtml = newHtml + '>View photo gallery <i class="fas fa-arrow-right"></i></a>' +
                            '<label for="'+ value['franchisor_id'] +'" class="btn btn-primary free-info-check">' +
                            '<input type="checkbox" class="getFreeInfo" id="'+ value['franchisor_id'] +'" name="getFreeInfo"/>' +
                            '<span>' +
                            '<i class="fas fa-plus"></i>' +
                            '<i class="fas fa-check"></i>' +
                            'Get Free Info' +
                            '</span>' +
                            '</label>' +
                            '</div>' +
                            '<div class="less-info">' +
                            '<i class="fa fa-angle-left"></i>' +
                            '</div>' +
                            '<div class="more-info">' +
                            '<i class="fa fa-angle-right"></i>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        //if((smallAds) < 16 ) {
                            if(index == 3 || index == 14 || index == 19) {
                                if (typeof googletag != 'undefined') {
                                    googletag.cmd.push(function() {
                                        googletag.defineSlot('/1057625/New_Category/CP_300x250', [300, 250], 'div-gpt-ad-1563348795825-' + smallAds).addService(googletag.pubads());
                                    });
                                }
                                newHtml = newHtml + '<div class="col-xl-4 col-lg-4 col-sm-6"><div class="franchise-card card ad-image"><div id="div-gpt-ad-1563348795825-'+ smallAds +'" style="width: 300px; height: 250px;"></div></div></div>';
                                smallAds = smallAds + 1;
                            }
                        //}
                    });

                    $('#brand-result').append(newHtml);
                    googletag.pubads().refresh();
                    loadingImage.hide();
                }
            });
        }
    }
};


$(document).on('click', '.brandCompareCheckbox', function (e) {
    var x = getBrandsForComparison();
});

$(document).on('click', '.getFreeInfo', function (e) {
    var y = getFree();
});

$(document).on('click', '.more-info', function (e) {
    $(this).siblings('.card-overlay').addClass('show');
    $(this).siblings('.less-info').show();
    $(this).siblings('.card-overlay').css('pointer-events', 'auto');
    $(this).hide();
});


$(document).on('click', '.less-info', function (e) {
    $(this).siblings('.card-overlay').removeClass('show');
    $(this).siblings('.card-overlay').css('pointer-events', 'none');
    $(this).hide();
    $(this).siblings('.more-info').show();
});


$(document).on('click', '.free-info-check input', function (e) {
    if($("input:checkbox[name=compareCheckbox]").length > 0)
        $(this).parent('label').toggleClass('checked-btn');
});

$(".getFreePopupClose").on("click", function(){
    $('.checked-btn').removeClass('checked-btn');
    $("input:checkbox[name=getFreeInfo]").prop("checked", false);
    $("input:checkbox[name=compareCheckbox]").removeAttr("disabled");
});

$(".comparePopupClose").on("click", function(){
    $("input:checkbox[name=compareCheckbox]").prop("checked", false);
    $("input:checkbox[name=getFreeInfo]").removeAttr("disabled");
});

function pageCountDisplay(){

    if (typeof (history.pushState) != "undefined") {
        var url = new URL(window.location.href);

        var query_string = url.search;

        var search_params = new URLSearchParams(query_string);

        var currentPage = 2;
        if(!(search_params.get("page") == "null" || search_params.get("page") == null || typeof  search_params.get("page") === undefined))
            currentPage = parseInt(search_params.get("page"))+1;

        search_params.set('page', currentPage);

        // change the search property of the main url
        url.search = search_params.toString();

        // the new url string
        var new_url = url.toString();

        var obj = { Title: $('title').html(), Url: new_url };

        history.pushState(obj, obj.Title, obj.Url);
    } else {
        console.log("browser don't support html 5");
    }
}