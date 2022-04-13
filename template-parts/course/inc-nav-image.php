<?php
// Query
$args = array(
    'post_type'      => 'design_course',
    'posts_per_page' => -1
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    global $post;
    $post_id = $post->ID;
?>

    <div class="element-menu-post-type">
        <div class="nav-course-slider owl-carousel">
            <?php
            $index_item = 0;
            while ( $query->have_posts() ):
                $query->the_post();

                $id_post_type = get_the_ID();
            ?>

                <div class="item<?php echo esc_attr( $post_id == $id_post_type ? ' current' : '' ) ?>" data-index="<?php echo esc_attr( $index_item ); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="item__thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <h2 class="item__title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>

            <?php
                $index_item++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php
endif;