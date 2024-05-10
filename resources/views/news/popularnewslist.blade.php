@extends('layout.master')
@section('seoTitle', 'Todays highlights')
@section('seoDesc',  'latest articles')
@section('seoKeywords', 'Todays highlights')
@section('prev', $articles->previousPageUrl() )
@section('next', $articles->nextPageUrl() )
@section('content')

<style type="text/css">
   .gallopt { position:absolute; z-index:1; top:10px; right:10px;} 
   .gallopt img{ border:none!important;}
</style>
@php
$type1 = 'Popular';
$type2 = 'Most Commented';
$url   = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
@endphp
<!-- more article section start here -->
<div class="container mostpopu arttilist">
   <div class="row">
       <div class="col-xs-12">
           <div class="bordertb">
               @if(strpos($url,'/popular') != false)
                   {{$type1}}
               @elseif(strpos($url,'/commented') != false)
                   {{$type2}}
               @else
                   Latest
               @endif
           </div>
       </div>
   </div>
   <div class="row row-no-margin">
      <div class="col-xs-12 col-sm-12 col-md-9 tablwidt  paddingright50">
          <div class="topcat"></div>

          <div class="row mostwnew">
              <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                  @php
                     //  $site   = Config('constants.articleArr.'.$most[0]['news_type']);
                      $image  = Config('constants.awsS3Url').$most[0]['image'];
                      $url    = Config('constants.MainDomain').'/insights/'.$most[0]['slug'].'.'.$most[0]['news_id'];

                     // //  if ( $most[0]['news_type'] == 'ga' ) {
                     //      $image  = $most[0]['image'];
                     //      $url    = Config('constants.MainDomain').'/insights/'.str_slug($most[0]['title']).'.'.$most[0]['news_id'];
                     // //  }
                  @endphp
                  <div class="img-txtlayout572">
                     <div class="img-valayout572">
                         {{-- @if( $site == "gallery")  --}}
                            {{-- <div class="gallopt"><img src="{{url('images/galleyicon.png')}}" alt="gall"></div> --}}
                         {{-- @endif --}}
                         <a href="{{ $url }}">
                             <img src="{{ $image }}" alt="{{substr($most[0]['title'],0,50)}}">
                         </a>
                     </div>
                     <span class="text-contentnewlayout">
                        <div class="text-rep-blk572">
                            <div class="show-an-txt572">
                                <a href="{{ $url }}">
                                    @if(empty($most[0]['homeTitle']))
                                        {{substr($most[0]['title'],0,50)}}
                                    @else
                                        {{substr($most[0]['homeTitle'],0,50)}}..
                                    @endif
                                </a>
                            </div>
                            <div class="authn572">
                                @if(empty($most[0]['author']))
                                    By {{$most[0]['author']}}
                                @endif
                            </div>
                        </div>
                    </span>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3 responwidmost">
               <div class="headmost">Most Popular</div>
                   @foreach($popularArticles as $article)
                       @php
                           // $site   = Config('constants.articleArr.'.$article['site_type']);
                           $url    = Config('constants.MainDomain').'/insights/'.$article['slug'].'.'.$article['news_id'];

                           // if ( $article['site_type'] == 'ga' ) {
                           //     $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                           // }
                       @endphp
                   <div class="smallatcmost">
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
               @endforeach
           </div>
          </div>
          <div class="borbtmdot"></div>
                @foreach($articles as $article)
                    @php
                        $a     = date_create($article['time']);
                        $date  = date_format($a,"M, d Y");
                        // $site   = Config('constants.articleArr.'.$article['site_type']);
                        $kicker = Config('constants.MainDomain').'/insights/'.$article['urlKicker'];
                        $image  = Config('constants.awsS3Url').$article['image'];
                        $url    = Config('constants.MainDomain').'/insights/'.$article['slug'].'.'.$article['news_id'];

                        /* if ( $article['site_type'] == 'ga' ) {
                            $kicker = Config('constants.MainDomain').'/insights/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                            $image  = $article['image'];
                            $url    = Config('constants.MainDomain').'/insights/'.$article['slug'].'.'.$article['news_id'];
                         }*/
                    @endphp
                    <div class="row sec-slide-effect">
                     <div class="col-xs-12 col-sm-4 col-md-4 md1024yw4">
                         <div class="arti271">
                             {{-- @if( $site == "gallery")  --}}
                                {{-- <div class="gallopt"><img src="{{url('images/galleyicon.png')}}" alt="gall"></div> --}}
                             {{-- @endif --}}
                             <a href="{{ $url }}">
                                 <img src="{{ $image }}" alt="{{$article['title']}}">
                             </a>
                         </div>
                     </div>
                     <div class="col-xs-12 col-sm-8 col-md-8 md1024yw8">
                         <div class="listkick">
                             <a href="{{ $kicker }}">
                                 {{$article['kicker']}}
                             </a>
                         </div>

                         @if(empty($article['homeTitle']))
                             <div class="listhead">
                                 <a href="{{ $url}}">{{$article['title']}}</a></div>
                         @else
                             <div class="listhead"><a href="{{ $url }}">{{$article['homeTitle']}}</a></div>
                         @endif
                         <div class="listtext">
                             {{$article['shortDesc']}}
                             @if(empty($article['shortDesc']))
                                 @if(!empty($article['content']))
                                     {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 200)))}}..
                                 @endif
                             @endif
                         </div>
                         {{-- <div class="listauthor">By <a>{{$article['author']}}</a>
                             <span>
                                 {{$date}}
                             </span>
                         </div> --}}
                     </div>
                 </div>
                 <div class="borbtmdotarticle"></div>
                     @if($loop->index == 4)
                     @include('includes/mycatbottomarticlelist')
                     <div class="borbtmdotarticle"></div>
                 @endif

         @endforeach
         {{ $articles->links() }}
      </div>
<!--right section start here -->
<div class="col-xs-12 col-sm-3 hidden-xs hidden-sm hiddcontain col-md-3 row-no-padding">
   <!-- magazine Subscribe code start here -->
   @include('includes.magazinesubscribe')
   <!-- magazine Subscribe code start here -->
   {{-- @notmobile --}}
   @if ($agent->isTablet() || $agent->isDesktop())

   <div class="sidearce">
       @include('includes.banners.dfp_600X300')
   </div>
@endif
   {{-- @endnotmobile --}}
   @include('includes.article.newsection')
   <div class="sidearce">
       @include('includes.banners.yahoo_300X250')
   </div>
   {{-- @include('includes.article.videosection') --}}
   <div class="sidearce">
       @include('includes.banners.dfp_300X250')
   </div>
</div>
<!--right section end here -->
</div>
</div>
<!-- more article section end here -->
@endsection