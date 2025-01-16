<script async src="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}"></script>
{{-- <script async src="https://rtbcdn.andbeyond.media/prod-global-550463.js"></script> --}}
<!-- Affinity HVR Invocation Code //-->
<script type="text/javascript">
    (function() {
        var o = 'script',
            s = top.document,
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0],
            d = new Date();
        a.async = 1;
        a.src = 'https://hbs.ph.affinity.com/v5/franchiseindia.com/index.php?t=' + d.getDate() + d.getMonth() + d
            .getHours();
        m.parentNode.insertBefore(a, m)
    })()
</script>
@if (request()->segment(1) == 'business-opportunities' ||
        request()->segment(2) == 'business-opportunities' ||
        request()->segment(1) == 'brands' ||
        request()->segment(2) == 'brands' || request()->segment(1) == 'insights')
    <div id = "v-franchiseindia-v1"></div>
    <script>
        (function(v, d, o, ai) {
            ai = d.createElement('script');
            ai.defer = true;
            ai.async = true;
            ai.src = v.location.protocol + o;
            d.head.appendChild(ai);
        })(window, document, '//a.vdo.ai/core/v-franchiseindia-v1/vdo.ai.js');
    </script>
@endif
@if (request()->segment(1) == 'insights')
    <!-- Affinity HVR Invocation Code //-->
    <script type="text/javascript">
        (function() {
            var o = 'script',
                s = top.document,
                a = s.createElement(o),
                m = s.getElementsByTagName(o)[0],
                d = new Date(),
                timestamp = "" + d.getDate() + d.getMonth() + d.getHours();
            a.async = 1;
            a.src = 'https://cdn4-hbs.affinitymatrix.com/hvrcnf/franchiseindia.com/' + timestamp + '/index?t=' +
                timestamp;
            m.parentNode.insertBefore(a, m)
        })();
    </script>
