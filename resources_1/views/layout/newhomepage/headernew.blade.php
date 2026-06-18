@php
    $auth = new \Illuminate\Support\Facades\Auth();
    $catTab = 'active';
    $locTab = '';
    $invTab = '';
    if (isset($catTabResult)) {
        if ($locTabResult != 0 || $invTabResult != 0) {
            $catTab = '';
        }
    }
    if (isset($locTabResult)) {
        if ($locTabResult != 0) {
            $locTab = 'active';
        }
    }
    if (isset($invTabResult)) {
        if ($invTabResult != 0) {
            $invTab = 'active';
        }
    }
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    if (isset($mc)) {
        $subCat = Config('constants.subCategoryArr.' . $mc);
        if (!empty($subCat)) {
            asort($subCat);
        }
    }
    if (isset($mc) && !empty($mc) && !empty($sc)) {
        $subSubcat = Config('constants.subSubCategoryArr.' . $sc);
        if (!empty($subSubcat)) {
            asort($subSubcat);
        }
    }
    $states = Config('location.stateArr');
    asort($states);
    if (
        isset($loc[0]) &&
        is_array($loc) &&
        is_numeric($loc[0]) &&
        array_key_exists($loc[0], Config('location.cityArr'))
    ) {
        $cities = Config('location.cityArr.' . $loc[0]);
        asort($cities);
    }
    $loginUrl = Config('constants.MainDomain') . '/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    if ($auth::check()) {
        $loginUrl = Config('constants.MainDomain') . '/logoutprofile';
        if (request()->user()->profile_type === config('constants.ProfileType.Franchisor')) {
            $regUrl = Config('constants.MainDomain') . '/franchisor/myaccount/dashboard';
        }
        if (request()->user()->profile_type === config('constants.ProfileType.Investor')) {
            $regUrl = Config('constants.MainDomain') . '/investor/myaccount/dashboard';
        }
        $loginName = 'Logout';
        $regName = 'My Account';
        $modelWindow = '';
        $class = 'mybtn';
    }
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
    $menuicon = 'menu-iconei.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);
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
    if (
        request()->segment(1) == 'franchisor' &&
        request()->segment(2) == 'registration' &&
        !empty(request()->session()->get('dealerForm')) &&
        request()->session()->get('dealerForm') == 'yes'
    ) {
        $menuicon = 'menu-iconei.png';
        $logo = '/dealers-india/dealer-logo.png';
    }
@endphp
