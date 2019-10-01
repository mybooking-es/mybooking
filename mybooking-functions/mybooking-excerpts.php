<?php
/**
*		EXCERPTS
*  	--------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

/**
* Custom excerpt length
*
*/
function mybooking_custom_excerpt_length( $length ) {
	global $mybooking_custom_length;
	if( $mybooking_custom_length ) {
		return $mybooking_custom_length;
		// For personalized output use
		// <?php $mybooking_custom_length=20; echo get_the_excerpt(); ?
	} else {
		return 30;
	}
}
add_filter( 'excerpt_length', 'mybooking_custom_excerpt_length', 999 );

/**
* Adds elipsis at excerpt ends
*
*/
function mybooking_excerpt_more( $more ) {
	return ' … ';
}
add_filter( 'excerpt_more', 'mybooking_excerpt_more' );
?>
