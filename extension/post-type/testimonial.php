<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_testimonial', 10);

function design_create_testimonial() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Testimonial', 'post type general name', 'design' ),
		'singular_name'         =>  _x( 'Testimonial', 'post type singular name', 'design' ),
		'menu_name'             =>  _x( 'Testimonials', 'admin menu', 'design' ),
		'name_admin_bar'        =>  _x( 'Testimonial', 'add new on admin bar', 'design' ),
		'add_new'               =>  _x( 'Add new', 'Testimonial', 'design' ),
		'add_new_item'          =>  esc_html__( 'Add new', 'design' ),
		'edit_item'             =>  esc_html__( 'Edit', 'design' ),
		'new_item'              =>  esc_html__( 'New', 'design' ),
		'view_item'             =>  esc_html__( 'View', 'design' ),
		'all_items'             =>  esc_html__( 'All Testimonials', 'design' ),
		'search_items'          =>  esc_html__( 'Search Testimonials', 'design' ),
		'not_found'             =>  esc_html__( 'Not Found', 'design' ),
		'not_found_in_trash'    =>  esc_html__( 'Not Found In Trash', 'design' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-testimonial',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'testimonial' ),
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type('design_testimonial', $args );
	/* End post type template */

}