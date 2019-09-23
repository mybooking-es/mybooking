<?php
/**
*		CONFIGURACIÓN DE LA HOME
*  	------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/


add_action('admin_menu', 'mybookinges_crea_menu_configuracion');
add_action('admin_init', 'mybookinges_registra_opciones_configuracion');

function mybookinges_crea_menu_configuracion() {
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
    	__("Configuración de portada"),
    	__("Configuración de portada"),
    	"edit_pages",
    	"configuracion",
    	"mybookinges_configuracion_home"
    	);
}

function mybookinges_registra_opciones_configuracion() {

  // Definición de opciones
  add_option("home_hero_title","","","yes");
  add_option("home_hero_text","","","yes");

  // Registro de opciones
  register_setting("opciones_home", "home_hero_title");
  register_setting("opciones_home", "home_hero_text");

}

function mybookinges_configuracion_home() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Titulo de la página -->

    <h1><span class="dashicons dashicons-admin-generic" style="font-size: 2rem; margin-right: 1rem;"></span> Configuración de portada <small>- Opciones de configuración para la página de inicio</small></h1>

    <?php settings_errors(); ?>

    <!-- Formulario -->

    <form method="post" action="options.php">

      <?php settings_fields('opciones_home'); ?>

      <!-- Seccion Hero -->
      <h2>Hero</h2>
      <p>Configura el título y texto por defecto en el top de la página de inicio, junto al formulario de selección de fechas.</p>
      <hr>

      <h2>Eslogan de portada</h2>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título del eslogan</th>
          <td><input type="text" name="home_hero_title" size="40" value="<?php echo get_option('home_hero_title'); ?>" />
          <br><span class="description">Añade un titulo personalizado para el top de la página</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del eslogan</th>
          <td><textarea name="home_hero_text" cols="37" rows="10"><?php echo get_option('home_hero_text'); ?></textarea>
          <br><span class="description">Añade un texto personalizado para el top de la página</span></td>
        </tr>
      </table>

      <hr>

      

      <p class="submit">
      	<input name="configuracion_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
