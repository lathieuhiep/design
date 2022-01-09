<?php
get_header();

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

	<div class="site-single-my-product">
		<?php
		while ( have_posts() ) :

			the_post() ;
			the_content();
			design_link_page();

		endwhile;
		?>
	</div>

<?php
get_footer();