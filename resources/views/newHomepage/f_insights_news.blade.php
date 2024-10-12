<section class="newssection section-30" id="newssection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-xs-12 col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(2) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
                    </h2>
                    <div class="view-all-main-section">
                        <a target="_blank"
                            href="{{ Request::segment(2) == 'hi' ? 'https://www.opportunityindia.com/hindi/' : 'https://www.opportunityindia.com/' }}"
                            aria-label="view all">{{ Request::segment(2) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank">
                                            <img loading="lazy"
                                                src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][0]['image_path']) }}"
                                                class="img-b" alt="{{ $articles['article'][0]['title'] }}">
                                        </a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                                target="_blank"
                                                aria-label="{{ $articles['article'][0]['title'] }}">{{ $articles['article'][0]['title'] }}</a>
                                        </h3>
                                        <p> {{ strip_tags(\Illuminate\Support\Str::words($articles['article'][0]['content'], 20, ' ...')) }}
                                        </p>
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank" aria-label="{{ $articles['article'][0]['title'] }}"></a>
                                        <div class="d-flex author-section">
                                            <div class="author-info">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="news-min-section">
                                    <ul class="news-min-section-info">
                                        @for ($i = 1; $i <= 4; $i++)
                                            <li>
                                                <div class="row justify-content-center">
                                                    <div class="modified-col col-xs-4 col-sm-4 col-md-4 col">
                                                        <img loading="lazy"
                                                            src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                                            class="img-z-fluid"
                                                            alt="Preview image for article'{{ $articles['article'][$i]['title'] }}'"
                                                            width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    aria-label="{{ $articles['article'][$i]['title'] }}"
                                                                    target="_blank">{{ $articles['article'][$i]['title'] }}</a>
                                                            </p><a
                                                                href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                aria-label="{{ $articles['article'][$i]['title'] }}"
                                                                class="read-more" target="_blank"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modified-col col-xs-12 col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(2) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2>
                    <div class="view-all-main-section">
                        <a target="_blank" aria-label="Interviews"
                            href="{{ Request::segment(2) == 'hi' ? 'https://www.opportunityindia.com/hindi/tag/साक्षात्कार/' : 'https://www.opportunityindia.com/english/tag/interview/' }}">{{ Request::segment(2) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}"><img
                                                loading="lazy"
                                                src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][5]['image_path']) }}"
                                                class="img-b" alt="{{ $articles['article'][5]['title'] }}"
                                                width="268" height="151"></a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                                target="_blank"
                                                aria-label="{{ $articles['article'][5]['title'] }}">{{ $articles['article'][5]['title'] }}</a>
                                        </h3>
                                        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles['article'][5]['content'], 20, ' ...')) }}
                                        </p><a
                                            href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                            target="_blank" aria-label="{{ $articles['article'][5]['title'] }}"></a>
                                        <div class="d-flex author-section">
                                            <div class="author-info">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="news-min-section">
                                    <ul class="news-min-section-info">
                                        @for ($i = 6; $i <= 9; $i++)
                                            <li>
                                                <div class="row justify-content-center">
                                                    <div
                                                        class="modified-col col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                            target="_blank" aria-label="{{ $articles['article'][$i]['title'] }}"><img
                                                                loading="lazy"
                                                                src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                                                class="img-z-fluid"
                                                                alt="{{ $articles['article'][$i]['title'] }}"
                                                                width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}" aria-label="{{ $articles['article'][$i]['title'] }}"
                                                                    target="_blank">{{ $articles['article'][$i]['title'] }}</a>
                                                            </p><a
                                                                href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                class="read-more" aria-label="{{ $articles['article'][$i]['title'] }}" target="_blank"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
