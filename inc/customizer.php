<?php
/**
*		MYBOOKING THEME CUSTOMIZER
*  	--------------------------
*
*   Section: Mybooking layout settings
*
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


class MyBookingCustomizer {

		// Hold the class instance.
	  private static $instance = null;

	  // Holds the theme options
	  private $theme_options = null;

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
	  public function customize_register( $wp_customize ) {

			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

			// Register control type for Gallery
			$wp_customize->register_control_type( 'CustomizeGalleryControl' );

			// Customize sections
			$this->customize_layout_section( $wp_customize );
			$this->customize_typography_section( $wp_customize );
			$this->customize_colors_section( $wp_customize );
			$this->customize_home_section( $wp_customize );
			$this->customize_topbar_section( $wp_customize );
			$this->customize_navbar_section( $wp_customize );
			$this->customize_header_section( $wp_customize );
			$this->customize_footer_section( $wp_customize );

	  }

    /**
     * Preview JS
     */
	  public function customize_preview_js() {

			wp_enqueue_script(
				'mybooking_customizer',
				get_template_directory_uri() . '/js/customizer.js',
				array( 'customize-preview' ),
				'20130508',
				true
			);

	  }

    /**
     * Get theme options
     */
	  public function get_theme_options() {

	  	if ( $this->theme_options == null ) {
		  	$this->theme_options = array();

		  	// Global TopBar message
		  	$this->theme_options['mybooking_global_topbar_message'] = get_theme_mod( "mybooking_global_topbar_message" );

		  	// Testimonials
		  	$this->theme_options['mybooking_home_testimonial_carousel_visibility'] = get_theme_mod( 'mybooking_home_testimonial_carousel_visibility' );

		  	// Header
		  	$header_bg = get_theme_mod( 'mybooking_home_header_bg' );
		  	$this->theme_options['mybooking_home_header_bg'] = $header_bg;


		  	switch ( $header_bg ) {

		  		case '0':
				  	$header_image_bg = get_theme_mod( 'mybooking_home_header_image_bg' );
						if ( empty( $header_image_bg ) ) {
							$header_image_bg = get_template_directory_uri().'/images/bg-image.jpg';
						}
						$this->theme_options['mybooking_home_header_image_bg'] = $header_image_bg;
		  			break;

		  		case '1':
						$header_video_bg = get_theme_mod( 'mybooking_home_header_video_bg' );
						if ( empty( $header_video_bg ) ) {
							$header_video_bg = get_template_directory_uri().'/images/video-portada.m4v';
						} else {
							$header_video_bg = wp_get_attachment_url( $header_video_bg );
						}
						$this->theme_options['mybooking_home_header_video_bg'] = $header_video_bg;
		  		  break;

		  		case '2':
		  		  $header_carrousel_images = [];
		  		  $header_carrousel_bg = get_theme_mod( 'mybooking_home_header_carrousel_bg' );
		  		  if ( is_array( $header_carrousel_bg ) && !empty( $header_carrousel_bg ) ) {
	  		  		foreach ( $header_carrousel_bg as $carrousel_img ) {
	  		  			$img_src = wp_get_attachment_image_src( $carrousel_img, 'full' );
	  		  			if ( is_array($img_src) ) {
	  		  				$header_carrousel_images[] = $img_src[0];
	  		  			}
	  		  		}
		  		  }
		  		  $this->theme_options['mybooking_home_header_video_bg'] = $header_carrousel_images;
		  		  break;

		  	}
	  	}

	  	return $this->theme_options;

	  }

	  public function get_theme_option( $option ) {

	  	return $this->get_theme_options()[ $option ];

	  }

	  /**
	   * Enqueue -> css-properties as inline styles
	   */
    public function customize_enqueue() {

    	$typography_body = get_theme_mod( 'mybooking_font_body', 'default');
    	$typography_heading = get_theme_mod( 'mybooking_font_heading', 'default');

    	$brand_primary = get_theme_mod( 'mybooking_brand_primary', '#8ac53f' );
    	$brand_primary_light = get_theme_mod( 'mybooking_brand_primary_light', '#bef870' );
    	$brand_primary_dark = get_theme_mod( 'mybooking_brand_primary_dark', '#599400' );

    	$brand_secondary = get_theme_mod( 'mybooking_brand_secondary', '#424242' );
    	$brand_secondary_light = get_theme_mod( 'mybooking_brand_secondary_light', '#6d6d6d' );
    	$brand_secondary_dark = get_theme_mod( 'mybooking_brand_secondary_dark', '#1b1b1b' );

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

			// == Build the css-properties
		  $custom_css = ":root {";

		  // Typography
		  if ( !empty( $typography_body ) && $typography_body != 'default' ) {
		  	$custom_css.= "--font-family: '".$typography_body."';";
		  	$custom_css.= "--font-body: '".$typography_body."';";
		  	font_selector_enqueue_google_font($typography_body);
		  }

		  if ( !empty ( $typography_heading ) && $typography_heading != 'default' && $typography_heading != $typography_body  ) {
		  	$custom_css.= "--font-heading: '".$typography_heading."';";
		  	font_selector_enqueue_google_font($typography_heading);
		  }
		  else if ( !empty ( $typography_heading ) && $typography_heading != $typography_body ) {
		  	$custom_css.= "--font-heading: '".$typography_body."';";
		  }

		  // Brand primary & secondary
		  $custom_css.= "--brand-primary: ".$brand_primary.';';
		  $custom_css.= "--brand-primary-light: ".$brand_primary_light.';';
		  $custom_css.= "--brand-primary-dark: ".$brand_primary_dark.';';
		  $custom_css.= "--brand-secondary: ".$brand_secondary.';';
		  $custom_css.= "--brand-secondary-light: ".$brand_secondary_light.';';
		  $custom_css.= "--brand-secondary-dark: ".$brand_secondary_dark.';';

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

    // ----------------------- Customize Sections -----------------------------


    /**
     * Customize Layout
		 *
     */

    private function customize_layout_section( $wp_customize ) {

			// Theme layout settings.
			$wp_customize->add_section(
				'mybooking_theme_layout_options',
				array(
					'title'       => _x( 'Layout', 'customizer_layout', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Container width and sidebar defaults',
															 'customizer_layout', 'mybooking' ),
					'priority'    => 50,
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
		 *
     */

    private function customize_topbar_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_topbar_options',
				array(
					'title'       => _x( 'Top Bar', 'customizer_topbar', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Top Bar', 'customizer_topbar', 'mybooking' ),
					'priority'    => 51,
				)
			);

			// == TopBar active

			// Setting
			$wp_customize->add_setting( 'mybooking_global_topbar' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'mybooking_global_topbar',
			   array(
			      'label' => _x( 'Top Bar active', 'customizer_topbar', 'mybooking' ),
			      'description' => _x( 'If checked the TopBar will be shown on top of pages with company information and warning message. Uncheck to hide the TopBar', 'customizer_topbar', 'mybooking' ),
			      'section'  => 'mybooking_theme_topbar_options',
			      'priority' => 10, // Optional. Order priority to load the control. Default: 10
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			   )
			);

			// == TopBar Notification message

			$wp_customize->add_setting( 'mybooking_global_topbar_message',
			   array(
			      'default' => '',
			      'transport' => 'refresh'
			   )
			);

			$wp_customize->add_control( 'mybooking_global_topbar_message',
			   array(
			      'label' => _x( 'Hightlight message', 'customizer_topbar', 'mybooking' ),
			      'description' => esc_html_x( 'Show a warning message to the users', 'customizer_topbar', 'mybooking' ),
			      'section' => 'mybooking_theme_topbar_options',
			      'priority' => 10, // Optional. Order priority to load the control. Default: 10
			      'type' => 'textarea',
			      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			      'input_attrs' => array( // Optional.
			         'class' => 'my-custom-class',
			         'style' => 'border: 1px solid #999',
			         'placeholder' => _x( 'Highlight text or HTML on top of Topbar.', 'customizer_topbar', 'mybooking' ),
			      ),
			   )
			);

			// == Colors

			// Home background color

			// Setting
			$wp_customize->add_setting( 'mybooking_home_topbar_bg' , array(
			    'default'   => '#42424280',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'home_topbar_bg', array(
							'label'      => _x( 'Home TopBar background color', 'customizer_topbar', 'mybooking' ),
							'section'    => 'mybooking_theme_topbar_options',
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
						'label'      => _x( 'TopBar background color', 'customizer_topbar', 'mybooking' ),
						'section'    => 'mybooking_theme_topbar_options',
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
				'label'      => _x( 'TopBar color', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
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
				'label'      => _x( 'TopBar link color', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
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
				'label'      => _x( 'TopBar link hover color', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_link_hover_color',
			) ) );


    }


		/**
     * Customize Nav Bar
		 *
     */

    private function customize_navbar_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_navbar_options',
				array(
					'title'       => _x( 'Nav Bar', 'customizer_navbar', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Settings for toggler position, header integration and background and menu colors', 'customizer_navbar', 'mybooking' ),
					'priority'    => 52,
				)
			);

			// -- NavBar behaivour

			// Integration
			$wp_customize->add_setting( 'mybooking_home_navbar_integrated' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'mybooking_home_navbar_integrated',
			   array(
			      'label' => _x( 'Header integration', 'customizer_navbar', 'mybooking' ),
			      'description' => _x( 'If <b>checked</b> the navbar will be shown overlapped with header Section and transparent. Uncheck to be shown colored on top of Header section', 'customizer_home', 'mybooking' ),
			      'section'  => 'mybooking_theme_navbar_options',
			      'priority' => 10,
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

			// -- Mobile Toggler Position

			// Columns
			$wp_customize->add_setting( 'mybooking_global_navigation_layout',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
//			      'sanitize_callback' => 'skyrocket_radio_sanitization'
			   )
			);

			$wp_customize->add_control( 'mybooking_global_navigation_layout',
			   array(
			      'label' => _x( 'Mobile Toggler Position', 'customizer_navbar', 'mybooking' ),
			      'description' => esc_html_x( 'Toggler position on mobile devices', 'customizer_navbar', 'mybooking'  ),
			      'section' => 'mybooking_theme_navbar_options',
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Right', 'customizer_navbar', 'mybooking' ),
			         '1' => _x( 'Left', 'customizer_navbar', 'mybooking' )
			      )
			   )
			);

			// -- Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_bg' , array(
			    'default'   => '#8ac53f',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'navbar_bg', array(
						'label'      => _x( 'NavBar background color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar Link color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar Link hover color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar Link active color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar DropDown Item color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar DropDown Item Active color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar Link collapse color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
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
						'label'      => _x( 'NavBar Toggler Icon color', 'customizer_navbar', 'mybooking' ),
						'section'    => 'mybooking_theme_navbar_options',
						'settings'   => 'mybooking_navbar_toggler_icon'
			) ) );

		}


		/**
     * Customize Header
		 *
     */

    private function customize_header_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_header_options',
				array(
					'title'       => _x( 'Header', 'customizer_home', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Defines header\'s background type and widget\'s columns layout', 'customizer_home', 'mybooking' ),
					'priority'    => 53,
				)
			);

			// Background
			$wp_customize->add_setting( 'mybooking_home_header_bg',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
						// 'sanitize_callback' => 'skyrocket_radio_sanitization'
			   )
			);

			$wp_customize->add_control( 'mybooking_home_header_bg',
			   array(
			      'label' => _x( 'Header section background', 'customizer_home', 'mybooking' ),
			      'description' => esc_html_x( 'Define the header section background', 'customizer_home', 'mybooking'  ),
			      'section' => 'mybooking_theme_header_options',
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Background Image', 'customizer_home', 'mybooking' ),
			         '1' => _x( 'Video', 'customizer_home', 'mybooking' ),
			         '2' => _x( 'Carrousel', 'customizer_home', 'mybooking' )
			      )
			   )
			);

			// Background Image
	    $wp_customize->add_setting(
	        'mybooking_home_header_image_bg',
	        array(
	            'transport' => 'refresh'
	        )
	    );

	    $wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'mybooking_home_header_image',
	            array(
	                'label' => _x( 'Background Image', 'customizer_home', 'mybooking' ),
	                'section' => 'mybooking_theme_header_options',
	                'settings' => 'mybooking_home_header_image_bg'
	            )
	        )
	    );

	    // Background Video

	    $wp_customize->add_setting(
	        'mybooking_home_header_video_bg',
	        array(
	            'transport' => 'refresh'
	        )
	    );

	    $wp_customize->add_control(
	        new WP_Customize_Media_Control(
	            $wp_customize,
	            'mybooking_home_header_video',
	            array(
	                'label' => _x( 'Background Video', 'customizer_home', 'mybooking' ),
	                'section' => 'mybooking_theme_header_options',
	                'settings' => 'mybooking_home_header_video_bg',
	                'mime_type' => 'video'
	            )
	        )
	    );

	    // Background carrousel

			$wp_customize->add_setting( 'mybooking_home_header_carrousel_bg',
				  array(
			        'default' => array(),
			        'transport' => 'refresh',
			        'sanitize_callback' => 'wp_parse_id_list',
			    )
			);

			$wp_customize->add_control( new CustomizeGalleryControl(
			        $wp_customize,
			        'mybooking_home_header_carrouse_bgl',
			        array(
			            'label'    => _x( 'Background Carrousel', 'customizer_home', 'mybooking' ),
			            'section'  => 'mybooking_theme_header_options',
			            'settings' => 'mybooking_home_header_carrousel_bg',
			            'type'     => 'image_gallery',
			        )
			    ) );

			// Columns
			$wp_customize->add_setting( 'mybooking_home_header_layout',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
//			      'sanitize_callback' => 'skyrocket_radio_sanitization'
			   )
			);

			$wp_customize->add_control( 'mybooking_home_header_layout',
			   array(
			      'label' => _x( 'Layout', 'customizer_home', 'mybooking' ),
			      'description' => esc_html_x( 'Define the widget areas on header layout', 'customizer_home', 'mybooking'  ),
			      'section' => 'mybooking_theme_header_options',
			      'priority' => 20,
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Two columns (50% - 50%)', 'customizer_home', 'mybooking' ),
			         '1' => _x( 'Two columns (33% - 66%)', 'customizer_home', 'mybooking' ),
			         '2' => _x( 'Two columns (66% - 33%)', 'customizer_home', 'mybooking' ),
			         '3' => _x( 'One column', 'customizer_home', 'mybooking' ),

			      )
			   )
			);

    }


		/**
     * Customize Home Sections
		 *
     */

    private function customize_home_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_home_options',
				array(
					'title'       => _x( 'Home Sections', 'customizer_home', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Activate or deactivate Home Template sections', 'customizer_home', 'mybooking' ),
					'priority'    => 54,
				)
			);

			// == News visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_news_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'mybooking_home_news_visibility',
			   array(
			      'label' => _x( 'Activate news', 'customizer_home', 'mybooking' ),
			      'description' => _x( 'Show last three posts on Home Page', 'customizer_topbar', 'mybooking' ),
			      'section'  => 'mybooking_theme_home_options',
			      'priority' => 30, // Optional. Order priority to load the control. Default: 10
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			   )
			);

			// == Testimonials visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_testimonial_carousel_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'mybooking_home_testimonial_carousel_visibility',
			   array(
			      'label' => _x( 'Activate testimonials', 'customizer_home', 'mybooking' ),
			      'description' => _x( 'Show testimonials in home page (it also activates the content type)', 'customizer_topbar', 'mybooking' ),
			      'section'  => 'mybooking_theme_home_options',
			      'priority' => 30, // Optional. Order priority to load the control. Default: 10
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			   )
			);

    }


		/**
     * Customize Footer
		 *
     */

    private function customize_footer_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_footer_options',
				array(
					'title'       => _x( 'Footer', 'customizer_footer', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Footer', 'customizer_footer', 'mybooking' ),
					'priority'    => 55,
				)
			);

			// Mobile Toggler Position

			// Columns
			$wp_customize->add_setting( 'mybooking_global_footer_layout',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
						// 'sanitize_callback' => 'skyrocket_radio_sanitization'
			   )
			);

			$wp_customize->add_control( 'mybooking_global_footer_layout',
			   array(
			      'label' => _x( 'Footer layout', 'customizer_footer', 'mybooking' ),
			      'description' => esc_html_x( 'Footer layout (managed with widget areas)', 'customizer_footer', 'mybooking'  ),
			      'section' => 'mybooking_theme_footer_options',
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Four columns', 'customizer_footer', 'mybooking' ),
			         '1' => _x( 'Minimal (show only copyright)', 'customizer_footer', 'mybooking' )
			      )
			   )
			);

		}


		/**
     * Customize Typography
		 *
     */

    private function customize_typography_section( $wp_customize ) {

			// Theme layout settings.
			$wp_customize->add_section(
				'mybooking_theme_typography_options',
				array(
					'title'       => _x( 'Typography', 'customizer_typography', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Typography defaults',
															 'customizer_typography', 'mybooking' ),
					'priority'    => 56,
				)
			);

			// == Font body

 			if ( class_exists( 'Font_Selector' ) ) {

				$wp_customize->add_setting( 'mybooking_font_body',
	          array(
	          	'transport' => 'refresh',
	            'type' => 'theme_mod'
	          )
	      );

	      $wp_customize->add_control(
	          new Font_Selector(
	              $wp_customize, 'mybooking_font_body', array(
	                  'label'             => esc_html_x( 'Font Body family', 'customizer_typography', 'mybooking' ),
	                  'description'       => _x('Select the body typography', 'customizer_typography', 'mybooking'),
	                  'section'           => 'mybooking_theme_typography_options',
	                  'priority'          => 20,
	                  'type'              => 'select',
	              )
	          )
	   	  );

				$wp_customize->add_setting( 'mybooking_font_heading',
	          array(
	          	'transport' => 'refresh',
	            'type' => 'theme_mod'
	          )
	      );

	      $wp_customize->add_control(
	          new Font_Selector(
	              $wp_customize, 'mybooking_font_heading', array(
	                  'label'             => esc_html_x( 'Font Heading family', 'customizer_typography', 'mybooking' ),
	                  'description'       => _x('Select the heading typography', 'customizer_typography', 'mybooking'),
	                  'section'           => 'mybooking_theme_typography_options',
	                  'priority'          => 20,
	                  'type'              => 'select',
	              )
	          )
	   	  );

    	}


		}


    /**
     * Customize Colors
		 *
     */

    private function customize_colors_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_colors_options',
				array(
					'title'       => _x( 'Colors', 'customizer_colors', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Theme colors', 'customizer_colors', 'mybooking' ),
					'priority'    => 57,
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


			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary_light' , array(
			    'default'   => '#bef870',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary_light', array(
				'label'      => _x( 'Brand primary light color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary_light',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary_dark' , array(
			    'default'   => '#599400',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary_dark', array(
				'label'      => _x( 'Brand primary dark color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary_dark',
			) ) );



			// == Brand Seconday color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary' , array(
			    'default'   => '#5c6ac4',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_seconday', array(
				'label'      => _x( 'Brand secondary color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary_light' , array(
			    'default'   => '#8f98f7',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_light', array(
				'label'      => _x( 'Brand secondary light color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary_light',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary_dark' , array(
			    'default'   => '#254093',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_dark', array(
				'label'      => _x( 'Brand secondary dark color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary_dark',
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
require_once('customizer/class-font-selector.php');
require_once('customizer/gallery-control.php');
MyBookingCustomizer::getInstance();
