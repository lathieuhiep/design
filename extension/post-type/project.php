<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'getDesign_create_project', 10);

function getDesign_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'getdesign' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'getdesign' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'getdesign' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'getdesign' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'getdesign' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'getdesign' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'getdesign' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'getdesign' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'getdesign' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'getdesign' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'getdesign' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'getdesign' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'getdesign' ),
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

    register_post_type('getDesign_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'getdesign' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'getdesign' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'getdesign' ),
        'all_items'         => __( 'Tất cả danh mục', 'getdesign' ),
        'parent_item'       => __( 'Danh mục cha', 'getdesign' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'getdesign' ),
        'edit_item'         => __( 'Sửa', 'getdesign' ),
        'update_item'       => __( 'Cập nhật', 'getdesign' ),
        'add_new_item'      => __( 'Thêm mới', 'getdesign' ),
        'new_item_name'     => __( 'Tên mới', 'getdesign' ),
        'menu_name'         => __( 'Danh mục', 'getdesign' ),
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

    register_taxonomy( 'getDesign_project_cat', array( 'getDesign_project' ), $taxonomy_args );
    /* End taxonomy */

}