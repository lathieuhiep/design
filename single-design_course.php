<?php get_header(); ?>

<div class="site-single-course">
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