@endif
<!-- new code start -->
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
    window.googletag = window.googletag || {
        cmd: []
    }; 
    <!--For mobile start-- >
    @mobile
        googletag.cmd.push(function() {
            @if (request()->segment(1) == '')
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'food-and-beverage.m2' || request()->segment(2) == 'food-and-beverage.m2')
                googletag.defineSlot('/1057625/FIHL/WAP_Category_FB_300x250_ATF', [300, 250],
                    'adslot300x250_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_FB_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_FB_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_FB_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_FB_300x250_BTF', [300, 250],
                    'adslot300x250_BTF').addService(googletag.pubads());
            @elseif (request()->segment(1) == 'beauty-and-health.m1' || request()->segment(2) == 'beauty-and-health.m1')
                googletag.defineSlot('/1057625/FIHL/WAP_Category_Beauty_and_Health_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_Beauty_and_Health_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_Beauty_and_Health_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
            @elseif (request()->segment(1) == 'business-opportunities' || request()->segment(2) == 'business-opportunities')
                googletag.defineSlot('/1057625/FIHL/WAP_Category_320x100_ATF', [320, 100], 'adslot320x100_ATF')
                    .addService(googletag.pubads());

                //googletag.defineSlot('/1057625/FIHL/WAP_Category_300x250_ATF', [300, 250], 'adslot300x250_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/WAP_Category_200x200_Mid_1', [200, 200],
                    'adslot200x200_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_200x200_Mid_2', [200, 200],
                    'adslot200x200_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_200x200_Mid_3', [200, 200],
                    'adslot200x200_Mid_3').addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/WAP_Category_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_Category_300x250_BTF', [300, 250], 'adslot300x250_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'brands')
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_ATF', [300, 250], 'adslot300x250_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_BTF', [300, 250], 'adslot300x250_BTF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_320x100_Top', [320, 100], 'adslot320x100_ATF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'content' ||
                    request()->segment(2) == 'content' ||
                    request()->segment(1) == 'education' ||
                    request()->segment(1) == 'wellness' ||
                    request()->segment(1) == 'magazine')
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_ATF', [300, 250], 'adslot300x250_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_Mid_1', [300, 250], 'adslot300x250_Mid_1')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_BTF', [300, 250], 'adslot300x250_BTF')
                    .addService(googletag.pubads());

                @if (request()->segment(1) == 'content' || request()->segment(2) == 'content')
                    googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_Mid_2', [300, 250],
                        'adslot300x250_Mid_2').addService(googletag.pubads());
                    googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_Mid_3', [300, 250],
                        'adslot300x250_Mid_3').addService(googletag.pubads());
                    googletag.defineSlot('/1057625/FIHL/WAP_ROS_320x100_ATF', [320, 100], 'adslot320x100_ATF')
                        .addService(googletag.pubads());
                    googletag.defineSlot('/1057625/FIHL/WAP_ROS_320x100_Top', [320, 100], 'adslot320x100_TOP')
                        .addService(googletag.pubads());
                @endif
            @elseif (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand')
                googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_ATF', [300, 250], 'adslot300x250_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_BTF', [300, 250], 'adslot300x250_BTF')
                    .addService(googletag.pubads());
            @else
                googletag.defineSlot('/1057625/FIHL/WAP_ROS_300x250_BTF', [300, 250], 'adslot300x250_BTF')
                    .addService(googletag.pubads());
            @endif
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    @endmobile 
    <!--For Mobile end-- >
    @desktop
        googletag.cmd.push(function() {

            @if (request()->segment(1) == '')
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'food-and-beverage.m2' || request()->segment(2) == 'food-and-beverage.m2')
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_728x90_ATF', [728, 90],
                    'adslot728x90_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x600_Mid_1', [300, 600],
                    'adslot300x600_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x600_Mid_2', [300, 600],
                    'adslot300x600_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_300x600_Mid_3', [300, 600],
                    'adslot300x600_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_240x400_Mid_1', [240, 400],
                    'adslot240x400_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_240x400_Mid_2', [240, 400],
                    'adslot240x400_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_240x400_Mid_3', [240, 400],
                    'adslot240x400_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_200x200_Mid_1', [200, 200],
                    'adslot200x200_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_200x200_Mid_2', [200, 200],
                    'adslot200x200_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_200x200_Mid_3', [200, 200],
                    'adslot200x200_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_728x90_Mid_1', [728, 90],
                    'adslot728x90_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_728x90_Mid_2', [728, 90],
                    'adslot728x90_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_728x90_Mid_3', [728, 90],
                    'adslot728x90_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_FB_728x90_BTF', [
                    [728, 90],
                    [970, 90],
                    [970, 250]
                ], 'adslot728x90_BTF').addService(googletag.pubads());
            @elseif (request()->segment(1) == 'beauty-and-health.m1' || request()->segment(2) == 'beauty-and-health.m1')
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_728x90_ATF', [728, 90],
                    'adslot728x90_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x600_Mid_1', [300,
                    600
                ], 'adslot300x600_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x600_Mid_2', [300,
                    600
                ], 'adslot300x600_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x600_Mid_3', [300,
                    600
                ], 'adslot300x600_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x250_Mid_1', [300,
                    250
                ], 'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x250_Mid_2', [300,
                    250
                ], 'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_Beauty_and_Health_300x250_Mid_3', [300,
                    250
                ], 'adslot300x250_Mid_3').addService(googletag.pubads());
            @elseif (request()->segment(1) == 'business-opportunities' || request()->segment(2) == 'business-opportunities')
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x600_Mid_1', [300, 600],
                    'adslot300x600_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x600_Mid_2', [300, 600],
                    'adslot300x600_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_300x600_Mid_3', [300, 600],
                    'adslot300x600_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_240x400_Mid_1', [240, 400],
                    'adslot240x400_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_240x400_Mid_2', [240, 400],
                    'adslot240x400_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_240x400_Mid_3', [240, 400],
                    'adslot240x400_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_200x200_Mid_1', [200, 200],
                    'adslot200x200_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_200x200_Mid_2', [200, 200],
                    'adslot200x200_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_200x200_Mid_3', [200, 200],
                    'adslot200x200_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_728x90_Mid_1', [728, 90],
                    'adslot728x90_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_728x90_Mid_2', [728, 90],
                    'adslot728x90_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_Category_728x90_Mid_3', [728, 90],
                    'adslot728x90_Mid_3').addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/Desktop_Category_728x90_BTF', [
                    [728, 90],
                    [970, 90],
                    [970, 250]
                ], 'adslot728x90_BTF').addService(googletag.pubads());
            @elseif (request()->segment(1) == 'brands')
                //         googletag.defineSlot('/1057625/FIHL/Desktop_ROS_970x90', [[728, 90], [970, 90],[970,250]], 'adslot970x90').addService(googletag.pubads());
                //         googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [[300, 250],[300,600]], 'adslot300x250_ATF').addService(googletag.pubads());
                //        googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF').addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [
                    [300, 250],
                    [300, 600]
                ], 'adslot300x250_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_970x250', [970, 250], 'adslot970x250')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'insights')
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [
                    [300, 250],
                    [300, 600]
                ], 'adslot300x250_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_970x250', [970, 250], 'adslot970x250')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'content' ||
                    request()->segment(2) == 'content' ||
                    request()->segment(1) == 'education' ||
                    request()->segment(1) == 'wellness' ||
                    request()->segment(1) == 'magazine')
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                    .addService(googletag.pubads());
                {{-- @if (request()->segment(1) != 'magazine' && request()->segment(2) != '') --}}
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_970x90', [970, 90], 'adslot970x90').addService(
                    googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_970x250', [970, 250], 'adslot970x250')
                    .addService(googletag.pubads());
                {{-- @endif --}}

                @if (request()->segment(1) == 'education' || request()->segment(1) == 'wellness')
                    googletag.defineSlot('/1057625/FIHL/Education_Desktop_HP_728x90_Mid_1', [728, 90],
                        'adslot728x90_Mid_1').addService(googletag.pubads());
                @endif
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [300, 250], 'adslot300x250_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x600_ATF', [300, 600], 'adslot300x600_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand')
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_ATF', [970, 90], 'adslot970x90_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_160x600_Left', [160, 600], 'adslot160x600_Left')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_300x250', [300, 250], 'adslot300x250')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_BTF', [
                    [728, 90],
                    [970, 90]
                ], 'adslot728x90_BTF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_Mid_1', [
                    [970, 90],
                    [970, 250]
                ], 'adslot970x90_Mid_1').addService(googletag.pubads());
            @else
                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_728x90_BTF', [
                    [728, 90],
                    [970, 90],
                    [970, 250]
                ], 'adslot728x90_BTF').addService(googletag.pubads());
            @endif
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    @enddesktop

    @tablet
        googletag.cmd.push(function() {
            @if (request()->segment(1) == '')
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'business-opportunities' || request()->segment(2) == 'business-opportunities')
                googletag.defineSlot('/1057625/FIHL/Tab_Category_468x60_ATF', [468, 60], 'adslot468x60_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_300x250_Mid_1', [300, 250],
                    'adslot300x250_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_300x250_Mid_2', [300, 250],
                    'adslot300x250_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_300x250_Mid_3', [300, 250],
                    'adslot300x250_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_200x200_Mid_1', [200, 200],
                    'adslot200x200_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_200x200_Mid_2', [200, 200],
                    'adslot200x200_Mid_2').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_200x200_Mid_3', [200, 200],
                    'adslot200x200_Mid_3').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_Category_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'brands')
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_468x60_ACS', [468, 60], 'adslot468x60_ACS')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_468x60_ATF', [468, 60], 'adslot468x60_ATF')
                    .addService(googletag.pubads());
            @elseif (request()->segment(1) == 'content' ||
                    request()->segment(1) == 'education' ||
                    request()->segment(1) == 'wellness' ||
                    request()->segment(1) == 'magazine')
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_468x60_ATF', [468, 60], 'adslot468x60_ATF')
                    .addService(googletag.pubads());
                @if (request()->segment(1) == 'content' ||
                        request()->segment(2) == 'content' ||
                        request()->segment(1) == 'education' ||
                        request()->segment(1) == 'wellness')
                    googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                        .addService(googletag.pubads());
                    googletag.defineSlot('/1057625/FIHL/Tab_ROS_468x60_ACS', [468, 60], 'adslot468x60_ACS')
                        .addService(googletag.pubads());
                @endif
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
                @if (request()->segment(1) == 'education' || request()->segment(1) == 'wellness')
                    googletag.defineSlot('/1057625/FIHL/Education_Desktop_HP_728x90_Mid_1', [728, 90],
                        'adslot728x90_Mid_1').addService(googletag.pubads());
                @endif
            @elseif (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand')
                googletag.defineSlot('/1057625/FIHL/Tab_HP_728x90_ATF', [728, 90], 'adslot728x90_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_HP_160x600_ATF', [160, 600], 'adslot160x600_ATF')
                    .addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/Tab_HP_300x250_ATF', [300, 250], 'adslot300x250_ATF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_HP_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_ATF_1', [728, 90], 'adslot728x90_ATF_1')
                    .addService(googletag.pubads());
            @else
                googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_BTF', [728, 90], 'adslot728x90_BTF')
                    .addService(googletag.pubads());
            @endif
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    @endtablet
</script>
<!-- Global site tag (gtag.js) - Google Ads: 767541249 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-767541249"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-767541249');
</script>

@if (request()->method() == 'POST' &&
        (url()->current() == url('thanks-advice-form') ||
            url()->current() == url('investor/register') ||
            url()->current() == url('brandcontactinfo') ||
            url()->current() == url('getfreeinfo') ||
            url()->current() == url('contact-submit') ||
            url()->current() == url('newslettersignup') ||
            url()->current() == url('education/newslettersignup') ||
            url()->current() == url('restaurant/newslettersignup') ||
            url()->current() == url('wellness/newslettersignup') ||
            url()->current() == url('property-loan-submit') ||
            url()->current() == url('exit-popup-post')))
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-767541249/ebcBCLeLprIBEIGA_-0C'
        });
    </script>
@endif

<!-- Facebook Pixel Code -->

<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1055876857756260');
    fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1055876857756260&ev=PageView&noscript=1" /></noscript>

<!-- End Facebook Pixel Code -->
