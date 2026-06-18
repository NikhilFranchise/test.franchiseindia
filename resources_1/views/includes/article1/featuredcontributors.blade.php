<div class="featuredcontributorsblk">
<div class="container">
<div class="comhead pos"><a href="#">{{ (Request::segment(1) == 'hi') ? 'विशेष रुप से योगदानकर्ता' : 'Featured Contributors' }}</a></div>

<ul class="articlelist">
{{--	@foreach($authorList as $article)--}}
{{--		@if(!empty($article->title))--}}
{{--			@php--}}
{{--			if((Request::segment(1) == 'hi')){--}}
{{--                $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$article->title;--}}
{{--			}	else{--}}
{{--                $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$article->title;--}}
{{--			}--}}
{{--			    $authorImage  = (empty($article->image)) ? \Illuminate\Support\Facades\URL::asset('images/user1.png') : Config('constants.awsS3Url').$article->image;--}}
{{--			@endphp--}}
{{--		<li>--}}
{{--			<div class="imgpro"><a href="{{$authorUrl}}"><img src="{{$authorImage}}"></a></div>--}}
{{--				<div class="procont">--}}
{{--					<div class="cattxtblk"><a href="{{$authorUrl}}">{{$article->title}}</a> <span>{{$article->designation}}</span></div>--}}
{{--					<div class="usblk">--}}
{{--						<div class="usblkinner">@if($article->facebook_profile)<a href=" {{$article->facebook_profile}}">@endif<img src="{{asset('article/images/facebook.svg')}}"></a></div>--}}
{{--						<div class="usblkinner">@if($article->twitter_profile)<a href=" {{$article->twitter_profile}}">@endif<img src="{{asset('article/images/twitter.svg')}}"></a></div>--}}
{{--						<div class="usblkinner">@if($article->linkedin_profile)<a href=" {{$article->linkedin_profile}}">@endif<img src="{{asset('article/images/linkedin-2.svg')}}"></a></div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--		</li>--}}
{{--		@endif--}}
{{--	@endforeach--}}

		<li>
			<div class="imgpro"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/nitika-ahluwalia' : '/newcontent/author/nitika-ahluwalia'}}"><img src="{{asset('article/images/pick-5.jpg')}}"></a></div>
			<div class="procont">
				<div class="cattxtblk"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/nitika-ahluwalia' : '/newcontent/author/nitika-ahluwalia'}}">Nitika Ahluwalia</a> <span>Sub Editor</span></div>
				<div class="usblk">
					<div class="usblkinner"><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img src="{{asset('article/images/facebook.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://twitter.com/FranchiseIndia" target="_blank"><img src="{{asset('article/images/twitter.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img src="{{asset('article/images/linkedin-2.svg')}}"></a></div>
				</div>
			</div>
		</li>
		<li>
			<div class="imgpro"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/abhishek-kumar-singh' : '/newcontent/author/abhishek-kumar-singh'}}"><img src="{{asset('article/images/abhishek-image.jpg')}}"></a></div>
			<div class="procont">
				<div class="cattxtblk"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/abhishek-kumar-singh' : '/newcontent/author/abhishek-kumar-singh'}}">Abhishek Kumar Singh</a> <span>Traniee Writer</span></div>
				<div class="usblk">
					<div class="usblkinner"><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img src="{{asset('article/images/facebook.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://twitter.com/FranchiseIndia" target="_blank"><img src="{{asset('article/images/twitter.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img src="{{asset('article/images/linkedin-2.svg')}}"></a></div>
				</div>
			</div>
		</li>
	<li>
			<div class="imgpro"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/navneel-alvarez' : '/newcontent/author/navneel-alvarez'}}"><img src="{{asset('article/images/navneel.jpg')}}"></a></div>
			<div class="procont">
				<div class="cattxtblk"><a href="{{ Config('constants.MainDomain').((Request::segment(1) == 'hi')) ? '/hi/newcontent/author/navneel-alvarez' : '/newcontent/author/navneel-alvarez'}}">Navneel Alvarez</a> <span>Features Writer</span></div>
				<div class="usblk">
					<div class="usblkinner"><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img src="{{asset('article/images/facebook.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://twitter.com/FranchiseIndia" target="_blank"><img src="{{asset('article/images/twitter.svg')}}"></a></div>
					<div class="usblkinner"><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img src="{{asset('article/images/linkedin-2.svg')}}"></a></div>
				</div>
			</div>
		</li>

</ul>


</div>
</div>