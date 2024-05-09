<div class="flex-container">
    <div class="flexslider">
        <ul class="slides">
            <li><img alt="slider" src="{{url('franchiseinternational/images/slides/slide1.jpg')}}" /></li>
            <li><img alt="slider" src="{{url('franchiseinternational/images/slides/slide2.jpg')}}" /></li>
            <li><img alt="slider" src="{{url('franchiseinternational/images/slides/slide4.jpg')}}" /></li>
        </ul>
        <div class="sexbox">
            <div class="searhomeblk">
                <h1 class="homehead">Master and Multi unit Opportunities</h1>
                <div class="searchtxt">Your gateway to the best franchising opportunities in India.</div>
                <form action="{{ url('category/searchby') }}" method="get" id="search-form">
                    <ul class="seablk">
                        <li class="wd">
                            <select name="mc" id="getMainCategoryDataHeaderLoc" class="form-control myselectclasscat2" title="main_cat" required>
                                <option value="">Select Industry</option>
                                @foreach( Config('constants.CategoryArr') as $categoryId => $categoryName)
                                    @php
                                        $url = Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoCategoryArr.'.$categoryId).'.m'.$categoryId;
                                    @endphp
                                    <option value="{{ $categoryId }}" slug="{{Config('category.SeoCategoryArr.'.$categoryId)}}" url="{{$url}}" >{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="wd2">
                            <select class="form-control myselectclasscat" id="stateHeader" title="location" name="loc" >
                                <option value="">Select Location</option>                        
                                @foreach(Config('location.stateArr') as $key => $value)
                                    <option value="{{$key}}" slug="{{strtolower(str_slug($value))}}">{{$value}}</option>
                                @endforeach
                            </select>                        
                        </li>
                        <li class="wd3">
                            <select class="form-control myselectclasscat" title="investment" id="investment" name="investment">
                                <option value=""> Select Investment</option>
                                @foreach (Config('constants.investRangeInWords') as $key => $value)
                                    <option value="{{$key}}" min_range="{{ Config('constants.InvestRange.'.$key.'.min') }}" max_range="{{ Config('constants.InvestRange.'.$key.'.max') }}" >{{$value}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="wd4">
                            <input type="submit" class="form-control" value="Search" >
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <div class="clr"></div>
</div>
