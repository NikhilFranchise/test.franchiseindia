@php
    $ogimage = imageUrl($nextArticle->image);
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    $newsUrl = crreUrl($nextArticle);
    $author_details = $nextArticle->author->first();
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    $authorUrl = authorUrl($author_details);
    $authorImage = authorImageUrl($author_details->image);
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
                {{-- @php
                    $insightTypeMap = [
                        'News' => "{$locale}/topstories",
                        'Article' => "{$locale}/toparticles",
                        'Event' => "{$locale}/events_reports",
                        'Report' => "{$locale}/events_reports",
                        'Interview' => "{$locale}/interviews",
                    ];
                    $typeURL = $insightTypeMap[$nextArticle->insight_type] ?? null;

                    $breadcrumbItems = [
                        ['label' => 'Home', 'url' => url('/crre')],
                        ['label' => $nextArticle->insight_type, 'url' => url("/crre/$typeURL")],
                    ];

                    foreach ($nextArticle->category as $category) {
                        $breadcrumbItems[] = [
                            'label' => $category->catname,
                            'url' => categoryUrl($category),
                        ];
                    }

                    foreach ($nextArticle->Subcategory as $subcat) {
                        $breadcrumbItems[] = [
                            'label' => $subcat->subcat_name,
                            'url' => $baseUrl . $category->slug . '/' . $subcat->slug,
                        ];
                    }

                    $breadcrumbItems[] = ['label' => Str::words($nextArticle->title, 8, ' ...')];
                @endphp
                <x-breadcrumb :items="$breadcrumbItems" /> --}}
                @php
                    $insightTypeMap = [
                        'News' => "{$locale}/topstories",
                        'Article' => "{$locale}/toparticles",
                        'Interview' => "{$locale}/interviews",
                        'Event' => "{$locale}/events_reports",
                        'Report' => "{$locale}/events_reports",
                    ];

                    $typeURL = $insightTypeMap[$nextArticle->insight_type] ?? null;

                    // Build breadcrumb items dynamically
                    $breadcrumbItems = [
                        ['label' => 'Home', 'url' => url('/crre')],
                        [
                            'label' => $nextArticle->insight_type,
                            'url' => url('/crre/' . $typeURL),
                        ],
                    ];

                    // Add Category (always exists)
                    if (!empty($nextArticle->category[0])) {
                        $breadcrumbItems[] = [
                            'label' => $nextArticle->category[0]->catname,
                            'url' => categoryUrl($nextArticle->category[0]),
                        ];
                    }

                    // Add Subcategory only if exists
                    if (!empty($nextArticle->Subcategory[0])) {
                        $breadcrumbItems[] = [
                            'label' => $nextArticle->Subcategory[0]->subcat_name,
                            'url' => subCategoryUrl($nextArticle->Subcategory[0]),
                        ];
                    }

                    // Add final title (no URL)
                    $breadcrumbItems[] = [
                        'label' => Str::words($nextArticle->title, 8, '...'),
                    ];
                @endphp

                <x-breadcrumb :items="$breadcrumbItems" />

                <h2>{{ $nextArticle->title }}</h2>
                <div class="cont-top">
                    <div class="article-features">
                        <x-author-box :authorImage="$authorImage" :author_details="$author_details" :authorUrl="$authorUrl" :newsDetails="$nextArticle" />
                        <x-share-box :newsUrl="$newsUrl" followUrl="https://www.franchiseindia.com" />
                    </div>
                </div>
                <div class="content-main">
                    <img src="{{ $ogimage }}" class="img-fluid"
                        alt="{{ $nextArticle->alt_img ?? $nextArticle->title }}">
                    {{-- ads for mobile & desktop --}}
                    <div class="inner-article-detail-desktop-ad fad">
                        @php
                            $nextImgBottomAd =
                                'adslot300x250_ATF-' . $nextArticle->news_id . '-' . $nextArticle->cat_id;
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
                                            href="{{ Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @desktop
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
                                @foreach ($trendingArticles as $trend)
                                    <x-popular-item :popular="$trend" :locale="$locale" />
                                @endforeach
                            </ul>
                        </div>
                        <div class="popular-articles">
                            <h3>Latest Articles</h3>
                            <ul>
                                @foreach ($latestArticles as $latest)
                                    <x-popular-item :popular="$latest" :locale="$locale" />
                                @endforeach

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
            @enddesktop
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
