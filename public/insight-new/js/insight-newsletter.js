$(document).ready(function () {

    //==============================
    // Utility Functions
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
        // console.log(selector, message);
        $(selector).text(message).show();
    }

    function clearError(selector) {
        $(selector).text("").hide();
    }

    function clearInputs(formSelector) {
        $(`${formSelector} input[type='email'], ${formSelector} input[type='text'], ${formSelector} input[type='tel']`).val("");
    }

    function showPopup(popupId, title, message, type = "error") {
        if ($(popupId + " #popupTitle").length) {
            $(popupId + " #popupTitle").text(title);
        }
        if ($(popupId + " #popupMessage").length) {
            // Apply color depending on type
            const $msg = $(popupId + " #popupMessage");
            $msg.text(message);

            if (type === "error") {
                $msg.css("color", "red");
            } else if (type === "success") {
                $msg.css("color", "green");
            } else {
                $msg.css("color", "black"); // default
            }
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
    // Generic Form Handler
    //==============================
    function handleFormSubmit({
        formSelector,
        fields,
        ajaxUrl,
        successPopupId,
        errorMap = {},
    }) {
        $(formSelector).on("submit", async function (event) {
            event.preventDefault(); // prevent normal submit

            const formData = $(formSelector).serialize();
            let hasError = false;

            // Validate fields
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
                    showPopup(successPopupId, "Subscription Successful!", response.message || "Thank you for subscribing!", "success");
                } else {
                    // Show popup with error message
                    let msg;

                    if (response.message1 && response.message) {
                        msg = "These records already exist!";
                    } else {
                        msg = response.message1 || response.message || "Something went wrong!";
                    }
                    showPopup(successPopupId, "Subscription Failed!", msg, "error");

                    // Field-specific errors (if any)
                    for (const field of fields) {
                        const errorSelector = errorMap[field.id] || `#${field.id}-error`;
                        let errorMsg = "";

                        if (field.name === "email") {
                            errorMsg = response.message || ""; // email → response.message
                        } else if (field.name === "tel") {
                            errorMsg = response.message1 || ""; // mobile → response.message1
                        }

                        // console.log(field.name, errorSelector, errorMsg);
                        if (errorMsg) showError(errorSelector, errorMsg);
                    }

                }
            } catch (e) {
                showPopup(successPopupId, "Error", "Something went wrong. Please try again.", "error");
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
    // Forms
    //==============================
    handleFormSubmit({
        formSelector: "#newslettersubscribe",
        ajaxUrl: "/insights/newslettersignup",
        fields: [{ id: "newsletter_email", name: "email", type: "email" }],
        successPopupId: "#successPopup",
        errorMap: { newsletter_email: "#newsletter_emailError" },
    });

    handleFormSubmit({
        formSelector: "#magsubscribe",
        ajaxUrl: "/insights/instasubsribe",
        fields: [
            { id: "emailId", name: "email", type: "email" },
            { id: "tel", name: "tel", type: "text" },
        ],
        successPopupId: "#successPopup",
        errorMap: { emailId: "#email-error", tel: "#tel-error" },
    });

    handleFormSubmit({
        formSelector: "#newsletterSignUp",
        ajaxUrl: "/insights/newslettersignup",
        fields: [{ id: "emailID", name: "email", type: "email" }],
        successPopupId: "#successPopup",
        errorMap: { emailID: "#error-email" },
    });

    //==============================
    // Close Popup
    //==============================
    $(document).on("click", ".close-popup", function () {
        $(this).closest(".popup").fadeOut();
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

