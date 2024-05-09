@extends('layout-hindi.master')
@section('seoTitle', 'फ़्रेंचाइज़िंग लेख और जानकारी, नए व्यापार बनाना | Franchise Articles and Information in hindi - Franchise Indiax')
@section('seoDesc', 'फ्रेंचाइजी लेखों के हमारे नवीनतम और लोकप्रिय संग्रह को पढ़ें, नए व्यवसाय के विचार, फ्रेंचाइजी की जानकारी और फ़्रैंचाइज़ी के अवसर शामिल हैं')
@section('seoKeywords', 'best franchise, franchising, new business ideas, buy franchise, franchise information, small franchise business, best franchise business company in India')
@section('prev', $articles->previousPageUrl())
@section('next', $articles->nextPageUrl())
@php
    $hindiUrl = url('/hi/content');//str_replace( '/category/', '/hi/category/', str_replace('/business-opportunities/', '/hi/business-opportunities/', url()->current()));
    $engUrl   = url('/content');//url()->current();
@endphp

@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)

@section('hindibrandUrls')
    <link href="{{ url()->to('/amp/hi/content') }}" rel="amphtml">
    <link rel="alternate" href="{{ Config('constants.MainDomain') }}/content" hreflang="en-IN" />
    <link rel="alternate" href="{{ Config('constants.MainDomain') }}/hi/content" hreflang="hi-IN" />
@endsection

@section('content')

    <style>
        .hindiarticle .listhead { font-size: 24px;  line-height: 29px; }
        .hindiarticle .smallatcmost { padding-bottom: 10px; margin-bottom: 10px; }
        .hindiarticle span.text-contentnewlayout .show-an-txt572 { font-size: 26px; }
        .hindiarticle span.text-contentnewlayout .a-name-red span { font-size: 14px; }
    </style>

    <!-- more article section start here -->
    <div class="container mostpopu arttilist hindiarticle">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="bordertb singlehindi">नई कहानियां</h1>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt paddingright50">
                <div class="topcat"></div>
                <div class="row mostwnew">
                    
                    @foreach($articles as $article)
                        @if($loop->index == 0)
                        <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                            <div class="img-txtlayout572">
                                <div class="img-valayout572">
                                    <img class="lozad" data-src="{{ Config('constants.awsS3Url').$article->image }}"  alt="{{ $article->title }}">
                                </div>
                                <span class="text-contentnewlayout">
                                    <div class="text-rep-blk572">
                                        <div class="a-name-red singlehindi">
                                            <span>
                                                <a href="{{ Config('constants.MainDomain') }}/hi/content/{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}/{{ $article->hindi->kicker }}">{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}</a>
                                            </span>
                                        </div>
                                        <div class="show-an-txt572 singlehindi">
                                            <a href="{{Config('constants.MainDomain')}}/hi/{{ Config('constants.articleArr.'.$article->site_type) }}/{{ $article->slug }}.{{ $article->content_id }}">
                                                {{ $article->hindi->home_title }}
                                            </a>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    <div class="col-xs-12 col-sm-12 col-md-3 responwidmost">
                        <div class="headmost singlehindi">सबसे लोकप्रिय</div>
                        @foreach($articles as $article)
                            @if( $loop->index > 0 && $loop->index < 6 )
                            <div class="smallatcmost">
                                <div class="artbtmtext singlehindi">
                                    <a href="{{Config('constants.MainDomain')}}/hi/{{ Config('constants.articleArr.'.$article->site_type) }}/{{ $article->slug }}.{{ $article->content_id }}">
                                        {{$article->hindi->home_title}}
                                    </a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="borbtmdot"></div>
                    @foreach($articles as $article)
					             
                    @if($loop->index > 5)
                        <div class="row">
						
                            <div class="col-xs-12 col-sm-5 col-md-4 md1024yw4">
                                <div class="arti271"><img class="lozad" data-src="{{ Config('constants.awsS3Url').$article->image }}"  alt="{{ $article->hindi->title }}"></div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-8 md1024yw8">
                                <div class="listkick singlehindi">
                                    <a href="{{ Config('constants.MainDomain') }}/hi/content/{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}/{{ $article->hindi->kicker }}">{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}</a>
                                </div>
                                <div class="listhead singlehindi">
                                    <a href="{{ Config('constants.MainDomain') }}/hi/{{ Config('constants.articleArr.'.$article->site_type) }}/{{ $article->slug }}.{{ $article->content_id }}">
                                        {{$article->hindi->home_title}}
                                    </a>
                                </div>

                                <div class="listtext singlehindi">
                                    {{ $article->hindi->short_desc }}..
                                </div>

                                <div class="listauthor singlehindi">
                                    @php
                                        $tags    = [];
                                        foreach ($articleTags as $tag) {
                                            if( $article->content_id == $tag->content_id )
                                                array_push($tags, $tag->tag_id);
                                        }
                                        foreach ($seoTags as $tag) {
                                            foreach ($tags as $singleTag) {
                                                if( $singleTag == $tag->tag_id )
                                                    echo "<a href='".Config('constants.MainDomain')."/hi/content/".$tag->name."/".$tag->tag_id."'>".$tag->name."</a>, ";
                                            }
                                        }            
                                    @endphp                                                                        
                                    <span>{{ date_format(date_create( $article->time ), "M, d Y") }}</span>
                                </div>


                            </div>
                        </div>
						
                        <div class="borbtmdotarticle"></div>						


                        @if($loop->index == 10)
                            @include("includes.news.newsbottomlist")
                        @endif
                    @endif

                    @endforeach

                    {!! $articles->render() !!}
                    
                </div>
                <!--right section start here -->
                @include("includes/news/rightpanelcomman")
                <!--right section end here -->
            </div>
        </div>
        <!-- more article section end here -->
@endsection
