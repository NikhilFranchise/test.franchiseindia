  <!-- Vendor JS Files -->
  <script src="{{url('insight-new/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('insight-new/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 {{-- <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{url('insight-new/assets/js/main.js')}}"></script>
<script src="{{url('insight-new/assets/js/swiper.min.js')}}"></script>

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

            $("#tog1").click(function(){
  $('img',this).toggle();
  $('#searchbar').toggle();
});
  </script>


  <!-- for  end  here home  -->

  <script type="text/javascript">
    $(document).ready(function() {    
     $("#show1").click(function() {
    $(".ftrblk1").toggle(400);
    }); 
    $("#show2").click(function() {
    $(".ftrblk2").toggle(400);
    }); 
    $("#show3").click(function() {
    $(".ftrblk3").toggle(400);
    }); 
    $("#show4").click(function() {
    $(".ftrblk4").toggle(400);
    }); 
    $("#show5").click(function() {
    $(".ftrblk5").toggle(400);
    }); 
    $("#show6").click(function() {
    $(".ftrblk6").toggle(400);
    }); 
    $("#show7").click(function() {
    $(".ftrblk7").toggle(400);
    }); 
    $("#show8").click(function() {
    $(".ftrblk8").toggle(400);
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




}); 
</script>
