<?php
/**
*		MYBOOKING THEME CUSTOMIZER
*  	--------------------------
*
*   Section: Mybooking layout settings
*
*
* 	@version 0.0.9
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*
*		NOTE: Home modules position controls are commented until we finish implementation
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'MyBookingCustomizer' ) ) {
	/**
	 * Customizer class
	 *
	 */
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
				$wp_customize->get_setting( 'custom_logo')->transport       = 'refresh';

				// Register control type for Carrousel
				$wp_customize->register_control_type( 'MyBookingCustomizeCarrouselControl' );

				// Register panel
				$this->mybooking_settings_panel( $wp_customize );

				// Customize sections
				$this->customize_layout_section( $wp_customize );
				$this->customize_typography_section( $wp_customize );
				$this->customize_colors_section( $wp_customize );
				$this->customize_topbar_section( $wp_customize );
				$this->customize_navbar_section( $wp_customize );
				$this->customize_header_section( $wp_customize );
				$this->customize_footer_section( $wp_customize );
				$this->customize_selector_section( $wp_customize );
				$this->customize_identity_section( $wp_customize );
				$this->customize_company( $wp_customize );


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
	    public function customize_enqueue( $type='frontend' ) {

	    	$custom_css = '';

	    	if ( $type == 'front-end' ) {

					// Defaults
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
					$logo_height = get_theme_mod( 'mybooking_logo_height', '40' );

		      $header_text_color = get_theme_mod('mybooking_headers_color', '#424242');

					$navbar_bg = get_theme_mod( 'mybooking_navbar_bg', '#ffffff');
					$navbar_link_color = get_theme_mod( 'mybooking_navbar_link_color', '#000000' );
					$navbar_link_color_hover = get_theme_mod( 'mybooking_navbar_link_hover_color', '#1e73be' );
					$navbar_link_active = get_theme_mod( 'mybooking_navbar_link_active', '#1e73be' );
					$navbar_dropdown_item_color = get_theme_mod( 'mybooking_navbar_dropdown_item_color', '#212121' );
					$navbar_dropdown_item_active_color = get_theme_mod( 'mybooking_navbar_dropdown_item_active_color', '#424242' );
					$navbar_link_collapse = get_theme_mod( 'mybooking_navbar_link_collapse', '#212121' );
					$navbar_toggler_icon = get_theme_mod( 'mybooking_navbar_toggler_icon', '#212121' );

					$header_widget_title_align = get_theme_mod( 'mybooking_header_widget_title_align', 'left' );
					$header_widget_text_align = get_theme_mod( 'mybooking_header_widget_text_align', 'left' );

					$footer_bg = get_theme_mod( 'mybooking_footer_bg', '#FAFAFA' );
					$footer_color = get_theme_mod( 'mybooking_footer_color', '#212121' );
					$footer_link_color = get_theme_mod( 'mybooking_footer_link_color', '#424242' );
					$footer_link_hover_color = get_theme_mod( 'mybooking_footer_link_hover_color', '#2193F2' );

		    	// If advaced colors is active, load extended values for topbar/header/selector
					$options_advanced_mode = get_theme_mod( 'mybooking_colors_advanced', '0' );
          if ( $options_advanced_mode != '0' ) {

          $home_topbar_bg = get_theme_mod( 'mybooking_home_topbar_bg', '#2193F2' );
          $topbar_bg = get_theme_mod( 'mybooking_topbar_bg', '#2193F2' );
          $topbar_color = get_theme_mod( 'mybooking_topbar_color', '#FFFFFF' );
          $topbar_link_color = get_theme_mod( 'mybooking_topbar_link_color', '#FAFAFA' );
          $topbar_link_hover_color = get_theme_mod( 'mybooking_topbar_link_hover_color', '#FAFAFA' );
					$topbar_message_bg = get_theme_mod( 'mybooking_topbar_message_bg', '#FFB74D' );
					$topbar_message_text = get_theme_mod( 'mybooking_topbar_message_text', '#212121' );
					$topbar_message_link = get_theme_mod( 'mybooking_topbar_message_link', '#FAFAFA' );
					$topbar_message_hover = get_theme_mod( 'mybooking_topbar_message_link_hover', '#FAFAFA' );

					$header_widget_title_color = get_theme_mod( 'mybooking_header_widget_title_color', '#FFFFFF' );
					$header_widget_text_color = get_theme_mod( 'mybooking_header_widget_text_color', '#FFFFFF' );
					$header_widget_link_color = get_theme_mod( 'mybooking_header_widget_link_color', '#FFFFFF' );

					$home_selector_background = get_theme_mod( 'mybooking_home_selector_background', 'rgba(255,255,255,0.5)' );
					$home_selector_labels = get_theme_mod( 'mybooking_home_selector_labels', '#212121' );
					$sticky_selector_background = get_theme_mod( 'mybooking_sticky_selector_background', '#2193F2' );
					$sticky_selector_labels = get_theme_mod( 'mybooking_sticky_selector_labels', '#212121' );

					}

					// == Build the css-properties
				  $custom_css .= ":root {";

				  // Typography
				  if ( !empty( $typography_body ) && $typography_body != 'default' ) {
				  	$custom_css.= "--font-family: '".esc_html( $typography_body )."';";
				  	$custom_css.= "--font-body: '".esc_html( $typography_body )."';";
				  }

				  if ( !empty ( $typography_heading ) && $typography_heading != 'default' && $typography_heading != $typography_body  ) {
				  	$custom_css.= "--font-heading: '".esc_html( $typography_heading )."';";
				  }
				  else if ( !empty ( $typography_heading ) && $typography_heading != $typography_body ) {
				  	$custom_css.= "--font-heading: '".esc_html( $typography_body )."';";
				  }

				  // Brand primary & secondary
				  $custom_css.= "--brand-primary: ".$this->slug_sanitize_rgba( $brand_primary ).';';
				  $custom_css.= "--brand-primary-light: ".$this->slug_sanitize_rgba( $brand_primary_light ).';';
				  $custom_css.= "--brand-primary-dark: ".$this->slug_sanitize_rgba( $brand_primary_dark ).';';
				  $custom_css.= "--brand-secondary: ".$this->slug_sanitize_rgba( $brand_secondary ).';';
				  $custom_css.= "--brand-secondary-light: ".$this->slug_sanitize_rgba( $brand_secondary_light ).';';
				  $custom_css.= "--brand-secondary-dark: ".$this->slug_sanitize_rgba( $brand_secondary_dark ).';';

				  // Body
				  $custom_css.= "--body-bg: ".$this->slug_sanitize_rgba( $body_bg ).';';
				  $custom_css.= "--body-color: ".$this->slug_sanitize_rgba( $body_color ).';';

		      // Header color
		      $custom_css.= "--font-heading-color: ".$this->slug_sanitize_rgba( $header_text_color ).';';

					// Identity
		  		$custom_css.= "--custom-logo-height: ".esc_html( $logo_height ).'px;';

					// NavBar
					$custom_css.= "--navbar-bg: ".$this->slug_sanitize_rgba( $navbar_bg ).';';
					$custom_css.= "--navbar-link-color: ".$this->slug_sanitize_rgba( $navbar_link_color ).';';
					$custom_css.= "--navbar-link-color-hover: ".$this->slug_sanitize_rgba( $navbar_link_color_hover ).';';
					$custom_css.= "--navbar-link-active: ".$this->slug_sanitize_rgba( $navbar_link_active ).';';
					$custom_css.= "--navbar-dropdown-item-color: ".$this->slug_sanitize_rgba( $navbar_dropdown_item_color ).';';
					$custom_css.= "--navbar-dropdown-item-active-bg: ".$this->slug_sanitize_rgba( $navbar_dropdown_item_active_color ).';';
					$custom_css.= "--navbar-link-collapse: ".$this->slug_sanitize_rgba( $navbar_link_collapse ).';';
					$custom_css.= "--toggler-icon-color: ".$this->slug_sanitize_rgba( $navbar_toggler_icon ).';';

					// Header
					$custom_css.= "--home-header-widget-title-align: ".esc_html( $header_widget_title_align ).';';
					$custom_css.= "--home-header-widget-text-align: ".esc_html( $header_widget_text_align ).';';					

					// Footer
					$custom_css.= "--footer-bg: ".$this->slug_sanitize_rgba( $footer_bg ).';';
					$custom_css.= "--footer-color: ".$this->slug_sanitize_rgba( $footer_color ).';';
					$custom_css.= "--footer-color-link: ".$this->slug_sanitize_rgba( $footer_link_color ).';';
					$custom_css.= "--footer-color-link-hover: ".$this->slug_sanitize_rgba( $footer_link_hover_color ).';';

					if ( $options_advanced_mode != '0' ) {
					  // Top bar
					  $custom_css.= "--home-topbar-bg: ".$this->slug_sanitize_rgba( $home_topbar_bg ).';';
					  $custom_css.= "--topbar-bg: ".$this->slug_sanitize_rgba( $topbar_bg ).';';
					  $custom_css.= "--topbar-color: ".$this->slug_sanitize_rgba( $topbar_color ).';';
					  $custom_css.= "--topbar-link-color: ".$this->slug_sanitize_rgba( $topbar_link_color ).';';
					  $custom_css.= "--topbar-link-color-hover: ".$this->slug_sanitize_rgba( $topbar_link_hover_color ).';';
						$custom_css.= "--topbar-message-bg: ".$this->slug_sanitize_rgba( $topbar_message_bg ).';';
					  $custom_css.= "--topbar-message-text: ".$this->slug_sanitize_rgba( $topbar_message_text ).';';
					  $custom_css.= "--topbar-message-link: ".$this->slug_sanitize_rgba( $topbar_message_link ).';';
					  $custom_css.= "--topbar-message-link-hover: ".$this->slug_sanitize_rgba( $topbar_message_hover ).';';

						// Header
						$custom_css.= "--home-header-widget-title: ".$this->slug_sanitize_rgba( $header_widget_title_color ).';';
						$custom_css.= "--home-header-widget-text: ".$this->slug_sanitize_rgba( $header_widget_text_color ).';';
						$custom_css.= "--home-header-widget-link: ".$this->slug_sanitize_rgba( $header_widget_link_color ).';';

						// Selector
						$custom_css.= "--home-selector-bg: ".$this->slug_sanitize_rgba( $home_selector_background ).';';
						$custom_css.= "--selector-label-color: ".$this->slug_sanitize_rgba( $home_selector_labels ).';';
						$custom_css.= "--selector-sticky-bg: ".$this->slug_sanitize_rgba( $sticky_selector_background ).';';
						$custom_css.= "--selector-sticky-labels-color: ".$this->slug_sanitize_rgba( $sticky_selector_labels ).';';

					}

				  $custom_css.= "}";
				}
				else if ( $type == 'block-editor') {

					// Defaults
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
		      $header_text_color = get_theme_mod('mybooking_headers_color', '#424242');

				  $custom_css.= ":root {";
				  
				  // Typography
				  if ( !empty( $typography_body ) && $typography_body != 'default' ) {
				  	$custom_css.= "--font-family: '".esc_html( $typography_body )."';";
				  	$custom_css.= "--font-body: '".esc_html( $typography_body )."';";
				  }

				  if ( !empty ( $typography_heading ) && $typography_heading != 'default' && $typography_heading != $typography_body  ) {
				  	$custom_css.= "--font-heading: '".esc_html( $typography_heading )."';";
				  }
				  else if ( !empty ( $typography_heading ) && $typography_heading != $typography_body ) {
				  	$custom_css.= "--font-heading: '".esc_html( $typography_body )."';";
				  }

				  // Brand primary & secondary
				  $custom_css.= "--brand-primary: ".$this->slug_sanitize_rgba( $brand_primary ).';';
				  $custom_css.= "--brand-primary-light: ".$this->slug_sanitize_rgba( $brand_primary_light ).';';
				  $custom_css.= "--brand-primary-dark: ".$this->slug_sanitize_rgba( $brand_primary_dark ).';';
				  $custom_css.= "--brand-secondary: ".$this->slug_sanitize_rgba( $brand_secondary ).';';
				  $custom_css.= "--brand-secondary-light: ".$this->slug_sanitize_rgba( $brand_secondary_light ).';';
				  $custom_css.= "--brand-secondary-dark: ".$this->slug_sanitize_rgba( $brand_secondary_dark ).';';

		      // Header color
		      $custom_css.= "--font-heading-color: ".$this->slug_sanitize_rgba( $header_text_color ).';';
		      
				  // Body
				  $custom_css.= "--body-bg: ".$this->slug_sanitize_rgba( $body_bg ).';';
				  $custom_css.= "--body-color: ".$this->slug_sanitize_rgba( $body_color ).';';
		      
				  $custom_css.= "}";
				}

				return $custom_css;

	    }

	    // ----------------------- Theme options ----------------------------------

	    /**
	     * Get theme options
	     */
		  public function get_theme_options()
			{
		  	if ( $this->theme_options == null ||  is_customize_preview() )
				{
			  	$this->theme_options = array();

          // Container type
          $this->theme_options['mybooking_container_type'] = get_theme_mod( 'mybooking_container_type', 'container' );

          // Typography
					$this->theme_options['mybooking_font_body'] = get_theme_mod( 'mybooking_font_body', 'default' );
					$this->theme_options['mybooking_font_heading'] = get_theme_mod( 'mybooking_font_heading', 'default' );

			  	// Contact
		  	  $this->theme_options['company_info_trade_name'] = get_theme_mod( 'mybooking_company_info_trade_name', '' );
		  	  $this->theme_options['company_info_name'] = get_theme_mod( 'mybooking_company_info_name', '' );
		  	  $this->theme_options['company_info_nif'] = get_theme_mod( 'mybooking_company_vat_number', '' );
		  	  $this->theme_options['company_info_adress'] = get_theme_mod( 'mybooking_company_address', '' );

		  	  $this->theme_options['company_info_phone'] = get_theme_mod( 'mybooking_company_phone_number', '' );
		  	  $this->theme_options['company_info_chat'] = get_theme_mod( 'mybooking_company_whatsapp_number', '' );
		  	  $this->theme_options['company_info_email'] = get_theme_mod( 'mybooking_company_email', '' );

		  	  $this->theme_options['company_info_twitter_url'] = get_theme_mod( 'mybooking_company_twitter_url', '' );
		  	  $this->theme_options['company_info_facebook_url'] = get_theme_mod( 'mybooking_company_facebook_url', '' );
		  	  $this->theme_options['company_info_instagram_url'] = get_theme_mod( 'mybooking_company_instagram_url', '' );
		  	  $this->theme_options['company_info_linkedin_url'] = get_theme_mod( 'mybooking_company_linkedin_url', '' );
		  	  $this->theme_options['company_info_youtube_url'] = get_theme_mod( 'mybooking_company_youtube_url', '' );		  	  		  	  		  	  

		  	  $this->theme_options['contact_map_code'] = get_theme_mod( 'mybooking_company_google_maps_code', '' );		

			  	// TopBar Global [contact and TopBar Menu]
			  	$this->theme_options['mybooking_global_topbar'] = get_theme_mod( "mybooking_global_topbar", '0');

			  	// Mobile Menu : "0" on right "1" on left
			  	$this->theme_options['mybooking_global_navigation_layout'] = get_theme_mod( "mybooking_global_navigation_layout", "0" );

			  	// Navigation at Home Template: "1" overlapped with header and transparent - "0" background color
			  	$this->theme_options['mybooking_home_navbar_integrated'] = get_theme_mod( "mybooking_home_navbar_integrated", "0" );

			  	// Header Layout - "0" 50-50
			  	$this->theme_options['mybooking_home_header_layout'] = get_theme_mod( "mybooking_home_header_layout", "0" );

			  	// Home Header visibility at Home Template: "1" visible "0" not visible
			  	$this->theme_options['mybooking_home_header_visibility'] = get_theme_mod( "mybooking_home_header_visibility", "1" );

			  	// Header Background
			  	$header_bg = get_theme_mod( 'mybooking_home_header_bg' );
			  	$this->theme_options['mybooking_home_header_bg'] = $header_bg;

			  	switch ( $header_bg )
					{
			  		case '0':
					  	$header_image_bg = get_theme_mod( 'mybooking_home_header_image_bg', "" );
					  	if ( !empty( $header_image_bg ) ) {
					  	  $image_id = attachment_url_to_postid( $header_image_bg );
					  	  if ( !empty( $image_id ) ) {
					  	    $header_image_bg = wp_get_attachment_image( $image_id,
					  	                                                'full', 
					  	                                                false, ['src', 'class'=>"home-header_background home-header_background-img", 'alt']); 
					  	  }
					    }
							$this->theme_options['mybooking_home_header_image_bg'] = $header_image_bg;
			  			break;

			  		case '1':
							$header_video_bg = get_theme_mod( 'mybooking_home_header_video_bg', "" );
							if ( ! empty( $header_video_bg ) )
							{
								$header_video_bg = wp_get_attachment_url( $header_video_bg );
							}
							$this->theme_options['mybooking_home_header_video_bg'] = $header_video_bg;
			  		  break;

			  		case '2':
			  		  $header_carrousel_images = [];
			  		  $header_carrousel_bg = get_theme_mod( 'mybooking_home_header_carrousel_bg', "" );
			  		  if ( is_array( $header_carrousel_bg ) && !empty( $header_carrousel_bg ) )
							{
		  		  		foreach ( $header_carrousel_bg as $carrousel_img )
								{
		  		  			$img_carrousel = wp_get_attachment_image( $carrousel_img, 
		  		  				                                        'full',
		  		  				                                        false,
		  		  				                                        ['src', 'alt'] );
		  		  			if ( !empty( $img_carrousel ) )
									{
		  		  				$header_carrousel_images[] = $img_carrousel;
		  		  			}
		  		  		}
			  		  }
			  		  $this->theme_options['mybooking_home_header_carrousel_bg'] = $header_carrousel_images;
			  		  break;
			  	}

			  	// Footer
			  	// Footer layout: "0" four sections "1" only copyright
			  	$this->theme_options['mybooking_global_footer_layout'] = get_theme_mod( "mybooking_global_footer_layout", "1" );
			  	// Footer credits
			  	$this->theme_options['mybooking_global_footer_credits'] = get_theme_mod( "mybooking_global_footer_credits", '' );


		  	}

		  	return $this->theme_options;

		  }

		  public function get_theme_option( $option )
			{
		  	return $this->get_theme_options()[ $option ];
		  }

	    // ----------------------- Customize Sections -----------------------------

			private function mybooking_settings_panel( $wp_customize )
			{
				$wp_customize->add_panel( 'mybooking_settings_panel',
				   array(
				      'title' => _x( 'Mybooking Theme', 'customizer_panel', 'mybooking' ),
				      'description' => _x( 'Customise your installation of Mybooking', 'customizer_panel', 'mybooking' ),
				      'priority' => 10,
				   )
				);
			}

			/**
			 * Customize company
			 */
			private function customize_company( $wp_customize ) {

				// Section
				$wp_customize->add_section(
					'mybooking_theme_company_options',
					array(
						'title'       => _x( 'Contact details', 'customizer_company', 'mybooking' ),
						'capability'  => 'edit_theme_options',
						'description' => _x( 'Contact details', 'customizer_company', 'mybooking' ),
						'priority'    => 60,
						'panel'				=> 'mybooking_settings_panel',
					)
				);

				// Company trade name

				$wp_customize->add_setting( 'mybooking_company_info_trade_name', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( 'mybooking_company_info_trade_name', array(
					'label' => _x( 'Trade name', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Trade name', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Trade name', 'customizer_company', 'mybooking' ),
					)
				) );

				// Company name

				$wp_customize->add_setting( 'mybooking_company_info_name', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( 'mybooking_company_info_name', array(
					'label' => _x( 'Legal name', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Legal name', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Legal name', 'customizer_company', 'mybooking' ),
					)
				) );

        // Company vat number

				$wp_customize->add_setting( 'mybooking_company_vat_number', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( 'mybooking_company_vat_number', array(
					'label' => _x( 'Vat number', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Vat number', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Vat number', 'customizer_company', 'mybooking' ),
					)
				) );				

        // Company address

				$wp_customize->add_setting( 'mybooking_company_address',
					 array(
							'default' => '',
							'transport' => 'refresh',
							'sanitize_callback' => 'wp_kses_post'
					 )
				);

				$wp_customize->add_control( 'mybooking_company_address',
					 array(
							'label' => _x( 'Address', 'customizer_company', 'mybooking' ),
							'description' => esc_html_x( 'Address', 'customizer_company', 'mybooking' ),
							'section' => 'mybooking_theme_company_options',
							'priority' => 10,
							'type' => 'textarea',
							'capability' => 'edit_theme_options',
							'input_attrs' => array(
								 'class' => 'mybooking-customizer-textarea',
								 'style' => 'border: 1px solid #999',
								 'placeholder' => _x( 'Address', 'customizer_company', 'mybooking' ),
							),
					 )
				);		

        // Company phone number

				$wp_customize->add_setting( 'mybooking_company_phone_number', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( 'mybooking_company_phone_number', array(
					'label' => _x( 'Phone number', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Phone number', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Phone number', 'customizer_company', 'mybooking' ),
					)
				) );	

        // Company WhatsApp number

				$wp_customize->add_setting( 'mybooking_company_whatsapp_number', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( 'mybooking_company_whatsapp_number', array(
					'label' => _x( 'WhatsApp number', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'WhatsApp number', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'WhatsApp number', 'customizer_company', 'mybooking' ),
					)
				) );	

        // Company Email address

				$wp_customize->add_setting( 'mybooking_company_email', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_email',
				) );

				$wp_customize->add_control( 'mybooking_company_email', array(
					'label' => _x( 'Email address', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Email address', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Email address', 'customizer_company', 'mybooking' ),
					)
				) );	

				// Company Twitter

				$wp_customize->add_setting( 'mybooking_company_twitter_url', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_url',
				) );

				$wp_customize->add_control( 'mybooking_company_twitter_url', array(
					'label' => _x( 'Twitter URL', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Twitter URL', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Twitter URL', 'customizer_company', 'mybooking' ),
					)
				) );	

				// Company Facebook

				$wp_customize->add_setting( 'mybooking_company_facebook_url', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_url',
				) );

				$wp_customize->add_control( 'mybooking_company_facebook_url', array(
					'label' => _x( 'Facebook URL', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Facebook URL', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Facebook URL', 'customizer_company', 'mybooking' ),
					)
				) );	

				// Company Instagram

				$wp_customize->add_setting( 'mybooking_company_instagram_url', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_url',
				) );

				$wp_customize->add_control( 'mybooking_company_instagram_url', array(
					'label' => _x( 'Instagram URL', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Instagram URL', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Instagram URL', 'customizer_company', 'mybooking' ),
					)
				) );	

				// Company Linkedin

				$wp_customize->add_setting( 'mybooking_company_linkedin_url', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_url',
				) );

				$wp_customize->add_control( 'mybooking_company_linkedin_url', array(
					'label' => _x( 'Linkedin URL', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'Linkedin URL', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'Linkedin URL', 'customizer_company', 'mybooking' ),
					)
				) );


				// Company YouTube

				$wp_customize->add_setting( 'mybooking_company_youtube_url', array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_url',
				) );

				$wp_customize->add_control( 'mybooking_company_youtube_url', array(
					'label' => _x( ' YouTube URL', 'customizer_company', 'mybooking' ),
					'description' => esc_html_x( 'YouTube URL', 'customizer_company', 'mybooking' ),
					'section' => 'mybooking_theme_company_options',
					'priority' => 10,
					'type' => 'text',
					'capability' => 'edit_theme_options',
					'input_attrs' => array(
						 'class' => 'mybooking-customizer-text',
						 'style' => 'border: 1px solid #999',
						 'placeholder' => _x( 'YouTube URL', 'customizer_company', 'mybooking' ),
					)
				) );

				// == Google Maps

				$wp_customize->add_setting( 'mybooking_company_google_maps_code',
					 array(
							'default' => '',
							'transport' => 'refresh',
							'sanitize_callback' => array( $this, 'slug_sanitize_iframe')
					 )
				);

				$wp_customize->add_control( 'mybooking_company_google_maps_code',
					 array(
							'label' => _x( 'Google maps iframe', 'customizer_company', 'mybooking' ),
							'description' => esc_html_x( 'Google maps iframe', 'customizer_company', 'mybooking' ),
							'section' => 'mybooking_theme_company_options',
							'priority' => 10,
							'type' => 'textarea',
							'capability' => 'edit_theme_options',
							'input_attrs' => array(
								 'class' => 'mybooking-customizer-textarea',
								 'style' => 'border: 1px solid #999',
								 'placeholder' => _x( 'Copy Google Maps iframe', 'customizer_company', 'mybooking' ),
							),
					 )
				);

			}



	    /**
	     * 	Customize Colors
			 *
	     */

	    private function customize_colors_section( $wp_customize )
			{
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
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_primary', array(
					'label'      => _x( 'Brand Primary color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_primary',
				) ) );


				// Setting
				$wp_customize->add_setting( 'mybooking_brand_primary_light' , array(
				    'default'   => '#6EC3FF',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_primary_light', array(
					'label'      => _x( 'Brand Primary light color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_primary_light',
				) ) );

				// Setting
				$wp_customize->add_setting( 'mybooking_brand_primary_dark' , array(
				    'default'   => '#0066BF',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_primary_dark', array(
					'label'      => _x( 'Brand Primary dark color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_primary_dark',
				) ) );

				// == Brand Seconday color

				// Setting
				$wp_customize->add_setting( 'mybooking_brand_secondary' , array(
				    'default'   => '#424242',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_seconday', array(
					'label'      => _x( 'Brand Secondary color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_secondary',
				) ) );

				// Setting
				$wp_customize->add_setting( 'mybooking_brand_secondary_light' , array(
				    'default'   => '#6D6D6D',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_light', array(
					'label'      => _x( 'Brand Secondary light color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_secondary_light',
				) ) );

				// Setting
				$wp_customize->add_setting( 'mybooking_brand_secondary_dark' , array(
				    'default'   => '#1B1B1B',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'brand_secondary_dark', array(
					'label'      => _x( 'Brand Secondary dark color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_brand_secondary_dark',
				) ) );


				// == Body background

				// Setting
				$wp_customize->add_setting( 'mybooking_body_bg' , array(
				    'default'   => '#ffffff',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'body_bg', array(
					'label'      => _x( 'Body Background color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_body_bg',
				) ) );

				// == Body color

				// Setting
				$wp_customize->add_setting( 'mybooking_body_color' , array(
	        'default'   => '#212121',
	        'transport' => 'refresh',
	        'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'body_color', array(
					'label'      => _x( 'Body Text color', 'customizer_colors', 'mybooking' ),
					'section'    => 'mybooking_theme_colors_options',
					'settings'   => 'mybooking_body_color',
	      ) ) );

	      // == Headers color

	      // Setting
	      $wp_customize->add_setting( 'mybooking_headers_color' , array(
		      'default' => '#424242',
		      'transport' => 'refresh',
		      'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
	      ) );

	      // Control
	      $wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'mybooking_headers_color', array(
	      'label' => _x( 'Headers Text color', 'customizer_colors', 'mybooking' ),
	      'section' => 'mybooking_theme_colors_options',
	      'settings' => 'mybooking_headers_color',
	      ) ) );

				// == Nav colors

				// -- Background color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_bg' , array(
				    'default'   => '#ffffff',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_bg', array(
							'label'      => _x( 'NavBar background color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_bg'
				) ) );


				// -- Link color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_link_color' , array(
				    'default'   => '#000000',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_link_color', array(
							'label'      => _x( 'NavBar Link color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_link_color'
				) ) );

				// -- Link hover color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_link_hover_color' , array(
				    'default'   => '#1e73be',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_link_hover_color', array(
							'label'      => _x( 'NavBar Link hover color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_link_hover_color'
				) ) );

				// -- Link active color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_link_active' , array(
				    'default'   => '#1e73be',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_link_active_color', array(
							'label'      => _x( 'NavBar Link active color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_link_active'
				) ) );

				// -- Drop Down Item Color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_dropdown_item_color' , array(
				    'default'   => '#212121',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_dropdown_item_color', array(
							'label'      => _x( 'NavBar DropDown Item color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_dropdown_item_color'
				) ) );

				// -- Drop Down Item Active Color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_dropdown_item_active_color' , array(
				    'default'   => '#424242',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_dropdown_item_active_color', array(
							'label'      => _x( 'NavBar DropDown Item Active color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_dropdown_item_active_color'
				) ) );

				// -- Link collapse color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_link_collapse' , array(
				    'default'   => '#212121',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_link_collapse', array(
							'label'      => _x( 'NavBar Link collapse color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_link_collapse'
				) ) );

				// --Toggler icon color

				// Setting
				$wp_customize->add_setting( 'mybooking_navbar_toggler_icon' , array(
				    'default'   => '#212121',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'navbar_toggler_icon', array(
							'label'      => _x( 'NavBar Toggler Icon color', 'customizer_navbar', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_navbar_toggler_icon'
				) ) );

				// -- Footer Background color

				// Setting
				$wp_customize->add_setting( 'mybooking_footer_bg' , array(
				    'default'   => '#FAFAFA',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'footer_bg', array(
							'label'      => _x( 'Footer background color', 'customizer_footer', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_footer_bg'
				) ) );

				// -- Footer Color

				// Setting
				$wp_customize->add_setting( 'mybooking_footer_color' , array(
				    'default'   => '#212121',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'footer_color', array(
							'label'      => _x( 'Footer color', 'customizer_footer', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_footer_color'
				) ) );

				// -- Footer Link color

				// Setting
				$wp_customize->add_setting( 'mybooking_footer_link_color' , array(
				    'default'   => '#424242',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'footer_link_color', array(
							'label'      => _x( 'Footer Link color', 'customizer_footer', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_footer_link_color'
				) ) );

				// -- Link hover color

				// Setting
				$wp_customize->add_setting( 'mybooking_footer_link_hover_color' , array(
				    'default'   => '#2193F2',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'footer_link_hover_color', array(
							'label'      => _x( 'Footer Link hover color', 'customizer_footer', 'mybooking' ),
							'section'    => 'mybooking_theme_colors_options',
							'settings'   => 'mybooking_footer_link_hover_color'
				) ) );

				// == Advanced Mode ======================================================

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
	    private function customize_typography_section( $wp_customize )
			{
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

	 			if ( class_exists( 'MyBookingFont_Selector' ) )
				{
					$wp_customize->add_setting( 'mybooking_font_body',
		          array(
		          	'transport' => 'refresh',
		            'type' => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field'
		          )
		      );

		      $wp_customize->add_control(
		          new MyBookingFont_Selector(
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
		            'type' => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field'
		          )
		      );

		      $wp_customize->add_control(
		          new MyBookingFont_Selector(
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

	    private function customize_layout_section( $wp_customize )
			{
				// Theme layout section
				$wp_customize->add_section(
					'mybooking_theme_layout_options',
					array(
						'title'       => _x( 'Layout', 'customizer_layout', 'mybooking' ),
						'capability'  => 'edit_theme_options',
						'description' => _x( 'Layout defaults',
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
							'label'       => _x( 'Navigation and Topbar container Width', 'customizer_layout', 'mybooking' ),
							'description' => _x( 'Choose between Bootstrap\'s container and container-fluid',
																	 'customizer_layout',
																	 'mybooking' ),
							'section'     => 'mybooking_theme_layout_options',
							'settings'    => 'mybooking_container_type',
							'type'        => 'select',
							'choices'     => array(
								'container'       => _x( 'Boxed navbar and topbar', 'customizer_layout', 'mybooking' ),
								'container-fluid' => _x( 'Full width navbar and topbar', 'customizer_layout', 'mybooking' ),
							),
							'priority'    => '10',
						)
					)
				);
	    }


			/**
	     * 	Customize Top Bar
			 *
	     */

	    private function customize_topbar_section( $wp_customize )
			{
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
				    'default'   => '0',
				    'transport' => 'refresh', // postMessage
				    'sanitize_callback' => array( $this, 'slug_sanitize_checkbox')
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
				    'default'   => '#2193F2',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'home_topbar_bg', array(
								'label'      => _x( 'Home Topbar Background', 'customizer_topbar', 'mybooking' ),
								'description'=> _x( 'This setting affects ONLY the home page topbar. You can set transparency for better integration when navbar\'s Transparent Header option is checked.', 'customizer_topbar', 'mybooking' ),
								'section'    => 'mybooking_theme_topbar_options',
								'settings'   => 'mybooking_home_topbar_bg'
				) ) );

				// -- Background color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_bg' , array(
				    'default'   => '#2193F2',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'topbar_bg', array(
							'label'      => _x( 'Topbar Background', 'customizer_topbar', 'mybooking' ),
							'section'    => 'mybooking_theme_topbar_options',
							'settings'   => 'mybooking_topbar_bg'
				) ) );

				// -- Color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_color' , array(
				    'default'   => '#FFFFFF',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar_color', array(
					'label'      => _x( 'Topbar Text', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_color',
				) ) );

				// -- Link Color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_link_color' , array(
				    'default'   => '#FAFAFA',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar_link_color', array(
					'label'      => _x( 'Topbar Link', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_link_color',
				) ) );

				// -- Link Hover

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_link_hover_color' , array(
				    'default'   => '#fafafa',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar_link_hover_color', array(
					'label'      => _x( 'Topbar Link Hover', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_link_hover_color',
				) ) );

				// Notification Message Advanced Settings

				// -- Background color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_message_bg' , array(
						'default'   => '#FFB74D',
						'transport' => 'refresh',
	          'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'topbar__message_bg', array(
							'label'      => _x( 'Notice Background', 'customizer_topbar', 'mybooking' ),
							'section'    => 'mybooking_theme_topbar_options',
							'settings'   => 'mybooking_topbar_message_bg'
				) ) );

				// -- Color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_message_text' , array(
						'default'   => '#212121',
						'transport' => 'refresh',
	          'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar__message_text', array(
					'label'      => _x( 'Notice Text', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_message_text',
				) ) );

				// -- Link Color

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_message_link' , array(
						'default'   => '#FAFAFA',
						'transport' => 'refresh',
	          'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar__message_link', array(
					'label'      => _x( 'Notice Link', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_message_link',
				) ) );

				// -- Link Hover

				// Setting
				$wp_customize->add_setting( 'mybooking_topbar_message_link_hover' , array(
						'default'   => '#FAFAFA',
						'transport' => 'refresh',
	          'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control( $wp_customize, 'topbar__message_link_hover', array(
					'label'      => _x( 'Notice Link Hover', 'customizer_topbar', 'mybooking' ),
					'section'    => 'mybooking_theme_topbar_options',
					'settings'   => 'mybooking_topbar_message_link_hover',
				) ) );

	    }


			/**
	     * 	Customize Nav Bar
			 *
	     */

	    private function customize_navbar_section( $wp_customize )
			{
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
				    'default'   => '0',
				    'transport' => 'refresh',
	          'sanitize_callback' => array( $this, 'slug_sanitize_checkbox')
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
	            'sanitize_callback' => array( $this, 'slug_sanitize_radio')
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
			}


			/**
	     * 	Customize Header
			 *
	     */

	    private function customize_header_section( $wp_customize )
			{
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
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_checkbox')
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
				      'sanitize_callback' => array( $this, 'slug_sanitize_radio')
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
		            'transport' => 'refresh',
		            'sanitize_callback' => 'esc_url_raw'
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
		            'transport' => 'refresh',
		            'sanitize_callback' => 'absint'
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

				$wp_customize->add_control( new MyBookingCustomizeCarrouselControl(
				        $wp_customize,
				        'mybooking_home_header_carrousel_bg',
				        array(
				            'label'    => _x( 'Background Carrousel', 'customizer_header', 'mybooking' ),
				            'section'  => 'mybooking_theme_header_options',
				            'settings' => 'mybooking_home_header_carrousel_bg',
				            'type'     => 'mybooking_carrousel',
				        )
				    ) );

				// --Header Columns

				$wp_customize->add_setting( 'mybooking_home_header_layout',
				   array(
				      'default' => '0',
				      'transport' => 'refresh',
				      'sanitize_callback' => array( $this, 'slug_sanitize_radio')
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
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'header_widget_title_color', array(
							'label'      => _x( 'Header Widget Title color', 'customizer_header', 'mybooking' ),
							'section'    => 'mybooking_theme_header_options',
							'settings'   => 'mybooking_header_widget_title_color'
				) ) );

				// --Header Text color

				// Setting
				$wp_customize->add_setting( 'mybooking_header_widget_text_color' , array(
				    'default'   => '#ffffff',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
						$wp_customize, 'header_widget_text_color', array(
							'label'      => _x( 'Header Widget Text color', 'customizer_header', 'mybooking' ),
							'section'    => 'mybooking_theme_header_options',
							'settings'   => 'mybooking_header_widget_text_color'
				) ) );

				// --Header Text color

				// Setting
				$wp_customize->add_setting( 'mybooking_header_widget_link_color' , array(
				    'default'   => '#ffffff',
				    'transport' => 'refresh',
				    'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
				) );

				// Control
				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
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
						'mybooking_header_widget_title_align',
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
						'mybooking_header_widget_text_align',
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

	    private function customize_footer_section( $wp_customize )
			{
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
				      'default' => '1',
				      'transport' => 'refresh',
				      'sanitize_callback' => array( $this, 'slug_sanitize_radio')
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


				// == Footer message

				$wp_customize->add_setting( 'mybooking_global_footer_credits',
					 array(
							'default' => '',
							'transport' => 'refresh',
							'sanitize_callback' => 'wp_kses_post'
					 )
				);

				$wp_customize->add_control( 'mybooking_global_footer_credits',
					 array(
							'label' => _x( 'Footer message', 'customizer_topbar', 'mybooking' ),
							'description' => esc_html_x( 'Footer detailed message', 'customizer_topbar', 'mybooking' ),
							'section' => 'mybooking_theme_footer_options',
							'priority' => 10,
							'type' => 'textarea',
							'capability' => 'edit_theme_options',
							'input_attrs' => array(
								 'class' => 'mybooking-customizer-textarea',
								 'style' => 'border: 1px solid #999',
								 'placeholder' => _x( 'Detail message on Footer.', 'customizer_footer', 'mybooking' ),
							),
					 )
				);


			}

			/**
	     * 	Customize Selector
			 *	------------------
			 *
			 *	Triggered only in Advanced Mode
	     */
			 private function customize_selector_section( $wp_customize )
			 {
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
		 						'default'   => 'rgba(255,255,255,0.5)',
		 						'transport' => 'refresh',
		 						'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
		 				) );

		 				// Control
		 				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
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
		 						'transport' => 'refresh',
		 						'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
		 				) );

		 				// Control
		 				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
		 						$wp_customize, 'home_selector_labels', array(
		 							'label'      => _x( 'General Form labels', 'customizer_selector', 'mybooking' ),

		 							'section'    => 'mybooking_theme_selector_options',
		 							'settings'   => 'mybooking_home_selector_labels'
		 				) ) );

						// -- Sticky Form background

		 				// Setting
		 				$wp_customize->add_setting( 'mybooking_sticky_selector_background' , array(
		 						'default'   => '#2193F2',
		 						'transport' => 'refresh',
		 						'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
		 				) );

		 				// Control
		 				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
		 						$wp_customize, 'sticky_selector_background', array(
		 							'label'      => _x( 'Sticky Booking Form background', 'customizer_selector', 'mybooking' ),

		 							'section'    => 'mybooking_theme_selector_options',
		 							'settings'   => 'mybooking_sticky_selector_background'
		 				) ) );

						// -- Sticky Form Labels color

		 				// Setting
		 				$wp_customize->add_setting( 'mybooking_sticky_selector_labels' , array(
		 						'default'   => '#FFFFFF',
		 						'transport' => 'refresh',
		 						'sanitize_callback' => array( $this, 'slug_sanitize_rgba')
		 				) );

		 				// Control
		 				$wp_customize->add_control( new MyBookingCustomizer_Alpha_Color_Control(
		 						$wp_customize, 'sticky_selector_labels', array(
		 							'label'      => _x( 'Sticky Form labels', 'customizer_selector', 'mybooking' ),

		 							'section'    => 'mybooking_theme_selector_options',
		 							'settings'   => 'mybooking_sticky_selector_labels'
		 				) ) );

			}

			/**
	     * 	Customize Identity Section
			 *	--------------------------
			 *
			 *	We don't use section declaration here because these controls appears in
			 *	Site Identity WordPress default section
	     */

			 private function customize_identity_section( $wp_customize )
			 {
				 	// -- Logo Height

		 			// Setting

		 			$wp_customize->add_setting( 'mybooking_logo_height' , array(
		 			    'default'   => '40',
		 			    'transport' => 'refresh',
		 			    'sanitize_callback' => 'absint'
		 			) );

		 			// Control
		 			$wp_customize->add_control( 'mybooking_logo_height',
		 			   array(
		 			      'label' => _x( 'Site\'s logo height', 'customizer_identity', 'mybooking' ),
								'description' => _x( 'Value in pixels.', 'customizer_identity', 'mybooking' ),
		 			      'section'  => 'title_tagline',
		 			      'type'=> 'number',
		 			      'capability' => 'edit_theme_options',
								'input_attrs' => array(
								    'min' => 20,
								    'max' => 150,
								    'step' => 2,
								  ),
		 			   )
		 			);
			 }


	    // ----------- Sanitize

			/**
			 * Radio Button sanitization function
			 *
			 * @param $checked Slug to sanitize
			 */
	    function slug_sanitize_radio( $input, $setting )
			{
	        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	        $input = sanitize_key($input);

	        //get the list of possible radio box options
	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        //return input if valid or return default option
	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }

			/**
			 * Checkbox sanitization function
			 *
			 * @param $checked Slug to sanitize
			 */
			function slug_sanitize_checkbox( $checked )
			{
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
			function slug_sanitize_select( $input, $setting )
			{
				// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
				$input = sanitize_key( $input );

				// Get the list of possible select options.
				$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
			}

	    /**
	     * RGBA color sanitization function
	     */
			function slug_sanitize_rgba( $color )
			{
			    if ( empty( $color ) || is_array( $color ) ) {
			      return 'rgba(0,0,0,0)';
			    }

			    // If string does not start with 'rgba', then treat as hex
			    // sanitize the hex color and finally convert hex to rgba
			    if ( false === strpos( $color, 'rgba' ) )
					{
			        return sanitize_hex_color( $color );
			    }

			    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
			    $color = str_replace( ' ', '', $color );
			    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
			}

			/**
			 * Sanitize iframe
			 */
			function slug_sanitize_iframe ( $input ) 
			{
				 if (! empty( $input ) ) {
						$allowed_html = array(
						    'iframe' => array(
						        'src' => array(),
						        'height' => array(),
						        'width' => array(),
						        'frameborder' => array(),
						        'allowfullscreen' => array(),
						        'style' => array()

						    )
						);
						return wp_kses($input, $allowed_html);
				 }
				 return $input;

			}

			// ------------ Other callbacks

			function booking_forms_active_callback()
			{
				$options_advanced_mode = get_theme_mod( 'mybooking_colors_advanced', '0' );
				return ($options_advanced_mode == '1');
			}

	}
}