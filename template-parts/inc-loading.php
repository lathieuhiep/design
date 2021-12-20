<?php
global $design_options;

$design_show_loading = $design_options['design_opt_loading_show'] ?? '1';

if(  $design_show_loading == 1 ) :

    $design_loading_url  = $design_options['design_opt_loading_image']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $design_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $design_loading_url ); ?>" alt="<?php esc_attr_e('loading...','design') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','design') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>