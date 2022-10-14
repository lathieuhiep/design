<?php
$share_post = get_theme_mod('design_opt_share_single_post', 'show');
$show_related = get_theme_mod('land_opt_related_single_post', 'show');

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
        <h1 class="site-post-title">
            <?php the_title(); ?>
        </h1>

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
                    esc_html_e('Danh mục: ',Text_Domain);
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Từ khoá: ',Text_Domain );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $share_post == 'show' ) :
        design_post_share();
    endif;

    ?>
</div>

<?php
design_comment_form();

if ( $show_related == 'show' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;





