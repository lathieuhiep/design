<?php
global $design_options;

$alert = $design_options['design_opt_alert_text'] ?? '';
?>

<header id="home" class="site-header">
    <?php if ( $alert ) : ?>

    <div class="alert" role="alert">
        <div class="container text-center">
            <?php echo esc_html( $alert ); ?>
        </div>
    </div>

    <?php endif; ?>

    <?php get_template_part( 'template-parts/header/inc', 'contact-us' ); ?>
</header>

<?php get_template_part( 'template-parts/header/inc', 'nav' ); ?>