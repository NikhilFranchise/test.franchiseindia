@php
    use Illuminate\Support\Str;
@endphp
@extends('layout.master')
@section('seoTitle', 'Top Franchise Magazine | Franchising World - Franchise India')
@section('seoDesc', 'Franchise India Holdings Limited presents the online version of Asia&#039;s largest selling
    franchise magazine- &#039;The Franchising World. &#039; This monthly publication is a complete guide for entrepreneurs
    seeking business opportunities in various sectors of the franchising industry.')
@section('seoKeywords', 'franchise magazine, franchising world, looking for a franchise subscribe franchise magazine,
    top business franchises, top franchises, best franchises, small business opportunities, financing, franchise insight,
    franchising, franchise franchise india')
@section('content')

    <div class="container mostpopu arttilist">

        <style>
            #dismiss {
                padding-top: 10px;
            }

            .mag-edition {
                padding-top: 164px;
                padding-bottom: 50px;
            }

            .edition-head {
                font-family: "Roboto", sans-serif;
                font-weight: 500;
                font-size: 28px;
                line-height: 30px;
                color: #303030;
                margin-top: 24px;
            }

            .mag-edition h1 {
                color: #303030;
                font-family: "Roboto", sans-serif;
                font-size: 40px;
                line-height: 44px;
                margin-bottom: 10px;
                text-align: center;
                font-weight: bold;
            }

            .mag-edition p.magtop {
                color: #838080;
                font-family: "Roboto", sans-serif;
                font-size: 14px;
                text-align: center;
                margin-bottom: 30px;
            }

            .mag-edition ul.filist {
                padding: 0;
                margin: 20px 0 0;
            }

            .mag-edition ul.filist li {
                list-style: none;
                margin-bottom: 15px;
                clear: both;
                overflow: hidden;
            }

            .mag-edition .imgbl {
                width: 124px;
                border-radius: 4px;
                float: left;
            }

            .edit-mag a {
                color: #101111;
                font-size: 17px;
            }

            .mag-edition .imgbl img {
                width: 100%;
                border-radius: 3px;
                border: 1px solid #c3c3c3;
            }

            .topblk .conblk {
                width: 347px;
            }

            .conblk {
                float: left;
                width: 500px;
                padding-left: 20px;
            }

            .imgbl {
                width: 124px;
                border-radius: 4px;
                float: left;
            }

            .mag-edition .hname a {
                color: #303030;
                font-size: 19px;
                font-weight: 400;
                line-height: 24px;
                margin-bottom: 5px;
                display: block;
            }

            .mag-inner {
                width: 297px;
                position: relative;
            }

            .edition-heads {
                display: block;
                margin-bottom: 6px;
            }

            a.mlink {
                position: absolute;
                top: 73px;
                right: -82px;
                transform: rotate(-90deg);
                color: #ffffff;
                background: #dc3322;
                padding: 7px 23px;
            }

            a.nlink {
                position: absolute;
                top: 198px;
                right: -70px;
                transform: rotate(-90deg);
                color: #ffffff;
                background: #000000;
                padding: 7px 23px;
            }

            a.mlink:hover {
                background-color: #d32b1a;
                color: #ffffff;
            }

            a.nlink:hover {
                color: #ffffff;
            }

            .edit-issue {
                color: #000000;
                font-size: 25px;
                font-family: 'Roboto';
                margin-bottom: 7px;
                font-weight: 700;
            }

            .mag-pagination {
                display: flex;
                justify-content: center;
            }

            .mag-sep {
                border: 1px solid #e3e3e3;
                margin: 34px 0px;
                display: block;
            }

            @media screen and (min-width:1000px) and (max-width:1199px) {
                .conblk {
                    width: 411px;
                }

                .mag-inner {
                    width: 254px;
                }
            }

            @media screen and (max-width:767px) {
                .mag-edition .imgbl {
                    width: 116px;
                }

                .mag-inner {
                    width: 91%;
                }

                .mag-inner img {
                    width: 100%;
                }

                .mag-edition {
                    padding-top: 100px;
                }

                .edit-issue {
                    font-size: 20px;
                }

                .imgbl {
                    width: 40%;
                }

                .conblk {
                    width: 60%;
                }

                .edition-head {
                    font-size: 25px;
                }

                .mag-edition .hname a {
                    font-size: 16px;
                }

                .mag-edition h1 {
                    font-size: 30px;
                    line-height: 38px;
                }
            }
        </style>

        <div class="mag-edition">
            <div class="container">
                <!--<h1>Insights. Ideas. Opportunities. Growth.</h1>
       <p class="magtop">Immense insights, thriving ideas, and splendid opportunities for tomorrow's tycoons</p>-->
                @foreach ($magazineCategory as $magazineArticle)
                    @php
                        $monthNum = sprintf('%02d', $magazineArticle['iss_month']);
                        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
                    @endphp
                    <div class="mag-block">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="edition-heads">ISSUE: {{ $monthName }} {{ $magazineArticle['iss_year'] }}
                                </div>
                                <div class="edit-issue">{{ $magazineArticle['title'] }}</div>
                                <div class="mag-wrap">
                                    <div class="mag-inner">
                                        <img src="{{ Config('constants.awsS3Url') . $magazineArticle['image'] }}"
                                            alt="Franchise India" class="img-responsive">
                                        <a href="https://master.franchiseindia.com/emagazine/" target="_blank"
                                            class="mlink">Online Edition</a>
                                        <a href="https://master.franchiseindia.com/emagazine/" target="_blank"
                                            class="nlink">Subscribe</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="edition-head">Top Articles</div>
                                <ul class="filist">
                                    @foreach ($magazineList[$loop->index] as $result)
                                        @php
                                            $magFetchId = $magazineArticle['category_id'];
                                            $magazineArticleSlug = $result['slug'];
                                            if (!empty($magazineArticle['magz_id'])) {
                                                $magFetchId = $magazineArticle['magz_id'];
                                            }
                                            if (empty($result['slug'])) {
                                                $magazineArticleSlug = Str::slug($result['title']);
                                            }
                                        @endphp
                                        <li>
                                            <div class="imgbl">
                                                <a href="{{ Config('constants.awsS3Url') . $magazineArticle['image'] }}"><img
                                                        alt="{{ $result['title'] }}"
                                                        src="{{ Config('constants.awsS3Url') . $result['image'] }}"></a>
                                            </div>
                                            <div class="conblk">
                                                <div class="hname">
                                                    <a
                                                        href="{{ Config('constants.MainDomain') }}/magazine/{{ $magazineArticle['iss_year'] }}/{{ $monthName }}/{{ $magazineArticleSlug }}.{{ $result['item_id'] }}">{{ $result['title'] }}</a>
                                                </div>
                                                <div class="hcont">{{ substr($result['subtitle'], 0, 100) }}..</div>
                                            </div>
                                        </li>
                                    @endforeach

                                   
                                </ul>
                                @if (isset($magFetchId))
                                    <div class="edit-mag">
                                        <a
                                            href="../magazine/{{ $magazineArticle['iss_year'] }}/{{ $monthName }}/The-Franchising-World-{{ $magazineArticle['iss_year'] }}-{{ $magFetchId }}">View
                                            All Articles &gt;&gt;</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mag-sep"></div>
                @endforeach
                {!! $magazineCategory->links('pagination::bootstrap-4') !!}
                
            </div>
        </div>
    </div>
@endsection
