<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'design_create_project', 10);

function design_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'design' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'design' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'design' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'design' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'design' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'design' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'design' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'design' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'design' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'design' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'design' ),
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
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('design_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'design' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'design' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'design' ),
        'all_items'         => __( 'Tất cả danh mục', 'design' ),
        'parent_item'       => __( 'Danh mục cha', 'design' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'design' ),
        'edit_item'         => __( 'Sửa', 'design' ),
        'update_item'       => __( 'Cập nhật', 'design' ),
        'add_new_item'      => __( 'Thêm mới', 'design' ),
        'new_item_name'     => __( 'Tên mới', 'design' ),
        'menu_name'         => __( 'Danh mục', 'design' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'design_project_cat', array( 'design_project' ), $taxonomy_args );
    /* End taxonomy */

}