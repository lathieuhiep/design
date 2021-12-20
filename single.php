<?php
get_header();

global $design_options;

$design_opt_single_post_sidebar = $design_options['design_opt_single_post_sidebar'] ?? 'right';

$design_class_col_content = design_col_use_sidebar( $design_opt_single_post_sidebar, 'design_sidebar_main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $design_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $design_opt_single_post_sidebar !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

