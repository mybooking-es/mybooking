<?php
  /**
   * The Template for showing the renting select product step
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-choose-product.php
   *
   */
?>

<!-- Reservation steps -->
<?php get_template_part('mybooking-templates/mybooking-reservation-steps'); ?>

<div class="reservation-step process-container reservation-step-choose-product">
  <!-- Reservation : Pickup/Return information -->

  <div id="reservation_detail" class="sticky-top"></div>
  <div id="product_listing" 
       <?php if ( array_key_exists('use_renting_detail_page', $args) && $args['use_renting_detail_page'] == 'true' ) : ?>
       data-use-renting-detail-page="true" 
       <?php endif; ?>></div>

</div>

<div class="modal mybooking-modal" tabindex="-1" role="dialog" id="modalProductDetail">
  <div class="modal-dialog modal-dialog-centered" role="document">
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
