(function ($) {
	"use strict";
    jQuery(document).ready(function($){
        //responsive menu
        var $slickNav = $('#main-menu');
        $slickNav.slicknav({
            prependTo: '.responsive-menu',
            label: ''
        });
          /* counter section activation  */
        var counternumber = $('.counter-number');
          counternumber.counterUp({
              delay: 20,
              time: 3000
          });
        //magnific popup activation
        var $videopopup = $('.video-play-btn')
        $videopopup.magnificPopup({
            type: 'video'
        });
        //back to top
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });



        //smoth achor effect
        // $(document).on('click','#main-menu li a', function (e) {
				//
		 		// e.preventDefault();
				//
				// 	var anchor = $(this).attr('href');
        //   var pranto = anchor.charAt(0);
				//
				//
        //   if(pranto == '#')
        //   {
        //       e.preventDefault();
        //       var top = $(anchor).offset().top;
        //       $('html, body').animate({
        //           scrollTop: $(anchor).offset().top
        //       }, 1000);
        //       $(this).parent().addClass('active').siblings().removeClass('active');
        //   }
        // });


        //screenshort carousel
            var $screenshort = $('.screenshort-carousel');
            $screenshort.owlCarousel({
                loop: true,
                autoplay:true,
                autoPlayTimeout: 1000,
                margin:30,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 2
                    },
                    1200: {
                        items: 4
                    },
                    1920: {
                        items: 4
                    }
                }
            });
        //reviewer carousel
            var $reviewerCarousel = $('.clients-review-carousel');
            $reviewerCarousel.owlCarousel({
                loop: true,
                autoplay:true,
                dots:true,
                autoPlayTimeout: 1000,
                margin:30,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    },
                    1920: {
                        items: 3
                    }
                }
            });
        //reviewer carousel
            var $logoCarousel = $('.logo-carousel');
            $logoCarousel.owlCarousel({
                loop: true,
                autoplay:true,
                dots:true,
                autoPlayTimeout: 1000,
                margin:30,
                responsive: {
                    0: {
                        items: 2
                    },
										414: {
                        items: 2
                    },
										576: {
                        items: 3
                    },
                    768: {
                        items: 3
                    },
                    960: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    },
                    1920: {
                        items: 6
                    }
                }
            });
        /*--magnific popup Image Activation--*/
            var imgPopUp = $('.image-popup')
            imgPopUp.magnificPopup({

                gallery: {
                    enabled: true
                },
                image: {
                    titleSrc: 'title'
                },
                type: 'image'

            });
            /*--- portfolio isotope activation ---*/
        var Container = $('.portfolio-masonary-wrapper');
            Container.imagesLoaded(function () {
                    var portfolioISotope = $('.portfolio-masonary-wrapper').isotope({
                        itemSelector: '.single-portfolio-item', // use a separate class for itemSelector, other than .col-
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.grid-sizer'
                        }
                    });

                $(document).on('click', '.portfolio-filter-menu li', function () {
                    var filterValue = $(this).attr('data-filter');
                    portfolioISotope.isotope({
                        filter: filterValue
                    });
                });
            });

        /*---- portfolio filter menu active  ------*/
        var portfolioMenu = '.portfolio-filter-menu li';
        $(document).on('click', portfolioMenu, function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
        /*------- progressbar activation ----------*/
         var $section = $('#clients');
        $(document).bind('scroll', function(ev) {
            var scrollOffset = $(document).scrollTop();
            var containerOffset = $section.offset().top - window.innerHeight;
            if (scrollOffset > containerOffset) {
                progressbar('#html',70);
                progressbar('#css',85);
                progressbar('#bootstrap',96);
                // unbind event not to load scrolsl again
                $(document).unbind('scroll');
            }
        });


        function progressbar(selector,percentage){
            $(selector).LineProgressbar({
                percentage: percentage,
                fillBackgroundColor:'#ed1c24',
                backgroundColor:'#f4f4f4',
                duration: 3000
            });
        }

    });
    $(window).on('scroll', function () {
        //back to top show/hide
       var ScrollTop = $('.back-to-top');
       if ($(window).scrollTop() > 1000) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--sticky menu activation--*/
       var mainMenuTop = $('.navbar-area');
       if ($(window).scrollTop() > 1000) {
           mainMenuTop.addClass('nav-fixed');
       } else {
           mainMenuTop.removeClass('nav-fixed');
       }

    });

    $(window).on('load',function(){
        //preloader
        var preLoder = $(".preloader");
        preLoder.fadeOut(500);
    });

}(jQuery));
