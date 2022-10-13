<?php
function design_api_query_testimonial(WP_REST_Request $request) {
	$get_params = $request->get_params();
	$posts_per_page = $get_params['posts_per_page'] ?? -1;
	$order = $get_params['order'] ?? 'DESC';
	$orderBy = $get_params['order_by'] ?? 'id';

	$args = array(
		'post_type' => 'design_testimonial',
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderBy,
	);

	$query = new WP_Query( $args );
	$result = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ):
			$query->the_post();
			$course = get_post_meta( get_the_ID(),'design_meta_box_testimonial_course', true );
			$avatar = get_the_post_thumbnail_url( get_the_ID() );

			$result[] = array(
				'id' => get_the_ID(),
				'content' => wpautop( get_the_content() ),
				'title' => get_the_title(),
				'course' => $course,
				'avatar' => $avatar
			);

		endwhile;
		wp_reset_postdata();
	}

	return $result;
}

add_action('rest_api_init', function () {
	register_rest_route(apiNamespace, 'post-type/testimonial', array(
		'methods' => 'GET',
		'callback' => 'design_api_query_testimonial'
	));
});