/**
 * Created by Pawan Arya on 10/11/20.
 */

$("#exampleFormControlSelect1").change(function () {
    // set the window's location property to the value of the option the user has selected
    window.location = $(this).val();
});

$("#exampleFormControlSelect2").change(function () {
    // set the window's location property to the value of the option the user has selected
    window.location = $(this).val();
});

$(document).ready(function () {
    $("#btnhome1").click(function (event) {
        event.preventDefault(); // Prevent form submission
        // console.log('hello');

        var type = $("input[name='optionsRadios1']:checked").val();
        var name = $("#namefreeadvice1").val();
        var email = $("#emailfreeadvice1").val();
        var mobile = $("#mobilefreeadvice1").val();
        var details = $("#detailsfreeadvice1").val();
        var pincode = $("#pincodefreeadvice1").val();
        var is_newsletter = $("#is_newsletterfreeadvice1").is(":checked") ? 1 : 0;
        var csrf_token = $("input[name='_token']").val();

        var hasError = false;

        if (name && email && mobile) {
            if (!hasError) {
                var data = {
                    _token: csrf_token,
                    optionsRadios: type,
                    name: name,
                    pincode: pincode,
                    email: email,
                    mobile: mobile,
                    details: details,
                    is_newsletter: is_newsletter
                };

                $.ajax({
                    type: 'POST',
                    url: '/freeadvice-home',
                    data: data,
                    beforeSend: function () {
                        $('#btnhome1').val('Please wait...');
                        // console.log('i am here33');
                    },
                    success: function (response) {
                        // alert('Success');
                        window.location = "/thanks-advice-form";
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + error);
                    },
                    complete: function () {
                        $('#btnhome1').val('Ask Our Experts');
                    }
                });
            }
        } else {
            $("#errMsg1").show();
        }
    });
});







function frg_panel() {
    $("#lg-pnl").hide(), $("#frg-pnl").show();
}

function lg_panel() {
    $("#lg-pnl").show(), $("#loginactive").click(), $("#frg-pnl").hide();
}

$("#registerselect").click(function () {
    $("#registeractive").click();
});
$("#loginselect").click(function () {
    $("#loginactive").click();
});
$("#mobilereg").click(function () {
    $("#registeractive").click();
});

$("#registerselect1").click(function () {
    $("#login").addClass("active");
    $("#register").removeClass("active");
    $("#loginactiveopen").addClass("active");
    $("#registeractiveopen").removeClass("active");
});

$("#loginselect1").click(function () {
    $("#login").removeClass("active");
    $("#register").addClass("active");
    $("#loginactiveopen").removeClass("active");
    $("#registeractiveopen").addClass("active");
});

function submitCategory() {
    var subSubCat = $("#getSubCatCategoryDataHeader").val();
    var subCat = $("#getSubCategoryDataHeader").val();
    var mainCat = $("#getMainCategoryDataHeader").val();
    var url = "/business-opportunities/";
    if (subSubCat) {
        url =
            url +
            $("option:selected", $("#getSubCatCategoryDataHeader")).attr(
                "slug"
            ) +
            ".ssc" +
            subSubCat +
            "?catTab=1";
    } else if (subCat) {
        url =
            url +
            $("option:selected", $("#getSubCategoryDataHeader")).attr("slug") +
            ".sc" +
            subCat +
            "?catTab=1";
    } else if (
        mainCat &&
        typeof $("option:selected", $("#getMainCategoryDataHeader")).attr(
            "slug"
        ) !== "undefined"
    ) {
        url =
            url +
            $("option:selected", $("#getMainCategoryDataHeader")).attr("slug") +
            ".m" +
            mainCat +
            "?catTab=1";
    } else {
        url = url + "all/all";
    }
    //        window.location = url;
    window.open(url, "_blank");
    return false;
}

function submitLocation() {
    var mainCat = $("#getMainCategoryDataHeaderLoc").val();
    var headerCity = $("#headercity").val();
    var stateHeader = $("#stateHeader").val();
    var mainCatText = $(
        "option:selected",
        $("#getMainCategoryDataHeaderLoc")
    ).attr("slug");
    var headerCityText = $("option:selected", $("#headercity")).attr("slug");
    var stateHeaderText = $("option:selected", $("#stateHeader")).attr("slug");
    var url = "/business-opportunities/";
    if (mainCat != "" && stateHeader != "" && headerCity != "") {
        url =
            url +
            mainCatText +
            "-in-" +
            stateHeaderText +
            "/mc-" +
            mainCat +
            "/loc-" +
            stateHeader +
            "/ct-" +
            headerCityText;
    } else if (mainCat != "" && stateHeader != "") {
        url =
            url +
            mainCatText +
            "-in-" +
            stateHeaderText +
            "/mc-" +
            mainCat +
            "/loc-" +
            stateHeader;
    } else if (stateHeader != "" && headerCity != "") {
        url =
            url +
            "business-in-" +
            stateHeaderText +
            "/loc-" +
            stateHeader +
            "/ct-" +
            headerCityText;
    } else if (stateHeader != "") {
        url = url + stateHeaderText + ".LOC" + stateHeader;
    } else {
        //alert(url);
        url = url + "all/all";
        window.open(url, "_blank");
    }
    //        window.location = url + "?locTab=1";r
    window.open(url + "?locTab=1", "_blank");
    return false;
}

