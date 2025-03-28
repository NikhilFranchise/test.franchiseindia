<!-- newsletter section starts -->
<section class="newslettersection section-30 bg-b-main" id="newslettersection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-6">
                <h2>Newsletter Signup</h2>
                <p>Share your email address to get latest update from the industry</p>
            </div>
            <div class="modified-col col-md-6">
                <div class="main-newsletter">
                    <form id="newsletterSignUp">
                        @csrf
                        <ul class="newsletter">
                            <li>
                                <input type="hidden" name="site_type" value="insights">
                                <input type="email" class="form-control emailer-main" aria-label="Enter Mail"
                                    aria-describedby="button-addon2" id="emailID" name="email"
                                    placeholder="Enter your email">
                                <span class="text-danger" id="error-email" style="font-size:12px;">
                                </span>
                            </li>
                            <li><button class="btn-subscribe" type="submit" id="button-addon">SignUp</button></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Popup -->
    <div id="successPopup1" class="popup">
        <div class="popup-content">
            <span class="close-popup">&times;</span>
            <h3>Subscription Successful!</h3>
            <p id="successPopupMessage"></p>
        </div>
    </div>

    <!-- Popup CSS -->
</section>
<script>
    $(document).ready(function() {
        $("#button-addon").click(function(event) {
            event.preventDefault(); // Prevent default form submission

            if (validateForm()) {
                const formData = $("#newsletterSignUp").serialize(); // Serialize form data correctly

                $.ajax({
                    url: "/insights/newslettersignup",
                    type: "POST",
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(response) {
                        if (!response.error) { // Check for `error: false`
                            $("#emailID").val(""); // Clear email field
                            $("#successPopup1").fadeIn(function() {
                                $("#successPopupMessage").text(response.message);
                            });

                            setTimeout(() => {
                                $("#successPopup1").fadeOut();
                            }, 5000);
                        } else {
                            showError("#error-email", response
                                .message); // Show inline error
                        }
                    },
                    error: function(xhr) {
                        showError("#error-email", xhr.responseJSON?.message ||
                            "An error occurred.");
                    }
                });
            }
        });

        function showError(selector, message) {
            $(selector).text(message).show();
        }

        function clearError(selector) {
            $(selector).text("").hide();
        }

        function isValidEmail(email) {
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let spamDomains = ["mailinator.com", "tempmail.com", "10minutemail.com", "guerrillamail.com",
                "yopmail.com"
            ];
            if (!emailPattern.test(email)) return "Enter a valid email address!";
            let emailDomain = email.split("@")[1];
            if (spamDomains.includes(emailDomain)) return "No temporary emails allowed!";
            return "";
        }

        function validateForm() {
            let email = $("#emailID").val().trim();
            let hasError = false;
            let emailError = isValidEmail(email);

            if (emailError) {
                showError("#error-email", emailError);
                if (!hasError) $("#emailID").focus();
                hasError = true;
            } else {
                clearError("#error-email");
            }

            return !hasError;
        }

        $("#emailID").on("input", function() {
            clearError("#error-email");
        });

        $(document).on("click", ".close-popup", function() {
            $("#successPopup1").fadeOut();
        });
    });
</script>
<!-- newsletter section ends  -->
