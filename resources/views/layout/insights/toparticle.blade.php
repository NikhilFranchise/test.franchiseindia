<style>
    .conblk {
        padding-left: 10px;
    }
</style>
<div class="headblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        @if (App::getLocale() == 'en')
            <h1 class="mainhead">Opportunities. Growth.Trends. Business</h1>
        @else
            <h1 class="mainhead">अवसर.विकास.रुझान.व्यवसाय</h1>
        @endif
    </div>
    </div>
    </div>
</div>
<div class="topblk">
    <div class="container">
        <div class="row">
            @foreach ($homeArticle as $insightArticle)
                @php
                    $locale = App::getLocale();
                    $url = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($insightArticle['insight_type']) .
                        '/' . $insightArticle['slug'] . '.' . $insightArticle['news_id'];
                @endphp

                <div class="col-xs-12 col-sm-12 col-md-7 topmod1">
                    <div class="topimgbl">
                        <img src="{{ \App\Http\Controllers\InsightsController::createimgurl($insightArticle['image']) }}" alt="{{ $insightArticle['title'] . ' image' }}" />
                        <div class="overlay">
                            @foreach ($insightArticle->category as $cat)
                                <div class="topcat">{{ $cat->catname }}</div>
                            @endforeach

                            <div class="tophead">
                                <a href="{{ $url }}">{{ $insightArticle['title'] }}</a>
                            </div>
                            <div class="toptxt">{{ $insightArticle->shortDesc }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-5 topmod2">
                @if (App::getLocale() == 'en')
                <h2 class="subhead">Top Trending Stories</h2>
                @else
                <h2 class="subhead">रुझान वाले प्रमुख समाचार (लेख)</h2>

                @endif
                <ul class="filist">
                    @foreach ($topstories as $topArticles)
                        @php
                          //  $image2 = Config('constants.awsS3Url') . $topArticles['image'];
                            $url2 = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($topArticles['insight_type']) .
                                '/' . $topArticles['slug'] . '.' . $topArticles['news_id'];
                        @endphp

                        <li>
                            <div class="imgbl">
                                <a href="{{ $url2 }}"><img src="{{ \App\Http\Controllers\InsightsController::createimgurl($topArticles['image']) }}"
                                        alt="{{ $topArticles->title . ' image' }}" /></a>
                            </div>
                            <div class="conblk">
                                @foreach ($topArticles->category as $cat)
                                    <div class="tagl">{{ $cat->catname }}</div>
                                @endforeach
                                <div class="hname">
                                    <a href="{{ $url2 }}">{{ $topArticles->title }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
