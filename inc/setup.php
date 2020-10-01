<?php
/**
*		MYBOOKING THEME SETUP
*  	---------------------
*
* 	@version 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
// TODO: check this condition because we don't know what exactly does... 
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'mybooking_setup' );

if ( ! function_exists( 'mybooking_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 */
	function mybooking_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mybooking, use a find and replace
		 * to change 'mybooking' to the name of your theme in all the template files
		 *
		 */
		load_theme_textdomain( 'mybooking', get_template_directory() . '/languages' );

		/*
		* Add default posts and comments RSS feed links to head.
		*
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 *
		 */
		add_theme_support( 'title-tag' );

		/*
		* This theme uses wp_nav_menu() in one location.
		*
		*/
		register_nav_menus( array(
			'primary' => _x( 'Primary Menu', 'nav_menus', 'mybooking' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 *
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 *
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 *
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Set up the WordPress Theme logo feature.
		*
		*/
		add_theme_support( 'custom-logo' );

		/*
		* Add support for responsive embedded content.
		*
		*/
		add_theme_support( 'responsive-embeds' );

		/*
		* Add support for Woocommerce
		*
		*/
		add_theme_support( 'woocommerce' );

		/*
		* Gutenberg support
		*
		*/

		// Wide Blocks
		add_theme_support( 'align-wide' );

		// Loads editor styles for Gutenberg
		add_theme_support( 'editor-styles' );

		// Path to our custom editor styles
		add_editor_style( 'css/editor-styles.css' );

		// Default palette
		add_theme_support( 'editor-color-palette', array(
			// Primary
			array(
				'name'  => _x( 'Primary','gutenberg_palette','mybooking' ),
				'slug'  => 'primary',
				'color'	=> '#2193F2',
			),
			array(
				'name'  => _x( 'Primary Light','gutenberg_palette','mybooking' ),
				'slug'  => 'primary-light',
				'color'	=> '#6EC3FF',
			),
			array(
				'name'  => _x( 'Primary Dark','gutenberg_palette','mybooking' ),
				'slug'  => 'primary-dark',
				'color'	=> '#0066BF',
			),
			// Secondary
			array(
				'name'  => _x( 'Secondary','gutenberg_palette','mybooking' ),
				'slug'  => 'secondary',
				'color'	=> '#424242',
			),
			array(
				'name'  => _x( 'Secondary Light','gutenberg_palette','mybooking' ),
				'slug'  => 'secondary-light',
				'color'	=> '#6D6D6D',
			),
			array(
				'name'  => _x( 'Secondary Dark','gutenberg_palette','mybooking' ),
				'slug'  => 'secondary-dark',
				'color'	=> '#1B1B1B',
			),
			//States
			array(
				'name'  => _x( 'Info','gutenberg_palette','mybooking' ),
				'slug'  => 'info',
				'color'	=> '#6ec3ff',
			),
			array(
				'name'  => _x( 'Success','gutenberg_palette','mybooking' ),
				'slug'  => 'success',
				'color'	=> '#3dd992',
			),
			array(
				'name'  => _x( 'Warning','gutenberg_palette','mybooking' ),
				'slug'  => 'warning',
				'color'	=> '#ffb74d',
			),
			array(
				'name'  => _x( 'Error','gutenberg_palette','mybooking' ),
				'slug'  => 'error',
				'color'	=> '#e6546e',
			),

		) );

		/*
		* Check and setup theme default settings.
		*
		*/
		mybooking_setup_theme_default_settings();

	}
}

/**
 * Mybooking settings & functions
 *
 */

// Prepare the theme settings page
require_once( get_template_directory() . '/mybooking-options/mybooking-settings.php' );
MyBookingThemeSettings::getInstance();

// Functions
require_once( get_template_directory() . '/mybooking-functions/mybooking-menus.php' );
require_once( get_template_directory() . '/mybooking-functions/mybooking-categories.php' );


/**
 * Post excerpts
 *
 */
add_filter( 'excerpt_more', 'mybooking_custom_excerpt_more' );

if ( ! function_exists( 'mybooking_custom_excerpt_more' ) ) {

	/**
	 * Removes the ... from the excerpt read more link
	 * @param string $more The excerpt.
	 * @return string
	 *
	 */
	function mybooking_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}
