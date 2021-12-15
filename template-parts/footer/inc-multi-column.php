<?php
global $getDesign_options;

$multi_column = $getDesign_options ["getDesign_opt_footer_multi_column"];

if( is_active_sidebar( 'getdesign-sidebar-footer-multi-column-1' ) || is_active_sidebar( 'getdesign-sidebar-footer-multi-column-2' ) || is_active_sidebar( 'getdesign-sidebar-footer-multi-column-3' ) || is_active_sidebar( 'getdesign-sidebar-footer-multi-column-4' ) ) :

?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $multi_column; $i++ ):
                    $j = $i +1;
                    $getDesign_col = $getDesign_options ["getDesign_opt_footer_multi_column_" . $j];

                    if( is_active_sidebar( 'getdesign-sidebar-footer-multi-column-'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $getDesign_col ); ?>">

                        <?php dynamic_sidebar( 'getdesign-sidebar-footer-multi-column-'.$j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>