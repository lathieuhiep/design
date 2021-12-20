<?php if( is_active_sidebar( 'design_sidebar_main' ) ): ?>

    <aside class="<?php echo esc_attr( design_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'design_sidebar_main' ); ?>
    </aside>

<?php endif; ?>