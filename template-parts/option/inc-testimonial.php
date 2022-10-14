<?php
$option_testimonial_owl = [
    'loop'       => true,
    'nav'        => false,
    'dots'       => true,
    'margin'     => 20,
    'autoplay'   => false,
    'responsive' => [
        '0' => array(
            'items'  => 1,
            'margin' => 0
        ),

        '576' => array(
            'items'  => 2
        ),

        '768' => array(
            'items' => 3
        ),

        '1200' => array(
            'items' => 4
        ),
    ],
];

$testimonial = get_theme_mod( 'design_opt_section_testimonial_list', design_default_customizer_repeater('testimonial') );

if ( $testimonial ) :
?>

    <div class="box-top text-center">
        <h4 class="title">
            <?php esc_html_e('Ý kiến học viên sau khoá học', Text_Domain); ?>
        </h4>
    </div>

    <div class="element-testimonial-carousel">
        <div class="testimonial-owl custom-equal-height-owl owl-carousel" data-settings-owl='<?php echo wp_json_encode( $option_testimonial_owl ); ?>'>
            <?php foreach ( $testimonial as $item ) : ?>
                <div class="item">
                    <div class="item__info">
                        <div class="avatar">
                            <?php
                            if ( $item['avatar'] ) :
                                echo wp_get_attachment_image( $item['avatar'], 'full' );
                            else:
                            ?>
                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/user-avatar.png' ) ) ?>" alt="avatar" width="80" height="80" />
                            <?php endif; ?>
                        </div>

                        <div class="student">
                            <h4 class="name">
                                <?php echo esc_html( $item['name'] ); ?>
                            </h4>

                            <p class="course">
                                <?php echo esc_html( $item['course'] ); ?>
                            </p>
                        </div>
                    </div>

                    <div class="item__desc">
                        <?php echo wpautop( $item['description'] ); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
endif;