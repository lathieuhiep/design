<?php
add_action('rest_api_init', function () {
	register_rest_route(API_Namespace, 'option/regulations', array(
		'methods' => 'GET',
		'callback' => 'design_api_option_regulations'
	));
});

function design_api_option_regulations() {
	$result = [];

	$image = design_prefix_get_option('regulations_media', '');

	if ( $image ) {
		unset($image['id']);

		$result['image'] =$image;
	} else {
		$result['image'] = '';
	}

	$result += [
		'title' => design_prefix_get_option('regulations_title', ''),
		'content' => wpautop( design_prefix_get_option('regulations_content', '') ),
		'title_contact' => design_prefix_get_option('regulations_title_contact', ''),
		'content_contact' => wpautop( design_prefix_get_option('regulations_content_contact', '') ),
	];

	return $result;
}