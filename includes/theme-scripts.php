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

	/* Start main Css */
	wp_enqueue_style( 'design-library', get_theme_file_uri( '/assets/css/library.min.css' ), array(), '' );
	/* End main Css */

	if ( is_singular('student_product') ) {
		wp_enqueue_style( 'jquery-scrollbar', get_theme_file_uri( '/assets/css/jquery.scrollbar.css' ), array(), '' );
		wp_enqueue_script( 'jquery-scrollbar', get_theme_file_uri( '/assets/js/jquery.scrollbar.min.js' ), array('jquery'), '', true );
	}

    /* Start main Css */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/fonts/fontawesome/css/all.min.css' ), array(), '5.12.1' );
    /* End main Css */

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

    if ( is_singular('design_course') ) {
        wp_enqueue_script( 'load-product' );
    }

	/*
   * End Get Js Front End
   * */

}