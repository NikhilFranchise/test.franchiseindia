@extends('layout.master')
@section('seoTitle', $newsDetails['title'])
@section('seoDesc', $newsDetails['shortDesc'])
@section('seoKeywords', $newsDetails['kicker'])
@section('canonicalUrl', url()->current())
@section('image', $newsDetails['image'])
@section('shortDesc', $newsDetails['shortDesc'])
@section('imagesrc', $newsDetails['image'])
@section('title', $newsDetails['title'])
@section('url', url()->current())
@section('content')

    <div class="container articlesection">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url(request()->segment(1)) }}">Insights</a></li>
                    <li class="active">{{ $newsDetails['title'] }}</li>
                </ol>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="artimainhead">
                <a href="">{{ $newsDetails['kicker'] }}</a>
                <span>
                    {{ substr($newsDetails['created_at'], 0, -9) }}
                </span>
            </div>
            <h1 class="pagehead">{{ $newsDetails['title'] }}</h1>
            <p class="pagetxt">{{ $newsDetails['shortDesc'] }}</p>
        </div>
        <!--<div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4">
       
      </div>

      <div class="col-xs-12 col-sm-7 col-md-7 pull-right">
       <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 pull-left">
         <div class="addthis_sharing_toolbox" data-media="{{ Config('constants.awsS3Url') . $newsDetails['image'] }}"></div>
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
     </div>-->




        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
                <div class="abigima">
                    <img itemprop="image" itemscope itemtype="https://schema.org/ImageObject"
                        src="{{ Config('constants.awsS3Url') . $newsDetails['image'] }}" alt="{{ $newsDetails['title'] }}">
                </div>
                <div class="clr"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">

                        @php
                            echo html_entity_decode($newsDetails['content']);
                        @endphp
                    </div>
                    <div id="v-franchiseindia"></div>
                    <script>
                        (function(v, d, o, ai) {
                            ai = d.createElement("script");
                            ai.defer = true;
                            ai.async = true;
                            ai.src = v.location.protocol + o;
                            d.head.appendChild(ai);
                        })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                    </script>

                    <div class="sidemediablk" id="scrollmedia">
                        <ul class="sidemedia" style="display:none;">
                            <li><a href="whatsapp://send?text={{ request()->url() }}"
                                    data-text="{{ $newsDetails['title'] }}" data-action="share/whatsapp/share"><img
                                        class="lozad" alt="whatsapp icon"
                                        data-src="{{ url('images/side-whatsapp.png') }}" /></a></li>
                            <li><a
                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->url() }}&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn"><img
                                        class="lozad" data-src="{{ url('images/side-linkedin.png') }}"
                                        alt="linkedin icon" /></a></li>
                            <li><a class="twitter-share-button"
                                    href="https://twitter.com/intent/tweet?url={{ request()->url() }}" target="_blank"><img
                                        class="lozad" alt="twitter icon"
                                        data-src="{{ url('images/side-twitter.png') }}" /></a></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"
                                    target="_blank"><img class="lozad" data-src="{{ url('images/side-facbook.png') }}"
                                        alt="facebook icon" /></a></li>
                        </ul>
                        <div class="sibtn"><img class="lozad" data-src="{{ url('images/side-sharebtn.png') }}"
                                alt="share button" /></div>
                    </div>


                    <div class="thankscomman" id="cmntMsg" style="display:none">
                        <div class="simthkscomment">Thank you for submitting your valuable comment.</div>
                    </div>
			</div>
            </div>

            <!--inner right panel start here -->
            <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
                <!--next article section start here-->
                @if (count($nextArticle[0]) != 0)
                    <div class="contiblk">
                        <div class="contiblk">
                            <div class="conh">
                                <a
                                    href="{{ Config('constants.MainDomain') }}/insights/{{ $nextArticle[0]['slug'] }}.{{ $nextArticle[0]['news_id'] }}">Continue
                                    to next article</a>
                                <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="rigtimg">
                                        <a href="#">
                                            <img src="{{ Config('constants.awsS3Url') . $nextArticle[0]['image'] }}"
                                                alt="{{ $nextArticle[0]['title'] }}" />
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                                    <div class="rightsubhead">
                                        <a
                                            href="{{ Config('constants.MainDomain') }}/insights/{{ str_slug($nextArticle[0]['kicker']) }}">
                                            {{ $nextArticle[0]['kicker'] }}
                                        </a>
                                    </div>
                                    <div class="righttartsidetext">
                                        <a
                                            href="{{ Config('constants.MainDomain') }}/insights/{{ $nextArticle[0]['slug'] }}.{{ $nextArticle[0]['news_id'] }}">
                                            @if (empty($nextArticle[0]['title']))
                                                {{ substr($nextArticle[0]['title'], 0, 50) }}
                                            @else
                                                {{ substr($nextArticle[0]['title'], 0, 50) }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @include('includes.magazinesubscribe')

                <!-- Dailiy updates start here -->
                <div class="sidearce">
                    <div class="bor-radius backgrey pad20 ovfl">
                        <div class="arthads">Daily Updates</div>
                        <form id="update" method="post"
                            action="{{ Config('constants.MainDomain') }}/newslettersignup">
                            <div class="form-group posl">
                                <input type="hidden" name="site_type" value="news">
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your Email Id">
                                <input type="submit" class="btn btn-default addoncb" value="Signup" id="btnupdate" />
                            </div>
                        </form>
                        <div class="newlertxt">Submit your email address to receive the latest updates on news & host of
                            opportunities </div>

                    </div>
                </div>
                <!-- Dailiy updates end here -->
                <div class="sidearce">
                    <div class="mhead">Most Shared</div>
                    @foreach ($likeArticles as $article)
                        @php
                            $image = Config('constants.awsS3Url') . $article['image'];
                            $url = Config('constants.MainDomain') . '/insights/' . $article['slug'] . '.' . $article['news_id'];
                        @endphp
                        <div class="rigtxtcontain">
                            <div class="artsidesubhead">
                                <a href="#"> {{ $article['kicker'] }} </a>
                            </div>
                            <div class="rightartsidetext">
                                <a href="{{ $url }}">
                                    {{ substr($article['title'], 0, 50) }}..
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>



                <div class="sidearce">
                    <div class="mhead">Trending</div>
                    @foreach ($trendArticles as $article)
                        @php
                            $image = Config('constants.awsS3Url') . $article['image'];
                            $url = Config('constants.MainDomain') . '/insights/' . $article['slug'] . '.' . $article['news_id'];
                        @endphp
                        <div class="rigtxtcontain">
                            <div class="artsidesubhead">
                                <a href="#"> {{ $article['kicker'] }} </a>
                            </div>
                            <div class="rightartsidetext">
                                <a href="{{ $url }}">
                                    {{ substr($article['title'], 0, 50) }}..
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (count($nextArticle[0]) != 0)
                    <div class="contiblk">
                        <div class="contiblk">
                            <div class="conh">
                                <a
                                    href="{{ Config('constants.MainDomain') }}/insights/{{ $nextArticle[0]['slug'] }}.{{ $nextArticle[0]['news_id'] }}">Continue
                                    to next article</a>
                                <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="rigtimg">
                                        <a href="#">
                                            <img src="{{ Config('constants.awsS3Url') . $nextArticle[0]['image'] }}"
                                                alt="{{ $nextArticle[0]['title'] }}" />
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                                    <div class="rightsubhead">
                                        <a
                                            href="{{ Config('constants.MainDomain') }}/insights/{{ str_slug($nextArticle[0]['kicker']) }}">
                                            {{ $nextArticle[0]['kicker'] }}
                                        </a>
                                    </div>
                                    <div class="righttartsidetext">
                                        <a
                                            href="{{ Config('constants.MainDomain') }}/insights/{{ $nextArticle[0]['slug'] }}.{{ $nextArticle[0]['news_id'] }}">
                                            @if (empty($nextArticle[0]['title']))
                                                {{ substr($nextArticle[0]['title'], 0, 50) }}
                                            @else
                                                {{ substr($nextArticle[0]['title'], 0, 50) }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif



            </div>
        </div>
    </div>
@endsection
