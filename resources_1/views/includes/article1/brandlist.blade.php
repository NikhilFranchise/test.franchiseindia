<div class="maincateblk">
 <div class="container">
  <div class="swiper-container">
   <div class="swiper-wrapper">
    <!-- 1  -->
    @foreach($relatedBrands as $article)
     @php
      $subsubcat = Config::get('constants.subSubCategoryArr.'.$article['ind_cat'].'.'.$article['ind_sub_cat']);
      $invSize   = Config::get('constants.investRangeInWords.'.$article['unit_investment']);
      $outlets   = Config::get('constants.NoOutlets.'.$article['no_fran_outlets']);
      $fType     = Config::get('constants.masterfranchiseType.'.$article['franchise_partner_type']);
     @endphp
    <div class="swiper-slide">
     <div class="cateblklist">
      <img src="{{asset('article/images/bestseller.svg')}}" class="bestc">
      <div class="fblk">
       <div class="imgblk">
        <div class="innerimgblk"><a href="{{ Config::get('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}">
          @if($article['company_logo']=='')
           <img src="{{URL::asset('images/no-img.jpg')}}" alt="no image" />
          @endif

          @if($article['company_logo']!='')
           <img alt="{{$article['company_name']}}"  src="{{Config::get('constants.franAwsImgPath')}}{{$article['company_logo']}}">
          @endif
         </a>
        </div>
       </div>
       <div class="catheadblk"><span><a href="#">{{$subsubcat}}</a></span>
        <a href="#">{{$article['company_name']}}</a>
       </div>
      </div>
      <div class="verifyblk">
       <div class="f1">
        <span class="fillimg"><img src="{{asset('article/images/tick.svg')}}"></span>
        <div class="filltxt">Phone - Verified</div>
       </div>
       <div class="f1">
        <span class="fillimg"><img src="{{asset('article/images/tick.svg')}}"></span>
        <div class="filltxt">Email - Verified</div>
       </div>
{{--       <div class="f1">--}}
{{--        <span class="fillimg"><img src="{{asset('article/images/tick.svg')}}"></span>--}}
{{--        <div class="filltxt">GST - Verified</div>--}}
{{--       </div>--}}
      </div>
      <div class="txtbk">
       @if($article['business_desc']!='')
        {{strip_tags(implode(' ', array_slice(explode(' ', substr(strip_tags($article['business_desc']),0,150)), 0, 50)))}}..

       @endif
      </div>
{{--      <div class="scbk">--}}
{{--       <div class="starblk">--}}
{{--        <span class="instarblk">4.7</span>--}}
{{--        <span class="instarblk"><img src="{{asset('article/images/star.svg')}}"></span>--}}
{{--        <span class="instarblk"><img src="{{asset('article/images/star.svg')}}"></span>--}}
{{--        <span class="instarblk"><img src="{{asset('article/images/star.svg')}}"></span>--}}
{{--        <span class="instarblk"><img src="{{asset('article/images/star_half.svg')}}"></span>--}}
{{--        <span class="instarblk"><img src="{{asset('article/images/stargrey.svg')}}"></span>--}}
{{--        <span class="instarblk gr">(456)</span>--}}
{{--       </div>--}}
{{--      </div>--}}
      <div class="invblk">
       Investment <br class="hideb">Required <span> <i class="fa fa-inr" aria-hidden="true"></i>  {{$invSize}}</span>
      </div>
      <div class="cattxtblk">
       <div class="txt1">Space Required</div>
       <div class="txt2">
        {{(($article['prop_area_min']=='') ? '-NA-' :  $article['prop_area_min'].' SqFt')}}
       </div>
      </div>
{{--      <div class="cattxtblk">--}}
{{--       <div class="txt1">--}}
{{--        Expected ROI--}}
{{--        <div class="tooltipfrm"><img src="{{asset('article/images/info.svg')}}">--}}
{{--         <span class="tooltiptextfrm">Select an industry or a sector in which the company operates.--}}
{{--                           E.g. Logistics Services.</span>--}}
{{--        </div>--}}
{{--       </div>--}}
{{--       <div class="txt2">30%</div>--}}
{{--      </div>--}}
{{--      <div class="cattxtblk">--}}
{{--       <div class="txt1">Payback Period <img src="{{asset('article/images/info.svg')}}"></div>--}}
{{--       <div class="txt2">6 Months</div>--}}
{{--      </div>--}}
      <div class="cattxtblk">
       <div class="txt1">Locations  for expansion</div>
       <div class="txt2">
        @if($article['city']||$article['state']!='')
         {{$article['city']}} {{$article['state']}}
        @endif

        @if($article['city']&& $article['state']=='')
         -NA-
        @endif
{{--        <a href="#">+23</a>--}}
       </div>
      </div>
      <div class="btncateblk">
       <a href="{{ Config::get('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}" class="contlink" title="{{$article['company_name']}}">View Detail</a>
      </div>
     </div>
    </div>

   @endforeach
    <!-- 1  end -->
   </div>
   <div class="swiper-pagination"></div>
  </div>
 </div>
</div>