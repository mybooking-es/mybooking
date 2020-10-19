<?php
/**
*		RESERVATION STEPS
*  	-----------------

* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*
*   Notes:
*   ------
*
*   The wizard container is included in order to be able to show the selection
*   wizard in the reservation steps (choose product - checkout)
*
*/
?>

<!-- Wizard container -->
<div class="wizard-container full-size-datepicker-container" id="wizard_container">
  <div class="wizard-step_header container">
    <span class="wizard-close" id="close_wizard_btn">
      <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/close-icon.png' ) ?>" alt="<?php echo esc_attr_x( 'Close', 'wizard_container', 'mybooking' ); ?>">
    </span>
    <div class="wizard-step_title step_title" id="step_title"></div>
  </div>
  <div class="wizard-step_container" id="wizard_container_step">
    <div class="wizard-step_summary" id="wizard_container_step_header"></div>
    <div class="wizard-step_body" id="wizard_container_step_body"></div>
  </div>
</div>

<div class="steps-bg-color">
  <div class="steps-wrapper">
    <div id="steps">

      <?php
      $mybooking_step_classes = get_body_class();

      if ( in_array('choose_product',$mybooking_step_classes) ) {
        $mybooking_choose_active = 'active';
      } elseif ( in_array('complete',$mybooking_step_classes) ) {
        $mybooking_complete_active = 'active';
      } elseif ( in_array('summary',$mybooking_step_classes) ) {
        $mybooking_summary_active = 'active';
      } ?>
      <div data-desc="<?php echo esc_attr_x( 'Place and date', 'reservation_step', 'mybooking' ) ?>" class="step"><?php echo esc_html_x('1','renting_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Select product', 'reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_choose_active ) ?> step"><?php echo esc_html_x('2','renting_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Complete reservation', 'reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_complete_active ) ?> step"><?php echo esc_html_x('3','renting_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Summary', 'reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_summary_active ) ?> step"><?php echo esc_html_x('4','renting_reservation_steps', 'mybooking');?></div>
    </div>
  </div>
</div>