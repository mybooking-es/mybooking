<?php
/**
*   PLUGIN CHOOSE PAGE
*   ------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<div class="reservation-step process-container reservation-step-choose-product">
  <!-- Reservation : Pickup/Return information -->

  <div id="reservation_detail" class="sticky-top"></div>
  <div id="product_listing"></div>

  <!-- Modify reservation -->
  <?php if ( $args['selector_in_process'] != 'wizard' ) { ?>
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
  <?php } ?>

</div>

<div class="modal modal-mybooking" tabindex="-1" role="dialog" id="modalProductDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-product-detail-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_choose_product', 'mybooking' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-product-detail-content">
      </div>
    </div>
  </div>
</div>