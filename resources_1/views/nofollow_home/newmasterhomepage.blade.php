@mobile
    @include('nofollow_home.mobile.header')
    @include('nofollow_home.mobile.herosection')
    <main id="main" class="main">
        @include('nofollow_home.mobile.leading-franchise-today')
        @include('nofollow_home.mobile.top-business-opportunities')
        @include('nofollow_home.mobile.top-dealership-opportunity')
        {{-- @include('nofollow_home.mobile.business-for-sale') --}}
        @include('nofollow_home.mobile.upcoming-events')
        @include('nofollow_home.mobile.trending-videoes')
        @include('nofollow_home.mobile.top-international-opportunities')
        {{-- @include('nofollow_home.mobile.hgps') --}}
        @include('nofollow_home.mobile.tfo')
        @include('nofollow_home.mobile.ffc')
        {{-- @include('nofollow_home.mobile.franchise_insights_news') --}}
        @include('nofollow_home.mobile.testimonials')
        @include('nofollow_home.mobile.mobile_popup')
    </main>
    @include('nofollow_home.mobile.sidemenu-mobile')
    <div class="overlay"></div>
    @include('nofollow_home.mobile.newsletter')
    @include('nofollow_home.mobile.aboutus')
    @include('nofollow_home.mobile.footer-mobile')
@endmobile
@notmobile
    @include('nofollow_home.header')
    @include('nofollow_home.herosection')
    <main id="main" class="main">
        @include('nofollow_home.cardsection')
        @include('nofollow_home.covidproof')
        @include('nofollow_home.tbo')
        @include('nofollow_home.tdo')
        {{-- @include('nofollow_home.businessforsale') --}}
        @include('nofollow_home.videoevent')
        @include('nofollow_home.tio')
        {{-- @include('nofollow_home.hgps') --}}
        @include('nofollow_home.tfo')
        @include('nofollow_home.ffc')
        @include('nofollow_home.f_insights_news')
        @include('nofollow_home.testimonials')
        @include('nofollow_home.desktop_popup')
        @include('nofollow_home.loginmodal')
        {{--  @include('nofollow_home.popupfranchiseindiamumbai')  --}}
    </main>
    @include('nofollow_home.sidemenu')
    <div class="overlay"></div>
    @include('nofollow_home.newsletter')
    @include('nofollow_home.aboutus')
    @include('nofollow_home.footersection')
    @include('nofollow_home.footer')
@endnotmobile
</body>
    @if (
        !(
            !empty(request()->segment(2)) &&
            request()->segment(1) == 'brands' &&
            isset(explode('.', request()->segment(2))[1]) &&
            in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands'))
        ))
        @notmobile
            @php
                $expoPopup = 0;
                if (empty(Cookie::get('expoppoup17'))) {
                    $expoPopup = 1;
                    Cookie::queue('expoppoup17', 'RI2017', 120);
                }
                $ip = $_SERVER['REMOTE_ADDR'];
                $query = '';
                $query = App\Http\Controllers\CommonController::getIpLocationState($ip);
                if (!empty($query)) {
                    $query = strtolower($query);
                }
                $southCodes = ['andhra pradesh', 'tamil nadu', 'tamilnadu'];
                $eastCodes = ['odisha', 'nepal', 'arunachal pradesh', 'assam', 'meghalaya', 'orissa', 'tripura'];
                $westCodes = ['goa', 'gujarat', 'rajasthan'];
                $northCodes = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'uttarakhand', 'uttar pradesh', 'delhi', 'haryana'];
                $centerCodes = ['madhya pradesh', 'chhattisgarh', 'maharashtra'];
                $indiaCodes = ['andhra pradesh', 'kerala', 'lakshadweep', 'pondicherry', 'telangana', 'tamil nadu', 'tamilnadu', 'haryana'];
                $ClientCodes = ['bihar', 'jharkhand'];

                App\Http\Controllers\CommonController::checkCampaignUrl();
            @endphp

            @if ($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
                @if (in_array($query, $southCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpocoimbatore')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpocoimbatore')
                    @endif
                @elseif (in_array($query, $eastCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpobhubaneswar')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpobhubaneswar')
                    @endif
                @elseif (in_array($query, $ClientCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpopatna')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpopatna')
                    @endif
                @elseif (in_array($query, $westCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @elseif (in_array($query, $northCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpochandigarh')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpochandigarh')
                    @endif
                @elseif (in_array($query, $centerCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpoindore')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpoindore')
                    @endif
                @else
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupfranchiseexpoindore')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseexpoindore')
                    @endif
                @endif
            @endif

        @endnotmobile
    @endif
</html>
