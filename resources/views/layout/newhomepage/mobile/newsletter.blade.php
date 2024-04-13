<section class="newslettersection text-center section-30 bg-b-main" id="newslettersection">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>{{ Request::segment(1) == 'hi' ? 'उद्योग से नवीनतम अपडेट प्राप्त करने के लिए अपना ईमेल पता साझा करें' : 'Share your email address to get latest update from the industry' }}
                </p>
                <h2>{{ Request::segment(1) == 'hi' ? 'न्यूज़लेटर साइन अप' : 'Newsletter Signup' }}</h2>
                <div class="main-newsletter">
                    <form id="update" method="post" action="{{ url('newslettersignup') }}">
                        <ul class="newsletter">
                            <li>
                                <input type="hidden" name="site_type" value="fi">
                                <input type="email"
                                    class="form-control
                                          emailer-main"
                                    aria-label="Enter Mail" aria-describedby="button-addon2" name="email"
                                    required="">
                            </li>
                            <li><button class="btn btn-main" type="submit"
                                    id="button-addon2">{{ Request::segment(1) == 'hi' ? 'साइन अप' : 'SignUp' }}</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="col-md-6 text-center socail-newsletter-section">
                <p>{{ Request::segment(1) == 'hi' ? 'बने रहें & अपडेट प्राप्त करे' : 'Stay tuned & get updated' }}</p>
                <h2>{{ Request::segment(1) == 'hi' ? 'Follow Franchise India' : 'Follow Franchise India' }}</h2>
                <div class="main-newsletter">
                    <form action="">
                        <ul class="newsletter-social">
                            <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img
                                        src="{{ url('newhomepage/assets/img/fb-icon.svg') }}" alt="Facebook"></a></li>
                            <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img
                                        src="{{ url('newhomepage/assets/img/instagram-icon.svg') }}" alt=""></a>
                            </li>
                            <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img
                                        src="{{ url('newhomepage/assets/img/twitter-icon.svg') }}" alt="twitter"></a>
                            </li>
                            <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img
                                        src="{{ url('newhomepage/assets/img/you-tube-icon.svg') }}" alt="youtube"></a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
