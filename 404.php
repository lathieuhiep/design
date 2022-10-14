<?php
get_header();

$title = get_theme_mod('land_opt_title_404', '');
$content = get_theme_mod('land_opt_content_404', '');
$image = get_theme_mod('land_opt_image_404', '');
?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $image ) ):
                        echo wp_get_attachment_image( $image, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $title != '' ):
                        echo esc_html( $title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', Text_Domain );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $content != '' ) :
                        echo wp_kses_post( $content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', Text_Domain ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', Text_Domain ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', Text_Domain ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', Text_Domain); ?>">
                        <?php esc_html_e('Go to the Home Page', Text_Domain); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
