
@extends('layout.newArticalMaster')
@section('seoTitle', ($kicker->name).' Articles and Information - Franchise India')
@section('seoDesc',  ($kicker->name).' Articles -  '. $articles[0]['short_desc'])
@section('seoKeywords', $kicker->name.' latest articles, information about '.$kicker->name)

{{--<div class="innerloginblk">--}}
{{--    @include('includes.login-events')--}}
{{--</div>--}}
@section('content')

    <div class="maininnver">
        <div class="container">
            <h1 class="cathead">{{$kicker->name}}</h1>
        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach($articles as $article)
                        @if($loop->index < 5)
                            @php
                                $art = new \App\Http\Controllers\NewArticleController();
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->image;
                                $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article->hindi_author,'-');
                                $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article->slug.'.'.$article->content_id;
                                $lenght = strlen($article['hindi_content']);
                                $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'].'/'.$article['tag_id'];
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;
                            @endphp
                    <li>
                        <div class="artimgblk">
                            <a href="{{ $url }}">
                                <img src="{{$image}}" alt="{{$article['name']}}">
                            </a>
                        </div>
                        <div class="artcontent">
                            <div class="catname">
                                <a href="{{$kicker}}">
                                    {{$article['name']}}
                                </a>
                            </div>
                            <div class="haedname"><a href="{{$url}}">{{ empty($article['home_title']) ? $article['hindi_title'] : $article['home_title'] }}</a></div>
                            <div class="authblk cot">
                                <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->hindi_author))
                                                {{$article->hindi_author}}
                                            @endif
                                        </a>
                                    </span>
                                    @php
                                    echo date('F d Y', strtotime($article['created_at'])); //June 01 2017
                                    @endphp - {{(int)$time}} min read
                                </div>
                            </div>
                            <div class="stext">
                                @if(empty($article['short_desc']))
                                    {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                @else
                                    {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
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
                                $image  = Config('constants.awsS3Url').$article->image;
                                $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article->hindi_author,'-');
                                $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article->slug.'.'.$article->content_id;
                                $lenght = strlen($article['hindi_content']);
                                $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'];
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;
                            @endphp
                            <li>
                                <div class="artimgblk">
                                    <a href="{{ $url }}">
                                        <img src="{{$image}}" alt="{{$article['name']}}">
                                    </a>
                                </div>
                                <div class="artcontent">
                                    <div class="catname">
                                        <a href="{{$kicker}}">
                                            {{$article['name']}}
                                        </a>
                                    </div>
                                    <div class="haedname"><a href="{{$url}}">{{ empty($article['home_title']) ? $article['hindi_title'] : $article['home_title'] }}</a></div>
                                    <div class="authblk cot">
                                        <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                        <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->hindi_author))
                                                {{$article->hindi_author}}
                                            @endif
                                        </a>
                                    </span>
                                            @php
                                                echo date('F d Y', strtotime($article['created_at'])); //June 01 2017
                                            @endphp - {{(int)$time}} min read
                                        </div>
                                    </div>
                                    <div class="stext">
                                        @if(empty($article['short_desc']))
                                            {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                        @else
                                            {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
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