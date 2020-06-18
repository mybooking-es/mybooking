<?php
/**
*		MYBOOKING THEME CUSTOMIZER
*  	--------------------------
*
*   Section: Mybooking layout settings
*
*
* 	Versión: 0.0.6
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

			// Customizer JS
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_js' ));			

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

			// Register panel
			$this->mybooking_settings_panel( $wp_customize );

			// Customize sections
			$this->customize_layout_section( $wp_customize );
			$this->customize_typography_section( $wp_customize );
			$this->customize_colors_section( $wp_customize );
			$this->customize_home_section( $wp_customize );
			$this->customize_topbar_section( $wp_customize );
			$this->customize_navbar_section( $wp_customize );
			$this->customize_header_section( $wp_customize );
			$this->customize_footer_section( $wp_customize );
			$this->customize_selector_section( $wp_customize );
			$this->customize_identity_section( $wp_customize );

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
     * JS
     */
	  public function customize_js() {

			wp_enqueue_script(
				'mybooking_customizer',
				get_template_directory_uri() . '/js/customizer-controls.js',
				array( 'jquery' ),
				'20130508',
				true
			);

	  }


	  /**
	   * Enqueue -> css-properties as inline styles
	   */
    public function customize_enqueue() {

    	$typography_body = get_theme_mod( 'mybooking_font_body', 'default');
    	$typography_heading = get_theme_mod( 'mybooking_font_heading', 'default');

    	$brand_primary = get_theme_mod( 'mybooking_brand_primary', '#2193F2' );
    	$brand_primary_light = get_theme_mod( 'mybooking_brand_primary_light', '#6EC3FF' );
    	$brand_primary_dark = get_theme_mod( 'mybooking_brand_primary_dark', '#0066BF' );

    	$brand_secondary = get_theme_mod( 'mybooking_brand_secondary', '#424242' );
    	$brand_secondary_light = get_theme_mod( 'mybooking_brand_secondary_light', '#6D6D6D' );
    	$brand_secondary_dark = get_theme_mod( 'mybooking_brand_secondary_dark', '#1B1B1B' );

    	$body_bg = get_theme_mod( 'mybooking_body_bg', '#FFFFFF' );
    	$body_color = get_theme_mod( 'mybooking_body_color', '#212121' );

			$options_advanced_mode = get_theme_mod( 'mybooking_colors_advanced', '0' );
      if ( $options_advanced_mode == '1' ) {

	    	$home_topbar_bg = get_theme_mod( 'mybooking_home_topbar_bg', '#42424280' );
	    	$topbar_bg = get_theme_mod( 'mybooking_topbar_bg', '#212121' );
	    	$topbar_color = get_theme_mod( 'mybooking_topbar_color', '#FFFFFF' );
	    	$topbar_link_color = get_theme_mod( 'mybooking_topbar_link_color', '#FAFAFA' );
	    	$topbar_link_hover_color = get_theme_mod( 'mybooking_topbar_link_hover_color', '#FAFAFA' );
				$topbar_message_bg = get_theme_mod( 'mybooking_topbar_message_bg', '#1B1B1B' );
				$topbar_message_text = get_theme_mod( 'mybooking_topbar_message_text', '#FFFFFF' );
				$topbar_message_link = get_theme_mod( 'mybooking_topbar_message_link', '#FAFAFA' );
				$topbar_message_hover = get_theme_mod( 'mybooking_topbar_message_link_hover', '#FAFAFA' );

	    	$navbar_bg = get_theme_mod( 'mybooking_navbar_bg', '#2193F2');
	    	$navbar_link_color = get_theme_mod( 'mybooking_navbar_link_color', '#FFFFFF' );
	    	$navbar_link_color_hover = get_theme_mod( 'mybooking_navbar_link_hover_color', '#FFFFFF' );
	    	$navbar_link_active = get_theme_mod( 'mybooking_navbar_link_active', '#212121' );
	    	$navbar_dropdown_item_color = get_theme_mod( 'mybooking_navbar_dropdown_item_color', '#212121' );
	    	$navbar_dropdown_item_active_color = get_theme_mod( 'mybooking_navbar_dropdown_item_active_color', '#424242' );
	    	$navbar_link_collapse = get_theme_mod( 'mybooking_navbar_link_collapse', '#212121' );
	    	$navbar_toggler_icon = get_theme_mod( 'mybooking_navbar_toggler_icon', '#FFFFFF' );

				$header_widget_title_color = get_theme_mod( 'mybooking_header_widget_title_color', '#FFFFFF' );
				$header_widget_title_align = get_theme_mod( 'mybooking_header_widget_title_align', 'left' );
				$header_widget_text_color = get_theme_mod( 'mybooking_header_widget_text_color', '#FFFFFF' );
				$header_widget_text_align = get_theme_mod( 'mybooking_header_widget_text_align', 'left' );
				$header_widget_link_color = get_theme_mod( 'mybooking_header_widget_link_color', '#FFFFFF' );

				$home_selector_background = get_theme_mod( 'mybooking_home_selector_background', '#FFFFFF50' );
				$home_selector_labels = get_theme_mod( 'mybooking_home_selector_labels', '#212121' );
				$sticky_selector_background = get_theme_mod( 'mybooking_sticky_selector_background', '#2193F2' );
				$sticky_selector_labels = get_theme_mod( 'mybooking_sticky_selector_labels', '#212121' );

				$footer_bg = get_theme_mod( 'mybooking_footer_bg', '#424242' );
				$footer_link_color = get_theme_mod( 'footer_link_color', '#2193F2' );
				$footer_link_hover_color = get_theme_mod( 'footer_link_hover_color', '#FFFFFF' );

				$logo_height = get_theme_mod( 'mybooking_logo_height', '40px' );

			}

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

			if ( $options_advanced_mode == '1' ) {
			  // Top bar
			  $custom_css.= "--home-topbar-bg: ".$home_topbar_bg.';';
			  $custom_css.= "--topbar-bg: ".$topbar_bg.';';
			  $custom_css.= "--topbar-color: ".$topbar_color.';';
			  $custom_css.= "--topbar-link-color: ".$topbar_link_color.';';
			  $custom_css.= "--topbar-link-color-hover: ".$topbar_link_hover_color.';';
				$custom_css.= "--topbar-message-bg: ".$topbar_message_bg.';';
			  $custom_css.= "--topbar-message-text: ".$topbar_message_text.';';
			  $custom_css.= "--topbar-message-link: ".$topbar_message_link.';';
			  $custom_css.= "--topbar-message-link-hover: ".$topbar_message_hover.';';

			  // NavBar
	    	$custom_css.= "--navbar-bg: ".$navbar_bg.';';
	    	$custom_css.= "--navbar-link-color: ".$navbar_link_color.';';
	    	$custom_css.= "--navbar-link-color-hover: ".$navbar_link_color_hover.';';
	    	$custom_css.= "--navbar-link-active: ".$navbar_link_active.';';
	    	$custom_css.= "--navbar-dropdown-item-color: ".$navbar_dropdown_item_color.';';
	    	$custom_css.= "--navbar-dropdown-item-active-bg: ".$navbar_dropdown_item_active_color.';';
	    	$custom_css.= "--navbar-link-collapse: ".$navbar_link_collapse.';';
	    	$custom_css.= "--toggler-icon-color: ".$navbar_toggler_icon.';';

				// Header
				$custom_css.= "--home-header-widget-title: ".$header_widget_title_color.';';
				$custom_css.= "--home-header-widget-title-align: ".$header_widget_title_align.';';
				$custom_css.= "--home-header-widget-text: ".$header_widget_text_color.';';
				$custom_css.= "--home-header-widget-text-align: ".$header_widget_text_align.';';
				$custom_css.= "--home-header-widget-link: ".$header_widget_link_color.';';

				// Selector
				$custom_css.= "--home-selector-bg: ".$home_selector_background.';';
				$custom_css.= "--selector-label-color: ".$home_selector_labels.';';
				$custom_css.= "--selector-sticky-bg: ".$sticky_selector_background.';';
				$custom_css.= "--selector-sticky-labels-color: ".$sticky_selector_labels.';';

				// Footer
				$custom_css.= "--footer-bg: ".$footer_bg.';';
				$custom_css.= "--footer-color-link: ".$footer_link_color.';';
				$custom_css.= "--footer-color-link-hover: ".$footer_link_hover_color.';';

				// Identity
				$custom_css.= "--custom-logo-height: ".$logo_height.';';
			}

		  $custom_css.= "}";

			wp_register_style( 'mybooking_customizer', false );
			wp_enqueue_style( 'mybooking_customizer' );
			wp_add_inline_style( 'mybooking_customizer', $custom_css );

    }

    // ----------------------- Theme options ----------------------------------

    /**
     * Get theme options
     */
	  public function get_theme_options() {

	  	if ( $this->theme_options == null ) {
		  	$this->theme_options = array();

		  	// Global Topbar Message
		  	$this->theme_options['mybooking_global_topbar_message'] = get_theme_mod( "mybooking_global_topbar_message" );

		  	// Testimonials
		  	$this->theme_options['mybooking_home_testimonial_carousel_visibility'] = get_theme_mod( 'mybooking_home_testimonial_carousel_visibility' );

				// Home Content Widgets
				$this->theme_options['mybooking_home_content_widgets_visibility'] = get_theme_mod( 'mybooking_home_content_widgets_visibility' );

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

    // ----------------------- Customize Sections -----------------------------

		private function mybooking_settings_panel( $wp_customize ) {

			$wp_customize->add_panel( 'mybooking_settings_panel',
			   array(
			      'title' => __( 'Mybooking Theme' ),
			      'description' => esc_html__( 'Customise your installation of Mybooking', 'customizer_panel', 'mybooking' ),
			      'priority' => 10,
			   )
			);
		}


    /**
     * 	Customize Colors
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
					'priority'    => 50,
					'panel'				=> 'mybooking_settings_panel',
				)
			);

			// == Brand Primary color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary' , array(
			    'default'   => '#2193F2',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary', array(
				'label'      => _x( 'Brand Primary color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary',
			) ) );


			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary_light' , array(
			    'default'   => '#6EC3FF',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary_light', array(
				'label'      => _x( 'Brand Primary light color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary_light',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_primary_dark' , array(
			    'default'   => '#0066BF',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_primary_dark', array(
				'label'      => _x( 'Brand Primary dark color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_primary_dark',
			) ) );



			// == Brand Seconday color

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary' , array(
			    'default'   => '#424242',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_seconday', array(
				'label'      => _x( 'Brand Secondary color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary_light' , array(
			    'default'   => '#6D6D6D',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_light', array(
				'label'      => _x( 'Brand Secondary light color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_brand_secondary_light',
			) ) );

			// Setting
			$wp_customize->add_setting( 'mybooking_brand_secondary_dark' , array(
			    'default'   => '#1B1B1B',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_dark', array(
				'label'      => _x( 'Brand Secondary dark color', 'customizer_colors', 'mybooking' ),
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
				'label'      => _x( 'Body Background color', 'customizer_colors', 'mybooking' ),
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
				'label'      => _x( 'Body Text color', 'customizer_colors', 'mybooking' ),
				'section'    => 'mybooking_theme_colors_options',
				'settings'   => 'mybooking_body_color',
			) ) );

			// == Advanced Mode

			// Activation
			$wp_customize->add_setting( 'mybooking_colors_advanced' , array(
			    'default'   => '0',
			    'transport' => 'refresh',
			    'sanitize_callback' => array( $this, 'slug_sanitize_checkbox')
			) );

			$wp_customize->add_control( 'mybooking_colors_advanced',
			   array(
			      'label' => _x( 'Activate advanced color mode', 'customizer_colors', 'mybooking' ),
			      'description' => _x( 'If <b>checked</b> activates advanced color controls on several Customizer sections. Uncheck for basic color control (default).', 'customizer_colors', 'mybooking' ),
			      'section'  => 'mybooking_theme_colors_options',
			      'priority' => 10,
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

    }


		/**
     * 	Customize Typography
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
					'priority'    => 51,
					'panel'				=> 'mybooking_settings_panel',
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
     * 	Customize Layout
		 *
     */

    private function customize_layout_section( $wp_customize ) {

			// Theme layout section
			$wp_customize->add_section(
				'mybooking_theme_layout_options',
				array(
					'title'       => _x( 'Layout', 'customizer_layout', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Container width and sidebar defaults',
															 'customizer_layout', 'mybooking' ),
					'priority'    => 52,
					'panel'				=> 'mybooking_settings_panel',
				)
			);

			// == Container type

			// Setting
			$wp_customize->add_setting(
				'mybooking_container_type',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => array( $this, 'slug_sanitize_select'),
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
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
     * 	Customize Top Bar
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
					'priority'    => 53,
					'panel'				=> 'mybooking_settings_panel',
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

			// Topbar Advanced Settings

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
							'label'      => _x( 'Home Topbar Background', 'customizer_topbar', 'mybooking' ),
							'description'=> _x( 'This setting affects ONLY the home page topbar. You can set transparency for better integration when navbar\'s Transparent Header option is checked.', 'customizer_topbar', 'mybooking' ),
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
						'label'      => _x( 'Topbar Background', 'customizer_topbar', 'mybooking' ),
						'section'    => 'mybooking_theme_topbar_options',
						'settings'   => 'mybooking_topbar_bg'
			) ) );

			// -- Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_color' , array(
			    'default'   => '#FFFFFF',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar_color', array(
				'label'      => _x( 'Topbar Text', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_color',
			) ) );

			// -- Link Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_link_color' , array(
			    'default'   => '#FAFAFA',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar_link_color', array(
				'label'      => _x( 'Topbar Link', 'customizer_topbar', 'mybooking' ),
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
				'label'      => _x( 'Topbar Link Hover', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_link_hover_color',
			) ) );

			// == TopBar Notification message

			$wp_customize->add_setting( 'mybooking_global_topbar_message',
				 array(
						'default' => '',
						'transport' => 'postMessage'
				 )
			);

			$wp_customize->add_control( 'mybooking_global_topbar_message',
				 array(
						'label' => _x( 'Hightlight message', 'customizer_topbar', 'mybooking' ),
						'description' => esc_html_x( 'Show a warning message to the users', 'customizer_topbar', 'mybooking' ),
						'section' => 'mybooking_theme_topbar_options',
						'priority' => 10,
						'type' => 'textarea',
						'capability' => 'edit_theme_options',
						'input_attrs' => array(
							 'class' => 'mybooking-customizer-textarea',
							 'style' => 'border: 1px solid #999',
							 'placeholder' => _x( 'Highlight text or HTML on top of Topbar.', 'customizer_topbar', 'mybooking' ),
						),
				 )
			);


			// Notification Message Advanced Settings

			// -- Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_message_bg' , array(
					'default'   => '#212121',
					'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'topbar__message_bg', array(
						'label'      => _x( 'Notice Background', 'customizer_topbar', 'mybooking' ),
						'section'    => 'mybooking_theme_topbar_options',
						'settings'   => 'mybooking_topbar_message_bg'
			) ) );

			// -- Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_message_text' , array(
					'default'   => '#FFFFFF',
					'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar__message_text', array(
				'label'      => _x( 'Notice Text', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_message_text',
			) ) );

			// -- Link Color

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_message_link' , array(
					'default'   => '#FAFAFA',
					'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar__message_link', array(
				'label'      => _x( 'Notice Link', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_message_link',
			) ) );

			// -- Link Hover

			// Setting
			$wp_customize->add_setting( 'mybooking_topbar_message_link_hover' , array(
					'default'   => '#FAFAFA',
					'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'topbar__message_link_hover', array(
				'label'      => _x( 'Notice Link Hover', 'customizer_topbar', 'mybooking' ),
				'section'    => 'mybooking_theme_topbar_options',
				'settings'   => 'mybooking_topbar_message_link_hover',
			) ) );


    }


		/**
     * 	Customize Nav Bar
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
					'priority'    => 54,
					'panel'				=> 'mybooking_settings_panel',
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
			      'label' => _x( 'Transparent Header', 'customizer_navbar', 'mybooking' ),
			      'description' => _x( 'If <b>checked</b> the navbar will be shown overlapped with Header section and transparent background. Uncheck to be shown solid color navbar on top of Header section', 'customizer_navbar', 'mybooking' ),
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

			// Advance mode settings

			// -- Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_navbar_bg' , array(
			    'default'   => '#2193F2',
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
			    'default'   => '#424242',
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
     * 	Customize Header
		 *
     */

    private function customize_header_section( $wp_customize ) {

			// Section
			$wp_customize->add_section(
				'mybooking_theme_header_options',
				array(
					'title'       => _x( 'Header', 'customizer_home', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Defines header\'s background type and widget\'s columns layout', 'customizer_header', 'mybooking' ),
					'priority'    => 55,
					'active_callback' => 'is_front_page',
					'panel'				=> 'mybooking_settings_panel',
				)
			);

			// --Visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_header_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( 'mybooking_home_header_visibility',
			   array(
			      'label' => _x( 'Home Header visible', 'customizer_header', 'mybooking' ),

			      'section'  => 'mybooking_theme_header_options',
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

			// == Background

			$wp_customize->add_setting( 'mybooking_home_header_bg',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
			   )
			);

			$wp_customize->add_control( 'mybooking_home_header_bg',
			   array(
			      'label' => _x( 'Header section background', 'customizer_header', 'mybooking' ),
			      'description' => esc_html_x( 'Define the header section background', 'customizer_header', 'mybooking'  ),
			      'section' => 'mybooking_theme_header_options',
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Background Image', 'customizer_header', 'mybooking' ),
			         '1' => _x( 'Video', 'customizer_header', 'mybooking' ),
			         '2' => _x( 'Carrousel', 'customizer_header', 'mybooking' )
			      )
			   )
			);

			// --Background Image

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
	                'label' => _x( 'Background Image', 'customizer_header', 'mybooking' ),
	                'section' => 'mybooking_theme_header_options',
	                'settings' => 'mybooking_home_header_image_bg'
	            )
	        )
	    );

	    // --Background Video

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
	                'label' => _x( 'Background Video', 'customizer_header', 'mybooking' ),
	                'section' => 'mybooking_theme_header_options',
	                'settings' => 'mybooking_home_header_video_bg',
	                'mime_type' => 'video'
	            )
	        )
	    );

	    // --Background carrousel

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
			            'label'    => _x( 'Background Carrousel', 'customizer_header', 'mybooking' ),
			            'section'  => 'mybooking_theme_header_options',
			            'settings' => 'mybooking_home_header_carrousel_bg',
			            'type'     => 'image_gallery',
			        )
			    ) );

			// --Header Columns

			$wp_customize->add_setting( 'mybooking_home_header_layout',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
			   )
			);

			$wp_customize->add_control( 'mybooking_home_header_layout',
			   array(
			      'label' => _x( 'Layout', 'customizer_header', 'mybooking' ),
			      'description' => esc_html_x( 'Define the widget areas on header layout', 'customizer_header', 'mybooking'  ),
			      'section' => 'mybooking_theme_header_options',
			      'type' => 'radio',
			      'capability' => 'edit_theme_options',
			      'choices' => array(
			         '0' => _x( 'Two columns (50% - 50%)', 'customizer_header', 'mybooking' ),
			         '1' => _x( 'Two columns (33% - 66%)', 'customizer_header', 'mybooking' ),
			         '2' => _x( 'Two columns (66% - 33%)', 'customizer_header', 'mybooking' ),
			         '3' => _x( 'One column', 'customizer_home', 'mybooking' ),

			      )
			   )
			);

			// COLORS

			// --Header Title color

			// Setting
			$wp_customize->add_setting( 'mybooking_header_widget_title_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'header_widget_title_color', array(
						'label'      => _x( 'Header Widget Title color', 'customizer_header', 'mybooking' ),
						'section'    => 'mybooking_theme_header_options',
						'settings'   => 'mybooking_header_widget_title_color'
			) ) );

			// --Header Text color

			// Setting
			$wp_customize->add_setting( 'mybooking_header_widget_text_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'header_widget_text_color', array(
						'label'      => _x( 'Header Widget Text color', 'customizer_header', 'mybooking' ),
						'section'    => 'mybooking_theme_header_options',
						'settings'   => 'mybooking_header_widget_text_color'
			) ) );

			// --Header Text color

			// Setting
			$wp_customize->add_setting( 'mybooking_header_widget_link_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'header_widget_link_color', array(
						'label'      => _x( 'Header Widget Link color', 'customizer_header', 'mybooking' ),
						'section'    => 'mybooking_theme_header_options',
						'settings'   => 'mybooking_header_widget_link_color'
			) ) );

			// --Header align

			// Setting
			$wp_customize->add_setting(
				'mybooking_header_widget_title_align',
				array(
					'default'           => 'left',
					'type'              => 'theme_mod',
					'sanitize_callback' => array( $this, 'slug_sanitize_select'),
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_widget_title_align',
					array(
						'label'       => _x( 'Widget Title Align', 'customizer_header', 'mybooking' ),
						'section'     => 'mybooking_theme_header_options',
						'settings'    => 'mybooking_header_widget_title_align',
						'type'        => 'select',
						'choices'     => array(
							'left'      	=> _x( 'Default to the left', 'customizer_header', 'mybooking' ),
							'center'    	=> _x( 'Align center', 'customizer_header', 'mybooking' ),
							'right'				=> _x( 'Align right', 'customizer_header', 'mybooking' ),
						),
					)
				)
			);

			// --Text align

			// Setting
			$wp_customize->add_setting(
				'mybooking_header_widget_text_align',
				array(
					'default'           => 'left',
					'type'              => 'theme_mod',
					'sanitize_callback' => array( $this, 'slug_sanitize_select'),
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_widget_text_align',
					array(
						'label'       => _x( 'Widget Text Align', 'customizer_header', 'mybooking' ),
						'section'     => 'mybooking_theme_header_options',
						'settings'    => 'mybooking_header_widget_text_align',
						'type'        => 'select',
						'choices'     => array(
							'left'      	=> _x( 'Default to the left', 'customizer_header', 'mybooking' ),
							'center'    	=> _x( 'Align center', 'customizer_header', 'mybooking' ),
							'right'				=> _x( 'Align right', 'customizer_header', 'mybooking' ),
						),
					)
				)
			);


    }


		/**
     * 	Customize Footer
		 *
     */

    private function customize_footer_section( $wp_customize ) {

			// == Section
			$wp_customize->add_section(
				'mybooking_theme_footer_options',
				array(
					'title'       => _x( 'Footer', 'customizer_footer', 'mybooking' ),
					'capability'  => 'edit_theme_options',
					'description' => _x( 'Controls footer layout and, if advanced mode enabled on Colors section, also background and link colors.', 'customizer_footer', 'mybooking' ),
					'priority'    => 56,
					'panel'				=> 'mybooking_settings_panel',
				)
			);

			// == Footer Layout

			// Setting
			$wp_customize->add_setting( 'mybooking_global_footer_layout',
			   array(
			      'default' => '0',
			      'transport' => 'refresh',
			   )
			);

			// Control
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

			// Footer Advanced Settings

			// -- Footer Background color

			// Setting
			$wp_customize->add_setting( 'mybooking_footer_bg' , array(
			    'default'   => '#424242',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'footer_bg', array(
						'label'      => _x( 'Footer background color', 'customizer_footer', 'mybooking' ),
						'section'    => 'mybooking_theme_footer_options',
						'settings'   => 'mybooking_footer_bg'
			) ) );


			// -- Footer Link color

			// Setting
			$wp_customize->add_setting( 'mybooking_footer_link_color' , array(
			    'default'   => '#2193F2',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'footer_link_color', array(
						'label'      => _x( 'Footer Link color', 'customizer_footer', 'mybooking' ),
						'section'    => 'mybooking_theme_footer_options',
						'settings'   => 'mybooking_footer_link_color'
			) ) );

			// -- Link hover color

			// Setting
			$wp_customize->add_setting( 'mybooking_footer_link_hover_color' , array(
			    'default'   => '#ffffff',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( new Customizer_Alpha_Color_Control(
					$wp_customize, 'footer_link_hover_color', array(
						'label'      => _x( 'Footer Link hover color', 'customizer_footer', 'mybooking' ),
						'section'    => 'mybooking_theme_footer_options',
						'settings'   => 'mybooking_footer_link_hover_color'
			) ) );



		}


		/**
     * 	Customize Selector
		 *	------------------
		 *
		 *	Triggered only in Advanced Mode
     */
		 private function customize_selector_section( $wp_customize ) {

					 // == Section
	 	 			$wp_customize->add_section(
	 	 				'mybooking_theme_selector_options',
	 	 				array(
	 	 					'title'       => _x( 'Booking Forms', 'customizer_selector', 'mybooking' ),
	 	 					'description' => _x( 'Controls the booking forms apperance on Home and process pages.', 'customizer_selector', 'mybooking' ),

							'capability'  => 'edit_theme_options',
	 	 					'priority'    => 57,
	 	 					'panel'				=> 'mybooking_settings_panel',
	 	 					'active_callback' => array( $this, 'booking_forms_active_callback' )
	 	 				)
	 	 			);

	 				// -- Home Form background

	 				// Setting
	 				$wp_customize->add_setting( 'mybooking_home_selector_background' , array(
	 						'default'   => '#FFFFFF60',
	 						'transport' => 'refresh'
	 				) );

	 				// Control
	 				$wp_customize->add_control( new Customizer_Alpha_Color_Control(
	 						$wp_customize, 'home_selector_background', array(
	 							'label'      => _x( 'Home Booking Form background', 'customizer_selector', 'mybooking' ),
	 							'description' => _x( 'Usefull when the form is placed inside the Header and needs some transparency.', 'customizer_selector', 'mybooking' ),

	 							'section'    => 'mybooking_theme_selector_options',
	 							'settings'   => 'mybooking_home_selector_background'
	 				) ) );

					// -- Labels color

	 				// Setting
	 				$wp_customize->add_setting( 'mybooking_home_selector_labels' , array(
	 						'default'   => '#212121',
	 						'transport' => 'refresh'
	 				) );

	 				// Control
	 				$wp_customize->add_control( new Customizer_Alpha_Color_Control(
	 						$wp_customize, 'home_selector_labels', array(
	 							'label'      => _x( 'General Form labels', 'customizer_selector', 'mybooking' ),

	 							'section'    => 'mybooking_theme_selector_options',
	 							'settings'   => 'mybooking_home_selector_labels'
	 				) ) );

					// -- Sticky Form background

	 				// Setting
	 				$wp_customize->add_setting( 'mybooking_sticky_selector_background' , array(
	 						'default'   => '#2193F2',
	 						'transport' => 'refresh'
	 				) );

	 				// Control
	 				$wp_customize->add_control( new Customizer_Alpha_Color_Control(
	 						$wp_customize, 'sticky_selector_background', array(
	 							'label'      => _x( 'Sticky Booking Form background', 'customizer_selector', 'mybooking' ),

	 							'section'    => 'mybooking_theme_selector_options',
	 							'settings'   => 'mybooking_sticky_selector_background'
	 				) ) );

					// -- Sticky Form Labels color

	 				// Setting
	 				$wp_customize->add_setting( 'mybooking_sticky_selector_labels' , array(
	 						'default'   => '#FFFFFF',
	 						'transport' => 'refresh'
	 				) );

	 				// Control
	 				$wp_customize->add_control( new Customizer_Alpha_Color_Control(
	 						$wp_customize, 'sticky_selector_labels', array(
	 							'label'      => _x( 'Sticky Form labels', 'customizer_selector', 'mybooking' ),

	 							'section'    => 'mybooking_theme_selector_options',
	 							'settings'   => 'mybooking_sticky_selector_labels'
	 				) ) );

		}


		/**
     * 	Customize Home Section
		 *	----------------------
		 *
		 *	We don't use section declaration here because these controls appears in
		 *	Homepage Settings section
     */

    private function customize_home_section( $wp_customize ) {

			// == Content section positioning and visibility

			// --Positioning

			// Setting
			$wp_customize->add_setting( 'mybooking_home_content_position',
				array(
					'default'           => '1',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control( 'mybooking_home_content_position',
				array(
					'label'       => _x( 'Default content area', 'customizer_home', 'mybooking' ),
					'description' => _x( 'Get control of default content section position and visibility. Shows WordPress editor\'s content', 'customizer_home', 'mybooking' ),

					'section'     => 'static_front_page',
					'settings'    => 'mybooking_home_content_position',
					'type'        => 'select',
					'choices'     => array(
						'1'      			=> _x( 'Position Top', 'customizer_home', 'mybooking' ),
						'2'    				=> _x( 'Position Center Top', 'customizer_home', 'mybooking' ),
						'3'						=> _x( 'Position Center Bottom', 'customizer_home', 'mybooking' ),
						'4'						=> _x( 'Position Bottom', 'customizer_home', 'mybooking' ),
					),
				)
			);

			// --Visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_content_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( 'mybooking_home_content_visibility',
			   array(
			      'label' => _x( 'Activate deafult content area', 'customizer_home', 'mybooking' ),

			      'section'  => 'static_front_page',
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

			// == Widgets section positioning and visibility

			// --Positioning

			// Setting
			$wp_customize->add_setting( 'mybooking_home_content_widgets_position',
				array(
					'default'           => '2',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control( 'mybooking_home_content_widgets_position',
				array(
					'label'       => _x( 'Widgets area', 'customizer_home', 'mybooking' ),
					'description' => _x( 'Get control of Widgets section position and visibility. Shows three widget areas called Home Content 1, 2 and 3', 'customizer_home', 'mybooking' ),

					'section'     => 'static_front_page',
					'settings'    => 'mybooking_home_content_widgets_position',
					'type'        => 'select',
					'choices'     => array(
						'1'      			=> _x( 'Position Top', 'customizer_home', 'mybooking' ),
						'2'    				=> _x( 'Position Center Top', 'customizer_home', 'mybooking' ),
						'3'						=> _x( 'Position Center Bottom', 'customizer_home', 'mybooking' ),
						'4'						=> _x( 'Position Bottom', 'customizer_home', 'mybooking' ),
					),
				)
			);

			// --Visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_content_widgets_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( 'mybooking_home_content_widgets_visibility',
			   array(
			      'label' => _x( 'Activate content widgets', 'customizer_home', 'mybooking' ),

			      'section'  => 'static_front_page',
			      'priority' => 10,
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

			// == News section positioning and visibility

			// --Positioning

			// Setting
			$wp_customize->add_setting( 'mybooking_home_news_position',
				array(
					'default'           => '3',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control( 'mybooking_home_news_position',
				array(
					'label'       => _x( 'News area', 'customizer_home', 'mybooking' ),
					'description' => _x( 'Get control of News section position and visibility. Shows last three posts of Home Page category', 'customizer_home', 'mybooking' ),

					'section'     => 'static_front_page',
					'settings'    => 'mybooking_home_news_position',
					'type'        => 'select',
					'choices'     => array(
						'1'      			=> _x( 'Position Top', 'customizer_home', 'mybooking' ),
						'2'    				=> _x( 'Position Center Top', 'customizer_home', 'mybooking' ),
						'3'						=> _x( 'Position Center Bottom', 'customizer_home', 'mybooking' ),
						'4'						=> _x( 'Position Bottom', 'customizer_home', 'mybooking' ),
					),
				)
			);

			// --Visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_news_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			// Content
			$wp_customize->add_control( 'mybooking_home_news_visibility',
			   array(
			      'label' => _x( 'Activate news', 'customizer_home', 'mybooking' ),

			      'section'  => 'static_front_page',
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

			// == Testimonials section positioning and visibility

			// --Positioning

			// Setting
			$wp_customize->add_setting( 'mybooking_home_testimonial_carousel_position',
				array(
					'default'           => '4',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
				)
			);

			// Control
			$wp_customize->add_control( 'mybooking_home_testimonial_carousel_position',
				array(
					'label'       => _x( 'Testimonials area', 'customizer_home', 'mybooking' ),
					'description' => _x( 'Get control of Testimonials section position and visibility (also the enables Testimonials post type)', 'customizer_home', 'mybooking' ),

					'section'     => 'static_front_page',
					'settings'    => 'mybooking_home_testimonial_carousel_position',
					'type'        => 'select',
					'choices'     => array(
						'1'      			=> _x( 'Position Top', 'customizer_home', 'mybooking' ),
						'2'    				=> _x( 'Position Center Top', 'customizer_home', 'mybooking' ),
						'3'						=> _x( 'Position Center Bottom', 'customizer_home', 'mybooking' ),
						'4'						=> _x( 'Position Bottom', 'customizer_home', 'mybooking' ),
					),
				)
			);

			// --Visibility

			// Setting
			$wp_customize->add_setting( 'mybooking_home_testimonial_carousel_visibility' , array(
			    'default'   => '1',
			    'transport' => 'refresh'
			) );

			// Control
			$wp_customize->add_control( 'mybooking_home_testimonial_carousel_visibility',
			   array(
			      'label' => _x( 'Activate testimonials', 'customizer_home', 'mybooking' ),

			      'section'  => 'static_front_page',
			      'type'=> 'checkbox',
			      'capability' => 'edit_theme_options',
			   )
			);

    }


		/**
     * 	Customize Identity Section
		 *	--------------------------
		 *
		 *	We don't use section declaration here because these controls appears in
		 *	Site Identity WordPress default section
     */

		 private function customize_identity_section( $wp_customize ) {

			 	// -- Logo Height

	 			// Setting

	 			$wp_customize->add_setting( 'mybooking_logo_height' , array(
	 			    'default'   => '40px',
	 			    'transport' => 'refresh'
	 			) );

	 			// Control
	 			$wp_customize->add_control( 'mybooking_logo_height',
	 			   array(
	 			      'label' => _x( 'Site\'s logo height', 'customizer_identity', 'mybooking' ),
							'description' => _x( 'Put a value in pixels.', 'customizer_identity', 'mybooking' ),


	 			      'section'  => 'title_tagline',
	 			      'type'=> 'text',
	 			      'capability' => 'edit_theme_options',
	 			   )
	 			);

		 }


    // -----------

		/**
		 * Checkbox sanitization function
		 *
		 * @param $checked Slug to sanitize
		 */
		function slug_sanitize_checkbox( $checked ) {
		  // Boolean check.
		  return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}


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

		function booking_forms_active_callback() {

			$options_advanced_mode = get_theme_mod( 'mybooking_colors_advanced', '0' );

			return ($options_advanced_mode == '1');
		}

}

require_once('customizer/alpha-color-picker.php');
require_once('customizer/class-font-selector.php');
require_once('customizer/gallery-control.php');
MyBookingCustomizer::getInstance();
