$.validator.addMethod("pwdcheck", function (value) {
    return /^[A-Za-z0-9\d=!@#$%^&*(){}[\]<>?/|\-_]*$/.test(value) && /[A-Z]/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[!@#$%^&*(){}[\]<>?/|\-_]/.test(value)
});
$.validator.addMethod("greaterThan", function (value, element, param) {
    var $min = $(param);
    if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
            $(element).valid();
        });
    }
    return parseInt(value) > parseInt($min.val());
}, "Max must be greater than min");
jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "Letters only please");
$(document).ready(function () {
    $('input[title!=""]').hint();
    $('textarea[title!=""]').hint();
    $('select[title!=""]').hint();
    $('.nextBtn').click(function () {
        $("#investorRegForm").validate({
            rules: {
                email: {required: true, minlength: 6, email: true},
                secondary_email: {minlength: 6, email: true},
                password: {required: true, minlength: 6, pwdcheck: true, maxlength: 15},
                invName: {required: true, lettersonly: true, minlength: 3},
                company_service_name: {required: true, minlength: 6},
                company_business_name: {required: true, minlength: 6},
                company_service: {required: true},
                "industry_type_business[]": {required: true},
                address: {required: true, minlength: 6},
                country: {required: true},
                pincode: {required: true, number: true, minlength: 6},
                prop_area_min: {required: true, number: true, minlength: 2, maxlength: 5},
                prop_area_max: {required: true, number: true, minlength: 3, maxlength: 6},
                state: {required: true},
                franchise_brand_name: {required: true},
                business_state_looking: {required: true},
               //city: {required: true, lettersonly: true, minlength: 3},
                mobile: {required:true, minlength: 10, maxlength: 12, number: true},
                secondary_mobile: { minlength: 10, maxlength: 12, number: true},
                occupation: {required: true},
                qualification: {required: true },
                dob: {required: true},
                "industry_type[]": {required: true},
                "looking_for[]": "required",
                investment_date: {required: true},
                investment_range: {required: true},
                property_address: {required: true, minlength: 6},
                property_use: {required: true},
                business_industry_type: {required: true},
                business_number_of_years: {required: true, number: true},
                number_of_employees: {required: true, number: true},
                business_type: {required: true, minlength: 6},
                job_industry_type: {required: true, number: true},
                job_number_of_years: {required: true, number: true}
            },
            messages: {
                email: {
                    required: "Please enter email address",
                    minlength: jQuery.format("Please enter at least {0} word length email"),
                    email: "Please enter valid email address"
                },

                secondary_email: {
                    minlength: jQuery.format("Please enter at least {0} word length email"),
                    email: "Please enter valid email address"
                },

                password: {
                    required: "Please enter password",
                    pwdcheck: "please enter password with special char, uppercase,lowercase & digit",
                    minlength: jQuery.format("Please enter at least {0} word length password"),
                    maxlength: jQuery.format("Please enter maximum of {0} word length password")
                },
                invName: {
                    required: "Please enter profile name",
                    minlength: jQuery.format("Please enter at least {0} alphabet profile name"),
                    maxlength: jQuery.format("Please enter maximum of {0} alphabet profile name")
                },
                address: {
                    required: "Please enter the address",
                    minlength: jQuery.format("Please enter at least {0} word length address")
                },

                 company_service_name: {
                     required: "Please enter the company name",
                     minlength: jQuery.format("Please enter at least {0} word length company name")
                 },

                 company_business_name: {
                     required: "Please enter the company name",
                     minlength: jQuery.format("Please enter at least {0} word length company name")
                 },
                 company_service: {required: "Please enter the company name"},

                 "industry_type_business[]": {required: "Please select minimum 1 industry type"},

                country: {required: "Please select country name"},
                pincode: {
                    required: "Please enter area pincode",
                    minlength: jQuery.format("Please enter at least {0} digit length pincode")
                },
                prop_area_min: {
                    required: "Please enter min area",
                    minlength: jQuery.format("Please enter at least {0} digit length area"),
                    maxlength: jQuery.format("Please enter maximum of {0} digit length area")
                },
                prop_area_max: {
                    required: "Please enter min area",
                    minlength: jQuery.format("Please enter at least {0} digit length area"),
                    maxlength: jQuery.format("Please enter maximum of {0} digit length area")
                },
                state: {
                    required: "Please select state"
                },
                business_state_looking: {
                    required: "Please select state"
                },
                franchise_brand_name: {
                    required: "Please enter brand name"
                },
                "looking_for[]": {
                    required: "Please select atleast one"
                },
               // city: {required: "Please enter city", minlength: jQuery.format("Please enter at least {0} word city")},
                mobile: {
                    required: "Please enter mobile number",
                    minlength: jQuery.format("Please enter {0} digit length mobile number"),
                    maxlength: jQuery.format("Please enter maximum of {0} digit length mobile"),
                    number: "enter in numerical format only"
                },
                secondary_mobile: {
                    minlength: jQuery.format("Please enter {0} digit length secondary mobile number"),
                    maxlength: jQuery.format("Please enter maximum of {0} digit secondary length mobile"),
                    number: "enter in numerical format only"
                },
                occupation: {required: "Please select occupation"},
                qualification: {required: "Please select qualification" },
                dob: {required: "Please enter DOB"},
                "industry_type[]": {required: "Please select minimum 1 industry type"},
                investment_date: {required: "Please select time frame"},
                investment_range: {required: "Please select investment range"},
                property_address: {
                    minlength: jQuery.format("Please enter at least {0} digit length mobile"),
                    required: "please enter property address"
                },
                property_use: {required: "please select property use"},
                business_industry_type: {required: "please select industry type"},
                business_number_of_years: {
                    required: "please enter number of years",
                    number: "enter in numerical format only"
                },
                number_of_employees: {
                    required: "please enter number of employees",
                    number: "enter in numerical format only"
                },
                business_type: {
                    required: "please enter commercial address",
                    minlength: jQuery.format("Please enter at least {0} word length address")
                },
                job_industry_type: {required: "please select industry type"},
                job_number_of_years: {
                    required: "please enter number of years",
                    number: "enter in numerical format only"
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent())
            },
            submitHandler: function () {
                $(".submitinvestor").attr("disabled", true);
                form.submit();
            }
        }).form();

    });
});
