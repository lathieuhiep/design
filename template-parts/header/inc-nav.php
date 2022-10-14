<?php
$sticky_menu = get_theme_mod( 'design_opt_sticky_menu', 'on' );
$logo = get_theme_mod( 'design_opt_image_logo', '' );
$shortcode_contact = get_theme_mod('design_opt_support', '0');
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $sticky_menu == 'on' ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-end">
                <div class="site-logo d-flex align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                        if ( !empty( $logo ) ) :
                            echo wp_get_attachment_image( $logo, 'full' );
                        else :
                            ?>

                            <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo('title') ); ?>" width="64" height="64" />

                        <?php endif; ?>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#site-menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <div id="site-menu" class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">
                    <?php
                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;

                    else:
                    ?>
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU',Text_Domain ); ?>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="btn-advice d-none d-md-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-advice">
                    <div class="btn-advice__box">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-phone.png' ) ); ?>" alt="advice">

                        <span><?php esc_html_e('Tôi cần tư vấn', Text_Domain); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Modal Advice-->
<div class="modal fade modal-theme" id="modal-advice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php esc_html_e('Tôi cần tư vấn', Text_Domain); ?>
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="'. $shortcode_contact .'"]') ?>
            </div>
        </div>
    </div>
</div>