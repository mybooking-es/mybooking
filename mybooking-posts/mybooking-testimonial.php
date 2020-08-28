<?php
/**
*   TESTIMONIAL POST TYPE
*   ---------------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

function create_testimonial() {
  register_post_type( 'testimonial',
    array(
      'labels' => array(
        'name' => _x('Testimonials', 'testimonial_content', 'mybooking'),
        'singular_name' => _x('Testimonial', 'testimonial_content', 'mybooking'),
        'add_new' => _x('Add testimonial', 'testimonial_content', 'mybooking'),
        'add_new_item' => _x('New testimonial', 'testimonial_content', 'mybooking'),
        'edit' => _x('Edit', 'testimonial_content', 'mybooking'),
        'edit_item' => _x('Edit testimonial', 'testimonial_content', 'mybooking'),
        'new_item' => _x('New testimonial', 'testimonial_content', 'mybooking'),
        'view' => _x('See', 'testimonial_content', 'mybooking'),
        'view_item' => _x('See testimonial', 'testimonial_content', 'mybooking'),
        'search_items' => _x('Search testimonial', 'testimonial_content', 'mybooking'),
        'not_found' => _x('No testimonial found', 'testimonial_content', 'mybooking'),
        'not_found_in_trash' => _x('No testimonial found on bin', 'testimonial_content', 'mybooking'),
        'parent' => _x('Parent testimonial', 'testimonial_content', 'mybooking')
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
