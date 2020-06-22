<?php
/**
*		SIDEBARS
*  	--------
*
* 	Versión: 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Sidebars definition
 *
 */

function mybooking_widgets_init() {

	// Navigation
	register_sidebar(
		array(
			'name'          => _x( 'Menú Principal','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_primary_menu',
	    'description'    => _x( 'Área de widgets a la derecha del menú principal','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Home Header
	register_sidebar(
		array(
			'name'          => _x( 'Home Header Uno','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_home_izquierda',
	    'description'    => _x( 'Área de widgets a la izquierda de la cabecera de la Home','mybooking_widgets','mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-left">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Home Header Dos','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_home_derecha',
	    'description'    => _x( 'Área de widgets a la derecha de la cabecera de la Home','mybooking_widgets','mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-right">',
			'after_widget'  => '</div>',
		)
	);

	// Home Widgets
	$widgets_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_content_widgets_visibility" );
	if ($widgets_visible) {

		register_sidebar(
			array(
				'name'          => _x( 'Home Content Uno','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_1',
				'description'   => _x( 'Primera área de widgets en área de contenido de la Home','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-1">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Home Content Dos','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_2',
				'description'   => _x( 'Segunda área de widgets en área de contenido de la Home','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-2">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Home Content Tres','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_3',
				'description'   => _x( 'Tercera área de widgets en área de contenido de la Home','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-3">',
				'after_widget'  => '</div>',
			)
		);
	}

	// Landings
	register_sidebar(
		array(
			'name'          => _x( 'Lateral Páginas Mybooking','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_page_sidebar',
	    'description'    => _x( 'Área de widgets en el sidebar de la plantilla Mybooking Pages','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Footer
	register_sidebar(
		array(
			'name'          => _x( 'Footer Uno','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_1',
			'description'   => _x( 'Primera área de widgets en el footer','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Dos','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => _x( 'Segunda área de widgets en el footer','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Tres','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => _x( 'Tercera área de widgets en el footer','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Cuatro','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_4',
			'description'   => _x( 'Cuarta área de widgets en el footer','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
