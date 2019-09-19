<?php

/**
 * Quitamos los estilos y scripts heredados
 *
 */
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );
    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

/**
 * Encolamos los CSS y scripts necesarios
 *
 */
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );

    wp_enqueue_style( 'child-understrap-mybooking-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    //wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

////////////////////////////////////////////////////////////////////////////////
// ZONA DE PRUEBAS (TODO: Aislar en archivos separados )
////////////////////////////////////////////////////////////////////////////////

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
