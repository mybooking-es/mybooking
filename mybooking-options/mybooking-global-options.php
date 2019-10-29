<?php
/**
*		GLOBAL CONFIGURATION
*  	--------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.2
*/

add_action('admin_menu', 'mybookinges_create_menu_global');
add_action('admin_init', 'mybookinges_register_options_global');

function mybookinges_create_menu_global() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_submenu_page(
      "configuracion",
    	__("Opciones globales", 'mybooking'),
    	__("Opciones globales", 'mybooking'),
    	"edit_pages",
    	"global",
    	"mybookinges_configuration_global"
    	);

  }
}

function mybookinges_register_options_global() {

  // Definición de opciones
  add_option("global_footer_layout","","","yes");


  // Registro de opciones
  register_setting("options_global", "global_footer_layout");


}

function mybookinges_configuration_global() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Configuración global', 'mybooking') ?><br>
      <small><?php _e('Diferentes elementos globales del tema', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('options_global'); ?>

      <!-- Company info -->

      <h2><?php _e('Layout del footer', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Escoge el tipo de footer', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "global_footer_layout" ); ?>
          <input type="radio" name="global_footer_layout" <?php checked( $options, 0 ); ?> value="0"> <span class="description"><strong><?php _e('Normal','mybooking') ?></strong>  <?php _e('WIDGETS + MENU + INFO', 'mybooking') ?></span><br><br>
          <input type="radio" name="global_footer_layout" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><strong><?php _e('Simple', 'mybooking') ?></strong>  <?php _e('INFO', 'mybooking') ?></span>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="global_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
