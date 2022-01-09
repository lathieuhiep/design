(function ($) {

    /* Start Carousel slider */
    const ElementCarouselSlider = function( $scope, $ ) {
        const element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );
    };

    // Element course detail content
    const ElementCourseDetailContent = function ($scope, $) {
        let text = $scope.find('.element-course-detail-content .content-box'),
            readMore = $scope.find('.element-course-detail-content .read-more-content p'),
            h = text[0].scrollHeight;

        readMore.on('click', function () {
            $(this).closest('.read-more-content').addClass('d-none');
            text.animate({'height': h});
        });
    }

    // Scrollbar
    const ElementScroll = function ( $scope, $ ) {
        const scrollbar = $scope.find( '.scrollbar-inner' );

        scrollbar.scrollbar({
            autoScrollSize: false
        });
    }

    // Get attr src
    const ElementGetAttrSrc = function ( $scope, $ ) {
        const itemStudent = $scope.find( '.item-student' );

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

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-post-carousel.default', ElementCarouselSlider );

        /* Element testimonial carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-testimonial-carousel.default', ElementCarouselSlider );

        /* Element carousel images */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-carousel-images.default', ElementCarouselSlider );

        /* Element carousel student product detail */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-student-product-detail.default', ElementCarouselSlider );

        /* Element course detail content */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-course-detail-content.default', ElementCourseDetailContent );

        /* Element scrollbar */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-student-product-detail.default', ElementScroll );

        /* Element attr src */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-student-product-detail.default', ElementGetAttrSrc );

    } );

})( jQuery );