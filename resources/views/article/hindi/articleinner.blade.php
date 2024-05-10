@php

    $tagNames = "";
    foreach($seoVal as $tag) {
        $tagNames .= $tag->name. ", ";
    }
    $tagNames =  rtrim($tagNames, ', ');

    $hindiUrl = url()->current();
    $engUrl = str_replace('/hi/', '/', url()->current());

@endphp
@extends('layout-hindi.master')
@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)
@section('hindibrandUrls')
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection

@section('seoTitle', $article->hindi->title)
@section('seoDesc', $article->hindi->short_desc)
@section('seoKeywords', $tagNames)
@section('canonicalUrl', url()->current())
@section('image', Config('constants.awsS3Url').$article->image)
@section('shortDesc', $article->hindi->short_desc)
@section('imagesrc', Config('constants.awsS3Url').$article->image)
@section('title',$article->hindi->title)
@section('url',url()->current())
@section('createTime', date('c', strtotime($article->hindi->created_at)))
@section('updateTime', date('c', strtotime($article->hindi->updated_at)))
@section('ampHindi')
<link href="{{str_replace( '/hi/', '/amp/hi/', url()->current())}}" rel="amphtml">
@endsection
@section('content')
    @include("includes.addthis")
    <style type="text/css">
        .articlesection ol.breadcrumb { margin-left: -5px;}
        @media only screen and (max-width:767px) and (min-width: 320px) {
            .articlesection .breadcrumb>li { line-height: 18px; word-break: break-word;}
        }
    </style>

    <script type="text/javascript">
        var addthis_share = addthis_share || {}
        addthis_share = {
            media: "{{Config('constants.awsS3Url').$article->image}}",
            passthrough: {
                twitter: {
                    via: "FranchiseIndia"
                }
            }
        }
    </script>

    <div class="container articlesection">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url(request()->segment(1)) }}">{{ request()->segment(1) }}</a></li>
                    <li class="active">{{ $article->hindi->title }}</li>
                </ol>
            </div>
        </div>

        <div class="row row-no-margin">
            <div class="artimainhead-hind">
                <a href="{{ Config('constants.MainDomain') }}/hi/content/{{ $kicker->name }}/{{ $kicker->tag_id }}">{{ $kicker->name }}</a>
                <span>
                    {{substr($article->hindi->created_at,0,-9)}}
                </span>
            </div>
            <h1 class="pagehead-hind">{{$article->hindi->title}}</h1>
            <p class="pagetxt-hind">{{$article->hindi->short_desc}}</p>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="artiaut">By <a href="#" rel="author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        {{$article->hindi->author ? :''}}</a><span>{{ $authorDesig ? :'' }}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-7 pull-right">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6 pull-left">
                        <div class="addthis_sharing_toolbox" data-media="{{ Config('constants.awsS3Url').$article->image}}"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6 pull-right">
                        <div class="other-s-iconlayout">
                            <span class="commentlayout">
                                <a href="#commentplace"><i class="fa fa-comment fa-lg"></i>
                                    <span class="s-val-clayout">टिप्पणी</span>
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
                <div class="abigima">
                    <img itemprop="image" itemscope itemtype="https://schema.org/ImageObject" src="{{ Config('constants.awsS3Url').$article->image}}" alt="{{ $article->hindi->title }}">
                </div>
                <div class="clr"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent-hind">
                                            @php
                            echo html_entity_decode($article->hindi->content);
                       @endphp
					   
					   <div id = "v-franchiseindia"></div><script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");</script>
					   
                        <div class="sidemediablk" id="scrollmedia">
                            <ul class="sidemedia" style="display:none;">
                                <li><a href="whatsapp://send?text={{request()->url()}}" data-text="{{ $article->hindi->title }}" data-action="share/whatsapp/share"><img class="lozad" alt="whatsapp icon" data-src="{{url('images/side-whatsapp.png')}}"/></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{request()->url()}}&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn"><img class="lozad" data-src="{{url('images/side-linkedin.png')}}" alt="linkedin icon"/></a></li>
                                <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url={{request()->url()}}" target="_blank"><img class="lozad" alt="twitter icon" data-src="{{url('images/side-twitter.png')}}"/></a></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{request()->url()}}" target="_blank"><img class="lozad" data-src="{{url('images/side-facbook.png')}}" alt="facebook icon"/></a></li>
                            </ul>
                            <div class="sibtn"><img class="lozad" data-src="{{url('images/side-sharebtn.png')}}" alt="share button"/></div>
                        </div>
                        <div class="tag-block">
                            <ul class="tag-list">
                                @foreach($seoVal as $value)
                                    <li>
                                        <a href="{{ Config('constants.MainDomain') }}/hi/content/{{$value['name']}}/{{$value['tag_id']}}">{{$value['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="thankscomman" id="cmntMsg" style="display:none;">
                            <div class="simthkscomment">जानकारी सबमिट करने के लिए धन्यवाद</div>
                        </div>

                        <!-- comment form start here -->
                        <form id="commentForm" action="#" method="post">
                            <input type="hidden" name="cid" id="coid" value="{{$article->content_id}}">
                            <input type="hidden" name="site" id="sity" value="{{$article->site_type}}">
                            <input type="hidden" name="contType" id="coty" value="{{$article->contentType}}">
                            <div class="row rownewmar formsection commentsblk" id="commentplace">
                                <div class="artibtmhead">टिप्पणी</div>

                                <div class="bor-radius backwhite ovfl margintb20 pad20">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" alt="user franchise india" data-src="{{url('images/user.png')}}"></span>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="अपना नाम दर्ज करें">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" alt="emaili franchiseindia" data-src="{{url('images/email.png')}}"></span>
                                                    <input type="text" class="form-control" id="emailA" name="email" placeholder="अपना ईमेल दर्ज करें">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/mobile.png')}}" alt="mobile franchise india"></span>
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
                                                        <img class="lozad" alt="address franchise india" data-src="{{url('images/addreess.png')}}">
                                                    </span>
                                                    <textarea class="form-control height100" name="comment" id="comment" placeholder="अपना टिप्पणी दर्ज करें"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-2 selfix">
                                            <div class="form-group">
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <img class="lozad" data-src="https://www.franchiseindia.com/images/star.png" alt="franchiseindia star" src="https://www.franchiseindia.com/images/star.png" data-loaded="true">
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
                                            <input type="submit" id="commentBoxbtn" class="btn btn-default cmbtn" value="जमा करें"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- user comment start here -->
                                @foreach($comments as $comment)
                                    <div class="bor-radius backwhite ovfl margintb20 pad20 commrply">
                                        <div class="maintxt"> {{$comment['comment_user']}} : <span> {{date_format(date_create($comment['comment_date']),"d, M Y")}} at {{ date_format(date_create($comment['comment_date']),"h:i A") }} </span></div>
                                        <span>{{$comment['comment_content']}}</span>
                                        @if(!empty($commentReplies))
                                            @foreach($commentReplies as $reply)
                                                @if($comment->commentID == $reply->comment_id)
                                                    @php
                                                        $replyTimestanmp = date_create($reply->created_at);
                                                        $replyDate = date_format($replyTimestanmp,"d, M Y");
                                                        $replyTime = date_format($replyTimestanmp,"h:i A");
                                                    @endphp
                                                    <div class="repmarleft30new">
                                                        <div class="maintxt"> Franchise India : <span>{{ $replyDate }}
                                                                at {{ $replyTime }}</span></div>
                                                        <div class="rlytxt">{{ $reply->reply }}</div>
                                                    </div>

                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                            @endforeach
                            <!-- user comment end here   -->
                            </div>
                        </form>
                        <!-- comment form end here -->
                    </div>
                </div>


                @include('includes.hindi-article.mycatbottomarticle')

                @notmobile
                <div class="contentlistbanner articlebanner">
                    <div class="fullcontainer">
                        <div class="text-center">
                            <div id="div-gpt-ad-1500379519668-0"></div>
                        </div>
                    </div>
                </div>
                @endnotmobile


                <div class="borbtmdotarticleads modfiywidth"></div>
                <!-- you May Like start here -->
                <div class="row maysection">
                    <div class="col-xs-12 col-sm-12 col-md-12 artibtmhead">शायद तुम पसंद करोगे</div>

                    @foreach($likeArticles as $article)
                        @php
                            $site   = Config('constants.articleArr.'.$article->site_type);
                            $kicker = Config('constants.MainDomain').'/hi/content/'.$tags->where('tag_id', $article->hindi->kicker)->first()->name.'/'. $article->hindi->kicker;
                            $image  = Config('constants.awsS3Url').$article->image;
                            $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                        @endphp
                        @if($loop->index < 9)
                            <div class="col-xs-12 col-sm-4 col-md-4 mdywi">
                                <a href="{{ $url }}">
                                    @if(empty($article->image))
                                        <div class="artibtmimg">
                                            <img class="lozad" alt="no image franchise india" data-src="{{url('images/no-image1000.jpg')}}"/>
                                        </div>
                                    @endif

                                    <div class="artibtmimg {{$article->contentType == 'Interview' ? 'int' : ''}}">
                                        @if( $site == "gallery")
                                            <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}">
                                            </div>
                                        @endif
                                        <img class="lozad" data-src="{{ $image }}" alt="{{$article->hindi->title}}">
                                    </div>
                                </a>
                                <div class="artbtmsubhead"><a href="{{ $kicker }}">{{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }}</a></div>
                                <div class="artbtmtext">
                                    <a href="{{ $url }}">
                                        {{ $article->hindi->title }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- you May Like end here -->
            </div>
            <!--inner right panel start here -->
            @notmobile
            @include('includes/hindi-article/rightinnerarticle')
            @endnotmobile
        <!--inner right panel end here -->
        </div>
        <!--new content end here -->
    </div>
    <div class="borbtmdotarticleads"></div>
    <div class="artibottombanner">
        <div class="fullcontainer">
            @desktop
            @include("includes.banners.dfp_970X250")
            @enddesktop
            @tablet
            <div class="text-center">
                <div id="div-gpt-ad-1498540898563-10"></div>
            </div>
            @endtablet
        </div>
    </div>

    <div class="row marginborbtm articlebottom">
        <div class="container">
            <div class="mrehead">ज़्यादा कहानियां</div>
            <div class="row marginbtm20 rigmarginmin">
                @foreach($likeArticles as $article)
                    @php
                        $site   = Config('constants.articleArr.'.$article->site_type);
                        $kicker = Config('constants.MainDomain').'/hi/content/'.$tags->where('tag_id', $article->hindi->kicker)->first()->name.'/'. $article->hindi->kicker;
                        $image  = Config('constants.awsS3Url').$article->image;
                        $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                    @endphp
                    @if($loop->index > 8 &&  $loop->index < 11)

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="img-txtlayout">
                                <div class="img-valayout">
                                    <a href="{{ $url }}">
                                        @if( $site == "gallery")
                                            <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}">
                                            </div>
                                        @endif
                                        <img class="lozad" data-src="{{ $image }}" alt="{{$article->hindi->title}}">
                                    </a>
                                </div>
                                <span class="text-contentnewlayout">
                                    <div class="text-rep-blk">
                                        <div class="a-name-red">
                                            <span>
                                                <a href="{{  $kicker }}">{{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }}</a>
                                            </span>
                                        </div>
                                        <div class="show-an-txt">
                                        <a href="{{ $url }}">
                                            {{ $article->hindi->title }}
                                        </a>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--4 slot  article  newsection  start here -->
            <div class="row articlfotsction rigmarginmin">
                @foreach($likeArticles as $article)
                    @php
                        $site   = Config('constants.articleArr.'.$article->site_type);
                        $kicker = Config('constants.MainDomain').'/hi/content/'.$tags->where('tag_id', $article->hindi->kicker)->first()->name.'/'. $article->hindi->kicker;
                        $image  = Config('constants.awsS3Url').$article->image;
                        $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                    @endphp
                    @if ( $loop->index > 10 && $loop->index < 19)
                        <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                            <div class="artifotbtmimg">
                                <a href="{{ $url }}">
                                    @if( $site == "gallery")
                                        <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}"></div>
                                    @endif
                                    <img class="lozad" data-src="{{ $image }}" alt="{{$article->hindi->title}}">
                                </a>
                            </div>
                            <div class="artbtmsubhead">
                                <a href="{{ $kicker }}">{{ $tags->where('tag_id', $article->hindi->kicker)->first()->name }}</a>
                            </div>
                            <div class="artbtmtext">
                                <a href="{{ $url }}">
                                    {{ $article->hindi->title }}
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- 4 slot newsection end here -->
    </div>

    <!--form end here -->
    <script type="application/javascript">
        $(document).ready(function () {

            $(window).scroll(function () {
                if (screen.width <= 767 && $(this).scrollTop() > 350) {
                    $('#scrollmedia').fadeIn();
                } else
                    $('#scrollmedia').fadeOut();
            });
            $(".sibtn").click(function () {
                $("ul.sidemedia").slideToggle(700);
            });

            $("#commentForm").validate({
                rules: {
                    name: {required: true, accept: "[a-zA-Z\s]+", minlength: 3, maxlength: 35},
                    email: {required: true, email: true},
                    mobile: {required: true, number: true},
                    comment: "required"
                },

                messages: {
                    name: "",
                    email: "",
                    mobile: "",
                    comment: ""
                },
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent().parent())
                },
                submitHandler: function (e) {
                    var form = $('#commentForm');
                    $.ajax({
                        type: 'POST',
                        url: '/comments',
                        dataType: "json",
                        data: form.serialize(),
                        success: function (response) {
                            if (response == 1) {
                                form.hide();
                                document.getElementById("cmntMsg").style.display = "block";
                            } else {
                                alert('OOOps..something went wrong');
                                window.location.reload();
                            }
                        }
                    });
                }
            });

        });

    </script>
@endsection

