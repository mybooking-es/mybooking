<?php
/**
*		CONFIGURACIÓN DE CONTACTO
*  	-------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

add_action('admin_menu', 'mybookinges_crea_menu_contacto');
add_action('admin_init', 'mybookinges_registra_opciones_contacto');

function mybookinges_crea_menu_contacto() {
  if (!current_user_can('manage_options') || current_user_can('administrator'))
    add_submenu_page(
      "configuracion",
    	__("Contacto"),
    	__("Contacto"),
    	"edit_pages",
    	"contacto",
    	"mybookinges_configuracion_contacto"
    	);
}

function mybookinges_registra_opciones_contacto() {

  // Definición de opciones
  add_option("home_proyectos_titulo_seccion","","","yes");

  // Registro de opciones
  register_setting("opciones_contacto", "home_proyectos_titulo_seccion");

}

function mybookinges_configuracion_contacto() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Titulo de la página -->

    <h1>
      Configuración de la página de Contacto <br>
      <small>Ajustes para el template 'MyBooking Contacto'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Formulario -->

    <form method="post" action="options.php">

      <?php settings_fields('opciones_contacto'); ?>



      <p class="submit">
      	<input name="home_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
