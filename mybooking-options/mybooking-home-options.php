<?php
/**
*		HOME CONFIGURATION PAGE
*  	-----------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*   Home navigation options
*   Home header settings
*   Home sections activation
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'mybookinges_create_menu_home');

function mybookinges_create_menu_home() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_submenu_page(
    	"config",
    	__("Home settings", 'mybooking'),
    	__("Home settings", 'mybooking'),
    	"edit_pages",
    	"home",
    	"mybookinges_configuration_home"
    	);
    
  }

}

add_action('admin_init', 'mybookinges_register_options_home');

function mybookinges_register_options_home() {

  // Define options
  add_option("home_news_visibility","","","yes");
  add_option("home_testimonial_carousel_visibility","","","yes");

  // Register options
  register_setting("options_home", "home_news_visibility");
  register_setting("options_home", "home_testimonial_carousel_visibility");

}

function mybookinges_configuration_home() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página.", 'mybooking'));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      <?php _e('Configuración de la página de inicio', 'mybooking') ?> <br>
      <small><?php _e('Ajustes para el template "MyBooking Home"', 'mybooking') ?></small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form -->

    <form method="post" action="options.php">

      <?php settings_fields('options_home'); ?>

      <!-- Home Sections -->

      <h2><?php _e('Secciones en la Home','mybooking') ?></h2>

      <!-- Home News -->
      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Activar noticias', 'mybooking') ?></th>
          <td>
          <?php $news_active = get_option( "home_news_visibility" ); ?>
          <input type="checkbox" name="home_news_visibility" <?php checked( $news_active, 1 ); ?> value="1"> <span class="description"><?php _e('Muestra los 3 últimos posts en la Home', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <!-- Home Testimonial -->
      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Activar testimonios', 'mybooking') ?></th>
          <td>
          <?php $testimonial_active = get_option( "home_testimonial_carousel_visibility" ); ?>
          <input type="checkbox" name="home_testimonial_carousel_visibility" <?php checked( $testimonial_active, 1 ); ?> value="1"> <span class="description"><?php _e('Muestra el carrusel Testimonios en la Home y activa el tipo de contenido en el menú de Mybooking', 'mybooking') ?></span>
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
