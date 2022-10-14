<?php
add_action('cmb2_admin_init', 'design_student_product_metaboxes');

function design_student_product_metaboxes()
{
    // Course information meta box
    $cmb_student_product = new_cmb2_box(array(
        'id' => 'design_cmb_student_product',
        'title' => esc_html__('Thông tin học viên', Text_Domain),
        'object_types' => array('student_product'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_student_product->add_field( array(
        'name'    => esc_html__('Tên khóa học', Text_Domain),
        'id'      => 'design_meta_box_student_product_name_course',
        'type'    => 'text',
    ) );

    $cmb_student_product->add_field( array(
        'name'             => esc_html__( 'Chọn khóa học', Text_Domain ),
        'id'               => 'design_meta_box_student_product_select_course',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => design_get_post('design_course'),
    ) );

    $cmb_student_product->add_field( array(
        'name' => esc_html__( 'Ảnh sản phẩm học viên', Text_Domain ),
        'id'   => 'design_meta_box_student_product_gallery',
        'type' => 'file_list',
    ) );

}