@extends('layout.newArticalMaster')
{{--@section('seoTitle', ucwords($au).' Articles and Information - Franchise India')--}}
{{--@section('seoDesc',  ucwords($kicker).' Articles -  '. $articles[0]['shortDesc'])--}}
{{--@section('seoKeywords', $kicker.' latest articles, information about '.$kicker)--}}
@section('content')
    <div class="maininnver homeh">

        <div class="authblk">
<div class="container">


<ul class="nabva">
<li><a href="{{url('/hi/newcontent')}}">Home</a></li>
<li>/</li>
<li>@if(!empty($checkAuthor->title)){{$checkAuthor->title}}@endif</li>
</ul>





<div class="row">
<div class="col-4 col-sm-4 col-md-3 artublk1">
<div class="imgprolist"><a href="#"><img src="{{(!empty($checkAuthor->image) ? (Config('constants.awsS3Url').$checkAuthor['image']) : (\Illuminate\Support\Facades\URL::asset('images/user1.png')))}}"></a></div>

</div>

<div class="col-8 col-sm-8 col-md-9 artublk2">
<div class="authorcontent">
<h1>@if(!empty($checkAuthor->title)){{ucwords($checkAuthor->title)}}@endif</h1>
<div class="jobprofile">@if(!empty($checkAuthor->designation)){{ucwords($checkAuthor->designation)}}@endif</div>
<p>@if(!empty($checkAuthor->text))  {{ strip_tags($checkAuthor->text)  }}@endif</p>

<div class="usblk">
<div class="usblkinner">@if($checkAuthor->facebook_profile)<a href=" {{$checkAuthor->facebook_profile}}">@endif<img src="{{asset('article/images/facebook.svg')}}"></a></div>
<div class="usblkinner">@if($checkAuthor->twitter_profile)<a href=" {{$checkAuthor->twitter_profile}}">@endif<img src="{{asset('article/images/twitter.svg')}}"></a></div>
<div class="usblkinner">@if($checkAuthor->linkedin_profile)<a href=" {{$checkAuthor->linkedin_profile}}">@endif<img src="{{asset('article/images/linkedin-2.svg')}}"></a></div>
</div>
</div>


</div>
</div>

</div>
</div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach($authorArticles as $article)
                        @if($loop->index < 5)
                            @php
                                $art = new \App\Http\Controllers\NewArticleController();
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->content_image;
                                $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article->title,'-');
                                $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article->slug.'.'.$article->content_id;
                                $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['hindi_kicker'].'/'.$article['tag_id'];


                                $lenght = strlen($article['hindi_content']);
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;
                            @endphp
                            <li>
                                <div class="artimgblk">
                                    <a href="{{ $url }}">
                                        <img src="{{$image}}" alt="{{$article['hindi_kicker']}}">
                                    </a>
                                </div>
                                <div class="artcontent">
                                    <div class="catname">
                                        <a href="{{$kicker}}">
                                            {{$article['hindi_kicker']}}
                                        </a>
                                    </div>
                                    <div class="haedname"><a href="{{$url}}">{{ empty($article['hindi_home_title']) ? $article['hindi_title'] : $article['hindi_home_title'] }}</a></div>
                                    <div class="authblk cot">
                                        <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                        <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->title))
                                                {{$article->title}}
                                            @endif
                                        </a>
                                    </span>
                                            @php
                                                echo date('F d Y', strtotime($article['time'])); //June 01 2017
                                            @endphp - {{(int)$time}} min read
                                        </div>
                                    </div>
                                    <div class="stext">
                                        @if(empty($article['hindi_shortDesc']))
                                            {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                        @else
                                            {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                        @endif
                                    </div>
                                    <div class="scbk">
                                        <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                        </div>
                                        <div class="shrblk">

        <span class="inshrblk"><a href="#"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
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
                @foreach($authorArticles as $article)
                    @if($loop->index < 5)
                        @php
                            $art = new \App\Http\Controllers\NewArticleController();
                            $site   = Config('constants.articleArr.'.$article->site_type);
                            $image  = Config('constants.awsS3Url').$article->content_image;
                            $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article->title,'-');
                            $authorImage  = ($article->author_image == null) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->author_image;
                            $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article->slug.'.'.$article->content_id;
                            $lenght = strlen($article['hindi_content']);
                                $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['hindi_kicker'].'/'.$article['tag_id'];
                            $time = ($lenght/200);
                            if ( $article->site_type == 'ga' )
                                $image  = $article->image;
                        @endphp
                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}">
                                    <img src="{{$image}}" alt="{{$article['hindi_kicker']}}">
                                </a>
                            </div>
                            <div class="artcontent">
                                <div class="catname">
                                    <a href="{{$kicker}}">
                                        {{$article['hindi_kicker']}}
                                    </a>
                                </div>
                                <div class="haedname"><a href="{{$url}}">{{ empty($article['hindi_home_title']) ? $article['hindi_title'] : $article['hindi_home_title'] }}</a></div>
                                <div class="authblk cot">
                                    <div class="autimg"><img src="{{$authorImage}}" alt=""></div>
                                    <div class="autinfo">
                                    <span>
                                        <a href="{{$authorUrl}}">
                                            @if(!empty($article->title))
                                                {{$article->title}}
                                            @endif
                                        </a>
                                    </span>
                                        @php
                                            echo date('F d Y', strtotime($article['time'])); //June 01 2017
                                        @endphp - {{(int)$time}} min read
                                    </div>
                                </div>
                                <div class="stext">
                                    @if(empty($article['hindi_shortDesc']))
                                        {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                    @else
                                        {{strip_tags(substr($article['hindi_content'], 0, strpos($article['hindi_content'], ' ', 1000)))}}..
                                    @endif
                                </div>
                                <div class="scbk">
                                    <div class="cmtblk"><img src="{{asset('article/images/smallcomment.svg')}}" alt="">
                                    </div>
                                    <div class="shrblk">

        <span class="inshrblk"><a href="#"><img src="{{asset('article/images/smallshare.svg')}}" class="inimg"> 0 Share
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
              {{$authorArticles->links("pagination::bootstrap-4")}}
        </div>
        </div>

        <!-- another list end here  -->



        @include('includes.article1.brandlist')

        </div>

@endsection