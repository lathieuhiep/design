<?php
add_action('cmb2_admin_init', 'design_course_metaboxes');

function design_course_metaboxes()
{
    // Course information meta box
    $cmb_course_information = new_cmb2_box(array(
        'id' => 'design_cmb_course',
        'title' => esc_html__('Thông tin khoá học', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_course_information->add_field( array(
        'name' => esc_html__('Thời gian học', 'design'),
        'id' => 'design_meta_box_course_study_time',
        'default' => 12,
        'type' => 'text_number',
    ) );

    $cmb_course_information->add_field( array(
        'name'    => esc_html__('Hình thức học', 'design'),
        'id'      => 'design_meta_box_course_study_form',
        'default' => esc_html__('Học online trực tiếp', 'design'),
        'type'    => 'text',
    ) );

    $cmb_course_information->add_field( array(
        'name' => esc_html__('Số buổi học trong tuần', 'design'),
        'id' => 'design_meta_box_course_number_lessons',
        'default' => 2,
        'type' => 'text_number',
    ) );

    $cmb_course_information->add_field( array(
        'name' => esc_html__('Số buổi học trong tuần', 'design'),
        'id' => 'design_meta_box_course_number_lessons',
        'default' => 2,
        'type' => 'text_number',
    ) );

    $cmb_course_information->add_field( array(
        'name' => esc_html__('Học phí (VND)', 'design'),
        'id' => 'design_meta_box_course_tuition',
        'default' => '',
        'type' => 'text_number',
    ) );

    // Course participants meta box
    $cmb_course_participants = new_cmb2_box(array(
        'id' => 'design_cmb_course_participants',
        'title' => esc_html__('Đối tượng tham gia khoá học', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_course_participants->add_field( array(
        'name'    => esc_html__('Mô tả', 'design'),
        'id'      => 'design_cmb_course_participants_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

    // Course lesson meta box
    $cmb_course_lesson = new_cmb2_box(array(
        'id' => 'design_cmb_course_lesson',
        'title' => esc_html__('Khung kiến thức bài giảng', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_course_lesson->add_field( array(
        'name'    => esc_html__('Mô tả 1', 'design'),
        'id'      => 'design_cmb_course_lesson_first',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

    $cmb_course_lesson->add_field( array(
        'name'    => esc_html__('Mô tả 2', 'design'),
        'id'      => 'design_cmb_course_lesson_last',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

    // Course time and tuition meta box
    $cmb_course_time_tuition = new_cmb2_box(array(
        'id' => 'design_cmb_course_time_tuition',
        'title' => esc_html__('Thời gian học và thông tin học phí', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_course_time_tuition->add_field( array(
        'name'    => esc_html__('Mô tả', 'design'),
        'id'      => 'design_cmb_course_time_tuition_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

    // Course detail
    $cmb_course_detail = new_cmb2_box(array(
        'id' => 'design_cmb_course_detail',
        'title' => esc_html__('Chi tiết khoá học', 'design'),
        'object_types' => array('design_course'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_course_detail->add_field( array(
        'name'    => esc_html__('Mô tả', 'design'),
        'id'      => 'design_cmb_course_detail_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );
}