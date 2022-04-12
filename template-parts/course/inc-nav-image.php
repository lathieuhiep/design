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

    $data_settings_owl = [
        'loop'       => true,
        'nav'        => false,
        'dots'       => false,
        'margin'     => 8,
        'autoplay'   => false,
        'responsive' => [
            '0' => array(
                'items'  => 1,
                'margin' => 0
            ),

            '576' => array(
                'items'  => 2,
            ),

            '768' => array(
                'items' => 3
            )
        ],
    ];
?>

    <div class="element-menu-post-type">
        <div class="nav-course-slider owl-carousel" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
            <?php
            while ( $query->have_posts() ):
                $query->the_post();

                $id_post_type = get_the_ID();
            ?>

                <div class="item">
                    <div class="item__thumbnail">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
                    </div>

                    <h2 class="item__title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php
endif;