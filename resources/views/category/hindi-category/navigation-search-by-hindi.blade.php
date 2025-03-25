<ul class="runnerbrad pad20"><li><a href="{{url('/')}}">होम</a></li><li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    <li><a href="{{url('hi/business-opportunities/all/all')}}">व्यवसाय के अवसर</a></li>
    @if($catName != 'Business Opportunities')
        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
        </li><li><a href="#">{{ $catName }}</a></li>
    @endif
</ul>
@php
    $h1 = $catName;
    if (strpos($seoTitle, "- फ्रेंचाइज़ी इंडिया") !== false){
        $_h1 = explode('- फ्रेंचाइज़ी इंडिया', $seoTitle);
        $h1 = $_h1[0];
    }
    if (strpos($seoTitle, "- फ्रेंचाइजी भारत") !== false){
        $_h1 = explode('- फ्रेंचाइजी भारत', $seoTitle);
        $h1 = $_h1[0];
    }
    if(empty($h1)){
        $h1 = 'test';
    }
@endphp
<link rel=stylesheet href="{{ url('awesomplete/awesomplete.css')}}">
<div class="row pad20 row-no-margin">
    <div class="col-xs-12 col-sm-6 col-md-7 row-no-padding">
        <div class="haeding">
            <h1>{{ $h1 }}</h1>
            <span class="shorttxt">(दिखा रहा है {{$brandResults->firstItem()}} - {{$brandResults->lastItem()}} अवसर का {{$brandResults->total()}} अवसर)</span></div>
    </div>

    <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding catmleft">
        <div class="form-group posrelv">
            <form method="get" action="{{Config('constants.MainDomain')}}/category/search">
                <input type="text" name="text" class="form-control" id="dealer-bar-search" placeholder="Start Search">
                <span id="textcompany" class="catseaicon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-2 row-no-padding">
        <select name="sortby" id="sortbynew" class="form-control myselectclasscat" onchange="changeFunction();" title = "orderBy">
            <option value="x" selected="selected">क्रमबद्ध करें</option>
            <option value="1" @if($orderby == 1) selected @endif>नवीनतम</option>
            <option value="2" @if($orderby == 2) selected @endif>वर्णमाला क्रम</option>
            <option value="3" @if($orderby == 3) selected @endif>सबसे लोकप्रिय</option>
        </select>
    </div>
</div>