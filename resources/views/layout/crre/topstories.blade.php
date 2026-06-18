@extends('layout.insights.master')
@section('content')
<div class="maininnver homeh">
    <div class="container">
      
        <h1 class="cathead">Top Trending Stories</h1>
       
    </div>

    <div class="listblk">
        <div class="container">
            <ul class="artilsit">
                @foreach($insightstories as $article) 
                @if($loop->index < 10) 
                @php 
                 $site = Config('constants.newsArr.' . $article->news_type); 
                 $kicker = Config('constants.MainDomain') . '/insights/kicker/' . $article->urlKicker;
                 $image = Config('constants.awsS3Url') . $article->image; 
                 $url = Config('constants.MainDomain') . '/insights/' . strtolower($article->insight_type) . '/' . $article->slug . '.' . $article->news_id; 
                 if(!empty($article->author_image)){ $author_image =
                'https://franchiseindia.s3.ap-south-1.amazonaws.com'. $author_details->author_image; 
                }else{ 
                $author_image = url('images/defaultuser.png'); 
                } 
                @endphp
                <li>
                    <div class="artimgblk">
                        <a href="{{$url}}"><img src="{{$image}}" alt="{{$article->title}}" /></a>
                    </div>
                    <div class="artcontent">
                        <div class="catname"><a href="{{$kicker}}">{{ucwords($article->kicker)}}</a></div>
                        <div class="haedname"><a href="{{$url}}">{{$article->title}}</a></div>
                        <div class="authblk cot">
                            <div class="autimg"><img src="{{$author_image}}" alt="{{$article->title}}" /></div>
                            <div class="autinfo">
                                <span><a href="">{{$article->author_title}}</a></span>
                                {{date('M d, Y',strtotime($article->created_at))}} - {{\App\Http\Controllers\InsightsController::calculateReadTime($article)}} min read
                            </div>
                        </div>
                        <div class="stext">
                            {{strip_tags(\Illuminate\Support\Str::words($article->content, 55 , ' ...'))}}
                        </div>
                        <div class="scbk">
                            <div class="cmtblk"><img src="{{ url('images/smallcomment.svg') }}" alt="" /></div>
                            <div class="shrblk">
                                <span class="inshrblk">
                                    <a href="#">
                                        <img src="{{ url('images/smallshare.svg') }}" class="inimg" />Share
                                        <div class="sfv">
                                            <div class="innersfv" onclick="window.open('https://www.facebook.com/FranchiseIndiaMedia','_blank')"><img src="{{ url('images/facebookcard.svg') }}" /></div>
                                            <div class="innersfv" onclick="window.open('https://twitter.com/FranchiseIndia','_blank')"><img src="{{ url('images/twittercard.svg') }}" /></div>
                                            <div class="innersfv" onclick="window.open('https://www.instagram.com/franchiseindia_/','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" /></div>
                                            <div class="innersfv" onclick="window.open('https://www.youtube.com/user/FranchiseIndia','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" /></div>
                                        </div>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>

              
                @endif 
                @endforeach
            </ul>
        </div>
    </div>

    <!-- mag block strat  -->
    @include("layout.insights.magblock")
    <!-- mag block end   -->

    <!-- another list start here   -->
    <div class="listblk">
       
    </div>

    <!-- another list end here  -->

    

    @include("layout.insights.brandlist")
</div>
@endsection