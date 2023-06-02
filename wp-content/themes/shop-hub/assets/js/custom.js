jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Sticky Header
    ----------------------------------------- */
    if ( $("body").hasClass("header-fixed") ){
        const header = document.querySelector('.bottom-header-part');
        window.onscroll = function() {
            if (window.pageYOffset > 200) {
                header.classList.add('fix-header');
            } else {
                header.classList.remove('fix-header');
            }
        };
        $(document).ready(function() {
            var divHeight = $('.bottom-header-part').height();
            $('.bottom-header-outer-wrapper').css('min-height', divHeight + 'px');
        });
    }

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 992 && $(window).width() >= 991) {
            $('.main-navigation').find("a").unbind('keydown');
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else if ($(window).width() < 992) {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });
    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });
    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });
    $('.header-search-wrap').find("button[type='submit']").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });
    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-style-1 .main-slider ').slick({
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        adaptiveHeight: true,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 568,
                settings: {
                    arrows: false,
                }
            }
        ]
    });
    
    /* -----------------------------------------
    Product Carousel adver
    ----------------------------------------- */
    $('.feat-adver-carousel').slick({
        autoplaySpeed: 3000,
        slidesToShow: 1,
        dots: true,
        arrows: false,
        adaptiveHeight: false,
    });
    
    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.shop-hub-slider-wrapper').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        slidesToShow: 1,
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.shop-hub-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});