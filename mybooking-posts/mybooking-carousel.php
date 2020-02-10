<?php
/**
*   CAROUSEL POST TYPE
*   --------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.3.0
*/

function create_carousel() {
  register_post_type( 'carousel',
    array(
      'labels' => array(
        'name' => __( 'Carrusel','mybooking' ),
        'singular_name' => __( 'Imagen del carrusel','mybooking' ),
        'add_new' => __( 'Añadir imagen de carrusel','mybooking' ),
        'add_new_item' => __( 'Nueva imagen de carrusel','mybooking' ),
        'edit' => __( 'Editar','mybooking' ),
        'edit_item' => __( 'Editar imagen de carrusel','mybooking' ),
        'new_item' => __( 'Nueva imagen de carrusel','mybooking' ),
        'view' => __( 'Ver','mybooking' ),
        'view_item' => __( 'Ver imagen de carrusel','mybooking' ),
        'search_items' => __( 'Buscar imagen de carrusel','mybooking' ),
        'not_found' => __( 'Ninguna imagen de carrusel encontrada','mybooking' ),
        'not_found_in_trash' => __( 'Ninguna imagen de carrusel encontrada en la Papelera','mybooking' ),
        'parent' => __( 'Imagen de carrusel superior','mybooking' )
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-images-alt2',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_carousel' );
?>
