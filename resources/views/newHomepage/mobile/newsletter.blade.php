<section class="newsletter">
    <p>{{ Request::segment(2) == 'hi' ? 'उद्योग से नवीनतम अपडेट प्राप्त करने के लिए अपना ईमेल पता साझा करें' : 'Share your email address to get latest update from the industry' }}</p>
    <h2>{{ Request::segment(2) == 'hi' ? 'न्यूज़लेटर साइन अप' : 'Newsletter Signup' }}</h2>
    <div class="main-newsletter">
        <form id="update" method="post" action="{{ url('newslettersignup') }}">
            @csrf
            <ul class="newsletters">
                <li>
                    <input type="hidden" name="site_type" value="fi">
                    <input type="email" class="form-control
                                      emailer-main"
                        aria-label="Enter Mail" aria-describedby="button-addon2" name="email" required=""
                        placeholder="Enter email">
                </li>
                <li><button class="btn btn-main" type="submit" id="button-addon2">SignUp</button>
                </li>
            </ul>
        </form>
    </div>

    <div class="socail-newsletter-section">
        <p>Stay tuned &amp; get updated</p>
        <h2>Follow Franchise India</h2>
        <div class="main-newsletter">
            <form action="">
                <ul class="newsletter-social">
                    <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img
                                src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg"
                                alt="Facebook" width="36" height="36" loading="lazy"></a></li>
                    <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img
                                src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg"
                                alt="instagram" width="36" height="36" loading="lazy"></a>
                    </li>
                    <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img
                                src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg"
                                alt="twitter" width="36" height="36"></a>
                    </li>
                    <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img
                                src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg"
                                alt="youtube" width="36" height="36" loading="lazy"></a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</section>
