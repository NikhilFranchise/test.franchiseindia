@extends('layout.insights.master')
@section('load-gpt', true)
@section('author-schema')
    @include('insights.author_schema', ['author' => $author])
@endsection
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ 'Author' }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    <div id='FI_Desktop_ROS_728x90_ATF'></div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('FI_Desktop_ROS_728x90_ATF');
                        });
                    </script>
                @enddesktop
                @mobile
                    <div id='FI_Desktop_ROS_300x250_ATF'></div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('FI_Desktop_ROS_300x250_ATF');
                        });
                    </script>
                @endmobile
            </div>
        </div>
        <div class="container">
            <div class="authblk">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/insights/author') }}">Author</a></li>
                    <li class="breadcrumb-item">{{ $author->title }}</li>
                </ul>
            </div>
        </div>
        {{-- author section start here --}}
        <div class="author-top-new">
            <div class="container">
                @php
                    $author_image = insightsAuthorImageUrl($author->image);
                @endphp
                <div class="row">
                    <div class="col-md-12">
                        <div class="author-new-wrap">
                            <div class="author-new-wrap-left">
                                <div class="author-left-thumb">
                                    <img src="{{ $author_image }}" alt="{{ $author->title }}" class="img-fluid" />
                                </div>
                                <div class="author-left-nam">{{ $author->title }}</div>
                                <div class="author-left-des">{{ $author->designation }}</div>
                                <div class="author-left-count">
                                    <span id="acount">{{ $articleCount }}</span> Stories
                                </div>
                                <div class="follows">Follow:</div>
                                <div class="author-left-soc">
                                    {{-- @dd($author); --}}
                                    <ul>
                                        @if (!empty($author->facebook_profile))
                                            <li>
                                                <a href="{{ $author->facebook_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/facebook.jpg') }}" /></a>
                                            </li>
                                        @endif
                                        @if (!empty($author->linkedin_profile))
                                            <li>
                                                <a href="{{ $author->linkedin_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/linkedin.jpg') }}" /></a>
                                            </li>
                                        @endif
                                        @if (!empty($author->twitter_profile))
                                            <li>
                                                <a href="{{ $author->twitter_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/twitter.jpg') }}" /></a>
                                            </li>
                                        @endif
                                        @if (!empty($author->emailid))
                                            <li>
                                                <a href="mailto:{{ $author->emailid }}" target="_blank">
                                                    <img src="{{ url('/insight-new/images/social/mail.jpg') }}" />
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($author->insta_profile))
                                            <li>
                                                <a href="{{ $author->insta_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/instagram.jpg') }}" /></a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="" target="_blank"><img
                                                    src="{{ url('/insight-new/images/social/rss.jpg') }}" /></a>
                                        </li>
                                    </ul>
                                </div>
                                @desktop
                                    <div class="author-left" style="margin-top: 20px; float:left; width:160px; height:600px;">
                                        <div id="FI_Desktop_LHS_skinner_160x600"></div>
                                        <script>
                                            googletag.cmd.push(function() {
                                                googletag.display('FI_Desktop_LHS_skinner_160x600');
                                            });
                                        </script>
                                    </div>
                                @enddesktop
                            </div>
                            <div class="author-new-wrap-right">
                                <div class="author-left-nam-desc">{{ $author->title }}</div>
                                <div class="articlecontent">
                                    @php
                                        $custom_data = explode("\r\n", $author->text);
                                        if (count($custom_data) == 1) {
                                            $articleData[0] = $custom_data[0] . '<div id="v-franchiseindia"></div>';
                                        } else {
                                            $counter = 0;
                                            foreach ($custom_data as $cdata) {
                                                if ($counter == 2) {
                                                    $articleData[] = $cdata . '<div id="v-franchiseindia"></div>';
                                                } else {
                                                    $articleData[] = $cdata;
                                                }
                                                $counter++;
                                            }
                                        }
                                        $resultArticle = implode("\r\n", $articleData);
                                    @endphp
                                    {!! $resultArticle !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- author section end here --}}
        {{-- stories section start here --}}
        <div class="stories">
            <div class="container">
                <h3>Stories From The Author</h3>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#latest" data-toggle="tab" class="active">LATEST</a>
                            </li>
                            <li><a href="#viewed" data-toggle="tab">MOST VIEWED</a></li>
                        </ul>
                        <div id="mid-ad-pool" style="display:none;">
                            @for ($i = 1; $i <= 5; $i++)
                                <div id="FI_Desktop_ROS_Inline_{{ $i }}_300x250"></div>
                            @endfor
                        </div>
                        <div class="tab-content">
                            {{-- latest stories section start here --}}
                            <div class="tab-pane active stab" id="latest">
                                <ul>
                                    @foreach ($latestArticles as $latest)
                                        @php
                                            $image = insightsImageUrl($latest->image, $latest->lang);
                                            $latestArticleURL = insightsUrl($latest, $latest->lang);
                                        @endphp
                                        <li>
                                            <div class="author-fresh">
                                                <div class="author-latest-pic">
                                                    <a href="{{ $latestArticleURL }}"><img src="{{ $image }}"
                                                            alt="{{ $latest->title }}" class="img-fluid" /></a>
                                                </div>
                                                <div class="author-fresh-cont">
                                                    <div class="author-latest-title">
                                                        <a href="{{ $latestArticleURL }}">{{ $latest->title }}</a>
                                                    </div>
                                                    <p>{!! html_entity_decode(Str::words($latest->shortDesc, 22, ' ...')) !!}</p>
                                                    <ul class="art-detail-read">
                                                        <li>
                                                            By - <a href=""
                                                                hreflang="{{ $latest->lang }}">{{ $author->title }}</a>
                                                        </li>
                                                        <li><time datetime="33Z" class="datetime">
                                                                {{ $latest->display_date }}
                                                            </time>/
                                                            {{ calculateReadTime($latest) }}
                                                            MIN READ
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </li>
                                        @if ($loop->iteration % 3 == 0)
                                            <li>
                                                <div class="mid-placeholder text-center"
                                                    data-mid="{{ $loop->iteration / 3 }}">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="video-pagination">
                                    {{ $latestArticles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            {{-- latest stories section end here --}}
                            {{-- most viewd stories section start here --}}
                            <div class="tab-pane stab" id="viewed">
                                <ul>
                                    @foreach ($mostViewedArticles as $viewed)
                                        @php
                                            $image = insightsImageUrl($viewed->image, $viewed->lang);
                                            $mostArticleURL = insightsUrl($viewed, $viewed->lang);
                                        @endphp

                                        <li>
                                            <div class="author-fresh">
                                                <div class="author-latest-pic">
                                                    <a href="{{ $mostArticleURL }}"><img src="{{ $image }}"
                                                            alt="{{ $viewed->title }}" class="img-fluid" /></a>
                                                </div>
                                                <div class="author-fresh-cont">
                                                    <div class="author-latest-title">
                                                        <a href="{{ $mostArticleURL }}">{{ $viewed->title }}</a>
                                                    </div>
                                                    <p>{!! html_entity_decode(Str::words($viewed->shortDesc, 22, ' ...')) !!}</p>
                                                    <ul class="art-detail-read">
                                                        <li>
                                                            By - <a href=""
                                                                hreflang="{{ $viewed->lang }}">{{ $author->title }}</a>
                                                        </li>
                                                        <li><time datetime="33Z" class="datetime">
                                                                {{ $viewed->display_date }}
                                                            </time>/
                                                            {{ calculateReadTime($viewed) }}
                                                            MIN READ
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        @if ($loop->iteration % 3 == 0)
                                            <li>
                                                <div class="mid-placeholder text-center"
                                                    data-mid="{{ $loop->iteration / 3 }}">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                <div class="video-pagination">
                                    {{ $mostViewedArticles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            {{-- most viewed section end here --}}
                        </div>
                        @include('layout.insights.subscribenewsletter')
                    </div>
                    {{-- stories section end here --}}
                    <div class="col-md-4">
                        {{-- ads section start here --}}
                        <div class="ad-right-author">
                            <div id='FI_Desktop_ROS_RHS_300x250_ATF'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('FI_Desktop_ROS_RHS_300x250_ATF');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}
                        {{-- popular articles section start here --}}
                        <div class="popular-articles">
                            <div class="popular-title">Popular Articles</div>
                            <div class="region region-home-top-right">
                                <div class="views-element-container block block-views block-views-blockhome-popular-article-block-1"
                                    id="block-views-block-home-popular-article-block-1">
                                    <div>
                                        <div
                                            class="view view-home-popular-article view-id-home_popular_article view-display-id-block_1 js-view-dom-id-6a2452a8ce2f8feb7da0fe5ec0f3923833a854ba903445838953e863b8550fbd">
                                            <div class="view-content">
                                                <div>
                                                    <ul class="popular-list">
                                                        @foreach ($popArticles as $popular)
                                                            @php
                                                                $popArticleURL = insightsUrl($popular);
                                                                $cat = $popular->category;
                                                                $catURL = insightsCategoryUrl($cat);
                                                                $catName = $cat?->catname;
                                                            @endphp
                                                            <li>
                                                                <div class="popular-sub">
                                                                    <a href="{{ $catURL }}"
                                                                        hreflang="">{{ $catName }}</a>
                                                                </div>
                                                                <div class="popular-head">
                                                                    <a
                                                                        href="{{ $popArticleURL }}">{{ $popular->title }}</a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- popular articles section end here --}}
                        {{-- ads section start here --}}
                        <div class="ad-right-sticky">
                            <div id="FI_Desktop_ROS_RHS_300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('FI_Desktop_ROS_RHS_300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}
                    </div>
                </div>
                <div class="inner-article-detail-desktop-top-ad">
                    @desktop
                        <div id='FI_Desktop_ROS_728x90_BTF'></div>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('FI_Desktop_ROS_728x90_BTF');
                            });
                        </script>
                    @enddesktop
                </div>
            </div>
        </div>
        @include('layout.insights.magblock')
        <div class="listblk">
            <div class="container">
                <ul class="artilsit"></ul>
            </div>
        </div>
    </div>
    <script>
        (function() {
            /* ================= UTIL ================= */
            function log(...args) {
                console.log('[MID-ADS]', ...args);
            }

            function getSlotByDivId(divId) {
                if (!window.googletag || !googletag.pubads) {
                    log('GPT not ready');
                    return null;
                }
                return googletag.pubads()
                    .getSlots()
                    .find(slot => slot.getSlotElementId() === divId);
            }

            function getMidAd(index) {
                return document.getElementById('FI_Desktop_ROS_Inline_' + index + '_300x250');
            }

            /* ================= CORE ================= */

            function attachAndRefresh(tabId) {
                log('Attach & refresh →', tabId);

                const holders = document.querySelectorAll(
                    '#' + tabId + ' .mid-placeholder'
                );

                log('Placeholders found:', holders.length);

                holders.forEach(holder => {
                    const index = holder.dataset.mid;
                    const ad = getMidAd(index);

                    if (!ad) {
                        log('Ad not found for index:', index);
                        return;
                    }

                    holder.innerHTML = '';
                    holder.appendChild(ad);
                    log('Ad attached:', ad.id);

                    setTimeout(() => {
                        googletag.cmd.push(() => {
                            const slot = getSlotByDivId(ad.id);
                            if (slot) {
                                log('Refreshing slot:', ad.id);
                                googletag.pubads().refresh([slot]);
                            } else {
                                log('Slot NOT FOUND for:', ad.id);
                            }
                        });
                    }, 250);
                });
            }

            /* ================= INITIAL LOAD ================= */

            document.addEventListener('DOMContentLoaded', () => {
                log('DOM ready → initial attach');
                attachAndRefresh('latest');
            });

            /* ================= TAB CLICK HANDLER ================= */

            document.querySelectorAll('.nav-tabs a').forEach(tab => {
                tab.addEventListener('click', () => {
                    setTimeout(() => {
                        const activePane = document.querySelector('.tab-pane.active');
                        if (!activePane) {
                            log('No active tab pane found');
                            return;
                        }
                        attachAndRefresh(activePane.id);
                    }, 120);
                });
            });

        })();
    </script>
@endsection
