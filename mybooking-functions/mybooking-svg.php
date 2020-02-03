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

function mybooking_mime_types($mimes) {
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
}
add_filter('upload_mimes', 'mybooking_mime_types');
?>
