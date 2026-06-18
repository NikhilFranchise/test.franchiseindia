<div class="brand-lst-sec">
    <h1 class="ttl">Top Business Opportunities</h1>
    <div class="bdy">
      <div class="row">
       <div class="col-xs-12 col-sm-6 col-md-6 gallimg">
         <div id="topslidernew" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner" role="listbox">
             @foreach($brandlogo1 as $logoDetail)
               <div class="item @if($loop->first) active @endif">
                 <a href="{{Config::get('constants.MainDomain')}}{{$logoDetail['brand_link']}}">
                   <img src="{{$logoDetail['brand_img']}}" alt="tbo">
                 </a>
               </div>
             @endforeach
           </div>
           <a class="left carousel-control" href="#topslidernew" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>            
           </a>
           <a class="right carousel-control" href="#topslidernew" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>            
           </a>
         </div>
       </div>
        <div class="col-xs-12 col-sm-6 col-md-6 tobsec">
            <div class="row lth">
                @foreach ($brandlogo2 as $brandlogo2)
                    <div class="col-xs-6 col-sm-6 col-md-6 mobpadd">
                      <div class="logo-list">
                        <div class="logrel">
                          <div class="img-ver">
                            <a href="{{Config::get('constants.MainDomain').$brandlogo2['brand_link']}}">
                                <img src="{{$brandlogo2['brand_img']}}" alt="{{$brandlogo2['brand_alt']}}"/>
                            </a>
                            <a href="{{Config::get('constants.MainDomain').$brandlogo2['brand_link']}}">
                              <div class="tbo-info">
                                <span>{{$brandlogo2['brand_heading']}}</span>
                                  {{$brandlogo2['brand_desc']}}
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row lth mobft">
       @foreach($brandlogo3 as $logoType3)
       @if($loop->index < 4)
           <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
               <div class="logo-list">
                   <div class="logrel">
                       <div class="img-ver">
                           <a href="{{Config::get('constants.MainDomain')}}{{$logoType3['brand_link']}}"><img src="{{$logoType3['brand_img']}}" alt="{{$logoType3['brand_desc']}}" /></a>
                           <a href="{{Config::get('constants.MainDomain')}}{{$logoType3['brand_link']}}">
                               <div class="tbo-info">
                                   <span>{{$logoType3['brand_heading']}}</span>
                                   {{$logoType3['brand_desc']}}
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
           </div>
           @endif
       @endforeach
   </div>

   <div class="row lth mobft">
       @foreach($brandlogo3 as $logoType3)
         @if($loop->index > 3)
           <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
               <div class="logo-list">
                   <div class="logrel">
                       <div class="img-ver">
                           <a href="{{Config::get('constants.MainDomain')}}{{$logoType3['brand_link']}}"><img src="{{$logoType3['brand_img']}}"></a>
                           <a href="{{Config::get('constants.MainDomain')}}{{$logoType3['brand_link']}}">
                               <div class="tbo-info">
                                   <span>{{$logoType3['brand_heading']}}</span>
                                   {{$logoType3['brand_desc']}}
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
           </div>
           @endif
       @endforeach
   </div>

    <div class="row lth">
      @foreach ($brandlogo4 as $brandlogo4)
        <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
          <div class="logo-list">
            <div class="logrel sm">
              <div class="img-ver">
                <a href="{{Config::get('constants.MainDomain').$brandlogo4['brand_link']}}">
                  <img src="{{$brandlogo4['brand_img']}}" alt="{{$brandlogo4['brand_alt']}}"/>
                </a>
                <a href="{{Config::get('constants.MainDomain').$brandlogo4['brand_link']}}">
                  <div class="tbo-info">
                    <span>{{$brandlogo4['brand_heading']}}</span>
                    Investment: {{$brandlogo4['investment_range']}}
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
