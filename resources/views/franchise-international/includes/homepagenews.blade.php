<div class="row mrgn-tp-30">
    <div class="container">
        <div class="row what-new">
            <div class="col-xs-12 col-sm-9 col-md-9 mdy-width hidden-xs">
                <div class="newsbot">
                    <div class="pull-left">
                        <h2 class="newss"><a href="{{ Config('constants.NewsDomain') }}">News</a></h2>
                    </div>
                    <div class="pull-right viewaallhome"><a href="{{ Config('constants.NewsDomain') }}">View All</a><i
                            class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
                </div>
                <div class="row">
                    <div class="bxslider">
                        <div class="list-width-new">
                            @foreach ($newsArticles as $article)
                                @php
                                    if ($article['created_at'] >= $article['published_date']) {
                                        $a = date_create($article['created_at']);
                                        $date = date_format($a, 'd M Y');
                                    } else {
                                        $a = date_create($article['published_date']);
                                        $date = date_format($a, 'd M Y');
                                    }
                                    $url = insightsUrl($article);
                                    $imagePath = insightsImageUrl($article->image);
                                    $category = $article->category ?? null;
                                    $catslug = insightsCategoryUrl($category) ?? '#';
                                    $catname = $category->catname ?? '';
                                @endphp
                                <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                                    <div class="new-cat-list">
                                        <div class="cat-img">
                                            <a href="{{ $url }}" target="_blank">
                                                <img src="{{ $imagePath }}" alt="{{ $article['title'] }}" />
                                            </a>
                                            <div class="info">
                                                <div class="search-count">
                                                    <div class="vertical-mid">
                                                        <div class="bdr">
                                                            <div class="count">
                                                                <a
                                                                    href="{{ $catslug }}">{{ ucwords($catname) }}</a>
                                                            </div>
                                                            <div class="name">
                                                                <a href="{{ $url }}">
                                                                    @if ($article['homeTitle'] == '')
                                                                        {{ implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']), 0, 100)), 0, 10)) }}
                                                                    @endif
                                                                    {{ $article['homeTitle'] }}
                                                                </a>
                                                            </div>
                                                            <div class="count"><a
                                                                    href="#">{{ $date }}</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->index == 8)
                        </div>
                        <div class="list-width-new">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.homepage.free-advice')
        </div>
    </div>
</div>
<div class="row bggry mrgn-tphei">
    <div class="container">
        <div class="row testimonial">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="ttl">Testimonials</h2>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 col-md-offset-2 mdfrd">
                {{-- <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="/images/testimonials/uclean.png" alt="uclean">
                        </div>
                        <div class="testimonial-content">
                            <p class="description">
                                Franchise India is a trusted brand and a name synonymous with the franchising industry,
                                not just in India but globally. They have a true professional approach and superb
                                management skills, which makes working with them easy but with great results!
                            </p>
                            <h3 class="testimonial-title">U clean</h3>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="pic">
                            <img src="/images/testimonials/u-hostels.png" alt="u-hostels">
                        </div>
                        <div class="testimonial-content">
                            <p class="description">
                                We began our association with Franchise India recently as they are truly the champions
                                of their field. It has been amazing working with them to increase our brand visibility
                                and scale our business.
                            </p>
                            <h3 class="testimonial-title">U Hostels Hospitality LLP</h3>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="pic">
                            <img src="/images/testimonials/phonup.png" alt="phonup">
                        </div>
                        <div class="testimonial-content">
                            <p class="description">
                                Franchise India is an international brand with a strong global presence. They actually
                                helped us in achieving our dream of building a successful business in the retail
                                segment. We look forward to working with them and continue to grow our business.
                            </p>
                            <div class="testimonial-title">Phonup</div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="pic">
                            <img src="/images/testimonials/little.jpg" alt="little">
                        </div>
                        <div class="testimonial-content">
                            <p class="description">
                                India is the most important strategic market for Little Kickers worldwide. We have
                                signed Franchise India as our exclusive business development partner to build an
                                extensive unit franchise network in India. We are setting up our own offices in India to
                                provide excellent training, operational support to our upcoming unit franchisees.
                            </p>
                            <div class="testimonial-title">Little Kickers</div>
                        </div>
                    </div>
                </div> --}}
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/jio-bp-home.png') }}"
                                    alt="Jio-bp">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    I am writing to express my sincere appreciation for the Franchise Expo held in
                                    Gandhinagar. The venue and arrangements, expertly handled by the Franchisee India
                                    Team, were truly excellent. We are highly satisfied with the quality and quantity of
                                    leads generated during the expo. A special commendation goes to the Franchisee India
                                    Team for their all-inclusive service. Overall, we are extremely happy with our
                                    experience at this event and look forward to future collaborations.
                                </p>
                                <h3 class="testimonial-title">Jio-bp</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/naturals-home.png') }}"
                                    alt="Naturals Salon & Spa">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    We are extremely pleased with the exceptional services provided by Franchise India.
                                    The team demonstrated unparalleled professionalism, efficiency, and dedication.
                                    Their commitment to excellence and attention to detail have surpassed our
                                    expectations. Working with Franchise India has been a truly rewarding experience and
                                    we wholeheartedly recommend their services to anyone seeking top-notch quality and
                                    reliability.
                                </p>
                                <h3 class="testimonial-title">Naturals Salon &amp; Spa</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/apollo.webp') }}"
                                    alt="Apollo Health and Lifestyle Limited">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    Your team's dedication and expertise have played a pivotal role in enhancing our
                                    outreach efforts and driving meaningful results. The quality of leads generated
                                    through our partnership with Franchise India has exceeded our expectations and we
                                    are truly appreciative of the commitment to excellence demonstrated by each member
                                    of your team.
                                </p>
                                <h3 class="testimonial-title">Apollo Health and Lifestyle Limited</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/fnp-home.png') }}"
                                    alt="Ferns N Petals">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    It is indeed an ideal platform to expand any brand PAN India. Our long association
                                    has helped us to grow our network &amp; establish 300+ outlets in 98 cities.
                                </p>
                                <h3 class="testimonial-title">Ferns N Petals</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/vlcc.webp') }}"
                                    alt="VLCC School of Beauty">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    Our entrepreneurial journey at Franchise India has been highly rewarding. The
                                    support and guidance provided by the Franchise India team have been outstanding.
                                    They have been with us every step of the way, offering valuable insights and
                                    strategies to maximize our lead generation efforts. Their dedication to helping us
                                    succeed has truly set them apart.
                                </p>
                                <h3 class="testimonial-title">VLCC School of Beauty</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/frontier.webp') }}"
                                    alt="Frontier Biscuit">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    Thanks to Franchise India's online platform, we have been able to accelerate the
                                    growth of our franchise network and expand our presence. We recommend Franchise
                                    India to any business seeking to enhance their franchise development efforts. The
                                    support provided by them has been invaluable.
                                </p>
                                <h3 class="testimonial-title">Frontier Biscuit</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/eurokids.webp') }}"
                                    alt="EuroKids">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    Our association with Franchise India has been since 2001-02 ever since we started
                                    EuroKids Pre-school. This is very unique in our view that they have created this
                                    platform for franchise owners and prospective franchisees to come together. It's a
                                    great platform in a country like India.
                                </p>
                                <h3 class="testimonial-title">EuroKids</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/makemytrip.webp') }}"
                                    alt="MakeMyTrip">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    Our association with FranchiseIndia.com has been fruitful. We have managed to form
                                    many successful partnerships because of FranchiseIndia.com. The team is extremely
                                    helpful.
                                </p>
                                <h3 class="testimonial-title">MakeMyTrip</h3>
                            </div>
                        </a>
                    </div>

                    <div class="testimonial">
                        <a href="https://www.franchiseindia.com/testimonials-reviews">
                            <div class="pic">
                                <img class="lozad" src="{{ url('images/testimonials/inxpress.webp') }}"
                                    alt="InXpress">
                            </div>
                            <div class="testimonial-content">
                                <p class="description">
                                    We have been associated with Franchise India for many years and our experience has
                                    been consistently positive. The website listing has been instrumental in generating
                                    high-intent inquiries and enhancing visibility for the InXpress brand. We have also
                                    had excellent experiences participating in various Franchise India exhibitions.
                                </p>
                                <h3 class="testimonial-title">InXpress</h3>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
