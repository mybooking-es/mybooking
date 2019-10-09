<?php
/**
*   PROMO POST TYPE
*   ---------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

function create_promo() {
  register_post_type( 'promo',
    array(
      'labels' => array(
        'name' => __('Promociones'),
        'singular_name' => __('Promoción'),
        'add_new' => __('Añadir promoción'),
        'add_new_item' => __('Nueva promoción'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar promoción'),
        'new_item' => __('Nueva promoción'),
        'view' => __('Ver'),
        'view_item' => __('Ver promoción'),
        'search_items' => __('Buscar promoción'),
        'not_found' => __('Ninguna promoción encontrada'),
        'not_found_in_trash' => __('Ninguna promoción encontrada en la Papelera'),
        'parent' => __('Promoción padre')
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
                'name' => __('Estados de la promoción'),
                'add_new_item' => __('Crea un nuevo estado para las promociones'),
                'new_item_name' => __('Nuevo estado')
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    if (!term_exists( __('Activo'), 'estado') ){
        wp_insert_term( __('Activo'), 'estado' );
    }
    if (!term_exists( __('Inactivo'), 'estado') ){
        wp_insert_term( __('Inactivo'), 'estado' );
    }
}
add_action( 'init', 'mybooking_create_promo_taxonomies', 0 );
?>
