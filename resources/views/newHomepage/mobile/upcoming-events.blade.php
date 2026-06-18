<section class="upcoming-events">
    <h2 class="brands-head">{{ Request::segment(1) == 'hi' ? 'आने वाले कार्यक्रम' : 'Upcoming Events' }}</h2>
    <div class="card-wrap">
        @forelse ($events as $event)
            <div class="leading-card">
                <div class="brand-ins">
                    <a href="{{ $event['url'] }}" target="_blank">
                        <img loading="lazy" alt="{{ $event['title'] }}" src="{{ $event['image'] }}" width="378"
                            height="228"></a>
                </div>
                <h2>{{ $event['title'] }}</h2>
                <p>{{ $event['date'] }}, {{ $event['venue'] }}</p>
                <a href="{{ $event['url'] }}" target="_blank" class="know-more">Registration</a>
                <div class="hotline">Hotline:<span>{{ $event['contact'] }}</span></div>

            </div>
        @empty
        @endforelse
        <!-- Card Ends -->
        <!-- Card Start -->
        {{-- <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.net/madhya-pradesh/franchise-expo/" target="_blank">
                    <img loading="lazy" alt="Franchise Expo Indore"
                        src="https://www.franchiseindia.com/images/franchise-show-indore.webp" width="378"
                        height="228">
                </a>
            </div>
            <h2>Franchise Expo Indore</h2>
            <p>21 December 2025, Sheraton Grand Palace, Indore</p>
            <a href="https://www.franchiseindia.net/madhya-pradesh/franchise-expo/" target="_blank"
                class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends -->

        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="www.franchiseindia.net/maharashtra/fro" target="_blank">
                    <img loading="lazy" alt="FROEXPO Pune"
                        src="https://www.franchiseindia.com/images/franchise-show-pune.webp" width="378"
                        height="228">
                </a>
            </div>
            <h2>FROEXPO Pune</h2>
            <p> 17-18 January 2026, Messe Global Laxmi Lawns, Pune</p>
            <a href="www.franchiseindia.net/maharashtra/fro" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends -->


        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.restaurantindia.in/awards/hyderabad/" target="_blank">
                    <img loading="lazy" alt="Restaurant Awards Hyderabad"
                        src="https://www.franchiseindia.com/images/restaurant-south.webp" width="378" height="228">
                </a>
            </div>
            <h2>Restaurant Awards Hyderabad</h2>
            <p>19 January 2026, Hotel Trident, Hyderabad</p>
            <a href="https://www.restaurantindia.in/awards/hyderabad/" target="_blank"
                class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 8595350505</span></div>
        </div>
        <!-- Card Ends -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.entrepreneurindia.com/influencer/" target="_blank">
                    <img loading="lazy" alt="Influencer Awards"
                        src="https://www.franchiseindia.com/images/influencers-award.webp" width="378"
                        height="228"></a>
            </div>
            <h2>Influencer Awards</h2>
            <p>22 January 2026, Hotel JW Marriott Mumbai Sahar</p>
            <a class="know-more" href="https://www.entrepreneurindia.com/influencer/" target="_blank">Registration</a>
            <div class="hotline">Hotline: <span>+91 6354604762</span></div>
        </div>
        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://indiaev.org/delhi/" target="_blank">
                    <img loading="lazy" alt="India EV Show"
                        src="https://www.franchiseindia.com/images/ev-delhi.webp?ver=2" width="378" height="228">
                </a>
            </div>
            <h2>India EV Show</h2>
            <p>10-11 February 2026, Yashobhoomi, Delhi</p>
            <a href="https://indiaev.org/delhi/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 7011417457</span></div>
        </div>
        <!-- Card Ends -->


        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.net/rajasthan/fro/" target="_blank">
                    <img loading="lazy" alt="Fro"
                        src="https://www.franchiseindia.com/images/franchise-show-jaipur.webp" width="378"
                        height="228">
                </a>
            </div>
            <h2>FROEXPO Jaipur</h2>
            <p>21-22 February 2026, RIC, Rajasthan International Center, Jaipur</p>
            <a href="https://www.franchiseindia.net/rajasthan/fro/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends -->

        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.net/telangana/fro/" target="_blank">
                    <img loading="lazy" alt="Fro"
                        src="https://www.franchiseindia.com/images/franchise-show-hyd.webp" width="378"
                        height="228">
                </a>
            </div>
            <h2>FROEXPO Hyderabad </h2>
            <p>14-15 March 2026, HITEX Exhibition Centre, Hyderabad</p>
            <a href="https://www.franchiseindia.net/telangana/fro/" target="_blank"
                class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends -->


        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.com/expo/" target="_blank">
                    <img loading="lazy" alt="Franchise India 2026 Delhi"
                        src="https://www.franchiseindia.com/images/franchise-india-show.webp" width="378"
                        height="228">
                </a>
            </div>
            <h2>Franchise India 2026 Delhi</h2>
            <p>16-17 May 2026, Yashobhoomi, Delhi</p>
            <a href="https://www.franchiseindia.com/expo/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends -->
        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.indiaev.org/chennai/" target="_blank">
                    <img loading="lazy" alt="India EV Show Chennai"
                        src="https://www.franchiseindia.com/images/ev-show.webp" width="378" height="228">
                </a>
            </div>
            <h2>India EV Show Chennai</h2>
            <p>27-28 June 2026, Chennai Trade Centre, Chennai</p>
            <a href="https://www.indiaev.org/chennai/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 7011417457</span></div>
        </div>
        <!-- Card Ends -->

        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.net/karnataka/frex/" target="_blank">
                    <img loading="lazy" alt="frex" src="https://www.franchiseindia.com/images/frex-2026.webp"
                        width="378" height="228">
                </a>
            </div>
            <h2>FREX Bengaluru </h2>
            <p> 22-23 August 2026, BIEC, Bengaluru</p>
            <a href="https://www.franchiseindia.net/karnataka/frex/" target="_blank"
                class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <!-- Card Ends --> 

        <!-- Card Start -->
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.restaurantindia.in/coffee-tea-asia/" target="_blank">
                    <img loading="lazy" alt="Coffee & Tea Asia 2026"
                        src="https://www.franchiseindia.com/images/coffee.webp" width="378" height="228">
                </a>
            </div>
            <h2>Coffee & Tea Asia 2026</h2>
            <p>22-23 August 2026, BIEC, Bengaluru</p>
            <a href="https://www.restaurantindia.in/coffee-tea-asia/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 8595350505</span></div>
        </div>
        <!-- Card Ends --> --}}
    </div>
</section>
