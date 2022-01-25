</div><!--End Sticky Footer-->

<?php
global $design_options;

$zalo = $design_options ['design_opt_chat_zalo'];

if ( $zalo ) :
?>

<div class="chat-zalo">
    <a href="https://zalo.me/<?php echo esc_attr( $zalo ) ?>" target="_blank">
        <img src="<?php echo get_theme_file_uri('assets/images/chat-zalo.png'); ?>" alt="zalo">
    </a>
</div>

<?php endif; ?>

<footer class="site-footer">
    <?php
    get_template_part( 'template-parts/footer/inc','multi-column' );

    get_template_part( 'template-parts/footer/inc','copyright' );
    ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
