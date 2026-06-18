@extends('layout.insights.master')
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>Authors</h1>
            </div>
        </div>
        <div class="container">
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    <div id='FI_Desktop_ROS_728x90_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('FI_Desktop_ROS_728x90_ATF');
                            });
                        </script>
                    </div>
                @enddesktop
                @mobile
                    <div id='FI_Desktop_ROS_300x250_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('FI_Desktop_ROS_300x250_ATF');
                            });
                        </script>
                    </div>
                @endmobile
            </div>
        </div>
        <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item">Authors</li>
                </ul>
            </div>
        </div>
        <div class="author-archive">
            <div class="container">
                <h2 class="author-archive-title" style="display: none">Author Archive</h2>
                <p style="display: none">A highly motivated and focused media professional with over 15 years of experience
                    in writing,
                    editing, media, print, digital, and magazine production. Combining the creative ingenuity of a
                    writer with the practical approach of an operations manager and a managing editor, she excels at
                    delivering high-quality content that not only engages audiences but also meets organizational goals.
                    With a proven track record in managing teams and producing exceptional publications, she has played
                    a pivotal role in shaping the editorial direction of leading media publications and driving
                    strategic content initiatives.</p>
                <h3 class="author-archive-cat">{{ App::getLocale() == 'en' ? 'Featured Authors' : 'फीचर्ड ऑथर्स' }}</h3>
                <ul>
                    @foreach ($authorDetails as $article)
                        @php
                            $locale = App::getLocale();
                            $image = insightsAuthorImageUrl($article->image, $locale);
                            $authorURL = insightsAuthorUrl($article, $locale);

                        @endphp
                        <li>
                            <div class="home-author-list">
                                <div class="home-author-thumb"><img src="{{ $image }}" class="img-fluid"
                                        alt="{{ $article->title }}" height="" width=""></div>
                                <div class="home-author-name"><a href="{{ $authorURL }}">{{ $article->title }}</a></div>
                                <div class="home-author-des">{{ $article->designation }}</div>
                                <div class="home-author-count"><span>{{ $article->count }} </span>Stories </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="inner-article-detail-desktop-ad fad">
                    @desktop
                        <div id="FI_Desktop_ROS_728x90_Mid">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('FI_Desktop_ROS_728x90_Mid');
                                });
                            </script>
                        </div>
                    @enddesktop
                    @mobile
                        <div id="FI_Desktop_ROS_RHS_300x250">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('FI_Desktop_ROS_RHS_300x250');
                                });
                            </script>
                        </div>
                    @endmobile
                </div>
                <h3 class="author-archive-cat">Contributory Author</h3>
                <ul>
                    @foreach ($ContributoryAuthor as $article)
                        @php
                            $locale = App::getLocale();
                            $image = insightsAuthorImageUrl($article->image, $locale);
                            $authorURL = insightsAuthorUrl($article, $locale);
                        @endphp
                        <li>
                            <div class="home-author-list">
                                <div class="home-author-thumb"><img src="{{ $image }}" class="img-fluid"
                                        alt="{{ $article->title }}" height="" width=""></div>
                                <div class="home-author-name"><a href="{{ $authorURL }}">{{ $article->title }}</a>
                                </div>
                                <div class="home-author-des">{{ $article->designation }}</div>
                                <div class="home-author-count"><span>{{ $article->count }} </span>Stories </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <h3 class="author-archive-cat">Guest Author</h3>
                <ul>
                    @foreach ($guestAuthor as $article)
                        @php
                            $locale = App::getLocale();
                            $image = insightsAuthorImageUrl($article->image, $locale);
                            $authorURL = insightsAuthorUrl($article, $locale);

                        @endphp
                        <li>
                            <div class="home-author-list">
                                <div class="home-author-thumb"><img src="{{ $image }}" class="img-fluid"
                                        alt="{{ $article->title }}" height="" width=""></div>
                                <div class="home-author-name"><a href="{{ $authorURL }}">{{ $article->title }}</a>
                                </div>
                                <div class="home-author-des">{{ $article->designation }}</div>
                                <div class="home-author-count"><span>{{ $article->count }} </span>Stories </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="inner-article-detail-desktop-ad fad">
                    @desktop
                        <div id="FI_Desktop_ROS_728x90_BTF">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('FI_Desktop_ROS_728x90_BTF');
                                });
                            </script>
                        </div>
                    @enddesktop
                </div>
            </div>
        </div>
        @include('layout.insights.magblock')
        @include('layout.insights.brandlist')
    </div>
@endsection
