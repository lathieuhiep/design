<?php
$sidebar = get_theme_mod('design_opt_sidebar_blog_post', 'right');
$per_row = get_theme_mod('design_opt_per_row_blog_post', '3');

$class_col_content = design_col_use_sidebar($sidebar, 'design_sidebar_main');
?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($class_col_content); ?>">
                <div class="site-post-content">
                    <?php if ( have_posts() ) : ?>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-<?php echo esc_attr( $per_row ); ?>">

                            <?php while (have_posts()) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" class="col site-post-item">
                                    <div class="site-post-content">
                                        <?php get_template_part('template-parts/post/content', 'image'); ?>

                                        <div class="box-content">
                                            <h2 class="site-post-title">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php if (is_sticky() && is_home()) : ?>
                                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                                    <?php
                                                    endif;

                                                    the_title();
                                                    ?>
                                                </a>
                                            </h2>

                                            <div class="site-post-excerpt">
                                                <p>
                                                    <?php
                                                    if ( has_excerpt() ) :
                                                        echo esc_html( get_the_excerpt() );
                                                    else:
                                                        echo wp_trim_words( get_the_content(), 30, '...' );
                                                    endif;
                                                    ?>
                                                </p>

                                                <a href="<?php the_permalink(); ?>" class="text-read-more">
                                                    <?php esc_html_e('Xem thêm', 'design'); ?>
                                                </a>

                                                <?php design_link_page(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>

                        <?php
                        design_pagination();

                    else:

                        if (is_search()) :
                            get_template_part('template-parts/search/content', 'no-data');
                        endif;

                    endif;
                    ?>
                </div>
            </div>

            <?php
            if ($sidebar !== 'hide') :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>