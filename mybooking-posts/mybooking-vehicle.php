<?php
/**
*   VEHICLE POST TYPE
*   -----------------
*
* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

function create_vehicle() {
  register_post_type( 'vehicle',
    array(
      'labels' => array(
        'name' => _x( 'Vehicles', 'vehicle_post_type', 'mybooking' ),
        'singular_name' => _x( 'Vehicle', 'vehicle_post_type', 'mybooking' ),
        'add_new' => _x( 'Add vehicle', 'vehicle_post_type', 'mybooking' ),
        'add_new_item' => _x( 'New vehicle', 'vehicle_post_type', 'mybooking' ),
        'edit' => _x( 'Edit', 'vehicle_post_type', 'mybooking' ),
        'edit_item' => _x( 'Edit vehicle','vehicle_post_type', 'mybooking' ),
        'new_item' => _x( 'New vehicle','vehicle_post_type', 'mybooking' ),
        'view' => _x( 'See','vehicle_post_type', 'mybooking' ),
        'view_item' => _x( 'See vehicle','vehicle_post_type', 'mybooking' ),
        'search_items' => _x( 'Search vehicle','vehicle_post_type', 'mybooking' ),
        'not_found' => _x( 'No vehicle found','vehicle_post_type', 'mybooking' ),
        'not_found_in_trash' => _x( 'No vehicle found on bin','vehicle_post_type', 'mybooking' ),
        'parent' => _x( 'Parent vehicle','vehicle_post_type', 'mybooking' )
      ),
      'show_ui' => true,
      'public' => true,
      'show_in_menu' => 'settings',
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
    add_meta_box(
        'vehicle-info',
        _x( 'Vehicle information', 'vehicle_post_type' ,'mybooking' ),
        'show_vehicle_info_meta_box',
        'vehicle',
        'normal',
        'default'
    );
}
add_action( 'admin_init', 'vehicle_info_meta_box' );

function show_vehicle_info_meta_box( $vehicle_info ) {
  $vehicle_type = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_type', true ) );
  $vehicle_price = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_price', true ) );
  $vehicle_brand = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_brand', true ) );
  $vehicle_model = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_model', true ) );
  $vehicle_doors = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_doors', true ) );
  $vehicle_places = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_places', true ) );
  $vehicle_fuel = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_fuel', true ) );
  $vehicle_drive = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_drive', true ) );
  $vehicle_color = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_color', true ) );
  $vehicle_km = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_km', true ) );
  $vehicle_year = esc_html( get_post_meta( $vehicle_info->ID, 'vehicle_info_year', true ) );
  ?>

  <table class="form-table">
    <tr valign="top">
      <th scope="row"><?php _ex('Type', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_type"
        value="<?php echo $vehicle_type; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Price', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_price"
        value="<?php echo $vehicle_price; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Brand', 'vehicle_post_type', 'mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_brand"
        value="<?php echo $vehicle_brand; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Model', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_model"
        value="<?php echo $vehicle_model; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Places', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_places"
        value="<?php echo $vehicle_places; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Doors', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_doors"
        value="<?php echo $vehicle_doors; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Fuel', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_fuel"
        value="<?php echo $vehicle_fuel; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Color', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_color"
        value="<?php echo $vehicle_color; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Km/miles', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_km"
        value="<?php echo $vehicle_km; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _ex('Year', 'vehicle_post_type','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="100"
        name="vehicle_info_year"
        value="<?php echo $vehicle_year; ?>" /><br>
      </td>
    </tr>
  </table>
  <?php
}

function add_vehicle_info_values( $vehicle_id, $vehicle_info ) {
  if ( $vehicle_info->post_type == 'vehicle' ) {

    if ( isset( $_POST['vehicle_info_type'] ) && $_POST['vehicle_info_type'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_type',
        $_POST['vehicle_info_type']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_type' );
    }

    if ( isset( $_POST['vehicle_info_price'] ) && $_POST['vehicle_info_price'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_price',
        $_POST['vehicle_info_price']
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

    if ( isset( $_POST['vehicle_info_places'] ) && $_POST['vehicle_info_places'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_places',
        $_POST['vehicle_info_places']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_places' );
    }

    if ( isset( $_POST['vehicle_info_doors'] ) && $_POST['vehicle_info_doors'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_doors',
        $_POST['vehicle_info_doors']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_doors' );
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

    if ( isset( $_POST['vehicle_info_km'] ) && $_POST['vehicle_info_km'] != '' ) {
      update_post_meta(
        $vehicle_id,
        'vehicle_info_km',
        $_POST['vehicle_info_km']
        );
    } else {
      delete_post_meta( $vehicle_id, 'vehicle_info_km' );
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
  }
}
add_action( 'save_post', 'add_vehicle_info_values', 10, 2 );
?>
