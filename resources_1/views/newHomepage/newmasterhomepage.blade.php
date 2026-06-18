@mobile
    @include('newHomepage.mobile.header')
    @include('newHomepage.mobile.herosection')
    <main id="main" class="main">
        @include('newHomepage.mobile.leading-franchise-today')
        @include('newHomepage.mobile.top-business-opportunities')
        @include('newHomepage.mobile.top-dealership-opportunity')
        {{-- @include('newHomepage.mobile.business-for-sale') --}}
        @include('newHomepage.mobile.upcoming-events')
        @include('newHomepage.mobile.trending-videoes')
        @include('newHomepage.mobile.top-international-opportunities')
        {{-- @include('newHomepage.mobile.hgps') --}}
        @include('newHomepage.mobile.tfo')
        @include('newHomepage.mobile.ffc')
        {{-- @include('newHomepage.mobile.franchise_insights_news') --}}
        @include('newHomepage.mobile.testimonials')
        @include('newHomepage.mobile.mobile_popup')
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
        {{-- @include('newHomepage.businessforsale') --}}
        @include('newHomepage.videoevent')
        @include('newHomepage.tio')
        {{-- @include('newHomepage.hgps') --}}
        @include('newHomepage.tfo')
        @include('newHomepage.ffc')
        @include('newHomepage.f_insights_news')
        @include('newHomepage.testimonials')
        @include('newHomepage.desktop_popup')
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

				$southCodes = ['andhra pradesh', 'tamil nadu', 'tamilnadu', 'telangana', 'karnataka', 'kerala', 'lakshadweep', 'pondicherry'];
				$eastCodes = ['odisha', 'nepal', 'arunachal pradesh', 'assam', 'meghalaya', 'orissa', 'tripura', 'bihar', 'jharkhand', 'manipur', 'mizoram', 'nagaland', 'sikkim', 'west Bengal'];
				$westCodes = ['goa', 'gujarat', 'rajasthan', 'maharashtra', 'dadra and nagar haveli and daman and diu'];
				$northCodes = ['punjab', 'chandigarh', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'uttarakhand', 'uttar pradesh', 'haryana', 'delhi', 'ladakh'];
				$centerCodes = ['madhya pradesh', 'chhattisgarh', 'maharashtra'];
				$indiaCodes = ['andhra pradesh', 'arunachal pradesh', 'assam', 'bihar', 'chhattisgarh', 'goa', 'gujarat', 'haryana', 'jharkhand', 'himachal pradesh', 'karnataka', 'kerala', 'madhya pradesh', 'maharashtra', 'manipur', 'meghalaya', 'mizoram', 'nagaland', 'odisha', 'punjab', 'rajasthan', 'sikkim', 'tripura', 'uttarakhand', 'uttar pradesh', 'west Bengal', 'delhi', 'jammu and kashmir', 'telangana', 'tamil nadu', 'tamilnadu', 'lakshadweep', 'pondicherry', 'andaman and nicobar islands', 'chandigarh', 'dadra and nagar haveli and daman and diu', 'ladakh'];
			
                App\Http\Controllers\CommonController::checkCampaignUrl();
            @endphp

            @if ($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
                @if (in_array($query, $southCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @elseif (in_array($query, $eastCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @elseif (in_array($query, $westCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @elseif (in_array($query, $northCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @elseif (in_array($query, $centerCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @else
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 1)
                            @include('includes.banners.popuppuneExpo')
                        @endif
                    @else
                        @include('includes.banners.popuppuneExpo')
                    @endif
                @endif
            @endif

        @endnotmobile
    @endif
</html>
