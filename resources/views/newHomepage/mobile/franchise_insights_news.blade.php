@if (Request::segment(1) == 'hi')
<section class="franchise-insights">
    <div class="heading-link">
        <h2 class="brands-head">
            {{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
        </h2><a target="_blank" aria-label="view all"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                target="_blank" aria-label="{{ $articles[0]['title'] }}">
                @php
                $locale = App::getLocale();
                // dd($locale);
                @endphp
                <img loading="lazy"
                   src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[0]['image']) }}"
                    alt="{{ $articles[0]['title'] }}" width="295" height="166"></a>
        </div>
        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
            target="_blank" aria-label="{{ $articles[0]['title'] }}">
            <h2>{{ $articles[0]['title'] }}</h2>
        </a>
        <p>{{ strip_tags(html_entity_decode(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...'))) }}
        </p>
        {{--  <div class="news-konwmore">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank"></a>
        </div>  --}}
        <ul class="small-newsx-post-main">
            @for ($i = 1; $i <= 4; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                        target="_blank" aria-label="{{ $articles[$i]['title'] }}"><img
                                              src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                            alt="{{ $articles[$i]['title'] }}" width="80" height="45"
                                            loading="lazy"></a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    target="_blank"
                                    aria-label="{{ $articles[$i]['title'] }}">{{ $articles[$i]['title'] }}</a>
                                </p><a
                                    href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    class="read-more" aria-label="{{ $articles[$i]['title'] }}" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</section>


<section class="franchise-insights news">
    <div class="heading-link">
        <h2 class="brands-head">{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2><a target="_blank"
            aria-label="view all"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
                aria-label="{{ $articles[5]['title'] }}" target="_blank">
                <img src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[5]['image']) }}"
                    alt="{{ $articles[5]['title'] }}" width="295" height="166" loading="lazy"></a>
        </div>
        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
            target="_blank" aria-label="{{ $articles[5]['title'] }}">
            <h2>{{ $articles[5]['title'] }}</h2>
        </a>
        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles[5]['content'], 20, ' ...')) }}</p>
        {{--  <div class="news-konwmore">
           <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}"></a>
        </div>  --}}

        <ul class="small-newsx-post-main">
            @for ($i = 6; $i <= 9; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a aria-label="{{ $articles[$i]['title'] }}"
                                        href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"><img
                                           src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                            alt="{{ $articles[$i]['title'] }}" width="80" height="45"
                                            loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a aria-label="{{ $articles[$i]['title'] }}"
                                    href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    target="_blank">
                                    <h3>{{ $articles[$i]['title'] }}</h3>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</section>
@else

<section class="franchise-insights">
    <div class="heading-link">
        <h2 class="brands-head">
            {{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
        </h2><a target="_blank" aria-label="view all"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                target="_blank" aria-label="{{ $articles[0]['title'] }}">
                <img loading="lazy"
                    src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[0]['image']) }}"
                    alt="{{ $articles[0]['title'] }}" width="295" height="166"></a>
        </div>
        <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
            target="_blank" aria-label="{{ $articles[0]['title'] }}">
            <h2>{{ $articles[0]['title'] }}</h2>
        </a>
        <p> {{ strip_tags(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...')) }}
        </p>
        {{--  <div class="news-konwmore">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank"></a>
        </div>  --}}
        <ul class="small-newsx-post-main">
            @for ($i = 1; $i <= 4; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                        target="_blank" aria-label="{{ $articles[$i]['title'] }}"><img
                                            src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                            alt="{{ $articles[$i]['title'] }}" width="80" height="45"
                                            loading="lazy"></a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    target="_blank"
                                    aria-label="{{ $articles[$i]['title'] }}">{{ $articles[$i]['title'] }}</a>
                                </p><a
                                    href="https://www.franchiseindia.com/insights/en/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    class="read-more" aria-label="{{ $articles[$i]['title'] }}" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</section>


<section class="franchise-insights news">
    <div class="heading-link">
        <h2 class="brands-head">{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2><a target="_blank"
            aria-label="view all"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
                aria-label="{{ $articles[5]['title'] }}" target="_blank">
                <img src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[5]['image']) }}"
                    alt="{{ $articles[5]['title'] }}" width="295" height="166" loading="lazy"></a>
        </div>
        <a href="https://www.franchiseindia.com/insights/en/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
            target="_blank" aria-label="{{ $articles[5]['title'] }}">
            <h2>{{ $articles[5]['title'] }}</h2>
        </a>
        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles[5]['content'], 20, ' ...')) }}</p>
        {{--  <div class="news-konwmore">
           <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}"></a>
        </div>  --}}

        <ul class="small-newsx-post-main">
            @for ($i = 6; $i <= 9; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a aria-label="{{ $articles[$i]['title'] }}"
                                        href="https://www.franchiseindia.com/insights/en/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"><img
                                            src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                            alt="{{ $articles[$i]['title'] }}" width="80" height="45"
                                            loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a aria-label="{{ $articles[$i]['title'] }}"
                                    href="https://www.franchiseindia.com/insights/en/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                    target="_blank">
                                    <h3>{{ $articles[$i]['title'] }}</h3>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</section>

@endif