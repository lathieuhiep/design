<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_course', 10);

function design_create_course() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Khóa học', 'post type general name', 'design' ),
		'singular_name'         =>  _x( 'Course', 'post type singular name', 'design' ),
		'menu_name'             =>  _x( 'Courses', 'admin menu', 'design' ),
		'name_admin_bar'        =>  _x( 'Course', 'add new on admin bar', 'design' ),
		'add_new'               =>  _x( 'Add new', 'Course', 'design' ),
		'add_new_item'          =>  esc_html__( 'Add new', 'design' ),
		'edit_item'             =>  esc_html__( 'Edit', 'design' ),
		'new_item'              =>  esc_html__( 'New', 'design' ),
		'view_item'             =>  esc_html__( 'View', 'design' ),
		'all_items'             =>  esc_html__( 'All Courses', 'design' ),
		'search_items'          =>  esc_html__( 'Search Courses', 'design' ),
		'not_found'             =>  esc_html__( 'Not Found', 'design' ),
		'not_found_in_trash'    =>  esc_html__( 'Not Found In Trash', 'design' ),
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
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type('design_course', $args );
	/* End post type template */

}