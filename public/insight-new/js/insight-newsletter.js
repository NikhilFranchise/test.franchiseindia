
$(document).ready(function () {

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
    //==============================
    // Common Utility Functions
    //==============================
    const csrfToken = $("meta[name='csrf-token']").attr("content");

    const spamDomains = ["mailinator.com", "tempmail.com", "10minutemail.com", "guerrillamail.com", "yopmail.com"];
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    function isValidEmail(email) {
        if (!emailPattern.test(email)) return "Enter a valid email address!";
        const emailDomain = email.split("@")[1];
        if (spamDomains.includes(emailDomain)) return "No temporary emails allowed!";
        return "";
    }

    function isValidTel(tel) {
        return /^[6-9]\d{9}$/.test(tel) ? "" : "Enter a valid 10-digit mobile number!";
    }

    function showError(selector, message) {
        $(selector).text(message).show();
    }

    function clearError(selector) {
        $(selector).text("").hide();
    }

    function clearInputs(formSelector) {
        $(`${formSelector} input[type='email'], ${formSelector} input[type='text'], ${formSelector} input[type='tel']`).val("");
    }

    function showSuccessPopup(popupId, message = "") {
        if (message && $(popupId + "Message").length) {
            $(popupId + "Message").text(message);
        }
        $(popupId).fadeIn();
        setTimeout(() => $(popupId).fadeOut(), 5000);
    }

    async function doAjax(url, formData, fallbackSelector) {
        try {
            return await $.ajax({
                url,
                type: "POST",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            });
        } catch (xhr) {
            const msg = xhr.responseJSON?.message || "An error occurred. Please try again.";
            showError(fallbackSelector, msg);
            throw xhr;
        }
    }

    //==============================
    // Generic Form Handler Function
    //==============================
    function handleFormSubmit({
        formSelector,
        submitBtnSelector,
        fields,
        ajaxUrl,
        successPopupId,
        errorMap = {},
    }) {
        $(submitBtnSelector).on("click", async function (event) {
            console.log(formSelector, submitBtnSelector, fields, ajaxUrl, successPopupId, errorMap);

            event.preventDefault();

            const formData = $(formSelector).serialize();
            let hasError = false;

            // Validate fields dynamically
            for (const field of fields) {
                const value = $(`#${field.id}`).val().trim();
                const errorSelector = errorMap[field.id] || `#${field.id}-error`;
                let errorMsg = "";

                if (field.type === "email") errorMsg = isValidEmail(value);
                if (field.type === "text") errorMsg = isValidTel(value);

                if (errorMsg) {
                    showError(errorSelector, errorMsg);
                    if (!hasError) $(`#${field.id}`).focus();
                    hasError = true;
                } else {
                    clearError(errorSelector);
                }
            }

            if (hasError) return;

            try {
                const response = await doAjax(ajaxUrl, formData, `#${fields[0].id}-error`);

                if (!response.error) {
                    clearInputs(formSelector);
                    showSuccessPopup(successPopupId, response.message || "");
                } else {
                    // Optional: if backend returns per-field error map
                    for (const field of fields) {
                        const errorSelector = errorMap[field.id] || `#${field.id}-error`;
                        const errorMsg = response.fields?.[field.name] ? response[`message${field.name}`] : response.message;
                        if (errorMsg) showError(errorSelector, errorMsg);
                    }
                }
            } catch (e) {
                // Already handled
            }
        });

        // Clear error on typing
        for (const field of fields) {
            $(`#${field.id}`).on("input", function () {
                const errorSelector = errorMap[field.id] || `#${field.id}-error`;
                clearError(errorSelector);
            });
        }
    }

    //==============================
    // 1. Newsletter Signup Form #1
    //==============================
    handleFormSubmit({
        formSelector: "#newslettersubscribe",
        submitBtnSelector: "#subscribe",
        ajaxUrl: "/insights/newslettersignup",
        fields: [{ id: "newsletter_email", name: "email", type: "email" }],
        successPopupId: "#subsuccessPopup",
        errorMap: {
            newsletter_email: "#newsletter_emailError",
        },
    });

    //==============================
    // 2. Insta Subscribe Form
    //==============================
    handleFormSubmit({
        formSelector: "#magsubscribe",
        submitBtnSelector: "#submitMagFormBtn", // submit() will trigger on submit event
        ajaxUrl: "/insights/instasubsribe",
        fields: [
            { id: "emailId", name: "email", type: "email" },
            { id: "tel", name: "tel", type: "text" },
        ],
        successPopupId: "#successPopup",
        errorMap: {
            emailId: "#email-error",
            tel: "#tel-error",
        },
    });

    //==============================
    // 3. Newsletter Signup Form #2
    //==============================
    // handleFormSubmit({
    //     formSelector: "#newsletterSignUp",
    //     submitBtnSelector: "#button-addon",
    //     ajaxUrl: "/insights/newslettersignup",
    //     fields: [{ id: "emailID", name: "email", type: "email" }],
    //     successPopupId: "#successPopup1",
    //     errorMap: {
    //         emailID: "#error-email",
    //     },
    // });

    //==============================
    // Close Success Popups
    //==============================
    $(document).on("click", ".close-popup", function () {
        $(this).closest(".popup").fadeOut();
    });

});


