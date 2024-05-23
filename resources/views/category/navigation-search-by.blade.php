@php
    use Illuminate\Support\Str;
@endphp

<ul class="runnerbrad pad20">
    <li><a href="{{ url('/') }}">Franchise</a></li>
    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    @if (Str::contains(URL::current(), '/business-opportunities/all/all'))
        <li>Business Opportunities</li>
    @else
        <li><a href="{{ url('/') }}/business-opportunities/all/all">Business Opportunities</a></li>
    @endif

    @if ($catName != 'Business Opportunities')
        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
        </li>
        <li>{{ $catName }}</li>
    @endif
</ul>
@php
    $h1 = $catName;
    if (strpos($seoTitle, '- Franchise India') !== false) {
        $_h1 = explode('- Franchise India', $seoTitle);
        $h1 = $_h1[0];
    }
    $chk_homebased = !empty($chk_homebased) ? $chk_homebased : 0;
@endphp
<link rel=stylesheet href="{{ url('awesomplete/awesomplete.css') }}">
<div class="row pad20 row-no-margin">
    <div class="col-xs-12 col-sm-6 col-md-7 row-no-padding">
        <div class="haeding">
            @if ($mc == 2)
                <h1>Food and Beverage - Business Ideas and Franchise Opportunities</h1>
            @else
                <h1>{{ $chk_homebased == 0 ? $h1 : 'Home Based ' . $h1 . ' Business' }}</h1>
            @endif
            <span class="shorttxt">(Showing {{ $brandResults->firstItem() }} - {{ $brandResults->lastItem() }}
                Opportunities of {{ $brandResults->total() }} Opportunities)</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding catmleft">
        <div class="form-group posrelv">
            <form method="get" action="{{ Config('constants.MainDomain') }}/category/search">
                <input type="text" name="text" class="form-control" id="dealer-bar-search"
                    placeholder="Start Search">
                <span id="textcompany" class="catseaicon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-2 row-no-padding">
        <select name="sortby" id="sortbynew" class="form-control myselectclasscat" onchange="changeFunction();">
            <option value="x" selected="selected">Sort By</option>
            <option value="1" @if ($orderby == 1) selected @endif>Most Recent</option>
            <option value="2" @if ($orderby == 2) selected @endif>Alphabetical Order</option>
            <option value="3" @if ($orderby == 3) selected @endif>Most Popular</option>
        </select>
    </div>
</div>
