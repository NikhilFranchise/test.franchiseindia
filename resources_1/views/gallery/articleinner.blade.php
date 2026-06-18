@php
use Illuminate\Support\Str;
@endphp
@php
    $seoKeywords = '';
    foreach ($seoVal as $tags) {
         $seoKeywords .= $tags->name .', ';
    }
    $tags =  rtrim($seoKeywords, ', ');
@endphp

@extends('layout.master')
@section('seoTitle', $articles->title)
@section('seoDesc', $articles->shortDesc)
@section('seoKeywords',$tags)
@section('canonicalUrl', $redirectUrl)
@section('image', $articles->image)
@section('shortDesc',$articles->shortDesc)
@section('imagesrc',$articles->image)
@section('title',$articles->title)
@section('url',url()->current())
@section('createTime', date('c', strtotime($articles->created_at)))
@section('updateTime', date('c', strtotime($articles->updated_at)))
@section('content')
@include("includes.addthis")

<div class="container articlesection">
    <div class="row row-no-margin">
        <div class="artimainhead">
            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($articles->kicker)}}/{{$tagId}}">{{$articles->kicker}}</a>
            <span>
                {{substr($articles->time,0,-9)}}
            </span>
        </div>
        <h1 class="pagehead">{{$articles->title}}</h1>
        <p class="pagetxt">{{$articles->shortDesc}}</p>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="artiaut">By <a href="#">
                {{$articles->author ? :''}}</a> <span>{{$authorDesig ? :'' }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 pull-right">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 pull-left">
                    <div class="addthis_sharing_toolbox" data-media="{{$articles->image}}"></div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 pull-right">
                    <div class="other-s-iconlayout">
                        <span class="commentlayout">
                            <a href="#commentplace">
                                <i class="fa fa-comment fa-lg"></i>
                                <span class="s-val-clayout">
                                    Comment
                                </span>
                            </a>
                        </span>
                        <span class="email-blayout">
                            <a href="mailto:editor@franchiseindia.com">
                                <i class="fa fa-envelope fa-lg"></i>
                            </a>
                        </span>
                        <span class="print-blayout">
                            <a href="#" onclick="window.print()">
                                <i class="fa fa-print fa-lg"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="marginbor"></div>
    </div>
    
    <!--new content start here -->
    <div class="row row-no-margin">
        <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
            <div class="clr"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">
                    <div id="articleslider" class="carousel slide" data-ride="carousel">            
                        <!-- Indicators -->
                        <!-- Sliding images statring here --> 
                        <div class="carousel-inner">
                            <div class="fullwidthnew">
                                <a class="left carousel-control" href="#articleslider" data-slide="prev">
                                <span class="cirbtn"><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></span>
                                </a>
                                <a class="right carousel-control" href="#articleslider" data-slide="next">
                                <span class="cirbtn"><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></span>
                                </a>
                            </div>                        
                            
                            <div class="fullwidth">           
                                <ol class="carousel-indicators fleft">
                                    @foreach($slider as $image)
                                        <li data-target="#articleslider" data-slide-to="{{$loop->index}}" @if($loop->index == 0) class="active" @endif>
                                            {{$loop->index+1}}
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="fullscr fright"  data-toggle="modal" data-target="#mySliderModal">Full Screen <i class="fa fa-arrows-alt fa-2x" aria-hidden="true"></i></div>                             
                            </div>
        
                            @foreach($slider as $image)
                                <div class="item @if($loop->index == 0) active @endif"> 
                                    <img src="{{$image->image}}" alt="slider image">
                                    <span class="simcontent">
                                    @php
                                        echo html_entity_decode($image->content);
                                    @endphp
                                    </span>
                                </div> 
                            @endforeach                            
                        </div> 
                        <!-- Next / Previous controls here -->
                    </div>

                    <!--Model Window start here -->  
                    <div class="modal fade" id="mySliderModal" role="dialog">
                        <div class="modal-dialog">                    
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"> <i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                    <div id="carouselButtons">
                                       <button id="playButton" type="button" class="btn btn-default btn-xs active">    
                                        <i class="fa fa-play fa-2x" aria-hidden="true"></i>
                                       </button>
                                        <button id="pauseButton" type="button" class="btn btn-default btn-xs">            
                                            <i class="fa fa-pause fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </div>                                                            
                                    <h4 class="modal-title">{{$articles->title}}</h4>
                                </div>

                                <div class="modal-body">
                                    <div id="poparticleslider" class="carousel slide" data-ride="carousel">
                                        <!-- Sliding images statring here --> 
                                        <div class="carousel-inner"> 

                                            <div class="popupfullwidth">           
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    @foreach($slider as $image)
                                                        <li data-target="#poparticleslider" data-slide-to="{{$loop->index}}" @if($loop->index == 0) class="active" @endif>{{$loop->index+1}}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
            
                                            @foreach($slider as $image)
                                                <div class="item @if($loop->index == 0) active @endif"> 
                                                    <img src="{{$image->image}}" alt="slider image" />
                                                    <span class="simcontent">
                                                        @php
                                                            echo html_entity_decode($image->content);
                                                        @endphp
                                                    </span>
                                                </div>                    
                                            @endforeach
                                        </div> 
                                        <!-- Next / Previous controls here -->
                                        <a class="left carousel-control" href="#poparticleslider" data-slide="prev">
                                            <span class="cirbtn"><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></span>
                                        </a>
                                        <a class="right carousel-control" href="#poparticleslider" data-slide="next">
                                            <span class="cirbtn"><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></span>
                                        </a>                        
                                    </div>
                                </div>                        
                            </div>                        
                        </div>
                    </div>
                    <!--Model Window end here -->   

                    <div class="tag-block">
                        <ul class="tag-list">
                            @foreach($seoVal as $value)
                            <li>
                                <a href="{{ Config('constants.MainDomain') }}/gallery/{{Str::slug($value->name)}}/{{$value->tag_id}}">
                                    {{$value->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- comment form start here -->
                    <form id="articleComment" method="post">
                        <input type="hidden" name="conid" id="coid" value="{{$articles->content_id}}">
                        <input type="hidden" name="sity"  id="sity" value="{{$articles->site_type}}">
                        <input type="hidden" name="coty"  id="coty" value="{{$articles->contentType}}">
                        <div class="row rownewmar formsection commentsblk" id="commentplace">
                            <div class="artibtmhead">Comment</div>
                            <div class="thankscomman" id="cmntMsg" style="display:none;"> 
                                <div class="simthkscomment">Thank you for submitting information.</div>
                            </div>
                            <div class="bor-radius backwhite ovfl margintb20 pad20">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <img src="{{URL::asset('images/user.png')}}" alt="user" />
                                                </span>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       placeholder="Enter Your name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <img src="{{URL::asset('images/email.png')}}" alt="email" />
                                                </span>
                                                <input type="text" class="form-control" id="emailA" name="emailA" placeholder="Enter  Email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 pull-right commentspace">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{URL::asset('images/star.png')}}" alt="star" /></span>
                                            <select name="opt" id="opt" class="form-control myselectclass pads sekcv">
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon height100">
                                                    <img src="{{URL::asset('images/addreess.png')}}" alt="address" />
                                                </span>
                                                <textarea class="form-control height100" name="comment" id="comment" placeholder="Enter Your comment"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-no-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                        </div>
                                    </div>


                                    <div class="row row-no-margin">
                                        <input type="button" id="commentBoxbtn" class="btn btn-default cmbtn" onclick="validCommentForm();" value="Submit"/>
                                    </div>

                                </div>
                            </div>
                            <!-- user comment start here -->
                            @foreach($comment as $comment)
                                <div class="comentretext">
                                    {{$comment->comment_user}}<span>  {{$comment->comment_date}}</span>
                                </div>
                                <div class="bor-radius backwhite ovfl margintb20 pad20 commrply">
                                    <span>{{$comment->comment_content}}</span>
                                </div>

                                <style type="text/css">
                                    .repmarleft30{ margin-left: 30px; }
                                    .replyhead{ font-size: 16px; font-weight: 400; color:#006699;}
                                    .reptopmar{ margin-top: 10px; }
                                </style>

                                @if(!empty($commentReplies))
                                    <div class="repmarleft30">
                                        @foreach($commentReplies as $reply)                                                
                                            @if($comment->commentID == $reply->comment_id)
                                              <div class="replyhead">Reply</div>
                                                <div class="comentretext reptopmar">
                                                    Franchise India :<span>  {{ $reply->created_at }}</span>
                                                </div>
                                                <div class="bor-radius backwhite ovfl margintb20 pad20 commrply">
                                                    <span>{{$reply->reply}}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                
                            @endforeach
                            <!-- user comment end here   -->
                        </div>
                    </form>
                    <!-- comment form end here -->
                </div>
            </div>
        </div>

        <!--inner right panel start here -->
        <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">

            <!--next article section start here-->
            {{-- @if(count($nextArticle)!=0)
                <div class="contiblk">
                    <div class="conh">
                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle->content_id}}">Continue to next article</a>
                        <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="rigtimg">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle->content_id}}">
                                    <img src="{{$nextArticle->image}}" alt="{{ $nextArticle->title }}" />
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                            <div class="rightsubhead">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->kicker)}}/{{$nextArticle['kicker_id']}}">
                                    {{$nextArticle->kicker}}
                                </a>
                            </div>
                            <div class="righttartsidetext">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle['content_id']}}">
                                    @if(empty($nextArticle->homeTitle))
                                        {{substr($nextArticle->title,0,50)}}
                                    @else
                                        {{substr($nextArticle->homeTitle,0,50)}}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}

            @if($nextArticle)
    <div class="contiblk">
        <div class="conh">
            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">Continue to next article</a>
            <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="rigtimg">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">
                        <img src="{{ $nextArticle->image }}" alt="{{ $nextArticle->title }}" />
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                <div class="rightsubhead">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->kicker) }}/{{ $nextArticle->kicker_id }}">
                        {{ $nextArticle->kicker }}
                    </a>
                </div>
                <div class="righttartsidetext">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">
                        @if(empty($nextArticle->homeTitle))
                            {{ substr($nextArticle->title, 0, 50) }}
                        @else
                            {{ substr($nextArticle->homeTitle, 0, 50) }}
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

        <!--next article section end here-->
            <div class="sidearce"> @include("includes.banners.google_300X250")  </div>
            @include("includes.magazinesubscribe")
            @notmobile
            <div class="sidearce"> @include('includes.banners.dfp_600X300') </div>
            {{-- @endif --}}
            @endnotmobile
            <div class="sidearce">  <div class="mhead">Most Shared</div>
                @foreach($likeArticles as $article)
                    @if ( $loop->index == 0 )
                        <div class="rightartbigimg">
                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                <img src="{{$article->image}}" alt="{{ $article['title'] }}" />
                            </a>
                        </div>
                        <div class="rigtxtcontain">
                            <div class="artsidesubhead">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->kicker)}}/{{$article['kicker_id']}}">
                                    {{$article->kicker}}
                                </a>
                            </div>
                            <div class="rightartsidetext">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                    @if($article['homeTitle']=='')
                                        {{substr($article['title'],0,50)}}
                                    @endif
                                    {{substr($article['homeTitle'],0,50)}}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ( $loop->index > 0 && $loop->index < 4 )
                        <div class="rigtxtcontain">
                            <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->kicker)}}/{{$article['kicker_id']}}">{{$article['kicker']}} </a>
                                </div>
                            <div class="rightartsidetext">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                    @if($article['homeTitle']=='')
                                        {{substr($article['title'],0,50)}}
                                    @else
                                        {{substr($article['homeTitle'],0,50)}}
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="sidearce">@include("includes.banners.yahoo_300X250")</div>
            <div class="sidearce"> <div class="mhead">Trending</div>
            @foreach($likeArticles as $article)             
            @if ( $loop->index == 4 )
                <div class="rightartbigimg">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                        <img src="{{$article['image']}}" alt="{{ $article['title'] }}" />
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->kicker)}}/{{$article['kicker_id']}}">{{$article['kicker']}} </a>
                        </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{$article->title}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 4 && $loop->index < 8)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->kicker)}}/{{$article['kicker_id']}}">
                            {{$article['kicker']}} 
                        </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{Config::get('constants.MainDomain')}}/gallery/{{Str::slug($article->title)}}.{{$article->content_id}}">
                            @if(empty($article->homeTitle))
                                {{substr($article->title,0,50)}}
                            @else
                                {{substr($article->homeTitle,0,50)}}
                            @endif
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    
        <div class="sidearce"> @include("includes.banners.rightviewtaboola") </div>

        <!--next article section start here-->

        @if($nextArticle)
    <div class="contiblk">
        <div class="conh">
            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">Continue to next article</a>
            <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="rigtimg">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">
                        <img src="{{ $nextArticle->image }}" alt="{{ $nextArticle->title }}" />
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                <div class="rightsubhead">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->kicker) }}/{{ $nextArticle->kicker_id }}">
                        {{ $nextArticle->kicker }}
                    </a>
                </div>
                <div class="righttartsidetext">
                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($nextArticle->title) }}.{{ $nextArticle->content_id }}">
                        @if(empty($nextArticle->homeTitle))
                            {{ substr($nextArticle->title, 0, 50) }}
                        @else
                            {{ substr($nextArticle->homeTitle, 0, 50) }}
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

        {{-- @if(count($nextArticle)!=0)
            <div class="contiblk">
                <div class="conh"><a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle->content_id}}">Continue to next article</a>
                    <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="rigtimg">
                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle->content_id}}">
                                <img src="{{$nextArticle->image}}" alt="{{ $nextArticle->title }}" />
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                        <div class="rightsubhead">
                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->Kicker)}}/{{$nextArticle['kicker_id']}}">
                                {{$nextArticle['kicker']}}
                            </a>
                        </div>
                        <div class="righttartsidetext">
                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($nextArticle->title)}}.{{$nextArticle->content_id}}">
                                @if(empty($nextArticle->homeTitle))
                                    {{substr($nextArticle->title,0,50)}}
                                @else
                                    {{substr($nextArticle->homeTitle,0,50)}}
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif --}}
    <!--next article section end here-->
    <div class="sidearce"> @include('includes.banners.google_300X250') </div>
