@extends('layout.insights.master')
@section('content')

<div class="maininnver homeh">
    <div class="container">
      
        <h1 class="cathead">Trending Stories</h1>
       
    </div>

    <div class="listblk">
        <div class="container">
            <ul class="artilsit">
                @foreach($trendstories as $article) 
                @php 
                 
                
                 $image = Config('constants.awsS3Url') . $article->image; 
                 $url = Config('constants.MainDomain') . '/insights/' . strtolower($article->insight_type) . '/' . $article->slug . '.' . $article->news_id;
                 @endphp
                 @foreach($article->author as $author) 
                 @php
                 if(!empty($author->image)){ 
                    $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'. $author->image; 
                }else{ 
                    $author_image = url('images/defaultuser.png'); 
                } 
                    $authorname = $author->title;
                    $authorUrl = Config('constants.MainDomain') . '/author/' . $author->slug . '-' . $author->author_id;
                @endphp
                @endforeach
                <li>
                    <div class="artimgblk">
                        <a href="{{$url}}"><img src="{{$image}}" alt="{{$article->title. ' image'}}" /></a>
                    </div>
                    <div class="artcontent">
                        
                        <div class="haedname"><a href="{{$url}}">{{$article->title}}</a></div>
                        <div class="authblk cot">
                            <div class="autimg"><img src="{{$author_image}}" alt="{{$authorname}}" /></div>
                            <div class="autinfo">
                                <span><a href="{{$authorUrl}}">{{$authorname}}</a></span>
                                {{date('M d, Y',strtotime($article->created_at))}} - {{\App\Http\Controllers\InsightsController::calculateReadTime($article)}} min read
                            </div>
                        </div>
                        <div class="stext">
                            {{html_entity_decode(strip_tags(\Illuminate\Support\Str::words($article->content, 55 , ' ...')), ENT_QUOTES | ENT_HTML5 ,'UTF-8')}}
                        </div>
                        <div class="scbk">
                            <div class="cmtblk"><img src="{{ url('insights/images/smallcomment.svg') }}" alt="" /></div>
                            <div class="shrblk">
                                <span class="inshrblk">
                                    <a href="#">
                                        <img src="{{ url('insights/images/smallshare.svg') }}" class="inimg" />Share
                                        <div class="sfv">
                                            <div class="innersfv" onclick="window.open('https://www.facebook.com/FranchiseIndiaMedia','_blank')"><img src="{{ url('insights/images/facebookcard.svg') }}" /></div>
                                            <div class="innersfv" onclick="window.open('https://twitter.com/FranchiseIndia','_blank')"><img src="{{ url('insights/images/twittercard.svg') }}" /></div>
                                            <div class="innersfv" onclick="window.open('https://www.instagram.com/franchiseindia_/','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" /></div>
                                            <div class="innersfv" onclick="window.open('https://www.youtube.com/user/FranchiseIndia','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" /></div>
                                        </div>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                
            </ul>
            <div class="d-felx justify-content-center">
                {{ $trendstories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- mag block strat  -->
    @include("layout.insights.magblock")
    <!-- mag block end   -->

    <!-- another list start here   -->
    <div class="listblk">
       
    </div>

    @include("layout.insights.brandlist")
</div>

@endsection