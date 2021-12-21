<?php
global $design_options;

$nav_top_sticky   =   $design_options['design_opt_nav_sticky'] ?? 1;
$design_opt_logo_image_id    =   $design_options['design_opt_logo_image']['id'];
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-end">
                <div class="site-logo d-flex align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $design_opt_logo_image_id ) ) :
                                echo wp_get_attachment_image( $design_opt_logo_image_id, 'full' );
                            else :
                                echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
                            endif;
                        ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#site-menu" aria-controls="site-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>

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
                                    <?php esc_html_e( 'ADD TO MENU','design' ); ?>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="btn-advice d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-advice">
                    <div class="btn-advice__box">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-phone.png' ) ); ?>" alt="advice">

                        <span><?php esc_html_e('Tôi cần tư vấn', 'design'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Modal Advice-->
<div class="modal fade" id="modal-advice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>