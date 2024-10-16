@php
$hindiUrl = url('/homepage/hi');
$engUrl = url('/homepage');
@endphp
@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)
@if (request()->segment(2) == 'hi')
<nav id="sidebar">
   <div id="dismiss"><i class="fas fa-arrow-left"></i></div>
   <ul class="list-unstyled components border-bottom-1 pt-35">
      <li>
         <div class="google-search">
            <script>
               (function() {
                   var cx = "017593288126496616373:bpgflqv932a";
                   var gcse = document.createElement("script");
                   gcse.type = "text/javascript";
                   gcse.async = true;
                   gcse.src = "https://cse.google.com/cse.js?cx=" + cx;
                   let s = document.getElementsByTagName("script")[0];
                   s.parentNode.insertBefore(gcse, s);
               })();
            </script>
            <gcse:searchbox-only resultsurl="https://www.franchiseindia.com/search" newwindow="true"
               queryparametername="search"></gcse:searchbox-only>
         </div>
      </li>
      <li>
         <div class="p-2 language-main-bx">
            <div class="input-group input-group-custom">
               <span class="input-group-addon input-group-prepend-custom" id="basic-addon1">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                  alt="" width="19" height="19">
               </span>
               <div class="form-group form-group-sm">
                  <select class="form-control form-control-custom-main" aria-label="Select Language"
                     id="exampleFormControlSelect1" onchange="changelanguage(this.value)">
                     <option hidden="">Language</option>
                     <option value="@yield('englishUrl')" @if ($engUrl == Request::url()) selected @endif>EN -
                     English
                     </option>
                     <option value="@yield('hindiUrl')" @if ($hindiUrl == Request::url()) selected @endif>HI -
                     Hindi
                     </option>
                  </select>
               </div>
            </div>
         </div>
      </li>
      <li class="top-investors top-investor-mobile">
         <div class="dropdown policydropdown">
            <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" style="">
               Investor
               <svg
                  class="svg-inline--fa fa-caret-down fa-w-10" aria-hidden="true" data-prefix="fa"
                  data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor"
                     d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                  </path>
               </svg>
               <!-- <i class="fa fa-caret-down"></i> -->
            </button>
            <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
               <a class="dropdown-item" href="https://www.franchiseindia.com/ipo" target="_blank">IPO</a>
               <a class="dropdown-item" href="https://www.franchiseindia.com/policies"
                  target="_blank">Policies</a>
            </div>
         </div>
      </li>
      <li><a target="_blank" href="/">घरेलू ब्रांड</a></li>
      <li><a target="_blank" href="/premiumbrand">प्रीमियम ब्रांड</a></li>
      <li><a target="_blank" href="/international">अंतरराष्ट्रीय ब्रांड</a></li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a target="_blank" href="https://www.franchiseindia.com/insights">फ्रेंचाइजी इनसाइट्स</a></li>
      <li><a target="_blank" href="https://www.opportunityindia.com/hindi">समाचार</a></li>
      <li><a target="_blank" href="https://video.franchiseindia.com/">वीडियो</a></li>
      <li><a target="_blank" href="https://master.franchiseindia.com/magazine-subscribe/">पत्रिका</a></li>
   </ul>
   <div class="categoryall-franchise border-bottom-1">
      <div class="busheadmebu"><a target="_blank" href="/categoryall">फ्रेंचाइजी श्रेणियां</a></div>
      @php
      $categoryArr = Config('constants.CategoryArr');
      asort($categoryArr);
      $i = 0;
      @endphp
      <ol class="tree">
         @foreach ($categoryArr as $key => $value)
         <li>
            <label for="folder1">
            <a target="_blank"
               href="{{ $key == '5' ? Config::get('constants.OIDomain') : '/business-opportunities/' . Config('category.SeoCategoryArr.' . $key) . '.m' . $key }}
               ">{{ $value }}</a>
            </label> <input type="checkbox" id="folder1">
            <ol>
               @foreach (Config('constants.subCategoryArr.' . $key) as $key1 => $value1)
               <li>
                  <label for="subsubfolder1">
                  <a target="_blank"
                     href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubCategoryArr.' . $key1)) ? '/dir/' . Config('category.SeoSubCategoryArr.' . $key1) : '') : '/business-opportunities/' . Config('category.SeoSubCategoryArr.' . $key1) . '.sc' . $key1 }}">{{ $value1 }}</a></label>
                  <input type="checkbox" id="subsubfolder1">
                  <ol>
                     @foreach (Config('constants.subSubCategoryArr.' . $key1) as $key2 => $value2)
                     @php
                     $sscJson = \Illuminate\Support\Facades\Storage::getFacadeRoot()->get(
                     'ssc.json',
                     );
                     $sscArray = json_decode($sscJson, true);
                     @endphp
                     @if (is_array($sscArray) && in_array($key2, $sscArray))
                     <li>
                        <a target="_blank"
                           href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubSubCategoryArr.' . $key2)) ? '/dir/' . Config('category.SeoSubSubCategoryArr.' . $key2) : '') : '/business-opportunities/' . Config('category.SeoSubSubCategoryArr.' . $key2) . '.ssc' . $key2 }}">{{ $value2 }}</a>
                     </li>
                     @endif
                     @endforeach
                  </ol>
               </li>
               @endforeach
            </ol>
         </li>
         @endforeach
         <li>
            <span class="shaicon">
               <div class="reddownrightsprite"></div>
            </span>
            <a target="_blank"
               href="{{ Config('constants.MainDomain') }}/hi/business-opportunities/lowcost">कम लागत वाले
            व्यवसाय के अवसर</a>
         </li>
      </ol>
   </div>
   <div class="busheadmebu martop">हमारे समूह की वेबसाइट</div>
   <ul class="list-unstyled components border-bottom-1">
      <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a>
      </li>
      <li><a target="_blank" href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
      <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a>
      </li>
      <li><a target="_blank" href="https://restaurant.indianretailer.com">restaurantindia.in</a></li>
      <li><a target="_blank"
         href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a></li>
      <li><a target="_blank"
         href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a></li>
      <li><a target="_blank" href="https://www.franchisebangladesh.com/"
         rel="nofollow">franchisebangladesh.com</a></li>
      <li><a target="_blank" href="https://www.businessex.com/" rel="nofollow">businessex.com</a></li>
      <li><a target="_blank" href="https://www.licenseindia.com/" rel="nofollow">licenseindia.com</a></li>
      <li><a target="_blank" href="https://www.bradfordlicenseindia.com/"
         rel="nofollow">bradfordlicenseindia.com</a></li>
      <li><a target="_blank" href="https://www.franchiseindia.net/" rel="nofollow">franchiseindia.net</a>
      </li>
      <li><a target="_blank" href="https://www.franchiseindia.in/" rel="nofollow">franchiseindia.in</a></li>
      <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a></li>
      <li><a target="_blank" href="https://www.franglobal.com/" rel="nofollow">franglobal.com</a></li>
      <li><a target="_blank" href="http://www.franchiseindiaventures.com/"
         rel="nofollow">franchiseindiaventures.com</a></li>
      <li><a target="_blank" href="https://www.gauravmarya.com/" rel="nofollow">gauravmarya.com</a></li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a href="https://www.businessex.com/" target="_blank">अपना व्यवसाय बेचें</a></li>
      <li><a href="https://www.licenseindia.com/" target="_blank">ब्रांड लाइसेंस खरीदें</a></li>
      <li><a href="#expandFranchise" target="_blank">अपने फ्रेंचाइजी का विस्तार करें</a></li>
      <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">संपत्ति के खिलाफ ऋण</a></li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">हमारे साथ
         विज्ञापन</a>
      </li>
      <li><a href="https://master.franchiseindia.com/magazine-subscribe/" target="_blank">पत्रिका की सदस्यता
         लें</a>
      </li>
      <li><a href="https://www.franchiseindia.com/book" target="_blank">रिपोर्टों
         &amp; पुस्तकें</a>
      </li>
      <li><a href="https://www.franchiseindia.com/event/" target="_blank">प्रतिस्पर्धा</a></li>
      <li><a href="https://www.franchiseindia.com/pg/initiatePaymentDataForm.php" target="_blank">Pay Now</a>
      </li>
   </ul>
   <ul class="list-unstyled components">
      <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">निवेशक साइनअप</a></li>
      <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">फ्रेंचाइज़र
         साइनअप</a>
      </li>
      <li>
         <div class="side-bar-social">
            <ul class="sidebar-social">
               <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg"
                  alt="facebook-icon" class="mCS_img_loaded" width="36"
                  height="36"></a></li>
               <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg"
                  alt="twitter-icon" class="mCS_img_loaded" width="36" height="36"></a>
               </li>
               <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg"
                  alt="instagram-icon" class="mCS_img_loaded" width="36"
                  height="36"></a></li>
               <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg"
                  alt="youtube-icon" class="mCS_img_loaded" width="36" height="36"></a>
               </li>
               <li><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/linkedin-new.svg"
                  alt="linkedin-icon" class="mCS_img_loaded" width="36"
                  height="36"></a></li>
            </ul>
         </div>
      </li>
      <li>
         <div class="main-link">
            <ul class="main-link-section">
               <li><a href="https://www.franchiseindia.com/about" target="_blank">हमारे बारे में</a></li>
               <li><a href="https://www.franchiseindia.com/contact" target="_blank">संपर्क करें</a></li>
               <li><a href="https://www.franchiseindia.com/feedback" target="_blank">प्रतिपुष्टि</a></li>
            </ul>
         </div>
      </li>
      <li>
         <div class="contact-us-section">टोल फ्री 1800 102 2007</div>
      </li>
   </ul>
   <div id="mCSB_1_scrollbar_vertical"
      class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical" style="display:block">
      <div class="mCSB_draggerContainer">
         <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
            style="position:absolute;min-height:50px;display:block;height:187px;max-height:603.333px;top:0">
            <div class="mCSB_dragger_bar" style="line-height:50px"></div>
         </div>
         <div class="mCSB_draggerRail"></div>
      </div>
   </div>
