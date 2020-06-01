<?php
/**
*   VEHICLE POST TYPE
*   -----------------
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

function create_vehicle() {
  register_post_type( 'vehicle',
    array(
      'labels' => array(
        'name' => __( 'Vehículos','mybooking' ),
        'singular_name' => __( 'Vehículo','mybooking' ),
        'add_new' => __( 'Añadir vehículo','mybooking' ),
        'add_new_item' => __( 'Nuevo vehículo','mybooking' ),
        'edit' => __( 'Editar','mybooking' ),
        'edit_item' => __( 'Editar vehículo','mybooking' ),
        'new_item' => __( 'Nuevo vehículo','mybooking' ),
        'view' => __( 'Ver','mybooking' ),
        'view_item' => __( 'Ver vehículo','mybooking' ),
        'search_items' => __( 'Buscar vehículo','mybooking' ),
        'not_found' => __( 'Ningún vehículo encontrado','mybooking' ),
        'not_found_in_trash' => __( 'Ningún vehículo encontrado en la Papelera','mybooking' ),
        'parent' => __( 'Vehículo superior','mybooking' )
      ),
      'show_ui' => true,
      'public' => true,
      'show_in_menu' => 'config',
      'show_in_rest' => true, // Gutenberg activation!
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-id',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_vehicle' );

// METABOX
function vehicle_info_meta_box() {
    add_meta_box( 'vehicle-info',
        __( 'Información del vehículo','mybooking' ),
        'show_vehicle_info_meta_box',
        'vehicle',
        'normal',
        'default'
    );
}
add_action( 'admin_init', 'vehicle_info_meta_box' );

function show_vehicle_info_meta_box( $vehicle_info ) {
  $vehicle_price_auto = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_price_auto', true ) );
  $vehicle_price_manual = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_price_manual', true ) );
  $vehicle_price_diesel = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_price_diesel', true ) );
  $vehicle_brand = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_brand', true ) );
  $vehicle_model = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_model', true ) );
  $vehicle_year = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_year', true ) );
  $vehicle_displacement = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_displacement', true ) );
  $vehicle_power = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_power', true ) );
  $vehicle_km = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_km', true ) );
  $vehicle_fuel = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_fuel', true ) );
  $vehicle_drive = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_drive', true ) );
  $vehicle_color = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_color', true ) );
  $vehicle_places = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_places', true ) );
  $vehicle_warranty = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_warranty', true ) );
  ?>

  <table class="form-table">
    <tr valign="top">
      <th scope="row"><?php _e('Marca','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_brand"
        value="<?php echo $vehicle_brand; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Modelo','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_model"
        value="<?php echo $vehicle_model; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Año de matriculación','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_year"
        value="<?php echo $vehicle_year; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Cilindrada','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_displacement"
        value="<?php echo $vehicle_displacement; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Potencia','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_power"
        value="<?php echo $vehicle_power; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Kilometraje','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_km"
        value="<?php echo $vehicle_km; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Combutible','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_fuel"
        value="<?php echo $vehicle_fuel; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Cambio','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="vehicle_info_drive"
        value="<?php echo $vehicle_drive; ?>" /><br>
      </td>
      <tr valign="top">
        <th scope="row"><?php _e('Color','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_color"
          value="<?php echo $vehicle_color; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Plazas','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_places"
          value="<?php echo $vehicle_places; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Garantia','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_warranty"
          value="<?php echo $vehicle_warranty; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Automático)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_price_auto"
          value="<?php echo $vehicle_price_auto; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Manual)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_price_manual"
          value="<?php echo $vehicle_price_manual; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Diesel)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="vehicle_info_price_diesel"
          value="<?php echo $vehicle_price_diesel; ?>" /><br>
        </td>
      </tr>
    </tr>
  </table>
  <?php
}

function add_vehicle_info_values( $vehicle_id, $vehicle_info ) {
  if ( $vehicle_info->post_type == 'vehicle' ) {

    if ( isset( $_POST['vehicle_info_price_auto'] ) && $_POST['vehicle_info_price_auto'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_price_auto',
        $_POST['vehicle_info_price_auto']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_price_auto' );
    }

    if ( isset( $_POST['vehicle_info_price_manual'] ) && $_POST['vehicle_info_price_manual'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_price_manual',
        $_POST['vehicle_info_price_manual']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_price_manual' );
    }

    if ( isset( $_POST['vehicle_info_price_diesel'] ) && $_POST['vehicle_info_price_diesel'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_price_diesel',
        $_POST['vehicle_info_price_diesel']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_price_diesel' );
    }

    if ( isset( $_POST['vehicle_info_model'] ) && $_POST['vehicle_info_model'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_model',
        $_POST['vehicle_info_model']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_model' );
    }

    if ( isset( $_POST['vehicle_info_brand'] ) && $_POST['vehicle_info_brand'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_brand',
        $_POST['vehicle_info_brand']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_brand' );
    }

    if ( isset( $_POST['vehicle_info_brand'] ) && $_POST['vehicle_info_brand'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_brand',
        $_POST['vehicle_info_brand']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_brand' );
    }

    if ( isset( $_POST['vehicle_info_year'] ) && $_POST['vehicle_info_year'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_year',
        $_POST['vehicle_info_year']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_year' );
    }

    if ( isset( $_POST['vehicle_info_displacement'] ) && $_POST['vehicle_info_displacement'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_displacement',
        $_POST['vehicle_info_displacement']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_displacement' );
    }

    if ( isset( $_POST['vehicle_info_power'] ) && $_POST['vehicle_info_power'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_power',
        $_POST['vehicle_info_power']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_power' );
    }

    if ( isset( $_POST['vehicle_info_km'] ) && $_POST['vehicle_info_km'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_km',
        $_POST['vehicle_info_km']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_km' );
    }

    if ( isset( $_POST['vehicle_info_fuel'] ) && $_POST['vehicle_info_fuel'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_fuel',
        $_POST['vehicle_info_fuel']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_fuel' );
    }

    if ( isset( $_POST['vehicle_info_drive'] ) && $_POST['vehicle_info_drive'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_drive',
        $_POST['vehicle_info_drive']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_drive' );
    }

    if ( isset( $_POST['vehicle_info_color'] ) && $_POST['vehicle_info_color'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_color',
        $_POST['vehicle_info_color']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_color' );
    }

    if ( isset( $_POST['vehicle_info_places'] ) && $_POST['vehicle_info_places'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_places',
        $_POST['vehicle_info_places']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_places' );
    }

    if ( isset( $_POST['vehicle_info_warranty'] ) && $_POST['vehicle_info_warranty'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_warranty',
        $_POST['vehicle_info_warranty']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_warranty' );
    }
  }
}
add_action( 'save_post', 'add_vehicle_info_values', 10, 2 );
?>
