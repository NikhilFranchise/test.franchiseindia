@desktop
<section class="newslettersection section-30 bg-b-main" id="newslettersection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-6">
                <p>{{ Request::segment(1) == 'hi' ? 'उद्योग से नवीनतम अपडेट प्राप्त करने के लिए अपना ईमेल पता साझा करें' : 'Share your email address to get latest update from the industry' }}
                </p>
                <h2>{{ Request::segment(1) == 'hi' ? 'न्यूज़लेटर साइन अप' : 'Newsletter Signup' }}</h2>
                <div class="main-newsletter">
                    <form id="update" method="post" action="{{ url('newslettersignup') }}">
                        @csrf
                        <ul class="newsletter">
                            <li><input type="hidden" name="site_type" value="fi"> <input type="email" class="form-control emailer-main" aria-label="Enter Mail" aria-describedby="button-addon2" name="email" required="" placeholder="Enter Email-Id"></li>
                            <li><button class="btn btn-main" type="submit" id="button-addon2">{{ Request::segment(1) == 'hi' ? 'साइन अप' : 'SignUp' }}</button></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="modified-col col-md-6 text-right socail-newsletter-section">
                <p>Stay tuned &amp; get updated</p>
                <h2>Follow Franchise India</h2>
                <div class="main-newsletter">
                    <form action="">
                        <ul class="newsletter-social">
                            <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg" alt="facebook" width="36" height="36" loading="lazy"></a></li>
                            <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" alt="instagram" width="36" height="36" loading="lazy"></a></li>
                            <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg" width="36" height="36" alt="twitter" loading="lazy"></a></li>
                            <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img width="36" height="36" src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" alt="youtube" loading="lazy"></a></li>
                            <li><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img width="36" height="36" src="https://www.franchiseindia.com/newhomepage/assets/img/linkedin-new.svg" alt="linkedin" loading="lazy"></a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@enddesktop
@mobile
<style>
/* Mobile responsive styles */
@media only screen and (max-width: 768px) {
    #newslettersection {
        padding: 20px 0;
    }

    /* Stack the columns vertically */
    #newslettersection .modified-col {
        width: 100%;
        margin-bottom: 20px;
        text-align: center;
    }

    #newslettersection .main-newsletter ul.newsletter,
    #newslettersection .newsletter-social {
        display: block;
        padding: 0;
        list-style: none;
        text-align: center;
    }

    /* Make inputs and buttons full-width */
    #newslettersection .main-newsletter ul.newsletter li,
    #newslettersection .newsletter-social li {
        width: 100%;
        margin-bottom: 10px;
    }

    /* Ensure the email input and button are responsive */
    #newslettersection .emailer-main,
    #newslettersection .btn-main {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
    }

    /* Resize social icons for mobile */
    #newslettersection .newsletter-social li a img {
        width: 30px;
        height: 30px;
    }
}
</style>
<section class="newslettersection section-30 bg-b-main" id="newslettersection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-6">
                <p>{{ Request::segment(1) == 'hi' ? 'उद्योग से नवीनतम अपडेट प्राप्त करने के लिए अपना ईमेल पता साझा करें' : 'Share your email address to get latest update from the industry' }}
                </p>
                <h2>{{ Request::segment(1) == 'hi' ? 'न्यूज़लेटर साइन अप' : 'Newsletter Signup' }}</h2>
                <div class="main-newsletter">
                    <form id="update" method="post" action="{{ url('newslettersignup') }}">
                        @csrf
                        <ul class="newsletter">
                            <li><input type="hidden" name="site_type" value="fi"> <input type="email" class="form-control emailer-main" aria-label="Enter Mail" aria-describedby="button-addon2" name="email" required="" placeholder="Enter Email-Id"></li>
                            <li><button class="btn btn-main" type="submit" id="button-addon2">{{ Request::segment(1) == 'hi' ? 'साइन अप' : 'SignUp' }}</button></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="modified-col col-md-6 text-right socail-newsletter-section">
                <p>Stay tuned &amp; get updated</p>
                <h2>Follow Franchise India</h2>
                <div class="main-newsletter">
                    <form action="">
                        <ul class="newsletter-social">
                            <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg" alt="facebook" width="36" height="36" loading="lazy"></a></li>
                            <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" alt="instagram" width="36" height="36" loading="lazy"></a></li>
                            <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg" width="36" height="36" alt="twitter" loading="lazy"></a></li>
                            <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img width="36" height="36" src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" alt="youtube" loading="lazy"></a></li>
                            <li><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img width="36" height="36" src="https://www.franchiseindia.com/newhomepage/assets/img/linkedin-new.svg" alt="linkedin" loading="lazy"></a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endmobile