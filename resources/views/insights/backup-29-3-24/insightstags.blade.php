@extends('layout.insights.master')
@section('content')
<div class="maininnver homeh">
    <div class="container">
        <h1 class="cathead">{{ $data['name'] }}</h1>
    </div>

    <div class="listblk">
        <div class="container">
            <ul class="artilsit">
                @foreach($articlesList as $List)
                @if(!empty($List))
                @php 
                    $image = Config('constants.awsS3Url') . $List->image; 
                    $url = Config('constants.MainDomain') . '/insights/' . strtolower($List->insight_type) . '/' . $List->slug . '.' . $List->news_id;
                 @endphp
                 
                 @foreach($List->author as $author)
                    @php
                        $authorname = $author->title;
                        $authorUrl = Config('constants.MainDomain') . '/author/' . $author->slug .'-' . $author->author_id;
                        if(!empty($author->image)){ 
                        $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'. $author->image; 
                        }else{ 
                        $author_image = url('images/defaultuser.png'); 
                        } 
                @endphp
                @endforeach
                <li>
                    <div class="artimgblk">
                        <a href="{{$url}}"><img src="{{$image}}" alt="{{$List->title. ' image'}}" /></a>
                    </div>
                    <div class="artcontent">
                        {{-- <div class="catname"><a href="">{{$data['name']}}</a></div> --}}
                        <div class="haedname"><a href="{{$url}}">{{$List['title']}}</a></div>
                        <div class="authblk cot">
                            <div class="autimg"><img src="{{$author_image}}" alt="{{$authorname}}" /></div>
                            <div class="autinfo">
                                <span><a href="{{$authorUrl}}">{{$authorname}}</a></span>
                                {{date('M d, Y ',strtotime($List['created_at']))}} - {{\App\Http\Controllers\InsightsController::calculateReadTime($List)}} min read
                            </div>
                        </div>
                        <div class="stext">
                            {{html_entity_decode(strip_tags(\Illuminate\Support\Str::words($List->content, 55 , ' ...')), ENT_QUOTES | ENT_HTML5 , 'UTF-8') }}
                        </div>
                        <div class="scbk">
                          
                            <div class="shrblk">
                                <span class="inshrblk">
                                    <a href="">
                                        <img src="{{url('insight-new/images/smallshare.svg') }}" class="inimg" /> Share
                                        <div class="sfv">
                                            <div class="innersfv" onclick=""><img src="{{url('insight-new/images/facebookcard.svg') }}" /></div>
                                            <div class="innersfv" onclick=""><img src="{{url('insight-new/images/twittercard.svg') }}" /></div>
                                            <div class="innersfv" onclick=""><img src="{{url('insight-new/images/linkedincard.svg') }}" /></div>
                                            <div class="innersfv" onclick=""><img src="{{url('insight-new/images/mailcard.svg') }}" /></div>
                                        </div>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>

               
                @endif
                @endforeach
               
            </ul>
            <div class="d-felx justify-content-center">
                {{ $articlesList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    @include("layout.insights.magblock")

    <!-- another list end here  -->
    
     @include("layout.insights.brandlist")
</div>
@endsection