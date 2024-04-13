<meta charset="UTF-8">
<meta content="{{ request()->segment(1) == 'hi' ? "hi-in" : "en-in" }}" name="language"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
    @if(strpos(collect(request()->segments())->last(), 'range-') !== false)

        @php
            $mainTitle = $seoTitle;
            $lastSegment = str_replace("range-","Under Range ",collect(request()->segments())->last());
            $title1 = $lastSegment.' - Franchise India';
            $title = str_replace("- Franchise India",$title1,$seoTitle);
        @endphp
        @php
            if (preg_match("/ - Franchise India/", $title))
            {
                $mainTitle = $title;
            }
            else if(preg_match("/at Franchise India/", $title)){
            $mainTitle = str_replace("at Franchise India",$title1,$seoTitle);
            }
        @endphp
        {{ $mainTitle  }}
        {{--@yield('seoTitle', '-pawan')--}}
    @else
        @yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')
    @endif
</title>
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css')}}">
<!-- swiper@6.2.0 CSS -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/swiper/css/swiper-bundle.min.css')}}">
<!-- owl.carousel -->
<link href="{{url('newhomepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}"
      rel="stylesheet">
<!-- Our Custom CSS -->
{{-- @notmobile --}}
@if ($agent->isDesktop())
<link rel="stylesheet" href="{{url('newhomepage/assets/css/style.css')}}">
@endif
{{-- @endnotmobile --}}
{{-- @mobile --}}
@if ($agent->isMobile())
<link rel="stylesheet" href="{{url('newhomepage/assets/css/style-mobile-new.css')}}">
{{-- @endmobile --}}
@endif


<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
{{-- @notmobile --}}
@if ($agent->isDesktop())
<script>

    window.googletag = window.googletag || {cmd: []};
    googletag.cmd.push(function() {

        googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_ATF', [[970, 90],[728,90]], 'adslot970x90_ATF').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_Mid_1', [[970, 90],[728,90]], 'adslot970x90_Mid_1').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/Desktop_HP_300x250', [300, 250], 'adslot300x250').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_BTF', [[728, 90],[970, 90]], 'adslot728x90_BTF').addService(googletag.pubads());

        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
    });
</script>
@endif
{{-- @endnotmobile --}}
{{-- @mobile --}}
@if ($agent->isMobile())
<script>

    window.googletag = window.googletag || {cmd: []};
    googletag.cmd.push(function() {

        googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_ATF', [300, 250], 'adslot300x250_ATF').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_Mid_1', [300, 250], 'adslot300x250_Mid_1').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_Mid_2', [300, 250], 'adslot300x250_Mid_2').addService(googletag.pubads());
        //googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_Mid_3', [300, 250], 'adslot300x250_Mid_3').addService(googletag.pubads());
        googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_BTF', [300, 250], 'adslot300x250_BTF').addService(googletag.pubads());

        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
    });
</script>
{{-- @endmobile --}}
@endif