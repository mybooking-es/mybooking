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
		public $type = 'mybooking_carrousel';
		
		/**
	     * 	Enqueue the component JS and CSS	
		 */
		public function enqueue() {
			wp_enqueue_script( 'mybooking-customize-carrousel-control-js', get_template_directory_uri() . '/inc/customizer/js/carrousel-control.js', array( 'jquery' ), null, true );
			wp_enqueue_style( 'mybooking-customize-carrousel-control-css', get_template_directory_uri() . '/inc/customizer/css/carrousel-control.css', null );
		}

		/**
		 * Render the control using JS template
		 */
		protected function content_template() {
?>			
			<span class="customize-control-title"><label>{{ data.label }}</label></span>
			<# if ( data.carrousel_items ) { #>
				<div class="carrousel-container">
					<# data.carrousel_items.forEach( function( carrousel_item ) { #>
					  <div class="carrousel-item-container" data-id="{{ carrousel_item.id }}">
					  	<img src="{{ carrousel_item.url }}"/>
					  </div>
					<#	} ) #>
				</div>	
			<# } #>
			<div class="actions">
				<button type="button" class="button clear-carrousel-button" id="carrousel-clear-btn"><?php echo esc_html_x( 'Remove All', 'customize-image-gallery-control', 'mybooking' ) ?></button>
				<button type="button" class="button configure-carrousel-button" id="carrousel-configure-btn"><?php echo esc_html_x( 'Configure Carrousel', 'customize-image-gallery-control', 'mybooking' ) ?></button>
			</div>
			<div class="customize-control-notifications"></div>
<?php
		}

	}
}