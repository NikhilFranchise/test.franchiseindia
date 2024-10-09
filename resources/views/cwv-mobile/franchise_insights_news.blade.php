<section class="franchise-insights">
    <div class="heading-link">
        <h2 class="brands-head">
            {{ Request::segment(2) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
        </h2><a target="_blank" aria-label="view all"
            href="{{ Request::segment(2) == 'hi' ? 'https://www.opportunityindia.com/hindi/' : 'https://www.opportunityindia.com/' }}">{{ Request::segment(2) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank" aria-label="{{ $articles['article'][0]['title'] }}">
                <img loading="lazy"
                    src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][0]['image_path']) }}"
                    alt="{{ $articles['article'][0]['title'] }}" width="295" height="166"></a>
        </div>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
            target="_blank" aria-label="{{ $articles['article'][0]['title'] }}">
            <h2>{{ $articles['article'][0]['title'] }}</h2>
        </a>
        <p> {{ strip_tags(\Illuminate\Support\Str::words($articles['article'][0]['content'], 20, ' ...')) }}
        </p>
        <div class="news-konwmore">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank"></a>
        </div>
        <ul class="small-newsx-post-main">
            @for ($i = 1; $i <= 4; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                        target="_blank" aria-label="{{ $articles['article'][$i]['title'] }}"><img
                                            src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                            alt="{{ $articles['article'][$i]['title'] }}" width="80" height="45"
                                            loading="lazy"></a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                    target="_blank"
                                    aria-label="{{ $articles['article'][$i]['title'] }}">{{ $articles['article'][$i]['title'] }}</a>
                                </p><a
                                    href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                    class="read-more" target="_blank"></a>
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
        <h2 class="brands-head">{{ Request::segment(2) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2><a target="_blank"
            aria-label="view all"
            href="{{ Request::segment(2) == 'hi' ? 'https://www.opportunityindia.com/hindi/tag/साक्षात्कार/' : 'https://www.opportunityindia.com/english/tag/interview/' }}">{{ Request::segment(2) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                aria-label="{{ $articles['article'][5]['title'] }}" target="_blank">
                <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][5]['image_path']) }}"
                    alt="{{ $articles['article'][5]['title'] }}" width="295" height="166" loading="lazy"></a>
        </div>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}">
            <h2>{{ $articles['article'][5]['title'] }}</h2>
        </a>
        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles['article'][5]['content'], 20, ' ...')) }}</p>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}"></a>
        <ul class="small-newsx-post-main">
            @for ($i = 6; $i <= 9; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a aria-label="{{ $articles['article'][$i]['title'] }}"
                                        href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"><img
                                            src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                            alt="{{ $articles['article'][$i]['title'] }}" width="80" height="45"
                                            loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a aria-label="{{ $articles['article'][$i]['title'] }}"
                                    href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                    target="_blank">
                                    <h3>{{ $articles['article'][$i]['title'] }}</h3>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</section>
