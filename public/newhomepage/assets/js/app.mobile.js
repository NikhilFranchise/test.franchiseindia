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

//loging section sidebar
$(document).ready(function () {
    $("#sidebar-login").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss-login, .overlay').on('click', function () {
        $('#sidebar-login').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse-main-login').on('click', function () {
        $('#sidebar-login').addClass('active');
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
//search bar class
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

var swiper = new Swiper('.swiper-container', {
    // mousewheel: true,
    loop: true,
    slidesPerView: 'auto',
    slidesPerView: 1.5,
    spaceBetween: 10,
    // init: false,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    // autoplay: {
    //     delay: 1000,
    //     disableOnInteraction: true,
    //   },
    scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
    },
    keyboard: {
        enabled: true,
    },
    breakpoints: {
      //samll
        '@0.00': {
        slidesPerView:  1.5,
        spaceBetween: 15,
      },
        //xs
      '@0.25': {
            slidesPerView:  1.5,
            spaceBetween: 15,
        },
        //tab-mini
        '@0.50': {
            slidesPerView:  1.5,
            spaceBetween: 15,
        },
        //ipad

        '@0.75': {
        slidesPerView: 2.5,
        spaceBetween: 15,
      },
        //desktop-mini
      '@1.00': {
        slidesPerView: 3.5,
        spaceBetween: 20,
      },
        //xl-lg desktop
      '@1.50': {
        slidesPerView: 4 ,
        spaceBetween: 25,
      },
    }
  });
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