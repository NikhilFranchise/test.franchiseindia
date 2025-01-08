@extends('layout.insights.master')
@section('content')
<div class="maininnver homeh">
    <div class="inner-top-head">
        <div class="container">
           <h1>
               {{ 'Sitemap' }}
           </h1>
       </div>
       </div>
    <div class="listblk smap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/insights/sitemap') }}">{{ 'Sitemap' }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/insights/sitemap') .'/' . $Y }}">{{ $Y }}</a></li>
                <li class="breadcrumb-item">{{ date('F', mktime(0, 0, 0,
                    $M, 10)) }}</li>
            </ul>

            <ul class="sitemaplist-year sitemap-week-date">

                @forelse($allDays as $record)
                <li>
                    <a href="{{ url("/insights/sitemap/{$Y}/{$M}/" . str_pad($record, 2, '0', STR_PAD_LEFT)) }}">
                        {{ str_pad($record, 2, '0', STR_PAD_LEFT) }}
                    </a>
                </li>

                @empty
                <li colspan="3">No records found</li>
                @endforelse

            </ul>
        </div>
    </div>
</div>
@endsection
