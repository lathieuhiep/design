<?php

add_filter('rwmb_meta_boxes', 'design_register_meta_boxes_course');

function design_register_meta_boxes_course($design_meta_boxes)
{

    $design_meta_boxes[] = array(
        'id' => 'design_meta_box_course',
        'title' => esc_html__('Thông tin khóa học', 'design'),
        'post_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

	        array(
		        'name' => esc_html__('Thời gian học', 'design'),
		        'id'   => 'design_meta_box_course_study_time',
		        'type' => 'number',
				'std' => 12,
		        'min'  => 1,
	        ),

	        array(
		        'name'        => esc_html__('Hình thức học', 'design'),
		        'id'          => 'design_meta_box_course_study_form',
		        'type'        => 'text',
		        'placeholder' => esc_html__('Học online trực tiếp', 'design'),
	        ),

	        array(
		        'name' => esc_html__('Số buổi học trong tuần', 'design'),
		        'id'   => 'design_meta_box_course_number_lessons',
		        'type' => 'number',
				'std' => 2,
		        'min'  => 1,
	        ),

	        array(
		        'name' => esc_html__('Học phí (VND)', 'design'),
		        'id'   => 'design_meta_box_course_tuition',
		        'type' => 'number',
		        'min'  => 1,
	        ),

        )
    );

    return $design_meta_boxes;
}