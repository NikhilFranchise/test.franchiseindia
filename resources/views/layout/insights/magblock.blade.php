<div class="newcontentblk">
    <div class="container">
        <div class="magblk">
            <img src="{{ url('insight-new/images/the-franchising-world.png') }}" alt="Franchise india Insights"
                class="imgstd img-fluid">
        </div>
        <form id="magsubscribe">
            {{ csrf_field() }}
            <div class="magfrm">
                <div class="haedstg">The Franchising World Magazine</div>
                <p class="magtxt">For hassle-free instant subscription, just give your number and email id and our
                    customer care agent will get in touch with you</p>
                <ul class="maglsi">
                    <li class="wid180">
                        <label>Enter Email</label>
                        <input type="email" name="email" id="emailId">
                        <span class="text-danger" id="email-error" style="font-size:12px;">
                        </span>
                    </li>
                    <li class="wid180">
                        <label>Enter Mobile No. </label>
                        <div class="flis">
                            <select class="code">
                                <option> + 91 </option>
                            </select>
                            <input type="text" name="tel" id="tel" class="telcode">
                            <span class="text-danger" id="tel-error" style="font-size:12px;"></span>
                        </div>
                    </li>
                    <li>
                        <label class="hide">&nbsp;</label>
                        <input type="submit" value="Subscribe Now" class="stb">
                    </li>
                </ul>
                <p class="mbtmtxt">or <a href="https://master.franchiseindia.com/magazine-subscribe/"
                        target="_blank">Click here to Subscribe Online</a></p>
            </div>
        </form>
    </div>
</div>
<div id="successPopup" class="popup">
    <div class="popup-content">
        <span class="close-popup">&times;</span>
        <h3>Subscription Successful!</h3>
        <p>Thank you for subscribing. Stay tuned for updates.</p>
    </div>
</div>
<script>
    $(document).ready(function() {
        async function doAjax(args) {
            try {
                return await $.ajax({
                    url: "/insights/instasubsribe",
                    type: "POST",
                    data: args,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
                    },
                });
            } catch (error) {
                console.error("AJAX Error:", error);
                showError("#form-error", error.responseJSON?.message ||
                    "An error occurred. Please try again.");
                throw error;
            }
        }

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

        function isValidTel(tel) {
            return /^[6-9]\d{9}$/.test(tel) ? "" : "Enter a valid 10-digit mobile number!";
        }

        function validateForm() {
            let email = $("#emailId").val().trim();
            let tel = $("#tel").val().trim();
            let hasError = false;

            let emailError = isValidEmail(email);
            let telError = isValidTel(tel);

            if (emailError) {
                showError("#email-error", emailError);
                if (!hasError) $("#emailId").focus();
                hasError = true;
            } else {
                clearError("#email-error");
            }

            if (telError) {
                showError("#tel-error", telError);
                if (!hasError) $("#tel").focus();
                hasError = true;
            } else {
                clearError("#tel-error");
            }

            return !hasError;
        }

        $("#magsubscribe").submit(function(event) {
            event.preventDefault();

            if (validateForm()) {
                const formData = $(this).serialize();
                doAjax(formData)
                    .then((data) => {
                        if (!data.error) {
                            $("#magsubscribe input[type='email'], #magsubscribe input[type='text']")
                                .val("");
                            // window.location.href = "{{ route('insights.thanks') }}";
                            $("#successPopup").fadeIn();
                            // Hide popup after 3 seconds
                            setTimeout(() => {
                                $("#successPopup").fadeOut();
                            }, 5000);
                        } else {
                            showError("#email-error", data.fields.email ? data.message1 : "");
                            showError("#tel-error", data.fields.tel ? data.message2 : "");
                        }
                    })
                    .catch((error) => console.error("AJAX Error:", error));
            }
        });

        // Clear errors when typing
        $("#emailId, #tel").on("input", function() {
            clearError(`#${this.id}-error`);
        });
    });

    $(document).on("click", ".close-popup", function() {
        $("#successPopup").fadeOut();
    });
</script>
