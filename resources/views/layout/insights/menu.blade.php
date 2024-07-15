
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
 
      <div class="container">
          <div class="topright">
              
              {{-- <div class="tuser"><img src="{{url('insight-new/images/profile-user.svg')}}" alt="" /></div> --}}
          </div>
      </div>
     
  <div class="logobar">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-12 d-flex align-items-center">
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <a href="{{url('/insights')}}" class="logo mr-auto"><img src="{{url('insight-new/images/logo.svg')}}" alt="Franchise india Insights" /></a>
                    
                  <nav class="nav-menu d-none d-lg-block">
                      <ul>
                         

                          <li>
                            <div class="dropdown">
                              <button class="dbtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Categories
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="categoryList">
                                 @php
                                 $categories = \App\Http\Controllers\InsightsController::insightcategory();
                                 @endphp
                                 @foreach ($categories as $cat)
                                 <a class="dropdown-item" data-id="{{ $cat['id'] }}" href="/insights/{{ $cat['slug'] }}">{{ $cat['catname'] }}</a>
                                 @endforeach
                              </div>
                          </div>
                          </li>
                          <li><a href="/insights/topstories">Top Stories</a></li>
                          <li><a href="/insights/industryfocus">Insights</a>
                            
                        </li>                        
                          
                          <li><a href="/insights/interviews">Executive Interviews</a></li>
                          
                          <li><a href="/insights/events_reports">Events & Reports</a></li>
                      </ul>
                  </nav>
                  <div class="search-main mx-auto">
                      <div class="ev-spk-icon">
                          <span id="tog1">
                              <img src="https://www.opportunityindia.com/images/search.svg" alt="Search" style="" />
                              <img src="https://www.opportunityindia.com/images/cross.png" alt="Close" style="display: none;" />
                          </span>
                      </div>

                      <div id="searchbar" style="display: none;">
                          <form action="{{url('search/insights')}}" method="get">
                              <div class="input-group">
                                  <div class="form-outline">
                                      <input type="search" name="search" id="form1" class="form-control1" placeholder="Search here" />
                                  </div>
                                  <button type="submit" class="btn1 btn-primary" value="Search">Search</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


