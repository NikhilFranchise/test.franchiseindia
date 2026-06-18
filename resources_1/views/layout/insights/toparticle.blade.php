@php
    $locale = App::getLocale();
@endphp

<div class="headblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mainhead">
                    {{ $locale === 'en' ? 'Opportunities. Growth. Trends. Business' : 'अवसर.विकास.रुझान.व्यवसाय' }}
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="topblk">
    <div class="container">
        <div class="row">

            {{-- ================= MAIN FEATURED ARTICLE ================= --}}
            @foreach ($homeArticle as $article)
                @php
                    $url = insightsUrl($article, $locale);
                    $image = insightsImageUrl($article->image, $locale);
                @endphp

                <div class="col-md-7 topmod1">
                    <div class="topimgbl">

                        <img src="{{ $image }}" alt="{{ $article->title }} image">

                        <div class="overlay">

                            @foreach ($article->category as $cat)
                                <div class="topcat">
                                    <a href="{{ insightsCategoryUrl($cat) }}">{{ $cat->catname }}</a>
                                </div>
                            @endforeach

                            <div class="tophead">
                                <a href="{{ $url }}">{{ $article->title }}</a>
                            </div>

                            <div class="toptxt">{{ $article->shortDesc }}</div>

                        </div>
                    </div>
                </div>
            @endforeach

            {{-- ================= RIGHT SIDE: TOP TRENDING STORIES ================= --}}
            <div class="col-md-5 topmod2">

                <h2 class="subhead">
                    {{ $locale === 'en' ? 'Top Trending Stories' : 'रुझान वाले प्रमुख समाचार (लेख)' }}
                </h2>

                <ul class="filist">
                    @foreach ($topstories as $story)
                        @php
                            $urlStory = insightsUrl($story, $locale);
                            $imageStory = insightsImageUrl($story->image, $locale);
                        @endphp

                        <li>
                            <div class="imgbl">
                                <a href="{{ $urlStory }}">
                                    <img src="{{ $imageStory }}" alt="{{ $story->title }} image">
                                </a>
                            </div>

                            <div class="conblk">

                                @foreach ($story->category as $cat)
                                    <div class="tagl">
                                        <a href="{{ insightsCategoryUrl($cat) }}">{{ $cat->catname }}</a>
                                    </div>
                                @endforeach

                                <div class="hname">
                                    <a href="{{ $urlStory }}">{{ $story->title }}</a>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
</div>
