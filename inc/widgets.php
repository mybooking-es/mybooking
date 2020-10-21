<?php
/**
*		SIDEBARS
*  	--------
*
* 	@version 0.0.8
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_widgets_init' ) ) {
	/**
	 * Sidebars definition
	 *
	 */
	function mybooking_widgets_init() {

    // Top Notification
		register_sidebar(
			array(
				'name'          => _x( 'Top Notification','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_top_notification',
				'description'   => _x( 'Notification area at Top','mybooking_widgets', 'mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget_topbar_message %2$s">',
				'after_widget'  => '</div>',
			)
		);

    // TopBar right
		register_sidebar(
			array(
				'name'          => _x( 'TopBar Right','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_topbar_right',
				'description'   => _x( 'TopBar Right Area','mybooking_widgets', 'mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget_topbar_right topbar_right %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Navigation
		register_sidebar(
			array(
				'name'          => _x( 'Main Menu','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_primary_menu',
		    'description'    => _x( 'Widgets area at Main Menu right side','mybooking_widgets','mybooking' ),
				'before_widget' => '<div  id="%1$s" class="mybooking-widget mybooking-widget_menu %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Home Header
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Header Left','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_home_izquierda',
		    'description'    => _x( 'Mybooking Home Template widgets area at left of Home header','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_header-left %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Header Right','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_home_derecha',
		    'description'    => _x( 'Mybooking Home Template widgets area at right of Home header','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_header-right %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Home Widgets Top
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Top','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_top',
				'description'   => _x( 'Mybooking Home Template widgets area at top','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget widget-home-bottom %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Home Widgets Center
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Center One', 'mybooking_widgets', 'mybooking' ),
				'id'            => 'home_widgets_center_1',
				'description'   => _x( 'Mybooking Home Template Center One', 'mybooking_widgets', 'mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget widget-1 %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Center Two', 'mybooking_widgets', 'mybooking' ),
				'id'            => 'home_widgets_center_2',
				'description'   => _x( 'Mybooking Home Template Center Two', 'mybooking_widgets', 'mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget widget-2 %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Center Three', 'mybooking_widgets', 'mybooking' ),
				'id'            => 'home_widgets_center_3',
				'description'   => _x( 'Mybooking Home Template Center Three', 'mybooking_widgets', 'mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget widget-3 %2$s">',
				'after_widget'  => '</div>',
			)
		);

		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Home Template Bottom','mybooking_widgets','mybooking' ),
				'id'            => 'home_widgets_bottom',
				'description'   => _x( 'Mybooking Home Template bottom widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget widget-home-bottom %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Blog
		register_sidebar(
			array(
				'name'          => _x( 'Blog sidebar','mybooking_widgets','mybooking' ),
				'id'            => 'blog_sidebar',
		    'description'    => _x( 'Blog sidebar widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_blog-sidebar %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Landing
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Landing Template Sidebar','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_page_sidebar',
		    'description'    => _x( 'Mybooking Landing template sidebar widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_landing-sidebar %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Contact
		register_sidebar(
			array(
				'name'          => _x( 'Mybooking Contact Template Contact Form','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_contact',
		    'description'    => _x( 'Place your contact form at here','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_contact %2$s">',
				'after_widget'  => '</div>',
			)
		);

		// Footer
		register_sidebar(
			array(
				'name'          => _x( 'Footer One','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_footer_1',
				'description'   => _x( 'Footer first widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_footer-1 %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Footer Two','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_footer_2',
				'description'   => _x( 'Footer second widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_footer-2 %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Footer Three','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_footer_3',
				'description'   => _x( 'Footer third widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_footer-3 %2$s">',
				'after_widget'  => '</div>',
			)
		);
		register_sidebar(
			array(
				'name'          => _x( 'Footer Four','mybooking_widgets','mybooking' ),
				'id'            => 'mybooking_global_footer_4',
				'description'   => _x( 'Footer fourth widgets area','mybooking_widgets','mybooking' ),
				'before_widget' => '<div id="%1$s" class="mybooking-widget mybooking-widget_footer-4 %2$s">',
				'after_widget'  => '</div>',
			)
		);

	}
	add_action( 'widgets_init', 'mybooking_widgets_init' );
}
