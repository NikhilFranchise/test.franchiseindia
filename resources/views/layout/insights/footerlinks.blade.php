<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ url('insight-new/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Template Main JS File -->
<script src="{{url('insight-new/assets/js/main.js')}}"></script>
<script src="{{ url('insight-new/assets/js/swiper.min.js') }}"></script>
<script src="https://dimsemenov.com/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<!-- for  start article detail page   -->
<script src="{{ asset('insight-new/js/insight-newsletter.js') }}" defer></script>
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
                slidesPerView: 1.5,
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
                slidesPerView: 1.5,
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
                slidesPerView: 1.5,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
        }
    });
    var swiper = new Swiper('.sliderauthor .swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: false,
        // AutoPlay
        autoplay: {
            delay: 2700,
            speed: 1000,
            disableOnInteraction: true,
            watchSlidesProgress: true,
            watchVisibility: true,
        },
        // init: false,
        pagination: {
            el: '.sliderauthor  .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.sliderauthor .swiper-button-next',
            prevEl: '.sliderauthor .swiper-button-prev',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1.5,
                spaceBetween: 10,
                loop: true,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
                loop: true,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        }
    });
    var swiper = new Swiper('.slidereport .swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: false,
        // AutoPlay
        autoplay: {
            delay: 2700,
            speed: 1000,
            disableOnInteraction: true,
            watchSlidesProgress: true,
            watchVisibility: true,
        },
        // init: false,
        pagination: {
            el: '.slidereport  .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.slidereport .swiper-button-next',
            prevEl: '.slidereport .swiper-button-prev',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1.5,
                spaceBetween: 10,
                loop: true,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
                loop: true,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        }
    });

    $("#tog1").click(function() {
        $('img', this).toggle();
        $('#searchbar').toggle();
    });

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

    $(document).ready(function() {
        if (screen.width < 600) {
            $("#sidefeedbackfrm").click(function() {
                let sideBlock = $(".sidefeedback");
                if (sideBlock.css('right') === '-303px') {
                    sideBlock.animate({
                        "right": "+=303px"
                    }, 1000);
                } else {
                    sideBlock.animate({
                        "right": "-=303px"
                    }, 1000);
                }
            });
        } else {
            $("#sidefeedbackfrm").click(function() {
                let
                    sideBlock = $(".sidefeedback");
                if (sideBlock.css('right') === '-375px') {
                    sideBlock.animate({
                        "right": "+=375px"
                    }, 1000);
                } else {
                    sideBlock.animate({
                        "right": "-=375px"
                    }, 1000);
                }
            });
        }
    });

    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            type: 'iframe'
        });
    });
</script>