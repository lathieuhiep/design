<?php
$alert = get_theme_mod( 'design_opt_alert_text', esc_html__( 'Giảm 5% khi đăng ký học 2 người  -  Giảm 5% khi đăng ký 2 khóa học', Text_Domain ) );
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