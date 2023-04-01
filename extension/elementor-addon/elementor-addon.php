<?php
// Register Category Elementor Addon
function design_register_category_elementor_addon( $elements_manager ): void
{
	$elements_manager->add_category(
		'design_widgets',
		[
			'title' => esc_html__( 'My Them', 'plugin-name' ),
			'icon' => 'icon-goes-here',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'design_register_category_elementor_addon' );

// Register Widgets Elementor Addon
function design_register_widget_elementor_addon( $widgets_manager ): void
{
	// include add on
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/breadcrumb.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/text-editor.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/button-modal-form.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-carousel.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/slides.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/testimonial-carousel.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/carousel-images.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/course-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/student-product-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/menu-post-type.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/heading-theme.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/course-detail-content.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/service-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/student-product-detail.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/list-editor.php' );

	// register add on
	$widgets_manager->register( new Design_Elementor_Addon_Breadcrumb() );
	$widgets_manager->register( new Design_Elementor_Text_Editor() );
	$widgets_manager->register( new Design_Elementor_Addon_Button_Modal_Form() );
	$widgets_manager->register( new Design_Elementor_Addon_Post_Carousel() );
	$widgets_manager->register( new Design_Elementor_Addon_Post_Grid() );
	$widgets_manager->register( new Design_Elementor_Addon_Slides() );
	$widgets_manager->register( new Design_Elementor_Addon_Testimonial_Carousel() );
	$widgets_manager->register( new Design_Elementor_Addon_Carousel_Images() );
	$widgets_manager->register( new Design_Elementor_Addon_Course_Grid() );
	$widgets_manager->register( new Design_Elementor_Addon_Student_Product_Grid() );
	$widgets_manager->register( new Design_Elementor_Menu_Post_Type() );
	$widgets_manager->register( new Design_Elementor_Heading_Theme() );
	$widgets_manager->register( new Design_Elementor_Addon_CourseDetailContent() );
	$widgets_manager->register( new Design_Elementor_Addon_Service_Grid() );
	$widgets_manager->register( new Design_Elementor_Addon_Student_Product_Detail() );
	$widgets_manager->register( new Design_Elementor_List_Editor() );

}
add_action( 'elementor/widgets/register', 'design_register_widget_elementor_addon' );

// Register Script Elementor Addon
add_action( 'elementor/frontend/after_enqueue_styles', 'design_register_script_elementor_addon' );

function design_register_script_elementor_addon(): void
{
	$check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

	if ( $check_elementor == 'builder' ) {
		wp_enqueue_style( 'elementor-addon', get_theme_file_uri( '/assets/elementor-addon/elementor-addon.min.css' ), array(), '' );
	}

	wp_register_script( 'design-elementor-custom', get_theme_file_uri( '/assets/elementor-addon/elementor-addon.min.js' ), array(), '1.0.0', true );
}