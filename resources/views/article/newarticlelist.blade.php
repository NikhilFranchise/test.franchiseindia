
@extends('layout.newArticalMaster')
@section('seoTitle', ucwords($kicker).' Articles and Information - Franchise India')
@section('seoDesc',  ucwords($kicker).' Articles -  '. $articles[0]['shortDesc'])
@section('seoKeywords', $kicker.' latest articles, information about '.$kicker)

{{--<div class="innerloginblk">--}}
{{--    @include('includes.login-events')--}}
{{--</div>--}}
@section('content')

    <div class="maininnver">
        <div class="container">
            <h1 class="cathead">{{$kicker}}</h1>
        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach($articles as $article)
                        @if($loop->index < 5)
                            @php
                                $art = new \App\Http\Controllers\NewArticleController();
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->content_image;
                                $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article->author,'-');
                                $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                                $url    = Config('constants.MainDomain').'/newcontent/'.$article->slug.'.'.$article->content_id;
                                $lenght = strlen($article['content']);
                                $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;
                            @endphp
                    <li>
                        <div class="artimgblk">
                            <a href="{{ $url }}">
                                <img src="{{$image}}" alt="{{$article['kicker']}}">
                            </a>
                        </div>
                        <div class="artcontent">
                            <div class="catname">
                                <a href="{{$kicker}}">
                                    {{$article['kicker']}}
                                </a>
                            </div>
                            <div class="haedname"><a href="{{$url}}">{{ empty($article['homeTitle']) ? $article['title'] : $article['homeTitle'] }}</a></div>
                            <div class="authblk cot">
                                <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->author))
                                                {{$article->author}}
                                            @endif
                                        </a>
                                    </span>
                                    @php
                                    echo date('F d Y', strtotime($article['time'])); //June 01 2017
                                    @endphp - {{(int)$time}} min read
                                </div>
                            </div>
                            <div class="stext">
                                @if(empty($article['shortDesc']))
                                    {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 450)))}}..
                                @else
                                    {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 450)))}}..
                                @endif
                            </div>
                            <div class="scbk">
                                <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                </div>
                                <div class="shrblk">

        <span class="inshrblk"><a data-id="{{$article->content_id}}" href="#"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
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
                    </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </div>

        <!-- mag block strat  -->

        @include('includes.article1.magblock')
    <!-- mag block end   -->

        <!-- another list start here   -->
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach($articles as $article)
                        @if($loop->index > 5 && $loop->index < 10)
                            @php
                                $art = new \App\Http\Controllers\NewArticleController();
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->content_image;
                                 $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article->author,'-');
                                $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                                $url    = Config('constants.MainDomain').'/newcontent/'.$article->slug.'.'.$article->content_id;
                                $lenght = strlen($article['content']);
                                $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;
                            @endphp
                            <li>
                                <div class="artimgblk">
                                    <a href="{{ $url }}">
                                        <img src="{{$image}}" alt=" {{$article['kicker']}}">
                                    </a>
                                </div>
                                <div class="artcontent">
                                    <div class="catname">
                                        <a href="{{$kicker}}">
                                            {{$article['kicker']}}
                                        </a>
                                    </div>
                                    <div class="haedname"><a href="{{$url}}">{{ empty($article['homeTitle']) ? $article['title'] : $article['homeTitle'] }}</a></div>
                                    <div class="authblk cot">
                                        <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                        <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->author))
                                                {{$article->author}}
                                            @endif
                                        </a>
                                    </span>
                                            @php
                                                echo date('F d Y', strtotime($article['time'])); //June 01 2017
                                            @endphp - {{(int)$time}} min read
                                        </div>
                                    </div>
                                    <div class="stext">
                                        @if(empty($article['shortDesc']))
                                            {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 450)))}}..
                                        @else
                                            {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 450)))}}..
                                        @endif
                                    </div>
                                    <div class="scbk">
                                        <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                        </div>
                                        <div class="shrblk">

        <span class="inshrblk"><a data-id="{{$article->content_id}}" href="#"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
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
                            </li>
                        @endif
                    @endforeach

                </ul>
               {{$articles->links("pagination::bootstrap-4")}}
            </div>

        </div>
        <!-- another list end here  -->
        @include('includes.article1.brandlist')
    </div>
@endsection