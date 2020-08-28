<?php
/**
*		MYBOOKING DEFAULT SETTINGS
*  	--------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_setup_theme_default_settings' ) ) {
	function mybooking_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$mybooking_posts_index_style = get_theme_mod( 'mybooking_posts_index_style' );
		if ( '' == $mybooking_posts_index_style ) {
			set_theme_mod( 'mybooking_posts_index_style', 'default' );
		}

		// Sidebar position.
		$mybooking_sidebar_position = get_theme_mod( 'mybooking_sidebar_position' );
		if ( '' == $mybooking_sidebar_position ) {
			set_theme_mod( 'mybooking_sidebar_position', 'right' );
		}

		// Container width.
		$mybooking_container_type = get_theme_mod( 'mybooking_container_type' );
		if ( '' == $mybooking_container_type ) {
			set_theme_mod( 'mybooking_container_type', 'container' );
		}
	}
}
