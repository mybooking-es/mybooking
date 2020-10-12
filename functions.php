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
  '/inc/theme-settings.php',                        // Initialize theme default settings.
	'/inc/setup.php',                                 // Theme setup and custom theme supports.
  '/inc/menus.php',                                 // Theme menus
  '/inc/categories.php',                            // Theme categories
  '/inc/enqueue.php',                               // Enqueue scripts and styles.
	'/inc/widgets.php',                               // Register widget area.
	'/inc/pagination.php',                            // Custom pagination for this theme.
  '/inc/customizer/alpha-color-picker.php',
  '/inc/customizer/class-font-selector.php',
  '/inc/customizer/gallery-control.php',
	'/inc/customizer.php',                            // Customizer additions.
	'/inc/class-wp-bootstrap-navwalker.php',          // Load custom WordPress nav walker.
  '/inc/post-functions.php',                        // Custom Post functions.
  '/inc/comments.php',                              // Custom Comment functions.
  '/inc/typography.php'                             // Typography
);

foreach ( $mybooking_includes as $mybooking_file ) {
  $mybooking_filepath = locate_template( $mybooking_file );
  if ( empty( $mybooking_filepath ) ) {
    trigger_error( esc_html( printf( 'Error locating %s for inclusion', $mybooking_file ) ), E_USER_ERROR );
  }
  require_once $mybooking_filepath;
}

// Start customize
MyBookingCustomizer::getInstance();
