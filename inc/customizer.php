<?php
/**
*		MYBOOKING THEME CUSTOMIZER
*  	--------------------------
*
*   Section: Mybooking layout settings
*
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'mybooking_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function mybooking_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'mybooking_customize_register' );

if ( ! function_exists( 'mybooking_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function mybooking_theme_customize_register( $wp_customize ) {

		mybooking_customize_layout_section( $wp_customize );
		mybooking_customize_colors_section( $wp_customize );

	}
} // endif function_exists( 'mybooking_theme_customize_register' ).
add_action( 'customize_register', 'mybooking_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'mybooking_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function mybooking_customize_preview_js() {
		wp_enqueue_script(
			'mybooking_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'mybooking_customize_preview_js' );


/*
 * Enqueue the style from the customizer (maybe in a separated file later)
 */
function mybooking_customizer_enqueue() {
	
	// Build the css-properties
  $custom_css = ":root {";
  $custom_css.= "--brand-primary: #535ca0";
  $custom_css.= "}";
		
	wp_register_style( 'mybooking_customizer', false );
	wp_enqueue_style( 'mybooking_customizer' );
	wp_add_inline_style( 'mybooking_customizer', $custom_css );

}

add_action( 'wp_enqueue_scripts', 'mybooking_customizer_enqueue' );

// --

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function mybooking_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		/**
		 * Layout 
		 */
		function mybooking_customize_layout_section( $wp_customize ) {

			// Theme layout settings.
			$wp_customize->add_section(
				'mybooking_theme_layout_options',
				array(
					'title'       => __( 'Layout Settings', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => __( 'Container width and sidebar defaults', 'mybooking' ),
					'priority'    => 160,
				)
			);

			// Container type

			$wp_customize->add_setting(
				'mybooking_container_type',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'mybooking_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mybooking_container_type',
					array(
						'label'       => __( 'Container Width', 'mybooking' ),
						'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'mybooking' ),
						'section'     => 'mybooking_theme_layout_options',
						'settings'    => 'mybooking_container_type',
						'type'        => 'select',
						'choices'     => array(
							'container'       => __( 'Fixed width container', 'mybooking' ),
							'container-fluid' => __( 'Full width container', 'mybooking' ),
						),
						'priority'    => '10',
					)
				)
			);

			// Sidebar position
			$wp_customize->add_setting(
				'mybooking_sidebar_position',
				array(
					'default'           => 'right',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mybooking_sidebar_position',
					array(
						'label'             => __( 'Sidebar Positioning', 'mybooking' ),
						'description'       => __(
							'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
							'mybooking'
						),
						'section'           => 'mybooking_theme_layout_options',
						'settings'          => 'mybooking_sidebar_position',
						'type'              => 'select',
						'sanitize_callback' => 'mybooking_theme_slug_sanitize_select',
						'choices'           => array(
							'right' => __( 'Right sidebar', 'mybooking' ),
							'left'  => __( 'Left sidebar', 'mybooking' ),
							'both'  => __( 'Left & Right sidebars', 'mybooking' ),
							'none'  => __( 'No sidebar', 'mybooking' ),
						),
						'priority'          => '20',
					)
				)
			);

		}

		/** 
		 * Colors
		 */ 
		function mybooking_customize_colors_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_colors_options',
				array(
					'title'       => __( 'Colors', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => __( 'Theme colors', 'mybooking' ),
					'priority'    => 160,
				)
			);

			// == Brand Primary color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary' , array(
			    'default'   => '#8ac53f',
			    'transport' => 'refresh',
			) );

			// Control
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_primary', array(
				'label'      => __( 'Brand primary color', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary',
			) ) );

			// == Brand Seconday color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_seconday' , array(
			    'default'   => '#5c6ac4',
			    'transport' => 'refresh',
			) );

			// Control
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_seconday', array(
				'label'      => __( 'Brand seconday color', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_seconday',
			) ) );


		}

