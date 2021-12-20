<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *constants
 */
if ( ! function_exists( 'getDesign_setup' ) ):

	function getDesign_setup() {

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'getdesign', get_parent_theme_file_path( '/languages' ) );

		/**
		 * Set up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support post thumbnails.
		 *
		 */
		add_theme_support( 'custom-header' );

		add_theme_support( 'custom-background' );

		//Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menu( 'primary', 'Primary Menu' );
		register_nav_menu( 'footer-menu', 'Footer Menu' );

		// add theme support title-tag
		add_theme_support( 'title-tag' );

		/*  Post Type   */
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
	}

	add_action( 'after_setup_theme', 'getDesign_setup' );

endif;

/**
 * Required: Plugin Activation
 */
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

/**
 * Required: include plugin theme scripts
 */
require get_parent_theme_file_path( '/extension/process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
	/*
	 * Required: Redux Framework
	 */
	require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
	/*
	 * Required: Meta Box Framework
	 */
	require get_parent_theme_file_path( '/extension/meta-box/meta-box-post.php' );

}

if ( ! function_exists( 'rwmb_meta' ) ) {

	function rwmb_meta( $key, $args = '', $post_id = null ): bool
    {
		return false;
	}

}

if ( did_action( 'elementor/loaded' ) ) :
	/*
	 * Required: Elementor
	 */
	require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

/* Require Widgets */
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $getDesign_file_widgets ) {
	require $getDesign_file_widgets;
}

/**
 * Required: post type
 */
require get_parent_theme_file_path( '/extension/post-type/testimonial.php' );

/**
 * Required: Register Sidebar
 */
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

/**
 * Required: Theme Scripts
 */
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

/*
*
* Walker for the main menu
*
*/
add_filter( 'walker_nav_menu_start_el', 'getDesign_add_arrow',10,4);
function getDesign_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

/* callback comment list */
function getDesign_comments( $getDesign_comment, $getDesign_comment_args, $getDesign_comment_depth ) {

	if ( 'div' === $getDesign_comment_args['style'] ) :

		$getDesign_comment_tag       = 'div';
		$getDesign_comment_add_below = 'comment';

	else :

		$getDesign_comment_tag       = 'li';
		$getDesign_comment_add_below = 'div-comment';

	endif;

	?>
    <<?php echo $getDesign_comment_tag ?><?php comment_class( empty( $getDesign_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $getDesign_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

    <div class="comment-author vcard">
		<?php if ( $getDesign_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $getDesign_comment, $getDesign_comment_args['avatar_size'] );
		} ?>

    </div>

	<?php if ( $getDesign_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'getdesign' ); ?>
        </em>
	<?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

			<?php edit_comment_link( esc_html__( 'Edit ', 'getdesign' ) ); ?>

			<?php comment_reply_link( array_merge( $getDesign_comment_args, array(
				'add_below' => $getDesign_comment_add_below,
				'depth'     => $getDesign_comment_depth,
				'max_depth' => $getDesign_comment_args['max_depth']
			) ) ); ?>

        </div>

        <div class="comment-text-box">
			<?php comment_text(); ?>
        </div>
    </div>

	<?php if ( 'div' != $getDesign_comment_args['style'] ) : ?>
        </div>
	<?php endif; ?>

	<?php
}

/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'getDesign_comment_nav' ) ) :

	function getDesign_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'getdesign' ); ?>
                </h2>

                <div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'getdesign' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'getdesign' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

		<?php
		endif;
	}

endif;

/* Start Social Network */
function getDesign_get_social_url() {

	global $getDesign_options;
	$getDesign_opt_social_networks = getDesign_get_social_network();

	foreach ( $getDesign_opt_social_networks as $getDesign_social ) :
		$getDesign_social_url = $getDesign_options[ 'getDesign_opt_social_network_' . $getDesign_social['id'] ] ?? '#';

		if ( $getDesign_social_url ) :
			?>

            <div class="social-network-item item-<?php echo esc_attr( $getDesign_social['id'] ); ?>">
                <a href="<?php echo esc_url( $getDesign_social_url ); ?>">
                    <i class="<?php echo esc_attr( $getDesign_social['icon'] ); ?>" aria-hidden="true"></i>
                </a>
            </div>

		<?php
		endif;

	endforeach;
}

function getDesign_get_social_network(): array
{
	return array(
		array( 'id' => 'facebook', 'icon' => 'fab fa-facebook-f' ),
		array( 'id' => 'youtube', 'icon' => 'fab fa-youtube' ),
		array( 'id' => 'twitter', 'icon' => 'fab fa-twitter' ),
		array( 'id' => 'instagram', 'icon' => 'fab fa-instagram' ),
	);
}

/* End Social Network */

/* Start pagination */
function getDesign_pagination() {

	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'getdesign' ),
		'next_text'          => esc_html__( 'Next', 'getdesign' ),
		'screen_reader_text' => '&nbsp;',
	) );

}

// pagination nav query
function getDesign_paging_nav_query( $getDesign_querry ) {

	$getDesign_pagination_args = array(

		'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__( ' Previous', 'getdesign' ),
		'next_text' => esc_html__( 'Next', 'getdesign' ) . '<i class="fa fa-angle-double-right"></i>',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $getDesign_querry->max_num_pages,
		'type'      => 'list',

	);

	$getDesign_paginate_links = paginate_links( $getDesign_pagination_args );

	if ( $getDesign_paginate_links ) :

		?>
        <nav class="pagination">
			<?php echo $getDesign_paginate_links; ?>
        </nav>

	<?php

	endif;
}

/* End pagination */

// Sanitize Pagination
add_action( 'navigation_markup_template', 'getDesign_sanitize_pagination' );
function getDesign_sanitize_pagination( $getDesign_content ) {
	// Remove role attribute
	$getDesign_content = str_replace( 'role="navigation"', '', $getDesign_content );

	// Remove h2 tag
    return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $getDesign_content );
}

/* Start Get col global */
function getDesign_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{

	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function getDesign_col_sidebar(): string
{
    return 'col-12 col-md-4 col-lg-3';
}

/* End Get col global */

/* Start Post Meta */
function getDesign_post_meta() {
	?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'getdesign' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

        <span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'getdesign' );
            the_date(); ?>
        </span>

        <span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'getdesign' ), '1 ' . esc_html__( 'Comment', 'getdesign' ), '% ' . esc_html__( 'Comments', 'getdesign' ) );
            ?>
        </span>
    </div>

	<?php
}

/* End Post Meta */

/* Start Link Pages */
function getDesign_link_page() {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'getdesign' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

/* End Link Pages */

/* Start comment */
function getDesign_comment_form() {

	if ( comments_open() || get_comments_number() ) :
		?>
        <div class="site-comments">
			<?php comments_template( '', true ); ?>
        </div>
	<?php
	endif;
}

/* End comment */

/* Start get Category check box */
function getDesign_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

/* End get Category check box */

/**
 *Start share
 */
function getDesign_post_share() {

	?>
    <div class="site-post-share">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
	<?php

}

function getDesign_opengraph() {
	global $post;

	if ( is_single() ) :

		if ( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

        $excerpt = $post->post_excerpt;

		if ( $excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

    ?>
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>" />
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>" />
	<?php

	else :
		return;
	endif;
}

add_action( 'wp_head', 'getDesign_opengraph', 5 );
/* End opengraph */

/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function getDesign_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'getDesign_include_custom_post_types_in_search_results' );

