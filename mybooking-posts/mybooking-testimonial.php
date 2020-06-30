<?php
/**
*   TESTIMONIAL POST TYPE
*   ---------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

function create_testimonial() {
  register_post_type( 'testimonial',
    array(
      'labels' => array(
        'name' => __('Testimonios', 'mybooking'),
        'singular_name' => __('Testimonio', 'mybooking'),
        'add_new' => __('Añadir testimonio', 'mybooking'),
        'add_new_item' => __('Nuevo testimonio', 'mybooking'),
        'edit' => __('Editar', 'mybooking'),
        'edit_item' => __('Editar testimonio', 'mybooking'),
        'new_item' => __('Nuevo testimonio', 'mybooking'),
        'view' => __('Ver', 'mybooking'),
        'view_item' => __('Ver testimonio', 'mybooking'),
        'search_items' => __('Buscar testimonio', 'mybooking'),
        'not_found' => __('Ningún testimonio encontrado', 'mybooking'),
        'not_found_in_trash' => __('Ningún testimonio encontrado en la Papelera', 'mybooking'),
        'parent' => __('Testimonio padre', 'mybooking')
      ),
      'show_ui' => true,
      'public' => true,
      'show_in_menu' => 'settings',
      // 'show_in_rest' => true, // Gutenberg activation!
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-format-quote',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_testimonial' );
?>
