<?php
/**
*		RESERVATION STEPS
*  	-----------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/
?>

<div class="bg-gray-100">
  <div class="container">
    <div class="row py-3">
      <div class="col-md-12 col-lg-8">
        <div id="steps">

          <?php
        $classes = get_body_class();

        if ( in_array('choose_product',$classes) ) {
          $choose_active = 'active';
          $step = __('Seleccionar producto');
        } elseif ( in_array('complete',$classes) ) {
          $complete_active = 'active';
          $step = __('Completar reserva');
        } elseif ( in_array('summary',$classes) ) {
          $summary_active = 'active';
          $step = __('Resumen');
        } ?>

          <div data-desc="<?php _e( 'Lugar y Fecha', 'mybookinges' ) ?>" class="step">1</div>
          <div data-desc="<?php _e( 'Seleccionar producto', 'mybookinges' ) ?>"
            class="<?php echo $choose_active ?> step">2</div>
          <div data-desc="<?php _e( 'Completar Reserva', 'mybookinges' ) ?>"
            class="<?php echo $complete_active ?> step">3</div>
          <div data-desc="<?php _e( 'Sumario', 'mybookinges' ) ?>" class="<?php echo $summary_active ?> step">4</div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4 d-flex">
        <div class="d-inline-flex p-2 align-items-center">
          <h2 class="color-gray-700"><?php echo _e( $step, 'mybookinges') ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>
