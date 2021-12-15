<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'getDesign_shop_setup' );

function getDesign_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Start limit product */
add_filter('loop_shop_per_page', 'getDesign_show_products_per_page');

function getDesign_show_products_per_page() {
    global $getDesign_options;

    return $getDesign_options['getDesign_opt_shop_limit'];

}
/* End limit product */

/* Start Change number of products per row */
add_filter('loop_shop_columns', 'getDesign_loop_columns_product');

function getDesign_loop_columns_product() {
    global $getDesign_options;

    return $getDesign_options['getDesign_opt_shop_per_row'] ?? 4;
}
/* End Change number of products per row */

/* Start get cart */
if ( ! function_exists( 'getDesign_get_cart' ) ):

    function getDesign_get_cart() {

    ?>

        <div class="cart-box d-flex align-items-center">
            <div class="cart-customlocation">
                <i class="fas fa-shopping-cart"></i>

                <span class="number-cart-product">
                     <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                </span>
            </div>
        </div>

    <?php
    }

endif;

/* To ajaxify your cart viewer */
add_filter( 'woocommerce_add_to_cart_fragments', 'getDesign_add_to_cart_fragment' );

if ( ! function_exists( 'getDesign_add_to_cart_fragment' ) ) :

    function getDesign_add_to_cart_fragment( $getDesign_fragments ) {

        ob_start();

        do_action( 'getDesign_woo_shopping_cart' );

        $getDesign_fragments['.cart-box'] = ob_get_clean();

        return $getDesign_fragments;

    }

endif;
/* End get cart */

/* Start Sidebar Shop */
if ( ! function_exists( 'getDesign_woo_get_sidebar' ) ) :

    function getDesign_woo_get_sidebar() {

	    global $getDesign_options;
	    $getDesign_opt_shop_sidebar_position = $getDesign_options['getDesign_opt_shop_sidebar'] ?? 'left';


	    if( is_active_sidebar( 'getdesign-sidebar-wc' ) ):

	        if ( $getDesign_opt_shop_sidebar_position == 'left' ) :
		        $class_order = 'order-md-1';
	        else:
		        $class_order = 'order-md-2';
	        endif;
    ?>

            <aside class="col-12 col-md-4 col-lg-3 order-2 <?php echo esc_attr( $class_order ); ?>">
                <?php dynamic_sidebar( 'getdesign-sidebar-wc' ); ?>
            </aside>

    <?php
        endif;
    }

endif;
/* End Sidebar Shop */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'getDesign_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function getDesign_woo_before_main_content() {
        global $getDesign_options;
        $getDesign_opt_shop_sidebar_position = $getDesign_options['getDesign_opt_shop_sidebar'] ?? 'left';

    ?>

        <div class="site-shop">
            <div class="container">
                <div class="row">

                <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked getDesign_woo_sidebar - 10
                     */
                    do_action( 'getDesign_woo_sidebar' );

                ?>

                    <div class="<?php echo is_active_sidebar( 'getdesign-sidebar-wc' ) && $getDesign_opt_shop_sidebar_position != 'hide' ? 'col-12 col-md-8 col-lg-9 order-1 has-sidebar' : 'col-md-12'; ?>">

    <?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function getDesign_woo_after_main_content() {
    ?>
                    </div><!-- .col-md-9 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->
    <?php
    }

endif;

if ( ! function_exists( 'getDesign_woo_product_thumbnail_open' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked getDesign_woo_product_thumbnail_open - 5
     */

    function getDesign_woo_product_thumbnail_open() {

?>

        <div class="site-shop__product--item-image">

<?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_product_thumbnail_close' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked getDesign_woo_product_thumbnail_close - 15
     */

    function getDesign_woo_product_thumbnail_close() {

        do_action( 'getDesign_woo_button_quick_view' );
?>

        </div><!-- .site-shop__product--item-image -->

        <div class="site-shop__product--item-content">

<?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_get_product_title' ) ) :
    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked getDesign_woo_get_product_title - 10
     */

    function getDesign_woo_get_product_title() {
    ?>
        <h2 class="woocommerce-loop-product__title">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php
    }
endif;

if ( ! function_exists( 'getDesign_woo_after_shop_loop_item_title' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked getDesign_woo_after_shop_loop_item_title - 15
     */
    function getDesign_woo_after_shop_loop_item_title() {
    ?>
        </div><!-- .site-shop__product--item-content -->
    <?php
    }
endif;

if ( ! function_exists( 'getDesign_woo_loop_add_to_cart_open' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getDesign_woo_loop_add_to_cart_open - 4
     */

    function getDesign_woo_loop_add_to_cart_open() {
    ?>
        <div class="site-shop__product-add-to-cart">
    <?php
    }

endif;

if ( ! function_exists( 'getDesign_woo_loop_add_to_cart_close' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getDesign_woo_loop_add_to_cart_close - 12
     */

    function getDesign_woo_loop_add_to_cart_close() {
    ?>
        </div><!-- .site-shop__product-add-to-cart -->
    <?php
    }

endif;

if ( ! function_exists( 'getDesign_woo_before_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked getDesign_woo_before_shop_loop_item - 5
     */
    function getDesign_woo_before_shop_loop_item() {
    ?>

        <div class="site-shop__product--item">

    <?php
    }
endif;

if ( ! function_exists( 'getDesign_woo_after_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getDesign_woo_after_shop_loop_item - 15
     */
    function getDesign_woo_after_shop_loop_item() {
    ?>

        </div><!-- .site-shop__product--item -->

    <?php
    }
endif;

if ( ! function_exists( 'getDesign_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked getDesign_woo_before_shop_loop_open - 5
     */
    function getDesign_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'getDesign_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked getDesign_woo_before_shop_loop_close - 35
     */
    function getDesign_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

/*
* Single Shop
*/

if ( ! function_exists( 'getDesign_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked getDesign_woo_before_single_product - 5
     */

    function getDesign_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked getDesign_woo_after_single_product - 30
     */

    function getDesign_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'getDesign_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getDesign_woo_before_single_product_summary_open_warp - 1
     */

    function getDesign_woo_before_single_product_summary_open_warp() {

    ?>

        <div class="site-shop-single__warp">

    <?php

    }

endif;

if ( !function_exists( 'getDesign_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked getDesign_woo_after_single_product_summary_close_warp - 5
     */

    function getDesign_woo_after_single_product_summary_close_warp() {

    ?>

        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getDesign_woo_before_single_product_summary_open - 5
     */

    function getDesign_woo_before_single_product_summary_open() {

    ?>

        <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'getDesign_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getDesign_woo_before_single_product_summary_close - 30
     */

    function getDesign_woo_before_single_product_summary_close() {

    ?>

        </div><!-- .site-shop-single__gallery-box -->

    <?php

    }

endif;