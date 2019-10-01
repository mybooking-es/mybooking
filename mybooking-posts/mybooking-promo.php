<?php
/**
*   PROMO POST TYPE
*   ---------------
*   Autor: Hector Asencio @Mybooking
*   Versión: 0.0.1
*   @package Understrap Mybooking Child
*
*/
function create_promo() {
  register_post_type( 'promo',
    array(
      'labels' => array(
        'name' => 'Promociones',
        'singular_name' => 'Promoción',
        'add_new' => 'Añadir promoción',
        'add_new_item' => 'Nueva promoción',
        'edit' => 'Editar',
        'edit_item' => 'Editar promoción',
        'new_item' => 'Nueva promoción',
        'view' => 'Ver',
        'view_item' => 'Ver promoción',
        'search_items' => 'Buscar promoción',
        'not_found' => 'Ninguna promoción encontrada',
        'not_found_in_trash' => 'Ninguna promoción encontrada en la Papelera',
        'parent' => 'Promoción padre'
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-awards',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_promo' );
?>
