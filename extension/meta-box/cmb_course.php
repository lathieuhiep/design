<?php
add_action('cmb2_admin_init', 'design_post_metaboxes');

function design_post_metaboxes()
{
    $cmb = new_cmb2_box(array(
        'id' => 'design_cmb_post',
        'title' => esc_html__('Thông tin khoá học', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'name' => esc_html__('Thời gian học', 'design'),
        'id' => 'design_meta_box_course_study_time',
        'default' => 12,
        'type' => 'text_number',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Hình thức học', 'design'),
        'id'      => 'design_meta_box_course_study_form',
        'default' => esc_html__('Học online trực tiếp', 'design'),
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name' => esc_html__('Số buổi học trong tuần', 'design'),
        'id' => 'design_meta_box_course_number_lessons',
        'default' => 2,
        'type' => 'text_number',
    ) );

    $cmb->add_field( array(
        'name' => esc_html__('Số buổi học trong tuần', 'design'),
        'id' => 'design_meta_box_course_number_lessons',
        'default' => 2,
        'type' => 'text_number',
    ) );

    $cmb->add_field( array(
        'name' => esc_html__('Học phí (VND)', 'design'),
        'id' => 'design_meta_box_course_tuition',
        'default' => '',
        'type' => 'text_number',
    ) );
}