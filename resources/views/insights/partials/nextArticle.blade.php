@php
    $ogimage = insightsImageUrl($nextArticle->image, $lang);
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    $nextID = $nextArticle->news_id;
    $newsUrl = insightsUrl($nextArticle, $lang);
    $author_details = $nextArticle->author;
    $authorUrl = insightsAuthorUrl($author_details, $lang);
    $authorImage = insightsAuthorImageurl($author_details->image, $lang);
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <hr class="similar-article-line">
            <div class="article-next" data-article-id="{{ $nextID }}">Next Story</div>
        </div>
    </div>
    <!-- DESKTOP TOP AD PLACEMENT  -->
    <div class="inner-article-detail-desktop-top-ad">
        @desktop
            @php
                $nextTopAd = 'FI_Desktop_ROS_728x90_ATF_' . $nextID;
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
        @enddesktop
        @mobile
            @php
                $topAd = 'FI_Desktop_ROS_300x250_ATF_' . $nextID;
            @endphp
            <div id='{{ $topAd }}'>
                <script>
                    googletag.cmd.push(function() {
                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_300x250_ATF', [300, 250], '{{ $topAd }}')
                            .addService(googletag.pubads());
                        googletag.display('{{ $topAd }}');
                    });
                </script>
            </div>
        @endmobile
    </div>
    <!-- DESKTOP TOP AD PLACEMENT  -->
</div>
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
                    $category = $nextArticle->category ?? null;
                    $catID = $category->cat_id;
                    $categoryURL = insightsCategoryUrl($category, $lang);
                    $categoryName = $category->catname ?? null;
                    $subCategory = $nextArticle->Subcategory;
                    $subCategoryURL = insightsSubcategoryUrl($subCategory, $lang);
                    $subCategoryName = $subCategory->subcat_name ?? null;
                @endphp
                <li class="breadcrumb-item">
                    <a href="{{ url("/insights/{$typeURL}") }}" class="tip-bottom">{{ $nextArticle->insight_type }}</a>
                </li>

                <li class="breadcrumb-item"><a href="{{ $categoryURL }}" class="tip-bottom">{{ $categoryName }}</a>
                </li>
                @if (!empty($subCategoryName) && !empty($subCategoryURL))
                    <li class="breadcrumb-item"><a href="{{ $subCategoryURL }}">{{ $subCategoryName }}</a>
                    </li>
                @endif
                @desktop
                    <li class="breadcrumb-item">{!! html_entity_decode(Str::words($nextArticle->title, 8, ' ...')) !!}</li>
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
                                {{ $nextArticle->display_date }}
                                <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10" width="17"
                                    alt="Franchise Insights" class="img-fluid">
                                {{ $nextArticle->views }}
                                /
                                {{ calculateReadTime($nextArticle) }}
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
                    @desktop
                        @php
                            $nextImgBottomAd = 'FI_Desktop_ROS_728x90_Mid_' . $nextID . '_' . $catID;
                        @endphp
                        <div id="{{ $nextImgBottomAd }}">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_Mid', [728, 90], '{{ $nextImgBottomAd }}')
                                        .addService(googletag.pubads());
                                    googletag.display("{{ $nextImgBottomAd }}");
                                });
                            </script>
                        </div>
                    @enddesktop
                    @mobile
                        @php
                            $imgBottomAd = 'FI_Desktop_ROS_Inline_3_300x250_' . $nextID . '_' . $catID;
                        @endphp
                        <div id="{{ $imgBottomAd }}">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_Inline_3_300x250', [
                                        [300, 250],
                                        [336, 280],
                                        [250, 250]
                                    ], '{{ $imgBottomAd }}').addService(googletag.pubads());

                                    googletag.display('{{ $imgBottomAd }}');
                                });
                            </script>
                        </div>
                    @endmobile
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
                        'FI_Desktop_ROS_Inline_1_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_1_300x250',
                        'FI_Desktop_ROS_Inline_2_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_2_300x250',
                        'FI_Desktop_ROS_Inline_3_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_3_300x250',
                        'FI_Desktop_ROS_Inline_4_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_4_300x250',
                        'FI_Desktop_ROS_Inline_5_300x250' => '/1057625/FIHL/FI_Desktop_ROS_Inline_5_300x250',
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
                            $uniqueSlotId = $slotId . '_' . $nextID;

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
                <div class="articlecontent" data-article-id="{{ $nextID }}">
                    {!! $renderedContent !!}
                </div>
                <div class="franBrands">
                    @if (!empty($franchiseData))
                        <h4>Interested in Franchise:</h4>
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
                                    $tags = str_replace(' ', '-', $assocTagsData->contentTag->name);
                                    $tagslug = strtolower($tags);
                                @endphp
                                <li><a
                                        href="{{ Config('constants.MainDomain') . '/insights/' . $lang . '/tag/' . $tagslug }}">{{ $assocTagsData->contentTag->name }}</a>
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
        @desktop
            <div class="col-md-4">
                <div class="right-wrap">
                    {{-- ads top right sidebar --}}
                    <div class="ad-right">
                        @php
                            $nextTopRightAd = 'FI_Desktop_ROS_RHS_300x250_ATF_' . $nextID;
                        @endphp
                        <div id='{{ $nextTopRightAd }}'>
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_ATF', [300, 250],
                                            '{{ $nextTopRightAd }}')
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
                            @foreach ($trendArticles as $trend)
                                @php
                                    $trendURL = insightsUrl($trend, $lang);
                                @endphp
                                <li>
                                    <div class="popular-head">
                                        <a href="{{ $trendURL }}">{{ $trend->title }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="popular-articles">
                        <h3>Popular Articles</h3>
                        <ul>
                            @foreach ($popArticles as $latest)
                                @php
                                    $latestURL = insightsUrl($latest, $lang);
                                @endphp
                                <li>
                                    <div class="popular-head">
                                        <a href="{{ $latestURL }}">{{ $latest->title }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ad-right-sticky">
                        @php
                            $nextRightBottomAd = 'FI_Desktop_ROS_RHS_300x250_1_' . $nextID;
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
        @enddesktop
    </div>
    {{-- footer ads slot --}}
    @desktop
        <div class="inner-article-detail-desktop-top-ad">
            @php
                $nextBottomAd = 'FI_Desktop_ROS_728x90_BTF_' . $nextID;
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
