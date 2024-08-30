@extends('layout.insights.master')
@section('content')
<div class="maininnver homeh">

    <div class="authblk">
   <div class="container">
   
   
   <ul class="nabva">
   <li><a href="{{URL::to('/insights')}}">Home</a></li>
   <li>/</li>
   <li>{{$author->title}}</li>
   </ul>
   @php 
    if(!empty($author->image)){
        $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'.$author->image;
    }
    else{ 
        $author_image = url('images/defaultuser.png'); 
        }
    
   @endphp
   
   <div class="row">
     <div class="col-4 col-sm-4 col-md-3 artublk1">
       <div class="imgprolist"><a href="javascript:void();"><img alt="{{$author->title}}" src="{{$author_image }}"></a></div>
   
     </div>
   
     <div class="col-8 col-sm-8 col-md-9 artublk2">
       <div class="authorcontent">
       <h1>{{$author->title}}</h1>
       <div class="jobprofile">{{$author->designation}}</div>
          
           @if(strlen(strip_tags($author->text)) == 50)
                 <p>{!!$author->text!!}</p>
           @endif
   
       <div class="usblk">
           @if(!empty($author->twitter_profile))<div class="usblkinner"><a href="{{($author->twitter_profile)? $author->twitter_profile : 'javascript:;' }}"><img alt="" src="{{url('images/twittercard.svg')}}"></a></div>@endif
           @if(!empty($author->linkedin_profile))<div class="usblkinner"><a href="{{($author->linkedin_profile)? $author->linkedin_profile : 'javascript:;' }}"><img alt="" src="{{url('images/linkedincard.svg')}}"></a></div>@endif
   </div>
   </div>
   
   
     </div>
   </div>
   
   </div>
   </div>
   
   @if($articleCount > 0)
   <div class="listblk">
     <div class="container">
   <ul class="artilsit">
   @foreach($article as $art)
   
    @php 
         

        $image = Config('constants.awsS3Url') . $art->image; 
        $url = Config('constants.MainDomain') . '/insights/' . strtolower($art->insight_type) . '/' . $art->slug . '.' . $art->news_id; 
        if(!empty($author->image)){ 
        $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'.($author->image); 
        }else{ 
        $author_image = url('images/defaultuser.png'); 
        } 
        if (!empty($author->slug)) {
        $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $author->slug .'-' . $author->author_id;
    }else{
        $slug = strtolower(str_replace(' ','-', $author->title));
        $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $slug .'-' . $author->author_id;
    }
    @endphp
               
   <li>
   <div class="artimgblk">
       <a href=""><img src="{{$image}}" alt="{{$art->title. ' image'}}"></a>
   </div>
   <div class="artcontent">
   
   <div class="haedname"><a href="{{$url}}">{{$art->title}}</a></div>
   <div class="authblk cot">
   <div class="autimg"><img src="{{$author_image}}" alt="{{$author->title}}"></div>
   <div class="autinfo">
   <span><a href="{{$authorUrl}}">{{!is_null($author->title) ? $author->title : 'Franchise India Desk'}}</a></span>
   {{date('M d Y',strtotime($art->created_at))}} -
   {{app\Http\Controllers\InsightsController::calculateReadTime($art)}} min read
   </div>
   
   </div>
   <div class="stext">
    {{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($art->content, 55, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}

   </div>
   <div class="scbk">
    
    <div class="shrblk">
        <span class="inshrblk">
            <a href="">
                <img src="{{ url('insight-new/images/smallshare.svg') }}" class="inimg" />Share
                <div class="sfv">
                    <div class="innersfv" onclick="window.open('https://www.facebook.com/FranchiseIndiaMedia','_blank')"><img src="{{ url('insight-new/images/facebookcard.svg') }}" /></div>
                    <div class="innersfv" onclick="window.open('https://twitter.com/FranchiseIndia','_blank')"><img src="{{ url('insight-new/images/twittercard.svg') }}" /></div>
                    <div class="innersfv" onclick="window.open('https://www.instagram.com/franchiseindia_/','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" /></div>
                    <div class="innersfv" onclick="window.open('https://www.youtube.com/user/FranchiseIndia','_blank')"><img src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" /></div>
                </div>
            </a>
        </span>
    </div>
</div>
   </div>
   </li>
   
   @endforeach
   </ul>
   <div class="d-felx justify-content-center">
    {{ $article->links('pagination::bootstrap-4') }}
 </div>
   </div>
   </div>
   @endif
   <!-- mag block strat  -->
   @include("layout.insights.magblock")
 
   @include("layout.insights.brandlist")
   </div>
@endsection