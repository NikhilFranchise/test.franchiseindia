<style>
    .conblk {
        padding-left: 10px;
    }
</style>
<div class="headblk">
    <div class="container">
        
        {{-- <h1 class="mainhead">Create. Getting Started. Insights. Growth</h1> --}}
       
        <h1 class="mainhead">Opportunities. Growth.Trends. Business</h1>
    </div>
</div>
<div class="topblk">
    <div class="container">
        <div class="row">
            @foreach($homeArticle as $insightArticle) 
                @php 
                    $image1 = Config('constants.awsS3Url') . $insightArticle['image']; 
                    $url = Config('constants.MainDomain') . '/insights/' . strtolower($insightArticle['insight_type']) . '/' . $insightArticle['slug'] . '.' . $insightArticle['news_id']; 
                @endphp

            <div class="col-xs-12 col-sm-12 col-md-7 topmod1">
                <div class="topimgbl">
                    <img src="{{ $image1 }}" alt="{{ $insightArticle['title'].' image' }}" />
                    <div class="overlay">
                        @foreach ($insightArticle->category as $cat)
                        <div class="topcat">{{$cat->catname}}</div>
                        @endforeach

                        <div class="tophead">
                            <a href="{{ $url }}">{{ $insightArticle['title'] }}</a>
                        </div>
                        <div class="toptxt">{{$insightArticle->shortDesc}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-5 topmod2">
                <h2 class="subhead">Top Trending Stories</h2>
                <ul class="filist">
                    @foreach($topstories as $topArticles) 
                            @php 
                                $image2 = Config('constants.awsS3Url') . $topArticles['image']; 
                                $url2 = Config('constants.MainDomain') . '/insights/' . strtolower($topArticles['insight_type']) . '/' . $topArticles['slug'] . '.' . $topArticles['news_id'];
                            @endphp 
                        {{-- @foreach($topArticles->author as $author) 
                            @php $authorUrl = Config('constants.MainDomain') . '/author/' . $author->slug .'-' . $author->author_id; 
                                if(!empty($author->image))
                                    { $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'. $author->image; 
                                }else{
                                    $author_image = url('images/defaultuser.png'); } 
                            @endphp 
                        @endforeach --}}

                        <li>
                            <div class="imgbl">
                                <a href="{{ $url2 }}"><img src="{{ $image2 }}" alt="{{$topArticles->title.' image'}}" /></a>
                            </div>
                            <div class="conblk">
                            @foreach ($topArticles->category as $cat)
                                <div class="tagl">{{$cat->catname}}</div>
                            @endforeach
                                <div class="hname">
                                    <a href="{{ $url2 }}">{{$topArticles->title}}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
