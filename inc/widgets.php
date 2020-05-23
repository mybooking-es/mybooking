<?php
/**
*		SIDEBARS
*  	--------
*
* 	Versión: 0.0.5
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
			'name'          => __( 'Menú Principal', 'mybooking' ),
			'id'            => 'mybooking_primary_menu',
	    'description'    => __( 'Área de widgets a la derecha del menú principal', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Home Header
	register_sidebar(
		array(
			'name'          => __( 'Home Header Uno', 'mybooking' ),
			'id'            => 'mybooking_home_izquierda',
	    'description'    => __( 'Área de widgets a la izquierda de la cabecera de la Home', 'mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-left">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Header Dos', 'mybooking' ),
			'id'            => 'mybooking_home_derecha',
	    'description'    => __( 'Área de widgets a la derecha de la cabecera de la Home', 'mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-right">',
			'after_widget'  => '</div>',
		)
	);

	// Landings
	register_sidebar(
		array(
			'name'          => __( 'Lateral Páginas Mybooking', 'mybooking' ),
			'id'            => 'mybooking_page_sidebar',
	    'description'    => __( 'Área de widgets en el sidebar de la plantilla Mybooking Pages', 'mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Footer
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

	// Home Widgets
	$widgets_visible = MyBookingThemeSettings::getInstance()->get_theme_option( "promo_home_widgets_active" );
	if ($widgets_visible == 1) {

		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Uno','mybooking' ),
				'id'            => 'home_widgets_1',
				'description'   => __( 'Primera área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-1">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Dos','mybooking' ),
				'id'            => 'home_widgets_2',
				'description'   => __( 'Segunda área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-2">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Tres','mybooking' ),
				'id'            => 'home_widgets_3',
				'description'   => __( 'Tercera área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-3">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Cuatro','mybooking' ),
				'id'            => 'home_widgets_4',
				'description'   => __( 'Cuarta área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-4">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Cinco','mybooking' ),
				'id'            => 'home_widgets_5',
				'description'   => __( 'Quinta área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-5">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Home Widgets Seis','mybooking' ),
				'id'            => 'home_widgets_6',
				'description'   => __( 'Sexta área de widgets en la Home','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-6">',
				'after_widget'  => '</div>',
			)
		);
	}

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
