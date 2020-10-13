<?php
/**
*		EXTRA MENUS
*  	-----------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_extra_menus' ) ) {
	/**
	 * Create extra menus
	 */
	function mybooking_extra_menus() {
		register_nav_menus(
		array(
		   'top-menu' => _x( 'Topbar Menu', 'nav_menus', 'mybooking' )
		   )
		 );
	}
	add_action( 'init', 'mybooking_extra_menus' );
}
