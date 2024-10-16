@include('cwv-mobile.header')
@include('cwv-mobile.herosection')
<main id="main" class="main">
    @include('cwv-mobile.leading-franchise-today')
    @include('cwv-mobile.top-business-opportunities')
    @include('cwv-mobile.top-dealership-opportunity')
    @include('cwv-mobile.business-for-sale')
    @include('cwv-mobile.upcoming-events')
    @include('cwv-mobile.trending-videoes')
    @include('cwv-mobile.top-international-opportunities')
    @include('cwv-mobile.hgps')
    @include('cwv-mobile.tfo')
    @include('cwv-mobile.ffc')
    @include('cwv-mobile.franchise_insights_news')
    @include('cwv-mobile.testimonials')
</main>
@include('cwv-mobile.sidemenu-mobile')
<div class="overlay"></div>
@include('cwv-mobile.newsletter')
@include('cwv-mobile.aboutus')
@include('cwv-mobile.footer-mobile')
@php
    use Illuminate\Support\Str;
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
    if (request()->segment(2) === 'brands' || (request()->segment(2) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-icon.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(2);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = 'education-logo-black.svg';
        $menuicon = 'menu-iconei.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'education';
        $mangecls = 'wiei';
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = 'wellness-logo-black.svg';
        $menuicon = 'menu-iconwi.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'wellness';
        $mangecls = 'wiei';
    }
@endphp
