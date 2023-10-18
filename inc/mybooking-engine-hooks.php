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
      include $template_file;
    endif;
  }
}
add_action( 'mybooking_plugin_reservation_process_header', 'mybooking_plugin_reservation_process_header_callback');

// Append the sticky
if ( !function_exists( 'mybooking_plugin_reservation_summary_callback' ) ) {
  function mybooking_plugin_reservation_summary_callback() {
    $template_path = 'mybooking-templates/';
    $template_name = 'mybooking-reservation-sticky-tmpl.php';
		$template_file = locate_template( array($template_path . $template_name, $template_name ) );
    if ( file_exists( $template_file ) ) :
      include $template_file;
    endif;
  }
}
add_action( 'mybooking_plugin_reservation_summary', 'mybooking_plugin_reservation_summary_callback');
         