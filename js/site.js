"use strict";

document.documentElement.className += ' js';

var Constants = {
    $window: $(window),
    BREAKPOINTS: {
        SMALL:  480,
        MEDIUM: 769,
        LARGE:  960
    }
};

var Platform = {
    IOS: function(){
        return (/Android|iPhone|iPad|iPod|BlackBerry/i).test(navigator.userAgent || navigator.vendor || window.opera);
    },
    IE8: function(){
        return $('html[data-useragent*="MSIE 8"]').length;
    },
    IE9: function(){
        return $('html[data-useragent*="MSIE 9"]').length;
    }
};

var Site = {
    init: function(){
        Site.homeCarousel();
        Site.respNav();
        Site.navCarousel();
        Site.navCarouselResp();
        Site.nav3CarouselResp();
        Site.backToTop();

        if( !(Platform.IOS() || Platform.IE8() || Platform.IE9()) ){
            Site.showVisibleSections();
            Site.scrollAnimate();
        }

        // Browser that don't support SVG
        if(!Site.supportsSvg()) {
            Site.svgClass();
            Site.svgReplace();
        }
    },

    supportsSvg: function(){
        return !! document.createElementNS && !! document.createElementNS('http://www.w3.org/2000/svg','svg').createSVGRect;
    },

    svgClass: function(){
        document.documentElement.className += ' no-svg'
    },

    svgReplace: function(){
        $('img[src*="svg"]').attr('src', function() {
            return $(this).attr('src').replace('.svg', '.png');
        });
    },

    backToTop: function(){
        var $back_to_top = $('.js-back-to-top');

        Constants.$window.on('scroll', function(){
            if($(this).scrollTop() > 200) {
                $back_to_top.addClass('is-visible');
            } else {
                $back_to_top.removeClass('is-visible');
            }
        });

        $('.js-back-to-top').click(function(evt){
            $('html, body').animate({
                scrollTop: $('#top').offset().top
             }, 500);
        });
    },

    parallax: function(){
        var s = skrollr.init({
            forceHeight: false
        });
    },

    respNav: function(){
        $('.js-nav').on('click', function(evt){
            evt.preventDefault();
            $('.js-nav-btn').toggleClass('is-open');
            $('body').toggleClass('show-nav');
        });
    },

    nav_carousel_opts: {
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev slick-prev--nav">Previous</button>',
        nextArrow: '<button type="button" class="slick-next slick-next--nav">Next</button>',
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: Constants.BREAKPOINTS.LARGE,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: Constants.BREAKPOINTS.MEDIUM,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: Constants.BREAKPOINTS.SMALL,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    },

    homeCarousel: function(){
        if(!$('.js-carousel').length) return;

        $('.js-carousel').slick({
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 3,
          responsive: [
            {
              breakpoint: Constants.BREAKPOINTS.MEDIUM,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: Constants.BREAKPOINTS.SMALL,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
    },

    navCarousel: function(){
        if(!$('.js-nav-carousel').length) return;

        $('.js-nav-carousel').slick(this.nav_carousel_opts);
    },

    navCarouselResp: function(){
        if(!$('.js-nav-resp-carousel').length) return;

        var _this = this,
            $nav_resp_carousel = $('.js-nav-resp-carousel');

        $nav_resp_carousel.slick(this.nav_carousel_opts);

        // move back to first frame
        Constants.$window.on('resize', function(){
            if(Constants.$window.width() > Constants.BREAKPOINTS.MEDIUM) {
                $nav_resp_carousel.slickGoTo(0);
            }
        });
    },

    nav3CarouselResp: function(){
        if(!$('.js-nav3-resp-carousel').length) return;

        var _this = this,
            $nav_resp_carousel = $('.js-nav3-resp-carousel');

        $nav_resp_carousel.slick({
            infinite: true,
            prevArrow: '<button type="button" class="slick-prev slick-prev--nav">Previous</button>',
            nextArrow: '<button type="button" class="slick-next slick-next--nav">Next</button>',
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
              {
                breakpoint: Constants.BREAKPOINTS.MEDIUM,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: Constants.BREAKPOINTS.SMALL,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
        });

        // move back to first frame
        Constants.$window.on('resize', function(){
            if(Constants.$window.width() > Constants.BREAKPOINTS.MEDIUM) {
                $nav_resp_carousel.slickGoTo(0);
            }
        });
    },
    _animateIn: function($el, window_bottom){
        $($el).each(function(){
            var item_buffer = $(this).offset().top + ($(this).outerHeight() / 2);

            if( item_buffer < window_bottom ){
                $(this).removeClass('faded-out').addClass('fade-in');
            }
        });
    },

    _animateSections: function(){
        var window_bottom = Constants.$window.scrollTop() + Constants.$window.outerHeight();

        Site._animateIn($('.js-faded'), window_bottom);

        $('.section--full__inner-wide').each(function(){
            var item_buffer = $(this).offset().top + ($(this).outerHeight() / 2);

            if( item_buffer < window_bottom ){
                $(this).find('.js-section-left').removeClass('faded-out-left').addClass('fade-in-left');
                $(this).find('.js-section-right').removeClass('faded-out-right').addClass('fade-in-right');
            }
        });
    },

    scrollAnimate: function(){
        var _this = this;

        Constants.$window.on('scroll', function(){
            _this._animateSections();
        });
    },

    showVisibleSections: function(){
        var _this = this;

        if ($('.site-header').outerHeight() < Constants.$window.scrollTop()) {
            _this._animateSections();
            return;
        }

        $('.js-header-faded').one('animationend webkitAnimationEnd MSAnimationEnd', function() {
            _this._animateSections();
        });
    }
};

$(Site.init);

Constants.$window.load(function(){
    // No parallax for mobile
    if(!Platform.IOS()){
        Site.parallax();
    }

    // don't fade in the headings until images are loaded
    if( !(Platform.IOS() || Platform.IE8() || Platform.IE9()) ){
        $('.js-header-faded').removeClass('faded').addClass('fadeInRight');
    }
});
