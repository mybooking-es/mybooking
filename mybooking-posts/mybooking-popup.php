<?php
/**
*   POPUP POST TYPE
*   ---------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function create_popup() {
  register_post_type( 'popup',
    array(
      'labels' => array(
        'name' => _x('Popup ads', 'popup_content', 'mybooking'),
        'singular_name' => _x('Popup ad', 'popup_content', 'mybooking'),
        'add_new' => _x('Add popup ad', 'popup_content', 'mybooking'),
        'add_new_item' => _x('New popup ad', 'popup_content', 'mybooking'),
        'edit' => _x('Edit', 'popup_content', 'mybooking'),
        'edit_item' => _x('Edit popup ad', 'popup_content', 'mybooking'),
        'new_item' => _x('New popup ad', 'popup_content', 'mybooking'),
        'view' => _x('See', 'popup_content', 'mybooking'),
        'view_item' => _x('See popup ad', 'popup_content', 'mybooking'),
        'search_items' => _x('Search popup ad', 'popup_content', 'mybooking'),
        'not_found' => _x('No popup ad found', 'popup_content', 'mybooking'),
        'not_found_in_trash' => _x('No popup ad on bin', 'popup_content',  'mybooking'),
        'parent' => _x('Parent popup ad','popup_content',  'mybooking')
      ),
      'show_ui' => true,
      'public' => true,
      'show_in_menu' => true,
      'show_in_rest' => true, // Gutenberg activation!
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-awards',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'create_popup' );
?>
