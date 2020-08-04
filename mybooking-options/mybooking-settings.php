<?php
  class MyBookingThemeSettings {

		// Hold the class instance.
	  private static $instance = null;

	  // Holds the theme settings
	  private $theme_options = null;

	  // The constructor is private
	  // to prevent initiation with outer code.
	  private function __construct()
	  {
	    	$this->wp_init();
	  }

	  // The object is created from within the class itself
	  // only if the class has no instance.
	  public static function getInstance()
	  {
	    if (self::$instance == null)
	    {
	      self::$instance = new MyBookingThemeSettings();
	    }

	    return self::$instance;
	  }

	  /**
	   * Initialize
	   */
    private function wp_init() {

			// Create menu in settings
			add_action( 'admin_menu', array($this,'wp_settings_page'));

			// Initialize settings
			add_action( 'admin_init', array($this,'wp_settings_init'));

    }

    // == Theme settings

    public function get_theme_options() {

	  	if ( $this->theme_options == null ) {
		  	$this->theme_options = array();

		  	// Company
		  	$settings = (array) get_option( 'mybooking_theme_settings_company_info' );
		  	$this->theme_options['company_info_trade_name'] = $this->get_option_value( $settings, 'company_info_trade_name');
		  	$this->theme_options['company_info_name'] = $this->get_option_value( $settings, 'company_info_name');
		  	$this->theme_options['company_info_nif'] = $this->get_option_value( $settings, 'company_info_nif');
		  	$this->theme_options['company_info_adress'] = $this->get_option_value( $settings, 'company_info_address');
		  	$this->theme_options['company_info_phone'] = $this->get_option_value( $settings, 'company_info_phone');
		  	$this->theme_options['company_info_chat'] = $this->get_option_value( $settings, 'company_info_chat');
		  	$this->theme_options['company_info_email'] = $this->get_option_value( $settings, 'company_info_email');
		  	$this->theme_options['company_info_twitter_url'] = $this->get_option_value( $settings, 'company_info_twitter_url');
		  	$this->theme_options['company_info_facebook_url'] = $this->get_option_value( $settings, 'company_info_facebook_url');
		  	$this->theme_options['company_info_instagram_url'] = $this->get_option_value( $settings, 'company_info_instagram_url');
		  	$this->theme_options['company_info_linkedin_url'] = $this->get_option_value( $settings, 'company_info_linkedin_url');
		  	$this->theme_options['company_info_youtube_url'] = $this->get_option_value( $settings, 'company_info_youtube_url');
		  	$this->theme_options['company_info_google_analytics'] = $this->get_option_value( $settings, 'company_info_google_analytics');

		  	// Contact Page
		  	$settings = (array) get_option( 'mybooking_theme_settings_contact' );
		  	$this->theme_options['contact_section_title'] = $this->get_option_value( $settings, 'contact_section_title');
		  	$this->theme_options['contact_section_subtitle'] = $this->get_option_value( $settings, 'contact_section_subtitle');
		  	$this->theme_options['contact_section_text'] = $this->get_option_value( $settings, 'contact_section_text');
		  	$this->theme_options['contact_map_code'] = $this->get_option_value( $settings, 'contact_map_code');

			  // Promotion
		  	$settings = (array) get_option( 'mybooking_theme_settings_promo' );
		  	$this->theme_options['promo_popup_active'] = $this->get_option_value( $settings, 'promo_popup_active');
		  	// $this->theme_options['promo_home_widgets_active'] = $this->get_option_value( $settings, 'promo_home_widgets_active');

		  	// Global
		  	$settings = (array) get_option( 'mybooking_theme_settings_options_global' );
		  	$this->theme_options['global_vehicle_active'] = $this->get_option_value( $settings, 'global_vehicle_active');

		  }

		  return $this->theme_options;

    }

    public function get_theme_option( $option ) {

    	return $this->get_theme_options()[$option];

    }

    private function get_option_value( $settings, $field ) {

    		if (array_key_exists( $field, $settings)) {
			    $value = esc_attr( $settings[$field] );
			  }
			  else {
			  	$value = '';
			  }

			  return $value;

    }


		// == Settings Page

		/**
		 * Settings page : Create new settings page
		 */
		public function wp_settings_page() {

		  if (!current_user_can('manage_options') || current_user_can('administrator')) {

		  	// https://wordpress.stackexchange.com/questions/66498/add-menu-page-with-different-name-for-first-submenu-item
		  	// https://codex.wordpress.org/Adding_Administration_Menus

		    // Create mybooking Menu
		    add_menu_page(
		      _x("Mybooking", 'theme_settings', 'mybooking'),
		      _x("Mybooking", 'theme_settings', 'mybooking'),
		      "edit_pages",
		      "settings", // Slug
		      '',
		      get_template_directory_uri()."/images/mybooking-logo-bn.png",
		      4.1
		    );

		    // Add settings submenu page
		    add_submenu_page(
		      "settings",
		    	_x("Settings", 'theme_settings', 'mybooking'),
		    	_x("Settings", 'theme_settings', 'mybooking'),
		    	"manage_options",
		    	"settings", // The same slug as the main menu so it will be the default option
		    	array($this, 'mybooking_theme_settings_page'),
  		    -1
		    	);

		  }

		}

    // == Settings Init

		/**
		 * Settings init : Initialize settings
		 * -------------------------------------------------
		 *
		 * setting:  mybooking_plugin_settings
     * sections:
     *   - connection
     *   - renting wizard
     *   - renting
     *   - activities
		 *
		 */
		public function wp_settings_init() {


		  register_setting("mybooking_theme_settings_group_company_info",
		  								 "mybooking_theme_settings_company_info");

		  register_setting("mybooking_theme_settings_group_contact",
		  								 "mybooking_theme_settings_contact");

		  register_setting("mybooking_theme_settings_group_options_global",
		  								 "mybooking_theme_settings_options_global");

		  register_setting("mybooking_theme_settings_group_promo",
		  								 "mybooking_theme_settings_promo");

		  // Sections
		  add_settings_section("company_info_section",
		  										 _x("Company", 'theme_settings', 'mybooking'),
		  										 '',
		  										 'settings'
		  										);

		  add_settings_section("contact_section",
		                       _x("Contact Page", 'theme_settings', 'mybooking'),
		                       '',
		                       "settings");

		  add_settings_section("options_global_section",
		                       _x("Global Options", 'theme_settings', 'mybooking'),
		                       '',
		                       "settings");

		  add_settings_section("promo_section",
		                       _x("Promotions", 'theme_settings', 'mybooking'),
		                       '',
		                       "settings");

		  // == Company

		  add_settings_field("company_info_trade_name",
		                     _x('Company Trade Name', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_trade_name_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_name",
		                     _x('Company Legal Name', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_name_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_nif",
		                     _x('VAT Number', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_nif_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_adress",
		                     _x('Address', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_adress_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_phone",
		                     _x('Phone Number', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_phone_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_chat",
		                     _x('WhatsApp Number', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_chat_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_email",
		                     _x('E-mail address', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_email_callback'),
		                     "settings",
		                     "company_info_section");


		  add_settings_field("company_info_twitter_url",
		                     _x('Twitter URL', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_twitter_url_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_facebook_url",
		                     _x('Facebook URL', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_facebook_url_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_instagram_url",
		                     _x('Instagram URL', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_instagram_url_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_linkedin_url",
		                     _x('LinkedIn URL', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_linkedin_url_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_youtube_url",
		                     _x('YouTube URL', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_youtube_url_callback'),
		                     "settings",
		                     "company_info_section");

		  add_settings_field("company_info_google_analytics",
		                     _x('Google Analytics ID', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_company_info_google_analytics_callback'),
		                     "settings",
		                     "company_info_section");

		  // == Contact
		  add_settings_field("contact_section_title",
		                     _x('Section Title', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_contact_section_title_callback'),
		                     "settings",
		                     "contact_section");

		  add_settings_field("contact_section_subtitle",
		                     _x('Section Subtitle', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_contact_section_subtitle_callback'),
		                     "settings",
		                     "contact_section");

		  add_settings_field("contact_section_text",
		                     _x('Section Text', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_contact_section_text_callback'),
		                     "settings",
		                     "contact_section");


		  add_settings_field("contact_map_code",
		                     _x('Google Maps code', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_contact_map_code_callback'),
		                     "settings",
		                     "contact_section");

		  // == Promos
		  add_settings_field("promo_popup_active",
		                     _x('Activate promotion pop-up', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_promo_popup_active_callback'),
		                     "settings",
		                     "promo_section");

		  // == Global
		  add_settings_field("global_vehicle_active",
		                     _x('Activate vehicles module', 'theme_settings', 'mybooking'),
		                     array($this, 'field_mybooking_theme_global_vehicle_active_callback'),
		                     "settings",
		                     "options_global_section");

		}

		// -------------------------- Settings page -------------------------------

		/**
		 * Render Mybooking settings page
		 *
		 * setting_fields: Settings section id
		 * setting_sections :Plugin menu slug
		 *
		 * <?php settings_fields('mybooking_plugin_settings_group'); ?>
*/
public function mybooking_theme_settings_page() {

if (!current_user_can('edit_pages'))
wp_die(__("Access forbidden", "theme_settings", 'mybooking'));

?>
<div class="wrap">
  <h1><?php echo _x("MyBooking Theme Setup", 'theme_settings', 'mybooking') ?></h1>

  <?php
	            $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_title( $_GET[ 'tab' ] ) : 'company_options';
	            $tabs = array('company_options', 'contact', 'promotions', 'global_settings');
	            if ( !in_array( $active_tab, $tabs) ) {
	            	$active_tab = 'company_options';
	            }
	        ?>

  <h2 class="nav-tab-wrapper">
    <a href="?page=settings&tab=company_options"
      class="nav-tab <?php echo $active_tab == 'company_options' ? 'nav-tab-active' : ''; ?>">
      <?php echo _x("My company", 'theme_settings', 'mybooking') ?>
    </a>
    <a href="?page=settings&tab=contact"
      class="nav-tab <?php echo $active_tab == 'contact' ? 'nav-tab-active' : ''; ?>">
      <?php echo _x("Contact Page", 'theme_settings', 'mybooking') ?>
    </a>
    <a href="?page=settings&tab=promotions"
      class="nav-tab <?php echo $active_tab == 'promotions' ? 'nav-tab-active' : ''; ?>">
      <?php echo _x("Promotions", 'theme_settings', 'mybooking') ?>
    </a>
    <a href="?page=settings&tab=global_settings"
      class="nav-tab <?php echo $active_tab == 'global_settings' ? 'nav-tab-active' : ''; ?>">
      <?php echo _x("Global Settings", 'theme_settings', 'mybooking') ?>
    </a>
  </h2>

  <?php settings_errors(); ?>

  <form action="options.php" method="POST">
    <?php

	             if ($active_tab == 'company_options') {
	            ?>
    <p><?php echo _x('It is used on <b>TopBar</b>, <b>Footer</b> and <b>Contact Page</b> to render <u>company information</u>.',
	               								  'theme_settings', 'mybooking')?></p>
    <?php
	             	 settings_fields('mybooking_theme_settings_group_company_info');
	             	 echo '<table class="form-table">';
	             	 do_settings_fields('settings', 'company_info_section');
	             	 echo '</table>';
	             }

	             if ($active_tab == 'contact') {
	            ?>
    <p><?php echo _x('It is used by <b>MyBooking Contact</b> template to render a full contact page.',
	               								  'theme_settings', 'mybooking')?></p>
    <?php

	             	 settings_fields('mybooking_theme_settings_group_contact');
	             	 echo '<table class="form-table">';
	             	 do_settings_fields('settings', 'contact_section');
	             	 echo '</table>';

	             }

	             if ($active_tab == 'promotions') {
	            ?>
    <p><?php echo _x('Promotions module.',
	               								  'theme_settings', 'mybooking')?></p>
    <?php

	             	 settings_fields('mybooking_theme_settings_group_promo');
	             	 echo '<table class="form-table">';
	             	 do_settings_fields('settings', 'promo_section');
	             	 echo '</table>';

	             }

	             if ($active_tab == 'global_settings') {
	            ?>
    <p><?php echo _x('Global settings.',
	               								  'theme_settings', 'mybooking')?></p>
    <?php
	             	 settings_fields('mybooking_theme_settings_group_options_global');
	             	 echo '<table class="form-table">';
	             	 do_settings_fields('settings', 'options_global_section');
	             	 echo '</table>';
	             }

	             echo '<input type="hidden" name="tab" value="' . esc_attr( $active_tab ) . '" />';
	             submit_button();

	          ?>

  </form>
</div>
<?php
		}

		public function field_mybooking_theme_company_info_trade_name_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_trade_name",
													_x( 'Company Trade Name.', 'theme_settings', 'mybooking')	);

		}

		public function field_mybooking_theme_company_info_name_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_name",
													_x( 'Company Legal Name.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_nif_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_nif",
													_x( 'Company VAT Number.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_adress_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_address",
													_x( 'Company Address.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_phone_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_phone",
													_x( 'Company Phone Number.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_chat_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_chat",
													_x( 'Company WhatsApp Number.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_email_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_email",
													_x( 'Company E-mail address.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_twitter_url_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_twitter_url",
													_x( 'Company Twitter URL.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_facebook_url_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_facebook_url",
													_x( 'Company Facebook URL.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_instagram_url_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_instagram_url",
													_x( 'Company Instagram URL.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_linkedin_url_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_linkedin_url",
													_x( 'Company Linkedin URL.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_youtube_url_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_youtube_url",
													_x( 'Company Youtube URL.', 'theme_settings', 'mybooking')	);

		}
		public function field_mybooking_theme_company_info_google_analytics_callback() {

			$this->text_field( "mybooking_theme_settings_company_info", "company_info_info_google_analytics",
													_x( 'Google Analytics ID.', 'theme_settings', 'mybooking')	);

		}

		// ------------------ Contact fields callbacks --------------------------

		public function field_mybooking_theme_contact_section_title_callback() {

			$this->text_field( "mybooking_theme_settings_contact", "contact_section_title",
													_x( 'Page title', 'theme_settings', 'mybooking')	);

		}

		public function field_mybooking_theme_contact_section_subtitle_callback() {

			$this->text_field( "mybooking_theme_settings_contact", "contact_section_subtitle",
													_x( 'Page subtitle', 'theme_settings', 'mybooking')	);

		}

		public function field_mybooking_theme_contact_section_text_callback() {

			$this->textarea_field( "mybooking_theme_settings_contact", "contact_section_text",
														 _x( 'Text message', 'theme_settings', 'mybooking')	);

		}

		public function field_mybooking_theme_contact_map_code_callback() {

			$this->textarea_field( "mybooking_theme_settings_contact", "contact_map_code",
														 _x( 'Copy Google Maps iframe', 'theme_settings', 'mybooking')	);

		}

		// ------------------ Promotion fields callbacks --------------------------

		public function field_mybooking_theme_promo_popup_active_callback() {

			$this->checkbox_field( "mybooking_theme_settings_promo", "promo_popup_active",
														 _x( 'Activate <b>Promotion Pop-ups</b> Custom Post Type in order to create promotions.', 'theme_settings', 'mybooking')	);

		}

		// ------------------ Global fields callbacks --------------------------

		/**
		 * Fields callback
		 */
		public function field_mybooking_theme_global_vehicle_active_callback() {

			$this->checkbox_field( "mybooking_theme_settings_options_global", "global_vehicle_active",
														 _x( 'Activate <b>Vehicles</b> Custom Post Type in order to create Fleet Page and Offers.', 'theme_settings', 'mybooking')	);

		}

		// ---------------------

		private function textarea_field( $option_group, $field, $description ) {

		  $settings = (array) get_option( $option_group );
		  if (array_key_exists($field, $settings)) {
		    $value = esc_attr( $settings[$field] );
		  }
		  else {
		  	$value = '';
		  }

		  echo "<textarea name='".$option_group."[$field]' class='regular-text' rows='10'>".$value.'</textarea>';
		  echo "<p class=\"description\">$description</p>";

		}

		private function text_field( $option_group, $field, $description ) {

		  $settings = (array) get_option( $option_group );
		  if (array_key_exists($field, $settings)) {
		    $value = esc_attr( $settings[$field] );
		  }
		  else {
		  	$value = '';
		  }

		  echo "<input type='text' name='".$option_group."[$field]' value='$value' class='regular-text' />";
		  echo "<p class=\"description\">$description</p>";

		}

		private function checkbox_field( $option_group, $field, $description) {

			$settings = (array) get_option( $option_group );
		  if (array_key_exists($field, $settings)) {
		    $value = esc_attr( $settings[$field] );
		  }
		  else {
        $value = '';
		  }

		  $checked = ($value == '1') ? 'checked' : '';

      echo "<input type='hidden' name='".$option_group."[$field]' value=''/>";
		  echo "<input type='checkbox' name='".$option_group."[$field]' value='1' $checked class='regular-text' />";
		  echo "<p class=\"description\">$description</p>";

		}

	}