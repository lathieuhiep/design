<?php
get_header();
get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-student-product">
	<div class="container">
		<?php if (have_posts()) : ?>

			<div class="element-student-product-grid">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

					<?php
					while (have_posts()) : the_post();
						design_item_student_product( 'student_product' );
					endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>

		<?php
			design_pagination();
		endif;
		?>
	</div>
</div>

<?php
get_footer();