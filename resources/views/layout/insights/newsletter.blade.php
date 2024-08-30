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
                    <form id="update" method="post" action="{{url('/insights/newslettersignup')}}">
                        <ul class="newsletter">
                            <li>
                                <input type="hidden" name="site_type" value="insights">
                                <input type="email" class="form-control
                                                    emailer-main" aria-label="Enter Mail" aria-describedby="button-addon2" name="email" required="" placeholder="Enter your email">
                            </li>
                            <li><button class="btn-subscribe" type="submit" id="button-addon2">SignUp</button></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- newsletter section ends  -->