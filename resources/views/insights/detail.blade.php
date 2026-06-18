@extends('layout.insights.master')
@section('seoTitle', $newsDetails->title)
@section('header-schema')
    @include('insights.schema', ['newsDetails' => $newsDetails])
@endsection
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@php
    $locale = App::getLocale();
    $contentID = $newsDetails->news_id;
    $newsUrl = insightsUrl($newsDetails, $locale) ?? url()->current;
    $ogimage = insightsImageUrl($newsDetails->image, $locale);
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    //author details
    $authorUrl = insightsAuthorUrl($author_details, $locale);
    $authorImage = insightsAuthorImageurl($author_details->image, $locale);
@endphp
@section('canonicalUrl', $newsUrl)
@section('datePublished', $newsDetails->created_at)
@section('dateModified', isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at)
@section('image', $ogimage)
@section('shortDesc', $newsDetails->shortDesc)
@section('imagesrc', $ogimage)
@section('title', $newsDetails->title)
@section('url', url()->current())
@section('width', $width)
@section('height', $height)
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $newsDetails->title }}</h1>
            </div>
        </div>
        <!-- DESKTOP TOP AD PLACEMENT START HERE  -->
        <div class="container">
            @desktop
                <div class="inner-article-detail-desktop-top-ad">
                    @php
                        $topAd = 'FI_Desktop_ROS_728x90_ATF_' . $contentID;
                    @endphp
                    <div id="{{ $topAd }}">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_ATF', [
                                        [728, 90],
                                        [970, 90]
                                    ], '{{ $topAd }}')
                                    .addService(googletag.pubads());
                                googletag.display('{{ $topAd }}');
                            });
                        </script>
                    </div>
                </div>
            @enddesktop
            @mobile
                @php
                    $topAd = 'FI_Desktop_ROS_300x250_ATF_' . $contentID;
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
        <!-- DESKTOP TOP AD PLACEMENT END HERE -->
    </div>
    <div class="contentwrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a></li>
                        @php
                            $insightTypeMap = [
                                'News' => "{$locale}/topstories",
                                'Article' => "{$locale}/industryfocus",
                                'Event' => "{$locale}/events_reports",
                                'Report' => "{$locale}/events_reports",
                                'Interview' => "{$locale}/interviews",
                            ];
                            $typeURL = $insightTypeMap[$newsDetails->insight_type] ?? null;
                            $category = $newsDetails->category ?? null;
                            $catID = $category->cat_id;
                            $categoryURL = insightsCategoryUrl($category, $locale);
                            $categoryName = $category->catname ?? null;
                            $subCategory = $newsDetails->Subcategory;
                            $subCategoryURL = insightsSubcategoryUrl($subCategory, $locale);
                            $subCategoryName = $subCategory->subcat_name ?? null;
                        @endphp
                        <li class="breadcrumb-item">
                            <a href="{{ url("/insights/{$typeURL}") }}"
                                class="tip-bottom">{{ $newsDetails->insight_type }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ $categoryURL }}"
                                class="tip-bottom">{{ $categoryName }}</a>
                        </li>
                        @if (!empty($subCategoryName) && !empty($subCategoryURL))
                            <li class="breadcrumb-item"><a href="{{ $subCategoryURL }}">{{ $subCategoryName }}</a>
                            </li>
                        @endif
                        @desktop
                            <li class="breadcrumb-item">{!! html_entity_decode(Str::words($newsDetails->title, 8, ' ...')) !!}</li>
                        @enddesktop
                    </ul>
                    <h2>{{ $newsDetails->title }}</h2>
                    <div class="cont-top">
                        <div class="article-features">
                            <div class="article-date">
                                <div class="article-logo">
                                    <img src="{{ $authorImage }}" width="51" height="51"
                                        alt="{{ $author_details->title }}" loading="lazy" class="">
                                </div>
                                <div class="article-time">
                                    BY -
                                    <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
                                    <br>
                                    <span>
                                        {{ $author_details->designation }}
                                    </span>
                                    <span>
                                        {{ $newsDetails->display_date }}
                                        <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10"
                                            width="17" alt="Franchise Insights" class="img-fluid">
                                        {{ $newsDetails->views }}
                                        / {{ calculateReadTime($newsDetails) }}
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
                                            <img src="{{ url('insight-new/images/flink.webp') }}" height="25"
                                                width="25" loading="lazy" alt="Insights">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25"
                                                width="25" loading="lazy" alt="Insights">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="follow-us">
                                <a href="" target="_blank">
                                    Follow Us
                                    <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy"
                                        alt="Franchise India" width="11" height="10">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-main">
                        <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}">
                        <div class="inner-article-detail-desktop-ad fad">
                            @desktop
                                @php
                                    $imgBottomAd = 'FI_Desktop_ROS_728x90_Mid_' . $contentID . '_' . $catID;
                                @endphp
                                <div id="{{ $imgBottomAd }}">
                                    <script>
                                        googletag.cmd.push(function() {
                                            googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_Mid', [728, 90], '{{ $imgBottomAd }}')
                                                .addService(googletag.pubads());
                                            googletag.display('{{ $imgBottomAd }}');
                                        });
                                    </script>
                                </div>
                            @enddesktop
                            @mobile
                                @php
                                    $imgBottomAd = 'FI_Desktop_ROS_Inline_3_300x250_' . $contentID . '_' . $catID;
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
                        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                        {{-- pankaj code --}}
                        @php
                            $blocks = preg_split(
                                '/(<p.*?<\/p>|<table.*?<\/table>|<ul.*?<\/ul>|<ol.*?<\/ol>|<blockquote.*?<\/blockquote>)/is',
                                $newsDetails->content,
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
                                    $uniqueSlotId = $slotId . '_' . $contentID;

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
                        <div class="articlecontent" data-article-id="{{ $contentID }}">
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
                                                href="{{ Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . $tagslug }}">{{ $assocTagsData->contentTag->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="contentarea">
                        @include('layout.insights.subscribenewsletter')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-wrap">
                        {{-- ads top right sidebar --}}
                        <div class="ad-right">
                            @php
                                $topRightAd = 'FI_Desktop_ROS_RHS_300x250_ATF_' . $contentID;
                            @endphp
                            <div id='{{ $topRightAd }}'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_ATF', [300, 250], '{{ $topRightAd }}')
                                            .addService(googletag.pubads());
                                        googletag.display('{{ $topRightAd }}');
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
                                        $trendURL = insightsUrl($trend, $locale);
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
                                        $latestUrl = insightsUrl($latest, $locale);
                                    @endphp
                                    <li>
                                        <div class="popular-head">
                                            <a href="{{ $latestUrl }}">{{ $latest->title }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="ad-right-sticky">
                            @php
                                $rightBottomAd = 'FI_Desktop_ROS_RHS_300x250_1_' . $contentID;
                            @endphp
                            <div id="{{ $rightBottomAd }}">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_1', [
                                                [300, 250],
                                                [300, 600]
                                            ], '{{ $rightBottomAd }}')
                                            .addService(googletag.pubads());
                                        googletag.display('{{ $rightBottomAd }}');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer ads slot --}}
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    @php
                        $bottomAd = 'FI_Desktop_ROS_728x90_BTF_' . $contentID;
                    @endphp
                    <div id='{{ $bottomAd }}'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_BTF', [
                                        [728, 90],
                                        [970, 90],
                                        [970, 250]
                                    ], '{{ $bottomAd }}')
                                    .addService(googletag.pubads());
                                googletag.display('{{ $bottomAd }}');
                            });
                        </script>
                    </div>
                @enddesktop

            </div>
        </div>
        <!-- New article will be loaded here -->
        <div id="next-article-container" class="next-article-container"></div>
    </div>
    <div id="loader" style="display: none;">
        {{-- <div class="spinner"></div> --}}
        <img src="{{ url('insight-new/assets/img/25.gif') }}" alt="loader" width="35">
    </div>

    @include('layout.insights.magblock')
    @php
        $currentId = $contentID;
        $categoryId = $newsDetails->cat_id ?? $newsDetails->category->id;
        $locale = $locale;
        $nextUrl = route('insights.nextArticle', [
            'lang' => $locale,
            'currentId' => $currentId,
            'categoryId' => $categoryId,
            // 'direction' => 'down',
        ]);
    @endphp
    <script>
        window.googletag = window.googletag || {
            cmd: []
        };
        googletag.cmd.push(function() {
            const slots = document.querySelectorAll('.gpt-inline-slot');

            slots.forEach(slot => {
                const id = slot.dataset.slotId;
                const path = slot.dataset.slotPath;

                if (id && path) {
                    googletag.defineSlot(path, [
                            [300, 250],
                            [336, 280],
                            [250, 250]
                        ], id)
                        .addService(googletag.pubads());
                }
            });
            googletag.enableServices();

            slots.forEach(slot => {
                googletag.display(slot.dataset.slotId);
            });
        });
    </script>
    <script>
        let isLoading = false;
        let hasScrolledDown = false;
        let nextUrl = @json($nextUrl);
        let loadedIds = new Set([@json($newsDetails->news_id)]);
        let currentActiveArticleId = null;
        let articleMetaMap = {
            [@json($newsDetails->news_id)]: {
                meta: {
                    title: @json($newsDetails->title),
                    description: @json($newsDetails->shortDesc),
                    keywords: @json($newsDetails->shortDesc)
                },
                url: window.location.href
            }
        };

        function updateMetadata(meta) {
            if (meta?.title) document.title = meta.title;
            if (meta?.description) document.querySelector('meta[name="description"]')?.setAttribute('content', meta
                .description);
            if (meta?.keywords) document.querySelector('meta[name="keywords"]')?.setAttribute('content', meta.keywords);
        }

        function fireGTM(articleId) {
            if (typeof dataLayer !== 'undefined') {
                dataLayer.push({
                    event: 'articleScroll',
                    articleId: articleId
                });
            }
        }

        function loadArticle(currentId) {
            if (isLoading || !nextUrl) return;
            isLoading = true;
            $('#loader').show();
            $('html, body').css("overflow", "hidden");
            $.ajax({
                url: nextUrl,
                method: 'GET',
                data: {
                    loadedIds: Array.from(loadedIds),
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success && data.html && !loadedIds.has(data.articleId)) {
                        const container = $('#next-article-container');
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = data.html;
                        container.append(tempDiv);
                        refreshNewAdSlots(tempDiv);
                        nextUrl = data.nextUrl;
                        loadedIds.add(data.articleId);
                        if (data.articleId && data.meta && data.newUrl) {
                            articleMetaMap[data.articleId] = {
                                meta: data.meta,
                                url: data.newUrl
                            };
                        }
                        observeArticles();
                    }
                },
                complete: () => {
                    isLoading = false;
                    $('#loader').hide();
                    $('html, body').css("overflow", "visible");
                }
            });
        }

        const articleObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;
                    if (articleId) {
                        const isNew = articleId !== currentActiveArticleId;
                        currentActiveArticleId = articleId;
                        const data = articleMetaMap[articleId];
                        if (data) {
                            updateMetadata(data.meta);
                            if (isNew || articleId == @json($newsDetails->news_id)) {
                                history.pushState(null, '', data.url);
                                fireGTM(articleId);
                            }
                        }
                    }
                }
            });
        }, {
            threshold: 0.75
        });

        const bottomObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const id = article?.dataset.articleId;
                    if (id) {
                        hasScrolledDown = true;
                        loadArticle(id); // still trigger next article load
                        if (id !== currentActiveArticleId) {
                            currentActiveArticleId = id;
                            const data = articleMetaMap[id];
                            if (data) {
                                updateMetadata(data.meta);
                                history.pushState(null, '', data.url);
                                fireGTM(id);
                            }
                        }
                    }
                }
            });
        }, {
            threshold: 0.5
        });

        const topParagraphObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const nextID = entry.target.dataset.articleId;
                    if (nextID && nextID !== currentActiveArticleId) {
                        currentActiveArticleId = nextID;
                        const data = articleMetaMap[nextID];
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(nextID);
                        }
                    }
                }
            });
        }, {
            threshold: 1
        });

        function observeArticles() {
            const articles = document.querySelectorAll('.articlecontent');
            articleObserver.disconnect();
            bottomObserver.disconnect();
            topParagraphObserver.disconnect();
            articles.forEach((article, index) => {
                const ps = article.querySelectorAll('p');
                if (ps.length) {
                    const lastP = ps[ps.length - 1];
                    articleObserver.observe(lastP);

                    if (index === articles.length - 1) {
                        bottomObserver.observe(lastP);
                    }
                }
            });
            const nextDivs = document.querySelectorAll('.article-next');
            nextDivs.forEach(div => {
                topParagraphObserver.observe(div);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });

        function refreshNewAdSlots(context = document) {
            const newSlots = context.querySelectorAll('.gpt-inline-slot:not([data-gpt-loaded])');

            newSlots.forEach(slot => {
                const id = slot.dataset.slotId;
                const path = slot.dataset.slotPath;

                if (!id || !path) return;
                googletag.cmd.push(function() {
                    googletag.defineSlot(path, [
                        [300, 250],
                        [336, 280],
                        [250, 250]
                    ], id).addService(googletag.pubads());
                    googletag.display(id);
                });
                slot.setAttribute('data-gpt-loaded', 'true');
            });
        }
    </script>
@endsection
