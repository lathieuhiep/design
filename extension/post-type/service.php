<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_service', 10);

function design_create_service(): void
{
	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Dịch vụ', 'post type general name', 'design' ),
		'singular_name'         =>  _x( 'Service', 'post type singular name', 'design' ),
		'menu_name'             =>  _x( 'Services', 'admin menu', 'design' ),
		'name_admin_bar'        =>  _x( 'Service', 'add new on admin bar', 'design' ),
		'add_new'               =>  _x( 'Add new', 'Service', 'design' ),
		'add_new_item'          =>  esc_html__( 'Add new', 'design' ),
		'edit_item'             =>  esc_html__( 'Edit', 'design' ),
		'new_item'              =>  esc_html__( 'New', 'design' ),
		'view_item'             =>  esc_html__( 'View', 'design' ),
		'all_items'             =>  esc_html__( 'All Services', 'design' ),
		'search_items'          =>  esc_html__( 'Search Services', 'design' ),
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
		'menu_icon'          => 'dashicons-store',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'dich-vu' ),
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type('design_service', $args );
	/* End post type template */

}