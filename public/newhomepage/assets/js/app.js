$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
var header = $('.header');

$(window).scroll(function(e){
    if(header.offset().top !== 0){
        if(!header.hasClass('shadow')){
            header.addClass('shadow');
        }
    }else{
        header.removeClass('shadow');
    }
});
// //search bar class
// $(document).scroll(function () {
// 	myID = document.getElementById("search");
// 	var a = function () {
// 		var b = window.scrollY;
// 		if (b >= 300) {
// 			myID.className = "search show slide-right"
// 		} else {
// 			myID.className = "search hide"
// 		}
// 	};
// 	window.addEventListener("scroll", a)
// });

  (function($) {
    "use strict";
  
    /*--/ Testimonials owl /--*/
    $('#testimonial-carousel').owlCarousel({
      margin: 0,
      autoplay: true,
      nav: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeInUp',
      navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        }
      }
    });
  
  })(jQuery);

  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });