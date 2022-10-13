<?php
add_action('rest_api_init', function () {
	register_rest_route(apiNamespace, 'post-type/courses', array(
		'methods' => 'GET',
		'callback' => 'design_api_query_course'
	));
});

function design_api_query_course(WP_REST_Request $request) {
	$get_params = $request->get_params();
	$posts_per_page = $get_params['posts_per_page'] ?? 3;
	$order = $get_params['order'] ?? 'DESC';
	$orderBy = $get_params['order_by'] ?? 'id';

	$args = array(
		'post_type' => 'design_course',
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderBy,
	);

	$query = new WP_Query( $args );
	$result = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ):
			$query->the_post();

			$result[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'thumb' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
				'study_time' => get_post_meta( get_the_ID(),'design_meta_box_course_study_time', true ),
				'study_form' => get_post_meta(  get_the_ID(),'design_meta_box_course_study_form', true ),
				'number_lessons' => get_post_meta(  get_the_ID(),'design_meta_box_course_number_lessons', true ),
				'tuition' => get_post_meta(  get_the_ID(),'design_meta_box_course_tuition', true ),
			);

		endwhile;
		wp_reset_postdata();
	}

	return $result;
}