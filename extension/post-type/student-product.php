<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_student_product', 10);

function design_create_student_product() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Sản phẩm học viên', 'post type general name', Text_Domain ),
		'singular_name'         =>  _x( 'Student Product', 'post type singular name', Text_Domain ),
		'menu_name'             =>  _x( 'Student Products', 'admin menu', Text_Domain ),
		'name_admin_bar'        =>  _x( 'Student Product', 'add new on admin bar', Text_Domain ),
		'add_new'               =>  _x( 'Add new', 'Student Product', Text_Domain ),
		'add_new_item'          =>  esc_html__( 'Add new', Text_Domain ),
		'edit_item'             =>  esc_html__( 'Edit', Text_Domain ),
		'new_item'              =>  esc_html__( 'New', Text_Domain ),
		'view_item'             =>  esc_html__( 'View', Text_Domain ),
		'all_items'             =>  esc_html__( 'All Student Products', Text_Domain ),
		'search_items'          =>  esc_html__( 'Search Student Products', Text_Domain ),
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
		'menu_icon'          => 'dashicons-clipboard',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'san-pham-hoc-vien' ),
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type('student_product', $args );
	/* End post type template */

}