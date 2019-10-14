<?php
/**
*		SIDEBARS
*  	--------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

/**
 * Sidebars definition
 *
 */

function mybooking_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Top Bar', 'mybookinges' ),
			'id'            => 'mybooking_top_bar',
	    'descripion'    => __( 'Área de widgets en el top de las páginas', 'mybookinges' ),
			'before_widget' => '',
			'after_widget'  => '',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Hero', 'mybookinges' ),
			'id'            => 'mybooking_home_hero',
	    'descripion'    => __( 'Área de widgets en el hero de la plantilla MyBooking Home', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Uno', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_1',
			'description'   => __( 'Primera área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<br/><div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Dos', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => __( 'Segunda área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<br/><div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Tres', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => __( 'Tercera área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<br/><div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Menu', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_menu',
			'description'   => __( 'Resetea el menú del footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
