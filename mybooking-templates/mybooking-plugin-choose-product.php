<?php
/**
*   PLUGIN CHOOSE PAGE
*   ------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<div class="reservation-step">
  <!-- Reservation : Pickup/Return information -->
  <div class="bg-gray-200 py-5">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-3">
          <div id="reservation_detail"></div>
        </div>
        <div class="col-12 col-lg-8">
          <div id="product_listing" class="magic-cards mb-5"></div>
        </div>
      </div>
    </div>
    <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
  </div>
</div>
