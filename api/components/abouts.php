<?php
add_action('rest_api_init', function () {
	register_rest_route(API_Namespace, 'option/abouts', array(
		'methods' => 'GET',
		'callback' => 'design_api_option_abouts'
	));
});

function design_api_option_abouts() {
	$result = [];
	$media_opt = design_prefix_get_option('abouts_media', '');
	$group_opt = design_prefix_get_option('about_group', '');

	$result['media_url'] = $media_opt['url'];

	if ( $group_opt ) {
		foreach ( $group_opt as $item ) {
			$result['group'][] = [
				'title' => $item['title'],
				'color_title' => $item['color_title'],
				'content' => wpautop($item['content']),
			];
		}
	}

	return $result;
}