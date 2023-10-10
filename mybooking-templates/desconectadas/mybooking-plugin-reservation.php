<?php
  /** 
   * The Template for showing the renting reservation
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-reservation.php
   *
   */
?>
<div class="reservation-step process-container reservation-step-reservation custom-form">
  <div class="process-message">
    <h4 id="reservation_title" ></h4>
  </div>
  <div id="reservation_detail"></div>
</div>

<div class="modal modal-mybooking" tabindex="-1" role="dialog" id="modalSignatureValidation">
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