<?php
/**
*		CONFIGURACIÓN DE LA EMPRESA
*  	---------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

add_action('admin_menu', 'mybookinges_crea_menu_info');
add_action('admin_init', 'mybookinges_registra_opciones_info');

function mybookinges_crea_menu_info() {
  if (!current_user_can('manage_options') || current_user_can('administrator'))
    add_submenu_page(
      "configuracion",
    	__("Información del negocio"),
    	__("Información del negocio"),
    	"edit_pages",
    	"contacto",
    	"mybookinges_configuracion_info"
    	);
}

function mybookinges_registra_opciones_info() {

  // Definición de opciones
  add_option("home_proyectos_titulo_seccion","","","yes");

  // Registro de opciones
  register_setting("opciones_info", "home_proyectos_titulo_seccion");

}

function mybookinges_configuracion_info() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Titulo de la página -->

    <h1>
      Configuración de datos de contacto del negocio<br>
      <small>Ajustes para el template 'MyBooking Contacto'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Formulario -->

    <form method="post" action="options.php">

      <?php settings_fields('opciones_info'); ?>



      <p class="submit">
      	<input name="home_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
