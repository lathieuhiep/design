<?php
function design_api_query_student_product(WP_REST_Request $request) {
	$get_params = $request->get_params();
	$posts_per_page = $get_params['posts_per_page'] ?? 8;
	$order = $get_params['order'] ?? 'DESC';
	$orderBy = $get_params['order_by'] ?? 'id';

	$args = array(
		'post_type' => 'student_product',
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderBy,
	);

	$query = new WP_Query( $args );
	$result = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ):
			$query->the_post();
			$course = get_post_meta( get_the_ID(),'design_meta_box_student_product_name_course', true );
			$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

			$result[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'course' => $course,
				'thumb' => $thumb
			);

		endwhile;
		wp_reset_postdata();
	}

	return $result;
}

add_action('rest_api_init', function () {
	register_rest_route(apiNamespace, 'post-type/student-product', array(
		'methods' => 'GET',
		'callback' => 'design_api_query_student_product'
	));
});