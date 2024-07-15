
<div class="slidercomman slidercommany">


    <div class="container">
    <div class="comhead"><a href="#">Categories</a></div>
    <div class="swiper-container">
    <div class="swiper-wrapper">
       
    
    
    <!-- below list start here  1-->
    @foreach ($topcategories as $category)
    
    @php
   
        $slug = str_replace(' ','-',$category->name);
        // echo $slug;
          $tagslug = Config('constants.MainDomain') . '/insights/tag/' . strtolower($slug); 
    @endphp
    <div class="swiper-slide"> 
        <div class="innerlist">
        <div class="imgbl"><a href="{{$tagslug}}" target="_blank"><img alt="{{$category->name}}" src="
            @if ($category->name == 'Education')
            {{url('insight-new/assets/images/Education.png')}}
            @elseif($category->name == 'Retail')
            {{url('insight-new/assets/images/Retail.png')}}
            @elseif($category->name == 'Food and Beverage')
            {{url('insight-new/assets/images/FoodBeverage.png')}}
            @elseif($category->name == 'expansion')
            {{url('insight-new/assets/images/Expansion.png')}}
            @elseif($category->name == 'Launch')
            {{url('insight-new/assets/images/StoreLaunch.png')}}
            @elseif($category->name == 'Startup')
            {{url('insight-new/assets/images/Startup.png')}}
            @elseif($category->name == 'funding')
            {{url('insight-new/assets/images/Funding.png')}}
            @elseif($category->name == 'expansion plans')
            {{url('insight-new/assets/images/ExpansionPlans.png')}}
            @elseif($category->name == 'Franchise 100')
            {{url('insight-new/assets/images/Franchise100.png')}}
            @else
            {{url('insight-new/assets/images/Investment.png')}}
            @endif
            ">
        <span>{{ucwords($category->name)}}</span>
        </a></div>
       
           

    </div>
    </div>
    @endforeach
    <!-- below list end here  1 -->
    
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    </div>
    
    
    
    </div>	
    
    </div>