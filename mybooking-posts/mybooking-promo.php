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
        'name' => __('Promociones', 'mybooking'),
        'singular_name' => __('Promoción', 'mybooking'),
        'add_new' => __('Añadir promoción', 'mybooking'),
        'add_new_item' => __('Nueva promoción', 'mybooking'),
        'edit' => __('Editar', 'mybooking'),
        'edit_item' => __('Editar promoción', 'mybooking'),
        'new_item' => __('Nueva promoción', 'mybooking'),
        'view' => __('Ver', 'mybooking'),
        'view_item' => __('Ver promoción', 'mybooking'),
        'search_items' => __('Buscar promoción', 'mybooking'),
        'not_found' => __('Ninguna promoción encontrada', 'mybooking'),
        'not_found_in_trash' => __('Ninguna promoción encontrada en la Papelera', 'mybooking'),
        'parent' => __('Promoción padre', 'mybooking')
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
                'name' => __('Estados de la promoción', 'mybooking'),
                'add_new_item' => __('Crea un nuevo estado para las promociones', 'mybooking'),
                'new_item_name' => __('Nuevo estado', 'mybooking')
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
