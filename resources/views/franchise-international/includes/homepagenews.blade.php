<div class="row mrgn-tp-30">
    <div class="container">
        <div class="row what-new">
            <div class="col-xs-12 col-sm-9 col-md-9 mdy-width hidden-xs">
                <div class="newsbot">
                    <div class="pull-left"><h2 class="newss"><a href="{{ Config('constants.NewsDomain') }}">News</a></h2></div>
                    <div class="pull-right viewaallhome"><a href="{{ Config('constants.NewsDomain') }}">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
                </div>
                <div class="row">
                    <div class="bxslider">
                        <div class="list-width-new">
                            @foreach($newsArticles as $article)
                                @php
                                    $a = date_create($article['time']);
                                    $date = date_format($a,"d M Y");
                                    $site = Config('constants.articleArr.'.$article['news_type']);
                                    $url = Config('constants.NewsDomain')."/".$site."/".$article['slug'].".n".$article['news_id'];
                                    //$imagePath = str_replace('/news/', '/news/thumbnails/', $article['image']);
                                    $imagePath = str_replace('uploads/', 'uploads/thumbnails/', $article['image']);
                                @endphp
                                <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                                    <div class="new-cat-list">
                                        <div class="cat-img">
                                            <a href="{{ $url }}">
                                                <img src="{{ $imagePath }}" alt="{{$article['homeTitle']}}" />
                                            </a>
                                            <div class="info">
                                                <div class="search-count">
                                                    <div class="vertical-mid">
                                                        <div class="bdr">
                                                            <div class="count">
                                                                <a href="{{ Config('constants.NewsDomain') }}/{{ $article['urlKicker'] }}">Startup</a>
                                                            </div>
                                                            <div class="name">
                                                                <a href="{{ $url }}">
                                                                    @if($article['homeTitle']=='')
                                                                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                                                                    @endif
                                                                    {{$article['homeTitle']}}
                                                                </a>
                                                            </div>
                                                            <div class="count"><a href="#">{{$date}}</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->index == 8)
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
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="/images/testimonials/uclean.png" alt="uclean">
                        </div>
                        <div class="testimonial-content">
                            <p class="description">
                                Franchise India is a trusted brand and a name synonymous with the franchising industry, not just in India but globally. They have a true professional approach and superb management skills, which makes working with them easy but with great results!
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
                                We began our association with Franchise India recently as they are truly the champions of their field. It has been amazing working with them to increase our brand visibility and scale our business.
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
                                Franchise India is an international brand with a strong global presence. They actually helped us in achieving our dream of building a successful business in the retail segment. We look forward to working with them and continue to grow our business.
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
                                India is the most important strategic market for Little Kickers worldwide. We have signed Franchise India as our exclusive business development partner to build an extensive unit franchise network in India. We are setting up our own offices in India to provide excellent training, operational support to our upcoming unit franchisees.
                            </p>
                            <div class="testimonial-title">Little Kickers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>