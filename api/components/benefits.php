<?php
add_action('rest_api_init', function () {
	register_rest_route(API_Namespace, 'option/benefits', array(
		'methods' => 'GET',
		'callback' => 'design_api_option_benefits'
	));
});

function design_api_option_benefits() {
	$result = [];
	$group_opt = design_prefix_get_option('benefits_list', '');

	$result['heading'] = design_prefix_get_option('benefits_heading', '');

	if ( $group_opt ) {
		foreach ( $group_opt as $item ) {
			$result['group'][] = [
				'image' => $item['image']['url'],
				'title' => $item['title']
			];
		}
	}

	return $result;
}