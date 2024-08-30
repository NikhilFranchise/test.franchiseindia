@extends('admin.layout.master')
@section('DA')
    active
@endsection
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb"> <a href="dashboard"> <i class="icon-dashboard"></i> <span
                            class="label label-important">0</span> My Dashboard </a> </li>
                @if (
                    (session()->get('role') != 'ga' && session()->get('adminEmail') == 'techsupport@franchiseindia.net') ||
                        (session()->get('role') != 'ga' && session()->get('adminEmail') == 'pganesh@franchiseindia.net'))
                    <li class="bg_ly"> <a href="list-author"> <i class="icon-th"></i>Authors</a> </li>
                    <li class="bg_lo"> <a href="list-article-interview"> <i class="icon-th"></i>Articles/Interviews</a>
                    </li>
                    <li class="bg_ls"> <a href="list-news"> <i class="icon-th"></i>News</a> </li>
                    <li class="bg_lg"> <a href="list-magazine"> <i class="icon-th"></i>Magazine</a> </li>
                    <li class="bg_lb"> <a href="list-comments"> <i class="icon-th"></i>Comments</a> </li>
                @endif
                <li class="bg_lb"> <a href="list-insights"> <i class="icon-th"></i>Insights</a> </li>
            </ul>
        </div>
    </div>
@endsection
