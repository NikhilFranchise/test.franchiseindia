var a;
$(document).ready(function () {

    // side menu
    $('.hamburger-handle, .nav-close').click(function (e) {
        e.preventDefault();
        $('.ham-menu-container').toggleClass('open-ham-menu');
    });

    $('.ham-null').not('.ham-menu').click(function () {
        $('.ham-menu-container').removeClass('open-ham-menu');
    });

    $('.node-icon').click(function (e) {
        e.preventDefault();
        $(this).parent().siblings('ul').toggleClass('open');
        $(this).toggleClass('icon-down');
    });

    $("#GalleryModal").css("opacity", "0");

    $(".cl-popup").click(function () {
        $("#brandspopup").css("bottom", "-100vh");
    });

    $(".cl-comp-popup").click(function () {
        $("#comparepopup").css("bottom", "-100vh");
    });

    // ---------------EVENTS SLIDER----------------------
    function createHomeSlick() {
        $('.home_slider').not('.slick-initialized').slick({
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            asNavFor: '.home_slider_captions',
            prevArrow: $('.hsa_prev_arr'),
            nextArrow: $('.hsa_next_arr')
        });

        if ($('.h_slide').length <= 1) {
            $('.home-slider-arrows').hide();
        }

        $('.home_slider_captions').not('.slick-initialized').slick({
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            centerMode: true,
            asNavFor: '.home_slider',
            centerMode: false,
            focusOnSelect: true
        });

    }
    createHomeSlick();

    function createEventSlick() {
        $('.event_slider').not('.slick-initialized').slick({
            arrows: false,
            dots: true,
            slidesToScroll: 1,
            slidesToShow: 1,
            infinite: false
        });
    }

    createEventSlick();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var footer = $('.about-section').height() + $('footer').height() + 350;
        var body = $(document).height();
        var sticky_rm = body - footer - 150;

        if (scroll >= 500) {
            $('.home_tabs').addClass('sticky');
        } else {
            $('.home_tabs').removeClass('sticky');
        }

        if (scroll >= sticky_rm) {
            $('.home_tabs').removeClass('sticky');
        }

        if (scroll >= 1300 && ( $(window).scrollTop() + $(window).height() ) < ( $(document).height() -
            (
                $('.about-section').outerHeight() +
                $('footer').outerHeight() +
                $('.footer-nav').outerHeight()
            ))) {
            $('.sidebar-ad').addClass('sticky').css('width', $('aside').width());
        } else {
            $('.sidebar-ad').removeClass('sticky');
        }


        // sidebar ad footer remove sticky
        if(
            ( $(window).scrollTop() + $(window).height() ) > ( $(document).height() -
            (
                $('.about-section').outerHeight() +
                $('footer').outerHeight() +
                $('.footer-nav').outerHeight()
            )) && ($('.tab-pane.active .franchise-card').length > 0)
        ) {
            $('.sidebar-ad').addClass('touched');
        } else {
            $('.sidebar-ad').removeClass('touched');
        }
    });

    $('.like_gm').unbind('click').bind('click', function (e) {
        $(this).toggleClass('checked');
    });

    var scrollTop = $('#scrolltotop');

    $(window).scroll(function() {
        // reset button
        if (
            ( $(window).scrollTop() + $(window).height() ) <
            ( $(document).height() - $('footer').outerHeight() ) &&
            $(window).scrollTop() > 160
        ) {
            $('.reset_btn').addClass('fixed');
        } else {
            $('.reset_btn').removeClass('fixed');
        }

        // scroll to top
        if ( $(window).scrollTop() > 800 ) {
            scrollTop.css('transform', 'rotate(360deg)');
            scrollTop.fadeIn();
        } else {
            scrollTop.css('transform', 'rotate(180deg)');
            scrollTop.fadeOut();
        }
    });

    scrollTop.click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});