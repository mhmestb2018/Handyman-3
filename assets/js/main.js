(function( $ ) {

    var contractor = {};
    (function() {

        this.clickTouch = ( $('html').hasClass('touch') ) ? 'touchend' : 'click';
        this.addthis_loaded = false;
        this.scrolling = false;
        this.tabletBreakpoint = '800px';
        this.tabletSize = 700;
        this.mobileQuery = 'screen and (max-width: ' + contractor.tabletBreakpoint + ')';
        this.tabletQuery = 'screen and (min-width: ' + contractor.tabletBreakpoint + ')';
        this.ajaxObject = {};
        this.ajaxDelay = 200;

        /*this.modernizerChecks = function() {
            if(Modernizr.input.placeholder) {
                $('html').addClass('placeholder');
            }
        };*/

        this.touchScroll = function() {
            $(window).on('touchmove', function() {
                contractor.scrolling = true;
            }).on('touchend', function() {
                    var scrollEnableTO = window.setTimeout(function() {
                        contractor.scrolling = false;
                    }, 100);
                });
        };

        this.touchState = function() {
            if ('ontouchstart' in document.documentElement) {
                $(document).on('touchstart', 'a:not(.product-thumb), .touch', function (e) {
                    var self = this;
                    this.timeout = setTimeout(function () {
                        $(self).addClass('active');
                    }, 50);
                }).on('touchmove', 'a:not(.product-thumb), .touch', function (e) {
                        clearTimeout(this.timeout);
                        $(this).removeClass('active');
                    }).on('touchend', 'a:not(.product-thumb), .touch', function (e) {
                        clearTimeout(this.timeout);
                        var self = this;
                        this.timeout = setTimeout(function () {
                            $(self).removeClass('active');
                        }, 100);
                    });
            } else {
                $(document).on('mousedown', 'a:not(.product-thumb), .touch', function (e) {
                    $(this).addClass('active');
                    var self = this;
                    function mouseup () {
                        $(document).off('mouseup', mouseup);
                        $(self).removeClass('active');
                    };
                    $(document).on('mouseup', mouseup);
                });
            }
        };

        this.toggleMobileMenu = function() {
            var $links = $("[data-target='menu-toggle']").next('ul').children('li');

            // Toggle controler classes
            $("[data-target='menu-toggle']").toggleClass('active');
            $("[data-target='header']").toggleClass("mobile-menu-open");

            // If menu is open it sets the max-height for the css transition.
            if( $("[data-target='menu-toggle']").hasClass('active') ) {
                $("[data-target='menu-toggle']").next('ul').css({
                    'max-height' : ($links.size() * $links.outerHeight()) + 'px'
                });
                // Otherwise it clears the style attr so the menu will close.
            } else {
                $("[data-target='menu-toggle']").next('ul').attr('style', '');
            }
        };

        this.homepageSlider = function() {
            var present = ( $('.js-homepage-slider').length > 0 );

            var sliderSetup = function() {
                $('.js-homepage-slider').flexslider({
                    animation: "slide",
                    animationLoop: true,
                    slideshow: false,
                    useCSS: false,
                    controlsContainer: ".custom-control-nav",
                    directionNav: false
                });
            };

            if(present) {
                sliderSetup();
            }
        };

        this.navigation = function() {
            /* var present = ($('.site-navigation').length > 0 );

            var navSetup = function() {
                $(document).on('scroll', function() {
                    var offset = $(document).scrollTop();
                    var navoffset = 0;


                    if ($('.site-navigation').hasClass('site-navigation-fixed')) {
                        navoffset = $('.panel-features').offset().top;
                    }else {
                        navoffset = $('.site-navigation').offset().top;
                    }


                    if ($(document).width() > contractor.tabletSize) {
                        if (offset > 0) {
                            $('.header').css({'z-index' : -1,
                                'webkit-transform' : 'translate(0px, '+offset+'px)'});

                            //$('.custom-control-nav').addClass('custom-control-nav-hidden');
                        }else {
                            $('.header').css({'z-index' : 0,
                                'webkit-transform' : 'translate(0px, 0px)'});
                            //$('.custom-control-nav').removeClass('custom-control-nav-hidden');
                        }
                    }else {
                        $('.header').css({'z-index' : '',
                            'webkit-transform' : ''});
                    }

                    if (offset >= navoffset) {
                        $('.site-navigation').addClass('site-navigation-fixed');
                        $('.panel-features').addClass('panel-features-top-spacer');
                    }else {
                        $('.site-navigation').removeClass('site-navigation-fixed');
                        $('.panel-features').removeClass('panel-features-top-spacer');
                    }

                });
            };

            if(present) {
                navSetup();
            } */
        };


        this.appInit = function() {
            //contractor.modernizerChecks();
            contractor.touchScroll();

            //contractor.homepageSlider();
            contractor.navigation();
        };

    }).apply( contractor );

    $(document).ready(function() {
        /Mobile/.test((navigator.userAgent) && !location.hash && setTimeout(function () {
            if (!window.pageYOffset) { window.scrollTo(0, 1); }
        }, 0));

        contractor.appInit();


        // Check if menu toggle link is there
        if( $("[data-target='menu-toggle']").length > 0 ) {
            $('body').on('click.mobileMenu', function(e) {
                var clickedOn = $(e.target);
                // If clicked on the right link... toggle the form down
                if ( clickedOn.parents().andSelf().is("[data-target='menu-toggle']") ) {
                    contractor.toggleMobileMenu();
                    // If header is open and clicked somewhere off the header... toggle the form back up
                } else if( $("[data-target='header']").hasClass('mobile-menu-open') && !clickedOn.parents().andSelf().is("[data-target='header']") ) {
                    contractor.toggleMobileMenu();
                }
            });
        }

    }); // $document.ready
}(jQuery));
