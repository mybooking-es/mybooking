<?php
/**
 * Registramos las áreas para widgets
 *
 */


function mybooking_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Top Bar', 'mybookinges' ),
			'id'            => 'mybooking_top_bar',
	    'descripion'    => __( 'Área de widgets en el top de todas las páginas', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
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
			'description'   => __( 'Área 1 de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Dos', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => __( 'Área 2 de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Tres', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => __( 'Área 3 de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
