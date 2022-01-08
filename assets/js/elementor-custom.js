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

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-post-carousel.default', ElementCarouselSlider );

        /* Element testimonial carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-testimonial-carousel.default', ElementCarouselSlider );

        /* Element carousel images */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-carousel-images.default', ElementCarouselSlider );

        /* Element course detail content */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-course-detail-content.default', ElementCourseDetailContent );

    } );

})( jQuery );