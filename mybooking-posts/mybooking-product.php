<?php
/**
*   PRODUCT POST TYPE
*   -----------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

function create_product() {
  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __('Productos','mybooking'),
        'singular_name' => __('Producto','mybooking'),
        'add_new' => __('Añadir producto','mybooking'),
        'add_new_item' => __('Nuevo producto','mybooking'),
        'edit' => __('Editar','mybooking'),
        'edit_item' => __('Editar producto','mybooking'),
        'new_item' => __('Nuevo producto','mybooking'),
        'view' => __('Ver','mybooking'),
        'view_item' => __('Ver producto','mybooking'),
        'search_items' => __('Buscar producto','mybooking'),
        'not_found' => __('Ningún producto encontrado','mybooking'),
        'not_found_in_trash' => __('Ningún producto encontrado en la Papelera','mybooking'),
        'parent' => __('Producto superior','mybooking')
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-id',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_product' );

// METABOX
function product_info_meta_box() {
    add_meta_box( 'product-info',
        __('Información del producto','mybooking'),
        'show_product_info_meta_box',
        'product',
        'normal',
        'default'
    );
}
add_action( 'admin_init', 'product_info_meta_box' );

function show_product_info_meta_box( $product_info ) {
  $info_price_auto = esc_html( get_post_meta( $product_info->ID, 'product_info_price_auto', true ) );
  $info_price_manual = esc_html( get_post_meta( $product_info->ID, 'product_info_price_manual', true ) );
  $info_price_diesel = esc_html( get_post_meta( $product_info->ID, 'product_info_price_diesel', true ) );
  $info_brand = esc_html( get_post_meta( $product_info->ID, 'product_info_brand', true ) );
  $info_model = esc_html( get_post_meta( $product_info->ID, 'product_info_model', true ) );
  $info_year = esc_html( get_post_meta( $product_info->ID, 'product_info_year', true ) );
  $info_displacement = esc_html( get_post_meta( $product_info->ID, 'product_info_displacement', true ) );
  $info_power = esc_html( get_post_meta( $product_info->ID, 'product_info_power', true ) );
  $info_km = esc_html( get_post_meta( $product_info->ID, 'product_info_km', true ) );
  $info_fuel = esc_html( get_post_meta( $product_info->ID, 'product_info_fuel', true ) );
  $info_drive = esc_html( get_post_meta( $product_info->ID, 'product_info_drive', true ) );
  $info_color = esc_html( get_post_meta( $product_info->ID, 'product_info_color', true ) );
  $info_places = esc_html( get_post_meta( $product_info->ID, 'product_info_places', true ) );
  $info_warranty = esc_html( get_post_meta( $product_info->ID, 'product_info_warranty', true ) );
  ?>

  <table class="form-table">
    <tr valign="top">
      <th scope="row"><?php _e('Marca','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_brand"
        value="<?php echo $info_brand; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Modelo','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_model"
        value="<?php echo $info_model; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Año de matriculación','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_year"
        value="<?php echo $info_year; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Cilindrada','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_displacement"
        value="<?php echo $info_displacement; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Potencia','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_power"
        value="<?php echo $info_power; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Kilometraje','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_km"
        value="<?php echo $info_km; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Combutible','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_fuel"
        value="<?php echo $info_fuel; ?>" /><br>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Cambio','mybooking') ?></th>
      <td>
        <input
        type="text"
        size="40"
        name="product_info_drive"
        value="<?php echo $info_drive; ?>" /><br>
      </td>
      <tr valign="top">
        <th scope="row"><?php _e('Color','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_color"
          value="<?php echo $info_color; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Plazas','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_places"
          value="<?php echo $info_places; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Garantia','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_warranty"
          value="<?php echo $info_warranty; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Automático)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_price_auto"
          value="<?php echo $info_price_auto; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Manual)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_price_manual"
          value="<?php echo $info_price_manual; ?>" /><br>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Precio (Diesel)','mybooking') ?></th>
        <td>
          <input
          type="text"
          size="40"
          name="product_info_price_diesel"
          value="<?php echo $info_price_diesel; ?>" /><br>
        </td>
      </tr>
    </tr>
  </table>
  <?php
}

function add_product_info_values( $info_id, $product_info ) {
  if ( $product_info->post_type == 'product' ) {

    if ( isset( $_POST['product_info_price_auto'] ) && $_POST['product_info_price_auto'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_price_auto',
        $_POST['product_info_price_auto']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_price_auto' );
    }

    if ( isset( $_POST['product_info_price_manual'] ) && $_POST['product_info_price_manual'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_price_manual',
        $_POST['product_info_price_manual']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_price_manual' );
    }

    if ( isset( $_POST['product_info_price_diesel'] ) && $_POST['product_info_price_diesel'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_price_diesel',
        $_POST['product_info_price_diesel']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_price_diesel' );
    }

    if ( isset( $_POST['product_info_model'] ) && $_POST['product_info_model'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_model',
        $_POST['product_info_model']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_model' );
    }

    if ( isset( $_POST['product_info_brand'] ) && $_POST['product_info_brand'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_brand',
        $_POST['product_info_brand']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_brand' );
    }

    if ( isset( $_POST['product_info_brand'] ) && $_POST['product_info_brand'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_brand',
        $_POST['product_info_brand']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_brand' );
    }

    if ( isset( $_POST['product_info_year'] ) && $_POST['product_info_year'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_year',
        $_POST['product_info_year']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_year' );
    }

    if ( isset( $_POST['product_info_displacement'] ) && $_POST['product_info_displacement'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_displacement',
        $_POST['product_info_displacement']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_displacement' );
    }

    if ( isset( $_POST['product_info_power'] ) && $_POST['product_info_power'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_power',
        $_POST['product_info_power']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_power' );
    }

    if ( isset( $_POST['product_info_km'] ) && $_POST['product_info_km'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_km',
        $_POST['product_info_km']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_km' );
    }

    if ( isset( $_POST['product_info_fuel'] ) && $_POST['product_info_fuel'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_fuel',
        $_POST['product_info_fuel']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_fuel' );
    }

    if ( isset( $_POST['product_info_drive'] ) && $_POST['product_info_drive'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_drive',
        $_POST['product_info_drive']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_drive' );
    }

    if ( isset( $_POST['product_info_color'] ) && $_POST['product_info_color'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_color',
        $_POST['product_info_color']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_color' );
    }

    if ( isset( $_POST['product_info_places'] ) && $_POST['product_info_places'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_places',
        $_POST['product_info_places']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_places' );
    }

    if ( isset( $_POST['product_info_warranty'] ) && $_POST['product_info_warranty'] != '' ) {
      update_post_meta(
        $info_id,
        'product_info_warranty',
        $_POST['product_info_warranty']
        );
    } else {
      delete_post_meta( $info_id, 'product_info_warranty' );
    }
  }
}
add_action( 'save_post', 'add_product_info_values', 10, 2 );
?>
