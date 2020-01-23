<?php
/**
*		RESERVATION STEPS
*  	-----------------

* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="steps_container">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-auto col-md-10">
        <div id="steps" class="steps">

          <?php
        $classes = get_body_class();

        if ( in_array('choose_product',$classes) ) {
          $choose_active = 'active';
          $step = __('Seleccionar producto', 'mybooking');
        } elseif ( in_array('complete',$classes) ) {
          $complete_active = 'active';
          $step = __('Completar reserva', 'mybooking');
        } elseif ( in_array('summary',$classes) ) {
          $summary_active = 'active';
          $step = __('Resumen', 'mybooking');
        } ?>

          <div data-desc="<?php _e( 'Lugar y Fecha', 'mybooking' ) ?>" class="step">1</div>
          <div data-desc="<?php _e( 'Seleccionar producto', 'mybooking' ) ?>" class="<?php echo $choose_active ?> step">2</div>
          <div data-desc="<?php _e( 'Completar Reserva', 'mybooking' ) ?>" class="<?php echo $complete_active ?> step">3</div>
          <div data-desc="<?php _e( 'Sumario', 'mybooking' ) ?>" class="<?php echo $summary_active ?> step">4</div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4 d-flex">
        <h2 class="steps_title"><?php echo _e( $step, 'mybooking') ?></h2>
      </div>
    </div>
  </div>
</div>
