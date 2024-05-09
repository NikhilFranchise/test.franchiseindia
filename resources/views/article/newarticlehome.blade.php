@extends('layout.newArticalMaster')
@section('seoTitle', 'Franchise Articles and Information, New Business Ideas - Franchise India')
@section('seoDesc', 'Read our latest and popular collection of franchise articles includes new business ideas,franchise information and franchise opportunities')
@section('seoKeywords', 'best franchise, franchising, new business ideas, buy franchise, franchise information, small franchise business, best franchise business company in India')


{{--@section('hindiUrl', $hindiUrl)--}}
{{--@section('englishUrl', $engUrl)--}}
{{--<!-- Top search header code Start-->--}}
{{--@mobile--}}
{{--@include('layout.newhomepage.mobile.topsearch')--}}
{{--@endmobile--}}
{{--@tablet--}}
{{--@include('layout.newhomepage.topsearch')--}}
{{--@endtablet--}}
{{--@desktop--}}
{{--@include('layout.newhomepage.topsearch')--}}
{{--@enddesktop--}}
{{--<!-- Top search header code End-->--}}
@section('content')
    <div class="maininnver homeh">

        @include('includes.article1.toparticle')

        @include('includes.article1.topeditor')

        @include('includes.article1.smallidea')

        @include('includes.article1.magblock')

        @include('includes.article1.localbusiness')

        @include('includes.article1.adsblk')

        @include('includes.article1.topfranchisecategories')

        @include('includes.article1.emergingindia')

        @include('includes.article1.lastestvideoblk')

        @include('includes.article1.podcastblk')

        @include('includes.article1.featuredcontributors')

    </div>

    @include('includes.article1.adsblk2')
<!--form end here -->
@endsection
