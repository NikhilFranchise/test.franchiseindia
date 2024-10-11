@php
    use Jenssegers\Agent\Agent;
    use Illuminate\Support\Str;

    $agent = new Agent();
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-icon.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }

@endphp
@if ($agent->isMobile())
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
@endif
</body>

</html>
