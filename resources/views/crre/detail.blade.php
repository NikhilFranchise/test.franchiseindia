@extends('layout.crre.master')
@section('seoTitle', $newsDetails->title)
@section('header-schema')
    @include('crre.schema', ['newsDetails' => $newsDetails])
@endsection
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@php
    $newsUrl = crreUrl($newsDetails) ?? url()->current;
    $ogimage = imageUrl($newsDetails->image);
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    $authorUrl = authorUrl($author_details);
    $authorImage = authorImageUrl($author_details->image);
@endphp
@section('image', $ogimage)
@section('canonicalUrl', $newsUrl)
@section('datePublished', $newsDetails->created_at)
@section('dateModified', isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at)
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
                        $topAd = 'adslot728x90_ATF-' . $newsDetails->news_id;
                    @endphp
                    <div id="{{ $topAd }}"></div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_ATF', [728, 90], '{{ $topAd }}')
                                .addService(googletag.pubads());
                            googletag.display('{{ $topAd }}');
                        });
                    </script>
                </div>
            @enddesktop
        </div>
        <!-- DESKTOP TOP AD PLACEMENT END HERE -->
    </div>
    <div class="contentwrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @php
                        $insightTypeMap = [
                            'News' => "{$locale}/topstories",
                            'Article' => "{$locale}/toparticles",
                            'Interview' => "{$locale}/interviews",
                            'Event' => "{$locale}/events_reports",
                            'Report' => "{$locale}/events_reports",
                        ];

                        $typeURL = $insightTypeMap[$newsDetails->insight_type] ?? null;

                        // Build breadcrumb items dynamically
                        $breadcrumbItems = [
                            ['label' => 'Home', 'url' => url('/crre')],
                            [
                                'label' => $newsDetails->insight_type,
                                'url' => url('/crre/' . $typeURL),
                            ],
                        ];

                        // Add Category (always exists)
                        if (!empty($newsDetails->category[0])) {
                            $breadcrumbItems[] = [
                                'label' => $newsDetails->category[0]->catname,
                                'url' => categoryUrl($newsDetails->category[0]),
                            ];
                        }

                        // Add Subcategory only if exists
                        if (!empty($newsDetails->Subcategory[0])) {
                            $breadcrumbItems[] = [
                                'label' => $newsDetails->Subcategory[0]->subcat_name,
                                'url' => subCategoryUrl($newsDetails->Subcategory[0]),
                            ];
                        }

                        // Add final title (no URL)
                        $breadcrumbItems[] = [
                            'label' => Str::words($newsDetails->title, 8, '...'),
                        ];
                    @endphp

                    <x-breadcrumb :items="$breadcrumbItems" />
                    <h2>{{ $newsDetails->title }}</h2>
                    <div class="cont-top">
                        <div class="article-features">
                            <x-author-box :authorImage="$authorImage" :author_details="$author_details" :authorUrl="$authorUrl" :newsDetails="$newsDetails" />
                            <x-share-box :newsUrl="$newsUrl" followUrl="https://www.franchiseindia.com" />
                        </div>
                    </div>
                    <div class="content-main">
                        <img src="{{ $ogimage }}" class="img-fluid"
                            alt="{{ $newsDetails->img_alt ?? $newsDetails->title }}">
                        <div class="inner-article-detail-desktop-ad fad">
                            @php
                                $imgBottomAd =
                                    'adslot300x250_ATF-' . $newsDetails->news_id . '-' . $newsDetails->cat_id;
                            @endphp
                            <div id="{{ $imgBottomAd }}"></div>
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
                                    $uniqueSlotId = $slotId . '-' . $newsDetails->news_id;

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
                        <div class="articlecontent" data-article-id="{{ $newsDetails->news_id }}">
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
                                            $tags = str_replace(' ', '-', $assocTagsData->name);
                                            $tagslug = strtolower($tags);
                                        @endphp
                                        <li><a
                                                href="{{ Config('constants.MainDomain') . '/crre/' . $locale . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="contentarea">
                        @include('layout.crre.subscribenewsletter')
                    </div>
                </div>
                @desktop
                    <div class="col-md-4">
                        <div class="right-wrap">
                            {{-- ads top right sidebar --}}
                            <div class="ad-right">
                                @php
                                    $topRightAd = 'adslot300x250_ATF-' . $newsDetails->news_id;
                                @endphp
                                <div id='{{ $topRightAd }}'>
                                    <script>
                                        googletag.cmd.push(function() {
                                            googletag.defineSlot('/1057625/FIHL/Desktop_ROS_300x250_ATF', [300, 250], '{{ $topRightAd }}')
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
                                    @foreach ($trendingArticles as $popular)
                                        <x-popular-item :popular="$popular" :locale="$locale" />
                                    @endforeach
                                </ul>
                            </div>
                            <div class="popular-articles">
                                <h3>Latest Articles</h3>
                                <ul>
                                    @foreach ($latestArticles as $popular)
                                        <x-popular-item :popular="$popular" :locale="$locale" />
                                    @endforeach
                                </ul>
                            </div>
                            <div class="ad-right-sticky">
                                @php
                                    $rightBottomAd = 'adslot300x250_1-' . $newsDetails->news_id;
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
                @enddesktop
            </div>
            {{-- footer ads slot --}}
            @desktop
                <div class="inner-article-detail-desktop-top-ad">
                    @php
                        $bottomAd = 'adslot728x90_BTF-' . $newsDetails->news_id;
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
                </div>
            @enddesktop
        </div>
        <!-- New article will be loaded here -->
        <div id="next-article-container" class="next-article-container"></div>
    </div>
    <div id="loader" style="display: none;">
        {{-- <div class="spinner"></div> --}}
        <img src="{{ url('insight-new/assets/img/25.gif') }}" alt="loader" width="35">
    </div>

    @include('layout.crre.magblock')
    @php
        $currentId = $newsDetails->news_id;
        $categoryId = $newsDetails->cat_id ?? $newsDetails->category[0]->id;
        // $locale = $locale;
        $nextUrl = route('crre.nextArticle', [
            'locale' => $locale,
            'currentId' => $currentId,
            'categoryId' => $categoryId,
            'direction' => 'down',
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
            $('#loader').hide();
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
                        const $container = $('#next-article-container');

                        // Wrap the new article HTML in a temporary container
                        const tempDiv = document.createElement('div');
                        // console.log('tempDiv', tempDiv);
                        tempDiv.innerHTML = data.html;

                        // Append the new content to the container
                        $container.append(tempDiv);

                        // ✅ Refresh ads ONLY in the new content
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
            // console.log(bottomObserver + 'bottom');
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const id = article?.dataset.articleId;
                    if (id) {
                        hasScrolledDown = true;
                        loadArticle(id); // still trigger next article load

                        // ✅ Also update meta, URL, GTM
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
                    // `entry.target` is `.article-next`
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

            // Now observe all .article-next elements globally:
            const nextDivs = document.querySelectorAll('.article-next');
            nextDivs.forEach(div => {
                topParagraphObserver.observe(div);
            });
        }


        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });

        // Call this after injecting the next article HTML
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

                // Mark slot as initialized
                slot.setAttribute('data-gpt-loaded', 'true');
            });
        }
    </script>
@endsection
