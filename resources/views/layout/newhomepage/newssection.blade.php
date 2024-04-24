<section class="newssection section-30" id="newssection">
    <div class="container">
        <div class="row justify-content-center">
            <div
                class="modified-col col-xs-12 col-sm-12
                              col-md-6
                              col-xl-6
                              col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
                    </h2>
                    <div class="view-all-main-section">
                        <a target="_blank"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.opportunityindia.com/hindi/' : 'https://www.opportunityindia.com/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>

                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        {{-- <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank">
                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][0]['image_path']) }}"
                                                class="img-b" alt="{{ $articles['article'][0]['title'] }}">
                                        </a> --}}
                                        @if(!empty($articles['article'][0]))
    @php
        $article = $articles['article'][0];
        $slug = \App\Http\Controllers\NewHomePageController::getSlug($article['title'], $article['id']);
        $imageUrl = \App\Http\Controllers\NewHomePageController::getImageUrl($article['image_path']);
    @endphp

    <a href="{{ 'https://www.opportunityindia.com/' . $slug }}" target="_blank">
        <img src="{{ $imageUrl }}" class="img-b" alt="{{ $article['title'] }}">
    </a>
@endif

                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                                target="_blank">{{ $articles['article'][0]['title'] }}</a></h3>
                                        <p> {{ strip_tags(\Illuminate\Support\Str::words($articles['article'][0]['content'], 20, ' ...')) }}
                                        </p>
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}</a>
                                        <div
                                            class="d-flex
                                                   author-section">
                                            <div class="author-info">
                                                <ul class="author-share">
                                                    <li>
                                                        <a
                                                            href="http://www.facebook.com/sharer.php?u={{ url('https://www.opportunityindia.com/article/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id'])) }}">
                                                            <img src="{{ url('newhomepage/assets/img/facebookx2.png') }}"
                                                                alt="Facebook">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://twitter.com/share?url={{ url('https://www.opportunityindia.com/article/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id'])) }}">
                                                            <img src="{{ url('newhomepage/assets/img/twitterx2.png') }}"
                                                                alt="twitter">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ url('https://www.opportunityindia.com/article/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id'])) }}">
                                                            <img src="{{ url('newhomepage/assets/img/linkedinx2.png') }}"
                                                                alt="linkedin">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                <div class="news-min-section">
                                    <ul class="news-min-section-info">
                                        @for ($i = 1; $i <= 4; $i++)
                                            <li>
                                                <div
                                                    class="row
                                                      justify-content-center">
                                                    <div
                                                        class="modified-col
                                                         col-xs-4 col-sm-4
                                                         col-md-4 col-lg-4
                                                         col-xl-4">
                                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                            target="_blank">
                                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                                                class="img-z-fluid"
                                                                alt="{{ $articles['article'][$i]['title'] }}">
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="modified-col
                                                         col-xs-8 col-sm-8
                                                         col-md-8 col-lg-8
                                                         col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    target="_blank">{{ $articles['article'][$i]['title'] }}</a>
                                                            </p>
                                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                class="read-more"
                                                                target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}</a>
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
            <div
                class="modified-col col-xs-12 col-sm-12
                              col-md-6
                              col-xl-6
                              col-lg-6">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2>
                    <div class="view-all-main-section">
                        <a target="_blank"
                            href="{{ Request::segment(1) == 'hi' ? 'https://www.opportunityindia.com/hindi/tag/साक्षात्कार/' : 'https://www.opportunityindia.com/english/tag/interview/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                    </div>
                    <div class="card card-m card-ptb-20">
                        <div class="row justify-content-center">
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                <div class="card-news-info">
                                    <div class="news-overlay">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                            target="_blank">
                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][5]['image_path']) }}"
                                                class="img-b" alt="{{ $articles['article'][5]['title'] }}">
                                        </a>
                                    </div>
                                    <div class="card-news-summry">
                                        <h3><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                                target="_blank">{{ $articles['article'][5]['title'] }}</a></h3>
                                        <p>
                                            {{ strip_tags(\Illuminate\Support\Str::words($articles['article'][5]['content'], 20, ' ...')) }}
                                        </p>
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                            target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}</a>
                                        <div
                                            class="d-flex
                                                   author-section">
                                            <div class="author-info">
                                                <ul class="author-share">
                                                    <li>
                                                        <a
                                                            href="http://www.facebook.com/sharer.php?u={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/facebookx2.png') }}"
                                                                alt="Facebook">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://twitter.com/share?url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/twitterx2.png') }}"
                                                                alt="twitter">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/linkedinx2.png') }}"
                                                                alt="linkedin">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="author-info"> --}}
                                            {{-- -{{$newsInsights[0]['auther']}} --}}
                                            {{-- <br>{{($newsInsights[0]['type'] == 'News')? 'News ': 'Article '}}Editor --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                <div class="news-min-section">
                                    <ul class="news-min-section-info">
                                        @for ($i = 6; $i <= 9; $i++)
                                            <li>
                                                <div
                                                    class="row
                                                      justify-content-center">
                                                    <div
                                                        class="modified-col
                                                         col-xs-4 col-sm-4
                                                         col-md-4 col-lg-4
                                                         col-xl-4">
                                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                            target="_blank">
                                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                                                class="img-z-fluid"
                                                                alt="{{ $articles['article'][$i]['title'] }}">
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="modified-col
                                                         col-xs-8 col-sm-8
                                                         col-md-8 col-lg-8
                                                         col-xl-8">
                                                        <div class="post-news-text">
                                                            <p><a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    target="_blank">{{ $articles['article'][$i]['title'] }}</a>
                                                            </p>
                                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                class="read-more"
                                                                target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}</a>
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
