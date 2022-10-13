<?php
function get_navigation_menu( WP_REST_Request $request ) {
	$location = $request->get_param('location');
	$locations = get_theme_mod('nav_menu_locations');

	return wp_get_nav_menu_items($locations[$location]);
}

add_action('rest_api_init', function () {
	register_rest_route(apiNamespace, 'menu', array(
		'methods' => 'GET',
		'callback' => 'get_navigation_menu'
	));
});