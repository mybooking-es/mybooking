<?php
  /**
   * The Template for showing the renting select product step
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-transfer-choose-vehicle.php
   *
   */
?>
<?php get_template_part('mybooking-templates/mybooking-transfer-reservation-steps'); ?>

<section class="mybooking mybooking-transfer_choose">
  <!-- Reservation detail -->
  <div id="mybooking_transfer_reservation_detail"></div>

  <!-- Vehicle listing -->
  <div class="container mybooking-transfer_vehicle-list">
    <div class="row">
      <div class="col-lg-12">
        <div id="mybooking_transfer_product_listing"></div>
      </div>
    </div>
  </div>
</section>

<!-- Modal that shows the product detail -->
<div class="modal modal-mybooking" tabindex="-1" role="dialog" id="modalTransferProductDetail">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-product-detail-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_choose_product', 'mybooking-wp-plugin' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-product-detail-content">
      </div>
    </div>
  </div>
</div>
