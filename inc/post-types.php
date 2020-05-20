<?php
/**
*		CUSTOM POST TYPES
*  	-----------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Mybooking custom post types
 *
 */
$options_header_background = get_option( 'home_header_background' );
if ( $options_header_background == 2 ) {
 require_once( get_template_directory() . '/mybooking-posts/mybooking-carousel.php' );
}

$testimonial_active = get_option( "global_testimonial_active" );
if ( $testimonial_active == 1 ) {
 require_once( get_template_directory() . '/mybooking-posts/mybooking-testimonial.php' );
}

// $promo_active = get_option( "global_promo_active" );
// if ( $promo_active == 1 ) {
//  require_once( get_template_directory() . '/mybooking-posts/mybooking-promo.php' );
// }

$vehicle_active = get_option( "global_vehicle_active" );
if ( $vehicle_active == 1 ) {
 require_once( get_template_directory() . '/mybooking-posts/mybooking-vehicle.php' );
}

// Just for developement
require_once( get_template_directory() . '/mybooking-posts/mybooking-popup.php' );
?>
