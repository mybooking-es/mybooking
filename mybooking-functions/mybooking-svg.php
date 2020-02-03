<?php
/**
*		EXTRA MENUS
*  	-----------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.1
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'upload_mimes', 'mybooking_myme_types', 1, 1 );
function mybooking_myme_types( $mime_types ) {
  $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension

  return $mime_types;
}
?>
