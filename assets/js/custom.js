/**
 * Custom js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    let timer_clear;

    $( document ).ready( function () {

        /* Start back top */
        $('#back-top').on( 'click', function (e) {
            e.preventDefault();
            $('html').scrollTop(0);
        } );
        /* End back top */

        /* btn mobile Start*/
        let subMenuToggle  =   $('.sub-menu-toggle');

        if ( subMenuToggle.length ) {

            subMenuToggle.each(function () {
                $(this).on( 'click', function () {
                    const widthScreen = $(window).width();

                    if ( widthScreen < 992 ) {
                        $(this).toggleClass('active');
                        $(this).closest( '.menu-item-has-children' ).siblings().find( subMenuToggle ).removeClass( 'active' );
                        $(this).parent().children( '.sub-menu' ).slideToggle();
                        $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp();
                    }

                } )
            })

        }
        /* btn mobile End */

        /* Start Gallery Single */
        $( document ).general_owlCarousel_custom( '.site-post-slides' );
        /* End Gallery Single */

        /* Start nav course slider */
        const navCourseSlider = $('.nav-course-slider');

        if ( navCourseSlider.length ) {
            const navCourseOwl = navCourseSlider.owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplaySpeed: 800,
                navSpeed: 800,
                dotsSpeed: 800,
                responsive:{
                    0: {
                        items: 1
                    },
                    479: {
                        items: 2,
                        center: true,
                    },
                    768: {
                        items: 3
                    }
                }
            })

            const indexNavCourse = navCourseSlider.find('.owl-item:not(.cloned) .current').data('index');
            navCourseOwl.trigger('to.owl.carousel', [indexNavCourse, 800]);
        }
        /* End nav course slider */

        // show content post
        $('.show-full-content').on('click', function (event) {
            event.preventDefault();

            const heightContent = $(this).closest('.element-course-detail-content').find('.content-box');
            const getHeightContent = heightContent.prop("scrollHeight");

            heightContent.animate({
                'height': getHeightContent
            }, 400, function () {
                heightContent.css('height','auto');
            });

            $(this).closest('.read-more-content').remove();
        })

        // testimonial
        $( document ).general_owlCarousel_custom( '.testimonial-owl' );

        // product carousel
        $( document ).general_owlCarousel_custom( '.product-owl-carousel' );

        // scrollbar inner
        const scrollbarInner = $('.scrollbar-inner');

        if ( scrollbarInner.length ) {
            scrollbarInner.each(function () {
                $(this).scrollbar({
                    autoScrollSize: false
                });
            })
        }

        // Get attr src gallery product
        const itemStudent = $('.item-student');

        if ( itemStudent.length ) {
            itemStudent.on('click', function () {
                const src = $(this).data('src');
                const hasClassView = $(this).hasClass('view-product');
                const imageProduct =  $(this).closest('.element-student-product-detail').find('.product-featured-image img');

                if ( !hasClassView ) {
                    $(this).closest('.product-gallery__slider').find('.item').removeClass('view-product');
                    $(this).addClass('view-product');

                    imageProduct.fadeOut();

                    setTimeout( function() {

                        imageProduct.attr('src', src).fadeIn();

                    }, 400 );
                }
            })
        }

    });

    // loading
    $( window ).on( "load", function() {

        $( '#site-loadding' ).remove();

    });

    // scroll event
    $( window ).scroll( function() {

        if ( timer_clear ) clearTimeout(timer_clear);

        timer_clear = setTimeout( function() {

            /* Start scroll back top */
            let $scrollTop = $(this).scrollTop();

            if ( $scrollTop > 200 ) {
                $('#back-top').addClass('active_top');
            }else {
                $('#back-top').removeClass('active_top');
            }
            /* End scroll back top */

        }, 100 );

    });

    // function call owlCarousel
    $.fn.general_owlCarousel_custom = function ( class_item ) {

        let class_item_owlCarousel   =   $( class_item );

        if ( class_item_owlCarousel.length ) {

            class_item_owlCarousel.each( function () {

                let slider = $(this);

                if ( !slider.hasClass('owl-carousel-init') ) {

                    let defaults = {
                        autoplaySpeed: 800,
                        navSpeed: 800,
                        dotsSpeed: 800,
                        autoHeight: false,
                        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    };

                    let config = $.extend( defaults, slider.data( 'settings-owl') );
                    slider.owlCarousel( config ).addClass( 'owl-carousel-init' );

                }

            } )

        }

    }

} )( jQuery );