<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'getDesign_create_testimonial', 10);

function getDesign_create_testimonial() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Testimonial', 'post type general name', 'getdesign' ),
		'singular_name'         =>  _x( 'testimonial', 'post type singular name', 'getdesign' ),
		'menu_name'             =>  _x( 'Testimonial', 'admin menu', 'getdesign' ),
		'name_admin_bar'        =>  _x( 'Testimonials', 'add new on admin bar', 'getdesign' ),
		'add_new'               =>  _x( 'Add new', 'Dự án', 'getdesign' ),
		'add_new_item'          =>  esc_html__( 'Add new', 'getdesign' ),
		'edit_item'             =>  esc_html__( 'Edit', 'getdesign' ),
		'new_item'              =>  esc_html__( 'New', 'getdesign' ),
		'view_item'             =>  esc_html__( 'View', 'getdesign' ),
		'all_items'             =>  esc_html__( 'All Testimonials', 'getdesign' ),
		'search_items'          =>  esc_html__( 'Search Testimonial', 'getdesign' ),
		'not_found'             =>  esc_html__( 'Not Found', 'getdesign' ),
		'not_found_in_trash'    =>  esc_html__( 'Not Found In Trash', 'getdesign' ),
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
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type('design_testimonial', $args );
	/* End post type template */

}