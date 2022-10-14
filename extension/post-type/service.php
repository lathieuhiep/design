<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_service', 10);

function design_create_service() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Dịch vụ', 'post type general name', Text_Domain ),
		'singular_name'         =>  _x( 'Service', 'post type singular name', Text_Domain ),
		'menu_name'             =>  _x( 'Services', 'admin menu', Text_Domain ),
		'name_admin_bar'        =>  _x( 'Service', 'add new on admin bar', Text_Domain ),
		'add_new'               =>  _x( 'Add new', 'Service', Text_Domain ),
		'add_new_item'          =>  esc_html__( 'Add new', Text_Domain ),
		'edit_item'             =>  esc_html__( 'Edit', Text_Domain ),
		'new_item'              =>  esc_html__( 'New', Text_Domain ),
		'view_item'             =>  esc_html__( 'View', Text_Domain ),
		'all_items'             =>  esc_html__( 'All Services', Text_Domain ),
		'search_items'          =>  esc_html__( 'Search Services', Text_Domain ),
		'not_found'             =>  esc_html__( 'Not Found', Text_Domain ),
		'not_found_in_trash'    =>  esc_html__( 'Not Found In Trash', Text_Domain ),
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