$(document).ready(function () {
    // Sidebar
    $("#sidebar, #sidebar-login").mCustomScrollbar({
        theme: "minimal"
    });

    // Sidebar toggling
    $('#dismiss, #dismiss-login, .overlay').on('click', function () {
        $('#sidebar, #sidebar-login').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse, #sidebarCollapse-main-login').on('click', function () {
        $('#sidebar, #sidebar-login').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    // Header Shadow on Scroll
    var header = $('.header');
    var onScroll = function () {
        if ($(window).scrollTop() !== 0) {
            if (!header.hasClass('shadow')) {
                header.addClass('shadow');
            }
        } else {
            header.removeClass('shadow');
        }
    };

    $(window).scroll(onScroll);

    // Swiper Slider
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            hide: true,
        },
        keyboard: {
            enabled: true,
        },
        breakpoints: {
            '@0.00': {
                slidesPerView: 1.5,
                spaceBetween: 15,
            },
            '@0.25': {
                slidesPerView: 1.5,
                spaceBetween: 15,
            },
            '@0.50': {
                slidesPerView: 1.5,
                spaceBetween: 15,
            },
            '@0.75': {
                slidesPerView: 2.5,
                spaceBetween: 15,
            },
            '@1.00': {
                slidesPerView: 3.5,
                spaceBetween: 20,
            },
            '@1.50': {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        }
    });

    // Testimonials Carousel
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
});
