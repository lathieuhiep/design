<?php if( is_active_sidebar( 'getDesign_sidebar_main' ) ): ?>

    <aside class="<?php echo esc_attr( getDesign_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'getDesign_sidebar_main' ); ?>
    </aside>

<?php endif; ?>