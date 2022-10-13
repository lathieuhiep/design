<?php
add_action('cmb2_admin_init', 'design_testimonial_metaboxes');

function design_testimonial_metaboxes()
{
    // Course information meta box
    $design_meta_box_testimonial = new_cmb2_box(array(
        'id' => 'design_meta_box_testimonial',
        'title' => esc_html__('Thông tin', 'design'),
        'object_types' => array('design_testimonial'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

	$design_meta_box_testimonial->add_field( array(
        'name'    => esc_html__('Khoá học tham gia', 'design'),
        'id'      => 'design_meta_box_testimonial_course',
        'type'    => 'text',
    ) );

}