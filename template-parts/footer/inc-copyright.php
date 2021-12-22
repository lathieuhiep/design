<?php
global $design_options;

$design_copyright = $design_options ['design_opt_footer_copyright_editor'] ?? 'Copyright &amp; DiepLK';
?>

<div class="site-footer__copyright text-center">
    <div class="container">
	    <?php echo wp_kses_post( $design_copyright ); ?>
    </div>
</div>