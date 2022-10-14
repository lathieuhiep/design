<?php
// Set a unique slug-like ID
$prefix = 'options';

// A Custom function for get an option
if ( ! function_exists( 'prefix_get_option' ) ) {
	function design_prefix_get_option( $option = '', $default = null ) {
		$options = get_option( 'options' ); // Attention: Set your unique id of the framework
		return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	$design_my_theme = wp_get_theme();

	// Create options
	CSF::createOptions( $prefix, array(
		'menu_title' => esc_html__('Theme Options', Text_Domain),
		'menu_slug'  => 'theme-options',
		'menu_position' => 2,
		'framework_title' => $design_my_theme->get( 'Name' ) . ' ' . esc_html__('Options', Text_Domain),
		'footer_text' => esc_html__('Thank you for using my theme', Text_Domain),
		'footer_after' => '<pre>Contact me:<br />Zalo/Phone: 0975458209 - Skype: lathieuhiep - facebook: <a href="https://www.facebook.com/lathieuhiep" target="_blank">lathieuhiep</a></pre>',
	) );

	// Section components
	CSF::createSection( $prefix, array(
		'id' => 'primary_components',
		'title' => 'Components'
	) );

	// Section components banner
	CSF::createSection( $prefix, array(
		'parent' => 'primary_components',
		'title'  => 'Banner',
		'fields' => array(
			array(
				'id'    => 'banner_text',
				'type'  => 'text',
				'title' => esc_html__('Text', Text_Domain),
				'default' => esc_html__('CÙNG GET DESIGN', Text_Domain),
			),

			array(
				'id'    => 'banner_heading',
				'type'  => 'text',
				'title' => esc_html__('Heading', Text_Domain),
				'default' => esc_html__('Trở thành UXUI Designer', Text_Domain),
			),

			array(
				'id'      => 'banner_description',
				'type'    => 'textarea',
				'title'   => esc_html__('Description', Text_Domain),
				'default' => 'Get Design – Chuyên đào tạo các khóa học UXUI, Web design và App mobile. Học viên được học trực tiếp kiến thức cơ bản & chuyên sâu bám sát nhu cầu thực tế để đáp ứng công việc cho học viên sau khi hoàn thành khóa học.'
			),

			array(
				'id'    => 'banner_gallery_student_product',
				'type'  => 'gallery',
				'title' => esc_html__('Gallery Student Product', Text_Domain),
			),
		)
	) );

	// Section Abouts
	CSF::createSection( $prefix,array(
		'parent' => 'primary_components',
		'title'  => 'Abouts',
		'fields' => array(
			array(
				'id'    => 'abouts_media',
				'type'  => 'media',
				'title' => 'Media',
				'url' => false
			),

			array(
				'id'        => 'about_group',
				'type'      => 'group',
				'title'     => esc_html__('Abouts', Text_Domain),
				'fields'    => array(
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => esc_html__('Title', Text_Domain),
					),

					array(
						'id'    => 'color_title',
						'type'  => 'color',
						'title' => esc_html__('Color Title', Text_Domain),
					),

					array(
						'id'    => 'content',
						'type'  => 'wp_editor',
						'title' =>  esc_html__('Content', Text_Domain),
						'media_buttons' => false
					),
				),
			),
		)
	) );

	// Section components courses
	CSF::createSection( $prefix, array(
		'parent' => 'primary_components',
		'title'  => 'Courses',
		'fields' => array(
			array(
				'id'    => 'course_limit',
				'type'  => 'number',
				'title' => 'Limit',
				'default' => 3
			),

			array(
				'id'          => 'course_order',
				'type'        => 'select',
				'title'       => esc_html__('Order', Text_Domain),
				'options'     => array(
					'ASC'  => esc_html__( 'Ascending', Text_Domain ),
					'DESC' => esc_html__( 'Descending', Text_Domain ),
				),
				'default'     => 'DESC'
			),

			array(
				'id'          => 'course_order_by',
				'type'        => 'select',
				'title'       => esc_html__('Order By', Text_Domain),
				'options'     => array(
					'id'    => esc_html__( 'ID', Text_Domain ),
					'title' => esc_html__( 'Title', Text_Domain ),
					'date'  => esc_html__( 'Date', Text_Domain ),
					'rand'  => esc_html__( 'Random', Text_Domain ),
				),
				'default'     => 'id'
			),
		)
	) );

	// Section components science participants
	CSF::createSection( $prefix, array(
		'parent' => 'primary_components',
		'title'  => 'Science Participants',
		'fields' => array(
			array(
				'id'    => 'science_participants_title',
				'type'  => 'text',
				'title' => esc_html__('Title', Text_Domain),
				'default' => esc_html__('ĐỐI TƯỢNG THAM GIA KHÓA HỌC', Text_Domain),
			),

			array(
				'id'        => 'science_participants_group',
				'type'      => 'group',
				'title'     => esc_html__('Group', Text_Domain),
				'fields'    => array(
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => esc_html__('Title', Text_Domain),
					),

					array(
						'id'    => 'content',
						'type'  => 'wp_editor',
						'title' =>  esc_html__('Content', Text_Domain),
						'media_buttons' => false
					),
				),
			),
		)
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Tab Title 2',
		'fields' => array(

			// A textarea field
			array(
				'id'    => 'opt-textarea',
				'type'  => 'textarea',
				'title' => 'Simple Textarea',
			),

		)
	) );

}

