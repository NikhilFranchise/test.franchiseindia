@extends('layout.insights.master')
@section('content')
<div class="maininnver homeh">
    @include("layout.insights.toparticle")
    @include("layout.insights.topeditor")
    @include("layout.insights.executiveinterviews")
    @include("layout.insights.magblock")
    @include("layout.insights.franchisecategories")
    @include("layout.insights.featured_author")
    @include("layout.insights.topfranchisecategories")
    @include("layout.insights.trends")
    {{-- @include("layout.insights.newsletter") --}}

</div>
@endsection
