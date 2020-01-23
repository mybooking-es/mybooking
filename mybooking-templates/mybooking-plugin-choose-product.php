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
  <?php $list_layout = get_option('global_list_layout');
  if ($list_layout == 0) { ?>
    <div class="">
      <div id="reservation_detail" class="sticky-top"></div>
      <div id="product_listing"></div>
    </div>
  <?php } else { ?>
      <div id="reservation_detail" class="sticky-top"></div>
      <div id="product_listing"></div>
  <?php } ?>
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>

</div>
