<?php

// Remove jquery migrate
add_action( 'wp_default_scripts', 'design_remove_jquery_migrate' );
function design_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'design_register_back_end_scripts');

function design_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'design-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'design_register_front_end');

function design_register_front_end() {
	// remove style gutenberg
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style( 'classic-theme-styles' );

	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles

	/**
	 * Register css and js
	**/

	// register owl carousel
	wp_register_style( 'owl.carousel', get_theme_file_uri( '/assets/libs/css/owl.carousel.min.css' ), array(), '2.3.4' );
	wp_register_script( 'owl.carousel', get_theme_file_uri( '/assets/libs/js/owl.carousel.min.js' ), array('jquery'), '2.3.4', true );

	// register scrollbar
	wp_register_style( 'scrollbar', get_theme_file_uri( '/assets/libs/css/scrollbar.min.css' ), array(), '0.2.11' );
	wp_register_script( 'jquery.scrollbar', get_theme_file_uri( '/assets/libs/js/jquery.scrollbar.min.js' ), array('jquery'), '', true );

	/**
	 * Get css
	 **/

	// bootstrap css
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/libs/css/bootstrap.min.css' ), array(), '5.2.3' );

	// fontawesome css
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/libs/css/fontawesome.min.css' ), array(), '6.3.0' );

	// Style theme
	wp_enqueue_style( 'design-style', get_stylesheet_uri() );

	// post type post
	if ( is_archive() ) {
		wp_enqueue_style( 'archive-post', get_theme_file_uri( '/assets/post-type/post/archive.min.css' ), array(), '' );
	}
	if ( is_singular( 'post' ) ) {
		wp_enqueue_style( 'post-detail', get_theme_file_uri( '/assets/post-type/post/single.min.css' ), array(), '' );
	}

	// post type courses css
	if ( is_singular('design_course') ) {
		wp_enqueue_style('owl.carousel');
		wp_enqueue_style( 'courses', get_theme_file_uri( '/assets/post-type/courses/courses.min.css' ), array(), '' );
	}

	// post type service
	if ( is_singular('design_service') ) {
		wp_enqueue_style( 'service', get_theme_file_uri( '/assets/post-type/service/service.min.css' ), array(), '' );
	}

	// post type my product & student product
	if ( is_singular('my_product') || is_singular('student_product') ) {
		wp_enqueue_style('owl.carousel');
		wp_enqueue_style('scrollbar');
		wp_enqueue_style( 'my-product-detail', get_theme_file_uri( '/assets/post-type/my-product/detail.min.css' ), array(), '' );
	}

	/*
	* Start Get Js Front End
	* */

	// Register url ajax
	$design_admin_url = array( 'url' => admin_url( 'admin-ajax.php' ) );

	// bootstrap js
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/libs/js/bootstrap.bundle.min.js' ), array('jquery'), '', true );

	if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'design-main', get_theme_file_uri( '/assets/js/main.min.js' ), array(), '1.0.0', true );

	// post type courses
	if ( is_singular('design_course') ) {
		wp_enqueue_script('owl.carousel');
		wp_enqueue_script( 'design_course', get_theme_file_uri( '/assets/post-type/courses/course.min.js' ), array('jquery'), '', true );
	}

    // load product ajax
    wp_register_script( 'load-product', get_theme_file_uri( '/assets/js/load-product.min.js' ), array('jquery'), '', true );
    wp_localize_script( 'load-product', 'design_get_product', $design_admin_url );

    if ( is_singular('design_course') || is_singular('design_service') || is_singular( 'student_product' ) || is_singular('my_product') ) {
        wp_enqueue_script( 'load-product' );
    }

	// post type student product
	if ( is_singular('my_product') || is_singular('student_product') ) {
		wp_enqueue_script('owl.carousel');
		wp_enqueue_script( 'jquery.scrollbar' );
		wp_enqueue_script( 'my-product', get_theme_file_uri( '/assets/post-type/my-product/my-product.min.js' ), array('jquery'), '', true );
	}

	/*
   * End Get Js Front End
   * */

}