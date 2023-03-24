(function ($) {
	"use strict";

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

	// testimonial
	$( document ).general_owlCarousel_custom( '.testimonial-owl' );
})(jQuery);