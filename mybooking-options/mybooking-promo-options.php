<?php
/**
*		PROMO CONFIGURATION PAGE
*  	------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.13
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'mybookinges_create_menu_promo');

function mybookinges_create_menu_promo() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

  add_submenu_page(
  	"config",
  	__("Promo setup", 'mybooking'),
  	__("Promo setup", 'mybooking'),
  	"edit_pages",
  	"promo",
  	"mybookinges_configuration_promo"
  	);

  }
}

add_action('admin_init', 'mybookinges_register_options_promo');

function mybookinges_register_options_promo() {

  // Define options
  add_option("promo_popup_active","","","yes");
  add_option("promo_home_widgets_active","","","yes");

  // Register options
  register_setting("options_promo", "promo_popup_active");
  register_setting("options_promo", "promo_home_widgets_active");

}

function mybookinges_configuration_promo() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Configuración las promociones', 'mybooking') ?> <br>
      <small><?php _e('Ajustes para el Popup, el slider de promociones y los widgets destacados.', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form -->

    <form method="post" action="options.php">

      <?php settings_fields('options_promo'); ?>

      <!-- Popups Activation -->

      <h2><?php _e('Anuncios emergentes','mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Activar Anuncios Emergentes', 'mybooking') ?></th>
          <td>
          <?php $popup_active = get_option( "promo_popup_active" ); ?>
          <input type="checkbox" name="promo_popup_active" <?php checked( $popup_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activa el tipo de contenido Anuncio Emergente en el menú de Mybooking', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <!-- Home Widgets -->

      <h2><?php _e('Widgets en la Home','mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Activar área de widgets', 'mybooking') ?></th>
          <td>
          <?php $popup_active = get_option( "promo_home_widgets_active" ); ?>
          <input type="checkbox" name="promo_home_widgets_active" <?php checked( $popup_active, 1 ); ?> value="1"> <span class="description"><?php _e('Muestra el área de widgets en la Home', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
