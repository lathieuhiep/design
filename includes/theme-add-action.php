<?php
add_action('wp_head', 'design_favicon', 1);

function design_favicon() {
    $favicon = get_theme_mod( 'design_opt_favicon', '' );

    if ( empty( $favicon ) ) :
        $favicon = get_theme_file_uri('/assets/images/favicon.png' );
    endif;

    echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" sizes="16x16" />';
}

// disable gutenberg post
add_filter('use_block_editor_for_post', '__return_false', 10);