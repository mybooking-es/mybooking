<?php
/**
*   TESTIMONIAL POST TYPE
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

function create_testimonial() {
  register_post_type( 'testimonial',
    array(
      'labels' => array(
        'name' => __('Testimonios'),
        'singular_name' => __('Testimonio'),
        'add_new' => __('Añadir testimonio'),
        'add_new_item' => __('Nuevo testimonio'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar testimonio'),
        'new_item' => __('Nuevo testimonio'),
        'view' => __('Ver'),
        'view_item' => __('Ver testimonio'),
        'search_items' => __('Buscar testimonio'),
        'not_found' => __('Ningún testimonio encontrado'),
        'not_found_in_trash' => __('Ningún testimonio encontrado en la Papelera'),
        'parent' => __('Testimonio padre')
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-format-quote',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_testimonial' );
?>
