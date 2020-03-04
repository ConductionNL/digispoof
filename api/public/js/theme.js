$(document).ready(function() {
    "use strict";

    // Smooth Scroll
    $('body').on('click', '.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 0)
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    // Quote Carousel
    $('#quote-carousel').carousel({
        pause: true,
        interval: 4000,
    });

    // Scrollspy
    $('body').scrollspy({
        target: ".navbar",
        offset: 20
    })

    // Parallax
    jarallax(document.querySelectorAll('.jarallax'), {
        imgWidth: 1920,
        imgHeight: 1080,
        speed: 0.2
    });

    // Hero Slider
    $('.intro-slider').slick({
        infinite: true,
        slidesToShow: 1,
        speed: 800,
        slidesToScroll: 1,
        arrows: false,
        dots: true
    });

    // Team Slider
    $('.team-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 700,
                settings: {
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // Iphone Slider
    $('.screen .slider').slick({
        fade: true,
        speed: 0,
        arrows: false,
        dots: false,
        useCSS: false,
        autoplay: true,
        autoplayspeed: 3000
    });

// Back to Top
$(window).scroll(function() {
    var value = $(this).scrollTop();
    if (value > 80)
        $(".back-to-top").addClass("act");
    else
        $(".back-to-top").removeClass("act");
});

});