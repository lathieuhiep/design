<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','getDesign_config_theme' );

        function getDesign_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $getDesign_options;
                    $getDesign_favicon = $getDesign_options['getDesign_opt_favicon_upload']['url'];

                    if( $getDesign_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $getDesign_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'getDesign_custom_css', 99 );

        function getDesign_custom_css() {

            global $getDesign_options;

            $getDesign_typo_selecter_1   =   $getDesign_options['getDesign_opt_custom_typography_1_selector'];

            $getDesign_typo1_font_family   =   $getDesign_options['getDesign_opt_custom_typography_1']['font-family'];

            $getDesign_css_style = '';

            if ( $getDesign_typo1_font_family != '' ) :
                $getDesign_css_style .= ' '.esc_attr( $getDesign_typo_selecter_1 ).' { font-family: '.balanceTags( $getDesign_typo1_font_family, true ).' }';
            endif;

            if ( $getDesign_css_style != '' ) :
                wp_add_inline_style( 'getdesign-style', $getDesign_css_style );
            endif;

        }

    endif;
