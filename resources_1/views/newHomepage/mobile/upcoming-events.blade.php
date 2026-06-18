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
        {{-- <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
                    <img loading="lazy" alt="Franchise India 2024 Mumbai"
                        src="https://www.franchiseindia.com/images/franchise-india.webp" width="378"
                        height="228"></a>
            </div>
            <h2>Franchise India 2024 Mumbai</h2>
            <p>29-30 November 2024, Jio World Convention Centre</p>
            <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 9311148342</span></div>
        </div>
        <div class="leading-card">
            <div class="brand-ins">
                <a href="https://www.irec.asia/mumbai/" target="_blank">
                    <img loading="lazy" alt="IReC 2024" src="https://www.franchiseindia.com/images/irec.webp"
                        width="378" height="228"></a>
            </div>
            <h2>IReC 2024</h2>
            <p>29-30 November 2024, Jio World Convention Centre</p>
            <a href="https://www.irec.asia/mumbai/" target="_blank" class="know-more">Registration</a>
            <div class="hotline">Hotline: <span>+91 93104387833</span></div>
        </div>
        <div class="leading-card">
            <div class="brand-ins">
                <a href="#" onclick="return false;">
                    <img loading="lazy" alt="Saudi Franchise Expo" src="https://www.franchiseindia.com/images/sfe.webp"
                        width="378" height="228"></a>
            </div>
            <h2>Saudi Franchise Expo</h2>
            <p>27-29 January 2025, RIEC, Saudi Arabia</p>
            <a class="know-more" href="#" onclick="return false;">Registration</a>
            <div class="hotline">Hotline: <span>+91 9717683838</span></div>
        </div>
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
        </div> --}}
    </div>
</section>
