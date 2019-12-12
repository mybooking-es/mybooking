<?php
/**
*		CURRENT POST SLUG
*  	-----------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Gets the current post slug
// http://www.tcbarrett.com/2011/09/wordpress-the_slug-get-post-slug-function/#.Xe6k49F7nDc
function the_slug($echo=true){

	  $slug = basename(get_permalink());
	  do_action('before_slug', $slug);
	  $slug = apply_filters('slug_filter', $slug);
	  if( $echo ) echo $slug;
	  do_action('after_slug', $slug);

	  return $slug;
	}
?>
