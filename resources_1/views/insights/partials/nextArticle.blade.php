@php
    $ogimage = !empty($nextArticle->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($nextArticle->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/$locale/";
    $newsUrl =
        $baseUrl . strtolower($nextArticle->insight_type) . '/' . $nextArticle->slug . '.' . $nextArticle->news_id;
    $author_details = $nextArticle->author->first();
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $authorSlug . '-' . $author_details->author_id;
    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : url('images/defaultuser.png');
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <hr class="similar-article-line">
            <div class="article-next" data-article-id="{{ $nextArticle->news_id }}">Next Story</div>
        </div>
    </div>
    <!-- DESKTOP TOP AD PLACEMENT  -->
    @desktop
        <div class="inner-article-detail-desktop-top-ad">
            @php
                $nextTopAd = 'adslot728x90_ATF-' . $nextArticle->news_id;
            @endphp
            <div id='{{ $nextTopAd }}'>
                <script>
                    googletag.cmd.push(function() {
                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_ATF', [728, 90], '{{ $nextTopAd }}')
                            .addService(googletag.pubads());
                        googletag.display('{{ $nextTopAd }}');
                    });
                </script>
            </div>
        </div>
    @enddesktop
    <!-- DESKTOP TOP AD PLACEMENT  -->
</div>
<div class="contentwrapper">
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a>
                </li>
                @php
                    $insightTypeMap = [
                        'News' => "{$lang}/topstories",
                        'Article' => "{$lang}/industryfocus",
                        'Event' => "{$lang}/events_reports",
                        'Report' => "{$lang}/events_reports",
                        'Interview' => "{$lang}/interviews",
                    ];
                    $typeURL = $insightTypeMap[$nextArticle->insight_type] ?? null;
                @endphp
                <li class="breadcrumb-item">
                    <a href="{{ url("/insights/{$typeURL}") }}" class="tip-bottom">{{ $nextArticle->insight_type }}</a>
                </li>
                @foreach ($nextArticle->category as $category)
                    <li class="breadcrumb-item"><a href="{{ $baseUrl . $category->slug }}"
                            class="tip-bottom">{{ $category->catname }}</a></li>
                @endforeach
                @foreach ($nextArticle->Subcategory as $subcat)
                    <li class="breadcrumb-item"><a
                            href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                    </li>
                @endforeach
                @desktop
                    <li class="breadcrumb-item">{!! html_entity_decode(\Illuminate\Support\Str::words($nextArticle->title, 8, ' ...'), ENT_QUOTES, 'UTF-8') !!}</li>
                @enddesktop
            </ul>
            <h2>{{ $nextArticle->title }}</h2>
            <div class="cont-top">
                <div class="article-features">
                    <div class="article-date">
                        <div class="article-logo">
                            <img src="{{ $authorImage }}" width="51" height="51" alt="Indian Retailer"
                                loading="lazy" class="">
                        </div>
                        <div class="article-time">
                            BY -
                            <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
                            <br>
                            <span>
                                {{ $author_details->designation }}
                            </span>
                            <span>
                                @if ($nextArticle->created_at >= $nextArticle->published_date)
                                    {{ date('M d, Y', strtotime($nextArticle->created_at)) }} /
                                @else
                                    {{ 'Last updated ' . date('M d, Y', strtotime($nextArticle->published_date)) }}
                                    /
                                @endif
                                <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10" width="17"
                                    alt="Franchise Insights" class="img-fluid">
                                {{ $nextArticle->views }}
                                /
                                {{ app\Http\Controllers\InsightsController::calculateReadTime($nextArticle) }}
                                Min Read
                            </span>
                        </div>
                    </div>
                    <div class="content-share">
                        <ul>
                            <li>
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($newsUrl) }}">
                                    <img src="{{ url('insight-new/images/fshare.webp') }}" height="25"
                                        width="25" loading="lazy" alt="IR">
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                                    <img src="{{ url('insight-new/images/flink.webp') }}" height="25" width="25"
                                        loading="lazy" alt="Insights">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                    <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25" width="25"
                                        loading="lazy" alt="Insights">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="follow-us">
                        <a href="" target="_blank">
                            Follow Us
                            <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy" alt="Franchise India"
                                width="11" height="10">
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-main">
                <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $nextArticle->title }}">
                {{-- ads for mobile & desktop --}}
                <div class="inner-article-detail-desktop-ad fad">
                    @php
                        $nextImgBottomAd = 'adslot300x250_ATF-' . $nextArticle->news_id . '-' . $nextArticle->cat_id;
                    @endphp
                    <div id="{{ $nextImgBottomAd }}">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_Inline_3_300x250', [
                                    [300, 250],
                                    [336, 280],
                                    [250, 250]
                                ], '{{ $nextImgBottomAd }}').addService(googletag.pubads());
                                googletag.display("{{ $nextImgBottomAd }}");
                            });
                        </script>
                    </div>
                </div>
                {{-- ads for mobile & desktop --}}
                <div class="shortdes">{{ $nextArticle->shortDesc }}</div>
                
                {{-- pankaj code --}}
                @php
                    $blocks = preg_split(
                        '/(<p.*?<\/p>|<table.*?<\/table>|<ul.*?<\/ul>|<ol.*?<\/ol>|<blockquote.*?<\/blockquote>)/is',
                        $nextArticle->content,
                        -1,
                        PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY,
                    );

                    $totalBlocks = count($blocks);

                    $adSlots = [
                        'adslotInline_1_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_1_300x250',
                        'adslotInline_2_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_2_300x250',
                        'adslotInline_3_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_3_300x250',
                        'adslotInline_4_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_4_300x250',
                        'adslotInline_5_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_5_300x250',
                    ];

                    $adKeys = array_keys($adSlots);
                    $maxAds = min(count($adSlots), floor($totalBlocks / 4)); // max 5, minimum every 4 blocks
                    $adsInserted = 0;

                    // Dynamically calculate where to place ads
                    $insertPositions = [];
                    for ($i = 1; $i <= $maxAds; $i++) {
                        $insertPositions[] = floor(($totalBlocks * $i) / ($maxAds + 1));
                    }

                    $renderedContent = '';

                    foreach ($blocks as $index => $block) {
                        $renderedContent .= $block;

                        if (in_array($index, $insertPositions) && $adsInserted < $maxAds) {
                            $slotId = $adKeys[$adsInserted];
                            $slotPath = $adSlots[$slotId];
                            $uniqueSlotId = $slotId . '-' . $nextArticle->news_id;

                            $renderedContent .= "<div class='inner-article-detail-desktop-ad'>
                                            <div id='{$uniqueSlotId}' class='gpt-inline-slot'
                                                data-slot-id='{$uniqueSlotId}'
                                                data-slot-path='{$slotPath}'>
                                            </div>
                                        </div>";

                            $adsInserted++;
                        }
                    }
                @endphp

                {{-- pankaj code --}}
                <div class="articlecontent" data-article-id="{{ $nextArticle->news_id }}">
                    {!! $renderedContent !!}
                </div>
                <div class="franBrands">
                    @if (!empty($franchiseData))
                        <h3>Interested in Franchise:</h3>
                        @foreach ($franchiseData as $franchise)
                            <div class="franInterest">
                                <a href="https://www.franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}"
                                    target="_blank">{{ $franchise['company_name'] }}</a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tag-block">
                    <ul class="tag-list">
                        @if (!empty($assocTags) && isset($assocTags))
                            @foreach ($assocTags as $assocTagsData)
                                @php
                                    $tags = str_replace(' ', '-', $assocTagsData->name);
                                    $tagslug = strtolower($tags);
                                @endphp
                                <li><a
                                        href="{{ Config('constants.MainDomain') . '/insights/' . $lang . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            {{-- <div class="contentarea">
                @include('layout.insights.subscribenewsletter')
            </div> --}}
        </div>
        <div class="col-md-4">
            <div class="right-wrap">
                {{-- ads top right sidebar --}}
                <div class="ad-right">
                    @php
                        $nextTopRightAd = 'adslot300x250_ATF-' . $nextArticle->news_id;
                    @endphp
                    <div id='{{ $nextTopRightAd }}'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [300, 250], '{{ $nextTopRightAd }}')
                                    .addService(googletag.pubads());
                                googletag.display('{{ $nextTopRightAd }}');
                            });
                        </script>
                    </div>
                </div>
                {{-- ads top right sidebar --}}
                <div class="popular-articles">
                    <h3>Related Content</h3>
                    <ul>
                        @forelse ($trendingArticles as $trend)
                            <li>
                                @foreach ($trend->category as $cat)
                                    @php
                                        $lang = App::getLocale();
                                        $catURL = Config('constants.MainDomain') . "/insights/{$lang}/{$cat->slug}";
                                        $baseUrl1 =
                                            Config('constants.MainDomain') .
                                            "/insights/$lang/" .
                                            strtolower($trend->insight_type) .
                                            '/';
                                        $trendUrl = $baseUrl1 . $trend->slug . '.' . $trend->news_id;
                                    @endphp
                                @endforeach
                                <div class="popular-head">
                                    <a href="{{ $trendUrl }}">{{ $trend->title }}</a>
                                </div>
                            </li>
                        @empty
                            <li>No Records.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="popular-articles">
                    <h3>Latest Articles</h3>
                    <ul>
                        {{-- @forelse ($latestArticles as $latest)
                            <li>
                                @foreach ($latest->category as $cat)
                                    @php
                                        $lang = App::getLocale();
                                        $catURL = Config('constants.MainDomain') . "/insights/{$lang}/{$cat->slug}";
                                        $baseUrl1 =
                                            Config('constants.MainDomain') .
                                            "/insights/$lang/" .
                                            strtolower($latest->insight_type) .
                                            '/';
                                        $latestUrl = $baseUrl1 . $latest->slug . '.' . $latest->news_id;
                                    @endphp
                                @endforeach
                                <div class="popular-head">
                                    <a href="{{ $latestUrl }}">{{ $latest->title }}</a>
                                </div>
                            </li>
                        @empty
                        @endforelse --}}
                        @forelse ($latestArticles as $latest)
    @php
        $locale = App::getLocale();
        // Define the base URL outside the loop, just in case we need to access it later
        $baseUrl1 = Config('constants.MainDomain') . "/insights/$locale/" . strtolower($latest->insight_type) . '/';
        // Initialize $latestUrl as null
        $latestUrl = null;
    @endphp

    @foreach ($latest->category as $cat)
        @php
            // Construct the URL for each category inside the loop
            $catURL = Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
            // Construct the article URL for the current category
            $latestUrl = $baseUrl1 . $latest->slug . '.' . $latest->news_id;
        @endphp
    @endforeach

    <!-- Make sure $latestUrl is set before using it -->
    @if($latestUrl)
        <li>
            <div class="popular-head">
                <a href="{{ $latestUrl }}">{{ $latest->title }}</a>
            </div>
        </li>
    @endif

@empty
    <!-- Handle the case when $latestArticles is empty -->
    <p>No articles found.</p>
@endforelse

                    </ul>
                </div>
                <div class="ad-right-sticky">
                    @php
                        $nextRightBottomAd = 'adslot300x250_1-' . $nextArticle->news_id;
                    @endphp
                    <div id="{{ $nextRightBottomAd }}">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_1', [
                                        [300, 250],
                                        [300, 600]
                                    ], '{{ $nextRightBottomAd }}')
                                    .addService(googletag.pubads());
                                googletag.display('{{ $nextRightBottomAd }}');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- footer ads slot --}}
    @desktop
        <div class="inner-article-detail-desktop-top-ad">
            @php
                $nextBottomAd = 'adslot728x90_BTF-' . $nextArticle->news_id;
            @endphp
            <div id='{{ $nextBottomAd }}'>
                <script>
                    googletag.cmd.push(function() {
                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_BTF', [
                                [728, 90],
                                [970, 90],
                                [970, 250]
                            ], '{{ $nextBottomAd }}')
                            .addService(googletag.pubads());
                        googletag.display('{{ $nextBottomAd }}');
                    });
                </script>
            </div>
        </div>
    @enddesktop
</div>

</div>