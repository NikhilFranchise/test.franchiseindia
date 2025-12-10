<div class="newcontentblk">
    <div class="container">
        <div class="magblk">
            <img src="{{ url('insight-new/images/the-franchising-world.png') }}" alt="Franchise india Insights"
                class="imgstd img-fluid">
        </div>
        <form id="magsubscribe">
            @csrf
            <div class="magfrm">
                <div class="haedstg">The Franchising World Magazine</div>
                <p class="magtxt">For hassle-free instant subscription, just give your number and email id and our
                    customer care agent will get in touch with you</p>
                <ul class="maglsi">
                    <li class="wid180">
                        <label>Enter Email</label>
                        <input type="email" name="email" id="emailId" placeholder="Email Id" />
                        <span class="text-danger" id="email-error" style="font-size:12px;">
                        </span>
                    </li>
                    <li class="wid180">
                        <label>Enter Mobile No. </label>
                        <div class="flis">
                            <select class="code">
                                <option> + 91 </option>
                            </select>
                            <input type="text" name="tel" id="tel" class="telcode"
                                placeholder="Phone Number" onkeypress="return isNumberKey(event);" maxlength="10" />
                            <span class="text-danger" id="tel-error" style="font-size:12px;"></span>
                        </div>
                    </li>
                    <li>
                        <label class="hide">&nbsp;</label>
                        <input type="submit" value="Subscribe Now" class="stb" id="submitMagFormBtn">
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
        <h3 id="popupTitle">Subscription Successful!</h3>
        <p id="popupMessage">Thank you for subscribing. Stay tuned for updates.</p>
    </div>
</div>