</nav>
@else
<nav id="sidebar">
   <div id="dismiss"><i class="fas fa-arrow-left"></i></div>
   <ul class="list-unstyled components border-bottom-1 pt-35">
      <li>
         <div class="google-search">
            <script>
               (function() {
                   var cx = "017593288126496616373:bpgflqv932a";
                   var gcse = document.createElement("script");
                   gcse.type = "text/javascript";
                   gcse.async = true;
                   gcse.src = "https://cse.google.com/cse.js?cx=" + cx;
                   let s = document.getElementsByTagName("script")[0];
                   s.parentNode.insertBefore(gcse, s);
               })();
            </script>
            <gcse:searchbox-only resultsurl="https://www.franchiseindia.com/search" newwindow="true"
               queryparametername="search"></gcse:searchbox-only>
         </div>
      </li>
      <li>
         <div class="p-2 language-main-bx">
            <div class="input-group input-group-custom">
               <span class="input-group-addon input-group-prepend-custom" id="basic-addon1">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                  alt="" width="19" height="19">
               </span>
               <div class="form-group form-group-sm">
                  <select class="form-control form-control-custom-main" aria-label="Select Language"
                     id="exampleFormControlSelect1">
                     <option hidden="">Language</option>
                     <option value="{{ url('/homepage') }}">EN - English</option>
                     <option value="{{ url('/homepage/hi') }}">HI - Hindi</option>
                  </select>
               </div>
            </div>
         </div>
      </li>
      <li class="top-investors top-investor-mobile">
         <div class="dropdown policydropdown">
            <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               style="">
               Investor
               <svg class="svg-inline--fa fa-caret-down fa-w-10"
                  aria-hidden="true" data-prefix="fa" data-icon="caret-down" role="img"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor"
                     d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                  </path>
               </svg>
               <!-- <i class="fa fa-caret-down"></i> -->
            </button>
            <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
               <a class="dropdown-item" href="https://www.franchiseindia.com/ipo" target="_blank">IPO</a>
               <a class="dropdown-item" href="https://www.franchiseindia.com/policies"
                  target="_blank">Policies</a>
            </div>
         </div>
      </li>
      <li><a target="_blank" href="/">Domestic Brands</a></li>
      <li><a target="_blank" href="/premiumbrand">Premium Brands</a></li>
      <li><a target="_blank" href="/international">International</a></li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a target="_blank" href="https://www.franchiseindia.com/insights">Franchise Insights</a></li>
      <li><a target="_blank" href="https://www.opportunityindia.com/">News</a></li>
      <li><a target="_blank" href="https://video.franchiseindia.com/">Video</a></li>
      <li><a target="_blank" href="https://master.franchiseindia.com/magazine-subscribe/">Magazine</a></li>
      <li><a href="https://www.franchiseindia.com/top-100-franchise" target="_blank">Top 100 Franchise</a>
      </li>
      <li><a href="https://www.franchiseindia.com/most-visitedbrands" target="_blank">Most Searched Franchise
         Brands</a>
      </li>
   </ul>
   <div class="categoryall-franchise border-bottom-1">
      <div class="busheadmebu"><a target="_blank" href="/categoryall">Franchise Categories</a></div>
      @php
      $categoryArr = Config('constants.CategoryArr');
      asort($categoryArr);
      $i = 0;
      @endphp
      <ol class="tree">
         @foreach ($categoryArr as $key => $value)
         @php
         $catClass = 'Cate' . $key;
         $subcatClass = 'SubCat' . $key;
         $subsubcatClass = '';
         @endphp
         <li>
            <label for="folder1">
            <a target="_blank"
               href="{{ $key == '5' ? Config::get('constants.OIDomain') : '/business-opportunities/' . Config('category.SeoCategoryArr.' . $key) . '.m' . $key }}
               ">{{ $value }}</a>
            </label> <input type="checkbox" id="folder1">
            <ol>
               @foreach (Config('constants.subCategoryArr.' . $key) as $key1 => $value1)
               <li>
                  <label for="subsubfolder1">
                  <a target="_blank"
                     href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubCategoryArr.' . $key1)) ? '/dir/' . Config('category.SeoSubCategoryArr.' . $key1) : '') : '/business-opportunities/' . Config('category.SeoSubCategoryArr.' . $key1) . '.sc' . $key1 }}">{{ $value1 }}</a></label>
                  <input type="checkbox" id="subsubfolder1">
                  <ol>
                     @foreach (Config('constants.subSubCategoryArr.' . $key1) as $key2 => $value2)
                     @php
                     $sscJson = json_decode(
                     \Illuminate\Support\Facades\Storage::getFacadeRoot()->get(
                     'ssc.json',
                     ),
                     true,
                     );
                     @endphp
                     @if (is_array($sscJson) && in_array($key2, $sscJson))
                     <li>
                        <a target="_blank"
                           href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubSubCategoryArr.' . $key2)) ? '/dir/' . Config('category.SeoSubSubCategoryArr.' . $key2) : '') : '/business-opportunities/' . Config('category.SeoSubSubCategoryArr.' . $key2) . '.ssc' . $key2 }} ">{{ $value2 }}</a>
                     </li>
                     @endif
                     @endforeach
                  </ol>
               </li>
               @endforeach
            </ol>
         </li>
         @endforeach
         <li>
            <span class="shaicon">
               <div class="rightdimg"></div>
            </span>
            <a target="_blank" href="{{ Config('constants.MainDomain') }}/business-opportunities/lowcost">Low
            Cost Business Opportunities</a>
         </li>
      </ol>
   </div>
   <div class="busheadmebu martop">Our Group website</div>
   <ul class="list-unstyled components border-bottom-1">
      <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a>
      </li>
      <li><a target="_blank" href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
      <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a>
      </li>
      <li><a target="_blank" href="https://restaurant.indianretailer.com">restaurantindia.in</a></li>
      <li><a target="_blank"
         href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a></li>
      <li><a target="_blank"
         href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a></li>
      <li><a target="_blank" href="https://www.franchisebangladesh.com/"
         rel="nofollow">franchisebangladesh.com</a></li>
      <li><a target="_blank" href="https://www.businessex.com/" rel="nofollow">businessex.com</a></li>
      <li><a target="_blank" href="https://www.licenseindia.com/" rel="nofollow">licenseindia.com</a></li>
      <li><a target="_blank" href="https://www.bradfordlicenseindia.com/"
         rel="nofollow">bradfordlicenseindia.com</a></li>
      <li><a target="_blank" href="https://www.franchiseindia.net/" rel="nofollow">franchiseindia.net</a>
      </li>
      <li><a target="_blank" href="https://www.franchiseindia.in/" rel="nofollow">franchiseindia.in</a></li>
      <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a></li>
      <li><a target="_blank" href="https://www.franglobal.com/" rel="nofollow">franglobal.com</a></li>
      <li><a target="_blank" href="http://www.franchiseindiaventures.com/"
         rel="nofollow">franchiseindiaventures.com</a></li>
      <li><a target="_blank" href="https://www.gauravmarya.com/" rel="nofollow">gauravmarya.com</a></li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a href="https://www.businessex.com/" target="_blank">Sell your Business</a></li>
      <li><a href="https://www.licenseindia.com/" target="_blank">Buy a Brand License</a></li>
      <li><a href="#expandFranchise" target="_blank">Expand Your Franchise</a></li>
      <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">Loan Against Property</a>
      </li>
   </ul>
   <ul class="list-unstyled components border-bottom-1">
      <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">Advertise With
         us</a>
      </li>
      <li><a href="https://master.franchiseindia.com/magazine-subscribe/" target="_blank">Subscribe
         Magazine</a>
      </li>
      <li><a href="https://www.franchiseindia.com/book" target="_blank">Reports &amp; Books</a></li>
      <li><a href="https://www.franchiseindia.com/event/" target="_blank">Event</a></li>
      <li><a href="https://www.franchiseindia.com/pg/initiatePaymentDataForm.php" target="_blank">Pay Now</a>
      </li>
   </ul>
   <ul class="list-unstyled components">
      <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">Investor Signup</a></li>
      <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">Franchisor
         Signup</a>
      </li>
      <li>
         <div class="side-bar-social">
            <ul class="sidebar-social">
               <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg"
                  alt="facebook-icon" loading="lazy" width="36" height="36"></a></li>
               <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg"
                  alt="twitter-icon" loading="lazy" width="36" height="36"></a></li>
               <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg"
                  alt="instagram-icon" loading="lazy" width="36" height="36"></a></li>
               <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg"
                  alt="youtube-icon" loading="lazy" width="36" height="36"></a></li>
               <li><a href="https://www.linkedin.com/company/franchiseindia/" target="_blank"><img
                  src="https://www.franchiseindia.com/newhomepage/assets/img/linkedin-new.svg"
                  alt="linkedin-icon" loading="lazy" width="36" height="36"></a></li>
            </ul>
         </div>
      </li>
      <li>
         <div class="main-link">
            <ul class="main-link-section">
               <li><a href="https://www.franchiseindia.com/about" target="_blank">About us</a></li>
               <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact us</a></li>
               <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
            </ul>
         </div>
      </li>
      <li>
         <div class="contact-us-section">Toll Free 1800 102 2007</div>
      </li>
   </ul>
   <div id="mCSB_1_scrollbar_vertical"
      class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical" style="display:block">
      <div class="mCSB_draggerContainer">
         <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
            style="position:absolute;min-height:50px;display:block;height:187px;max-height:603.333px;top:0">
            <div class="mCSB_dragger_bar" style="line-height:50px"></div>
         </div>
         <div class="mCSB_draggerRail"></div>
      </div>
   </div>
</nav>
@endif
<style>
   #sidebar ul li a:hover {
   background: #fff;
   color: #dc3545 !important;
   }
</style>
