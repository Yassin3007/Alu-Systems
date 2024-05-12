(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 200, 'linear');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Clients Carousel
    $(".clients-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        autoplayTimeout: 2000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });
})(jQuery);


// Carousel played on hover
function carouselHover(element, hover) {
    var carousel = element.querySelector('.carousel');
    if (hover) {
        $(carousel).carousel('cycle');
    } else {
        $(carousel).carousel('cycle');
    }
}


// Handle footer images when click
$(document).ready(function() {
    // Function to open modal when clicking on an image
    $('.cer-img').click(function(event) {
        event.stopPropagation(); // Prevent event bubbling
        var imgSrc = $(this).attr('src');
        var modal = '<div class="modal"><span class="close-icon"><i class="fas fa-times"></i></span><img src="' + imgSrc + '"></div>';
        $('body').append(modal);
    });

    // Function to close modal when clicking anywhere outside the modal
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.modal').length) {
            $('.modal').remove();
        }
    });

    // Function to close modal when clicking on the close icon or the modal itself
    $(document).on('click', '.close-icon, .modal', function(event) {
        event.stopPropagation(); // Prevent event bubbling
        $('.modal').remove();
    });
});




// Handle swiper actions
const swiper = new Swiper('.swiper', {
    loop: true,

    autoplay: {
        delay: 1200,
    },

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});

const swiperContainer = document.querySelector('.swiper');

swiperContainer.addEventListener('mouseenter', function() {
    swiper.autoplay.stop(); // Pause autoplay on mouse enter
});

swiperContainer.addEventListener('mouseleave', function() {
    swiper.autoplay.start(); // Resume autoplay on mouse leave
});
