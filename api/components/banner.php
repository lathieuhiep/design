<?php
add_action('rest_api_init', function () {
	register_rest_route(API_Namespace, 'option/banner', array(
		'methods' => 'GET',
		'callback' => 'design_api_option_banner'
	));
});

function design_api_option_banner() {
	$gallery = [];
	$gallery_opt = design_prefix_get_option('banner_gallery_student_product');

	if ( $gallery_opt ) {
		$gallery_ids = explode( ',', $gallery_opt );

		foreach ( $gallery_ids as $gallery_item_id ) {
			$gallery[] = wp_get_attachment_url( $gallery_item_id );
		}
	}

	return array(
		'text' => design_prefix_get_option('banner_text'),
		'heading' => design_prefix_get_option('banner_heading'),
		'description' => design_prefix_get_option('banner_description'),
		'gallery' => $gallery,
	);
}