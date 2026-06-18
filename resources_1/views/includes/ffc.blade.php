
    <h2 class="ttl">Featured Franchise Companies</h2>
    <div class="bdy">
        <div class="row">
        @foreach($homeffclogo as $homeffclogo)
            <div class="col-xs-12 col-sm-3 col-md-2 mdfiy1024">
                <div class="logo-list sm-fe">
                    <div class="img-ver"><a href="{{Config::get('constants.MainDomain')}}{{$homeffclogo['brand_link']}}">
                            <img src="{{$homeffclogo['brand_img']}}" alt="ffc" /></a>
                    </div>
                </div>
                <div class="invest-price">
                    Investment:<div>{{$homeffclogo['investment_range']}}</div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
