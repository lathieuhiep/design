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
		'name'                  =>  _x( 'Ý Kiến Khách Hàng', 'post type general name', 'design' ),
		'singular_name'         =>  _x( 'Ý Kiến Khách Hàng', 'post type singular name', 'design' ),
		'menu_name'             =>  _x( 'Ý Kiến Khách Hàng', 'admin menu', 'design' ),
		'name_admin_bar'        =>  _x( 'Ý Kiến Khách Hàng', 'add new on admin bar', 'design' ),
		'add_new'               =>  _x( 'Thêm Mới', 'Testimonial', 'design' ),
		'add_new_item'          =>  esc_html__( 'Thêm Mới', 'design' ),
		'edit_item'             =>  esc_html__( 'Sửa', 'design' ),
		'new_item'              =>  esc_html__( 'Mới', 'design' ),
		'view_item'             =>  esc_html__( 'Xem', 'design' ),
		'all_items'             =>  esc_html__( 'Danh Sách', 'design' ),
		'search_items'          =>  esc_html__( 'Tìm kiếm', 'design' ),
		'not_found'             =>  esc_html__( 'Không tìm thấy', 'design' ),
		'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'design' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-testimonial',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'y-kien-khach-hang' ),
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
	);

	register_post_type('design_testimonial', $args );
	/* End post type template */

}