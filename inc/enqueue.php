<?php
/**
*		ENQUEUE SCRIPTS AND CSS
*  	-----------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue theme scripts & CSS
 *
 */
function mybooking_theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

  // == Load CSS
  wp_enqueue_style( 'mybooking-styles', get_stylesheet_directory_uri() .  '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
  // == Load JS
  wp_enqueue_script( 'mybooking-scripts', get_stylesheet_directory_uri() . '/js/theme.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'mybooking_theme_enqueue_styles' );

?>
