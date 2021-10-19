<?php
  /**
   * The Template for showing the renting complete step
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-checkout.php
   *
   *   Areas managed by the Reservation engine
   *
   *   Container                                 Script
   *   ----------------------------              ------------------------
   *   id=mybooking_transfer_reservation_detail  ->  script_transfer_reservation_summary
   *   id=mybooking_transfer_extras_listing      ->  script_transfer_detailed_extra
   *   id=mybooking_transfer_payment_detail      ->  script_transfer_payment_detail
   *
   */
?>

<!-- Reservation steps -->
<?php get_template_part('mybooking-templates/mybooking-transfer-reservation-steps'); ?>

<section class="mybooking mybooking-transfer_complete reservation-step process-container reservation-step-complete custom-form">
  <!-- Reservation detail/summary (script_reservation_summary) -->
  <div id="mybooking_transfer_reservation_detail"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Extras Selection (script_detailed_extra) -->
        <div id="mybooking_transfer_extras_listing"></div>

        <!-- Reservation complete -->
        <div class="reservation_form_container">
          <div class="process-section-box">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Show extra detail modal -->
<div class="modal fade modal-mybooking" tabindex="-1" role="dialog" id="mybooking_transfer_modalExtraDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-extra-detail-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'transfer_complete', 'mybooking-wp-plugin' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-extra-detail-content">
      </div>
    </div>
  </div>
</div>
