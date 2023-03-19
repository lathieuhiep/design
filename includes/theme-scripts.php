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

	// bootstrap css
	wp_enqueue_style( 'bootstrap.min', get_theme_file_uri( '/assets/libs/css/bootstrap.min.css' ), array(), '5.2.3' );

	// fontawesome css
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/libs/css/fontawesome.min.css' ), array(), '6.3.0' );
	/* End main Css */

	// register style owl carousel
	wp_register_style( 'owl.carousel.min', get_theme_file_uri( '/assets/libs/css/owl.carousel.min.css' ), array(), '2.3.4' );

	if ( is_singular('student_product') || is_singular('my_product') ) {
		wp_enqueue_style( 'jquery.scrollbar.min', get_theme_file_uri( '/assets/libs/css/jquery.scrollbar.min.css' ), array(), '0.2.11' );
		wp_enqueue_script( 'jquery.scrollbar.min', get_theme_file_uri( '/assets/js/jquery.scrollbar.min.js' ), array('jquery'), '', true );
	}

	/*  Start Style Css   */
	wp_enqueue_style( 'design-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */
    wp_enqueue_script( 'design-library', get_theme_file_uri( '/assets/js/library.min.js' ), array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'design-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0.0', true );

    // load product ajax
    wp_register_script( 'load-product', get_theme_file_uri( '/assets/js/load-product.js' ), array('jquery'), '', true );
    $design_load_product_admin_url = admin_url( 'admin-ajax.php' );
    $design_get_product = array( 'url' => $design_load_product_admin_url );
    wp_localize_script( 'load-product', 'design_get_product', $design_get_product );

    if ( is_singular('design_course') || is_singular('design_service') || is_singular( 'student_product' ) || is_singular('my_product') ) {
        wp_enqueue_script( 'load-product' );
    }

	/*
   * End Get Js Front End
   * */

}