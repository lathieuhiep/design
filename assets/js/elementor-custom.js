(function ($) {

    /* Start Carousel slider */
    const ElementCarouselSlider = function( $scope, $ ) {
        const element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );
    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-post-carousel.default', ElementCarouselSlider );

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-testimonial-slider.default', ElementCarouselSlider );

        /* Element carousel images */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/design-carousel-images.default', ElementCarouselSlider );

    } );

})( jQuery );