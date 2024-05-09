@php
    $seoTitle = $articles->title;
    $seoKeywords = '';
    foreach ($seoVal as $tags) {
    $seoKeywords .= $tags->name .', ';
    }
    $tags = rtrim($seoKeywords, ', ');
    $hindiUrl = str_replace('/'.Request::segment(1).'/', '/hi/'.Request::segment(1).'/', url()->current());
    $engUrl = url()->current();
@endphp
@extends('layout.master')
@if($articles->is_hindi == 1)
    @section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)
@section('hindibrandUrls')
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection
@endif
@php
    $seoDesc = $articles->shortDesc;
    if(empty($seoDesc))
    $seoDesc = strip_tags(implode('. ', array_slice(explode('.', substr($articles['content'], 0, 250)), 0, 2)) . '.');
@endphp

@if($articles->is_noindexnofollow == 1)
    @section('robot', 'noindex, nofollow')  
@endif	
@section('seoTitle', $articles->title)
@section('seoDesc', $seoDesc)
@section('seoKeywords',$tags)
@section('canonicalUrl', $redirectUrl)
@section('image', Config('constants.awsS3Url').$articles->image)
@section('shortDesc',$articles->shortDesc)
@section('imagesrc', Config('constants.awsS3Url').$articles->image)
@section('title',$articles->title)
@section('url',url()->current())
@section('createTime', date('c', strtotime($articles->created_at)))
@section('updateTime', date('c', strtotime($articles->updated_at)))
@section('content')


    <!-- Pawan Coading start -->
    @php
        $Data = array(
            "@context" => "https://schema.org/",
            "@type" => "Article",
            "mainEntityOfPage" => array(
            "@type" => "WebPage",
            "@id" => url()->current()
        ),

            "headline" => $articles->title,
            "description" => $articles->shortDesc,
            "image" => array(
            "@type" => "ImageObject",
            "url" => Config('constants.awsS3Url').$articles->image,
            "width" => "844",
            "height" => "474"
        ),
            "author" => array(
            "@type" => "Person",
            "name" => $articles->author
        ) ,

            "publisher" => array(
            "@type" => "Organization",
            "name" => "Franchise India",
            "logo" => array(
                "@type" => "ImageObject",
                "url" => "https://www.franchiseindia.com/images/dotcom.png",
                "width" => "199",
                "height" => "33"
            )
        ),
            "datePublished" => date('c', strtotime($articles->created_at)),
            "dateModified" => date('c', strtotime($articles->updated_at))
        );
        $jsonData = json_encode($Data);
    @endphp
    <!--pawan coading End -->


    <style type="text/css">
        .articlesection ol.breadcrumb { margin-left: -5px;}
        @media only screen and (max-width:767px) and (min-width: 320px) {
            .articlesection .breadcrumb>li { line-height: 18px; word-break: break-word;}
        }
    </style>
    @include("includes.addthis")
    <div class="innerloginblk">
        @include('includes.login-events')
    </div>
    <script type="text/javascript">var addthis_share=addthis_share||{};addthis_share={media:"{{Config('constants.awsS3Url').$articles->image}}",passthrough:{twitter:{via:"FranchiseIndia"}}};</script>
    <div class="container articlesection">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url(request()->segment(1)) }}">{{ request()->segment(1) }}</a></li>
                    <li class="active">{{ $articles->title }}</li>
                </ol>
            </div>
        </div>

        <div class="row row-no-margin">
            <div class="artimainhead">
                <a href="{{ Config('constants.MainDomain') }}/content/{{$articles['urlKicker']}}">{{$articles->kicker}}</a>
                <span>{{substr($articles->time,0,-9)}}</span>
            </div>
            <h1 class="pagehead">{{$articles->title}}</h1>
            <p class="pagetxt">{{$articles->shortDesc}}</p>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="artiaut">
                    By <a href="#" rel="author" itemprop="author" itemscope itemtype="https://schema.org/Person"> {{$articles->author ? :''}}</a>
                    <span>{{$authorDesig ? :'' }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-7 pull-right">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6 pull-left">
                        <div class="addthis_sharing_toolbox" data-media="{{Config('constants.awsS3Url').$articles->image}}"></div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-6 pull-right">
                        <div class="other-s-iconlayout">
                            <span class="commentlayout">
                                <a href="#commentplace"><i class="fa fa-comment fa-lg"></i>
                                    <span class="s-val-clayout">Comment</span>
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
        @if ($agent->isMobile())
    {{-- @mobile --}}
    <!-- /1057625/FIHL/WAP_ROS_300X250_ATF-->
        <div id='adslot300x250_ATF' style="height: 250px;text-align:center;">
            <script>
                googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
            </script>
        </div>
        @endif
        {{-- @endmobile --}}
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
                <div class="abigima"><img itemprop="image" itemscope itemtype="https://schema.org/ImageObject" src="{{Config('constants.awsS3Url').$articles->image}}" alt="{{$articles['title']}}"></div>
                <div class="clr"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">
                        @php
                            $custom_data = explode("\r\n", $articles['content']);
                            if(count($custom_data) == 1){
                            $articleData[0] = $custom_data[0].'<div id = "v-franchiseindia"></div><script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");</script>';
                            } else{
                            $counter = 0;
                            foreach($custom_data as $cdata){
                            if($counter == 2){
                            $articleData[] = $cdata.'<div id = "v-franchiseindia"></div><script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");</script>';
                            } else{
                            $articleData[] = $cdata;
                            }
                            $counter++;
                            }
                            }
                            $resultArticle  = implode("\r\n", $articleData);
                            echo html_entity_decode($resultArticle);
                        @endphp

                        <div class="sidemediablk" id="scrollmedia">
                            <ul class="sidemedia" style="display:none">
                                <li><a href="whatsapp://send?text={{request()->url()}}" data-text="{{$articles['title']}}" data-action="share/whatsapp/share"><img class="lozad" data-src="{{url('images/side-whatsapp.png')}}" alt="whatsapp" /></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{request()->url()}}&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn"><img class="lozad" data-src="{{url('images/side-linkedin.png')}}" alt="linkedin"/></a></li>
                                <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url={{request()->url()}}" target="_blank"><img class="lozad" data-src="{{url('images/side-twitter.png')}}" alt="twiter"/></a></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{request()->url()}}" target="_blank"><img class="lozad" data-src="{{url('images/side-facbook.png')}}" alt="facebook"/></a></li>
                            </ul>
                            <div class="sibtn"><img class="lozad" data-src="{{url('images/side-sharebtn.png')}}"/></div>
                        </div>
                        <div class="tag-block">
                            <ul class="tag-list">
                                @foreach($seoVal as $value)
                                    <li> <a href="{{ Config('constants.MainDomain') }}/content/{{$value['urlSlug']}}">{{$value['name']}}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="thankscomman" id="cmntMsg" style="display:none">
                            <div class="simthkscomment">Thank you for submitting your valuable comment.</div>
                        </div>
                        <form id="commentForm" action="#" method="post">
                            <input type="hidden" name="cid" id="coid" value="{{$articles->content_id}}">
                            <input type="hidden" name="site" id="sity" value="{{$articles->site_type}}">
                            <input type="hidden" name="contType" id="coty" value="{{$articles->contentType}}">
                            <div class="row rownewmar formsection commentsblk" id="commentplace">
                                <div class="artibtmhead">Comment</div>
                                <div class="bor-radius backwhite ovfl margintb20 pad20">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/user.png')}}" alt="image"></span>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/email.png')}}" alt="image"></span>
                                                    <input type="text" class="form-control" id="emailA" name="email" placeholder="Enter  Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/mobile.png')}}" alt="mobile"></span>
                                                    <input type="text" class="form-control" id="commentmobile" name="mobile" pattern="[789][0-9]{9}" minlength="10" maxlength="10" placeholder="Enter  Mobile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon height100">
                                                        <img class="lozad" data-src="{{url('images/addreess.png')}}" alt="address">
                                                    </span>
                                                    <textarea class="form-control height100" name="comment" id="comment" placeholder="Enter Your Comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-2 selfix">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <img class="lozad" data-src="https://www.franchiseindia.com/images/star.png" alt="star franchise india" src="https://www.franchiseindia.com/images/star.png" data-loaded="true">
                                                    </span>
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
                                        <div class="col-xs-12 col-sm-8 col-md-10 widthfiz">
                                            <input type="submit" id="commentBoxbtn" class="btn btn-default cmbtn" value="Submit"/>
                                        </div>
                                    </div>
                                </div>
                                @foreach($comment as $comnt)
                                    @php
                                        $date = date_format(date_create($comnt['comment_date']),"d, M Y");
                                        $time = date_format(date_create($comnt['comment_date']),"h:i A");
                                    @endphp
                                    <div class="bor-radius backwhite ovfl margintb20 pad20 commrply">
                                        <div class="maintxt"> {{$comnt['comment_user']}} : <span> {{$date}} at {{$time}} </span></div>
                                        <span>{{$comnt['comment_content']}}</span>
                                        @if(!empty($commentReplies))
                                            @foreach($commentReplies as $reply)
                                                @if($comnt->commentID == $reply->comment_id)
                                                    @php
                                                        $replyTimestanmp = date_create($reply->created_at);
                                                        $replyDate = date_format($replyTimestanmp,"d, M Y");
                                                        $replyTime = date_format($replyTimestanmp,"h:i A");
                                                    @endphp
                                                    <div class="repmarleft30new">
                                                        <div class="maintxt"> Franchise India : <span>{{ $replyDate }} at {{ $replyTime }}</span></div>
                                                        <div class="rlytxt">{{ $reply->reply }}</div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
                @include('includes/mycatbottomarticle')

                <div class="contentlistbanner articlebanner">
                    <div class="fullcontainer">
                        <div class="text-center">
                            <!-- /1057625/FIHL/Desktop_Category_300x600_Mid_2-->
                            @if ($agent->isDesktop())
                            {{-- @desktop --}}
                            <div id='adslot970x90'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot970x90'); });
                                </script>
                            </div>
                            {{-- @enddesktop --}}
                            @elseif ($agent->isTablet() || $agent->isDesktop())
                            {{-- @tablet --}}
                            <div id='adslot728x90_ATF'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot728x90_ATF'); });
                                </script>
                            </div>
                            {{-- @endtablet --}}
                            @elseif ($agent->isMobile())

                            {{-- @mobile --}}
                            <div id='adslot300x250_Mid_1'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_1'); });
                                </script>
                            </div>
                            @endif
                            {{-- @endmobile --}}
                        </div>
                    </div>
                </div>

                <div class="borbtmdotarticleads modfiywidth"></div>
                <div class="row maysection">
                    <div class="col-xs-12 col-sm-12 col-md-12 artibtmhead">You May Like</div>
                    @foreach($likeArticles as $article)
                        @if($loop->index > 11 && $loop->index < 24)
                            @php
                                $site = Config('constants.articleArr.'.$article['site_type']);
                                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                                $image = Config('constants.awsS3Url').$article['image'];
                                $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                                if ( $article['site_type'] == 'ga' ) {
                                $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                                $image = $article['image'];
                                $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                                }
                            @endphp
                            <div class="col-xs-12 col-sm-4 col-md-4 mdywi">
                                <a href="{{ $url }}">
                                    @if(empty($article['image']))
                                        <div class="artibtmimg">
                                            <img class="lozad" alt="no image franchise india" data-src="{{url('images/no-image1000.jpg')}}"/>
                                        </div>
                                    @endif
                                    <div class="artibtmimg {{$article['contentType'] == 'Interview' ? 'int' : ''}}">
                                        @if( $site == "gallery")
                                            <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}">
                                            </div>
                                        @endif
                                        <img class="lozad" data-src="{{ $image }}" alt="{{$article['title']}}">
                                    </div>
                                </a>
                                <div class="artbtmsubhead"><a href="{{ $kicker }}">{{$article['kicker']}}</a></div>
                                <div class="artbtmtext">
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
            </div>
            {{-- @notmobile --}}
            @if ($agent->isDesktop() || $agent->isTablet() )

            @include('includes/article/rightinnerarticle')
            {{-- @endnotmobile --}}
            @endif
        </div>
    </div>
    <div class="borbtmdotarticleads"></div>
    <div class="artibottombanner">
        <div class="fullcontainer">
            {{-- @desktop --}}
            @if ($agent->isDesktop())
            @include("includes.banners.dfp_970X250")
            {{-- @enddesktop --}}
            @elseif ($agent->isTablet() ||$agent->isDesktop() )

            {{-- @tablet --}}
            <div class="text-center">
                <div id='adslot468x60_ACS'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot468x60_ACS'); });
                    </script>
                </div>
            </div>
            {{-- @endtablet --}}
            {{-- @mobile --}}
            @elseif ($agent->isMobile())

            <div class="dfp_300X250" id='adslot300x250_Mid_2'>
                <script>
                    googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_2'); });
                </script>
            </div>
            @endif
            {{-- @endmobile --}}
        </div>
    </div>
    <div class="row marginborbtm articlebottom">
        <div class="container">
            <div class="mrehead">More Stories</div>
            <div class="row marginbtm20 rigmarginmin">
                @foreach($likeArticles as $article)
                    @if($loop->index > 23 && $loop->index < 26)
                        @php
                            $site = Config('constants.articleArr.'.$article['site_type']);
                            $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                            $image = Config('constants.awsS3Url').$article['image'];
                            $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            if ( $article['site_type'] == 'ga' ) {
                            $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                            $image = $article['image'];
                            $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            }
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="img-txtlayout">
                                <div class="img-valayout">
                                    <a href="{{ $url }}">
                                        @if( $site == "gallery")
                                            <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}">
                                            </div>
                                        @endif
                                        <img class="lozad" data-src="{{ $image }}" alt="{{$article['title']}}">
                                    </a>
                                </div>
                                <span class="text-contentnewlayout">
                                    <div class="text-rep-blk">
                                        <div class="a-name-red">
                                            <span><a href="{{  $kicker }}">{{$article['kicker']}}</a></span>
                                        </div>
                                        <div class="show-an-txt">
                                            <a href="{{ $url }}">
                                                @if(empty($article['homeTitle']))
                                                    {{substr($article['title'],0,50)}}
                                                @else
                                                    {{substr($article['homeTitle'],0,50)}}..
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row articlfotsction rigmarginmin">
                @foreach($likeArticles as $article)
                    @php
                        $site = Config('constants.articleArr.'.$article['site_type']);
                        $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                        $image = Config('constants.awsS3Url').$article['image'];
                        $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                        if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                        $image = $article['image'];
                        $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                        }
                    @endphp
                    @if ( $loop->index > 25 && $loop->index < 34 )
                        <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                            <div class="artifotbtmimg">
                                <a href="{{ $url }}">
                                    @if( $site == "gallery")
                                        <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}" alt="image"></div>
                                    @endif
                                    <img class="lozad" data-src="{{ $image }}" alt="{{$article['title']}}">
                                </a>
                            </div>
                            <div class="artbtmsubhead">
                                <a href="{{ $kicker }}">{{$article['kicker']}}</a>
                            </div>
                            <div class="artbtmtext">
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
        </div>
    </div>
    <script>/*<![CDATA[*/$(document).ready(function(){$(window).scroll(function(){if(screen.width<=767&&$(this).scrollTop()>350){$("#scrollmedia").fadeIn()}else{$("#scrollmedia").fadeOut()}});$(".sibtn").click(function(){$("ul.sidemedia").slideToggle(700)});$("#commentForm").validate({rules:{name:{required:true,accept:"[a-zA-Zs]+",minlength:3,maxlength:35},email:{required:true,email:true},mobile:{required:true,number:true},comment:"required"},messages:{name:"",email:"",mobile:"",comment:""},errorPlacement:function(a,b){a.appendTo(b.parent().parent())},submitHandler:function(b){var a=$("#commentForm");$.ajax({type:"POST",url:"/comments",dataType:"json",data:a.serialize(),success:function(c){if(c==1){a.hide();document.getElementById("cmntMsg").style.display="block"}else{alert("OOOps..something went wrong");window.location.reload()}}})}})});/*]]>*/</script>
    <script type="application/ld+json">
        @php
            echo $jsonData;
        @endphp
    </script>
@endsection