<?php
/**
 * Registramos las áreas para widgets
 *
 */


function mybooking_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'MyBooking Home Hero', 'mybookinges' ),
			'id'            => 'mybooking_home_hero',
	    'descripion'    => __( 'Área de widgets en el hero de la plantilla MyBooking Home', 'mybookinges' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Mybooking Footer Uno', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_1',
			'description'   => __( 'Área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Mybooking Footer Dos', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => __( 'Área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Mybooking Footer Tres', 'mybookinges' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => __( 'Área de widgets en el footer', 'mybookinges' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
