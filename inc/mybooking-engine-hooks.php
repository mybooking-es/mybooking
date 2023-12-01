<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Append the steps
if ( !function_exists( 'mybooking_plugin_reservation_process_header_callback' ) ) {
  function mybooking_plugin_reservation_process_header_callback() {
    $template_path = 'mybooking-templates/';
    $template_name = 'mybooking-reservation-steps.php';
		$template_file = locate_template( array($template_path . $template_name, $template_name ) );
    if ( file_exists( $template_file ) ) :
      // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
      include $template_file;
    endif;
  }
}
add_action( 'mybooking_plugin_reservation_process_header', 'mybooking_plugin_reservation_process_header_callback');
    

// Append the steps
if ( !function_exists( 'mybooking_plugin_transfer_reservation_process_header_callback' ) ) {
  function mybooking_plugin_transfer_reservation_process_header_callback() {
    $template_path = 'mybooking-templates/';
    $template_name = 'mybooking-transfer-reservation-steps.php';
		$template_file = locate_template( array($template_path . $template_name, $template_name ) );
    if ( file_exists( $template_file ) ) :
      // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
      include $template_file;
    endif;
  }
}
add_action( 'mybooking_plugin_transfer_reservation_process_header', 'mybooking_plugin_transfer_reservation_process_header_callback');