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
        'name' => __('Anuncios Emergentes', 'mybooking'),
        'singular_name' => __('Anuncio Emergente', 'mybooking'),
        'add_new' => __('Añadir anuncio emergente', 'mybooking'),
        'add_new_item' => __('Nuevo anuncio emergente', 'mybooking'),
        'edit' => __('Editar', 'mybooking'),
        'edit_item' => __('Editar anuncio emergente', 'mybooking'),
        'new_item' => __('Nuevo anuncio emergente', 'mybooking'),
        'view' => __('Ver', 'mybooking'),
        'view_item' => __('Ver anuncio emergente', 'mybooking'),
        'search_items' => __('Buscar anuncio emergente', 'mybooking'),
        'not_found' => __('Ningún anuncio emergente encontrado', 'mybooking'),
        'not_found_in_trash' => __('Ningún anuncio emergente encontrado en la Papelera', 'mybooking'),
        'parent' => __('Anuncio Emergente padre', 'mybooking')
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
