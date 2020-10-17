<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if ( ! class_exists( 'MyBookingFont_Selector' ) ) {
	/**
	 * Class MyBookingFont_Selector
	 */
	class MyBookingFont_Selector extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'selector-font';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'mybooking-select-script', get_template_directory_uri() . '/inc/customizer/js/select.js', array( 'jquery' ), MYBOOKING_FONT_SELECTOR_VERSION, true );
			wp_enqueue_style( 'mybooking-select-style', get_template_directory_uri() . '/inc/customizer/css/select.css', null, MYBOOKING_FONT_SELECTOR_VERSION );
			wp_enqueue_script( 'mybooking-typography-js', get_template_directory_uri() . '/inc/customizer/js/typography.js', array( 'jquery', 'select-script' ), MYBOOKING_FONT_SELECTOR_VERSION, true );
			wp_enqueue_style( 'mybooking-typography', get_template_directory_uri() . '/inc/customizer/css/typography.css', null );
		}

		/**
		 * Render the control's content.
		 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
		 *
		 * @access protected
		 */
		protected function render_content() {
			$this_val = $this->value(); ?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>

				<select class="typography-select" <?php $this->link(); ?>>
					<option value="" 
					<?php	if ( ! $this_val ) { echo 'selected="selected"'; } ?>><?php echo esc_html_x( 'Default', 'customize_font_selector', 'mybooking' ); ?></option>
					<?php
					// Get Standard font options
					$std_fonts = mybooking_font_selector_get_standard_fonts();
					if ( ! empty( $std_fonts ) ) {
					?>
						<optgroup label="<?php echo esc_html_x( 'Standard Fonts', 'customize_font_selector', 'mybooking' ); ?>">
							<?php
							// Loop through font options and add to select
							foreach ( $std_fonts as $font ) {
							?>
								<option value="<?php echo esc_html( $font ); ?>" <?php selected( $font, $this_val ); ?>><?php echo esc_html( $font ); ?></option>
							<?php } ?>
						</optgroup>
					<?php
					}

					// Google font options
					$google_fonts = mybooking_font_selector_get_google_fonts_array();
					if ( ! empty( $google_fonts ) ) {
					?>
						<optgroup label="<?php echo esc_html_x( 'Google Fonts', 'customize_font_selector', 'mybooking' ); ?>">
							<?php
							// Loop through font options and add to select
							foreach ( $google_fonts as $font ) {
							?>
								<option value="<?php echo esc_html( $font ); ?>" <?php selected( $font, $this_val ); ?>><?php echo esc_html( $font ); ?></option>
							<?php } ?>
						</optgroup>
					<?php } ?>
				</select>

			</label>

			<?php
		}
	}
}