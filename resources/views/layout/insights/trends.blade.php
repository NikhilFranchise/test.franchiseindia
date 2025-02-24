<div class="slidercomman">
   <div class="container">
      <div class="comhead"><a href="#">@if(App::getLocale() == 'en') Popular Content @else लोकप्रिय कंटेंट @endif</a></div>
      <div class="swiper-container">
         <div class="swiper-wrapper">
            @foreach ($trendArticles as $article)
            @php
            $locale = App::getLocale();
            $url = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($article['insight_type']) . '/' . $article['slug'] . '.' . $article['news_id'];
            @endphp
            @if ($loop->index < 8)
            <!-- below list start here  1-->
            <div class="swiper-slide">
               <div class="innerlist">
                  <div class="imgbl"><a href="{{$url}}"><img src="{{\App\Http\Controllers\InsightsController::createimgurl($article['image'])}}" alt="{{$article['title'] . ' image'}}"></a></div>
                  <div class="conblk">
                     @foreach($article->category as $cat)
                     <div class="tagl">{{$cat->catname}}</div>
                     @endforeach
                     <div class="hname"> <a href="{{$url}}">{{$article['title']}}</a></div>
                     <div class="aname"><img src="{{url('/insight-new/images/view.svg')}}" alt="views">&nbsp;&nbsp;{{ formatViews($article->views) }}
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endforeach
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
      </div>
   </div>
</div>
