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
            <div id='adslot728x90_ATF'>
                <script>
                    googletag.cmd.push(function() {
                        googletag.display('adslot728x90_ATF');
                    });
                </script>
            </div>
        </div>
    @enddesktop
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
                    <div id="adslotInline_3_300x250">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display("adslotInline_3_300x250");
                            });
                        </script>
                    </div>
                </div>
                {{-- ads for mobile & desktop --}}
                <div class="shortdes">{{ $nextArticle->shortDesc }}</div>
                <div class="articlecontent" data-article-id="{{ $nextArticle->news_id }}">
                    @php
                        // Split the article content into paragraphs
                        $paragraphs = preg_split('/\r\n|\r|\n/', $nextArticle->content);
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
                            if ($adInterval > 0 && ($index + 1) % $adInterval === 0 && $adsInserted < count($adSlots)) {
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
                                        href="{{ Config('constants.MainDomain') . '/insights/' . $lang . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
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
                        @forelse ($latestArticles as $latest)
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
</div>
