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
        'name' => 'Testimonios',
        'singular_name' => 'Testimonio',
        'add_new' => 'Añadir testimonio',
        'add_new_item' => 'Nuevo testimonio',
        'edit' => 'Editar',
        'edit_item' => 'Editar testimonio',
        'new_item' => 'Nuevo testimonio',
        'view' => 'Ver',
        'view_item' => 'Ver testimonio',
        'search_items' => 'Buscar testimonio',
        'not_found' => 'Ningún testimonio encontrado',
        'not_found_in_trash' => 'Ningún testimonio encontrado en la Papelera',
        'parent' => 'Testimonio padre'
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
