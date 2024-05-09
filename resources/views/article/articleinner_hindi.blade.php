@php
    $tagName = \App\SeoTagHindi::query()->where('tag_id',$article->hindi->kicker)->first();
    $seoTitle = $article->hindi->title;
    $seoKeywords = '';
    foreach ($seoVal as $tags) {
    $seoKeywords .= $tags->name .', ';
    }
    $tags = rtrim($seoKeywords, ', ');
    $hindiUrl = str_replace('/'.Request::segment(1).'/', '/hi/'.Request::segment(1).'/', url()->current());
    $engUrl = url()->current();
@endphp
@extends('layout.newArticalMaster')
@if($article->is_hindi == 1)
    @section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)
@section('hindibrandUrls')
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection
@endif
@php
    $seoDesc = $article->hindi->short_desc;
    if(empty($seoDesc))
    $seoDesc = strip_tags(implode('. ', array_slice(explode('.', substr($article->hindi['content'], 0, 250)), 0, 2)) . '.');
@endphp
@if($article->is_noindexnofollow == 1)
    @section('robot', 'noindex, nofollow')
@endif
@section('seoTitle', $article->hindi->title)
@section('seoDesc', $seoDesc)
@section('seoKeywords',$tags)
@section('canonicalUrl', $redirectUrl)
@section('image', Config('constants.awsS3Url').$article->image)
@section('shortDesc',$article->hindi->short_desc)
@section('imagesrc', Config('constants.awsS3Url').$article->image)
@section('title',$article->hindi->title)
@section('url',url()->current())
@section('createTime', date('c', strtotime($article->hindi->created_at)))
@section('updateTime', date('c', strtotime($article->hindi->updated_at)))
@section('content')
    @php
        $Data = array(
            "@context" => "https://schema.org/",
            "@type" => "Article",
            "mainEntityOfPage" => array(
            "@type" => "WebPage",
            "@id" => url()->current()
        ),

            "headline" => $article->hindi->title,
            "description" => $article->hindi->short_desc,
            "image" => array(
            "@type" => "ImageObject",
            "url" => Config('constants.awsS3Url').$article->image,
            "width" => "844",
            "height" => "474"
        ),
            "author" => array(
            "@type" => "Person",
            "name" => $article->hindi->author
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
            "datePublished" => date('c', strtotime($article->hindi->created_at)),
            "dateModified" => date('c', strtotime($article->hindi->updated_at))
        );
        $jsonData = json_encode($Data);
    @endphp




    <script>
        var ajaxcall = 'false'; 
        var lastScrollTop = 0;       
        $(document).scroll(function(e){
            let $winScrollTop = window.scrollY;
            setlinks($winScrollTop);            
            let $winHeight = window.innerHeight;
            let $total = $winScrollTop + $winHeight;
            let $docheight = document.documentElement.offsetHeight;
            let $diffHeight =  $docheight - $total;
            if($diffHeight > 1500 && $diffHeight < 1700) {
               let Id = $(".checktocallnextarticle").attr('data-searchId')
               if(ajaxcall === 'false') getNextArticle(Id);
            }
        })
      
        function setlinks($sTop)
        {
            var currentHash = "#one";
            let div = document.querySelectorAll(".contentblk:not(:nth-child(1))");
            Array.from(div).forEach(e=>{
                let topY = e.offsetTop-0; //You can set space from top ofset     
               // let distance = (window.pageYOffset + window.innerHeight) - topY; 
               let distance = window.pageYOffset - topY;
               //console.log('st=>',st);
               //console.log('lastScrollTop=>',lastScrollTop);
               // downscroll code
                hash = e.querySelector('.data').getAttribute('data-href');
                let diff = lastScrollTop - $sTop;
                if(lastScrollTop > $sTop){console.log('helllll');
                    // upscroll code
                    hash = e.previousElementSibling.children[0].getAttribute('data-href');
                    console.log('hash=>',hash);console.log('distancedistance=>',distance);
                    if ((distance < 0)  && currentHash != hash) {  
                        console.log('SININ=>',hash);
                        window.history.pushState({}, null, hash);
                        currentHash = hash;
                        lastScrollTop = $sTop;
                        return false; 
                                                                     
                }

                }
                //console.log('CH=>',currentHash);
                //console.log('hash=>',hash);
                if ((distance < 30 && distance > -30)  && currentHash != hash) {  
                   console.log('ININ=>',hash);
                        window.history.pushState({}, null, hash);
                        currentHash = hash;
                        lastScrollTop = $sTop;
                        return false; 
                                                                     
                }
            });
            //lastScrollTop = $sTop;               
        }

    function getNextArticle(contentid)
    {   
        ajaxcall = 'true';
        $.ajax({
            type: "GET",
            url: '{{ url("hi/next-article") }}',
            data: {"contentId" : contentid},
            })
            .done(function( msg ) {
                                    if (typeof msg.message !== "undefined"){return false;}                             
                                    $( ".checktocallnextarticle" ).before( msg );
                                    let searchIdAfter = $(msg).find('.data').attr('data-id');
                                    $( ".checktocallnextarticle" ).attr('data-searchId',searchIdAfter);
                                    ajaxcall = 'false';
                                     var swiper = new Swiper('.maycontentblk .swiper-container', {
                                                                slidesPerView: 1,
                                                              spaceBetween: 10,
                                                            loop: false,
                                                                     // AutoPlay            
                                                         autoplay: {
                                                            delay: 2500,
                                                          speed: 1200,
                                                             disableOnInteraction: true,
                                                          watchSlidesProgress: true,
                                                          watchVisibility: true,
                                                          },
                                                                  
                                                            // init: false,
                                                              pagination: {
                                                                el: '.maycontentblk  .swiper-pagination',   
                                                                clickable: true,
                                                              },
                                                             navigation: {
                                                                nextEl: '.maycontentblk .swiper-button-next',
                                                                prevEl: '.maycontentblk .swiper-button-prev',
                                                              },
                                                            keyboard: {
                                                          enabled: true,
                                                          onlyInViewport: true,
                                                        },
                                                            
                                                              breakpoints: {
                                                                320: {
                                                                  slidesPerView:  1.5,
                                                                  spaceBetween: 20,
                                                                },
                                                                768: {
                                                                  slidesPerView: 3,
                                                                  spaceBetween: 40,
                                                                },
                                                                1024: {
                                                                  slidesPerView: 6,
                                                                  spaceBetween: 15,
                                                                },
                                                              }
                                                            });
        });

    }    

    window.onload = (event) => {
                                    setTimeout(function(){ 
                                                            getNextArticle({{$article->content_id}});
                                                            return false;

                                     }, 2000);
                                }    
                                                                              
    </script>

<div class="maininnver">

    <div class="adsblk">
        <div class="adswidth970"> Ads 970 * 90</div>
    </div>

    <div class="contentblk">
        <div class="data" data-id="{{$article->content_id}}" data-href="/hi/newcontent/{{$article['slug']}}.{{$article['content_id']}}">
        <div class="container">
            <div class="catlinks"><a href="{{ Config('constants.MainDomain') }}/hi/newcontent/{{($tagName->name)}}/{{$tagName->tag_id}}">{{($tagName->name)}}</a></div>
            <h1>{{$article->hindi->title}}</h1>
            <div class="authblk">
                <div class="autimg"><img src="{{(!empty($authorDesc->image) ? (Config('constants.awsS3Url').$authorDesc['image']) : (\Illuminate\Support\Facades\URL::asset('images/user1.png')))}}" alt="@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif"></div>
                <div class="autinfo">
                    <span><a href="{{ Config('constants.MainDomain') }}/hi/newcontent/author/{{$authorDesc->slug}}">@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif</a></span>
                   @php $lenght = strlen($article->hindi['content']);
                    $time = ($lenght/200); @endphp
                    @php
                        echo date('F d Y', strtotime($article['time'])); //June 01 2017
                    @endphp - {{(int)$time}} min read
                </div>
            </div>
        </div>
    </div>


    <div class="contentarea">

        <div class="imgblk">
            <img src="{{Config('constants.awsS3Url').$article->image}}" alt="{{$article->hindi->title}}">
        </div>


{{--        @include('includes.article1.socialcomment')--}}

        <div class="shortdes">
            {{$article->hindi['short_desc']}}
        </div>

        <div class="articlecontent">
            @php
                $custom_data = explode("\r\n", $article->hindi['content']);
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

            @endphp
            {!!$resultArticle!!}

            <div class="tag-block">
                <ul class="tag-list">

                    @foreach($seoVal as $value)
                        <li> <a href="{{ Config('constants.MainDomain') }}/newcontent/{{$value['urlSlug']}}">{{$value['name']}}</a> </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>

    @include('includes.article1.magblock')
<!-- Some content after mag sub start here  -->
    <div class="contentarea">
{{--        <div class="articlecontent">--}}
{{--            <p><strong>In this newly created role, Mundra will be responsible for the company's car business in India, while closely working with the co-founders to device an expansion strategy.</strong></p>--}}

{{--            <p>Commenting on the new appointment, Vikram Chopra, Co-Founder and CEO, CARS24 India, said, “I am delighted to have Kunal Mundra join our team at CARS24. In his new role, Kunal will help future proof the brand as we continue to grow and revolutionise the way Indians buy or sell pre-owned vehicles.”</p>--}}
{{--        </div>--}}

{{--        @include('includes.article1.socialcomment')--}}
        @include('includes.article1.subscribenewsletter')
    </div>
    <!-- Some content after mag sub end  here  -->
    <!--  -->

    @include('includes.article1.youmaylike')
<!--  -->
    </div>



{{--    <!-- repeat article start here -->--}}
{{--@include('includes.article1.commanrepeat')--}}
{{--<!-- repeat article end here -->--}}




<div class="checktocallnextarticle"></div>
</div>


@endsection


