@extends('layout.insights.master')
@section('seoTitle', $newsDetails->title)
@section('header-schema')
    @include('insights.schema', ['newsDetails' => $newsDetails])
@endsection
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@section('canonicalUrl', url()->current())
@section('datePublished', $newsDetails->created_at)
@section('dateModified', $newsDetails->published_date)
@php
    $ogimage = !empty($newsDetails->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;
    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/$locale/";
    $newsUrl =
        $baseUrl . strtolower($newsDetails->insight_type) . '/' . $newsDetails->slug . '.' . $newsDetails->news_id;
    //$author_details
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    //dd($authorSlug);
    $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $authorSlug . '-' . $author_details->author_id;
    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : url('images/defaultuser.png');
@endphp
@section('image', $ogimage)
@section('shortDesc', $newsDetails->shortDesc)
@section('imagesrc', $ogimage)
@section('title', $newsDetails->title)
@section('url', url()->current())
@section('width', $width)
@section('height', $height)
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> --}}
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $newsDetails->title }}</h1>
            </div>
        </div>
        <!-- DESKTOP TOP AD PLACEMENT  -->
        <div class="container">
            @desktop
                <div class="inner-article-detail-desktop-top-ad">
                    <div id='adslot728x90_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('adslot728x90_ATF');
                            });
                        </script>
                    </div>
                </div>
            @enddesktop
        </div>
        <!-- DESKTOP TOP AD PLACEMENT  -->
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
                        @endphp
                        <li class="breadcrumb-item">
                            <a href="{{ url("/insights/{$typeURL}") }}"
                                class="tip-bottom">{{ $newsDetails->insight_type }}</a>
                        </li>
                        @foreach ($newsDetails->category as $category)
                            <li class="breadcrumb-item"><a href="{{ $baseUrl . $category->slug }}"
                                    class="tip-bottom">{{ $category->catname }}</a></li>
                        @endforeach
                        @foreach ($newsDetails->Subcategory as $subcat)
                            <li class="breadcrumb-item"><a
                                    href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                            </li>
                        @endforeach
                        @desktop
                            <li class="breadcrumb-item">{!! html_entity_decode(\Illuminate\Support\Str::words($newsDetails->title, 8, ' ...'), ENT_QUOTES, 'UTF-8') !!}</li>
                        @enddesktop
                    </ul>
                    <h2>{{ $newsDetails->title }}</h2>
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
                                        @if ($newsDetails->created_at >= $newsDetails->published_date)
                                            {{ date('M d, Y', strtotime($newsDetails->created_at)) }} /
                                        @else
                                            {{ 'Last updated ' . date('M d, Y', strtotime($newsDetails->published_date)) }}
                                            /
                                        @endif
                                        <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10"
                                            width="17" alt="Franchise Insights" class="img-fluid">
                                        {{ $newsDetails->views }}
                                        / {{ app\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }}
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
                        {{-- ads for mobile & desktop --}}
                        <div class="inner-article-detail-desktop-ad fad">
                            <div id="adslotInline_3_300x250">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display("adslotInline_3_300x250");
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads for mobile & desktop --}}
                        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                        <div class="articlecontent" data-article-id="{{ $newsDetails->news_id }}">
                            @php
                                // Split the article content into paragraphs
                                $paragraphs = preg_split('/\r\n|\r|\n/', $newsDetails->content);
                                $totalParagraphs = count($paragraphs);
                                $adSlots = [
                                    'adslotInline_1_300x250',
                                    'adslotInline_2_300x250',
                                    'adslotInline_3_300x250',
                                    'adslotInline_4_300x250',
                                    'adslotInline_5_300x250',
                                ];
                                $adsInserted = 0;
                                // Determine ad insertion interval based on total paragraphs
                                $adInterval = $totalParagraphs >= 80 ? 8 : ($totalParagraphs >= 50 ? 5 : 3);
                                $contentBlocks = [];
                                foreach ($paragraphs as $index => $para) {
                                    // $contentBlocks[] = $para;
                                    $contentBlocks[] = '<p>' . $para . '</p>';
                                    if (
                                        $adInterval > 0 &&
                                        ($index + 1) % $adInterval === 0 &&
                                        $adsInserted < count($adSlots)
                                    ) {
                                        $slotId = $adSlots[$adsInserted];
                                        $contentBlocks[] =
                                            '<div class="inner-article-detail-desktop-ad">
                                    <div id="' .
                                            $slotId .
                                            '">
                                        <script>
                                            googletag.cmd.push(function() {
                                                googletag.display("' . $slotId . '");
                                            });
                                        </script>
                                    </div>
                                </div>';
                                        $adsInserted++;
                                    }
                                }
                                $renderedContent = implode("\r\n", $contentBlocks);
                            @endphp
                            {!! $renderedContent !!}
                        </div>
                        {{-- </div> --}}
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
                                                href="{{ Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
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
                            <div id='adslot300x250_ATF'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_ATF');
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
                                                $locale = App::getLocale();
                                                $catURL =
                                                    Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
                                                $baseUrl1 =
                                                    Config('constants.MainDomain') .
                                                    "/insights/$locale/" .
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
                                @forelse ($latestArticles as $latest)
                                    <li>
                                        @foreach ($latest->category as $cat)
                                            @php
                                                $locale = App::getLocale();
                                                $catURL =
                                                    Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
                                                $baseUrl1 =
                                                    Config('constants.MainDomain') .
                                                    "/insights/$locale/" .
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
                                @endforelse
                            </ul>
                        </div>
                        <div class="ad-right-sticky">
                            <div id="adslot300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New article will be loaded here -->
        <div id="next-article-container" class="next-article-container"></div>
    </div>
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with opacity */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            /* Ensure it appears above other content */
        }

        /* Spinner styles */
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top: 5px solid white;
            /* Color of the spinning bar */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Spinner animation */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>

    @include('layout.insights.magblock')
    @php
        $currentId = $newsDetails->news_id;
        $categoryId = $newsDetails->cat_id ?? $newsDetails->category[0]->id;
        $locale = app()->getLocale();
        $nextUrl = route('insights.nextArticle', [
            'lang' => $locale,
            'currentId' => $currentId,
            'categoryId' => $categoryId,
            'direction' => 'down',
        ]);

    @endphp
    {{-- latest code running state --}}
    {{-- <script>
        let isLoading = false;
        let hasScrolledDown = false;

        let nextUrl = @json($nextUrl);
        let loadedIds = new Set([@json($newsDetails->news_id)]);
        let currentActiveArticleId = null;

        let articleMetaMap = {
            [@json($newsDetails->news_id)]: {
                meta: {
                    title: @json($newsDetails->meta_title),
                    description: @json($newsDetails->meta_description),
                    keywords: @json($newsDetails->meta_keywords)
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

        function toggleLoader(show) {
            const loader = document.getElementById('loading');
            if (loader) loader.style.display = show ? 'block' : 'none';
        }

        function loadArticle(currentId) {
            if (isLoading || !nextUrl) return;
            isLoading = true;
            toggleLoader(true);

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
                        $container.append(data.html);
                        nextUrl = data.nextUrl;

                        loadedIds.add(data.articleId);

                        if (data.articleId && data.meta && data.newUrl) {
                            articleMetaMap[data.articleId] = {
                                meta: data.meta,
                                url: data.newUrl
                            };
                        }

                        updateMetadata(data.meta);
                        history.pushState(null, '', data.newUrl);
                        fireGTM(data.articleId);
                        observeArticles();
                    }
                },
                complete: () => {
                    isLoading = false;
                    toggleLoader(false);
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
                        loadArticle(id);
                    }
                }
            });
        }, {
            threshold: 1
        });
        const nextTriggerObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;

                    if (articleId && articleId !== currentActiveArticleId) {
                        currentActiveArticleId = articleId;

                        const data = articleMetaMap[articleId];
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(articleId);
                        }
                    }
                }
            });
        }, {
            threshold: 0.9
        });

        // Scroll-up observer for first paragraph of each article
        const topParagraphObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;

                    if (articleId && articleId !== currentActiveArticleId) {
                        currentActiveArticleId = articleId;

                        const data = articleMetaMap[articleId];
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(articleId);
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
            nextTriggerObserver.disconnect();

            articles.forEach((article, index) => {
                const ps = article.querySelectorAll('p');
                if (ps.length) {
                    const firstP = ps[0];
                    const lastP = ps[ps.length - 1];

                    // For regular active article observation
                    articleObserver.observe(lastP);

                    // Scroll down: observe .article-next inside this article
                    const nextDiv = article.querySelector('.article-next');
                    if (nextDiv) nextTriggerObserver.observe(nextDiv);

                    // Scroll up: observe first paragraph
                    topParagraphObserver.observe(firstP);

                    // Last article triggers loading next article
                    if (index === articles.length - 1) {
                        bottomObserver.observe(lastP);
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });
    </script> --}}

    {{-- 21-5-25 --}}
    {{-- <script>
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
                        $container.append(data.html);
                        nextUrl = data.nextUrl;

                        loadedIds.add(data.articleId);

                        if (data.articleId && data.meta && data.newUrl) {
                            articleMetaMap[data.articleId] = {
                                meta: data.meta,
                                url: data.newUrl
                            };
                        }

                        // updateMetadata(data.meta);
                        // history.pushState(null, '', data.newUrl);
                        // fireGTM(data.articleId);
                        observeArticles();
                    }
                },
                complete: () => {
                    isLoading = false;
                    $('#loader').hide();
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
                        loadArticle(id);
                    }
                }
            });
        }, {
            threshold: 1
        });
        const nextTriggerObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;

                    if (articleId && articleId !== currentActiveArticleId) {
                        currentActiveArticleId = articleId;

                        const data = articleMetaMap[articleId];
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(articleId);
                        }
                    }
                }
            });
        }, {
            threshold: 0.9
        });

        // Scroll-up observer for first paragraph of each article
        const topParagraphObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;

                    if (articleId && articleId !== currentActiveArticleId) {
                        currentActiveArticleId = articleId;

                        const data = articleMetaMap[articleId];
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(articleId);
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
            nextTriggerObserver.disconnect();

            articles.forEach((article, index) => {
                const ps = article.querySelectorAll('p');
                if (ps.length) {
                    const firstP = ps[0];
                    const lastP = ps[ps.length - 1];

                    // For regular active article observation
                    articleObserver.observe(lastP);

                    // Scroll down: observe .article-next inside this article
                    const nextDiv = article.querySelector('.article-next');
                    if (nextDiv) nextTriggerObserver.observe(nextDiv);

                    // Scroll up: observe first paragraph
                    topParagraphObserver.observe(firstP);

                    // Last article triggers loading next article
                    if (index === articles.length - 1) {
                        bottomObserver.observe(lastP);
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });
    </script> --}}

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
                        $container.append(data.html);
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
                    // if (id) {
                    //     hasScrolledDown = true;
                    //     loadArticle(id);
                    // }
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

        const header = document.querySelector('header');
        const footer = document.querySelector('footer');

        const nextTriggerObserver = new IntersectionObserver(entries => {
            // console.log(nextTriggerObserver + 'nextTrigger');
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const trigger = entry.target;
                    const article = trigger.closest('.articlecontent');
                    const articleId = article?.dataset.articleId;

                    if (!articleId || articleId === currentActiveArticleId) return;

                    const data = articleMetaMap[articleId];
                    if (!data) return;

                    const triggerRect = trigger.getBoundingClientRect();
                    const headerRect = header?.getBoundingClientRect();
                    const footerRect = footer?.getBoundingClientRect();

                    const intersectsHeader = headerRect && triggerRect.top >= headerRect.top && triggerRect
                        .bottom <= headerRect.bottom;
                    const intersectsFooter = footerRect && triggerRect.top >= footerRect.top && triggerRect
                        .bottom <= footerRect.bottom;
                    if (intersectsHeader || intersectsFooter) {
                        currentActiveArticleId = articleId;
                        updateMetadata(data.meta);
                        history.pushState(null, '', data.url);
                        fireGTM(articleId);
                    }
                }
            });
        }, {
            threshold: 0.5
        });

        const topParagraphObserver = new IntersectionObserver(entries => {
            // console.log(topParagraphObserver + 'topPara');
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    // console.log(article);
                    const articleId = article?.dataset.articleId;

                    if (articleId && articleId !== currentActiveArticleId) {
                        currentActiveArticleId = articleId;

                        const data = articleMetaMap[articleId];
                        console.log('changing data here:', articleMetaMap[articleId]);
                        if (data) {
                            updateMetadata(data.meta);
                            history.pushState(null, '', data.url);
                            fireGTM(articleId);
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
            nextTriggerObserver.disconnect();

            articles.forEach((article, index) => {
                const ps = article.querySelectorAll('p');
                if (ps.length) {
                    const firstP = ps[0];
                    const lastP = ps[ps.length - 1];
                    articleObserver.observe(lastP);

                    const nextDiv = article.querySelector('.article-next');
                    // console.log(nextDiv + 'nextDiv');
                    if (nextDiv) nextTriggerObserver.observe(nextDiv);

                    topParagraphObserver.observe(firstP);

                    if (index === articles.length - 1) {
                        bottomObserver.observe(lastP);
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });
    </script>



@endsection
