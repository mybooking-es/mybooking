<?php
/**
*		SIDEBARS
*  	--------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

/**
 * Sidebars definition
 *
 */

function mybooking_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Home Izquierda', 'mybooking' ),
			'id'            => 'mybooking_home_izquierda',
	    'description'    => __( 'Área de widgets a la izquierda de la cabecera de la Home', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Derecha', 'mybooking' ),
			'id'            => 'mybooking_home_derecha',
	    'description'    => __( 'Área de widgets a la derecha de la cabecera de la Home', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Lateral Páginas Mybooking', 'mybooking' ),
			'id'            => 'mybooking_page_sidebar',
	    'description'    => __( 'Área de widgets en el sidebar de la plantilla Mybooking Pages', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Uno', 'mybooking' ),
			'id'            => 'mybooking_global_footer_1',
			'description'   => __( 'Primera área de widgets en el footer', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Dos', 'mybooking' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => __( 'Segunda área de widgets en el footer', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Tres', 'mybooking' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => __( 'Tercera área de widgets en el footer', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Cuatro', 'mybooking' ),
			'id'            => 'mybooking_global_footer_4',
			'description'   => __( 'Cuarta área de widgets en el footer', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
