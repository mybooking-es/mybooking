<?php
/**
*		THEME FUNCTIONS
*  	---------------
*
* 	@version 0.0.9
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$mybooking_includes = array(
	'/inc/setup.php',                                 // Theme setup and custom theme supports.
  '/inc/categories.php',                            // Theme categories
  '/inc/enqueue.php',                               // Enqueue scripts and styles.
	'/inc/widgets.php',                               // Register widget area.
  '/inc/customizer/alpha-color-picker.php',
  '/inc/customizer/class-font-selector.php',
  '/inc/customizer/carrousel-control.php',
	'/inc/customizer.php',                            // Customizer additions.
	'/inc/class-wp-bootstrap-navwalker.php',          // Load custom WordPress nav walker.
  '/inc/post-functions.php',                        // Custom Post functions.
  '/inc/site-functions.php',                        // Custom Site functions.
  '/inc/comments.php',                              // Custom Comment functions.
  '/inc/typography.php',                            // Typography
  '/inc/mybooking-engine-hooks.php'
);

foreach ( $mybooking_includes as $mybooking_file ) {
  $mybooking_filepath = locate_template( $mybooking_file );
  if ( empty( $mybooking_filepath ) ) {
    trigger_error( esc_html( printf( 'Error locating %s for inclusion', $mybooking_file ) ), E_USER_ERROR );
  }
  require_once $mybooking_filepath;
}

// Initialize customizer
MyBookingCustomizer::getInstance();
