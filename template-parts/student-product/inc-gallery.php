<?php
$data_settings_owl = [
    'loop'       => false,
    'nav'        => false,
    'dots'       => false,
    'margin'     => 10,
    'autoplay'   => true,
    'responsive' => [
        '0' => array(
            'items'  => 2,
        ),

        '768' => array(
            'items' => 3
        ),

        '1200' => array(
            'items' => 4
        ),
    ],
];

$name_course = get_post_meta( get_the_ID(), 'design_meta_box_student_product_name_course', true );
$link_course = get_post_meta( get_the_ID(), 'design_meta_box_student_product_select_course', true );
$gallery = get_post_meta( get_the_ID(), 'design_meta_box_student_product_gallery', true );

if ( $gallery ) :
    $prev_post = get_previous_post();
    $next_post = get_next_post();
?>

    <div class="element-student-product-detail">
        <div class="product-featured-image">
            <div class="scrollbar-inner">
                <img src="<?php echo esc_url( $gallery[array_key_first( $gallery )] ) ?>" alt="product">
            </div>

            <div class="student-info d-sm-flex align-items-sm-end justify-content-sm-between">
                <div class="name">
                    <strong>
                        <?php esc_html_e('Học viên', 'design'); ?>
                    </strong>

                    <h4 class="name__student">
                        <?php the_title(); ?>
                    </h4>
                </div>

                <div class="course">
                    <a href="<?php echo esc_url( get_post_permalink( $link_course ) ); ?>">
                        <?php esc_html_e('Học Khóa ', 'design'); echo esc_html( $name_course ); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="product-gallery">
            <div class="product-gallery__slider">
                <div class="product-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
                    <?php foreach ( $gallery as  $attachment_id => $attachment_url ) : ?>

                        <div class="item item-student" data-src="<?php echo esc_url( $attachment_url ); ?>">
                            <?php echo wp_get_attachment_image( $attachment_id, 'medium' ); ?>
                        </div>

                    <?php endforeach; ?>
                </div>

                <?php
                if( $prev_post ) :
                    $prev_title = strip_tags( str_replace('"', '', $prev_post->post_title) );
                ?>

                    <a class="link-post prev-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ) ?>" title="<?php echo esc_attr( $prev_title ); ?>">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        <span><?php esc_html_e( 'Xem bài học viên trước', 'design' ); ?></span>
                    </a>

                <?php
                endif;

                if( $next_post ) :
                    $next_title = strip_tags( str_replace('"', '', $next_post->post_title) );
                ?>

                    <a class="link-post next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ) ?>" title="<?php echo esc_attr( $next_title ); ?>">
                        <i class="fas fa-long-arrow-alt-right"></i>
                        <span><?php esc_html_e( 'Xem bài học viên kế tiếp', 'design' ); ?></span>
                    </a>

                <?php endif; ?>
            </div>
        </div>
    </div>

<?php
endif;