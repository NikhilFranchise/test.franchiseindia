@php
$art = new \App\Http\Controllers\NewArticleController();
@endphp

@if(Request::segment(1) != 'hi')
<div class="contentblk">
    <div class="data" data-id="{{$nextArticle[0]->content_id}}" data-href="/newcontent/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
    <div class="container">
        <div class="catlinks"><a href="{{ Config('constants.MainDomain') }}/newcontent/{{$nextArticle[0]['urlKicker']}}">{{ucwords($nextArticle[0]->kicker)}}</a></div>
        <h1>{{$nextArticle[0]->title}}</h1>
        <div class="authblk">
            <div class="autimg"><img src="{{(!empty($authorDesc->image) ? (Config('constants.awsS3Url').$authorDesc['image']) : (\Illuminate\Support\Facades\URL::asset('images/user1.png')))}}" alt="@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif"></div>
            <div class="autinfo">
                <span><a href="{{ Config('constants.MainDomain') }}/newcontent/author/{{$art->slugify($authorDesc->title)}}">@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif</a></span>
                @php $lenght = strlen($nextArticle[0]['content']);
                    $time = ($lenght/200); @endphp
                @php
                    echo date('F d Y', strtotime($nextArticle[0]['time'])); //June 01 2017
                @endphp - {{(int)$time}} min read
            </div>
        </div>
    </div>
</div>


<div class="contentarea">

    <div class="imgblk">
        <img src="{{Config('constants.awsS3Url').$nextArticle[0]->image}}" alt="{{$nextArticle[0]->title}}">
    </div>


{{--    @include('includes.article1.socialcomment')--}}

    <div class="shortdes">
        {{$nextArticle[0]['shortDesc']}}
    </div>

    <div class="articlecontent">
        @php
            $custom_data = explode("\r\n", $nextArticle[0]['content']);
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

    <!--  -->


</div>


@include('includes.article1.magblock')
<!-- Some content after mag sub start here  -->
    <div class="contentarea">
{{--        @include('includes.article1.socialcomment')--}}
        @include('includes.article1.subscribenewsletter')
    </div>
    <!-- Some content after mag sub end  here  -->


@include('includes.article1.youmaylike')
<!--  -->






<!-- repeat article start here -->
{{--@include('includes.article1.commanrepeat')--}}
<!-- repeat article end here -->
@endif

@if(Request::segment(1) == 'hi')
        <?php $tagName = \App\SeoTagHindi::query()->where('tag_id',$nextArticle->kicker)->first(); ?>
        <div class="contentblk">
            <div class="data" data-id="{{$nextArticle->content_id}}" data-href="/hi/newcontent/{{$nextArticle->english['slug']}}.{{$nextArticle['content_id']}}">
                <div class="container">
                    <div class="catlinks"><a href="{{ Config('constants.MainDomain')}}/hi/newcontent/{{$tagName->name}}/{{$tagName->tag_id}}">{{($tagName->name)}}</a></div>
                    <h1>{{$nextArticle->title}}</h1>
                    <div class="authblk">
                        <div class="autimg"><img src="{{(!empty($authorDesc->image) ? (Config('constants.awsS3Url').$authorDesc['image']) : (\Illuminate\Support\Facades\URL::asset('images/user1.png')))}}" alt="@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif"></div>
                        <div class="autinfo">
                            <span><a href="{{ Config('constants.MainDomain') }}/hi/newcontent/author/{{$art->slugify($authorDesc->title)}}">@if(!empty($authorDesc->title)){{$authorDesc->title}}@endif</a></span>
                            @php $lenght = strlen($nextArticle['content']);
                    $time = ($lenght/200); @endphp
                            @php
                                echo date('F d Y', strtotime($nextArticle['created_at'])); //June 01 2017
                            @endphp - {{(int)$time}} min read
                        </div>
                    </div>
                </div>
            </div>


            <div class="contentarea">

                <div class="imgblk">
                    <img src="{{Config('constants.awsS3Url').$nextArticle->english->image}}" alt="{{$nextArticle->title}}">
                </div>


{{--                @include('includes.article1.socialcomment')--}}

                <div class="shortdes">
                    {{$nextArticle['short_desc']}}
                </div>

                <div class="articlecontent">
                    @php
                        $custom_data = explode("\r\n", $nextArticle['content']);
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
                                <li> <a href="{{ Config('constants.MainDomain') }}/hi/newcontent/{{$value['urlSlug']}}">{{$value['name']}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        @include('includes.article1.magblock')

        <!-- Some content after mag sub start here  -->
            <div class="contentarea">
{{--                @include('includes.article1.socialcomment')--}}
                @include('includes.article1.subscribenewsletter')
            </div>
        <!-- Some content after mag sub end  here  -->


        @include('includes.article1.youmaylike')
        <!--  -->

            @endif