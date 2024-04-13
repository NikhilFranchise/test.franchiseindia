
window.onload = function() {
    $("#userNav").slideDown(700);
};

function toggleIcon(e) {
    $(e.target).prev(".panel-heading").find(".more-less").toggleClass("fa-plus fa-minus")
}

function closeAccordionCategory() {
    $(".category-lst .main-lst").removeClass("active"), $(".category-lst .cat-main-list").slideUp(300).removeClass("open")
}

function accordionCategory(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionCategory() : (closeAccordionCategory(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordionSubCategory() {
    $(".category-lst .sub-lst").removeClass("active"), $(".category-lst .cat-sub-list").slideUp(300).removeClass("open")
}

function accordionSubCategory(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionSubCategory() : (closeAccordionSubCategory(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordionLocation() {
    $(".category-lst .loc-main-lst").removeClass("active"), $(".category-lst .loc-main-list").slideUp(300).removeClass("open")
}

function accordionLocation(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionLocation() : (closeAccordionLocation(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordionSubLocation() {
    $(".category-lst .loc-sub-lst").removeClass("active"), $(".category-lst .loc-sub-list").slideUp(300).removeClass("open")
}

function accordionSubLocation(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionSubLocation() : (closeAccordionSubLocation(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordiondisCategory() {
    $(".category-lst .dis-main-lst").removeClass("active"), $(".category-lst .dis-cat-main-list").slideUp(300).removeClass("open")
}

function accordiondisCategory(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordiondisCategory() : (closeAccordiondisCategory(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordionDisSubCategory() {
    $(".category-lst .dis-sub-lst").removeClass("active"), $(".category-lst .dis-cat-sub-list").slideUp(300).removeClass("open")
}

function accordionSubDisCategory(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionDisSubCategory() : (closeAccordionDisSubCategory(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeDisAccordionLocation() {
    $(".category-lst .des-loc-main-lst").removeClass("active"), $(".category-lst .des-loc-main-list").slideUp(300).removeClass("open")
}

function accordionDisLocation(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeDisAccordionLocation() : (closeDisAccordionLocation(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function closeAccordionDisSubLocation() {
    $(".category-lst .des-loc-sub-lst").removeClass("active"), $(".category-lst .des-loc-sub-list").slideUp(300).removeClass("open")
}

function accordionDisSubLocation(e) {
    var t = e;
    $("#" + t).hasClass("active") ? closeAccordionDisSubLocation() : (closeAccordionDisSubLocation(), $("#" + t).addClass("active"), $("#" + t + "_1").slideDown(300).addClass("open"))
}

function getfree() {
    for (var e = document.getElementsByName("getFreeInfo"), t = "none", r = [], i = 0; i < e.length; i++) e[i].checked && (t = "block");
    $("#getFreeInfo").css("display", t), $("input:checkbox[name=getFreeInfo]:checked").each(function() {
        r.push($(this).attr("id"))
    }), $("#franchisorsForInv").attr("value", r)
}

function getBrandsForComparison() {
    for (var e = document.getElementsByName("compareCheckbox"), t = "none", r = [], i = 0; i < e.length; i++) e[i].checked && (t = "block");
    $("#comparebottom").css("display", t),
    $("input:checkbox[name=compareCheckbox]:checked").each(function() {
        r.push($(this).val())
    }),
    $("#franchisorsForComparison").attr("value", r)
}

$('.comparebtn').on('click', function () {

    if($("#getFreeInfo").css('display') == 'block')
        return false;

    if( $( ".comparechk" ).first().css( "display" ) != 'block') {
        $('.brandFreeInfoCheckbox').attr('disabled', true);
    } else {
        $('.brandFreeInfoCheckbox').attr('disabled', false);
    }

    $(".comparechk").toggle(1);
    $("#comparebottom").toggle(1);
});

$(document).ready(function() {

    $('.btnclose').click(function() {
        $("#userNav").slideUp(700);
    });

    function e() {
        $(".demo-show > h5 > a").removeClass("opened"), $(".demo-show > div").slideUp(300).removeClass("open")
    }

    $(".demo-show > h5 > a").click(function(t) {
        var r = $(this).attr("href");
        $(t.target).is(".opened") ? e() : (e(), $(this).addClass("opened"), $(r).slideDown(300).addClass("open")), t.preventDefault()
    });

    $("#buttonAreaHide").click(function() {
        $("#show-full-txt").slideUp("slow");
        $('#buttonAreaHide').hide();
        $('#buttonAreaShow').show();
    });

    $("#buttonAreaShow").click(function() {
        $("#show-full-txt").slideDown("slow");
        $('#buttonAreaHide').show();
        $('#buttonAreaShow').hide();
    });

    $(".check-existing-registered-investor").bind("focusout", function() {
        var x = $(this);
        $.ajax({
            type:'GET',
            url:'/check-existing-registration',
            data:{email : $(this).val()},
            success:function(data){
                if(data != 0){
                    // x.parent().append("<span style='color: red;'>You have an account associated with us already. Please login and apply.</span>");
                    alert("Your Investor account is already associated with us. Please login into your account and apply easily with one click.");
                }
            }
        });
    });

}); $('input:radio[name="investmentDetailInvestor"]').change(function() {
    this.checked && "1" == this.value ? ($(".investmentDetailInput").slideToggle(), $("#address").prop("required", !0), $("#property_use").prop("required", !0), $("#address").attr("name", "property_address"), $("#property_use").attr("name", "property_use"), $("#min_area").attr("name", "min_area"), $("#max_area").attr("name", "max_area"), $("#parking").attr("name", "parking_space"), $("#parking1").attr("name", "parking_space")) : ($(".investmentDetailInput").slideToggle(), $("#address").prop("required", !1), $("#property_use").prop("required", !1), $("#address").removeAttr("name"), $("#property_use").removeAttr("name"), $("#min_area").removeAttr("name"), $("#max_area").removeAttr("name"), $("#parking").removeAttr("name"), $("#parking1").removeAttr("name"))
}); $('input:radio[name="businessDetailInvestor"]').change(function() {
    this.checked && "1" == this.value ? ($(".BusinessDetailInput").slideToggle(), $("#investor_ind_prev_bus").attr("name", "business_industry_type"), $("#business_number_of_years").attr("name", "business_number_of_years"), $("#no_of_employees_business").attr("name", "number_of_employees"), $("#business_type").attr("name", "business_type"), $("#no_of_employees_business").prop("required", !0), $("#business_type").prop("required", !0), $("#investor_ind_prev_bus").prop("required", !0), $("#fexp0").attr("name", "experience_in_franchise"), $("#fexp1").attr("name", "experience_in_franchise")) : ($(".BusinessDetailInput").slideToggle(), $("#investor_ind_prev_bus").removeAttr("name"), $("#business_number_of_years").removeAttr("name"), $("#no_of_employees_business").removeAttr("name"), $("#business_type").removeAttr("name"), $("#no_of_employees_business").prop("required", !1), $("#business_type").prop("required", !1), $("#investor_ind_prev_bus").prop("required", !1), $("#fexp0").removeAttr("name"), $("#fexp1").removeAttr("name"))
}); $('input:radio[name="jobDetailInvestor"]').change(function() {
    this.checked && "1" == this.value ? ($(".jobDetailInput").slideToggle(), $("#job_industry_type").attr("name", "job_industry_type"), $("#job_number_of_years").attr("name", "job_number_of_years"), $("#job_number_of_years").prop("required", !0), $("#job_industry_type").prop("required", !0), $("#any_other_industry").prop("name", "any_other_industry")) : ($(".jobDetailInput").slideToggle(), $("#job_industry_type").removeAttr("name"), $("#any_other_industry").removeAttr("name"), $("#job_number_of_years").removeAttr("name"), $("#job_industry_type").prop("required", !1), $("#job_number_of_years").prop("required", !1))
});
$('input:radio[name="marketting_material"]').change(function() {
    this.checked && this.value, $(".marketingMaterialsAvailableInput").slideToggle()
});

$('input:radio[name="is_looking_intl_franchise"]').change(function() {
    this.checked && "1" == this.value ? ($(".internationalFranchiseeInputs").slideToggle(),  $("#step3reg").prop("disabled", !0), $("#franchiseError").css("display", "block")) : ($(".internationalFranchiseeInputs").slideToggle(), $("#step3reg").prop("disabled", !1), $("#franchiseError").css("display", "none"), $("#international").find("input[type=checkbox]:checked").prop("checked", !1))
}),
    $(".panel-group").on("hidden.bs.collapse", toggleIcon), $(".panel-group").on("shown.bs.collapse", toggleIcon), $('input:radio[name="membership_plan"]').change(function() {
    this.checked && this.value > 1 ? ($(".membershipWiseInput").show(), $("#company_logo").prop("required", !0), $("#company_logo").prop("name", "company_logo"), $("#video_link").prop("name", "video_link")) : ($(".membershipWiseInput").hide(), $("#company_logo").prop("required", !1), $("#company_logo").removeAttr("name"), $("#video_link").removeAttr("name"))
}), $(".business-cat-menu").hover(function() {
    $(".cat-list").css("display", "block")
}, function() {
    $(".cat-list").css("display", "none")
}), $(".lft-menu li").hover(function() {
    $(this).find(".rht-menu").css("display", "block")
}, function() {
    $(this).find(".rht-menu").css("display", "none")
}), $(window).scroll(function(e) {
    var t = $(".fixedTitle"),
        r = $(".fixedTitle").width(),
        i = $("#bdy-height").outerHeight();
    $(".fixedTitle").css({
        width: r
    });
    var n = "fixed" == t.css("position");
    $(this).scrollTop() > 155 && $(this).scrollTop() < i && !n && $(".fixedTitle").css({
        position: "fixed",
        top: "0px"
    }), ($(this).scrollTop() < 154 || $(this).scrollTop() > i && n) && $(".fixedTitle").css({
        position: "relative",
        top: "0px"
    })
});
var getfreecount = 0;
var getCompareCount = 0;

function frg_panel() {
    $("#lg-pnl").hide(), $("#frg-pnl").show()
}

function lg_panel() {
    $("#lg-pnl").show(), $("#loginactive").click(), $("#frg-pnl").hide()
}

$('.categories-list input[type="checkbox"]').click(function() {
    var e = [];
    getfreecount >= 4 ? $('.categories-list input[type="checkbox"]:not(:checked)').attr("disabled", !0) : $('.categories-list input[type="checkbox"]:not(:checked)').attr("disabled", !1), $(this).is(":checked") ? getfreecount += 1 : $(this).is(":not(:checked)") && (getfreecount -= 1);
    var t = "";
    $("input:checkbox[name=getFreeInfo]:checked").each(function() {
        t = t + '<div class="col-xs-12 col-sm-4 col-md-4"><div class="business-detail"><div class="business-name">' + $("#brandnamecategory" + $(this).attr("id")).html() + '</div><div class="business-val">' + $("#brandinvestment" + $(this).attr("id")).html() + "</div></div></div>", $("#companyblockrequest").html(t), e.push($(this).attr("id"))
    }), $("#freeinfovalue").attr("value", e), $("#getFreeInfo .count").html(getfreecount);


    if(getfreecount != 0) {
        $(".brandCompareCheckbox").attr("disabled", true);
    } else {
        $(".brandCompareCheckbox").attr("disabled", false);
    }

});

$('.comparechk input[type="checkbox"]').click(function() {
    var e = [];

    $(this).is(":checked") ? getCompareCount += 1 : $(this).is(":not(:checked)") && (getCompareCount -= 1);
    $("#comparebottom").find(".count").html(getCompareCount);

    if(getCompareCount != 0) {
        $(".brandFreeInfoCheckbox").attr("disabled", true);
    } else {
        $(".brandFreeInfoCheckbox").attr("disabled", false);
    }

    var screenWiseCount = 3;

    if(window.screen.width < 767 ) {
        screenWiseCount = 2;
    }

    if(getCompareCount >= screenWiseCount) {
        $('.comparechk input[type="checkbox"]:not(:checked)').attr("disabled", true);
        $('.comparechk input[type="checkbox"]:checked').attr("disabled", false);
    } else {
        $('.comparechk input[type="checkbox"]').attr("disabled", false);

    }
});

$('.videoslider').bxSlider({
    auto: true,
    autoControls: true,
    minSlides: 1,
    maxSlides: 12,
    slideWidth: 300,
    slideMargin: 0,
    controls: false,
    adaptiveHeight: 'true'
});

$('.bxslidervm').bxSlider({
    minSlides: 3,
    maxSlides: 3,
    slideWidth: 275,
    slideMargin: 15,
    controls: false
});

$('.bxslider').bxSlider({
    auto: true,
    autoControls: true,
    minSlides: 1,
    maxSlides: 12,
    slideMargin: 0,
    controls: false,
    adaptiveHeight: 'true'
});



/*************** Home Page News slider **************/
$('.sliderfunction').one('shown.bs.tab', function() {
    $('.bxslider_news').bxSlider({
        minSlides: 1,
        maxSlides: 12,
        slideWidth: 860,
        slideMargin: 0,
        controls: false,
        adaptiveHeight: 'true'

    });
});

/*************** Home Page Whats new slider **************/
var listWidth = $('.list-width-new').outerWidth();
$('.bxsliderarticle').bxSlider({
    minSlides: 1,
    maxSlides: 12,
    slideWidth: listWidth,
    slideMargin: 0,
    controls: false,
    adaptiveHeight: 'true'

});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));

}
