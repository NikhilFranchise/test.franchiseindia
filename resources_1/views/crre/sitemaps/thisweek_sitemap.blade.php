@extends('layout.crre.master')
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
                    <li class="breadcrumb-item"><a href="{{ url('/crre') }}" class="tip-bottom">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/crre/sitemap') }}">{{ 'Sitemap' }}</a></li>
                    <li class="breadcrumb-item">{{ 'This Week' }}</li>
                </ul>
                @php
                    // Group the records by insight_type
                    $groupedData = $allThisWeekData->groupBy('insight_type');
                @endphp
                @if ($groupedData->isNotEmpty())
                    @foreach ($groupedData as $insightType => $records)
                        <h4>{{ $insightType }}</h4>
                        <ul class="listarticle-sitemap">
                            @foreach ($records as $record)
                                <li><a href="{{ crreUrl($record) }}">{{ $record->title }}</a>
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
