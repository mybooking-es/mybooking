<?php
/**
*		CONTACT CONFIGURATION PAGE
*  	--------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.7.0
*
*   Section title
*   Section subtitle
*   Contact text
*   Google Map code
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'mybookinges_create_menu_contact');

function mybookinges_create_menu_contact() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

  add_submenu_page(
  	"config",
  	__("Contact page", 'mybooking'),
  	__("Contact page", 'mybooking'),
  	"edit_pages",
  	"contact",
  	"mybookinges_configuration_contact",
    3
  	);

  }
}

add_action('admin_init', 'mybookinges_register_options_contact');

function mybookinges_register_options_contact() {

  // Define options
  add_option("contact_section_title","","","yes");
  add_option("contact_section_subtitle","","","yes");
  add_option("contact_section_text","","","yes");
  add_option("contact_map_code","","","yes");

  // Register options
  register_setting("options_company_info", "contact_section_title");
  register_setting("options_company_info", "contact_section_subtitle");
  register_setting("options_company_info", "contact_section_text");
  register_setting("options_company_info", "contact_map_code");

}

function mybookinges_configuration_contact() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Configuración la página de contacto', 'mybooking') ?> <br>
      <small><?php _e('Ajustes para el contenido del template Mybooking Contact.', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form -->

    <form method="post" action="options.php">

      <?php settings_fields('options_contact'); ?>

      <!-- Contact page setup -->

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
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
