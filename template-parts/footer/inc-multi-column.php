<?php
global $design_options;

$multi_column = $design_options ["design_opt_footer_multi_column"];

if( is_active_sidebar( 'design_sidebar_footer_multi_column_1' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_2' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_3' ) || is_active_sidebar( 'design_sidebar_footer_multi_column_4' ) ) :

?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $multi_column; $i++ ):
                    $j = $i +1;
                    $design_col = $design_options ["design_opt_footer_multi_column_" . $j];

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