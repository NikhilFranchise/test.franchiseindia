@extends('layout.crre.master')
@section('content')
    <div class="maininnver homeh">
        @include('layout.crre.lateststories')
        @include('layout.crre.toparticles')
        @include('layout.crre.magblock')
        {{-- @include('layout.crre.franchisecategories') --}}
        @include('layout.crre.featured_author')
        @include('layout.crre.topfranchisecategories')
        @include('layout.crre.trends')
    </div>
@endsection
