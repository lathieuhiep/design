<?php
get_header();

global $getDesign_options;

$getDesign_title = $getDesign_options['getDesign_opt_404_title'];
$getDesign_content = $getDesign_options['getDesign_opt_404_editor'];
$getDesign_background = $getDesign_options['getDesign_opt_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $getDesign_background ) ):
                        echo wp_get_attachment_image( $getDesign_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $getDesign_title != '' ):
                        echo esc_html( $getDesign_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'getdesign' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $getDesign_content != '' ) :
                        echo wp_kses_post( $getDesign_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'getdesign' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'getdesign' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'getdesign' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'getdesign'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'getdesign'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>