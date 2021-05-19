$(function() {
    'user strict';
    //Video js start
    // $('.venobox').venobox();

    //Banner js start
    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        prevArrow: false,
        nextArrow: false

    });

    //counter js
    $('.counter_part').counterUp({
        delay: 10,
        time: 1000
    });

    //sponser
    $('.sponser_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        arrows: true,
        prevArrow: '<i class="fas fa-chevron-left prv_arr" ></i>',
        nextArrow: '<i class="fas fa-chevron-right nxt_arr"></i>'

    });

    // Pre-loader js start
    $(window).on("load", function() {
        $('.pre_loader').delay(500).fadeOut(500);
    });
    // Banner for resturant slider js start
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.slider-nav',
        autoplay: false,
        speed: 1500,
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        arrows: false,
        centerMode: true,
        centerPadding: 0,
        speed: 1500,

    });



});