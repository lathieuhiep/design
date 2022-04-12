<?php
add_action('cmb2_admin_init', 'land_post_metaboxes');

function land_post_metaboxes()
{
    $cmb = new_cmb2_box(array(
        'id' => 'land_cmb_post',
        'title' => esc_html__('Option metabox', 'land'),
        'object_types' => array('post'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'id'   => 'land_cmb_post_title',
        'name' => esc_html__( 'Test Title', 'land' ),
        'type' => 'title',
        'desc' => esc_html__( 'This is a title description', 'land' ),
    ) );
}