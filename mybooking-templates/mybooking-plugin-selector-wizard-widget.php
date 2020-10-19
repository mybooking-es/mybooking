<?php
  /** 
   * The Template for showing the renting selector widget
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-wizard-widget.php
   */
?>
<!-- Search form -->
<section class="section">
  <div class="wizard-selector container">
    <form class="wizard-selector_form" name="wizard_search_form">

      <input type="hidden" name="pickup_place">
      <input type="hidden" name="return_place">
      <input type="hidden" name="date_from">
      <input type="hidden" name="time_from">
      <input type="hidden" name="time_to">

      <div class="row">
        <div class="wizard-selector_field col-md-3">
            <label
              for="place_holder"><?php echo esc_html_x( 'Where?', 'renting_form_selector_wizard', 'mybooking') ?></label>
            <input type="text" class="form-control form-control-lg bg-white" id="place_holder"
                   aria-describedby="pickupPlaceHolder" placeholder="<?php echo esc_attr_x( 'Choose a place', 'renting_form_selector_wizard', 'mybooking') ?>" readonly="true">
        </div>
        <div class="wizard-selector_field col-md-3">
            <label
              for="from_holder"><?php echo esc_html_x( 'When?', 'renting_form_selector_wizard', 'mybooking') ?></label>
            <input type="text" class="form-control form-control-lg bg-white" id="from_holder"
                   aria-describedby="FromHolder" placeholder="<?php echo esc_attr_x( 'Pick-up date', 'renting_form_selector_wizard', 'mybooking') ?>" readonly="true">
        </div>
        <div class="wizard-selector_field col-md-3 d-flex align-items-end">
            <input type="text" class="form-control form-control-lg bg-white" id="to_holder"
                   aria-describedby="FromHolder" placeholder="<?php echo esc_attr_x( 'Return date', 'renting_form_selector_wizard', 'mybooking') ?>" readonly="true">
        </div>
        <br>
        <div class="col-md-3 d-flex align-items-end">
            <button class="wizard-selector_btn btn" id="btn_reservation"
              type="button"><?php echo esc_html_x( 'Book', 'renting_form_selector_wizard', 'mybooking') ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
