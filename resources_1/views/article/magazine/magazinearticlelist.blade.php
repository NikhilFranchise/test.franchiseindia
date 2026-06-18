@php
use Illuminate\Support\Str;
@endphp
@extends('layout.master')
@section('seoTitle', 'Top Franchise Magazine | Franchising World - Franchise India')
@section('seoDesc', 'Franchise India Holdings Limited presents the online version of Asia&#039;s largest selling franchise magazine- &#039;The Franchising World. &#039; This monthly publication is a complete guide for entrepreneurs seeking business opportunities in various sectors of the franchising industry.')
@section('seoKeywords', 'franchise magazine, franchising world, looking for a franchise subscribe franchise magazine, top business franchises, top franchises, best franchises, small business opportunities, financing, franchise insight, franchising, franchise franchise india')
@section('content')
    <div class="innerloginblk">
        @include('includes.login-events')
    </div>
    <div class="container mostpopu arttilist">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="bordertb">The Franchising World</h1>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt paddingright50">
                @foreach($magazineCategory as $magazineArticle)
                    @php
                        $monthNum = sprintf("%02d", $magazineArticle['iss_month']);
                        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
                    @endphp
                    <div class="row magazine-box">
                        <div class="col-xs-12 col-sm-4 col-md-4 magazine-left">
                            <div class="magleft">
                                <img alt="{{$magazineArticle['title']}}" src="{{Config('constants.awsS3Url').$magazineArticle['image']}}">
                            </div>
                            <div class="mag-link"><a href="https://master.franchiseindia.com/emagazine/" target="_blank">Online Edition</a> | <a href="https://master.franchiseindia.com/emagazine/" target="_blank">Subscribe</a></div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 magazine-right">
                            <div class="maz-date">Issue: <strong>{{$monthName}} {{$magazineArticle['iss_year']}}</strong></div>
                            <div class="maz-show-txt-blk">
                                <div class="maz-heading">{{$magazineArticle['title']}}</div>
                            </div>
                            @foreach($magazineList[$loop->index] as $result)
                                @php
                                    $magFetchId = $magazineArticle['category_id'];
                                    $magazineArticleSlug = $result['slug'];
                                    if (!empty($magazineArticle['magz_id']))
                                        $magFetchId = $magazineArticle['magz_id'];
                                    if (empty($result['slug']))
                                        $magazineArticleSlug = Str::slug($result['title']);
                                @endphp
                                <div class="maz-show-txt-blk">
                                    <div class="maz-heading">
                                        <a href="{{ Config('constants.MainDomain') }}/magazine/{{$magazineArticle['iss_year']}}/{{$monthName}}/{{ $magazineArticleSlug }}.{{ $result['item_id'] }}">{{ $result['title'] }}</a></div>
                                    <div class="maz-txt">
                                        {{ substr($result['subtitle'],0,100) }}..
                                    </div>
                                </div>
                            @endforeach
                            @if(isset($magFetchId))
                                <div class="view-mag">
                                    <a href="../magazine/{{$magazineArticle['iss_year']}}/{{$monthName}}/The-Franchising-World-{{$magazineArticle['iss_year']}}-{{$magFetchId}}">View All Articles &gt;&gt;</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($loop->index == 3)
                        @include('includes/mycatbottomarticlelist')
                        <div class="borbtmdotarticle"></div>
                    @endif
                @endforeach
                {!! $magazineCategory->links() !!}
            </div>
            @include("includes/magazine/rightpanelcomman")
        </div>
    </div>
@endsection