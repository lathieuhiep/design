<?php

add_filter('rwmb_meta_boxes', 'getDesign_register_meta_boxes');

function getDesign_register_meta_boxes($getDesign_meta_boxes)
{

    $getDesign_meta_boxes[] = array(
        'id' => 'getDesign_meta_box_post',
        'title' => esc_html__('Post Format', 'getdesign'),
        'post_types' => array('post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

            array(
                'name' => 'Select Type Image',
                'id' => 'getDesign_meta_box_post_select_image',
                'type' => 'select',
                'options' => array(
                    'featured_image' => 'Featured image',
                    'gallery' => 'Gallery',
                ),
            ),

            array(
                'id' => 'getDesign_meta_box_post_gallery',
                'name' => 'Gallery',
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_status' => false,
                'image_size' => 'thumbnail',
            ),

            array(
                'id' => 'getDesign_meta_box_post_video',
                'name' => 'Video Or Audio',
                'type' => 'oembed',
            ),

        )
    );

    return $getDesign_meta_boxes;
}