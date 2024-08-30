@extends('layout.insights.master') @section('content')
<div class="maininnver homeh">
   <div class="container">
      <h1 class="cathead">Executive Interviews</h1>
   </div>
   <div class="listblk">
      <div class="container">
         <ul class="artilsit">
            @foreach($interviews as $article) 
            @php 
            
            
            $image = Config('constants.awsS3Url') . $article->image; 
            $url = Config('constants.MainDomain') . '/insights/' . strtolower($article->insight_type) . '/' . $article->slug . '.' . $article->news_id;
            @endphp
            @foreach($article->author as $author) 
            @php
                $authorname = $author->title;
                $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $author->slug .'-' . $author->author_id; 
               if(!empty($author->image)){ 
                  $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'.  $author->image; }
               else{ 
                  $author_image = url('images/defaultuser.png'); }
               if (!empty($author->slug)) {
                  $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $author->slug .'-' . $author->author_id;
               }else{
                  $slug = strtolower(str_replace(' ','-', $authorname));
                  $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $slug .'-' . $author->author_id;
               }    
                    
            @endphp
            @endforeach
            {{-- @foreach ($article->category as $category)
               @foreach ($article->Subcategory as $subcat)
                   @php
                     $catslug = Config('constants.MainDomain') . '/insights/' . $category->slug .'/'. $subcat->slug;
                     $catname = $category->catname;
                  @endphp
               @endforeach
                
            @endforeach --}}
            <li>
               <div class="artimgblk">
                  <a href="{{$url}}"><img src="{{$image}}" alt="{{$article->title. ' image'}}" /></a>
               </div>
               <div class="artcontent">
                  {{-- <div class="catname"><a href="{{$catslug}}">{{$catname}}</a></div> --}}
                  <div class="haedname"><a href="{{$url}}">{!! html_entity_decode(\Illuminate\Support\Str::words($article->title, 10, ' ...'), ENT_QUOTES, 'UTF-8') !!}</a></div>
                  <div class="authblk cot">
                     <div class="autimg"><img src="{{$author_image}}" alt="{{$authorname}}" /></div>
                     <div class="autinfo">
                        <span><a href="{{$authorUrl}}">{{$authorname}}</a></span>
                        {{date('M d, Y',strtotime($article->created_at))}} - {{\App\Http\Controllers\InsightsController::calculateReadTime($article)}} min read
                     </div>
                  </div>
                  <div class="stext">
                     {{-- {{strip_tags(\Illuminate\Support\Str::words($article->content, 55 , ' ...'))}} --}}
                     {!! html_entity_decode(\Illuminate\Support\Str::words($article->content, 55, ' ...'), ENT_QUOTES, 'UTF-8') !!}
                  </div>
                  <div class="scbk">
                     {{-- <div class="cmtblk"><img src="{{ url('insights/images/smallcomment.svg') }}" alt="" /></div> --}}
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
            {{ $interviews->links('pagination::bootstrap-4') }}
         </div>
      </div>
   </div>
   <!-- mag block strat  -->
   @include("layout.insights.magblock")
   <!-- mag block end   -->
   <!-- another list start here   -->
   <div class="listblk"></div>
   <!-- another list end here  -->
   @include("layout.insights.brandlist")
</div>
{{-- <script>
   $(function(){
   
     var page = '2';
     $('.readmore').click(function(){
   
             $.ajax({
             url: "/interview/"+{{$interviews[0]['news_id']}}+"/"+page,
             method: "GET",
             }).done(function( data ) {
                     if(data){
                           page++;
                           $('.readmore').before( data );
                           if($('.readmore').attr('data-page') == page)
                           {
                               $('.readmore').hide();
                           }
                           if(typeof addthis !== 'undefined') { addthis.layers.refresh(); }
                     }
   
             });
   
   
     })
   
   
   })
</script> --}}
@endsection