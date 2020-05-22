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
  add_option("home_header_background","","","yes");
  add_option("home_header_image","","","yes");
  add_option("home_header_video","","","yes");
  add_option("home_news_visibility","","","yes");
  add_option("home_testimonial_carousel_visibility","","","yes");

  // Register options
  register_setting("options_home", "home_header_background");
  register_setting("options_home", "home_header_image");
  register_setting("options_home", "home_header_video");
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

      <!-- Home Header -->

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e( 'Estilo de fondo de la cabecera', 'mybooking' ) ?></th>
          <td>
          <?php $options_header_background = get_option( "home_header_background" ); ?>
          <input type="radio" name="home_header_background" <?php checked( $options_header_background, 0 ); ?> value="0"><span class="description"><strong><?php _e( 'Imagen de fondo','mybooking' ) ?></strong><br><?php _e( 'Inserta una imagen fija de fondo', 'mybooking', 'mybooking' ) ?></span><br><br>
          <input type="radio" name="home_header_background" <?php checked( $options_header_background, 1 ); ?> value="1"><span class="description"><strong><?php _e( 'Vídeo de fondo', 'mybooking' ) ?></strong><br><?php _e( 'Inserta un vídeo de fondo', 'mybooking' ) ?></span><br><br>
          <input type="radio" name="home_header_background" <?php checked( $options_header_background, 2 ); ?> value="2"><span class="description"><strong><?php _e( 'Carrusel de imágenes', 'mybooking' ) ?></strong><br><?php _e( 'Genera un carrusel y activa el módulo de Carrusel', 'mybooking' ) ?></span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e( 'Imagen de fondo', 'mybooking' ) ?></th>
          <td><input type="text" name="home_header_image" size="40" value="<?php echo get_option( 'home_header_image' ); ?>" />
          <br><span class="description"><?php _e( 'Pega aquí la URL de la imagen de fondo para la cabecera de la página', 'mybooking' ) ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e( 'Vídeo de fondo', 'mybooking' ) ?></th>
          <td><input type="text" name="home_header_video" size="40" value="<?php echo get_option( 'home_header_video' ); ?>" />
          <br><span class="description"><?php _e( 'Pega aquí la URL del vídeo de fondo para la cabecera de la página', 'mybooking' ) ?></span></td>
        </tr>
      </table>

      <hr>

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
