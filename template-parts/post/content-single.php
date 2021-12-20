<?php
global $design_options;

$design_opt_single_post_share = $design_options['design_opt_single_post_share'] ?? true;
$design_opt_single_related_show = $design_options['design_opt_single_related_show'] ?? true;
$type_image = rwmb_meta( 'design_meta_box_post_select_image' );
?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php
    if ( $type_image == 'featured_image' ) :
        get_template_part( 'template-parts/post/content', 'image' );
    else:
        get_template_part( 'template-parts/post/content', 'gallery' );
    endif;
     ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php design_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            design_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','design');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','design' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $design_opt_single_post_share ) :
        design_post_share();
    endif;

    ?>
</div>

<?php
design_comment_form();

if ( $design_opt_single_related_show ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;





