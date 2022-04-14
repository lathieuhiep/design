<?php
add_action('cmb2_admin_init', 'design_my_product_metaboxes');

function design_my_product_metaboxes()
{
    // My product meta box
    $cmb_my_product = new_cmb2_box(array(
        'id' => 'design_cmb_my_product',
        'title' => esc_html__('Thông tin sản phẩm', 'design'),
        'object_types' => array('my_product'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_my_product->add_field( array(
        'name' => esc_html__( 'Ảnh sản phẩm', 'design' ),
        'id'   => 'design_meta_box_my_product_gallery',
        'type' => 'file_list',
    ) );

}