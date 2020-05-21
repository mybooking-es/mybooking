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


class MyBookingCustomizer {

		// Hold the class instance.
	  private static $instance = null;

	  // The constructor is private
	  // to prevent initiation with outer code.
	  private function __construct()
	  {
	  	$this->register();
	  	$this->setup();
	  }

	  // The object is created from within the class itself
	  // only if the class has no instance.
	  public static function getInstance()
	  {
	    if (self::$instance == null)
	    {
	      self::$instance = new MyBookingCustomizer();
	    }
	 
	    return self::$instance;
	  }  	

    // ---------------------------------------------------------------

    /**
     * Register the customizer
     */
	  private function register() {

			add_action( 'customize_register', array( $this, 'customize_register' ) );

	  }

    /**
     * Setup the customizer
     */
	  private function setup() {

	  	// Preview JS
			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );

	  	// Enqueue css-properties customization
			add_action( 'wp_enqueue_scripts', array( $this, 'customize_enqueue') );

	  }

    // ---------------------------------------------------------------

	  /**
	   * Register the customizer
	   */
	  function customize_register( $wp_customize ) {

			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			//$wp_customize->register_control_type( 'ColorAlpha' );

			$this->customize_layout_section( $wp_customize );
			$this->customize_colors_section( $wp_customize );
			$this->customize_topbar_section( $wp_customize );

	  }

    /**
     * Preview JS
     */
	  function customize_preview_js() {

			wp_enqueue_script(
				'mybooking_customizer',
				get_template_directory_uri() . '/js/customizer.js',
				array( 'customize-preview' ),
				'20130508',
				true
			);

	  }

	  /**
	   * Enqueue -> css-properties as inline styles
	   */
    function customize_enqueue() {

    	$brand_primary = get_theme_mod( 'mybooking_brand_primary', '#8ac53f' );
    	$brand_secondary = get_theme_mod( 'mybooking_brand_secondary', '#5c6ac4' );

    	$body_bg = get_theme_mod( 'mybooking_body_bg', '#ffffff' );
    	$body_color = get_theme_mod( 'mybooking_body_color', '#212121' );    	

    	$home_topbar_bg = get_theme_mod( 'mybooking_home_topbar_bg', '#42424280' );
    	$topbar_bg = get_theme_mod( 'mybooking_topbar_bg', '#212121' );    	
    	$topbar_color = get_theme_mod( 'mybooking_topbar_color', '#ffffff' );
    	$topbar_link_color = get_theme_mod( 'mybooking_topbar_link_color', '#ffffff' );    	
    	$topbar_link_hover_color = get_theme_mod( 'mybooking_topbar_link_hover_color', '#fafafa' );

    	$navbar_bg = get_theme_mod( 'mybooking_navbar_bg', '#8ac53f');
    	$navbar_link_color = get_theme_mod( 'mybooking_navbar_link_color', '#ffffff' );
    	$navbar_link_color_hover = get_theme_mod( 'mybooking_navbar_link_hover_color', '#ffffff' ); 
    	$navbar_link_active = get_theme_mod( 'mybooking_navbar_link_active', '#212121' ); 
    	$navbar_dropdown_item_color = get_theme_mod( 'mybooking_navbar_dropdown_item_color', '#212121' );
    	$navbar_dropdown_item_active_color = get_theme_mod( 'mybooking_navbar_dropdown_item_active_color', '#5c6ac4' ); 
    	$navbar_link_collapse = get_theme_mod( 'mybooking_navbar_link_collapse', '#212121' );
    	$navbar_toggler_icon = get_theme_mod( 'mybooking_navbar_toggler_icon', '#ffffff' ); 

			// ==Build the css-properties
		  $custom_css = ":root {";

		  // Brand primary & secondary
		  $custom_css.= "--brand-primary: ".$brand_primary.';';
		  $custom_css.= "--brand-seconday: ".$brand_secondary.';';
		  
		  // Body
		  $custom_css.= "--body-bg: ".$body_bg.';';
		  $custom_css.= "--body-color: ".$body_color.';';

		  // Top bar
		  $custom_css.= "--home-topbar-bg: ".$home_topbar_bg.';';
		  $custom_css.= "--topbar-bg: ".$topbar_bg.';';
		  $custom_css.= "--topbar-color: ".$topbar_color.';';
		  $custom_css.= "--topbar-link-color: ".$topbar_link_color.';';
		  $custom_css.= "--topbar-link-color-hover: ".$topbar_link_hover_color.';';

		  // NavBar
    	$custom_css.= "--navbar-bg: ".$navbar_bg.';';
    	$custom_css.= "--navbar-link-color: ".$navbar_link_color.';';
    	$custom_css.= "--navbar-link-color-hover: ".$navbar_link_color_hover.';';
    	$custom_css.= "--navbar-link-active: ".$navbar_link_active.';';
    	$custom_css.= "--navbar-dropdown-item-color: ".$navbar_dropdown_item_color.';';
    	$custom_css.= "--navbar-dropdown-item-active-bg: ".$navbar_dropdown_item_active_color.';'; 
    	$custom_css.= "--navbar-link-collapse: ".$navbar_link_collapse.';';
    	$custom_css.= "--toggler-icon-color: ".$navbar_toggler_icon.';';
		  $custom_css.= "}";
				
			wp_register_style( 'mybooking_customizer', false );
			wp_enqueue_style( 'mybooking_customizer' );
			wp_add_inline_style( 'mybooking_customizer', $custom_css );

    }

    /**
     * Customize layout
     */
    private function customize_layout_section( $wp_customize ) {

			// Theme layout settings.
			$wp_customize->add_section(
				'mybooking_theme_layout_options',
				array(
					'title'       => _x( 'Layout Settings', 'customizer_layout', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Container width and sidebar defaults', 
															 'customizer_layout', 'mybooking' ),
					'priority'    => 150,
				)
			);

			// Container type

			$wp_customize->add_setting(
				'mybooking_container_type',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => array( $this, 'slug_sanitize_select'),
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mybooking_container_type',
					array(
						'label'       => _x( 'Container Width', 'customizer_layout', 'mybooking' ),
						'description' => _x( 'Choose between Bootstrap\'s container and container-fluid', 
																 'customizer_layout',	
																 'mybooking' ),
						'section'     => 'mybooking_theme_layout_options',
						'settings'    => 'mybooking_container_type',
						'type'        => 'select',
						'choices'     => array(
							'container'       => _x( 'Fixed width container', 'customizer_layout', 'mybooking' ),
							'container-fluid' => _x( 'Full width container', 'customizer_layout', 'mybooking' ),
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
						'label'             => _x( 'Sidebar Positioning', 'customizer', 'mybooking' ),
						'description'       => _x(
							'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
							'customizer',
							'mybooking'
						),
						'section'           => 'mybooking_theme_layout_options',
						'settings'          => 'mybooking_sidebar_position',
						'type'              => 'select',
						'sanitize_callback' => array( $this, 'slug_sanitize_select'),
						'choices'           => array(
							'right' => _x( 'Right sidebar', 'customizer_layout', 'mybooking' ),
							'left'  => _x( 'Left sidebar', 'customizer_layout', 'mybooking' ),
							'both'  => _x( 'Left & Right sidebars', 'customizer_layout', 'mybooking' ),
							'none'  => _x( 'No sidebar', 'customizer_layout', 'mybooking' ),
						),
						'priority' => '20',
					)
				)
			);

    }

		/**
     * Customize Top Bar
     */
    private function customize_topbar_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_topbar_options',
				array(
					'title'       => _x( 'Top Bar', 'customizer_topbar', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Theme colors', 'customizer_topbar', 'mybooking' ),
					'priority'    => 151,
				)
			);

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_active' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'mybooking_topbar_active',
			   array(
			      'label' => _x( 'Top Bar active', 'customizer_topbar', 'mybooking' ),
			      'description' => _x( 'Top Bar active', 'customizer_topbar', 'mybooking' ),
			      'section'  => 'mybooking_theme_topbar_options',
			      'priority' => 10, // Optional. Order priority to load the control. Default: 10
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			   )
			);


    }

    /**
     * Customize colors
     */
    private function customize_colors_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_colors_options',
				array(
					'title'       => _x( 'Colors', 'customizer_colors', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Theme colors', 'customizer_colors', 'mybooking' ),
					'priority'    => 152,
				)
			);

			// == Brand Primary color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary' , array(
			    'default'   => '#8ac53f',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary', array(
				'label'      => _x( 'Brand primary color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary',
			) ) );

			// == Brand Seconday color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary' , array(
			    'default'   => '#5c6ac4',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_seconday', array(
				'label'      => _x( 'Brand seconday color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary',
			) ) );

			// == Body background

			// Setting
			$wp_customize->add_setting( 'mybooking_body_bg' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'body_bg', array(
				'label'      => _x( 'Body background color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_body_bg',
			) ) );

			// == Body color

			// Setting
			$wp_customize->add_setting( 'mybooking_body_color' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'body_color', array(
				'label'      => _x( 'Body body color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_body_color',
			) ) );

			// == TopBar

			// Home background color

			// Setting
			$wp_customize->add_setting( 'mybooking_home_topbar_bg' , array(
			    'default'   => '#42424280',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'home_topbar_bg', array(
							'label'      => _x( 'Home TopBar background color', 'customizer_colors', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_home_topbar_bg'
			) ) );

			// -- Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_bg' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'topbar_bg', array(
						'label'      => _x( 'TopBar background color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_topbar_bg'
			) ) );

			// -- Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_color' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar_color', array(
				'label'      => _x( 'TopBar color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_topbar_color',
			) ) );

			// -- Link Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_link_color' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar_link_color', array(
				'label'      => _x( 'TopBar link color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_topbar_link_color',
			) ) );

			// -- Link Hover

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_link_hover_color' , array(
			    'default'   => '#fafafa',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar_link_hover_color', array(
				'label'      => _x( 'TopBar link hover color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_topbar_link_hover_color',
			) ) );

			// == NavBar

			// -- Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_bg' , array(
			    'default'   => '#8ac53f',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_bg', array(
						'label'      => _x( 'NavBar background color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_bg'
			) ) );


			// -- Link color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_link_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_link_color', array(
						'label'      => _x( 'NavBar Link color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_link_color'
			) ) );

			// -- Link hover color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_link_hover_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_link_hover_color', array(
						'label'      => _x( 'NavBar Link hover color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_link_hover_color'
			) ) );

			// -- Link active color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_link_active' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_link_active_color', array(
						'label'      => _x( 'NavBar Link active color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_link_active'
			) ) );


			// -- Drop Down Item Color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_dropdown_item_color' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_dropdown_item_color', array(
						'label'      => _x( 'NavBar DropDown Item color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_dropdown_item_color'
			) ) );

			// -- Drop Down Item Active Color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_dropdown_item_active_color' , array(
			    'default'   => '#5c6ac4',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_dropdown_item_active_color', array(
						'label'      => _x( 'NavBar DropDown Item Active color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_dropdown_item_active_color'
			) ) );

			// -- Link collapse color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_link_collapse' , array(
			    'default'   => '#212121',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_link_collapse', array(
						'label'      => _x( 'NavBar Link collapse color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_link_collapse'
			) ) );

			// --Toggler icon color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_toggler_icon' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( 
					$wp_customize, 'navbar_toggler_icon', array(
						'label'      => _x( 'NavBar Toggler Icon color', 'customizer_colors', 'mybooking' ),
						'section'    => 'mybooking_theme_colors_options',
						'settings'   => 'mybooking_navbar_toggler_icon'
			) ) );


    }

    // -----------


		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

}

require_once('customizer/alpha-color-picker.php');
MyBookingCustomizer::getInstance();


