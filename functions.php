<?php
/**
*		THEME FUNCTIONS
*  	---------------
*
* 	Versión: 0.0.6
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
  '/post-types.php'                       // Custom Post Types.
);

foreach ( $mybooking_includes as $file ) {
  $filepath = locate_template( 'inc' . $file );
  if ( ! $filepath ) {
    trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
  }
  require_once $filepath;
}

/**
 * Internacionalization:
 * We keep this until child theme's integration
 *
 */
// function mybooking_theme_setup(){
//     $domain = 'mybooking';
//     load_child_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
//     // wp-content/themes/mybooking/languages/
//     load_child_theme_textdomain( $domain, get_template_directory() . '/languages' );
// }
// add_action( 'after_setup_theme', 'mybooking_theme_setup' );

/**
 * Mybooking Configuration & functions
 *
 */
// require_once('mybooking-options/mybooking-home-options.php');
// require_once('mybooking-options/mybooking-company-options.php');
// require_once('mybooking-options/mybooking-global-options.php');
// require_once('mybooking-functions/mybooking-menus.php');
// require_once('mybooking-functions/mybooking-categories.php');

// $options_header_background = get_option( 'home_header_background' );
// if ( $options_header_background == 2 ) {
//  require_once('mybooking-posts/mybooking-carousel.php');
// }
//
// $testimonial_active = get_option( "global_testimonial_active" );
// if ( $testimonial_active == 1 ) {
//  require_once('mybooking-posts/mybooking-testimonial.php');
// }
//
// $promo_active = get_option( "global_promo_active" );
// if ( $promo_active == 1 ) {
//  require_once('mybooking-posts/mybooking-promo.php');
// }
//
// $product_active = get_option( "global_product_active" );
// if ( $product_active == 1 ) {
//  require_once('mybooking-posts/mybooking-product.php');
// }


?>
