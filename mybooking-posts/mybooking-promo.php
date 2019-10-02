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

// TAXONOMIAS
function mybooking_create_promo_taxonomies() {
    register_taxonomy(
        'estado',
        'promo',
        array(
            'labels' => array(
                'name' => 'Estado de la promoción',
                'add_new_item' => 'Asigna un estado a la promoción',
                'new_item_name' => "Nuevo estado"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    if (!term_exists( 'Activo', 'estado') ){
        wp_insert_term( 'Activo', 'estado' );
    }
    if (!term_exists( 'Inactivo', 'estado') ){ 
        wp_insert_term( 'Inactivo', 'estado' );
    }
}
add_action( 'init', 'mybooking_create_promo_taxonomies', 0 );
?>
