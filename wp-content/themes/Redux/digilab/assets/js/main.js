/* ===================================================================
    
    Author          : Themefora
    Template Name   : Digilab Theme - SEO & Digital Marketing Agency Template
    Version         : 1.0
    
* ================================================================= */

    
(function(window, document, $) {
    "use strict";

    jQuery(window).on('load', function () {
        jQuery('.thumb-bg').each(function() {
            
            const bg = jQuery(this).attr('data-digilab-bg');
            console.log( jQuery(this) );
            jQuery(this).css('background-image', 'url(' + bg + ')');
        });
    });
    
    
    jQuery(document).on('ready', function() {

    /* ==================================================
        Preloader Init
     ===============================================*/
        jQuery('.site-preloader').fadeOut('slow', function () {
            $(this).remove();
        });

        $('.attr-nav .search> a').on('click',function(){
            $('.attr-nav').addClass('search-open');
        });
        
        // hide search on click side menu
        $('.attr-nav .side-menu> a').on('click',function(){
            if ( $('.attr-nav').hasClass( 'search-open' ) ) {
                $('.attr-nav .search> a').trigger('click');
                $('.attr-nav').removeClass('search-open');
            }
            if ( $('.navbar-collapse').hasClass( 'show' ) ) {
                $('.navbar-toggle>i').trigger('click');
            }
            return false;
        });
        
        // hide header side menu and search on click menu togglebar
        $('.navbar-toggle>i').on('click',function(){
            if ( $('.attr-nav').hasClass( 'search-open' ) ) {
                $('.attr-nav .search> a').trigger('click');
                $('.attr-nav').removeClass('search-open');
            }
            if ( $('body').hasClass( 'on-side' ) ) {
                $('.side a.close-side').trigger('click');
            }
            //return false;
        });
        
        $(window).on('scroll', function() {

            if ( $(window).scrollTop() > 200 ) {
                
                if ($('body').hasClass( 'on-side' ) ) {
                    $('.side a.close-side').trigger('click');
                }
                
                $('body').addClass( 'scroll-start' );
                
            } else {
                
                $('body').removeClass( 'scroll-start' );
            }
        });

        /* ==================================================
            # Tooltip Init
        ===============================================*/
        $('[data-toggle="tooltip"]').tooltip(); 
        

        /* ==================================================
            # Smooth Scroll
         ===============================================*/
        $("body").scrollspy({
            target: ".navbar-collapse",
            offset: 200
        });
        
        $('a.smooth-menu').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '75';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });

        /* ==================================================
            # Banner Animation
        ===============================================*/
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function() {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $immortalCarousel = $('.animate_text'),
            $firstAnimatingElems = $immortalCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $immortalCarousel.carousel();
        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Other slides to be animated on carousel slide event
        $immortalCarousel.on('slide.bs.carousel', function(e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });


        /* ==================================================
            # Youtube Video Init
         ===============================================*/
         
        if ( $('.player').length ) {
            $('.player').mb_YTPlayer();
        }


         /* ==================================================
            # Fun Factor Init
        ===============================================*/
        
        $('.fun-fact').appear(function() {
            $('.timer').countTo();
        }, {
            accY: -100
        });

        /* ==================================================
            # Magnific popup init
         ===============================================*/
        if ( $(".popup-youtube").length || $(".popup-vimeo").length || $(".popup-gmaps").length ) {
            $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }
        
        /* ==================================================
            # Single post page redlated carousel init
         ===============================================*/
        if ( $('.related-slider').length ) {
            const options = $( '.related-slider' ).data( 'item-settings' );

            $( '.related-slider' ).owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                dots:false,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 2
                    },
                    1000:{
                        items: options.items
                    }
                }
            });
        }
        /* ==================================================
            # Bootsnav Fix menu location
         ===============================================*/
            var screensize = $(window).width();
            $(function () {
                $(".nav li").on('mouseenter mouseleave', function (e) {
                    if ($('.dropdown-menu', this).length) {
                        var elm = $('.dropdown-menu', this);
                        var off = elm.offset();
                        var l = off.left;
                        var w = elm.width();
                        var docW = $(".container").width();

                        l = l - $("#navbar-menu").offset().left;

                        if (screensize > 1006) {
                            
                            var isEntirelyVisible = (l + w <= docW);

                            //alert(l+w);

                            if (!isEntirelyVisible) {
                                if((elm).hasClass('depth_0')) {
                                    $(elm).addClass('dropdown-reverse-right0');
                                } else {
                                    $(elm).addClass('dropdown-reverse');
                                }
                            } 
                        } else {
                            if((elm).hasClass('depth_0')) {
                                $(elm).removeClass('dropdown-reverse-right0');
                            } else {
                                $(elm).removeClass('dropdown-reverse');
                            }
                        }   
                    }
                });
            });

    }); // end document ready function
})(window, document, jQuery);