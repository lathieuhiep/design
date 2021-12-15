<?php
get_header();

global $getDesign_options;

$getDesign_opt_single_post_sidebar = $getDesign_options['getDesign_opt_single_post_sidebar'] ?? 'right';

$getDesign_class_col_content = getDesign_col_use_sidebar( $getDesign_opt_single_post_sidebar, 'getdesign-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $getDesign_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $getDesign_opt_single_post_sidebar !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

