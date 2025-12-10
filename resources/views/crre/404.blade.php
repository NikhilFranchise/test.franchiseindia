@extends('layout.crre.master')

@section('seoTitle', 'Page Not Found - 404')
@section('seoDesc', 'The page you are looking for does not exist.')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>Page Not Found - 404</h1>
            </div>
        </div>
        <div class="crre-404-wrapper">
            <div class="container text-center py-5">

                <div class="crre-404-title">
                    <h1 class="display-4 font-weight-bold">404</h1>
                    <p class="lead">The page you are looking for is not available</p>
                </div>

                <p class="crre-404-message mt-3">
                    Sorry, we are having trouble processing your request. The link may be broken, outdated, or removed.
                </p>

                <div class="crre-404-actions mt-4">
                    <a href="javascript:history.back()" class="btn-404">Go Back</a>
                    <a href="{{ url('/crre') }}" class="btn-404">Go to Homepage</a>
                </div>

                <hr class="my-5">
                @php
                    $locale = App::getLocale();
                @endphp
                <h4 class="mb-4">Explore CRRE Content</h4>

                <ul class="row crre-404-category-list justify-content-center">

                    <li class="col-6 col-sm-4 col-md-2 mb-4">
                        <a href="{{ url('/crre/' . $locale . '/topstories') }}">
                            <img src="{{ url('insight-new/images/news.webp') }}" alt="Top Stories" class="img-fluid">
                            <span>Top Stories</span>
                        </a>
                    </li>

                    <li class="col-6 col-sm-4 col-md-2 mb-4">
                        <a href="{{ url('/crre/' . $locale . '/toparticles') }}">
                            <img src="{{ url('insight-new/images/article.webp') }}" alt="Articles" class="img-fluid">
                            <span>Articles</span>
                        </a>
                    </li>

                    <li class="col-6 col-sm-4 col-md-2 mb-4">
                        <a href="{{ url('/crre/' . $locale . '/interviews') }}">
                            <img src="{{ url('insight-new/images/interview.svg') }}" alt="Interviews" class="img-fluid">
                            <span>Interviews</span>
                        </a>
                    </li>

                    <li class="col-6 col-sm-4 col-md-2 mb-4">
                        <a href="{{ url('/crre/' . $locale . '/events_reports') }}">
                            <img src="{{ url('insight-new/images/event.webp') }}" alt="Events & Reports" class="img-fluid">
                            <span>Events & Reports</span>
                        </a>
                    </li>

                    <li class="col-6 col-sm-4 col-md-2 mb-4">
                        <a href="{{ url('/crre/' . $locale . '/tag/business') }}">
                            <img src="{{ url('insight-new/images/tag.webp') }}" alt="Tags" class="img-fluid">
                            <span>Tags</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <style>
        .crre-404-wrapper h1 {
            font-size: 70px;
            color: #d9534f;
            margin-top: 0px;
        }

        .crre-404-category-list li a {
            display: block;
            text-align: center;
            text-decoration: none;
        }

        .crre-404-category-list img {
            max-width: 100%;
            height: 60px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .crre-404-category-list span {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
        }

        .crre-404-category-list {
            list-style: none;
        }

        .btn-404 {
            font-weight: 400;
            font-size: 16px;
            padding: 10px 30px;
            border-radius: 30px;
            transition: .5s;
            color: #fff;
            background: #169743 no-repeat padding-box;
        }

        .btn-404:hover {
            background: #fbc231 no-repeat padding-box;
            color: #fff;

        }

        .mt-4 {
            margin-top: 3.5rem !important;
        }
    </style>

@endsection
