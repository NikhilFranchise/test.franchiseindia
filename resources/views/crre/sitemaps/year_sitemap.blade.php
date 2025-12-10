@extends('layout.crre.master')
@section('content')
<div class="maininnver homeh">
    <div class="inner-top-head">
        <div class="container">
            <h1>{{ 'Sitemap' }}</h1>
        </div>
    </div>
    <div class="listblk smap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/crre') }}" class="tip-bottom">Home</a></li>
                <li class="breadcrumb-item">{{ 'Sitemap' }}</li>
            </ul>
            <ul class="sitemaplist-year">
                <li><a href="{{ url('/crre/sitemap/today') }}">Today</a></li>
                <li><a href="{{ url('/crre/sitemap/yesterday') }}">Yesterday</a></li>
                <li><a href="{{ url('/crre/sitemap/thisweek') }}">This Week</a></li>
                <li><a href="{{ url('/crre/sitemap/lastweek') }}">Last Week</a></li>
            </ul>
            <h4>Years</h4>
            <ul class="sitemaplist-year">
                @forelse($allYears as $record)
                <li><a href="{{ url('/crre/sitemap/') . '/' . $record }}">{{ $record }}</a></li>
                @empty
                <li colspan="3">No records found</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection