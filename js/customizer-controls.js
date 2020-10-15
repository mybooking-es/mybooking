/**
 * File customizer-controls.js.
 *
 * Activate/Deactivate controls based on mybooking_colors_advanced setting
 *
 */

( function( $ ) {

  wp.customize.bind( 'ready', function() {

  	function mybookingHideShowAdvancedColors(show) {

			// array of Color properties
			var colorControlIds = [
			  // TopBar
				'home_topbar_bg',
				'topbar_bg',
				'topbar_color',
				'topbar_link_color',
				'topbar_link_hover_color',
				'topbar__message_bg',
				'topbar__message_text',
				'topbar__message_link',
				'topbar__message_link_hover',
				// Header
				'header_widget_title_color',
				'header_widget_text_color',
				'header_widget_link_color'
			];

			if ( show ) {
			  // Show advanced colors
				$.each( colorControlIds, function ( i, value ) {
					$(wp.customize.control(value).selector).show();
				} );
			} else {
  			// Hide advanced colors
			  $.each( colorControlIds, function ( i, value ) {
			  	$(wp.customize.control(value).selector).hide();
				} );
			}

  	}

  	/**
  	 * Show Hide Booking Forms Section
  	 */
  	function myBookingShowHideBookingFormsSection(show) {
  		if (show) {
				wp.customize.section( 'mybooking_theme_selector_options').container.show();
  		}
  		else {
 				wp.customize.section( 'mybooking_theme_selector_options').container.hide();
  		}
  	}

  	// == Initialize

		// Show/Hide advanced colors
  	var advancedMode = wp.customize.instance( 'mybooking_colors_advanced' ).get();
  	console.log(advancedMode);
		mybookingHideShowAdvancedColors(advancedMode);

		// Advanced colors is changed
		wp.customize.control('mybooking_colors_advanced', function(control) {
			control.setting.bind(function(value){
				console.log(value);
				mybookingHideShowAdvancedColors(value);
				myBookingShowHideBookingFormsSection(value);
			});
		});


  });


} )( jQuery );
