<section class="franchise-insights">
    <div class="heading-link">
        <h2 class="brands-head">
            {{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज के बारे में गहन जानकारियां और खबरें' : 'Franchise Insights and News' }}
        </h2><a target="_blank"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.opportunityindia.com/hindi/' : 'https://www.opportunityindia.com/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank">
                <img loading="lazy"
                    src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][0]['image_path']) }}"
                    alt="{{ $articles['article'][0]['title'] }}" width="295" height="165" loading="lazy"></a>

        </div>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
            target="_blank">
            <h2>{{ $articles['article'][0]['title'] }}</h2>
        </a>
        <p> {{ strip_tags(\Illuminate\Support\Str::words($articles['article'][0]['content'], 20, ' ...')) }}
        </p>
        <div class="news-konwmore">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                target="_blank"></a>
        </div>
        {{--  <ul class="author-share">
            <li>
                <a
                    href="http://www.facebook.com/sharer.php?u=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/facebookx2.webp"
                        alt="Facebook" width="16" height="16">
                </a>
            </li>
            <li>
                <a
                    href="https://twitter.com/share?url=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/twitterx2.webp"
                        alt="twitter" width="16" height="16">
                </a>
            </li>
            <li>
                <a
                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/linkedinx2.webp"
                        alt="linkedin" width="16" height="16">
                </a>
            </li>
        </ul>  --}}

        <ul class="small-newsx-post-main">
            @for ($i = 1; $i <= 4; $i++)
                <li>
                    <div class="newx-post-smalli">
                        <div class="d-flex">
                            <div class="brand-newsx-small-image-section">
                                <div class="brand-main-section">
                                    <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][0]['title'], $articles['article'][0]['id']) }}"
                                        target="_blank"><img
                                            src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                            alt="Preview image for article'{{ $articles['article'][$i]['title'] }}'"
                                            width="80" height="45" loading="lazy"></a>
                                </div>
                            </div>
                            <div class="newsx-samll-post-summry">
                                <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                    target="_blank">{{ $articles['article'][$i]['title'] }}</a></p><a
                                    href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                    class="read-more" target="_blank"></a>

                            </div>
                        </div>
                    </div>
                </li>
            @endfor
            {{--  <li>
                <div class="newx-post-smalli">
                    <div class="d-flex">
                        <div class="brand-newsx-small-image-section">
                            <div class="brand-main-section">
                                <a aria-label="Mintobay Redefines Fashion by Bringing Global"
                                    href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                    alt="35911">
                                    <img loading="lazy"
                                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/opp.webp"
                                        alt="Opportunity India" width="80" height="45">
                                </a>
                            </div>
                        </div>
                        <div class="newsx-samll-post-summry">
                            <a href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                target="_blank">
                                <h3>Mintobay Redefines Fashion by Bringing Global Trends to Indian Market the
                                    Fastest</h3>
                            </a>
                            <div class="know-more-smallpost">
                                <a aria-label="Mintobay Redefines Fashion by Bringing Global"
                                    href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                    target="_blank">
                                    Read More about Mintobay Redefines Fashion by Bringing Global
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="newx-post-smalli">
                    <div class="d-flex">
                        <div class="brand-newsx-small-image-section">
                            <div class="brand-main-section">
                                <a aria-label="Sheffield School to open over 50 + branches"
                                    href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                    alt="35910">
                                    <img loading="lazy"
                                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/opp.webp"
                                        alt="Opportunity India" width="80" height="45">
                                </a>
                            </div>
                        </div>
                        <div class="newsx-samll-post-summry">
                            <a aria-label="Sheffield School to open over 50 + branches"
                                href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                target="_blank">
                                <h3>Sheffield School to open over 50 + branches in the next 2 years</h3>
                            </a>
                            <div class="know-more-smallpost">
                                <a href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                    target="_blank">
                                    Read More about Sheffield School
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>  --}}
        </ul>
    </div>

