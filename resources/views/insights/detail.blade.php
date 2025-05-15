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
        <div id="next-article-container"></div>
    </div>
    @include('layout.insights.magblock')
    @php
        $nextArticleParams = [
            'currentId' => $newsDetails->news_id,
            'categoryId' => $newsDetails->category[0]->id ?? $newsDetails->cat_id,
            'lang' => $locale,
        ];
        $nextUrl = isset($nextArticleParams) ? route('insights.nextArticle', $nextArticleParams) : '';
    @endphp
    <script>
        let isLoading = false;
        let nextArticleUrl = @json($nextUrl); // passed from controller
        let prevArticleUrls = {}; // { articleId: url }
        console.log(prevArticleUrls);
        const updateMetadata = (data) => {
            if (data.meta) {
                document.title = data.meta.title || document.title;
                if (data.meta.description) {
                    document.querySelector('meta[name="description"]').setAttribute('content', data.meta.description);
                }
                if (data.meta.ogTitle) {
                    document.querySelector('meta[property="og:title"]').setAttribute('content', data.meta.ogTitle);
                }
            }
        };

        const loadArticle = (direction, currentArticleId = null) => {
            if (isLoading) return;
            isLoading = true;

            let url = (direction === 'down') ? nextArticleUrl : prevArticleUrls[currentArticleId] || null;
            if (!url) {
                
                isLoading = false;
                return;
            }

            $.ajax({
                url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success && data.html) {
                        const $container = $('#next-article-container');

                        if (direction === 'down') {
                            $container.append(data.html);
                            nextArticleUrl = data.nextUrl || null;
                            if (data.articleId && data.prevUrl) {
                                prevArticleUrls[data.articleId] = data.prevUrl;
                            }
                        } else {
                            const scrollTopBefore = window.scrollY;
                            $container.prepend(data.html);
                            const newFirstArticle = document.querySelector('.articlecontent');
                            if (newFirstArticle) {
                                const newHeight = newFirstArticle.offsetHeight;
                                window.scrollTo(0, scrollTopBefore + newHeight);
                            }
                            if (data.articleId && data.prevUrl) {
                                prevArticleUrls[data.articleId] = data.prevUrl;
                            }
                        }

                        if (data.newUrl) {
                            history.pushState(null, '', data.newUrl);
                        }

                        updateMetadata(data);
                        observeArticles(); // re-attach observers
                    }
                },
                complete: function() {
                    isLoading = false;
                }
            });
        };

        const observeArticles = () => {
            const articles = document.querySelectorAll('.articlecontent');
            articleTopObserver.disconnect();
            articleBottomObserver.disconnect();

            articles.forEach((article, index) => {
                const ps = article.querySelectorAll('p');
                if (ps.length) {
                    if (index !== 0) articleTopObserver.observe(ps[0]);
                    if (index === articles.length - 1) articleBottomObserver.observe(ps[ps.length - 1]);
                }
            });
        };

        const articleTopObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const article = entry.target.closest('.articlecontent');
                    const currentId = article?.dataset?.articleId;
                    if (currentId) loadArticle('up', currentId);
                }
            });
        }, {
            threshold: 1
        });

        const articleBottomObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    loadArticle('down', currentId);
                }
            });
        }, {
            threshold: 1
        });

        document.addEventListener('DOMContentLoaded', () => {
            observeArticles();
        });
    </script>



    {{-- <script>
        let isLoading = false;
        let nextArticleUrl = @json(route('insights.nextArticle', $nextArticleParams));
        let isFirstArticle = true;

        const loadNextArticle = () => {
            if (isLoading || !nextArticleUrl) return;
            isLoading = true;

            $.ajax({
                url: nextArticleUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success && data.html) {
                        $('#next-article-container').append(data.html);
                        nextArticleUrl = data.nextUrl || null;

                        if (data.newUrl) {
                            console.log("New URL to update:", data.newUrl); // Debugging log
                            // Update the browser URL without reloading the page
                            history.pushState(null, '', data.newUrl);
                        }
                        // Set the flag to false after the first article
                        isFirstArticle = false;
                        observeLastParagraph(); // 👈 VERY IMPORTANT

                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error, xhr.responseText);
                },
                complete: function() {
                    isLoading = false;
                }
            });
        };

        const lastParagraphObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    loadNextArticle();
                }
            });
        }, {
            threshold: 1.0
        });

        function observeLastParagraph() {
            const paragraphs = document.querySelectorAll('.articlecontent p');
            if (paragraphs.length) {
                lastParagraphObserver.disconnect(); // disconnect old
                lastParagraphObserver.observe(paragraphs[paragraphs.length - 1]); // observe last
            }
        }
        $(document).ready(function() {
            observeLastParagraph(); // initial page only
        });

        // $(document).ready(function() {
        //     const paragraphs = $('.articlecontent p');
        //     if (paragraphs.length) {
        //         lastParagraphObserver.observe(paragraphs[paragraphs.length - 1]);
        //     }
        // });
    </script> --}}


@endsection
