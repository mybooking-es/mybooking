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
			'name'          => _x( 'Main Menu','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_primary_menu',
	    'description'    => _x( 'Widgets area at Main Menu right side','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Home Header
	register_sidebar(
		array(
			'name'          => _x( 'Home Header Left','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_home_izquierda',
	    'description'    => _x( 'Widgets area at left of Home header','mybooking_widgets','mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-left">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Home Header Right','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_home_derecha',
	    'description'    => _x( 'Widgets area at right of Home header','mybooking_widgets','mybooking' ),
			'before_widget' => '<div class="mybooking-widget_header-right">',
			'after_widget'  => '</div>',
		)
	);

	// Home Widgets
	$widgets_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_content_widgets_visibility" );
	if ($widgets_visible) {

		register_sidebar(
			array(
				'name'          => _x( 'Home Content One','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_1',
				'description'   => _x( 'Home content first widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-1">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Home Content Two','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_2',
				'description'   => _x( 'Home content second widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-2">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Home Content Three','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_3',
				'description'   => _x( 'Home content third widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div class="home-widgets widget-3">',
				'after_widget'  => '</div>',
			)
		);
	}

	// Landings
	register_sidebar(
		array(
			'name'          => _x( 'MyBooking template pages sidebar','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_page_sidebar',
	    'description'    => _x( 'Mybooking template pages sidebar widgets area','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

	// Footer
	register_sidebar(
		array(
			'name'          => _x( 'Footer One','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_1',
			'description'   => _x( 'Footer first widgets area','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Two','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_2',
			'description'   => _x( 'Footer second widgets area','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Three','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_3',
			'description'   => _x( 'Footer third widgets area','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => _x( 'Footer Four','mybooking_widgets','mybooking' ),
			'id'            => 'mybooking_global_footer_4',
			'description'   => _x( 'Footer fourth widgets area','mybooking_widgets','mybooking' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);

}
add_action( 'widgets_init', 'mybooking_widgets_init' );

?>
