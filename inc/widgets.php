<?php
/**
 * Registramos las áreas para widgets
 *
 */
function mybooking_widgets_init() {

	register_sidebar( array(
		'name'          => 'MyBooking Home Hero',
		'id'            => 'mybooking_home_hero',
    'descripion'    => 'Esta es el área de widgets que aparece en el hero de la plantilla MyBooking Home',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
