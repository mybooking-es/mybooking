<?php
/**
*		MYBOOKING DEFAULT SETTINGS
*  	--------------------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_setup_theme_default_settings' ) ) {
	function mybooking_setup_theme_default_settings() {

		// Container width.
		$mybooking_container_type = get_theme_mod( 'mybooking_container_type' );
		if ( '' == $mybooking_container_type ) {
			set_theme_mod( 'mybooking_container_type', 'container' );
		}
	}
}
