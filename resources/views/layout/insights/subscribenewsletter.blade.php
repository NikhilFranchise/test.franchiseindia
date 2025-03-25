@php
    $submitUrl = Config('constants.MainDomain');
@endphp
<form id="newsletterSignUp1">
    {{ csrf_field() }}
    <div class="newsletterbg">
        <div class="strbhead">Subscribe Newsletter</div>
        <div class="newstxt">Submit your email address to receive the latest updates on news & host of opportunities
        </div>

        <ul class="submaglsi">

            <input type="hidden" name="site_type" value="insights">
            <li>
                <input type="email" name="email" id="email" placeholder="Enter Email" required>
                <div id="emailError" class="text-danger" style="display: none; font-size: 14px; margin-top: 5px;"></div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </li>

            <li>
                <input type="submit" value="Subscribe Now" class="stb" id="btnupdate">
            </li>

        </ul>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#btnupdate").click(function(event) {
            event.preventDefault(); // Prevent default form submission

            if (validateForm()) {
                const formData = $("#newsletterSignUp1").serialize(); // Serialize form data correctly

                $.ajax({
                    url: "/insights/newslettersignup",
                    type: "POST",
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(response) {
                        if (!response.error) { // Check for `error: false`
                            $("#email").val(""); // Clear email field
                            $("#successPopup1").fadeIn(function() {
                                $("#successPopupMessage").text(response.message);
                            });

                            setTimeout(() => {
                                $("#successPopup1").fadeOut();
                            }, 5000);
                        } else {
                            showError("#emailError", response
                                .message); // Show inline error
                        }
                    },
                    error: function(xhr) {
                        showError("#emailError", xhr.responseJSON?.message ||
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
            let email = $("#email").val().trim();
            let hasError = false;
            let emailError = isValidEmail(email);

            if (emailError) {
                showError("#emailError", emailError);
                if (!hasError) $("#email").focus();
                hasError = true;
            } else {
                clearError("#emailError");
            }

            return !hasError;
        }

        $("#email").on("input", function() {
            clearError("#emailError");
        });

        $(document).on("click", ".close-popup", function() {
            $("#successPopup1").fadeOut();
        });
    });
</script>
