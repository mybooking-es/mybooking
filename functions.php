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
 * CSS y scripts a la cola
 *
 */
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-owl-styles', get_stylesheet_directory_uri() . '/css/vendor/owl.carousel.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-owl-theme-styles', get_stylesheet_directory_uri() . '/css/vendor/owl.theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-owl-transitions-styles', get_stylesheet_directory_uri() . '/css/vendor/owl.transitions.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-carousel', get_stylesheet_directory_uri() . '/javascript/vendor/owl.carousel.min.js', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-mybooking-scripts', get_stylesheet_directory_uri() . '/javascript/app.js', array(), $the_theme->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Páginas de configuración
 *
 */
require_once('mybooking-options/mybooking-home-options.php');
require_once('mybooking-options/mybooking-contact-options.php');

?>
