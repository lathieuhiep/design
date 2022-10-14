<?php
$contact_us_show_hide = get_theme_mod( 'design_opt_show_contact_us', 'show' );

if ( $contact_us_show_hide == 'show' ) :

    $link = get_theme_mod( 'design_opt_contact_us_fanpage', 'https://www.facebook.com/khoahocuxui' );

    $default_phone = [
        [
            'text' => 'Phone 1',
            'phone' => '0911321300',
        ],
        [
            'text' => 'Phone 2',
            'phone' => '0975458209',
        ],
    ];
    $phones = get_theme_mod('design_opt_contact_us_phone', $default_phone);
?>

<div class="contact-us d-none d-md-block">
    <div class="container d-flex justify-content-between">
        <?php if ( $phones ) : ?>

        <div class="phone d-flex">
            <span><?php esc_html_e('Gọi Ngay:', Text_Domain); ?>&nbsp;</span>

            <ul class="d-flex">
                <?php foreach ( $phones as $phone ) : ?>
                <li>
                    <a href="tel:<?php echo esc_attr( $phone['phone'] ); ?>">
	                    <?php echo esc_html( $phone['phone'] ); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php
        endif;

        if ( $link ) :
        ?>

        <div class="fanpage">
            <span class="text"><?php esc_html_e('Theo dõi chúng tôi trên'); ?></span>

            <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
                <span><?php esc_html_e('Fanpage', Text_Domain); ?></span>
            </a>
        </div>

        <?php endif; ?>
    </div>
</div>

<?php

endif;