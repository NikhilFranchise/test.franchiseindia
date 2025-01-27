@extends('layout.master')
@section('seoTitle','Sanjay Raghuraman - CEO of Kalyan Jewellers | Franchise Leader 2024')
@section('content')
    <!--TOP 50 FRANCHISE LEADERS -->
    <style>
        .top-fifty-profile-detail img {
            width: 250px;
            margin-bottom: 10px;
            max-width: 100%;
        }

        .top-fifty-profile-detail {
            margin-top: 25px;
        }

        .back-btns {
            float: right;
        }

        @media screen and (max-width:992px) {
            .back-btns {
                margin-bottom: 20px;
            }

            .top-fifty-profile-detail img {
                margin-bottom: 20px;
            }
        }
    </style>
    <div class="container formsection margintop60 staicp">
        <div class="back-btns"><a href="/top-franchise-leaders">&lt;&lt; Back to Top 50 Leaders</a></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>{{$leader->name}}</h1>
                <div class="page-profile-des">{{$leader->designation}}</div>

                <div class="top-fifty-profile-detail">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $leader->image_path }}"
                                alt="Sanjay Raghuraman">
                        </div>
                        <div class="col-md-9">
                            <p class="static-txt-ter" style="margin-bottom:25px;">{!! $leader->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--TOP 50 FRANCHISE LEADERS -->
@endsection
