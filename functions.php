<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *constants
 */
if ( ! function_exists( 'design_setup' ) ):

	function design_setup() {

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
		load_theme_textdomain( 'design', get_parent_theme_file_path( '/languages' ) );

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

	add_action( 'after_setup_theme', 'design_setup' );

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
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $design_file_widgets ) {
	require $design_file_widgets;
}

/**
 * Required: post type
 */
require get_parent_theme_file_path( '/extension/post-type/course.php' );
require get_parent_theme_file_path( '/extension/post-type/student-product.php' );
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
add_filter( 'walker_nav_menu_start_el', 'design_add_arrow',10,4);
function design_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

/* callback comment list */
function design_comments( $design_comment, $design_comment_args, $design_comment_depth ) {

	if ( 'div' === $design_comment_args['style'] ) :

		$design_comment_tag       = 'div';
		$design_comment_add_below = 'comment';

	else :

		$design_comment_tag       = 'li';
		$design_comment_add_below = 'div-comment';

	endif;

	?>
    <<?php echo $design_comment_tag ?><?php comment_class( empty( $design_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $design_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

    <div class="comment-author vcard">
		<?php if ( $design_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $design_comment, $design_comment_args['avatar_size'] );
		} ?>

    </div>

	<?php if ( $design_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'design' ); ?>
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

			<?php edit_comment_link( esc_html__( 'Edit ', 'design' ) ); ?>

			<?php comment_reply_link( array_merge( $design_comment_args, array(
				'add_below' => $design_comment_add_below,
				'depth'     => $design_comment_depth,
				'max_depth' => $design_comment_args['max_depth']
			) ) ); ?>

        </div>

        <div class="comment-text-box">
			<?php comment_text(); ?>
        </div>
    </div>

	<?php if ( 'div' != $design_comment_args['style'] ) : ?>
        </div>
	<?php endif; ?>

	<?php
}

/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'design_comment_nav' ) ) :

	function design_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'design' ); ?>
                </h2>

                <div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'design' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'design' ) ) ) :
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
function design_get_social_url() {

	global $design_options;
	$design_opt_social_networks = design_get_social_network();

	foreach ( $design_opt_social_networks as $design_social ) :
		$design_social_url = $design_options[ 'design_opt_social_network_' . $design_social['id'] ] ?? '#';

		if ( $design_social_url ) :
			?>

            <div class="social-network-item item-<?php echo esc_attr( $design_social['id'] ); ?>">
                <a href="<?php echo esc_url( $design_social_url ); ?>">
                    <i class="<?php echo esc_attr( $design_social['icon'] ); ?>" aria-hidden="true"></i>
                </a>
            </div>

		<?php
		endif;

	endforeach;
}

function design_get_social_network(): array
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
function design_pagination() {

	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'design' ),
		'next_text'          => esc_html__( 'Next', 'design' ),
		'screen_reader_text' => '&nbsp;',
	) );

}

// pagination nav query
function design_paging_nav_query( $design_querry ) {

	$design_pagination_args = array(

		'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__( ' Previous', 'design' ),
		'next_text' => esc_html__( 'Next', 'design' ) . '<i class="fa fa-angle-double-right"></i>',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $design_querry->max_num_pages,
		'type'      => 'list',

	);

	$design_paginate_links = paginate_links( $design_pagination_args );

	if ( $design_paginate_links ) :

		?>
        <nav class="pagination">
			<?php echo $design_paginate_links; ?>
        </nav>

	<?php

	endif;
}

/* End pagination */

// Sanitize Pagination
add_action( 'navigation_markup_template', 'design_sanitize_pagination' );
function design_sanitize_pagination( $design_content ) {
	// Remove role attribute
	$design_content = str_replace( 'role="navigation"', '', $design_content );

	// Remove h2 tag
    return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $design_content );
}

/* Start Get col global */
function design_col_use_sidebar( $option_sidebar, $active_sidebar ): string
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

function design_col_sidebar(): string
{
    return 'col-12 col-md-4 col-lg-3';
}

/* End Get col global */

/* Start Post Meta */
function design_post_meta() {
	?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'design' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

        <span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'design' );
            the_date(); ?>
        </span>

        <span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'design' ), '1 ' . esc_html__( 'Comment', 'design' ), '% ' . esc_html__( 'Comments', 'design' ) );
            ?>
        </span>
    </div>

	<?php
}

/* End Post Meta */

/* Start Link Pages */
function design_link_page() {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'design' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

/* End Link Pages */

/* Start comment */
function design_comment_form() {

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
function design_check_get_cat( $type_taxonomy ): array
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
function design_post_share() {

	?>
    <div class="site-post-share">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
	<?php

}

function design_opengraph() {
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

add_action( 'wp_head', 'design_opengraph', 5 );
/* End opengraph */

/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function design_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'design_include_custom_post_types_in_search_results' );

