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

    // jQuery add toggleAttr function
    jQuery.fn.toggleAttr = function(attr) {
        return this.each(function() {
            var $this = $(this);
            $this.attr(attr) ? $this.removeAttr(attr) : $this.attr(attr, attr);
        });
    };

    // sidebar label anchor check
    $('.category_selector label a').click(function () {
        $(this).siblings('input').toggleAttr('checked');
    });


    var z = false;
    $("#GalleryModal").css("opacity","0");

    $( ".close-gallery-modal" ).click(function() {
        $('body').removeClass('menuopen');
    });

    $('.showless').click(function(){

        $(".showless-text").text(($(".showless-text").text() == 'Show MoreShow More') ? 'Show Less' : 'Show More').fadeIn();
        $('.modal-info').slideToggle( "slow");
        $(".show-less-arrow").toggleClass("down");
        console.log($(".showless-text").text());
    });

    $( ".cl-popup" ).click(function() {
        $("#brandspopup").css("bottom", "-120vh");
    });

    $( ".cl-comp-popup" ).click(function() {
        $("#comparepopup").css("bottom", "-120vh");
    });

    $('.popup-heading .expand').click(function(){

        var text1 =  $(this).children('span').text();

        if (text1 == "Hide") {
            $(this).children('span').text("Show");
        }

        else {
            $(this).children('span').text("Hide");
        }

        $('.brands-selected').slideToggle("fast");

        $('.arrow-down').toggleClass("down");

    });

    $('.brands').click(function(){
        $('#brandspopup').slideToggle( "fast" );
    });


    // ---------------Home Brand SLIDER----------------------
    // calculate titles width based on home slider
    $('.home_slider_captions').css('width', $('.home_slider').width());

    function createHomeSlick() {
        $('.home_slider').not('.slick-initialized').slick({
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            prevArrow: $('.hsa_prev_arr'),
            nextArrow: $('.hsa_next_arr')
        });
    }

    createHomeSlick();

    // ---------------Event Slider----------------------
    function createEventSlick(){
        $('.event_slider').not('.slick-initialized').slick({
            arrows: false,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToScroll: 1,
            slidesToShow: 1,
            infinite: true
        });
        if ($('.h_slide').length <= 1) {
            $('.home-slider-arrows').hide();
        }
    }

    createEventSlick();


    // ---------------Quotation Slider----------------------
    $("#quotationModal").on('shown.bs.modal', function() {

        if($(".brand_selector").not('.slick-initialized').length > 0) {
            $('.brand_selector').slick({
                arrows: true,
                dots: false,
                autoplay: true,
                autoplaySpeed: 3000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                prevArrow: $('.bs_arrows .bs_prev'),
                nextArrow: $('.bs_arrows .bs_next'),
                slidesToScroll: 2,
                slidesToShow: 2.4,
                infinite: false
            });
        }
    });

    // ----------HOMEPAGE CARDS-------------
    $('.card-overlay').css('pointer-events', 'none');

    $('.share_gm').unbind('click').bind('click', function (e) {
        // $(this).siblings('.franchise-card').children('card-overlay').css
        $(this).toggleClass('checked');
        // console.log('clicked');
    });

    $('.like_gm').unbind('click').bind('click', function (e) {
        $(this).toggleClass('checked');
        // console.log('clicked');
    });

    //---------- Scroll To Top
    $(window).scroll(function() {
        if ( $(window).scrollTop() > 600 ) {
            $('#scrolltotop').css('transform', 'rotate(360deg)');
            $('#scrolltotop').fadeIn();
        } else {
            $('#scrolltotop').css('transform', 'rotate(180deg)');
            $('#scrolltotop').fadeOut();
        }
    });

    $('#scrolltotop').click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});

$(document).ready(function () {

    // mobile navbar height + breadcrumb calculate & set other elements
    $('.category_icons').css('top', '50%').css('margin-top', - ($('.category_icons').height() / 2 ));
    $('.nav_category').css('margin-top', $('.nav_top_container').height());

    if ( $(window).height() <= 580 ) {
        $('.category_icons').css('top', '50%').css('margin-top', (- ( $('.category_icons').height() / 2 )) + 20);
    }

    // -----------MOBILE SIDEBAR--------------
    $('.filter_btn').click(function(){
        $('.category_selector').addClass('filter_open');
    });

    $('.hide_filter_icon').click(function () {
        $('.category_selector').removeClass('filter_open');
    });

    // ----------- SortBy Modal --------------
    $('.sort_btn').click(function(){
        $('.nc_sort').addClass('sort_open');
        $('body').addClass('menuopen');
    });

    $('.sort_close, .nc_sort_empty').click(function () {
        $('.nc_sort').removeClass('sort_open');
        $('body').removeClass('menuopen');
    });

    $('.nc_sort_links').click(function () {
        setTimeout(function () {
            $('.nc_sort').removeClass('sort_open');
            $('body').removeClass('menuopen');
        }, 300);
    });

    $('.mobile-sidebar-opener').click(function (e) {
        e.preventDefault();
        $(this).parent('.category_icons').toggleClass('open');
    })

});