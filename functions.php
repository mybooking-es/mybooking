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
  '/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
  '/enqueue.php',                         // Enqueue scripts and styles.
	'/widgets.php',                         // Register widget area.
	'/pagination.php',                      // Custom pagination for this theme.
	'/customizer.php',                      // Customizer additions.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
  '/post-functions.php',                  // Custom Post functions.
  '/typography.php'                       // Typography
);

foreach ( $mybooking_includes as $file ) {
  $filepath = locate_template( 'inc' . $file );
  if ( ! $filepath ) {
    trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
  }
  require_once $filepath;
}

?>
