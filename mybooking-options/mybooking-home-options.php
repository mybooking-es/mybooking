<?php
/**
*		HOME CONFIGURATION PAGE
*  	-----------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

add_action('admin_menu', 'mybookinges_create_menu_home');
add_action('admin_init', 'mybookinges_register_options_home');

function mybookinges_create_menu_home() {
  if (!current_user_can('manage_options') || current_user_can('administrator')) {

    add_menu_page(
    	__("MyBooking"),
    	__("MyBooking"),
    	"edit_pages",
    	"configuracion",
    	"mybookinges_configuration_home",
    	"dashicons-admin-generic",
    	4.1
    	);
  
    add_submenu_page(
    	"configuracion",
    	__("Página de inicio"),
    	__("Página de inicio"),
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
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Page header -->

    <h1>
      Configuración de la página de inicio <br>
      <small>Ajustes para el template 'MyBooking Home'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Options form ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('options_home'); ?>

      <!-- Section hero -->

      <h2>Cabecera de la página de inicio</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título del eslogan</th>
          <td><input type="text" name="home_hero_title" size="40" value="<?php echo get_option('home_hero_title'); ?>" />
          <br><span class="description">Añade un titulo personalizado para la cabecera de la página</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del eslogan</th>
          <td><textarea name="home_hero_text" cols="37" rows="10"><?php echo get_option('home_hero_text'); ?></textarea>
          <br><span class="description">Añade un texto personalizado para la cabecera de la página</span></td>
        </tr>
      </table>

      <hr>

      <!-- Section promo -->

      <h2>Promociones</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_promo_visibility" ); ?>
          <input type="checkbox" name="home_promo_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
        <tr valign="top">
          <th scope="row">Moatrar botón</th>
          <td>
          <?php $options = get_option( "home_promo_button_visibility" ); ?>
          <input type="checkbox" name="home_promo_button_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para mostrar el botón</span>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del botón</th>
          <td><input type="text" name="home_promo_button_text" size="40" value="<?php echo get_option('home_promo_button_text'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Section highlight -->

      <h2>Destacada</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_highlight_visibility" ); ?>
          <input type="checkbox" name="home_highlight_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la sección destacada</th>
          <td><input type="text" name="home_highlight_header_title" size="40" value="<?php echo get_option('home_highlight_header_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la sección destacada</th>
          <td><textarea name="home_highlight_header_text" cols="37" rows="10"><?php echo get_option('home_highlight_header_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Imagen punto 1</th>
          <td><input type="text" name="home_fact_one_image" size="40" value="<?php echo get_option('home_fact_one_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 1</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 1</th>
          <td><textarea name="home_fact_one_text" cols="37" rows="10"><?php echo get_option('home_fact_one_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Imagen punto 2</th>
          <td><input type="text" name="home_fact_two_image" size="40" value="<?php echo get_option('home_fact_two_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 2</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 2</th>
          <td><textarea name="home_fact_two_text" cols="37" rows="10"><?php echo get_option('home_fact_two_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Imagen punto 3</th>
          <td><input type="text" name="home_fact_three_image" size="40" value="<?php echo get_option('home_fact_three_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 3</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 3</th>
          <td><textarea name="home_fact_three_text" cols="37" rows="10"><?php echo get_option('home_fact_three_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Imagen punto 4</th>
          <td><input type="text" name="home_fact_four_image" size="40" value="<?php echo get_option('home_fact_four_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 3</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 4</th>
          <td><textarea name="home_fact_four_text" cols="37" rows="10"><?php echo get_option('home_fact_four_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Section features -->

      <h2>Features</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_features_visibility" ); ?>
          <input type="checkbox" name="home_features_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la cabecera</th>
          <td><input type="text" name="home_features_header_title" size="40" value="<?php echo get_option('home_features_header_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la cabecera</th>
          <td><textarea name="home_features_header_text" cols="37" rows="10"><?php echo get_option('home_features_header_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Imagen de la cabecera</th>
          <td><input type="text" name="home_features_header_image" size="40" value="<?php echo get_option('home_features_header_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen de la cabecera</span></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature uno</th>
          <td><input type="text" name="home_features_one_title" size="40" value="<?php echo get_option('home_features_one_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature uno</th>
          <td><textarea name="home_features_one_text" cols="37" rows="10"><?php echo get_option('home_features_one_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature dos</th>
          <td><input type="text" name="home_features_two_title" size="40" value="<?php echo get_option('home_features_two_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature dos</th>
          <td><textarea name="home_features_two_text" cols="37" rows="10"><?php echo get_option('home_features_two_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature tres</th>
          <td><input type="text" name="home_features_three_title" size="40" value="<?php echo get_option('home_features_three_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature tres</th>
          <td><textarea name="home_features_three_text" cols="37" rows="10"><?php echo get_option('home_features_three_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Section news -->

      <h2>Noticias destacadas</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_news_visibility" ); ?>
          <input type="checkbox" name="home_news_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <hr>

      <!-- Section testimonial -->

      <h2>Carrusel de testimonios</h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_testimonial_carousel_visibility" ); ?>
          <input type="checkbox" name="home_testimonial_carousel_visibility" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
