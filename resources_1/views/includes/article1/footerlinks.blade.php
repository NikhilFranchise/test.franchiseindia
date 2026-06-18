

  <!-- Template Main JS File -->
  <script src="{{asset('article/assets/js/main.js')}}"></script>


  <!-- for  start article detail page   -->
<script>
    var swiper = new Swiper('.maycontentblk .swiper-container', {
        slidesPerView: 1,
      spaceBetween: 10,
    loop: false,
             // AutoPlay            
 autoplay: {
    delay: 2500,
  speed: 1200,
     disableOnInteraction: true,
  watchSlidesProgress: true,
  watchVisibility: true,
  },
          
    // init: false,
      pagination: {
        el: '.maycontentblk  .swiper-pagination',   
        clickable: true,
      },
     navigation: {
        nextEl: '.maycontentblk .swiper-button-next',
        prevEl: '.maycontentblk .swiper-button-prev',
      },
    keyboard: {
  enabled: true,
  onlyInViewport: true,
},
    
      breakpoints: {
        320: {
          slidesPerView:  1.5,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
      }
    });
  </script>
  <!-- for  end  article detail page   -->


    <!-- for  start  list  page   -->
 <script>
    var swiper = new Swiper('.maincateblk .swiper-container', {
        slidesPerView: 1,
      spaceBetween: 10,
    loop: false,
             // AutoPlay
              
 autoplay: {
    delay: 2500,
  speed: 1200,
     disableOnInteraction: true,
  watchSlidesProgress: true,
  watchVisibility: true,
  },
          
    // init: false,
      pagination: {
        el: '.maincateblk  .swiper-pagination',   
        clickable: true,
      },
     navigation: {
        nextEl: '.maincateblk .swiper-button-next',
        prevEl: '.maincateblk .swiper-button-prev',
      },
    keyboard: {
  enabled: true,
  onlyInViewport: true,
},
    
      breakpoints: {
        320: {
         slidesPerView:  1.5,
          spaceBetween: 15,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
      }
    
    
    
    });
  </script>

    <!-- for  end   list  page   -->

  <!-- for  start here home  -->

 <script>
    var swiper = new Swiper('.slidercomman .swiper-container', {
        slidesPerView: 1,
      spaceBetween: 10,
    loop: false,
             // AutoPlay
              
 autoplay: {
    delay: 2500,
  speed: 1200,
     disableOnInteraction: true,
  watchSlidesProgress: true,
  watchVisibility: true,
  },
          
    // init: false,
      pagination: {
        el: '.slidercomman  .swiper-pagination',   
        clickable: true,
      },
     navigation: {
        nextEl: '.slidercomman .swiper-button-next',
        prevEl: '.slidercomman .swiper-button-prev',
      },
    keyboard: {
  enabled: true,
  onlyInViewport: true,
},
    
      breakpoints: {
        320: {
           slidesPerView:  1.5,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView:4,
          spaceBetween: 15,
        },
      }
    
  });
  </script>


  <!-- for  end  here home  -->

    <script type="text/javascript">
$(document).ready(function() {    
 $("#show").click(function() {
$(".ftrblk").toggle(400);
}); 
}); 

  </script>
<script type="text/javascript">
  $(document).ready(function() { 

if(screen.width<600)
{

 $("#sidefeedbackfrm").click(function() {
let sideBlock = $(".sidefeedback");

if (sideBlock.css('right') === '-303px') {
sideBlock.animate({ "right": "+=303px"}, 1000);
}
else {
sideBlock.animate({"right": "-=303px"}, 1000);
}
}); 
}

else
{

 $("#sidefeedbackfrm").click(function() {
let sideBlock = $(".sidefeedback");

if (sideBlock.css('right') === '-375px') {
sideBlock.animate({ "right": "+=375px"}, 1000);
}
else {
sideBlock.animate({"right": "-=375px"}, 1000);
}
}); 

}


//Script For Share Counts//
    $IdPrefix = (location.pathname.indexOf("hi") == 1) ? 'AR-HI-' : 'AR-' ;
    $('.sfv').click(function(){
        $Id = $(this).parent().attr('data-id');
        $clckcount = localStorage.getItem($IdPrefix+$Id);
        $nclck = (typeof $clckcount !== 'undefined') ? Number($clckcount) + 1 : 1 ;       
        localStorage.setItem($IdPrefix+$Id, $nclck);
        $(this).parent().contents()[1].nodeValue = $nclck+' Share';
    })

    $('.sfv').each(function(){
        $Id = $(this).parent().attr('data-id');
        console.log(localStorage.getItem($IdPrefix+$Id));
        $clckcount = localStorage.getItem($IdPrefix+$Id);
        if($clckcount !== null){
            $(this).parent().contents()[1].nodeValue = $clckcount+' Share';
        }
    })
//END//




});
  // $('#search').on('click', function () {
  //     $('#searchBar').toggle('display: inline-block');
  // });

  // function toggler() {
  //     // $("#searchBar").toggle();
  //     var x = document.getElementById("searchBar");
  //     if (x.style.display === "none") {
  //         $("#searchBar").toggle();
  //     } else {
  //         x.style.display = "none";
  //     }
  //
  // }

  $(function() {
      $('img#search').click(function() {
          $('div#searchBar').toggle('inline-block');
          return false;
      });
  });

  $('a#myComment').click(function() {
      $('div#sideBar').toggle('inline-block');
      return false;
  });

  $('img#cross').click(function() {
      $('div#sideBar').hide('inline-block');
      return false;
  });

  $(".plus").click(function(){
      $(this).toggleClass("minus")  ;
      $(".plus").not(this).toggleClass("minus");
  });
</script>
