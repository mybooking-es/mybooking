<?php
/**
*		THEME FUNCTIONS
*  	---------------
*
* 	@version 0.0.8
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$mybooking_includes = array(
  '/inc/theme-settings.php',                  // Initialize theme default settings.
	'/inc/setup.php',                           // Theme setup and custom theme supports.
  '/mybooking-options/mybooking-settings.php', // Theme settings
  '/mybooking-functions/mybooking-menus.php',  // Theme menus
  '/mybooking-functions/mybooking-categories.php', // Theme categories
  '/inc/enqueue.php',                         // Enqueue scripts and styles.
	'/inc/widgets.php',                         // Register widget area.
	'/inc/pagination.php',                      // Custom pagination for this theme.
  '/inc/customizer/alpha-color-picker.php',
  '/inc/customizer/class-font-selector.php',
  '/inc/customizer/gallery-control.php',
	'/inc/customizer.php',                      // Customizer additions.
	'/inc/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
  '/inc/post-functions.php',                  // Custom Post functions.
  '/inc/comment-functions.php',               // Custom Comment functions.  
  '/inc/typography.php'                       // Typography
);

foreach ( $mybooking_includes as $file ) {
  $filepath = locate_template( $file );
  if ( ! $filepath ) {
    trigger_error( sprintf( 'Error locating %s for inclusion', $file ), E_USER_ERROR );
  }
  require_once $filepath;
}

// Start settings
MyBookingThemeSettings::getInstance();
// Start customize
MyBookingCustomizer::getInstance();

?>
