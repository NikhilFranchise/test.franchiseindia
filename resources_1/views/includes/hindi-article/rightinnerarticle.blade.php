<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">

    <!--next article section start here-->
    @if(isset($nextArticle[0]) && count($nextArticle[0])!= 0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh-hind"><a href="{{ Config('constants.MainDomain') }}/hi/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">अगले लेख के लिए जारी रखें</a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config('constants.MainDomain') }}/hi/{{ $site }}/{{ $nextArticle[0]['slug'] }}.{{ $nextArticle[0]['content_id'] }}">
                            <img class="lozad" data-src="{{ Config('constants.awsS3Url').$nextArticle[0]['image'] }}" alt="{{ $nextArticle[0]->hindi->title }}">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    @if(isset( $nextArticle[0]->hindi->kicker))
                    <div class="rightsubhead"><a href="{{ Config('constants.MainDomain') }}/hi/content/{{$tags->where('tag_id', $nextArticle[0]->hindi->kicker)->first()->name.'/'.$nextArticle[0]->hindi->kicker}}">
                            {{ $tags->where('tag_id', $nextArticle[0]->hindi->kicker)->first()->name }}
                        </a></div>
                    @endif
                    <div class="righttartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/hi/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            {{mb_substr($nextArticle[0]->hindi['title'],0,50)}}..
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

<!--next article section end here-->
    @notmobile
    <div class="sidearce"> @include("includes.banners.google_300X600") </div>
    @endnotmobile

    @include("includes/magazinesubscribe")

    @notmobile
    <div class="sidearce"> @include("includes.banners.yahoo_300X600") </div>
    @endnotmobile

    @php

        $submitUrl  = Config('constants.MainDomain')."/".request()->segment(2);
        $colorClass = "ri";
        
        if(request()->segment(2) == 'content')
            $submitUrl = Config('constants.MainDomain');   

        if(request()->segment(2) == 'education')
            $colorClass = "ei";

        if(request()->segment(2) == 'wellness')
            $colorClass = "wi";

    @endphp

<!-- Dailiy updates start here -->
    <div class="sidearce {{ $colorClass }}">
        <div class="bor-radius backgrey pad20 ovfl">
            <div class="arthads">Daily Updates</div>
            <form id="update" method="post" action="{{ $submitUrl.'/newslettersignup' }}">
                <div class="form-group posl">
                    <input type="hidden" name="site_type" value="{{ $article->site_type }}">
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
                $site   = Config('constants.articleArr.'.$article->site_type);
                $kicker = Config('constants.MainDomain').'/hi/content/'.$tags->where('tag_id', $article->hindi->kicker)->first()->name.'/'. $article->hindi->kicker;
                $image  = Config('constants.awsS3Url').$article->image;
                $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
            @endphp
            @if($loop->index == 19)
                <div class="rightartbigimg">
                    <a href="{{ $url }}">
                        <img class="lozad" data-src="{{ $image }}" alt="{{ $article->hindi->title }}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}">{{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            {{mb_substr($article->hindi->title, 0, 50)}}..
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 19 && $loop->index < 22)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}"> {{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            {{mb_substr($article->hindi->title, 0, 50)}}..
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @notmobile
    <div class="sidearce">
        @include('includes.banners.dfp_600X300')
    </div>
    @endnotmobile


    <div class="sidearce">
        <div class="mhead">Trending</div>
        @foreach($likeArticles as $article)
            @php
                $site   = Config('constants.articleArr.'.$article->site_type);
                $kicker = Config('constants.MainDomain').'/hi/content/'.$tags->where('tag_id', $article->hindi->kicker)->first()->name.'/'. $article->hindi->kicker;
                $image  = Config('constants.awsS3Url').$article->image;
                $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
            @endphp
            @if($loop->index == 22)
                <div class="rightartbigimg">
                    <a href="{{ $url }}">
                        <img class="lozad" data-src="{{ $image }}" alt="{{ $article->hindi->title }}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ $kicker }}">{{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            {{mb_substr($article->hindi->title, 0, 50)}}..
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 22)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ $kicker }}"> {{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }} </a></div>
                    <div class="rightartsidetext">
                        <a href="{{ $url }}">
                            {{mb_substr($article->hindi->title, 0, 50)}}..
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="sidearce">
        @include('includes.banners.dfp_300X250')
    </div>


    <!--next article section start here-->
    @if(isset($nextArticle[0]) && count($nextArticle[0])!=0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh-hind"><a href="{{ Config('constants.MainDomain') }}/hi/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">अगले लेख के लिए जारी रखें</a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{Config('constants.MainDomain')}}/hi/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            <img class="lozad" data-src="{{Config('constants.awsS3Url').$nextArticle[0]['image']}}" alt="{{$nextArticle[0]['slug']}}" />
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead">
                        @if(isset( $nextArticle[0]->hindi->kicker))
                            <a href="{{ Config('constants.MainDomain') }}/hi/content/{{ $tags->where('tag_id', $nextArticle[0]->hindi->kicker)->first()->name.'/'.$nextArticle[0]->hindi->kicker }}">
                                {{ $tags->where('tag_id', $nextArticle[0]->hindi->kicker)->first()->name }}
                            </a>
                        @endif
                    </div>
                    <div class="righttartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            {{mb_substr($nextArticle[0]->hindi['title'],0,50)}}..
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
