<?php
global $getDesign_options;

$getDesign_show_loading = $getDesign_options['getDesign_opt_loading_show'] ?? '1';

if(  $getDesign_show_loading == 1 ) :

    $getDesign_loading_url  = $getDesign_options['getDesign_opt_loading_image']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $getDesign_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $getDesign_loading_url ); ?>" alt="<?php esc_attr_e('loading...','getdesign') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','getdesign') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>