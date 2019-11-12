<?php
/**
*		SIDEBARS
*  	--------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.2
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
			'name'          => __( 'Top Bar', 'mybookinges' ),
			'id'            => 'mybooking_top_bar',
	    'descripion'    => __( 'Área de widgets en el top de las páginas', 'mybookinges' ),
			'before_widget' => '',
			'after_widget'  => '',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Hero Main', 'mybookinges' ),
			'id'            => 'mybooking_home_hero_main',
	    'descripion'    => __( 'Área de widgets a la derecha del hero de la plantilla MyBooking Home', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Hero Secondary', 'mybookinges' ),
			'id'            => 'mybooking_home_hero_secondary',
	    'descripion'    => __( 'Área de widgets sobre el texto del hero de la plantilla MyBooking Home', 'mybookinges' ),
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
			'name'          => __( 'Footer Cuatro', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_4',
			'description'   => __( 'Cuarta área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<br/><div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Formulario de Contacto', 'mybookinges' ),
			'id'            => 'mybooking_contact_form',
			'description'   => __( 'Zona para insertar el formulario de contacto en la página de contacto', 'mybookinges' ),
			'before_widget' => '<br/><div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
