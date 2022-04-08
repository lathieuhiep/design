<?php
$footer_column = get_theme_mod('design_opt_column_footer', 'column-4');
$number_column = (int) substr( $footer_column, -1 );

if( is_active_sidebar( 'design_sidebar_footer_multi_column_1' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_2' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_3' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_4' ) ) :
?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $number_column; $i++ ):
                    $j = $i +1;
                    $design_col = get_theme_mod( 'design_opt_column_width_footer_' .  $j, 3);

                    if( is_active_sidebar( 'design_sidebar_footer_multi_column_'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $design_col ); ?>">
                        <?php dynamic_sidebar( 'design_sidebar_footer_multi_column_'.$j ); ?>
                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>