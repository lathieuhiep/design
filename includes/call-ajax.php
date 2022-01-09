<?php
// item student product
function design_item_student_product () {
	$name_course = rwmb_meta( 'design_meta_box_student_product_name_course' );
?>
	<div class="col custom-col">
		<div class="item">
			<div class="item__thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'large' ); ?>
				</a>
			</div>

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
		</div>
	</div>
<?php
}