</section>
<section class="franchise-insights news">
    <div class="heading-link">
        <h2 class="brands-head">{{ Request::segment(1) == 'hi' ? 'साक्षात्कार' : 'Interviews' }}</h2><a target="_blank"
            href="{{ Request::segment(1) == 'hi' ? 'https://www.opportunityindia.com/hindi/tag/साक्षात्कार/' : 'https://www.opportunityindia.com/english/tag/interview/' }}">{{ Request::segment(1) == 'hi' ? 'सभी देखें' : 'View All' }}</a>
    </div>
    <div class="news-wrap">
        <div class="news-thumb">
            <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                aria-label="Read more about Musashi Seimitsu and Log9 Materials" target="_blank">
                <img src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][5]['image_path']) }}"
                    alt="{{ $articles['article'][5]['title'] }}" width="295" height="165" loading="lazy"></a>
        </div>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
            target="_blank" aria-label="Read more about Musashi Seimitsu and Log9 Materials">
            <h2>{{ $articles['article'][5]['title'] }}</h2>
        </a>
        {{--  <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}" target="_blank">{{ $articles['article'][5]['title'] }}</a>  --}}
        <p>{{ strip_tags(\Illuminate\Support\Str::words($articles['article'][5]['content'], 20, ' ...')) }}</p>
        <a href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][5]['title'], $articles['article'][5]['id']) }}"
                                    target="_blank"></a>
        {{--  <div class="news-konwmore">
            <a aria-label="Read more about Musashi Seimitsu and Log9 Materials"
                href="https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917"
                target="_blank">Learn about the collaboration between Musashi Seimitsu and Log9 Materials</a>
        </div>  --}}
        {{--  <ul class="author-share">
            <li>
                <a
                    href="http://www.facebook.com/sharer.php?u=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/facebookx2.webp"
                        alt="Facebook" width="16" height="16">
                </a>
            </li>
            <li>
                <a
                    href="https://twitter.com/share?url=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/twitterx2.webp"
                        alt="twitter" width="16" height="16">
                </a>
            </li>
            <li>
                <a
                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.opportunityindia.com/article/musashi-seimitsu-and-log9-materials-join-forces-to-transform-ev-powertrains-35917">
                    <img loading="lazy"
                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/linkedinx2.webp"
                        alt="linkedin" width="16" height="16">
                </a>
            </li>
        </ul>  --}}

        <ul class="small-newsx-post-main">
            @for ($i = 6; $i <= 9; $i++)
            <li>
                <div class="newx-post-smalli">
                    <div class="d-flex">
                        <div class="brand-newsx-small-image-section">
                            <div class="brand-main-section">
                                <a aria-label="Mercedes-Benz India Adds Two New Centres"
                                    href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"><img
                                        src="{{ \App\Http\Controllers\NewHomePageController::getImageUrl($articles['article'][$i]['image_path']) }}"
                                        alt="{{ $articles['article'][$i]['title'] }}" width="80" height="45" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="newsx-samll-post-summry">
                            <a aria-label="Mercedes-Benz India Adds Two New Centres"
                                href="{{ 'https://www.opportunityindia.com/' . \App\Http\Controllers\NewHomePageController::getSlug($articles['article'][$i]['title'], $articles['article'][$i]['id']) }}"
                                target="_blank">
                                <h3>{{ $articles['article'][$i]['title'] }}</h3>
                            </a>
                            {{--  <div class="know-more-smallpost">
                                <a href="https://www.opportunityindia.com/article/mercedes-benz-india-adds-two-new-centres-to-sustainability-garage-35912"
                                    target="_blank">
                                    Read More about Mercedes-Benz India Adds Two New Centres
                                </a>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </li>
            @endfor
            {{--  <li>
                <div class="newx-post-smalli">
                    <div class="d-flex">
                        <div class="brand-newsx-small-image-section">
                            <div class="brand-main-section">
                                <a aria-label="Mintobay Redefines Fashion by Bringing Global"
                                    href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                    alt="35911">
                                    <img loading="lazy"
                                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/opp.webp"
                                        alt="Opportunity India" width="80" height="45">
                                </a>
                            </div>
                        </div>
                        <div class="newsx-samll-post-summry">
                            <a href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                target="_blank">
                                <h3>Mintobay Redefines Fashion by Bringing Global Trends to Indian Market the
                                    Fastest</h3>
                            </a>
                            <div class="know-more-smallpost">
                                <a aria-label="Mintobay Redefines Fashion by Bringing Global"
                                    href="https://www.opportunityindia.com/article/mintobay-redefines-fashion-by-bringing-global-trends-to-indian-market-the-fastest-35911"
                                    target="_blank">
                                    Read More about Mintobay Redefines Fashion by Bringing Global
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="newx-post-smalli">
                    <div class="d-flex">
                        <div class="brand-newsx-small-image-section">
                            <div class="brand-main-section">
                                <a aria-label="Sheffield School to open over 50 + branches"
                                    href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                    alt="35910">
                                    <img loading="lazy"
                                        src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/opp.webp"
                                        alt="Opportunity India" width="80" height="45">
                                </a>
                            </div>
                        </div>
                        <div class="newsx-samll-post-summry">
                            <a aria-label="Sheffield School to open over 50 + branches"
                                href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                target="_blank">
                                <h3>Sheffield School to open over 50 + branches in the next 2 years</h3>
                            </a>
                            <div class="know-more-smallpost">
                                <a href="https://www.opportunityindia.com/article/sheffield-school-to-open-over-50-branches-in-the-next-2-years-35910"
                                    target="_blank">
                                    Read More about Sheffield School
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>  --}}
        </ul>
    </div>

</section>
