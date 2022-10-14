<?php
add_action('rest_api_init', function () {
	register_rest_route(API_Namespace, 'option/science-participants', array(
		'methods' => 'GET',
		'callback' => 'design_api_option_science_participants'
	));
});

function design_api_option_science_participants() {
	$result = [];
	$title = design_prefix_get_option('science_participants_title');
	$group_opt = design_prefix_get_option('science_participants_group', '');

	$result['heading'] = $title;

	if ( $group_opt ) {
		foreach ( $group_opt as $item ) {
			$result['group'][] = [
				'title' => $item['title'],
				'content' => wpautop($item['content']),
			];
		}
	}

	return $result;
}