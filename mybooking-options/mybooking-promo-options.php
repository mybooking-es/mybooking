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
add_action('admin_init', 'mybookinges_register_options_promo');

function mybookinges_create_menu_promo() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

  add_submenu_page(
  	"config",
  	__("Promociones", 'mybooking'),
  	__("Promociones", 'mybooking'),
  	"edit_pages",
  	"promo",
  	"mybookinges_configuration_promo"
  	);

  }
}

function mybookinges_register_options_promo() {

  // Define options

  // Register options

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



      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
