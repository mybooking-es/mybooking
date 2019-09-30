<?php
/**
*		CONFIGURACIÓN DE LA EMPRESA
*  	---------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

add_action('admin_menu', 'mybookinges_crea_menu_info_negocio');
add_action('admin_init', 'mybookinges_registra_opciones_info_negocio');

function mybookinges_crea_menu_info_negocio() {
  if (!current_user_can('manage_options') || current_user_can('administrator'))
    add_submenu_page(
      "configuracion",
    	__("Información del negocio"),
    	__("Información del negocio"),
    	"edit_pages",
    	"info",
    	"mybookinges_configuracion_info_negocio"
    	);
}

function mybookinges_registra_opciones_info_negocio() {

  // Definición de opciones
  add_option("info_negocio_nombre","","","yes");
  add_option("info_negocio_razon_social","","","yes");
  add_option("info_negocio_nif","","","yes");

  add_option("info_negocio_direccion","","","yes");
  add_option("info_negocio_telefono","","","yes");
  add_option("info_negocio_email","","","yes");

  add_option("info_negocio_twitter_url","","","yes");
  add_option("info_negocio_facebook_url","","","yes");
  add_option("info_negocio_instagram_url","","","yes");
  add_option("info_negocio_linkedin_url","","","yes");

  add_option("contacto_seccion_titulo","","","yes");
  add_option("contacto_seccion_subtitulo","","","yes");
  add_option("contacto_mapa_url","","","yes");

  // Registro de opciones
  register_setting("opciones_info_negocio", "info_negocio_nombre");
  register_setting("opciones_info_negocio", "info_negocio_razon_social");
  register_setting("opciones_info_negocio", "info_negocio_nif");

  register_setting("opciones_info_negocio", "info_negocio_direccion");
  register_setting("opciones_info_negocio", "info_negocio_telefono");
  register_setting("opciones_info_negocio", "info_negocio_email");

  register_setting("opciones_info_negocio", "info_negocio_twitter_url");
  register_setting("opciones_info_negocio", "info_negocio_facebook_url");
  register_setting("opciones_info_negocio", "info_negocio_instagram_url");
  register_setting("opciones_info_negocio", "info_negocio_linkedin_url");

  register_setting("opciones_info_negocio", "contacto_seccion_titulo");
  register_setting("opciones_info_negocio", "contacto_seccion_subtitulo");
  register_setting("opciones_info_negocio", "contacto_mapa_url");

}

function mybookinges_configuracion_info_negocio() {
  if (!current_user_can('edit_pages'))
      wp_die(__("No tienes acceso a esta página."));
  ?>

  <div class="wrap">

    <!-- Titulo de la página -->

    <h1>
      Información del negocio<br>
      <small>Aparece en varios lugares del tema, incluyendo el template 'MyBooking Contacto'</small>
    </h1>

    <hr>

    <?php settings_errors(); ?>

    <!-- Formulario ----------------------------------------------------------->

    <form method="post" action="options.php">

      <?php settings_fields('opciones_info_negocio'); ?>

      <!-- Información corporativa -->

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Denominación del negocio</th>
          <td><input type="text" name="info_negocio_nombre" size="40" value="<?php echo get_option('info_negocio_nombre'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Razón social</th>
          <td><input type="text" name="info_negocio_razon_social" size="40" value="<?php echo get_option('info_negocio_razon_social'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Número de Identificación Fiscal</th>
          <td><input type="text" name="info_negocio_nif" size="40" value="<?php echo get_option('info_negocio_nif'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Información de contacto -->

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Dirección postal</th>
          <td><input type="text" name="info_negocio_direccion" size="40" value="<?php echo get_option('info_negocio_direccion'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Teléfono de contacto</th>
          <td><input type="text" name="info_negocio_telefono" size="40" value="<?php echo get_option('info_negocio_telefono'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Email de contacto</th>
          <td><input type="text" name="info_negocio_email" size="40" value="<?php echo get_option('info_negocio_email'); ?>" /></td>
        </tr>
      </table>

      <hr>

      <!-- Redes sociales -->

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Perfil de Twitter</th>
          <td><input type="text" name="info_negocio_twitter_url" size="40" value="<?php echo get_option('info_negocio_twitter_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Twitter</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Perfil de Facebook</th>
          <td><input type="text" name="info_negocio_telefono" size="40" value="<?php echo get_option('info_negocio_telefono'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Facebook</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Perfil de Instagram</th>
          <td><input type="text" name="info_negocio_instagram_url" size="40" value="<?php echo get_option('info_negocio_instagram_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de Instagram</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Perfil de LinkedIn</th>
          <td><input type="text" name="info_negocio_linkedin_url" size="40" value="<?php echo get_option('info_negocio_linkedin_url'); ?>" />
          <br><span class="description">Pega aquí la URL del perfil de LinkedIn</span></td>
        </tr>
      </table>

      <hr>

      <!-- Ajustes del template Contacto -->

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la sección</th>
          <td><input type="text" name="contacto_seccion_titulo" size="40" value="<?php echo get_option('contacto_seccion_titulo'); ?>" />
          <br><span class="description">Aparece en la columna de información del template Mybooking-contact</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Subtítulo de la sección</th>
          <td><input type="text" name="contacto_seccion_subtitulo" size="40" value="<?php echo get_option('contacto_seccion_subtitulo'); ?>" />
          <br><span class="description">Aparece en la columna de información del template Mybooking-contact</span></td>
        </tr>
        <tr valign="top">
          <th scope="row">Mapa de localización</th>
          <td><input type="text" name="contacto_mapa_url" size="40" value="<?php echo get_option('contacto_mapa_url'); ?>" />
          <br><span class="description">Pega aquí la URL del mapa en Google Maps</span></td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="home_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
