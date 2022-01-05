<?php

add_filter('rwmb_meta_boxes', 'design_register_meta_boxes_student_product');

function design_register_meta_boxes_student_product($design_meta_boxes)
{

    $design_meta_boxes[] = array(
        'id' => 'design_meta_box_student_product',
        'title' => esc_html__('Thông tin khóa học', 'design'),
        'post_types' => array('student_product'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

	        array(
		        'name' => esc_html__('Tên khóa học', 'design'),
		        'id'   => 'design_meta_box_student_product_name_course',
		        'type' => 'text',
	        ),

	        array(
		        'name'        => esc_html__( 'Chọn khóa học', 'design' ),
		        'id'          => 'design_meta_box_student_product_select_course',
		        'type'        => 'post',
		        'post_type'   => 'design_course',
	        ),

        )
    );

    return $design_meta_boxes;
}