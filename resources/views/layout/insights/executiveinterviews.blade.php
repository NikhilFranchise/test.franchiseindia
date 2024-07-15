<div class="slidercomman">
   <div class="container">
      <div class="comhead"><a href="#">Executive Interviews </a> </div>
      
      <div class="swiper-container">
         <div class="swiper-wrapper">
            @foreach($interview as $inter)
            @php
          
            $image = Config('constants.awsS3Url') . $inter['image'];
            $url = Config('constants.MainDomain') . '/insights/' . strtolower($inter['insight_type']) . '/' . $inter['slug'] . '.' . $inter['news_id'];
            @endphp
           
            @if ($loop->index < 8)
            <!-- below list start here  1-->
            <div class="swiper-slide">
               <div class="innerlist">
                  <div class="imgbl"><a href="{{ $url }}"><img src="{{ $image }}" alt="{{$inter->title . ' image'}}"></a></div>
                  <div class="conblk">
                     @foreach($inter->category as $category)
                     <div class="tagl">{{ $category->catname }}</div>
                     @endforeach
                     <div class="hname"> <a href="{{ $url }}">{!! html_entity_decode(\Illuminate\Support\Str::words($inter->title, 10, ' ...'), ENT_QUOTES, 'UTF-8') !!}</a></div>
                     
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
