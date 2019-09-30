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

    // == Load CSS
    
    // Load parent theme CSS
    wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    // Load child theme CSS
    wp_enqueue_style( 'child-understrap-mybooking-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    
    // == Load JS
    // Load parent theme JS
    wp_enqueue_script( 'parent-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
    // Load child theme JS
    wp_enqueue_script( 'child-understrap-mybooking-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Páginas de configuración
 *
 */
require_once('mybooking-options/mybooking-home-options.php');
require_once('mybooking-options/mybooking-bussiness-options.php');

?>
