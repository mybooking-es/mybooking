<?php
/**
*		COMPANY INFO CONFIGURATION
*  	--------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

add_action('admin_menu', 'mybookinges_create_menu_company_info');
add_action('admin_init', 'mybookinges_register_options_company_info');

function mybookinges_create_menu_company_info() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_submenu_page(
      "configuracion",
    	__("Información corporativa", 'mybooking'),
    	__("Información corporativa", 'mybooking'),
    	"edit_pages",
    	"info",
    	"mybookinges_configuration_company_info"
    	);

  }
}

function mybookinges_register_options_company_info() {

  // Definición de opciones
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

  add_option("contact_section_title","","","yes");
  add_option("contact_section_subtitle","","","yes");
  add_option("contact_section_text","","","yes");
  add_option("contact_map_code","","","yes");

  // Registro de opciones
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

  register_setting("options_company_info", "contact_section_title");
  register_setting("options_company_info", "contact_section_subtitle");
  register_setting("options_company_info", "contact_section_text");
  register_setting("options_company_info", "contact_map_code");

}

function mybookinges_configuration_company_info() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Información del negocio', 'mybooking') ?><br>
      <small><?php _e('Aparece en varios lugares del tema, incluyendo el template "MyBooking Contacto"', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form ----------------------------------------------------------->

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
      </table>

      <hr>

      <!-- Contact page adjust -->

      <h2><?php _e('Página Contacto', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de la sección', 'mybooking') ?></th>
          <td><input type="text" name="contact_section_title" size="40" value="<?php echo get_option('contact_section_title'); ?>" />
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Subtítulo de la sección', 'mybooking') ?></th>
          <td><input type="text" name="contact_section_subtitle" size="40" value="<?php echo get_option('contact_section_subtitle'); ?>" />
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de la sección', 'mybooking') ?></th>
          <td><textarea name="contact_section_text" cols="37" rows="10"><?php echo get_option('contact_section_text'); ?></textarea>
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mapa de localización', 'mybooking') ?></th>
          <td><textarea name="contact_map_code" cols="37" rows="10"><?php echo get_option('contact_map_code'); ?></textarea>
          <br><span class="description"><?php _e('Pega aquí el código de Google Maps', 'mybooking') ?></span></td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="company_info_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
