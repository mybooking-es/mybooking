<?php
/**
*		GLOBAL CONFIGURATION
*  	--------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*
*   Topbar activation
*   Toggle button align
*   Navigation panels
*   Footer layout
*   Choose page layout (deprecated)
*   Module activation
*   Contact page settings
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

  // Define options
  add_option("global_topbar","","","yes");
  add_option("global_topbar_message","","","yes");

  add_option("global_navigation_layout","","","yes");

  add_option("global_navigation_panel_one","","","yes");
  add_option("global_navigation_image_one","","","yes");
  add_option("global_navigation_title_one","","","yes");
  add_option("global_navigation_panel_two","","","yes");
  add_option("global_navigation_image_two","","","yes");
  add_option("global_navigation_title_two","","","yes");

  add_option("global_footer_layout","","","yes");

  add_option("global_testimonials_active","","","yes");
  add_option("global_promo_active","","","yes");
  add_option("global_vehicle_active","","","yes");

  add_option("contact_section_title","","","yes");
  add_option("contact_section_subtitle","","","yes");
  add_option("contact_section_text","","","yes");
  add_option("contact_map_code","","","yes");

  // Register options
  register_setting("options_global", "global_topbar");
  register_setting("options_global", "global_topbar_message");

  register_setting("options_global", "global_navigation_layout");

  register_setting("options_global", "global_navigation_panel_one");
  register_setting("options_global", "global_navigation_image_one");
  register_setting("options_global", "global_navigation_title_one");
  register_setting("options_global", "global_navigation_panel_two");
  register_setting("options_global", "global_navigation_image_two");
  register_setting("options_global", "global_navigation_title_two");

  register_setting("options_global", "global_footer_layout");

  register_setting("options_global", "global_testimonial_active");
  register_setting("options_global", "global_promo_active");
  register_setting("options_global", "global_vehicle_active");

  register_setting("options_company_info", "contact_section_title");
  register_setting("options_company_info", "contact_section_subtitle");
  register_setting("options_company_info", "contact_section_text");
  register_setting("options_company_info", "contact_map_code");
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

      <!-- Topbar -->

      <h2><?php _e('Topbar', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Activa o desactiva el topbar global', 'mybooking') ?></th>
          <td>
            <?php $topbar_active = get_option( "global_topbar" ); ?>
            <input type="checkbox" name="global_topbar" <?php checked( $topbar_active, 1 ); ?> value="1"> <span class="description"><?php _e('Selecciona para activar el topbar', 'mybooking') ?></span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mensaje destacado', 'mybooking') ?></th>
          <td>
            <?php $topbar_active = get_option( "global_topbar_message" ); ?>
            <textarea name="global_topbar_message" cols="37" rows="10"><?php echo get_option('global_topbar_message'); ?></textarea>
            <br><span class="description"><?php _e( 'Añade encima del topbar un texto o html destacado.', 'mybooking' ) ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <!-- Navigation -->

      <h2><?php _e('Navegación', 'mybooking') ?></h2>

      <table class="form-table">

        <!-- Toggle button align -->
        <tr valign="top">
          <th scope="row"><?php _e( 'Escoge el estilo de navegación para móvil', 'mybooking' ) ?></th>
          <td>
            <?php $options_navigation = get_option( "global_navigation_layout" ); ?>
            <input type="radio" name="global_navigation_layout" <?php checked( $options_navigation, 0 ); ?> value="0"> <span class="description"><strong><?php _e('Menú a la derecha', 'mybooking') ?></strong></span><br><br>
            <input type="radio" name="global_navigation_layout" <?php checked( $options_navigation, 1 ); ?> value="1"> <span class="description"><strong><?php _e('Menú a la izquierda','mybooking') ?></strong></span>
          </td>
        </tr>

        <!-- Panel 1 -->
        <tr valign="top">
          <th scope="row"><?php _e( 'Activar Panel 1', 'mybooking' ) ?></th>
          <td>
            <?php $panel_one_active = get_option( "global_navigation_panel_one" ); ?>
            <input type="checkbox" name="global_navigation_panel_one" <?php checked( $panel_one_active, 1 ); ?> value="1"> <span class="description"><?php _e( 'Activa el panel desplegable uno', 'mybooking' ) ?></span>
          </td>
        </tr>

        <?php if ( $panel_one_active == 1 ) { ?>
          <tr valign="top">
            <th scope="row"><?php _e( 'Icono del panel 1', 'mybooking' ) ?></th>
            <td>
              <input type="text" name="global_navigation_image_one" size="40" value="<?php echo get_option( 'global_navigation_image_one' ); ?>" />
              <br><span class="description"><?php _e( 'Pega aquí la URL del icono para el panel uno', 'mybooking' ) ?></span>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e( 'Título Panel ', 'mybooking' ) ?></th>
            <td>
              <input type="text" name="global_navigation_title_one" size="40" value="<?php echo get_option( 'global_navigation_title_one' ); ?>" />
            </td>
          </tr>
        <?php } ?>

        <!-- Panel 2 -->
        <tr valign="top">
          <th scope="row"><?php _e( 'Activar Panel 2', 'mybooking' ) ?></th>
          <td>
            <?php $panel_two_active = get_option( "global_navigation_panel_two" ); ?>
            <input type="checkbox" name="global_navigation_panel_two" <?php checked( $panel_two_active, 1 ); ?> value="1"> <span class="description"><?php _e( 'Activa el panel desplegable dos', 'mybooking' ) ?></span>
          </td>
        </tr>

        <?php if ( $panel_two_active == 1 ) { ?>
          <tr valign="top">
            <th scope="row"><?php _e( 'Icono del panel 2', 'mybooking' ) ?></th>
            <td>
              <input type="text" name="global_navigation_image_two" size="40" value="<?php echo get_option( 'global_navigation_image_two' ); ?>" />
              <br><span class="description"><?php _e( 'Pega aquí la URL del icono para el panel dos', 'mybooking' ) ?></span>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e( 'Título Panel 2', 'mybooking' ) ?></th>
            <td>
              <input type="text" name="global_navigation_title_two" size="40" value="<?php echo get_option( 'global_navigation_title_two' ); ?>" />
            </td>
          </tr>
        <?php } ?>
      </table>

      <hr>

      <!-- Footer -->

      <h2><?php _e('Pie de página', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Footer', 'mybooking') ?></th>
          <td>
            <?php $options_footer = get_option( "global_footer_layout" ); ?>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 0 ); ?> value="0"> <span class="description"><strong><?php _e('Normal', 'mybooking') ?></strong><br><?php _e('Muestra cuatro columnas para widgets, información corporativa y enlaces sociales', 'mybooking') ?></span><br><br>
            <input type="radio" name="global_footer_layout" <?php checked( $options_footer, 1 ); ?> value="1"> <span class="description"><strong><?php _e('Mínimal','mybooking') ?></strong><br><?php _e('Solo muestra el copyright', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <!-- Modules -->

      <h2><?php _e('Módulos extra', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Selecciona los módulos que quieras activar', 'mybooking') ?></th>
          <td>
            <?php $testimonial_active = get_option( "global_testimonial_active" ); ?>
            <input type="checkbox" name="global_testimonial_active" <?php checked( $testimonial_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Testimonios', 'mybooking') ?></span>
          <br>
            <?php $promo_active = get_option( "global_promo_active" ); ?>
            <input type="checkbox" name="global_promo_active" <?php checked( $promo_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Promociones', 'mybooking') ?></span>
          <br>
            <?php $vehicle_active = get_option( "global_vehicle_active" ); ?>
            <input type="checkbox" name="global_vehicle_active" <?php checked( $vehicle_active, 1 ); ?> value="1"> <span class="description"><?php _e('Activar el módulo Vehículos', 'mybooking') ?></span>
          </td>
        </tr>
      </table>

      <hr>

      <!-- Contact page setup -->

      <h2><?php _e('Página Contacto', 'mybooking') ?></h2>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Título de la sección', 'mybooking') ?></th>
          <td><input type="text" name="contact_section_title" size="40" value="<?php echo get_option('contact_section_title'); ?>" />
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Subtítulo de la sección', 'mybooking') ?></th>
          <td><input type="text" name="contact_section_subtitle" size="40" value="<?php echo get_option('contact_section_subtitle'); ?>" />
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Texto de la sección', 'mybooking') ?></th>
          <td><textarea name="contact_section_text" cols="37" rows="10"><?php echo get_option('contact_section_text'); ?></textarea>
          <br><span class="description"><?php _e('Aparece en el template Mybooking-contact', 'mybooking') ?></span></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php _e('Mapa de localización', 'mybooking') ?></th>
          <td><textarea name="contact_map_code" cols="37" rows="10"><?php echo get_option('contact_map_code'); ?></textarea>
          <br><span class="description"><?php _e('Pega aquí el código de Google Maps', 'mybooking') ?></span></td>
        </tr>
      </table>

      <hr>

      <p class="submit">
      	<input name="global_save" type="submit" class="button-primary" value="<?php _e('Guardar cambios', 'mybooking') ?>" />
      </p>

    </form>
  </div>
<?php } ?>
