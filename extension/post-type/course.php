<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'getDesign_create_course', 10);

function getDesign_create_course() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Course', 'post type general name', 'getdesign' ),
		'singular_name'         =>  _x( 'Course', 'post type singular name', 'getdesign' ),
		'menu_name'             =>  _x( 'Courses', 'admin menu', 'getdesign' ),
		'name_admin_bar'        =>  _x( 'Course', 'add new on admin bar', 'getdesign' ),
		'add_new'               =>  _x( 'Add new', 'Course', 'getdesign' ),
		'add_new_item'          =>  esc_html__( 'Add new', 'getdesign' ),
		'edit_item'             =>  esc_html__( 'Edit', 'getdesign' ),
		'new_item'              =>  esc_html__( 'New', 'getdesign' ),
		'view_item'             =>  esc_html__( 'View', 'getdesign' ),
		'all_items'             =>  esc_html__( 'All Courses', 'getdesign' ),
		'search_items'          =>  esc_html__( 'Search Courses', 'getdesign' ),
		'not_found'             =>  esc_html__( 'Not Found', 'getdesign' ),
		'not_found_in_trash'    =>  esc_html__( 'Not Found In Trash', 'getdesign' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'khoa-hoc' ),
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type('design_course', $args );
	/* End post type template */

}