</div>
<!--inner right panel end here -->
</div>
<!--new content end here -->
</div>
@if(count($moreArticles) > 2)
    <div class="row marginborbtm articlebottom">
        <div class="container">
            <div class="mrehead">More Stories</div>
            <div class="row marginbtm20 rigmarginmin">
                @foreach($moreArticles as $article)
                    @if($loop->index < 2)
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="img-txtlayout">
                                <div class="img-valayout">
                                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->title) }}.{{ $article->content_id }}">
                                        <img src="{{ $article->image }}" alt="{{ $article->homeTitle }}" />
                                    </a>
                                </div>
                                <span class="text-contentnewlayout">
                                    <div class="text-rep-blk">
                                        <div class="a-name-red">
                                            <span>
                                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->kicker) }}/{{ $article->kicker_id }}">
                                                    {{ $article->kicker }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="show-an-txt">
                                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->title) }}.{{ $article->content_id }}">
                                                @if($article->homeTitle)
                                                    {{ $article->title }}
                                                @endif
                                                {{ $article->homeTitle }}
                                            </a>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @endif
                    @if($loop->index == 1)
                        </div>
                        <!-- 4 slot article newsection start here -->
                        <div class="row articlfotsction rigmarginmin">
                    @endif
                    @if($loop->index > 1 && $loop->index < 10)
                        <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                            <div class="artifotbtmimg">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->title) }}.{{ $article->content_id }}">
                                    <img src="{{ $article->image }}" alt="{{ $article->title }}">
                                </a>
                            </div>
                            <div class="artbtmsubhead">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->kicker) }}/{{ $article->kicker_id }}">
                                    {{ $article->kicker }}
                                </a>
                            </div>
                            <div class="artbtmtext">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{ Str::slug($article->title) }}.{{ $article->content_id }}">
                                    @if(empty($article->homeTitle))
                                        {{ substr($article->title, 0, 50) }}
                                    @else
                                        {{ substr($article->homeTitle, 0, 50) }}..
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif

    {{-- @if(count($moreArticles) > 2)
    <div class="row marginborbtm articlebottom">
        <div class="container">
            <div class="mrehead">More Stories</div>
            <div class="row marginbtm20 rigmarginmin">
                @foreach($moreArticles as $article)
                @if($loop->index  < 2)
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="img-txtlayout">
                        <div class="img-valayout">
                            <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->title)}}.{{$moreArticles->content_id}}">
                                <img src="{{$moreArticles->image}}" alt="{{$moreArticles->homeTitle}}" />
                            </a>
                        </div>
                        <span class="text-contentnewlayout">
                            <div class="text-rep-blk">
                                <div class="a-name-red">
                                    <span>
                                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->kicker)}}/{{$moreArticles['kicker_id']}}">
                                            {{$moreArticles->kicker}}
                                        </a>
                                    </span>
                                </div>
                                <div class="show-an-txt">
                                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->title)}}.{{$moreArticles->content_id}}">
                                        @if(Str::slug($moreArticles->homeTitle))
                                            {{$moreArticles->title}}
                                        @endif
                                        {{$moreArticles->homeTitle}}
                                    </a>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                @endif
                @if($loop->index == 1)
                </div>
            <!--4 slot  article  newsection  start here -->
            <div class="row articlfotsction rigmarginmin">
                @endif
                    @if($loop->index > 1 && $loop->index < 10)
                        <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                            <div class="artifotbtmimg">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->title)}}.{{$moreArticles['content_id']}}">
                                    <img src="{{$moreArticles['image']}}" alt="{{ $moreArticles['title'] }}">
                                </a>
                            </div>
                            <div class="artbtmsubhead"><a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->kicker)}}/{{$moreArticles['kicker_id']}}">{{$moreArticles['kicker']}}</a></div>
                            <div class="artbtmtext">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($moreArticles->title)}}.{{$moreArticles['content_id']}}">
                                    @if($moreArticles['homeTitle']=='')
                                        {{substr($moreArticles['title'],0,50)}}
                                    @endif
                                    {{substr($moreArticles['homeTitle'],0,50)}}..</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif --}}
    <!--form end here -->
    <script>
        $(document).ready(function () {
            $('#commentBoxbtn').click(function () {
                if (validCommentForm()) {
                    var site = document.getElementById('sity').value;
                    var id = document.getElementById('coid').value;
                    var ctype = document.getElementById('coty').value;

                    var optn = document.getElementById('opt').value;
                    var name = document.getElementById('name').value;
                    var email = document.getElementById('emailA').value;
                    var cmnt = document.getElementById('comment').value;
                    //alert(ctype);

                    $.ajax({
                        type: 'post',
                        url: '/comments',
                        data: {opt: optn, name: name, email: email, comment: cmnt, site: site, cid: id, contType: ctype},
                        success: function (data) {
                            $("#articleComment")[0].reset();
                            //alert(data);
                            if (data == 1) {
                                document.getElementById("cmntMsg").style.display = "block";
                            }

                        }
                    });
                }
            });

        });

    function validCommentForm() {
        if (
            $("#articleComment").validate({
                rules: {
                        name: {
                            required: true,
                            accept: "[a-zA-Z\s]+",
                        },
                        emailA: {
                            required: true,
                            email: true
                        },
                        comment: "required"
                    },

                    messages: {
                        name: {
                            required: "",
                            accept: "",
                        },
                        emailA: {
                            required: "",
                            email: ""
                        },
                        comment: ""
                    },

                    errorPlacement: function (error, element) {
                        error.appendTo(element.parent().parent())
                    },
                }).form()
            )
        return true;
    }

    $('#articleslider').carousel({
      interval: 70000,
      pause: null
    });

    $('#poparticleslider').carousel({
      interval: 4000,
      pause: null
    });

    $('#playButton').click(function () {
        $('#poparticleslider').carousel('cycle');
        $( "#playButton" ).addClass( "active" );
        $( "#pauseButton" ).removeClass( "active" );
    });
    $('#pauseButton').click(function () {
        $('#poparticleslider').carousel('pause');
        $( "#pauseButton" ).addClass( "active" );
        $( "#playButton" ).removeClass( "active" );
    });
</script>
@endsection

