@php
use Illuminate\Support\Str;
@endphp
@php
    $a = date_create($article->time);
    $date = date_format($a,"M, d Y");
@endphp
@extends('layout.master')
@section('seoTitle', $article->title)
@section('seoDesc', $article['subtitle'])
@section('seoKeywords', "franchise magazine")
@section('canonicalUrl', url('/'))
@section('image', Config('constants.awsS3Url').$article->image)
@section('shortDesc', $article['subtitle'])
@section('imagesrc',Config('constants.awsS3Url').$article->image)
@section('title',$article->title)
@section('url',url()->current())
@section('createTime', date('c', strtotime($article->created_at)))
@section('updateTime', date('c', strtotime($article->updated_at)))
@section('content')
    @include("includes.addthis")
    @include('includes/magazinebreadcrumb')
    <script type="text/javascript">addthis_share={media:"{{Config('constants.awsS3Url').$article->image}}",passthrough:{twitter:{via:"FranchiseIndia"}}};</script>
    <div class="innerloginblk">
        @include('includes.login-events')
    </div>
    <style type="text/css">.articlesection ol.breadcrumb{margin-left:-5px}@media only screen and (max-width:767px) and (min-width:320px){.articlesection .breadcrumb>li{line-height:18px;word-break:break-word}}</style>
    <div class="container articlesection">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url(request()->segment(1)) }}">{{ request()->segment(1) }}</a></li>
                    <li class="active">{{ $article->title }}</li>
                </ol>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="artimainhead"><span>{{$date}}</span></div>
            <h1 class="pagehead">{{$article['title']}}</h1>
            <p class="pagetxt">{{$article['subtitle']}}</p>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 pull-right">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 pull-left">
                        <div class="addthis_sharing_toolbox" data-media="{{Config('constants.awsS3Url').$article->image}}"></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 pull-right">
                        <div class="other-s-iconlayout">
                            <span class="commentlayout"><a href="#commentplace"><i class="fa fa-comment fa-lg"></i><span class="s-val-clayout">Comment</span></a></span>
                            <span class="email-blayout"><a href="mailto:editor@franchiseindia.com"><i class="fa fa-envelope fa-lg"></i></a></span>
                            <span class="print-blayout"><a href="#" onclick="window.print()"><i class="fa fa-print fa-lg"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="marginbor"></div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
                @if(($article->image) != '')
                    <div class="abigima"><img src="{{Config('constants.awsS3Url').$article->image}}" alt="{{$article['title']}}"></div>
                @endif
                <div class="clr"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">
                        @php
                            $custom_data = explode("\r\n", $article['content']);
                            if(count($custom_data) == 1){
                            $articleData[0] = $custom_data[0];
                            $articleData[1] = '<div id = "v-franchiseindia"></div><script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");</script>';
                            } else{
                            $counter = 0;
                            foreach($custom_data as $cdata){
                            if($counter == 1){
                            $articleData[] = '<div id = "v-franchiseindia"></div><script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");</script>';
                            } else{
                            $articleData[] = $cdata;
                            }
                            $counter++;
                            }
                            }
                            $resultArticle  = implode("\r\n", $articleData);

                            echo html_entity_decode($resultArticle);
                        @endphp
                        {{--@php--}}
                            {{--//echo html_entity_decode($article['content']);--}}
                        {{--@endphp--}}
                        <div class="row rownewmar" style="display:none">
                            <div class="bor-radius backwhite ovfl margintb20 btss">
                                <div class="col-xs-12 col-sm-9 col-md-9 pad20">
                                    <div class="addthis_sharing_toolbox"></div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-mdp-3 backg pad20">
                                    Write a Comment
                                </div>
                            </div>
                        </div>
                        <div class="thankscomman" id="cmntMsg" style="display:none">
                            <div class="simthkscomment">Thank you for submitting your valuable comment.</div>
                        </div>
                        <form id="commentForm" method="post">
                            <input type="hidden" name="conid" value="{{$article->item_id}}">
                            <div class="row rownewmar formsection commentsblk" id="commentplace">
                                <div class="artibtmhead">Comment</div>
                                <div class="bor-radius backwhite ovfl margintb20 pad20">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/user.png')}}" alt="user"></span>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="{{url('images/email.png')}}" alt="email"></span>
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
                                                    <span class="input-group-addon height100"><img class="lozad" data-src="{{url('images/addreess.png')}}" alt="address"></span>
                                                    <textarea class="form-control height100" name="comment" id="comment" placeholder="Enter Your Comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-2 selfix">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img class="lozad" data-src="https://www.franchiseindia.com/images/star.png" src="https://www.franchiseindia.com/images/star.png" data-loaded="true" alt="star"></span>
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
                            </div>
                        </form>
                    </div>
                </div>

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
                                @if ($agent->isDesktop()  || $agent->isTablet())

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
                <div class="row maysection">
                    <div class="col-xs-12 col-sm-12 col-md-12 artibtmhead">You May Like</div>
                    @foreach($likeArticles as $article)
                        @if($loop->index < 9)
                            @php
                                $site = Config('constants.articleArr.'.$article['site_type']);
                                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                                $image = Config('constants.awsS3Url').$article['image'];
                                $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                                if ( $article['site_type'] == 'ga' ) {
                                    $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
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
            @include("includes/magazine/rightpanelcomman")
        </div>
    </div>
    <div class="artibottombanner">
        <div class="fullcontainer">
            @if ($agent->isDesktop())

            {{-- @desktop --}}
            @include("includes.banners.dfp_970X250")

            {{-- @enddesktop --}}
            @elseif ($agent->isDesktop()  || $agent->isTablet())

            {{-- @tablet --}}
            <div class="text-center">
                <div id='adslot468x60_ACS'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot468x60_ACS'); });
                    </script>
                </div>
            </div>
            {{-- @endtablet --}}
            @elseif ($agent->isMobile())

            {{-- @mobile --}}
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
                    @if($loop->index > 8 && $loop->index < 11)
                        @php
                            $site = Config('constants.articleArr.'.$article['site_type']);
                            //$kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
							$kicker = 'https://opportunityindia.franchiseindia.com/english/tag/'.$article['urlKicker'];
                            $image = Config('constants.awsS3Url').$article['image'];
                            //$url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
							$url    = 'https://opportunityindia.franchiseindia.com/article/'.$article['slug'].'-'.$article['content_id'];
                            if ( $article['site_type'] == 'ga' ) {
                                $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                                $image = $article['image'];
                                $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            }
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="img-txtlayout">
                                <div class="img-valayout">
                                    <a target="_blank" href="{{ $url }}">
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
                                            <span><a target="_blank" href="{{  $kicker }}">{{$article['kicker']}}</a></span>
                                        </div>
                                        <div class="show-an-txt">
                                            <a target="_blank" href="{{ $url }}">
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
                       // $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
					    $kicker = 'https://opportunityindia.franchiseindia.com/english/tag/'.$article['urlKicker'];
                        $image = Config('constants.awsS3Url').$article['image'];
                       // $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
					    $url   = 'https://opportunityindia.franchiseindia.com/article/'.$article['slug'].'-'.$article['content_id'];
                        if ( $article['site_type'] == 'ga' ) {
                            $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                            $image = $article['image'];
                            $url = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                        }
                    @endphp
                    @if ( $loop->index > 10 )
                        <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                            <div class="artifotbtmimg">
                                <a target="_blank" href="{{ $url }}">
                                    @if( $site == "gallery")
                                        <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}" alt="image"></div>
                                    @endif
                                    <img class="lozad" data-src="{{ $image }}" alt="{{$article['title']}}">
                                </a>
                            </div>
                            <div class="artbtmsubhead">
                                <a target="_blank" href="{{ $kicker }}">{{$article['kicker']}}</a>
                            </div>
                            <div class="artbtmtext">
                                <a target="_blank" href="{{ $url }}">
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
    <script>$("#commentForm").validate({rules:{name:{required:true,accept:"[a-zA-Zs]+",minlength:3,maxlength:35},email:{required:true,email:true},mobile:{required:true,number:true},comment:"required"},messages:{name:"",email:"",mobile:"",comment:""},errorPlacement:function(a,b){a.appendTo(b.parent().parent())},submitHandler:function(){var a=$("#commentForm");$.ajax({type:"POST",url:"/magazinecomments",dataType:"json",data:a.serialize(),success:function(c){if(parseInt(c)===1){a.hide();document.getElementById("cmntMsg").style.display="block"}else{}}})}});</script>
@endsection