<section class="featured-franchise-opportunities">
    <h2 class="brands-head">
       {{ Request::segment(2) == 'hi' ? 'फीचर्ड फ्रैंचाइज़ कंपनियां' : 'Featured Franchise Companies' }}
    </h2>
    <div class="card-wrap">
       @foreach ($brandsffc->shuffle() as $logoDetail)
       @php
       $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
       if (isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans)) {
       $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
       }
       @endphp
       <div class="leading-card">
          <div class="brand-ins">
             <a href="{{ $brandUrl }}" target="_blank" aria-label="{{ $logoDetail['brand_alt'] }}">
                <img loading="lazy" src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_alt'] }}" width="110" height="50" loading="lazy" >
          </div>
          <div class="leading-card-brand-title">
          <h2><a href="{{ $brandUrl }}" target="_blank" aria-label="{{ $logoDetail['brand_alt'] }}">{{ mb_strimwidth($logoDetail['brand_alt'], 0, 25, '...') }}</a></h2>
          </div>
          <div class="leading-card-investment">
             <div class="card-info">{{ Request::segment(2) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
             <div class="card-info-amt">₹{{ $logoDetail['investment_range_new'] }}</div>
          </div>
       </div>
       @endforeach
    </div>
 </section>
