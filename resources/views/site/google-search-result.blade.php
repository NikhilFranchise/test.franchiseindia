@extends('layout.master')
@section('content')
    <div class="container formsection margintop60 staicp searchsection">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"><h1>Search Result</h1></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
            <gcse:searchbox gname="storesearch" queryParameterName="search"></gcse:searchbox>
            <gcse:searchresults gname="storesearch" queryParameterName="search"></gcse:searchresults>
        </div>
    </div>
@endsection
