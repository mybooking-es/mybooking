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
  <div class="row py-3">
    <div class="col-md-12 col-lg-8">
      <div id="steps">

        <?php
        $classes = get_body_class();

        if ( in_array('choose_product',$classes) ) {
          $choose_active = 'active';
          $step = 'Seleccionar producto';
        } elseif ( in_array('complete',$classes) ) {
          $complete_active = 'active';
          $step = 'Completar reserva';
        } elseif ( in_array('summary',$classes) ) {
          $summary_active = 'active';
          $step = 'Resumen';
        } ?>

        <div data-desc="Lugar y Fecha" class="step">1</div>
        <div data-desc="Seleccionar producto" class="<?php echo $choose_active ?> step">2</div>
        <div data-desc="Completar Reserva" class="<?php echo $complete_active ?> step">3</div>
        <div data-desc="Sumario" class="<?php echo $summary_active ?> step">4</div>
      </div>
    </div>
    <div class="col-md-12 col-lg-4 d-flex">
        <div class="d-inline-flex p-2 align-items-center">
            <h2 class="color-blue"><?php echo $step ?></h2>
        </div>
    </div>
  </div>
</div>
