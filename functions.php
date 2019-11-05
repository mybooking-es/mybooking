<?php
/**
*		GLOBAL FUNCTIONS
*  	----------------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.1
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
function mybooking_setup(){
    $domain = 'mybooking';
    load_child_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
    // wp-content/themes/mybooking/languages/
    load_child_theme_textdomain( $domain, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'mybooking_setup' );


/**
 * Clean inherited CSS & scripts
 *
 */
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );
    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

/**
 * Enqueue new CSS & scripts
 *
 */
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    // == Load CSS
    // Load parent theme CSS
    wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    // Load child theme CSS
    wp_enqueue_style( 'child-understrap-mybooking-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );

    // == Load JS
    // Load parent theme JS
    wp_enqueue_script( 'parent-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
    // Load child theme JS
    wp_enqueue_script( 'child-understrap-mybooking-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Mybooking configuration pages
 *
 */
require_once('mybooking-options/mybooking-home-options.php');
require_once('mybooking-options/mybooking-company-options.php');
require_once('mybooking-options/mybooking-global-options.php');

/**
 * Mybooking custom post types
 *
 */
require_once('mybooking-posts/mybooking-testimonial.php');
require_once('mybooking-posts/mybooking-promo.php');

/**
 * Mybooking custom functions
 *
 */
 require_once('mybooking-functions/mybooking-menus.php');
 require_once('mybooking-functions/mybooking-excerpts.php');
 require_once('mybooking-functions/mybooking-categories.php');

?>
