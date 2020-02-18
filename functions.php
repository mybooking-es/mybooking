<?php
/**
*		GLOBAL FUNCTIONS
*  	----------------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Internacionalization
 *
 */
function mybooking_theme_setup(){
    $domain = 'mybooking';
    load_child_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
    // wp-content/themes/mybooking/languages/
    load_child_theme_textdomain( $domain, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'mybooking_theme_setup' );

/**
 * Enqueue new CSS & scripts
 *
 */
function mybooking_theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

  // == Load CSS
  wp_enqueue_style( 'mybooking-styles', get_stylesheet_directory_uri() .  '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );

  // == Load JS
  wp_enqueue_script( 'mybooking-scripts', get_stylesheet_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'mybooking_theme_enqueue_styles' );

// Include WordPerss Bootstrap NavWalker (Understrap)
require_once('inc/class-wp-bootstrap-navwalker.php');

// Include the widgets areas
require_once('inc/widgets.php');

/**
 * Mybooking configuration pages
 *
 */
require_once('mybooking-options/mybooking-home-options.php');
require_once('mybooking-options/mybooking-company-options.php');
require_once('mybooking-options/mybooking-global-options.php');

/**
 * Mybooking custom functions
 *
 */
require_once('mybooking-functions/mybooking-menus.php');
require_once('mybooking-functions/mybooking-excerpts.php');
require_once('mybooking-functions/mybooking-categories.php');

 /**
  * Mybooking custom post types
  *
  */
$options_header_background = get_option( 'home_header_background' );
if ( $options_header_background == 2 ) {
  require_once('mybooking-posts/mybooking-carousel.php');
}

$testimonial_active = get_option( "global_testimonial_active" );
if ( $testimonial_active == 1 ) {
  require_once('mybooking-posts/mybooking-testimonial.php');
}

$promo_active = get_option( "global_promo_active" );
if ( $promo_active == 1 ) {
  require_once('mybooking-posts/mybooking-promo.php');
}

$product_active = get_option( "global_product_active" );
if ( $product_active == 1 ) {
  require_once('mybooking-posts/mybooking-product.php');
}
?>
