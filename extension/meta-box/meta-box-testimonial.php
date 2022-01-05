<?php

add_filter('rwmb_meta_boxes', 'design_register_meta_boxes_testimonial');

function design_register_meta_boxes_testimonial($design_meta_boxes)
{

    $design_meta_boxes[] = array(
        'id' => 'design_meta_box_testimonial',
        'title' => esc_html__('Thông tin bổ sung', 'design'),
        'post_types' => array('design_testimonial'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

	        array(
		        'name' => esc_html__('Tên khóa học', 'design'),
		        'id'   => 'design_meta_box_testimonial_name_course',
		        'type' => 'text',
	        ),

        )
    );

    return $design_meta_boxes;
}