<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','design_config_theme' );

        function design_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $design_options;
                    $design_favicon = $design_options['design_opt_favicon_upload']['url'];

                    if( $design_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $design_favicon ) . '" type="image/x-icon" />';

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

        add_action( 'wp_enqueue_scripts', 'design_custom_css', 99 );

        function design_custom_css() {

            global $design_options;

            $design_typo_selecter_1   =   $design_options['design_opt_custom_typography_1_selector'];

            $design_typo1_font_family   =   $design_options['design_opt_custom_typography_1']['font-family'];

            $design_css_style = '';

            if ( $design_typo1_font_family != '' ) :
                $design_css_style .= ' '.esc_attr( $design_typo_selecter_1 ).' { font-family: '.balanceTags( $design_typo1_font_family, true ).' }';
            endif;

            if ( $design_css_style != '' ) :
                wp_add_inline_style( 'design-style', $design_css_style );
            endif;

        }

    endif;
