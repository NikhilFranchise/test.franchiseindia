
@extends('layout.newArticalMaster')
@section('seoTitle', 'Video and Podcast Articles and Information - Franchise India')
@section('seoDesc',  'Video and Podcast Articles -  '. $videoArticles[0]['description'])
@section('seoKeywords', 'Video and Podcast latest articles, information about Video and Podcast')

{{--<div class="innerloginblk">--}}
{{--    @include('includes.login-events')--}}
{{--</div>--}}
@section('content')
        <div class="maininnver">
    <div class="container">
        <h1 class="cathead">{{ (Request::segment(1) == 'hi') ? 'वीडियो और पॉडकास्ट' : 'Videos & Podcast' }}</h1>
    </div>

    <div class="listblk">
        <div class="container">
            <ul class="artilsit">
                @foreach($videoArticles as $article)
                    @if($loop->index < 5)
                        @php
                            $image  = Config('constants.youtubeImageUrl');
                            $url    = "https://video.franchiseindia.com/".str_slug(strtolower($article['title']), '-')."/".$article['videoID'];
                            $kicker = "https://video.franchiseindia.com/".str_slug(strtolower($article['title']), '-')."/".$article['videoID'];
                        @endphp
                <li>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <a href="{{ $url }}">
                                <div class="artimgblk">
                                    <span class="overnew"></span>
                                    <span class="artimgblk-yt"><img src="{{asset('article/images/play-button.svg')}}"></span>
                                    <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="artcontent myartlist">
                                <div class="haedname"><a href="{{$url}}">{{$article['title']}}</a></div>

                                <div class="myblk">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 myblk-lt col-sm-6 col-xs-6"><?php
                                            echo date('F, d Y', strtotime($article['create_date'])); //June 01 2017
                                            ?></div>
                                        <div class="col-lg-6 col-md-6 myblk-rt col-sm-6 col-xs-6"><img src="{{asset('article/assets/images/viewnew.png')}}"> <span>{{$article['views']}}</span></div>
                                    </div>
                                </div>

                                <div class="stext">
                                    @if($article->description!='')
                                        {{ \Illuminate\Support\Str::limit($article['description'], 200, $end='...')}}
                                    @endif
                                </div>
                                <div class="scbk">
                                    <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                    </div>
                                    <div class="shrblk">

       <span class="inshrblk"><a href="#" data-id="{{$article['videoID']}}"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
            <div class="sfv">
            <div class="innersfv" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u={{$url}}')"><img src="{{asset('article/images/facebookcard.svg')}}"></div>
            <div class="innersfv" onclick="javascript:window.open('http://www.twitter.com/share?url={{$url}}')"><img src="{{asset('article/images/twittercard.svg')}}"></div>
            <div class="innersfv" onclick="javascript:window.open('https://www.linkedin.com/sharing/share-offsite/?url={{$url}}')"><img src="{{asset('article/images/linkedincard.svg')}}"></div>
            <div class="innersfv" onclick="location.href='mailto:editor@franchiseindia.com'"><img src="{{asset('article/images/mailcard.svg')}}"></div>
            </div>   </a>
        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

            <div class="podcastblk">
                <div class="container">
                    <div class="comhead"><a href="https://www.thefranchisingworld.com/" target="_blank">Podcast</a> <span class="slidervall"><a href="https://www.thefranchisingworld.com/" target="_blank">View All</a></span></div>
                </div>

                <div class="container">


                    <!-- below list start here  -->
                    <ul class="podcastlist">
                        <li>
                            <div class="imgbl"><div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg">
                                </div><a href="https://www.thefranchisingworld.com/" target="_blank">
                                    <img src="http://192.168.1.96:8000/article/images/podcast/Example-2.jpg"></a>
                            </div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.thefranchisingworld.com/" target="_blank">Automobile</a></div>
                                <div class="hname"> <a href="https://www.thefranchisingworld.com/" target="_blank">What has driven auto service businesses after Covid?</a></div>
                                <div class="aname">

                                    <span class="h1w"></span> Oct 06, 2021</div>
                            </div>
                        </li>

                        <li>
                            <div class="imgbl"><div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg"></div>
                                <a href="https://www.thefranchisingworld.com/" target="_blank"><img src="http://192.168.1.96:8000/article/images/podcast/Example-4.jpg"></a></div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.thefranchisingworld.com/" target="_blank">Healthcare</a></div>
                                <div class="hname"> <a href="https://www.thefranchisingworld.com/" target="_blank">Business opportunities are endless in the healthcare industr...</a></div>
                                <div class="aname">

                                    <span class="h1w"></span> Sep 29, 2021</div>
                            </div>
                        </li>

                        <li>
                            <div class="imgbl"><div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg"></div>
                                <a href="https://www.thefranchisingworld.com/" target="_blank"><img src="http://192.168.1.96:8000/article/images/podcast/Example-6.jpg"></a></div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.thefranchisingworld.com/" target="_blank">Beauty &amp; Health</a></div>
                                <div class="hname"> <a href="https://www.thefranchisingworld.com/" target="_blank">Beauty ventures will revive the fastest</a></div>
                                <div class="aname">

                                    <span class="h1w"></span> Sep 22, 2021</div>
                            </div>
                        </li>
                    </ul>

                    <!-- below list start here  -->
                </div>
            </div>
            <div class="listblk">
                <div class="container">
                    <ul class="artilsit">
                        @foreach($videoArticles as $article)
                            @if($loop->index < 5)
                                @php
                                    $image  = Config('constants.youtubeImageUrl');
                                    $url    = "https://video.franchiseindia.com/".str_slug(strtolower($article['title']), '-')."/".$article['videoID'];
                                    $kicker = "https://video.franchiseindia.com/".str_slug(strtolower($article['title']), '-')."/".$article['videoID'];
                                @endphp
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{ $url }}">
                                                <div class="artimgblk">
                                                    <span class="overnew"></span>
                                                    <span class="artimgblk-yt"><img src="{{asset('article/images/play-button.svg')}}"></span>
                                                    <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="artcontent myartlist">
                                                <div class="haedname"><a href="{{$url}}">{{$article['title']}}</a></div>

                                                <div class="myblk">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 myblk-lt col-sm-6 col-xs-6"><?php
                                                            echo date('F, d Y', strtotime($article['create_date'])); //June 01 2017
                                                            ?></div>
                                                        <div class="col-lg-6 col-md-6 myblk-rt col-sm-6 col-xs-6"><img src="{{asset('article/assets/images/viewnew.png')}}"> <span>{{$article['views']}}</span></div>
                                                    </div>
                                                </div>

                                                <div class="stext">
                                                    @if($article->description!='')
                                                        {{ \Illuminate\Support\Str::limit($article['description'], 200, $end='...')}}
                                                    @endif
                                                </div>
                                                <div class="scbk">
                                                    <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                                    </div>
                                                    <div class="shrblk">

       <span class="inshrblk"><a href="#" data-id="{{$article['videoID']}}"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
            <div class="sfv">
            <div class="innersfv" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u={{$url}}')"><img src="{{asset('article/images/facebookcard.svg')}}"></div>
            <div class="innersfv" onclick="javascript:window.open('http://www.twitter.com/share?url={{$url}}')"><img src="{{asset('article/images/twittercard.svg')}}"></div>
            <div class="innersfv" onclick="javascript:window.open('https://www.linkedin.com/sharing/share-offsite/?url={{$url}}')"><img src="{{asset('article/images/linkedincard.svg')}}"></div>
            <div class="innersfv" onclick="location.href='mailto:editor@franchiseindia.com'"><img src="{{asset('article/images/mailcard.svg')}}"></div>
            </div>   </a>
        </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </li>
                            @endif
                        @endforeach
                    </ul>
                    {{$videoArticles->links("pagination::bootstrap-4")}}
                </div>
            </div>

            <div class="podcastblk">
                <div class="container">

                    <div class="comhead"><a href="https://www.gauravmarya.com/podcast/" target="_blank">Podcast</a> <span class="slidervall"><a href="https://www.gauravmarya.com/podcast/" target="_blank">View All</a></span></div>
                </div>

                <div class="container">


                    <!-- below list start here  -->
                    <ul class="podcastlist">
                        <li>
                            <div class="imgbl">
                                <div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg"></div>
                                <a href="https://www.gauravmarya.com/podcast/" target="_blank"><img src="http://192.168.1.96:8000/article/images/podcast/Example-1.jpg"></a></div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.gauravmarya.com/podcast/" target="_blank">Mentorship</a></div>
                                <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Franstart: Episode – 5</a></div>
                                <div class="aname">

                                    <span class="h1w"></span>Oct 06, 2021</div>
                            </div>
                        </li>

                        <li>
                            <div class="imgbl"><div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg">
                                </div>
                                <a href="https://www.gauravmarya.com/podcast/" target="_blank"><img src="http://192.168.1.96:8000/article/images/podcast/Example-3.jpg"></a>
                            </div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.gauravmarya.com/podcast/" target="_blank">Mentorship</a></div>
                                <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Franstart: Episode – 4</a></div>
                                <div class="aname">

                                    <span class="h1w"></span>Sep 29, 2021</div>
                            </div>
                        </li>

                        <li>
                            <div class="imgbl"><div class="playbtn"><img src="http://192.168.1.96:8000/article/images/play-buttongrey.svg">
                                </div><a href="https://www.gauravmarya.com/podcast/" target="_blank">
                                    <img src="http://192.168.1.96:8000/article/images/podcast/Example-5.jpg"></a></div>
                            <div class="conblk">
                                <div class="tagl"><a href="https://www.gauravmarya.com/podcast/" target="_blank">Mentorship</a></div>
                                <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Franstart: Episode -3</a></div>
                                <div class="aname">

                                    <span class="h1w"></span> Sep 22, 2021</div>
                            </div>
                        </li>

                    </ul>

                    <!-- below list start here  -->
                </div>
            </div>

</div>
@endsection

