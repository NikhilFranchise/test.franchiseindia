@extends('layout.insights.masterdetailpage')
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

  <!-- ✅ Load GPT once (async) -->
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
        window.googletag = window.googletag || { cmd: [] };

        // Guard so GPT services aren't enabled multiple times if next-article HTML contains scripts
        (function() {
            function setupGPTOnlyOnce() {
                if (window.__gptServicesEnabled) return;
                googletag.pubads().collapseEmptyDivs();
                googletag.pubads().enableLazyLoad({
                    fetchMarginPercent: 200,
                    renderMarginPercent: 100,
                    mobileScaling: 2.0
                });
                googletag.enableServices();
                window.__gptServicesEnabled = true;
            }
            googletag.cmd.push(setupGPTOnlyOnce);
            window.__setupGPTOnlyOnce = function(){ googletag.cmd.push(setupGPTOnlyOnce); };
        })();
    </script>
    
  {{-- <link rel="stylesheet" href="..."> --}}
  <div class="maininnver homeh">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> --}}
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
                    <div id="{{ $topAd }}" class="gpt-ad"
                    data-slot="/1057625/FIHL/FI_Desktop_ROS_728x90_ATF"
                    data-sizes="[[728,90]]"></div>
                    {{-- <script>
                        googletag.cmd.push(function() {
                            googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_ATF', [728, 90], '{{ $topAd }}')
                                .addService(googletag.pubads());
                            googletag.display('{{ $topAd }}');
                        });
                    </script> --}}
                </div>
            @enddesktop
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
                                    <img src="{{ $authorImage }}" width="51" height="51" alt="Indian Retailer">
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
                                            
                                        @endif
                                        <img src="{{ url('/detailpage/images/eye.png') }}" height="10"
                                            width="16" alt="Franchise Insights" class="img-fluid">
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
                                            <img src="{{ url('detailpage/images/facebook.png') }}" height="25"
                                                width="25"  alt="IR">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                                            <img src="{{ url('detailpage/images/linkedin.png') }}" height="25"
                                                width="25"  alt="Insights">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                            <img src="{{ url('detailpage/images/twitter.png') }}" height="25"
                                                width="25"  alt="Insights">
                                        </a>
                                    </li>
                                </ul>
                                <div class="follow-us first">
                                    <a href="" target="_blank">
                                        Follow Us
                                        <img src="{{ url('detailpage/images/follows.png') }}"  alt="Franchise India" width="11" height="11">
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="content-main">
                        {{-- <img
                        src="{{ $ogimage }}"
                        alt="{{ $newsDetails->title }}"
                        class="img-fluid"
                        width="{{ $width ?? 0 }}"
                        height="{{ $height ?? 0 }}"
                        loading="eager"
                        decoding="async"
                        fetchpriority="high" /> --}}
                       
                            @php
                            $relativePath = str_replace('https://franchiseindia.s3.ap-south-1.amazonaws.com/', '', $ogimage );
                        // Convert to hex for cached WebP filename (matches Node.js caching logic)
                            $hexName = bin2hex($relativePath);
                         @endphp

                          <picture>
                                <img src="{{ url('img/1600x940/' . $relativePath) }}" alt="{{ $newsDetails->title }}" class="img-fluid"
                                    loading="eager"
                                    decoding="async"
                                    fetchpriority="high"
                                    style="aspect-ratio: 1600 / 940;"
                                >
                            </picture>
                         

                        {{-- <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}"> --}}
                         <!-- ✅ Inline ad under hero image -->
                        @php
                            $imgBottomAd = 'adslot300x250_ATF-' . $newsDetails->news_id . '-' . $newsDetails->cat_id;
                        @endphp
                        <div class="inner-article-detail-desktop-ad fad">
                            <div id="{{ $imgBottomAd }}"  class="gpt-ad"
                                data-slot="/1057625/FIHL/FI_Desktop_ROS_Inline_3_300x250"
                                data-sizes="[[300,250],[336,280],[250,250]]">             
                            </div>
                        </div>

                        {{-- ads for mobile & desktop --}}
                        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                       
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
                    <div class="contentarea">
                        @include('layout.insights.subscribenewsletter')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-wrap">
                        {{-- ads top right sidebar --}}
                          {{-- RHS top ad --}}
                        @php $topRightAd = 'adslot300x250_ATF-' . $newsDetails->news_id; @endphp
                        <div class="ad-right"  class="gpt-ad"
                        data-slot="/1057625/FIHL/Desktop_ROS_300x250_ATF"
                        data-sizes="[[300,250]]">
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
                               
                                {{-- @forelse ($latestArticles as $latest)
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
                                 <p>No articles found.</p>
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
                          {{-- RHS sticky ad --}}
                        @php $rightBottomAd = 'adslot300x250_1-' . $newsDetails->news_id; @endphp
                        <div class="ad-right-sticky">
                            {{-- @php
                                $rightBottomAd = 'adslot300x250_1-' . $newsDetails->news_id;
                            @endphp --}}
                            <div id="{{ $rightBottomAd }}" class="gpt-ad"
                            data-slot="/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_1"
                            data-sizes="[[300,250],[300,600]]">
                                {{-- <script>
                                    googletag.cmd.push(function() {
                                        googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_RHS_300x250_1', [
                                                [300, 250],
                                                [300, 600]
                                            ], '{{ $rightBottomAd }}')
                                            .addService(googletag.pubads());
                                        googletag.display('{{ $rightBottomAd }}');
                                    });
                                </script> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer ads slot --}}
            @desktop
                @php $bottomAd = 'adslot728x90_BTF-' . $newsDetails->news_id; @endphp
                <div class="inner-article-detail-desktop-top-ad">
                    {{-- @php
                        $bottomAd = 'adslot728x90_BTF-' . $newsDetails->news_id;
                    @endphp --}}
                    <div id="{{ $bottomAd }}"  class="gpt-ad"
                    data-slot="/1057625/FIHL/FI_Desktop_ROS_728x90_BTF"
                    data-sizes="[[728,90],[970,90],[970,250]]">
                        {{-- <script>
                            googletag.cmd.push(function() {
                                googletag.defineSlot('/1057625/FIHL/FI_Desktop_ROS_728x90_BTF', [
                                        [728, 90],
                                        [970, 90],
                                        [970, 250]
                                    ], '{{ $bottomAd }}')
                                    .addService(googletag.pubads());
                                googletag.display('{{ $bottomAd }}');
                            });
                        </script> --}}
                    </div>
                </div>
            @enddesktop
        </div>
        <!-- New article will be loaded here -->
        <div id="next-article-container" class="next-article-container"> </div>
        <div id="loader" style="display: none;">
            <img src="{{ url('insight-new/assets/img/25.gif') }}" alt="loader" width="35">
        </div>
    </div>
    {{-- <div id="loader" style="display: none;">
        <img src="{{ url('insight-new/assets/img/25.gif') }}" alt="loader" width="35">
    </div> --}}

    {{-- @include('layout.insights.magblock') --}}
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
 <!-- ✅ Centralized GPT Ad Initializer for first load + next articles -->
 <script>
    (function(){
      function initAd(div) {
        if (!div || div.dataset.gptLoaded) return;

        const slotId = div.id;
        const slotPath = div.dataset.slot;
        let sizes;
        try { sizes = JSON.parse(div.dataset.sizes || '[]'); } catch(e) { sizes = []; }

        if (!slotId || !slotPath || !sizes.length) return;

        googletag.cmd.push(function() {
          googletag.defineSlot(slotPath, sizes, slotId).addService(googletag.pubads());
          googletag.display(slotId);
        });

        div.dataset.gptLoaded = "true";
      }

      function initAllAds(context=document) {
        // Ensure GPT services are enabled once
        if (window.__setupGPTOnlyOnce) window.__setupGPTOnlyOnce();
        context.querySelectorAll('.gpt-ad').forEach(initAd);
      }

      // Initialize on first paint
      window.addEventListener("DOMContentLoaded", () => initAllAds());

      // Expose for dynamic injections
      window.refreshNewAdSlots = function(context=document){
        initAllAds(context);
      };
    })();
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
                        const $container = $('#next-article-container');

                        // Wrap the new article HTML in a temporary container
                        const tempDiv = document.createElement('div');
                        // console.log('tempDiv', tempDiv);
                        tempDiv.innerHTML = data.html;

                        // Append the new content to the container
                        $container.append(tempDiv);

                        // ✅ Refresh ads ONLY in the new content
                        // refreshNewAdSlots(tempDiv);
                        
                        // ✅ Initialize GPT only in the newly injected DOM
                        if (window.refreshNewAdSlots) window.refreshNewAdSlots(tempDiv);    


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

        window.addEventListener('load', () => {
            setTimeout(() => {
                observeArticles();
                const imgs = document.querySelectorAll('.articlecontent img');
                imgs.forEach((img) => {
                    const isHero = img.closest('.content-main') !== null;
                    if (!isHero) {
                        img.setAttribute('loading', 'lazy');
                        img.setAttribute('decoding', 'async');
                        img.setAttribute('fetchpriority', 'low');
                    }
                });
            }, 300);
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