function submitInvestment() {
    var mainCat = $("#getMainCategoryDataHeaderInv").val();
    var minAmount = $("#minAmount").val();
    var maxAmount = $("#maxAmount").val();
    var mainCatText = $(
        "option:selected",
        $("#getMainCategoryDataHeaderInv")
    ).attr("slug");
    var minAmountText = $("option:selected", $("#minAmount")).attr("slug");
    var maxAmountText = $("option:selected", $("#maxAmount")).attr("slug");
    var url = "/business-opportunities/";
    if (mainCat != "" && minAmount != "" && maxAmount != "") {
        url =
            url +
            mainCatText +
            "-in-india/mc-" +
            mainCat +
            "/range-" +
            minAmountText +
            "-" +
            maxAmountText;
    } else if (mainCat != "" && minAmount != "") {
        url =
            url +
            mainCatText +
            "-in-india/mc-" +
            mainCat +
            "/range-" +
            minAmountText;
    } else if (minAmount != "" && maxAmount != "") {
        url = url + "business/range-" + minAmountText + "-" + maxAmountText;
    } else {
        window.open(url + "all/all?invTab=1", "_blank");
    }
    //        window.location = url + "?invTab=1";
    window.open(url + "?invTab=1", "_blank");
    return false;
}

function submitCategory1() {
    var subSubCat = $("#getSubCatCategoryDataHeader1").val();
    var subCat = $("#getSubCategoryDataHeader1").val();
    var mainCat = $("#getMainCategoryDataHeader1").val();
    var url = "/business-opportunities/";

    if (subSubCat) {
        url =
            url +
            $("option:selected", $("#getSubCatCategoryDataHeader1")).attr(
                "slug"
            ) +
            ".ssc" +
            subSubCat +
            "?catTab=1";
    } else if (subCat) {
        url =
            url +
            $("option:selected", $("#getSubCategoryDataHeader1")).attr("slug") +
            ".sc" +
            subCat +
            "?catTab=1";
    } else if (
        mainCat &&
        typeof $("option:selected", $("#getMainCategoryDataHeader1")).attr(
            "slug"
        ) !== "undefined"
    ) {
        url =
            url +
            $("option:selected", $("#getMainCategoryDataHeader1")).attr(
                "slug"
            ) +
            ".m" +
            mainCat +
            "?catTab=1";
    } else {
        url = url + "all/all";
    }
    //        window.location = url;
    window.open(url, "_blank");
    return false;
}

function submitLocation1() {
    var mainCat = $("#getMainCategoryDataHeaderLoc1").val();
    var headerCity = $("#headercity1").val();
    var stateHeader = $("#stateHeader1").val();
    var mainCatText = $(
        "option:selected",
        $("#getMainCategoryDataHeaderLoc1")
    ).attr("slug");
    var headerCityText = $("option:selected", $("#headercity1")).attr("slug");
    var stateHeaderText = $("option:selected", $("#stateHeader1")).attr("slug");
    var url = "/business-opportunities/";
    if (mainCat != "" && stateHeader != "" && headerCity != "") {
        url =
            url +
            mainCatText +
            "-in-" +
            stateHeaderText +
            "/mc-" +
            mainCat +
            "/loc-" +
            stateHeader +
            "/ct-" +
            headerCityText;
    } else if (mainCat != "" && stateHeader != "") {
        url =
            url +
            mainCatText +
            "-in-" +
            stateHeaderText +
            "/mc-" +
            mainCat +
            "/loc-" +
            stateHeader;
    } else if (stateHeader != "" && headerCity != "") {
        url =
            url +
            "business-in-" +
            stateHeaderText +
            "/loc-" +
            stateHeader +
            "/ct-" +
            headerCityText;
    } else if (stateHeader != "") {
        url = url + stateHeaderText + ".LOC" + stateHeader;
    } else {
        //alert(url);
        url = url + "all/all";
        window.open(url, "_blank");
    }
    //        window.location = url + "?locTab=1";r
    window.open(url + "?locTab=1", "_blank");
    return false;
}

function submitInvestment1() {
    var mainCat = $("#getMainCategoryDataHeaderInv1").val();
    var minAmount = $("#minAmount1").val();
    var maxAmount = $("#maxAmount1").val();
    var mainCatText = $(
        "option:selected",
        $("#getMainCategoryDataHeaderInv1")
    ).attr("slug");
    var minAmountText = $("option:selected", $("#minAmount1")).attr("slug");
    var maxAmountText = $("option:selected", $("#maxAmount1")).attr("slug");
    var url = "/business-opportunities/";
    if (mainCat != "" && minAmount != "" && maxAmount != "") {
        url =
            url +
            mainCatText +
            "-in-india/mc-" +
            mainCat +
            "/range-" +
            minAmountText +
            "-" +
            maxAmountText;
    } else if (mainCat != "" && minAmount != "") {
        url =
            url +
            mainCatText +
            "-in-india/mc-" +
            mainCat +
            "/range-" +
            minAmountText;
    } else if (minAmount != "" && maxAmount != "") {
        url = url + "business/range-" + minAmountText + "-" + maxAmountText;
    } else {
        window.open(url + "all/all?invTab=1", "_blank");
    }
    //        window.location = url + "?invTab=1";
    window.open(url + "?invTab=1", "_blank");
    return false;
}
