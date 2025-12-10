@php
    $submitUrl = Config('constants.MainDomain');
@endphp
<form id="newslettersubscribe">
    @csrf
    <div class="newsletterbg">
        <div class="strbhead">Subscribe Newsletter</div>
        <div class="newstxt">Submit your email address to receive the latest updates on news & host of opportunities
        </div>

        <ul class="submaglsi">

            <input type="hidden" name="site_type" value="insights">
            <li>
                <input type="email" name="email" id="newsletter_email" placeholder="Enter Email">
                <div id="newsletter_emailError" class="text-danger"
                    style="display: none; font-size: 14px; margin-top: 5px;"></div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </li>

            <li>
                <input type="submit" value="Subscribe Now" class="stb" id="subscribe">
            </li>

        </ul>
    </div>
</form>
<!-- Success Popup -->

<div id="successPopup" class="popup">
    <div class="popup-content">
        <span class="close-popup">&times;</span>
        <h3 id="popupTitle">Subscription Successful!</h3>
        <p id="popupMessage">Thank you for subscribing. Stay tuned for updates.</p>
    </div>
</div>

