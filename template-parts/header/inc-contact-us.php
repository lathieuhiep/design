<?php
global $design_options;

$contact_us_show_hide = $design_options['design_opt_contact_us_show'] ?? true;

if ( $contact_us_show_hide ) :
$link = $design_options['design_opt_contact_us_fanpage'] ?? '';
$phones = $design_options['design_opt_contact_us_phone'] ?? '';

?>
<div class="contact-us d-none d-md-block">
    <div class="container d-flex justify-content-between">
        <?php if ( $phones ) : ?>

        <div class="phone d-flex">
            <span><?php esc_html_e('Gọi Ngay:', 'design'); ?>&nbsp;</span>

            <ul class="d-flex">
                <?php foreach ( $phones as $phone ) : ?>
                <li>
                    <a href="tel:<?php echo esc_attr( $phone ); ?>">
	                    <?php echo esc_html( $phone ); ?>
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
                <span><?php esc_html_e('Fanpage', 'design'); ?></span>
            </a>
        </div>

        <?php endif; ?>
    </div>
</div>

<?php

endif;