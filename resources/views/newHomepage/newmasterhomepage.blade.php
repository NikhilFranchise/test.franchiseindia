@mobile
    @include('newHomepage.mobile.header')
    @include('newHomepage.mobile.herosection')
    <main id="main" class="main">
        @include('newHomepage.mobile.leading-franchise-today')
        @include('newHomepage.mobile.top-business-opportunities')
        @include('newHomepage.mobile.top-dealership-opportunity')
        @include('newHomepage.mobile.business-for-sale')
        @include('newHomepage.mobile.upcoming-events')
        @include('newHomepage.mobile.trending-videoes')
        @include('newHomepage.mobile.top-international-opportunities')
        @include('newHomepage.mobile.hgps')
        @include('newHomepage.mobile.tfo')
        @include('newHomepage.mobile.ffc')
        @include('newHomepage.mobile.franchise_insights_news')
        @include('newHomepage.mobile.testimonials')
    </main>
    @include('newHomepage.mobile.sidemenu-mobile')
    <div class="overlay"></div>
    @include('newHomepage.mobile.newsletter')
    @include('newHomepage.mobile.aboutus')
    @include('newHomepage.mobile.footer-mobile')
@endmobile
@notmobile
    @include('newHomepage.header')
    @include('newHomepage.herosection')
    <main id="main" class="main">
        @include('newHomepage.cardsection')
        @include('newHomepage.covidproof')
        @include('newHomepage.tbo')
        @include('newHomepage.tdo')
        @include('newHomepage.businessforsale')
        @include('newHomepage.videoevent')
        @include('newHomepage.tio')
        @include('newHomepage.hgps')
        @include('newHomepage.tfo')
        @include('newHomepage.ffc')
        @include('newHomepage.f_insights_news')
        @include('newHomepage.testimonials')
        @include('newHomepage.loginmodal')
        {{--  @include('newHomepage.popupfranchiseindiamumbai')  --}}
    </main>
    @include('newHomepage.sidemenu')
    <div class="overlay"></div>
    @include('newHomepage.newsletter')
    @include('newHomepage.aboutus')
    @include('newHomepage.footersection')
    @include('newHomepage.footer')
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
                $southCodes = ['andhra pradesh'];
                $eastCodes = ['bihar', 'jharkhand', 'odisha', 'nepal', 'arunachal pradesh', 'assam', 'meghalaya', 'orissa', 'tripura'];
                $westCodes = ['goa', 'gujarat', 'rajasthan'];
                $northCodes = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'uttarakhand', 'uttar pradesh', 'delhi', 'haryana'];
                $centerCodes = ['madhya pradesh', 'chhattisgarh', 'maharashtra'];
                $indiaCodes = ['andhra pradesh', 'kerala', 'lakshadweep', 'pondicherry', 'telangana', 'tamil nadu', 'tamilnadu', 'haryana'];
                $ClientCodes = ['west bengal'];

                App\Http\Controllers\CommonController::checkCampaignUrl();
            @endphp

            @if ($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
                @if (in_array($query, $southCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @elseif (in_array($query, $eastCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @elseif (in_array($query, $ClientCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
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
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @elseif (in_array($query, $centerCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @else
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popupmag')
                        @endif
                    @else
                        @include('includes.banners.popupmag')
                    @endif
                @endif
            @endif

        @endnotmobile
    @endif  
</html>
