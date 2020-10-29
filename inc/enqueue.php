<?php
/**
*		ENQUEUE SCRIPTS AND CSS
*  	-----------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_theme_enqueue_styles' ) ) {
	/**
	 * Enqueue theme scripts & CSS
	 *
	 */
	function mybooking_theme_enqueue_styles() {

		// Get the theme data
		$the_theme = wp_get_theme();

	  // == Load CSS
	  wp_enqueue_style( 'mybooking-styles', get_stylesheet_directory_uri() .  '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
	  
	  // == Load JS
	  wp_enqueue_script( 'mybooking-scripts', get_stylesheet_directory_uri() . '/js/theme.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
  
    // == Load Customizer front-end
    $custom_css = MyBookingCustomizer::getInstance()->customize_enqueue( 'front-end' );
    if ( !empty($custom_css) ) { 
			wp_register_style( 'mybooking-customizer', false );
			wp_enqueue_style( 'mybooking-customizer' );
			wp_add_inline_style( 'mybooking-customizer', $custom_css );
	  }

    // Avoid enqueue elementor font-awesome
    add_action( 'elementor/frontend/after_enqueue_styles', function () { wp_dequeue_style( 'font-awesome' ); } );

		// == Typography

		$typography_body = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_font_body' );
		$typography_heading = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_font_heading' );

	  // Typography
	  if ( !empty( $typography_body ) && $typography_body != 'default' ) {
	  	mybooking_font_selector_enqueue_google_font($typography_body);
	  }

	  if ( !empty ( $typography_heading ) && $typography_heading != 'default' && $typography_heading != $typography_body  ) {
	  	mybooking_font_selector_enqueue_google_font($typography_heading);
	  }

    // Comment reply
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'mybooking_theme_enqueue_styles' );
}

if ( ! function_exists( 'mybooking_theme_enqueue_block_editor_styles' ) ) {
	/**
	 * Enqueue Editor Block CSS
	 *
	 */
	function mybooking_theme_enqueue_block_editor_styles() {

		// Get the theme data
		$the_theme = wp_get_theme();
	   
	  // == Load CSS
	  wp_enqueue_style( 'mybooking-block-editor-styles', get_stylesheet_directory_uri() .  '/css/editor-style.css', array(), $the_theme->get( 'Version' ) );

    // == Load Customizer block-editor
    $custom_css = MyBookingCustomizer::getInstance()->customize_enqueue( 'block-editor' );
    if ( !empty($custom_css) ) {    
			wp_register_style( 'mybooking-customizer-block-editor-styles', false );
			wp_enqueue_style( 'mybooking-customizer-block-editor-styles' );    
			wp_add_inline_style( 'mybooking-customizer-block-editor-styles', $custom_css );
	  }

		// == Typography
		$typography_body = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_font_body' );
		$typography_heading = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_font_heading' );

	  // Typography
	  if ( !empty( $typography_body ) && $typography_body != 'default' ) {
	  	mybooking_font_selector_enqueue_google_font($typography_body);
	  }

	  if ( !empty ( $typography_heading ) && $typography_heading != 'default' && $typography_heading != $typography_body  ) {
	  	mybooking_font_selector_enqueue_google_font($typography_heading);
	  }


	}
	add_action( 'enqueue_block_editor_assets', 'mybooking_theme_enqueue_block_editor_styles', 1, 1 );
}