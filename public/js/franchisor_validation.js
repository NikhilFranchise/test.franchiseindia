//Franchisor Step 1 personal validation code start here
$.validator.addMethod("pwdcheck", function(value) {
    return /^[A-Za-z0-9\d=!@#$%\^&*(){}[\]<>?/|\-_]*$/.test(value) // consists of only these
        && /[A-Z]/.test(value) // has a uppercase letter
        && /[a-z]/.test(value) // has a lowercase letter
        && /\d/.test(value) // has a digit   
        && /[!@#$%\^&*(){}[\]<>?/|\-_]/.test(value) // has a special charcter  
});

//check greater than value
$.validator.addMethod("greaterThan", function (value, element, param) {
    var $min=$(param);
    if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
            $(element).valid();
        }
        );
    }
    return parseInt(value) >=parseInt($min.val());
}

, "Max must be greater than min");
//accept values validation method
jQuery.validator.addMethod("accept", function(value, element, param) {
    return value.match(new RegExp("." + param + "$"));
}

);
//check letters only validation
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^([\s.]?[a-zA-Z]+)+$/i.test(value);
}

, "Letters only please");
//alpanumeric values validation
jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}

, "Letters, numbers, and underscores only please");
$(document).ready(function() {
    $('input[title!=""]').hint();
    $('textarea[title!=""]').hint();
    $('select[title!=""]').hint();
    $('.nextBtn1').click(function() {
        //investor Step 1 Validation code start here
        var validatorFormStep1=$("#franchisorRegform").validate( {
            rules: {
                email: {
                    required: true, email: true
                }
                , mobile: {
                    required: true, accept: "[0-9]", minlength: 10, maxlength: 10, number: true
                }
                , profile_name: {
                    required: true, alphanumeric: true, minlength: 6, maxlength: 15
                }
                , company_name: {
                    required: true, minlength: 5, maxlength: 55
                }
                , ceo_name: {
                    required: true, minlength: 3, maxlength: 35
                }
                ,
                ceo_email: { required: true, email:true },
                ceo_mobile: { required: true, number:true },fran_manager: {
                    required: true, minlength: 5, maxlength: 35
                }
                , fran_address: {
                    required: true, minlength: 6
                }
                , country: "required", state: {
                    required: true, lettersonly: true
                }
                , city: {
                    required: true, lettersonly: true
                }
                , telephone: {
                    number: true
                }
                , pincode: {
                    required: true, minlength: 6, maxlength: 6, number: true
                }
                ,
                website: { required: true, minlength: 3, maxlength: 255 },
                //for international client
                pincode_int: {
                    minlength: 6, maxlength: 10, alphanumeric: true, required: true,
                }
                , state_int: {
                    lettersonly: true
                }
                , mobile_int: {
                    required: true, accept: "[0-9]", minlength: 10, maxlength: 15, number: true
                }
                , secondary_email: {
                    email: true
                }
                , prop_area_min: {
                    number: true, minlength: 2, maxlength: 7,
                }
                , prop_area_max: {
                    number: true, minlength: 3, maxlength: 8,
                }
                , unit_investment_min: {
                    required: true, minlength: 4, maxlength: 9, number: true
                }
                , unit_investment_max: {
                    required: true, minlength: 4, maxlength: 9, number: true, greaterThan: '#unit_investment_min'
                }
                , ind_main_cat: "required", ind_cat: "required", ind_sub_cat: "required", operations_start_year: "required", franchise_start_year: "required", no_fran_outlets: "required", no_retail_outlets: "required", no_company_outlets: "required", "outlet_locations[]": "required", "franchise_partner_type[]": "required", expansion_loc_type:"required", looking_for_expansion: "required", anticipated_roi: {
                    number: true
                }
                , unitinv_brand_fee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , unitinv_royalty: {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , country_unitfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , country_masterfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , country_royalty: {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , region_unitfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , region_masterfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , region_royalty: {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , state_unitfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , state_masterfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , state_royalty: {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , city_unitfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , city_masterfee: {
                    required: true, minlength: 1, maxlength: 8, number: true
                }
                , city_royalty: {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , "area_min[]": {
                    required: true, minlength: 1, maxlength: 3, number: true
                }
                , "area_max[]": {
                    required: true, minlength: 3, maxlength: 6, number: true
                }
                , "trade_margin[]": {
                    required: true, minlength: 1, maxlength: 2, number: true
                }
                , payback_period_min: {
                    greaterThan: '#range_rate_min'
                }

            }
            , messages: {
                email: {
                    required: "Please enter email address", email: "Please enter valid email address"
                },
                website: {
                    required: "Please enter Website/Web-Link", minlength: jQuery.format("Please enter at least {0} character Website/Web-Link"), maxlength: jQuery.format("Please enter maximum of {0} character Website/Web-Link")
                },
                ceo_email: {
                    required: "Please enter email",
                    email:"Please enter valid email"
                },
                ceo_mobile: {
                    required: "Please enter mobile no.",
                    number:"Please enter valid number",
                    minlength: jQuery.format("Please enter at least {0} digits number"),
                    maxlength: jQuery.format("Please enter maximum of {0} digits number")
                },
                mobile: {
                    required: "Please enter mobile number", accept: "Please enter 10 digit mobile no", minlength: jQuery.format("Please enter {0} digit mobile number"), maxlength: jQuery.format("Please enter maximum of {0} digit"), number: "Please enter numeric value!!!"
                }
                , profile_name: {
                    required: "Please enter profile name", minlength: jQuery.format("Please enter at least {0} character profile name"), maxlength: jQuery.format("Please enter maximum of {0} character profile name")
                }
                , company_name: {
                    required: "Please enter company name", minlength: jQuery.format("Please enter at least {0} character company name"), maxlength: jQuery.format("Please enter maximum of {0} character company name")
                }
                , ceo_name: {
                    required: "Please enter ceo name", minlength: jQuery.format("Please enter at least {0} character name"), maxlength: jQuery.format("Please enter maximum of {0} character name")
                }
                , fran_manager: {
                    required: "Please enter franchise manager", minlength: jQuery.format("Please enter at least {0} character name"), maxlength: jQuery.format("Please enter maximum of {0} character name")
                }
                , fran_address: {
                    required:"Please enter franchise address", minlength: jQuery.format("Please enter at least {0} word address")
                }
                , country: "Please select country", state: {
                    required: "Please select state"
                }
                , city: {
                    required: "Please select city"
                }
                , telephone: {
                    number: "Please enter numeric value!!!"
                }
                , pincode: {
                    required: "Please enter pincode", minlength: jQuery.format("Please enter at least {0} digits pincode"), maxlength: jQuery.format("Please enter maximum of {0} digits pincode"), number: "Please enter numeric value!!!"
                }
                , secondary_email: {
                    email: "Please enter valid secondary email address"
                }
                , ind_main_cat: "Please select category", ind_cat: "Please select sub category", ind_sub_cat: "Please select sub sub category", operations_start_year: "Please select operation year", franchise_start_year: "Please select franchise year", no_fran_outlets: "Please select no of franchise outlets", no_retail_outlets: "Please select no of retail outlets", no_company_outlets: "Please select no of company owned outlets", "outlet_locations[]": "Please select outlet locations", "franchise_partner_type[]": "Please select franchise partners", looking_for_expansion: "Please select expansion", expansion_loc_type:"please select citywise or statewise", unitinv_brand_fee: {
                    minlength: jQuery.format("Please enter {0} digits brand fee"), maxlength: jQuery.format("Please enter {0} digits brand fee"), number: "Please enter numeric value!!!"
                }
                , anticipated_roi: {
                    number: "Please enter numeric values only"
                }
                , unitinv_royalty: {
                    minlength: jQuery.format("Please enter {0} digits unit fee"), maxlength: jQuery.format("Please enter {0} digits unit fee"), number: "Please enter numeric value!!!"
                }
                , country_unitfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits unit fee"), maxlength: jQuery.format("Please enter {0} digits unit fee"), number: "Please enter numeric value!!!"
                }
                , country_masterfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits master fee"), maxlength: jQuery.format("Please enter {0} digits master fee"), number: "Please enter numeric value!!!"
                }
                , country_royalty: {
                    required:"", minlength: jQuery.format("Please enter {0} digits royalty"), maxlength: jQuery.format("Please enter {0} digits royalty"), number: "Please enter numeric value!!!"
                }
                , region_unitfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits unit fee"), maxlength: jQuery.format("Please enter {0} digits unit fee"), number: "Please enter numeric value!!!"
                }
                , region_masterfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits master fee"), maxlength: jQuery.format("Please enter {0} digits master fee"), number: "Please enter numeric value!!!"
                }
                , region_royalty: {
                    required:"", minlength: jQuery.format("Please enter {0} digits royalty"), maxlength: jQuery.format("Please enter {0} digits royalty"), number: "Please enter numeric value!!!"
                }
                , state_unitfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits unit fee"), maxlength: jQuery.format("Please enter {0} digits unit fee"), number: "Please enter numeric value!!!"
                }
                , state_masterfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits master fee"), maxlength: jQuery.format("Please enter {0} digits master fee"), number: "Please enter numeric value!!!"
                }
                , state_royalty: {
                    required:"", minlength: jQuery.format("Please enter {0} digits royalty"), maxlength: jQuery.format("Please enter {0} digits royalty"), number: "Please enter numeric value!!!"
                }
                , city_unitfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits unit fee"), maxlength: jQuery.format("Please enter {0} digits unit fee"), number: "Please enter numeric value!!!"
                }
                , city_masterfee: {
                    required:"", minlength: jQuery.format("Please enter {0} digits master fee"), maxlength: jQuery.format("Please enter {0} digits master fee"), number: "Please enter numeric value!!!"
                }
                , city_royalty: {
                    required:"", minlength: jQuery.format("Please enter {0} digits royalty"), maxlength: jQuery.format("Please enter {0} digits royalty"), number: "Please enter numeric value!!!"
                }
                , "area_min[]": {
                    number: "Please enter numeric value!!!", minlength: jQuery.format("Please enter {0} digits area"), maxlength: jQuery.format("Please enter {0} digits area"),
                }
                , "area_max[]": {
                    number: "Please enter numeric value!!!", minlength: jQuery.format("Please enter {0} digits area"), maxlength: jQuery.format("Please enter {0} digits area"), greaterThan: "area_min[]"
                }
                ,
            }
            , errorPlacement: function(error, element) {
                error.appendTo( element.parent().parent())
            }
            ,
        }
        ).form();
    }
    );
}

);