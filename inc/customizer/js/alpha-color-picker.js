/**
 * Alpha Color Picker JS
 *
 * This file includes several helper functions and the core control JS.
 */

/**
 * Override the stock color.js toString() method to add support for
 * outputting RGBa or Hex.
 */
Color.prototype.toString = function( flag ) {

	// If our no-alpha flag has been passed in, output RGBa value with 100% opacity.
	// This is used to set the background color on the opacity slider during color changes.
	if ( 'no-alpha' == flag ) {
		return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
	}

	// If we have a proper opacity value, output RGBa.
	if ( 1 > this._alpha ) {
		return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
	}

	// Proceed with stock color.js hex output.
	var hex = parseInt( this._color, 10 ).toString( 16 );
	if ( this.error ) {
		return ''; }
	if ( hex.length < 6 ) {
		for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
			hex = '0' + hex;
		}
	}

	return '#' + hex;
};

/**
 * Given an RGBa, RGB, or hex color value, return the alpha channel value.
 */
function mybooking_acp_get_alpha_value_from_color( value ) {
	var alphaVal;

	// Remove all spaces from the passed in value to help our RGBa regex.
	value = value.replace( / /g, '' );

	if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
		alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed( 2 ) * 100;
		alphaVal = parseInt( alphaVal );
	} else {
		alphaVal = 100;
	}

	return alphaVal;
}

/**
 * Given a hex color value convert to rgba
 */
function mybooking_convertHexToRgbA(hexVal) { 
    
  // If the hex value is valid. 
  if(/^#([A-Fa-f0-9]{3,6})[0-9]{0,2}$/.test(hexVal)) { 
  		var ret; 
      // Getting the content after '#', 
      // eg. 'ffffff' in case of '#ffffff' 
      ret = hexVal.slice(1); 
        
      // Splitting each character 
      ret = ret.split(''); 
        
      // Checking if the length is 3 
      // then make that 6 
      if(ret.length == 3) { 
          var ar = []; 
          ar.push(ret[0]);  
          ar.push(ret[0]); 
          ar.push(ret[1]); 
          ar.push(ret[1]); 
          ar.push(ret[2]); 
          ar.push(ret[2]); 
          ret = ar; 
      } 
      // Alpha channel
      if (ret.length == 6) {
      	  ret.push('f')
      	  ret.push('f');
      }
        
      // Starts with '0x'(in hexadecimal) 
      ret = '0x'+ ret.join(''); 
        
      // Converting the first 2 characters 
      // from hexadecimal to r value 
      var r = (ret>>24)&255; 
        
      // Converting the second 2 characters 
      // to hexadecimal to g value 
      var g = (ret>>16)&255; 
        
      // Converting the third 2 characters 
      // to hexadecimal to b value 
      var b = (ret>>8)&255; 

      // Converting the last 2 characters(alfa)
      // to hexadecimal to a value
      var a = ((ret&255) / 255).toFixed(2);
        
      // Appending all of them to make 
      // the RGBA value 
      return 'rgba('+[r, g, b, a].join(',')+')'; 
  } 
  else {
  	return hexVal;
  }
} 

/**
 * Force update the alpha value of the color picker object and maybe the alpha slider.
 */
function mybooking_acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, update_slider ) {
	var iris, colorPicker, color;

	iris = $control.data( 'a8cIris' );
	colorPicker = $control.data( 'wpWpColorPicker' );

	// Set the alpha value on the Iris object.
	iris._color._alpha = alpha;

	// Store the new color value.
	color = iris._color.toString();

	// Set the value of the input.
	$control.val( color );

	// Update the background color of the color picker.
	colorPicker.toggler.css(
		{
			'background-color': color
		}
	);

	// Maybe update the alpha slider itself.
	if ( update_slider ) {
		mybooking_acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
	}

	// Update the color value of the color picker object.
	$control.wpColorPicker( 'color', color );
}

/**
 * Update the slider handle position and label.
 */
function mybooking_acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider ) {
	$alphaSlider.slider( 'value', alpha );
	$alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
}

/**
 * Initialization trigger.
 */
