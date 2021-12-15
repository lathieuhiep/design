<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'getDesign_widgets_init');

function getDesign_widgets_init() {

	$getDesign_widgets_arr  =   array(

		'getDesign_sidebar_main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'getdesign' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'getdesign' )
		),

		'getDesign_sidebar_footer_multi_column_1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'getdesign' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'getdesign' )
		),

		'getDesign_sidebar_footer_multi_column_2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'getdesign' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'getdesign' )
		),

		'getDesign_sidebar_footer_multi_column_3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'getdesign' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'getdesign' )
		),

		'getDesign_sidebar_footer_multi_column_4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'getdesign' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'getdesign' )
		)

	);

	foreach ( $getDesign_widgets_arr as $getDesign_widgets_id => $getDesign_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $getDesign_widgets_value['name'] ),
			'id'            =>  esc_attr( $getDesign_widgets_id ),
			'description'   =>  esc_attr( $getDesign_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}

add_filter( 'use_widgets_block_editor', '__return_false' );