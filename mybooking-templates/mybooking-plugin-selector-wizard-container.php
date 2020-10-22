<?php
  /** 
   * The Template for showing the renting selector wizard container 
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-wizard-container.php
   *
   */
?>
<!-- WIZARD -->
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