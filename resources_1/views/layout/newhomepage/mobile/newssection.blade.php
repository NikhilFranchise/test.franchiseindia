<section class="franchise-news section-30" id="franchise-news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                <div class="news-section-main-insight">
                    <div class="section-ptb">
                        <h2>
                            <h2>{{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
                            </h2>
                        </h2>
                        <div class="view-all-main-section">
                            <a target="_blank"
                                href="{{ Request::segment(1) == 'hi' ? 'https://www.opportunityindia.com/hindi/' : 'https://www.opportunityindia.com/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="row">
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="brand-newsx-image-section">
                                    <div class="brand-main-section">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank">
                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrlForMobile($articles['article'][0]['image_path']) }}"
                                                class="img-b
                                                      img-border"
                                                alt="{{ $articles['article'][0]['title'] }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="newsx-main-bg">

                                    <div class="news-headin-section">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                            target="_blank">
                                            <h2>{{ $articles['article'][0]['title'] }}</h2>
                                        </a>
                                        <p>{{ strip_tags(Str::limit($articles['article'][0]['content'], 140, '...')) }}
                                        </p>
                                        <div class="news-konwmore">
                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                                target="_blank">
                                                {{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}
                                            </a>
                                        </div>
                                        <div
                                            class="d-flex
                                                   author-section">
                                            <div class="author-info">
                                                <ul class="author-share">
                                                    <li>
                                                        <a
                                                            href="http://www.facebook.com/sharer.php?u={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/facebookx2.png') }}"
                                                                alt="Facebook">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://twitter.com/share?url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/twitterx2.png') }}"
                                                                alt="twitter">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}">
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
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="small-newsx-post">
                                    <ul class="small-newsx-post-main">
                                        @for ($i = 1; $i < 4; $i++)
                                            <li>
                                                <div class="newx-post-smalli">
                                                    <div class="d-flex">
                                                        <div class="brand-newsx-small-image-section">
                                                            <div class="brand-main-section">
                                                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                                                    alt="{{ $articles['article'][$i]['id'] }}"> <img
                                                                        src="{{ \App\Http\Controllers\NewHomePageController::getImageUrlForMobile($articles['article'][$i]['image_path']) }}"
                                                                        class="img-b
                                                                    img-border">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="newsx-samll-post-summry">
                                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                target="_blank">
                                                                <h3>{{ $articles['article'][$i]['title'] }}</h3>
                                                            </a>
                                                            <div class="know-more-smallpost">
                                                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    target="_blank">
                                                                    {{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}
                                                                </a>
                                                            </div>
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
            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                <div class="news-section-main-insight">
                    <div class="section-ptb">
                        <h2>
                            {{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}
                        </h2>
                        <div class="view-all-main-section">
                            <a target="_blank"
                                href="https://www.franchiseindia.com/content/interview/">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="row">
                            <div
                                class="modified-col col-xs-12
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="brand-newsx-image-section">
                                    <div class="brand-main-section">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}"
                                            target="_blank">
                                            <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrlForMobile($articles['article'][4]['image_path']) }}"
                                                class="img-b
                                                      img-border"
                                                alt="{{ $articles['article'][4]['title'] }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="newsx-main-bg">

                                    <div class="news-headin-section">
                                        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}"
                                            target="_blank">
                                            <h2>{{ $articles['article'][4]['title'] }}</h2>
                                        </a>
                                        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles['article'][4]['content'], 25, ' ...')) }}
                                        </p>
                                        <div class="news-konwmore">
                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}"
                                                target="_blank">
                                                {{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}
                                            </a>
                                        </div>
                                        <div
                                            class="d-flex
                                                   author-section">
                                            <div class="author-info">
                                                <ul class="author-share">
                                                    <li>
                                                        <a
                                                            href="http://www.facebook.com/sharer.php?u={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/facebookx2.png') }}"
                                                                alt="Facebook">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://twitter.com/share?url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}">
                                                            <img src="{{ url('newhomepage/assets/img/twitterx2.png') }}"
                                                                alt="twitter">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][4]['title'], $articles['article'][4]['id']) }}">
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
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="small-newsx-post">
                                    <ul class="small-newsx-post-main">
                                        @for ($i = 5; $i < 8; $i++)
                                            <li>
                                                <div class="newx-post-smalli">
                                                    <div class="d-flex">
                                                        <div class="brand-newsx-small-image-section">
                                                            <div class="brand-main-section">
                                                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    alt="{{ $articles['article'][$i]['id'] }}"> <img
                                                                        src="{{ \App\Http\Controllers\NewHomePageController::getImageUrlForMobile($articles['article'][$i]['image_path']) }}"
                                                                        class="img-b
                                                                    img-border">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="newsx-samll-post-summry">
                                                            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                target="_blank">
                                                                <h3>{{ $articles['article'][$i]['title'] }}</h3>
                                                            </a>
                                                            <div class="know-more-smallpost">
                                                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                                                    target="_blank">
                                                                    {{ Request::segment(1) == 'hi' ? 'अधिक पढ़ें' : 'Read More' }}
                                                                </a>
                                                            </div>
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
</section>
