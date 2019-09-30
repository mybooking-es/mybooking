<?php
/**
*		CONFIGURACIÓN DE LA HOME
*  	------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

add_action('admin_menu', 'mybookinges_crea_menu_home');
add_action('admin_init', 'mybookinges_registra_opciones_home');

function mybookinges_crea_menu_home() {
  if (!current_user_can('manage_options') || current_user_can('administrator'))
    add_menu_page(
    	__("MyBooking"),
    	__("MyBooking"),
    	"edit_pages",
    	"configuracion",
    	"mybookinges_configuracion_home",
    	"dashicons-admin-generic",
    	4.1
    	);
    add_submenu_page(
    	"configuracion",
    	__("Configuración de la página de inicio"),
    	__("Configuración de la página de inicio"),
    	"edit_pages",
    	"home",
    	"mybookinges_configuracion_home"
    	);
}

function mybookinges_registra_opciones_home() {

  // Definición de opciones
  add_option("home_hero_title","","","yes");
  add_option("home_hero_text","","","yes");

  add_option("home_highlight_visibilidad","","","yes");
  add_option("home_highlight_cabecera_title","","","yes");
  add_option("home_highlight_cabecera_text","","","yes");
  add_option("home_punto_uno_image","","","yes");
  add_option("home_punto_uno_text","","","yes");
  add_option("home_punto_dos_image","","","yes");
  add_option("home_punto_dos_text","","","yes");
  add_option("home_punto_tres_image","","","yes");
  add_option("home_punto_tres_text","","","yes");

  add_option("home_features_visibilidad","","","yes");
  add_option("home_features_cabecera_title","","","yes");
  add_option("home_features_cabecera_text","","","yes");
  add_option("home_features_cabecera_image","","","yes");
  add_option("home_features_uno_title","","","yes");
  add_option("home_features_uno_text","","","yes");
  add_option("home_features_dos_title","","","yes");
  add_option("home_features_dos_text","","","yes");
  add_option("home_features_tres_title","","","yes");
  add_option("home_features_tres_text","","","yes");

  add_option("home_carrusel_visibilidad","","","yes");

  // Registro de opciones
  register_setting("opciones_home", "home_hero_title");
  register_setting("opciones_home", "home_hero_text");

  register_setting("opciones_home", "home_highlight_visibilidad");
  register_setting("opciones_home", "home_highlight_cabecera_title");
  register_setting("opciones_home", "home_highlight_cabecera_text");
  register_setting("opciones_home", "home_punto_uno_image");
  register_setting("opciones_home", "home_punto_uno_text");
  register_setting("opciones_home", "home_punto_dos_image");
  register_setting("opciones_home", "home_punto_dos_text");
  register_setting("opciones_home", "home_punto_tres_image");
  register_setting("opciones_home", "home_punto_tres_text");

  register_setting("opciones_home", "home_features_visibilidad");
  register_setting("opciones_home", "home_features_cabecera_title");
  register_setting("opciones_home", "home_features_cabecera_text");
  register_setting("opciones_home", "home_features_cabecera_image");
  register_setting("opciones_home", "home_features_uno_title");
  register_setting("opciones_home", "home_features_uno_text");
  register_setting("opciones_home", "home_features_dos_title");
  register_setting("opciones_home", "home_features_dos_text");
  register_setting("opciones_home", "home_features_tres_title");
  register_setting("opciones_home", "home_features_tres_text");

  register_setting("opciones_home", "home_carrusel_visibilidad");

}


function mybookinges_configuracion_home() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Titulo de la página -->

    <h1>
      Configuración de la página de inicio <br>
      <small>Ajustes para el template 'MyBooking Home'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Formulario ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('opciones_home'); ?>

      <!-- Seccion Cabecera -->

      <h2>Cabecera de la página de inicio</h2>
      <p>Configura el título y texto por defecto en la cabecera de la página de inicio.</p>

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

      <!-- Seccion Destacada -->

      <h2>Destacada</h2>
      <p>Configura el contenido de la sección destacada bajo la cabecera.</p>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_highlight_visibilidad" ); ?>
          <input type="checkbox" name="home_highlight_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la sección destacada</th>
          <td><input type="text" name="home_highlight_cabecera_title" size="40" value="<?php echo get_option('home_highlight_cabecera_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la sección destacada</th>
          <td><textarea name="home_highlight_cabecera_text" cols="37" rows="10"><?php echo get_option('home_highlight_cabecera_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Imagen punto 1</th>
          <td><input type="text" name="home_punto_uno_image" size="40" value="<?php echo get_option('home_punto_uno_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 1</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 1</th>
          <td><textarea name="home_punto_uno_text" cols="37" rows="10"><?php echo get_option('home_punto_uno_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Imagen punto 2</th>
          <td><input type="text" name="home_punto_dos_image" size="40" value="<?php echo get_option('home_punto_dos_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 2</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 2</th>
          <td><textarea name="home_punto_dos_text" cols="37" rows="10"><?php echo get_option('home_punto_dos_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Imagen punto 3</th>
          <td><input type="text" name="home_punto_tres_image" size="40" value="<?php echo get_option('home_punto_tres_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen del punto 3</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del punto 3</th>
          <td><textarea name="home_punto_tres_text" cols="37" rows="10"><?php echo get_option('home_punto_tres_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Seccion Features -->

      <h2>Features</h2>
      <p>Configura el contenido de la sección Features.</p>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_features_visibilidad" ); ?>
          <input type="checkbox" name="home_features_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la cabecera</th>
          <td><input type="text" name="home_features_cabecera_title" size="40" value="<?php echo get_option('home_features_cabecera_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la cabecera</th>
          <td><textarea name="home_features_cabecera_text" cols="37" rows="10"><?php echo get_option('home_features_cabecera_text'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Imagen de la cabecera</th>
          <td><input type="text" name="home_features_cabecera_image" size="40" value="<?php echo get_option('home_features_cabecera_image'); ?>" />
          <br><span class="description">Inserta la URL para la imagen de la cabecera</span></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature uno</th>
          <td><input type="text" name="home_features_uno_title" size="40" value="<?php echo get_option('home_features_uno_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature uno</th>
          <td><textarea name="home_features_uno_text" cols="37" rows="10"><?php echo get_option('home_features_uno_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature dos</th>
          <td><input type="text" name="home_features_dos_title" size="40" value="<?php echo get_option('home_features_dos_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature dos</th>
          <td><textarea name="home_features_dos_text" cols="37" rows="10"><?php echo get_option('home_features_dos_text'); ?></textarea></td>
        </tr>
      </table>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de Feature tres</th>
          <td><input type="text" name="home_features_tres_title" size="40" value="<?php echo get_option('home_features_tres_title'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de Feature tres</th>
          <td><textarea name="home_features_tres_text" cols="37" rows="10"><?php echo get_option('home_features_tres_text'); ?></textarea></td>
        </tr>
      </table>

      <hr>

      <!-- Seccion Carrusel -->

      <h2>Carrusel</h2>
      <p>Configura la visibilidad del carrusel de artículos de la portada.</p>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Visibilidad</th>
          <td>
          <?php $options = get_option( "home_carrusel_visibilidad" ); ?>
          <input type="checkbox" name="home_carrusel_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Marcar para activar la sección</span>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
