<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if ( ! class_exists( 'MyBookingCustomizeCarrouselControl' ) ) {
	/**
	 * Slideshow
	 */
	class MyBookingCustomizeCarrouselControl extends WP_Customize_Control {
	
		/**
		 * Configure the control type
		 */
		public $type = 'carrousel';
		
		/**
	     * 	Enqueue scripts and styles.		
		 */
		public function enqueue() {
			wp_enqueue_script( 'mybooking-customize-gallery-control-js', get_template_directory_uri() . '/inc/customizer/js/carrousel-control.js', array( 'jquery' ), null, true );
			wp_enqueue_style( 'mybooking-customize-gallery-control-css', get_template_directory_uri() . '/inc/customizer/css/carrousel-control.css', null );
		}

		/**
		 * Render the control using JS
		 */
		protected function content_template() {
			
			include_once('templates/carrousel-control.tmpl');

		}

	}
}