<?php
/**
*   POPUP POST TYPE
*   ---------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

function create_popup() {
  register_post_type( 'popup',
    array(
      'labels' => array(
        'name' => __('Popups', 'mybooking'),
        'singular_name' => __('Popup', 'mybooking'),
        'add_new' => __('Añadir popup', 'mybooking'),
        'add_new_item' => __('Nuevo popup', 'mybooking'),
        'edit' => __('Editar', 'mybooking'),
        'edit_item' => __('Editar popup', 'mybooking'),
        'new_item' => __('Nuevo popup', 'mybooking'),
        'view' => __('Ver', 'mybooking'),
        'view_item' => __('Ver popup', 'mybooking'),
        'search_items' => __('Buscar popup', 'mybooking'),
        'not_found' => __('Ningún popup encontrado', 'mybooking'),
        'not_found_in_trash' => __('Ningún popup encontrado en la Papelera', 'mybooking'),
        'parent' => __('Popup padre', 'mybooking')
      ),
      'show_ui' => true,
      'public' => true,
      'show_in_menu' => 'config',
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-awards',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_popup' );
?>
