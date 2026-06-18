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
                <li class="breadcrumb-item"><a href="{{ url('/insights/sitemap/').'/'.$year }}">{{ $year }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/insights/sitemap/').'/'.$year.'/'. $month }}">{{ date('F',
                        mktime(0, 0, 0,
                        $month, 10)) }}</a></li>
                <li class="breadcrumb-item">{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</li>
            </ul>
            @php
            // Group the records by insight_type
            $groupedData = $allData ->groupBy('insight_type');
            @endphp

            @if($groupedData->isNotEmpty())
            @foreach($groupedData as $insightType => $records)
            <h4>{{ $insightType }}</h4>
            <ul class="listarticle-sitemap">
                @foreach($records as $record)
                <li>
                    <a href="{{ url("/insights/{$record->source}/" . strtolower($record->insight_type) .
                        "/{$record->slug}.{$record->news_id}") }}">
                        {{ $record->title }}
                    </a>
                </li>
                @endforeach
            </ul>
            @endforeach
            @else
            <p class="ins-sitemap">No records found</p>
            @endif
        </div>
    </div>
</div>
@endsection
