<?php
// item student product
function design_item_student_product ( $post_type, $class = '' ) {
?>
	<div class="col custom-col ">
		<div class="item <?php echo esc_attr( $class ); ?>">
			<div class="item__thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'full' ); ?>
				</a>
			</div>

			<?php
            if ( $post_type == 'student_product' ) :
	            $name_course = get_post_meta( get_the_ID(), 'design_meta_box_student_product_name_course', true );
            ?>

                <h2 class="item__title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <strong>
							<?php esc_html_e('Học Viên:', 'design'); ?>
                        </strong>

                        <span><?php the_title(); ?></span>
                    </a>
                </h2>

                <div class="item__info">
                    <div class="info-student">
                        <i class="fas fa-user"></i>
                        <span><?php the_title(); ?></span>
                    </div>

                    <div class="info-student">
                        <i class="fas fa-laptop"></i>
                        <span><?php echo esc_html( $name_course ); ?></span>
                    </div>
                </div>

            <?php else: ?>

                <h2 class="item__title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	                    <?php the_title(); ?>
                    </a>
                </h2>

			<?php endif; ?>
		</div>
	</div>
<?php
}

/* load ajax item product */
add_action( 'wp_ajax_nopriv_design_load_item_product', 'design_load_item_product' );
add_action( 'wp_ajax_design_load_item_product', 'design_load_item_product' );

function design_load_item_product() {
	$options = $_POST['options'];
	$paged = $_POST['paged'];

	// Query
	$args = array(
		'post_type'      => $options['post_type'],
		'paged'          => $paged,
		'posts_per_page' => $options['limit'],
		'orderby'        => $options['orderBy'],
		'order'          => $options['order'],
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ):
		while ( $query->have_posts() ):
			$query->the_post();

			design_item_student_product( $options['post_type'], 'item-hidden' );

		endwhile;
		wp_reset_postdata();
	endif;

	wp_die();
}