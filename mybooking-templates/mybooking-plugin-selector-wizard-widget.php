<?php
/**
*   PLUGIN SELECTOR WIZARD
*   ----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.5.0
*/
?>

<!-- Search form -->
<section class="section">
  <div class="wizard-selector container">
<<<<<<< HEAD
    <form class="wizard-selector_form" name="wizard_search_form">

      <input type="hidden" name="pickup_place">
      <input type="hidden" name="return_place">
      <input type="hidden" name="date_from">
      <input type="hidden" name="time_from">
      <input type="hidden" name="time_to">

=======
    <form class="wizard-selector_form mt-5" name="wizard_search_form">
>>>>>>> 131db393be4fcc4237647faffe2cbf33d8ae1467
      <div class="row">
        <div class="wizard-selector_field col-md-3">
            <label for="place_holder"><?php _e('¿Dónde?','mybooking') ?></label>
            <input type="text" class="form-control form-control-lg bg-white" id="place_holder"
                   aria-describedby="pickupPlaceHolder" placeholder="Elige un lugar" readonly="true">
        </div>
        <div class="wizard-selector_field col-md-3">
            <label for="from_holder"><?php _e('¿Cuando?','mybooking') ?></label>
            <input type="text" class="form-control form-control-lg bg-white" id="from_holder"
                   aria-describedby="FromHolder" placeholder="Fecha de salida" readonly="true">
        </div>
        <div class="wizard-selector_field col-md-3 d-flex align-items-end">
            <input type="text" class="form-control form-control-lg bg-white" id="to_holder"
                   aria-describedby="FromHolder" placeholder="Fecha de salida" readonly="true">
        </div>
        <br>
        <div class="col-md-3 d-flex align-items-end">
            <button class="wizard-selector_btn btn btn-success" id="btn_reservation" type="button"><?php _e('Reservar','mybooking') ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
