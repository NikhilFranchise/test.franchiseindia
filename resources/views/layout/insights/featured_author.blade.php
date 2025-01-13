<div class="sliderauthor slidercommany">
    <div class="container">
        <div class="comhead">Featured Authors
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse ($authorTitles as $title)
                @php
                   $image = \App\Http\Controllers\InsightsController::authorImageurl($title->image);
                @endphp
                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="{{ $image }}" class="img-fluid" alt=""
                                height="200px" width="180px"></div>
                        <div class="home-author-name">{{ $title->title }}</div>
                        <div class="home-author-des">{{ $title->designation }}</div>
                        <a href="">View Articles</a>
                    </div>
                </div>
                @empty
                <div>No result.</div>
                @endforelse


                {{-- <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/gourav.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Ravindra</div>
                        <div class="home-author-des">CEO and Co-Founder, Fashinza</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/mallika.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Ruchira Shukla</div>
                        <div class="home-author-des">MD and Co-Founder of Luxury Ride</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/greg.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Paul</div>
                        <div class="home-author-des">EVP, Head of Digital Experience & Microsoft Business, Infosys</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/ruchira.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Sneha</div>
                        <div class="home-author-des">Editor</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/gourav.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Ravindra</div>
                        <div class="home-author-des">CEO and Co-Founder, Fashinza</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/mallika.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Ruchira Shukla</div>
                        <div class="home-author-des">MD and Co-Founder of Luxury Ride</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/greg.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Paul</div>
                        <div class="home-author-des">EVP, Head of Digital Experience & Microsoft Business, Infosys</div>
                        <a href="">View Articles</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="authors/ruchira.jpg" class="img-fluid" alt="" height=""
                                width=""></div>
                        <div class="home-author-name">Sneha</div>
                        <div class="home-author-des">Editor</div>
                        <a href="">View Articles</a>
                    </div>
                </div> --}}


            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