jQuery( document ).ready(
	function( $ ) {

			// Loop over each control and transform it into our color picker.
			$( '.alpha-color-control' ).each(
				function() {

					// Scope the vars.
					var $control, startingColor, paletteInput, showOpacity, defaultColor, palette,
					colorPickerOptions, $container, $alphaSlider, alphaVal, sliderOptions;

					// Store the control instance.
					$control = $( this );

					// Get a clean starting value for the option.
					startingColor = $control.val().replace( /\s+/g, '' );

					// Check if it is a Hex Color with transparency => convert to rgba and assign 
					// to the control
					var tmpColor = mybooking_convertHexToRgbA(startingColor);
					if (mybooking_acp_get_alpha_value_from_color(tmpColor) < 100) {
						startingColor = tmpColor;
						$control.val(tmpColor);
					}

					// Get some data off the control.
					paletteInput = $control.attr( 'data-palette' );
					showOpacity  = $control.attr( 'data-show-opacity' );
					defaultColor = $control.attr( 'data-default-color' );

					// Process the palette.
					if ( paletteInput.indexOf( '|' ) !== -1 ) {
						palette = paletteInput.split( '|' );
					} else if ( 'false' == paletteInput ) {
						palette = false;
					} else {
						palette = true;
					}

					// Set up the options that we'll pass to wpColorPicker().
					colorPickerOptions = {
						change: function( event, ui ) {
							var key, value, alpha, $transparency;

							key = $control.attr( 'data-customize-setting-link' );
							value = $control.wpColorPicker( 'color' );

							// Set the opacity value on the slider handle when the default color button is clicked.
							if ( defaultColor == value ) {
								alpha = mybooking_acp_get_alpha_value_from_color( value );
								$alphaSlider.find( '.ui-slider-handle' ).text( alpha );
							}

							// Send ajax request to wp.customize to trigger the Save action.
							wp.customize(
								key, function( obj ) {
									obj.set( value );
								}
							);

							$transparency = $container.find( '.transparency' );

							// Always show the background color of the opacity slider at 100% opacity.
							$transparency.css( 'background-color', ui.color.toString( 'no-alpha' ) );
						},
						palettes: palette // Use the passed in palette.
					};

					// Create the colorpicker.
					$control.wpColorPicker( colorPickerOptions );

					$container = $control.parents( '.wp-picker-container:first' );

					// Insert our opacity slider.
					$(
						'<div class="alpha-color-picker-container">' +
						'<div class="min-click-zone click-zone"></div>' +
						'<div class="max-click-zone click-zone"></div>' +
						'<div class="alpha-slider"></div>' +
						'<div class="transparency"></div>' +
						'</div>'
					).appendTo( $container.find( '.wp-picker-holder' ) );

					$alphaSlider = $container.find( '.alpha-slider' );

					// If starting value is in format RGBa, grab the alpha channel.
					alphaVal = mybooking_acp_get_alpha_value_from_color( startingColor );

					// Set up jQuery UI slider() options.
					sliderOptions = {
						create: function( event, ui ) {
							var value = $( this ).slider( 'value' );

							// Set up initial values.
							$( this ).find( '.ui-slider-handle' ).text( value );
							$( this ).siblings( '.transparency ' ).css( 'background-color', startingColor );
						},
						value: alphaVal,
						range: 'max',
						step: 1,
						min: 0,
						max: 100,
						animate: 300
					};

					// Initialize jQuery UI slider with our options.
					$alphaSlider.slider( sliderOptions );

					// Maybe show the opacity on the handle.
					if ( 'true' == showOpacity ) {
						$alphaSlider.find( '.ui-slider-handle' ).addClass( 'show-opacity' );
					}

					// Bind event handlers for the click zones.
					$container.find( '.min-click-zone' ).on(
						'click', function() {
							mybooking_acp_update_alpha_value_on_color_control( 0, $control, $alphaSlider, true );
						}
					);
					$container.find( '.max-click-zone' ).on(
						'click', function() {
							mybooking_acp_update_alpha_value_on_color_control( 100, $control, $alphaSlider, true );
						}
					);

					// Bind event handler for clicking on a palette color.
					$container.find( '.iris-palette' ).on(
						'click', function() {
							var color, alpha;

							color = $( this ).css( 'background-color' );
							alpha = mybooking_acp_get_alpha_value_from_color( color );

							mybooking_acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );

							// Sometimes Iris doesn't set a perfect background-color on the palette,
							// for example rgba(20, 80, 100, 0.3) becomes rgba(20, 80, 100, 0.298039).
							// To compensante for this we round the opacity value on RGBa colors here
							// and save it a second time to the color picker object.
							if ( alpha != 100 ) {
								color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
							}

							$control.wpColorPicker( 'color', color );
						}
					);

					// Bind event handler for clicking on the 'Clear' button.
					$container.find( '.button.wp-picker-clear' ).on(
						'click', function() {
							var key = $control.attr( 'data-customize-setting-link' );

							// The #fff color is delibrate here. This sets the color picker to white instead of the
							// defult black, which puts the color picker in a better place to visually represent empty.
							$control.wpColorPicker( 'color', '#ffffff' );

							// Set the actual option value to empty string.
							wp.customize(
								key, function( obj ) {
									obj.set( '' );
								}
							);

							mybooking_acp_update_alpha_value_on_alpha_slider( 100, $alphaSlider );
						}
					);

					// Bind event handler for clicking on the 'Default' button.
					$container.find( '.button.wp-picker-default' ).on(
						'click', function() {
							var alpha = mybooking_acp_get_alpha_value_from_color( defaultColor );

							mybooking_acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
						}
					);

					// Bind event handler for typing or pasting into the input.
					$control.on(
						'input', function() {
							var value = $( this ).val();
							var alpha = mybooking_acp_get_alpha_value_from_color( value );

							mybooking_acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
						}
					);

					// Update all the things when the slider is interacted with.
					$alphaSlider.slider().on(
						'slide', function( event, ui ) {
							var alpha = parseFloat( ui.value ) / 100.0;

							mybooking_acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, false );

							// Change value shown on slider handle.
							$( this ).find( '.ui-slider-handle' ).text( ui.value );
						}
					);

				}
			);
	}
);