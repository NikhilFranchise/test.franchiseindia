@if(Request::segment(1) == 'hi')
    <h2 class='ttl singlehindi'> फीचर्ड फ्रैंचाइज़ी कम्पनीज</h2>
@else
    <h2 class='ttl'>Featured Franchise Companies</h2>
@endif

<div class="bdy {{ (Request::segment(1) == 'hi') ? "singlehindi" : "" }}">
    <div class="row">
    @foreach($brands->where('brand_section', 5)->take(48)->shuffle() as $logoDetail)
        @php
            $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
            if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
        @endphp
        <div class="col-xs-12 col-sm-3 col-md-2 mdfiy1024">
            <div class="logo-list sm-fe">
                <div class="img-ver"><a href="{{$brandUrl}}" target="_blank"><img  class="lozad" data-src="{{$logoDetail['brand_img']}}" alt="Featured Franchise Companies" /></a></div>
            </div>
            <div class="invest-price">
                {{ (Request::segment(1) == 'hi') ? "निवेश" : "Investment" }} :<div>{{$logoDetail['investment_range']}}</div>
            </div>
        </div>
    @endforeach
    </div>
</div>
