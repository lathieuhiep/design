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
		'name'                  =>  _x( 'Ý Kiến Khách Hàng', 'post type general name', Text_Domain ),
		'singular_name'         =>  _x( 'Ý Kiến Khách Hàng', 'post type singular name', Text_Domain ),
		'menu_name'             =>  _x( 'Ý Kiến Khách Hàng', 'admin menu', Text_Domain ),
		'name_admin_bar'        =>  _x( 'Ý Kiến Khách Hàng', 'add new on admin bar', Text_Domain ),
		'add_new'               =>  _x( 'Thêm Mới', 'Testimonial', Text_Domain ),
		'add_new_item'          =>  esc_html__( 'Thêm Mới', Text_Domain ),
		'edit_item'             =>  esc_html__( 'Sửa', Text_Domain ),
		'new_item'              =>  esc_html__( 'Mới', Text_Domain ),
		'view_item'             =>  esc_html__( 'Xem', Text_Domain ),
		'all_items'             =>  esc_html__( 'Danh Sách', Text_Domain ),
		'search_items'          =>  esc_html__( 'Tìm kiếm', Text_Domain ),
		'not_found'             =>  esc_html__( 'Không tìm thấy', Text_Domain ),
		'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', Text_Domain ),
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