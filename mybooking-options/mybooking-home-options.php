<?php
/**
*		HOME CONFIGURATION PAGE
*  	-----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'mybookinges_create_menu_home');
add_action('admin_init', 'mybookinges_register_options_home');

function mybookinges_create_menu_home() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_menu_page(
    	__("MyBooking", 'mybooking'),
    	__("MyBooking", 'mybooking'),
    	"edit_pages",
    	"configuracion",
    	"mybookinges_configuration_home",
    	"dashicons-admin-generic",
    	4.1
    	);

    add_submenu_page(
    	"configuracion",
    	__("Página de inicio", 'mybooking'),
    	__("Página de inicio", 'mybooking'),
    	"edit_pages",
    	"home",
    	"mybookinges_configuration_home"
    	);
    // Remove the 'automatic' add option with the same slug
    remove_submenu_page('configuracion', 'configuracion');
  }

}

function mybookinges_register_options_home() {

  // Define options
  add_option("home_hero_title","","","yes");
  add_option("home_hero_text","","","yes");

  add_option("home_promo_visibility","","","yes");
  add_option("home_promo_image_visibility","","","yes");
  add_option("home_promo_title_visibility","","","yes");
  add_option("home_promo_button_visibility","","","yes");
  add_option("home_promo_button_text","","","yes");

  add_option("home_highlight_visibility","","","yes");
  add_option("home_highlight_header_title","","","yes");
  add_option("home_highlight_header_text","","","yes");
  add_option("home_fact_one_image","","","yes");
  add_option("home_fact_one_text","","","yes");
  add_option("home_fact_two_image","","","yes");
  add_option("home_fact_two_text","","","yes");
  add_option("home_fact_three_image","","","yes");
  add_option("home_fact_three_text","","","yes");
  add_option("home_fact_four_image","","","yes");
  add_option("home_fact_four_text","","","yes");

  add_option("home_features_visibility","","","yes");
  add_option("home_features_header_title","","","yes");
  add_option("home_features_header_text","","","yes");
  add_option("home_features_header_image","","","yes");
  add_option("home_features_one_title","","","yes");
  add_option("home_features_one_text","","","yes");
  add_option("home_features_two_title","","","yes");
  add_option("home_features_two_text","","","yes");
  add_option("home_features_three_title","","","yes");
  add_option("home_features_three_text","","","yes");

  add_option("home_news_visibility","","","yes");
  add_option("home_testimonial_carousel_visibility","","","yes");

  // Register options
  register_setting("options_home", "home_hero_title");
  register_setting("options_home", "home_hero_text");

  register_setting("options_home", "home_promo_visibility");
  register_setting("options_home", "home_promo_image_visibility");
  register_setting("options_home", "home_promo_title_visibility");
  register_setting("options_home", "home_promo_button_visibility");
  register_setting("options_home", "home_promo_button_text");

  register_setting("options_home", "home_highlight_visibility");
  register_setting("options_home", "home_highlight_header_title");
  register_setting("options_home", "home_highlight_header_text");
  register_setting("options_home", "home_fact_one_image");
  register_setting("options_home", "home_fact_one_text");
  register_setting("options_home", "home_fact_two_image");
  register_setting("options_home", "home_fact_two_text");
  register_setting("options_home", "home_fact_three_image");
  register_setting("options_home", "home_fact_three_text");
  register_setting("options_home", "home_fact_four_image");
  register_setting("options_home", "home_fact_four_text");

  register_setting("options_home", "home_features_visibility");
  register_setting("options_home", "home_features_header_title");
  register_setting("options_home", "home_features_header_text");
  register_setting("options_home", "home_features_header_image");
  register_setting("options_home", "home_features_one_title");
  register_setting("options_home", "home_features_one_text");
  register_setting("options_home", "home_features_two_title");
  register_setting("options_home", "home_features_two_text");
  register_setting("options_home", "home_features_three_title");
  register_setting("options_home", "home_features_three_text");

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

    <!-- Options form ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('options_home'); ?>

      <!-- Section hero -->

      <h2><?php _e('Cabecera de la página de inicio', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título del eslogan', 'mybooking') ?></th>
          <td><input type="text" name="home_hero_title" size="40" value="<?php echo get_option('home_hero_title'); ?>" />
          <br><span class="description"><?php _e('Añade un titulo personalizado para la cabecera de la página', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del eslogan', 'mybooking') ?></th>
          <td><textarea name="home_hero_text" cols="37" rows="10"><?php echo get_option('home_hero_text'); ?></textarea>
          <br><span class="description"><?php _e('Añade un texto personalizado para la cabecera de la página', 'mybooking', 'mybooking') ?></span></td>
        </tr>
      </table>

      <hr>

      <!-- Section promo -->

      <h2><?php _e('Promociones', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Visibilidad', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_promo_visibility" ); ?>
          <input type="checkbox" name="home_promo_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para activar la sección', 'mybooking') ?></span>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mostrar imagen', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_promo_image_visibility" ); ?>
          <input type="checkbox" name="home_promo_image_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para mostrar la imagen', 'mybooking') ?></span>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mostrar titulo', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_promo_title_visibility" ); ?>
          <input type="checkbox" name="home_promo_title_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para mostrar el título', 'mybooking') ?></span>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mostrar botón', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_promo_button_visibility" ); ?>
          <input type="checkbox" name="home_promo_button_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para mostrar el botón', 'mybooking') ?></span>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del botón', 'mybooking') ?></th>
          <td><input type="text" name="home_promo_button_text" size="40" value="<?php echo get_option('home_promo_button_text'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Section highlight -->

      <h2><?php _e('Sección destacados', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Visibilidad', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_highlight_visibility" ); ?>
          <input type="checkbox" name="home_highlight_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para activar la sección', 'mybooking') ?></span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de la sección de destacados', 'mybooking') ?></th>
          <td><input type="text" name="home_highlight_header_title" size="40" value="<?php echo get_option('home_highlight_header_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de la sección de destacados', 'mybooking') ?></th>
          <td><textarea name="home_highlight_header_text" cols="37" rows="10"><?php echo get_option('home_highlight_header_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Imagen punto 1', 'mybooking') ?></th>
          <td><input type="text" name="home_fact_one_image" size="40" value="<?php echo get_option('home_fact_one_image'); ?>" />
          <br><span class="description"><?php _e('Inserta la URL para la imagen del punto 1', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del punto 1', 'mybooking') ?></th>
          <td><textarea name="home_fact_one_text" cols="37" rows="10"><?php echo get_option('home_fact_one_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Imagen punto 2', 'mybooking') ?></th>
          <td><input type="text" name="home_fact_two_image" size="40" value="<?php echo get_option('home_fact_two_image'); ?>" />
          <br><span class="description"><?php _e('Inserta la URL para la imagen del punto 2', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del punto 2', 'mybooking') ?></th>
          <td><textarea name="home_fact_two_text" cols="37" rows="10"><?php echo get_option('home_fact_two_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Imagen punto 3', 'mybooking') ?></th>
          <td><input type="text" name="home_fact_three_image" size="40" value="<?php echo get_option('home_fact_three_image'); ?>" />
          <br><span class="description"><?php _e('Inserta la URL para la imagen del punto 3', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del punto 3', 'mybooking') ?></th>
          <td><textarea name="home_fact_three_text" cols="37" rows="10"><?php echo get_option('home_fact_three_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Imagen punto 4', 'mybooking') ?></th>
          <td><input type="text" name="home_fact_four_image" size="40" value="<?php echo get_option('home_fact_four_image'); ?>" />
          <br><span class="description"><?php _e('Inserta la URL para la imagen del punto 3', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto del punto 4', 'mybooking') ?></th>
          <td><textarea name="home_fact_four_text" cols="37" rows="10"><?php echo get_option('home_fact_four_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Section features -->

      <h2><?php _e('Características', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Visibilidad', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_features_visibility" ); ?>
          <input type="checkbox" name="home_features_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para activar la sección', 'mybooking') ?></span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de la cabecera', 'mybooking') ?></th>
          <td><input type="text" name="home_features_header_title" size="40" value="<?php echo get_option('home_features_header_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de la cabecera', 'mybooking') ?></th>
          <td><textarea name="home_features_header_text" cols="37" rows="10"><?php echo get_option('home_features_header_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Imagen de la cabecera', 'mybooking') ?></th>
          <td><input type="text" name="home_features_header_image" size="40" value="<?php echo get_option('home_features_header_image'); ?>" />
          <br><span class="description"><?php _e('Inserta la URL para la imagen de la cabecera', 'mybooking') ?></span></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de característica uno', 'mybooking') ?></th>
          <td><input type="text" name="home_features_one_title" size="40" value="<?php echo get_option('home_features_one_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de característica uno', 'mybooking') ?></th>
          <td><textarea name="home_features_one_text" cols="37" rows="10"><?php echo get_option('home_features_one_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de característica dos', 'mybooking') ?></th>
          <td><input type="text" name="home_features_two_title" size="40" value="<?php echo get_option('home_features_two_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de característica dos', 'mybooking') ?></th>
          <td><textarea name="home_features_two_text" cols="37" rows="10"><?php echo get_option('home_features_two_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de característica tres', 'mybooking') ?></th>
          <td><input type="text" name="home_features_three_title" size="40" value="<?php echo get_option('home_features_three_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de característica tres', 'mybooking') ?></th>
          <td><textarea name="home_features_three_text" cols="37" rows="10"><?php echo get_option('home_features_three_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Section news -->

      <h2><?php _e('Noticias') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Visibilidad', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_news_visibility" ); ?>
          <input type="checkbox" name="home_news_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para activar la sección', 'mybooking') ?></span>
        </tr>
      </table>

      <hr>

      <!-- Section testimonial -->

      <h2><?php _e('Carrusel de testimonios', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Visibilidad', 'mybooking') ?></th>
          <td>
          <?php $options = get_option( "home_testimonial_carousel_visibility" ); ?>
          <input type="checkbox" name="home_testimonial_carousel_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description"><?php _e('Marcar para activar la sección', 'mybooking') ?></span>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
