<?php
$post_type = 'student_product';
$limit_post = 8;

$setting_args = [
    'post_type' => $post_type,
    'limit' => $limit_post
];

// Query
$args = array(
    'post_type' => $post_type,
    'posts_per_page' => $limit_post
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>
    <div class="box-top text-center">
        <p class="text">
            <?php esc_html_e('Tham khảo sản phẩm', Text_Domain); ?>
        </p>

        <h4 class="title">
            <?php esc_html_e('Sản phẩm học viên sau khoá học', Text_Domain); ?>
        </h4>
    </div>

    <div class="element-student-product-grid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 custom-row">
            <?php
            while ( $query->have_posts() ):
                $query->the_post();

                design_item_student_product( 'student_product' );

            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="btn-link">
            <div class="spinner-box">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <a href="#" class="load-my-product" data-settings='<?php echo wp_json_encode( $setting_args ); ?>'>
                <?php esc_html_e('Xem thêm sản phẩm khác', Text_Domain); ?>
            </a>
        </div>

    </div>
<?php
endif;