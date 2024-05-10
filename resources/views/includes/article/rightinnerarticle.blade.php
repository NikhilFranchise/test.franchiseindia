<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
    @php
use Illuminate\Support\Str;
@endphp
    <!--next article section start here-->
    @if(count($nextArticle[0])!=0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh"><a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">Continue to next article</a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                        <img class="lozad" data-src="{{Config('constants.awsS3Url').$nextArticle[0]['image']}}" alt="{{$nextArticle[0]['slug']}}">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="{{ Config('constants.MainDomain') }}/content/{{Str::slug($nextArticle[0]['kicker'])}} ">{{$nextArticle[0]['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            @if(empty($nextArticle[0]['homeTitle']))
                                {{substr($nextArticle[0]['title'],0,50)}}
                            @else
                                {{substr($nextArticle[0]['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!--next article section end here-->

    @notmobile

    <div class="sidearce">
        <!-- /1057625/FIHL/Desktop_Category_300x600_ATF-->
        <div id='adslot300x250_ATF'>
            <script>
                googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
            </script>
        </div>
    </div>
    @endnotmobile
    
    @include("includes/magazinesubscribe")
    @notmobile
  	<div class="sidearce">
        <!-- /1057625/FIHL/Desktop_Category_300x600_ATF-->
        <div id='adslot300x600_ATF'>
            <script>
                googletag.cmd.push(function() { googletag.display('adslot300x600_ATF'); });
            </script>
        </div>
    </div>
    @endnotmobile
  
    @php

        $submitUrl  = Config('constants.MainDomain')."/".request()->segment(1);
        $colorClass = "ri";
        
        if(request()->segment(1) == 'content')
            $submitUrl = Config('constants.MainDomain');   

        if(request()->segment(1) == 'education')
            $colorClass = "ei";

        if(request()->segment(1) == 'wellness')
            $colorClass = "wi";

    @endphp

    <!-- Dailiy updates start here -->
    <div class="sidearce {{ $colorClass }}">
        <div class="bor-radius backgrey pad20 ovfl">
            <div class="arthads">Daily Updates</div>
            <form id="update" method="post" action="{{ $submitUrl }}/newslettersignup">
                <div class="form-group posl">
                    <input type="hidden" name="site_type" value="{{$articles->site_type}}">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email Id">
                    <input type="submit" class="btn btn-default addoncb" value="Signup" id="btnupdate"/>
                </div>
            </form>
            <div class="newlertxt">Submit your email address to receive the latest updates on news & host of opportunities </div>

        </div>
    </div>
    <!-- Dailiy updates end here -->



    <div class="sidearce">
        <div class="mhead">Most Shared</div>
        @foreach($likeArticles as $article)
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                if ( $article['site_type'] == 'ga' ) {
                    $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                    $image  = $article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                }
            @endphp
            @if($loop->index == 35)
                <div class="rightartbigimg">
                    <a href="{{ $url }}">
                        <img class="lozad" data-src="{{ $image }}" alt="{{ $article['title'] }}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}">{{ $article['kicker'] }} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            @if(empty($article['homeTitle']))
                                {{substr($article['title'],0,50)}}
                            @else
                                {{substr($article['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 35 && $loop->index < 39)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}"> {{ $article['kicker'] }} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            @if(empty($article['homeTitle']))
                                {{substr($article['title'],0,50)}}
                            @else
                                {{substr($article['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>



    {{--@notmobile--}}
        {{--<div class="sidearce">--}}
            {{--@include('includes.banners.dfp_600X300')--}}
        {{--</div>--}}
    {{--@endnotmobile--}}


    <div class="sidearce">
        <div class="mhead">Trending</div>
        @foreach($likeArticles as $article)
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                if ( $article['site_type'] == 'ga' ) {
                    $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                    $image  = $article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                }
            @endphp
            @if($loop->index == 39)
                <div class="rightartbigimg">
                    <a href="{{ $url }}">
                        <img class="lozad" data-src="{{ $image }}" alt="{{ $article['title'] }}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}">{{$article['kicker']}} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            @if(empty($article['homeTitle']))
                                {{substr($article['title'],0,50)}}
                            @else
                                {{substr($article['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 39)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ $kicker }}"> {{ $article['kicker'] }} </a></div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            @if(empty($article['homeTitle']))
                                {{substr($article['title'],0,50)}}
                            @else
                                {{substr($article['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="sidearce">

        {{--@include('includes.banners.dfp_300X250')--}}
    </div>


    <!--next article section start here-->
    @if(count($nextArticle[0])!=0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh"><a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">Continue to next article</a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{Config('constants.MainDomain')}}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            <img class="lozad" data-src="{{Config('constants.awsS3Url').$nextArticle[0]['image']}}" alt="{{$nextArticle[0]['slug']}}" />
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead">
                        <a href="{{ Config('constants.MainDomain') }}/content/{{Str::slug($nextArticle[0]['kicker'])}}">
                            {{$nextArticle[0]['kicker']}}
                        </a>
                    </div>
                    <div class="righttartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            @if(empty($nextArticle[0]['homeTitle']))
                                {{substr($nextArticle[0]['title'],0,50)}}
                            @else
                                {{substr($nextArticle[0]['homeTitle'],0,50)}}..
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--next article section end here-->
</div>


<script type="text/javascript">
        $(document).ready(function () {
            $('input[title!=""]').hint();
            $('textarea[title!=""]').hint();
            $('select[title!=""]').hint();
            var validator = $("#update").validate({

                rules: {

                    email: {
                        required : true,
                        email    : true
                    }
                },

                messages: {

                    email: {
                        required : "",
                        email    : ""
                    }
                }

            });
        });

    </script>
