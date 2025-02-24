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
{{-- <div class="contentwrapper">
    <div class="container">
    </div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <hr class="similar-article-line" style="height: 2px;background-color: #333;margin-top: 41px;">
            <div class="article-next"
                style="display: block;background-color: #000;color: #fff;padding: 2px 17px 5px 17px;width: 111px;margin-top: -16px;font-size: 16px;border-radius: 0px 0px 23px 0px;}">
                Next Story</div>
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
                    <a href="{{ url("/insights/{$typeURL}") }}" class="tip-bottom">{{ $newsDetails->insight_type }}</a>
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
                        <div class="article-time">BY - <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
                            <br>
                            <span>
                                {{ $author_details->designation }}
                            </span>
                            <span>
                                {{ date('M d, Y', strtotime($newsDetails->created_at)) }} /
                                <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10" width="17"
                                    alt="Franchise Insights" class="img-fluid">
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
                <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}">
                <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                <div class="articlecontent">
                    {!! $newsDetails->content !!}
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; padding: 20px;">
                    @if (!empty($franchiseData))
                        <h4 style="margin-top:15px">Interested in Franchise:</h4>
                        @foreach ($franchiseData as $franchise)
                            <div
                                style="background-color: #f9f9f9; border: 1px solid #ddd; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; min-width: 95px; max-width: 200px;">
                                <a href="http://franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}"
                                    target="_blank"
                                    style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
                                    {{ $franchise['company_name'] }}
                                </a>
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
            <div class="contentarea" id="last-paragraph-{{ $newsDetails->news_id }}">
                @include('layout.insights.subscribenewsletter')
            </div>
        </div>

        <div class="nextt" id="next-article-{{ $newsDetails->news_id }}">

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        let loadedNewsIds = []; // Array to store loaded article IDs
        let cnId = {{$newsDetails->news_id}}
        let observer = new IntersectionObserver(function(entries) {
            if (entries[0].isIntersecting) {
                loadNextArticle();
            }
        }, {
            threshold: 1.0
        });

        let lastParagraph = $("#last-paragraph-"+ cnId);
        // console.log(lastParagraph);
        if (lastParagraph.length) {
            observer.observe(lastParagraph[0]);
        }

        function loadNextArticle() {
            let $nextArticleContainer = $("#next-article-"+ cnId);
            if ($nextArticleContainer.attr("data-loading") === "true") return;
            $nextArticleContainer.attr("data-loading", "true");
            let currentNewsId = {!! json_encode($newsDetails->news_id) !!};
            let catId = {!! json_encode($newsDetails->cat_id) !!};

            // Add current ID to the array before sending request
            if (!loadedNewsIds.includes(currentNewsId)) {
                loadedNewsIds.push(currentNewsId);
            }

            // Debug: Check values before sending
            console.log("Before sending:", {
                currentNewsId: currentNewsId,
                catId: catId,
                loadedNewsIds: loadedNewsIds
            });

            $.ajax({
                url: `/insights/next-article/${catId}/${loadedNewsIds}`,
                method: "GET", // Use POST instead of GET for sending data
                data: {
                    loadedNewsIds: loadedNewsIds // Send the array directly (Laravel will auto-convert)
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for Laravel security
                },
                success: function(data) {
                    $nextArticleContainer.html(data);
                    $nextArticleContainer.removeAttr("data-loading");

                    // Store the loaded article ID after successful load
                    loadedNewsIds.push(currentNewsId);

                    // Debug: Check updated array
                    console.log("Updated loadedNewsIds:", loadedNewsIds);
                },
                error: function(error) {
                    console.error("Error loading next article:", error);
                }
            });
        }
    });
</script> --}}
<script>
    $(document).ready(function() {
        let loadedNewsIds = {{ $loadedNewsIds}}; // Store previous IDs in a Set
        console.log(loadedNewsIds);
        let observer = new IntersectionObserver(function(entries) {
            if (entries[0].isIntersecting) {
                let newsId = {{$newsDetails->news_id}};
                if (!loadedNewsIds.has(newsId)) { // Load only if not already loaded
                    loadNextArticle(newsId);
                }
            }
        }, {
            threshold: 1.0
        });

        function observeLastParagraph(newsId) {
            let $lastParagraph = $("#last-paragraph-" + newsId);
            if ($lastParagraph.length) {
                observer.observe($lastParagraph[0]);
            }
        }

        function loadNextArticle(currentNewsId) {
            let $nextArticleContainer = $("#next-article-" + currentNewsId);

            if ($nextArticleContainer.attr("data-loading") === "true") return;
            $nextArticleContainer.attr("data-loading", "true");

            let catId = {!! json_encode($newsDetails->cat_id) !!};

            // Add current ID to Set (prevents duplicates)
            loadedNewsIds.add(currentNewsId);

            $.ajax({
                url: `/insights/next-article/${catId}`, // Ensure {newsId} is included
                method: "GET",
                data: {
                    loadedNewsIds: Array.from(loadedNewsIds) // Send array properly
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.trim() !== "") { // Ensure data is not empty
                        let newArticle = $(data);
                        $("#next-article-" + currentNewsId).after(newArticle);
                        $nextArticleContainer.removeAttr("data-loading");

                        // Get the new article's ID and observe its last paragraph
                        let newNewsId = newArticle.find(".next-article-container").attr("id")
                            .replace("next-article-", "");
                        observeLastParagraph(newNewsId);
                    }
                },
                error: function(error) {
                    console.error("Error loading next article:", error);
                }
            });
        }

        // Observe the first article's last paragraph
        let initialNewsId = {!! json_encode($newsDetails->news_id) !!};
        observeLastParagraph(initialNewsId);
    });
</script>
