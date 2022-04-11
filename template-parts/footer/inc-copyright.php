<?php
$copyright = get_theme_mod('design_opt_content_copyright', 'Copyright &amp; DiepLK');
?>

<div class="site-footer__copyright text-center">
    <div class="container">
	    <?php echo wp_kses_post( $copyright ); ?>
    </div>
</div>