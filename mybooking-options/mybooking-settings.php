<?php
  class MyBookingThemeSettings {

	  public function __construct()
	  {
	    	$this->wp_init();
	  }

    private function wp_init() {

			// Create menu in settings
			add_action( 'admin_menu', array($this,'wp_settings_page'));

			// Initialize settings
			add_action( 'admin_init', array($this,'wp_settings_init'));

    }

		// == Settings Page

		/**
		 * Settings page : Create new settings page
		 */
		public function wp_settings_page() {

		  if (!current_user_can('manage_options') || current_user_can('administrator')) {

		    // Create mybooking Menu
		    add_menu_page(
		      __("Mybooking", 'mybooking'),
		      __("Mybooking", 'mybooking'),
		      "edit_pages",
		      "config",
		      "mybookinges_configuration_home",
		      get_template_directory_uri()."/images/mybooking-logo-bn.png",
		      4.1
		    );

        // Remove the 'automatic' add option with the same slug
		    remove_submenu_page('config', 'config');

		    // Add settings submenu page
		    add_submenu_page(
		      "config",
		    	__("Settings", 'theme_settings', 'mybooking'),
		    	__("Settings", 'theme_settings', 'mybooking'),
		    	"edit_pages",
		    	"settings",
		    	array($this, 'mybooking_theme_settings_page'),
		      5
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

			add_action('admin_init', array( $this, 'wp_register_settings_company') );
			add_action('admin_init', array( $this, 'wp_register_settings_global') );

		}

		/**
		 * Register company settings
		 */
		private function wp_register_settings_company() {

		  // Define options
		  add_option("company_info_trade_name","","","yes");
		  add_option("company_info_name","","","yes");
		  add_option("company_info_nif","","","yes");

		  add_option("company_info_adress","","","yes");
		  add_option("company_info_phone","","","yes");
		  add_option("company_info_chat","","","yes");
		  add_option("company_info_email","","","yes");

		  add_option("company_info_twitter_url","","","yes");
		  add_option("company_info_facebook_url","","","yes");
		  add_option("company_info_instagram_url","","","yes");
		  add_option("company_info_linkedin_url","","","yes");
		  add_option("company_info_youtube_url","","","yes");

		  add_option("company_info_google_analytics","","","yes");

		  // Register options
		  register_setting("options_company_info", "company_info_trade_name");
		  register_setting("options_company_info", "company_info_name");
		  register_setting("options_company_info", "company_info_nif");

		  register_setting("options_company_info", "company_info_adress");
		  register_setting("options_company_info", "company_info_phone");
		  register_setting("options_company_info", "company_info_chat");
		  register_setting("options_company_info", "company_info_email");

		  register_setting("options_company_info", "company_info_twitter_url");
		  register_setting("options_company_info", "company_info_facebook_url");
		  register_setting("options_company_info", "company_info_instagram_url");
		  register_setting("options_company_info", "company_info_linkedin_url");
		  register_setting("options_company_info", "company_info_youtube_url");

		  register_setting("options_company_info", "company_info_google_analytics");

		}

		/**
		 * Register global settings
		 */
		function wp_register_settings_global() {

		  // Define options
		  add_option("global_testimonials_active","","","yes");
		  add_option("global_vehicle_active","","","yes");

		  // Register options
		  register_setting("options_global", "global_testimonial_active");
		  register_setting("options_global", "global_vehicle_active");
		}

		// -------------------------- Settings page -------------------------------

		/**
		 * Render Mybooking settings page
		 *
		 * setting_fields: Settings section id
		 * setting_sections :Plugin menu slug
		 *
		 * <?php settings_fields('mybooking_plugin_settings_group'); ?> 
		 * <?php do_settings_sections('mybooking-plugin-configuration'); ?>  
		 * 
		 * https://developer.wordpress.org/reference/functions/do_settings_fields/
		 */
		public function mybooking_theme_settings_page() {
		?>
		  <div class="wrap">
		  	  <h1>Mybooking</h1>

					<?php
	            $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_title( $_GET[ 'tab' ] ) : 'company_options';
	            $tabs = array('company_options', 'global_settings');
	            if ( !in_array( $active_tab, $tabs) ) {
	            	$active_tab = 'company_options';
	            }
	        ?>

					<h2 class="nav-tab-wrapper">
					    <a href="?page=settings&tab=company_options" class="nav-tab <?php echo $active_tab == 'company_options' ? 'nav-tab-active' : ''; ?>">Company</a>
					    <a href="?page=settings&tab=global_settings" class="nav-tab <?php echo $active_tab == 'global_settings' ? 'nav-tab-active' : ''; ?>">Global Settings</a>
					</h2>

		      <form action="options.php" method="POST">
            <?php   

	             if ($active_tab == 'company_options') { 
	             	 $this->mybooking_theme_company_settings();
	             }

	             if ($active_tab == 'global_settings') {
	             	 $this->mybooking_theme_global_settings();
	             }

	          ?>   	

		      </form>
		  </div>
		<?php 
		}

		/**
		 * Company settings
		 */
		private function mybooking_theme_company_settings() {

			if (!current_user_can('edit_pages'))
			  wp_die(__("No tienes acceso a esta página.", 'mybooking'));
			?>
			  <div class="wrap">

			    <!-- Page header -->
  
			    <?php settings_errors(); ?>

			    <!-- Options form -->

			    <form method="post" action="options.php">

			      <?php settings_fields('options_company_info'); ?>

			      <!-- Company info -->

			      <h2><?php _e('Información corporativa', 'mybooking') ?></h2>

			      <table class="form-table">
			        <tr valign="top">
			          <th scope="row"><?php _e('Denominación del negocio', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_trade_name" size="40" value="<?php echo get_option('company_info_trade_name', 'mybooking'); ?>" /></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Razón social', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_name" size="40" value="<?php echo get_option('company_info_name', 'mybooking'); ?>" /></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Número de Identificación Fiscal', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_nif" size="40" value="<?php echo get_option('company_info_nif', 'mybooking'); ?>" /></td>
			        </tr>
			      </table>

			      <hr>

			      <!-- Contact info -->

			      <h2><?php _e('Información de contacto', 'mybooking') ?></h2>

			      <table class="form-table">
			        <tr valign="top">
			          <th scope="row"><?php _e('Dirección postal', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_adress" size="40" value="<?php echo get_option('company_info_adress', 'mybooking'); ?>" /></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Teléfono de contacto', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_phone" size="40" value="<?php echo get_option('company_info_phone', 'mybooking'); ?>" /></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Canal de chat', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_chat" size="40" value="<?php echo get_option('company_info_chat', 'mybooking'); ?>" />
			          <br><span class="description"><?php _e('Número de telefono asociado a Whatsapp, Telegram o similar', 'mybooking') ?></span></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Email de contacto', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_email" size="40" value="<?php echo get_option('company_info_email', 'mybooking'); ?>" /></td>
			        </tr>
			      </table>

			      <hr>

			      <!-- Social links -->

			      <h2><?php _e('Enlaces sociales', 'mybooking') ?></h2>

			      <table class="form-table">
			        <tr valign="top">
			          <th scope="row"><?php _e('Twitter', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_twitter_url" size="40" value="<?php echo get_option('company_info_twitter_url'); ?>" />
			          <br><span class="description"><?php _e('Pega aquí la URL del perfil de Twitter', 'mybooking') ?></span></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Facebook', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_facebook_url" size="40" value="<?php echo get_option('company_info_facebook_url'); ?>" />
			          <br><span class="description"><?php _e('Pega aquí la URL del perfil de Facebook', 'mybooking') ?></span></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('Instagram', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_instagram_url" size="40" value="<?php echo get_option('company_info_instagram_url'); ?>" />
			          <br><span class="description"><?php _e('Pega aquí la URL del perfil de Instagram') ?></span></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('LinkedIn', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_linkedin_url" size="40" value="<?php echo get_option('company_info_linkedin_url'); ?>" />
			          <br><span class="description"><?php _e('Pega aquí la URL del perfil de LinkedIn', 'mybooking') ?></span></td>
			        </tr>
			        <tr valign="top">
			          <th scope="row"><?php _e('YouTube', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_youtube_url" size="40" value="<?php echo get_option('company_info_youtube_url'); ?>" />
			          <br><span class="description"><?php _e('Pega aquí la URL del canal de YouTube', 'mybooking') ?></span></td>
			        </tr>
			      </table>

			      <hr>

			      <!-- Google Analytics -->

			      <h2><?php _e('Google Analytics', 'mybooking') ?></h2>

			      <table class="form-table">
			        <tr valign="top">
			          <th scope="row"><?php _e('Introduce el ID de Google Analytics', 'mybooking') ?></th>
			          <td><input type="text" name="company_info_google_analytics" size="40" value="<?php echo get_option('company_info_google_analytics', 'mybooking'); ?>" /></td>
			        </tr>
			      </table>

			      <hr>

			      <p class="submit">
			      	<input name="company_info_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
			      </p>

			    </form>
			  </div>
			<?php  
		}

		/**
		 * Global settings
		 */
		private function mybooking_theme_global_settings() {

			if (!current_user_can('edit_pages'))
			  wp_die(__("No tienes acceso a esta página.", 'mybooking'));
			?>
			  <div class="wrap">

			    <!-- Page header -->
  
			    <?php settings_errors(); ?>

			    <!-- Options form -->

			    <form method="post" action="options.php">

			      <?php settings_fields('options_global'); ?>

			      <!-- Vehicle CPT -->

			      <h2><?php _e('Fichas de vehículos', 'mybooking') ?></h2>

			      <table class="form-table">
			        <tr valign="top">
			          <th scope="row"><?php _e('Selecciona los módulos que quieras activar', 'mybooking') ?></th>
			          <td>
			            <?php $vehicle_active = get_option( "global_vehicle_active" ); ?>
			            <input type="checkbox" name="global_vehicle_active" <?php checked( $vehicle_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Vehículos', 'mybooking') ?></span>
			          </td>
			        </tr>
			      </table>

			      <hr>

			      <p class="submit">
			      	<input name="global_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
			      </p>

			    </form>
			  </div>
			<?php 
		}

	}
