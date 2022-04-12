<?php
get_header();

$design_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
?>

<div class="site-single-course">
    <?php
    if ( $design_check_elementor ) :
        while ( have_posts() ) :
            the_post() ;
            the_content();
            design_link_page();
        endwhile;
    else:
        get_template_part('template-parts/breadcrumbs/inc','breadcrumbs');
    ?>

    <div class="container">
        <?php get_template_part('template-parts/course/inc','nav-image'); ?>
    </div>

    <?php endif; ?>
</div>

<?php
get_footer();