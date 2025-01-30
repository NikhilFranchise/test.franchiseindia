@if (Request::segment(1) == 'hi')
<section class="newssection section-30" id="newssection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-xs-12 col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
                    </h2>
                    <div class="view-all-main-section">
                        <a target="_blank"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights' }}"
                            aria-label="view all">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                            target="_blank">
                                            @php
                                                $locale = App::getLocale();
                                                // dd($locale);
                                            @endphp
                                            <img loading="lazy"
                                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[0]['image']) }}"
                                                class="img-b" alt="{{ $articles[0]['title'] }}">
                                        </a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                                target="_blank"
                                                aria-label="{{ $articles[0]['title'] }}">{{ $articles[0]['title'] }}</a>
                                        </h3>
                                        {{-- <p> {{ strip_tags(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...')) }}
                                        </p> --}}
                                        <p> {{ strip_tags(html_entity_decode(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...'))) }}
                                        </p>

                                        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                            target="_blank" aria-label="{{ $articles[0]['title'] }}"></a>
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
                                                        <a
                                                            href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}">
                                                            <img loading="lazy"
                                                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                                                class="img-z-fluid"
                                                                alt="Preview image for article'{{ $articles[$i]['title'] }}'"
                                                                width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                    aria-label="{{ $articles[$i]['title'] }}"
                                                                    target="_blank">{{ $articles[$i]['title'] }}</a>
                                                            </p><a
                                                                href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                aria-label="{{ $articles[$i]['title'] }}"
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
                    <h2>{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2>
                    <div class="view-all-main-section">
                        <a target="_blank" aria-label="Interviews"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hi/interviews' : 'https://www.franchiseindia.com/insights/en/interviews' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[0]['slug'] }}.{{ $articles[5]['news_id'] }}"
                                            target="_blank" aria-label="{{ $articles[5]['title'] }}"><img
                                                loading="lazy"
                                                src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[5]['image']) }}"
                                                class="img-b" alt="{{ $articles[5]['title'] }}" width="268"
                                                height="151"></a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
                                                target="_blank"
                                                aria-label="{{ $articles[5]['title'] }}">{{ $articles[5]['title'] }}</a>
                                        </h3>
                                        {{-- <p>{{ strip_tags(\Illuminate\Support\Str::words($articles[5]['content'], 20, ' ...')) }}
                                        </p> --}}
                                        <p> {{ strip_tags(html_entity_decode(\Illuminate\Support\Str::words($articles[5]['content'], 20, ' ...'))) }}
                                        </p>
                                        <a
                                            href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[5]['slug'] }}.{{ $articles[5]['news_id'] }}"
                                            target="_blank" aria-label="{{ $articles[5]['title'] }}"></a>
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
                                                        <a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                            target="_blank"
                                                            aria-label="{{ $articles[$i]['title'] }}"><img
                                                                loading="lazy"
                                                                src="{{\App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                                                class="img-z-fluid" alt="{{ $articles[$i]['title'] }}"
                                                                width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                    aria-label="{{ $articles[$i]['title'] }}"
                                                                    target="_blank">{{ $articles[$i]['title'] }}</a>
                                                            </p><a
                                                                href="https://www.franchiseindia.com/insights/hi/article/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                class="read-more"
                                                                aria-label="{{ $articles[$i]['title'] }}"
                                                                target="_blank"></a>
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

@else

<section class="newssection section-30" id="newssection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-xs-12 col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
                    </h2>
                    <div class="view-all-main-section">
                        <a target="_blank"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hindi' : 'https://www.franchiseindia.com/insights' }}"
                            aria-label="view all">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="https://www.franchiseindia.com/insights/en/news/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                            target="_blank">
                                            @php
                                                $locale = App::getLocale();
                                                // dd($locale);
                                            @endphp
                                            <img loading="lazy"
                                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[0]['image']) }}"
                                                class="img-b" alt="{{ $articles[0]['title'] }}">
                                        </a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="https://www.franchiseindia.com/insights/en/news/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                                target="_blank"
                                                aria-label="{{ $articles[0]['title'] }}">{{ $articles[0]['title'] }}</a>
                                        </h3>
                                        {{-- <p> {{ strip_tags(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...')) }}
                                        </p> --}}
                                        <p> {{ strip_tags(html_entity_decode(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...'))) }}
                                        </p>

                                        <a href="https://www.franchiseindia.com/insights/en/news/{{ $articles[0]['slug'] }}.{{ $articles[0]['news_id'] }}"
                                            target="_blank" aria-label="{{ $articles[0]['title'] }}"></a>
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
                                                        <a
                                                            href="https://www.franchiseindia.com/insights/en/news/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}">
                                                            <img loading="lazy"
                                                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($articles[$i]['image']) }}"
                                                                class="img-z-fluid"
                                                                alt="Preview image for article'{{ $articles[$i]['title'] }}'"
                                                                width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="https://www.franchiseindia.com/insights/en/news/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                    aria-label="{{ $articles[$i]['title'] }}"
                                                                    target="_blank">{{ $articles[$i]['title'] }}</a>
                                                            </p><a
                                                                href="https://www.franchiseindia.com/insights/en/news/{{ $articles[$i]['slug'] }}.{{ $articles[$i]['news_id'] }}"
                                                                aria-label="{{ $articles[$i]['title'] }}"
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
                    <h2>{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2>
                    <div class="view-all-main-section">
                        <a target="_blank" aria-label="Interviews"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.franchiseindia.com/insights/hi/interviews' : 'https://www.franchiseindia.com/insights/en/interviews' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[0]['title'], $articles2[0]['news_id']) }}"
                                            target="_blank" aria-label="{{ $articles2[0]['title'] }}"><img
                                                loading="lazy"
                                                src="{{\App\Http\Controllers\InsightsController::createimgurl($articles2[0]['image']) }}"
                                                class="img-b" alt="{{ $articles2[0]['title'] }}" width="268"
                                                height="151"></a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[0]['title'], $articles2[0]['news_id']) }}"
                                                target="_blank"
                                                aria-label="{{ $articles2[0]['title'] }}">{{ $articles2[0]['title'] }}</a>
                                        </h3>
                                        {{-- <p>{{ strip_tags(\Illuminate\Support\Str::words($articles2[5]['content'], 20, ' ...')) }}
                                        </p> --}}
                                        <p> {{ strip_tags(html_entity_decode(\Illuminate\Support\Str::words($articles[0]['content'], 20, ' ...'))) }}
                                        </p>
                                        <a
                                            href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[0]['title'], $articles2[0]['news_id']) }}"
                                            target="_blank" aria-label="{{ $articles2[0]['title'] }}"></a>
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
                                                    <div
                                                        class="modified-col col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        <a href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[$i]['title'], $articles2[$i]['news_id']) }}"
                                                            target="_blank"
                                                            aria-label="{{ $articles2[$i]['title'] }}"><img
                                                                loading="lazy"
                                                                src="{{\App\Http\Controllers\InsightsController::createimgurl($articles2[$i]['image']) }}"
                                                                class="img-z-fluid" alt="{{ $articles2[$i]['title'] }}"
                                                                width="89" height="50"></a>
                                                    </div>
                                                    <div
                                                        class="modified-col col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[$i]['title'], $articles2[$i]['news_id']) }}"
                                                                    aria-label="{{ $articles2[$i]['title'] }}"
                                                                    target="_blank">{{ $articles2[$i]['title'] }}</a>
                                                            </p><a
                                                                href="{{ 'https://www.franchiseindia.com/insights' . \App\Http\Controllers\NewHomePageController::getinsights_interview_Slug($articles2[$i]['title'], $articles2[$i]['news_id']) }}"
                                                                class="read-more"
                                                                aria-label="{{ $articles2[$i]['title'] }}"
                                                                target="_blank"></a>
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
@endif
