<?php
/**
*		POSTS FUNCTIONS
*  	---------------
* 	Custom functions that act independently of the theme templates.
* 	Eventually, some of the functionality here could be replaced by core features.
*
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'mybooking_posted_on' ) ) {
	function mybooking_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = apply_filters(
			'mybooking_posted_on', sprintf(
				'<span class="posted-on"><i class="far fa-calendar-alt"></i>&nbsp;<a href="%1$s" rel="bookmark">%2$s</a></span>',
				esc_attr( esc_url( get_permalink() ) ),
				apply_filters( 'mybooking_posted_on_time', $time_string )
			)
		);
		$byline = apply_filters(
			'mybooking_posted_by', sprintf(
				'&nbsp;<span class="byline"><i class="far fa-user-circle"></i> %1$s <span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
				esc_html_x( 'by', 'post-meta', 'mybooking' ),
				esc_attr( esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ),
				esc_html( get_the_author() )
			)
		);

		echo wp_kses_post( $posted_on );
		echo wp_kses_post( $byline );

		$comments = '';

		if ( ! is_page() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '&nbsp;<span class="comments-link"><i class="far fa-comment"></i>&nbsp;';
			comments_popup_link( esc_html_x( 'Leave a comment', 'entry_footer', 'mybooking' ), 
								 esc_html_x( '1 Comment', 'entry_footer', 'mybooking' ), 
								 esc_html_x( '% Comments', 'comments', 'mybooking' ) );
			echo '</span>';
		}

	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'mybooking_entry_footer' ) ) {
	function mybooking_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = mybooking_get_category_list( esc_html( ' ' ) );
			if ( $categories_list && mybooking_categorized_blog() ) {
				/* translators: %s: Categories of current post */
				printf( '<div class="cat-links"><i class="far fa-folder"></i>&nbsp;<span> %s</span></div>', wp_kses_post( $categories_list ) ); 
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html( ' ' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<div class="tags-links"><i class="fas fa-tag"></i>&nbsp;<span> %s</span></div>', wp_kses_post( $tags_list ) ); 
			}
		}
		// Edit post link: Added classes to show as a button
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html_x( 'Edit %s', 'entry_footer', 'mybooking' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<div class="edit-link mybooking-post-edit-link">',
			'</div>',
			0,
			'btn btn-primary post-edit-link'
		);
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'mybooking_categorized_blog' ) ) {
	function mybooking_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'mybooking_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'mybooking_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so components_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so components_categorized_blog should return false.
			return false;
		}
	}
}



if ( ! function_exists( 'mybooking_category_transient_flusher' ) ) {
	function mybooking_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'mybooking_categories' );
	}
	/**
	 * Flush out the transients used in mybooking_categorized_blog.
	 */
	add_action( 'edit_category', 'mybooking_category_transient_flusher' );
	add_action( 'save_post',     'mybooking_category_transient_flusher' );
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists( 'mybooking_post_nav' ) ) {
	function mybooking_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container navigation post-navigation">
			<h2 class="sr-only"><?php echo esc_html_x( 'Post navigation', 'post_navigation', 'mybooking' ); ?></h2>
			<div class="row nav-links justify-content-between">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous">%link</span>', 
										_x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'mybooking' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link</span>', 
									_x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'mybooking' ) );
				}
				?>
			</div>
		</nav>
		<?php
	}
}

if ( ! function_exists( 'mybooking_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function mybooking_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_attr( esc_url( get_bloginfo( 'pingback_url' ) ) ). '">' . "\n";
		}
	}
	add_action( 'wp_head', 'mybooking_pingback' );
}


if ( ! function_exists( 'mybooking_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function mybooking_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
	add_action( 'wp_head', 'mybooking_mobile_web_app_meta' );
}
