<div class="maycontentblk">
  <div class="container">
      <div class="headbh">You May Also like</div>

      <div class="swiper-container">
          <div class="swiper-wrapper">
              <!-- 1  -->
              @foreach($trendArticles as $article) 
                @if($loop->index < 7) 
                @php $kicker = Config('constants.MainDomain') . '/insightlist/' . $article['urlKicker']; 
                $image = Config('constants.awsS3Url') . $article['image']; 
                $url = Config('constants.MainDomain') . '/insight/' . $article['slug'] . '.' . $article['news_id']; 
              @endphp
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <a href="{{ $url }}"><img src="{{ $image }}" alt="{{$article->title}}" /></a>
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="{{ $kicker }}">{{ $article->kicker }}</a></div>
                          <div class="artihead"><a href="{{ $url }}">{{ $article->homeTitle }}</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->
              @endif 
              @endforeach
              {{-- <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/fi/int/5ddf599298c30.jpeg" alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->

              <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/fi/int/5e8ef79ef3c6a.jpeg" alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->

              <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/news/fi/602d014bde99e.jpeg" alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->

              <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/fi/int/5ff40e6aaa3da.jpeg " alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->

              <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/fi/art/5e1d5b87cb31a.jpeg" alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  -->

              <!-- 1  -->
              <div class="swiper-slide">
                  <div class="mabox">
                      <div class="imgsec">
                          <img src="https://www.franchiseindia.com/uploads/thumbnails/fi/art/60780ad59b915.jpeg" alt="" />
                      </div>
                      <div class="catblk">
                          <div class="catname"><a href="#">Health And Fitness Franchise</a></div>
                          <div class="artihead"><a href="#">Best 5 Health And Wellness Franchise Sectors</a></div>
                      </div>
                  </div>
              </div>
              <!--1  --> --}}
          </div>
          <div class="swiper-pagination"></div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
      </div>
  </div>
</div>
