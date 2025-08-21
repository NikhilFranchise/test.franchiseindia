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

<!-- newsletter section ends  -->
