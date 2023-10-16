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

      <?php if ( array_key_exists('sales_channel_code', $args) && $args['sales_channel_code'] != '' ) : ?>
        <input type="hidden" name="sales_channel_code" value="<?php echo esc_attr( $args['sales_channel_code'] )?>" />
      <?php endif; ?>
      
      <?php if ( array_key_exists('family_id', $args) && $args['family_id'] != '' ) : ?>
        <input type="hidden" name="family_id" value="<?php echo esc_attr(  $args['family_id'] )?>" />
      <?php endif; ?>

      <?php if ( array_key_exists('category_code', $args) && $args['category_code'] != '' ) : ?>
        <input type="hidden" name="category_code" value="<?php echo esc_attr( $args['category_code'] )?>"/>
        <input type="hidden" name="engine_fixed_product" value="true"/>
      <?php endif; ?>

      <?php if ( array_key_exists('rental_location_code', $args) && $args['rental_location_code'] != '' ) : ?>
        <input type="hidden" name="rental_location_code" value="<?php echo esc_attr( $args['rental_location_code'] )?>"/>
      <?php endif; ?>
    
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
