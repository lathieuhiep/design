(function ($) {
	"use strict";

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

})(jQuery);