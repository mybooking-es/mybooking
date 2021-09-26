<?php
  /**
   * The Template for showing the renting complete step
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-complete.php
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
            <h4 class="complete-section-title customer_component"><?php echo esc_html_x( "Customer's details", 'transfer_checkout', 'mybooking-wp-plugin') ?></h4>
            <form id="mybooking_transfer_form-reservation" name="mybooking_transfer_reservation_form" autocomplete="off">
              <div class="form-row customer-component">
                <div class="form-group col-md-6">
                  <label for="customer_name"><?php echo esc_html_x( 'Name', 'transfer_checkout', 'mybooking-wp-plugin') ?>*</label>
                  <input type="text" class="form-control" name="customer_name" id="customer_name" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Name', 'renting_complete', 'mybooking-wp-plugin') ?>:*" maxlength="40">
                </div>

                <div class="form-group col-md-6">
                  <label for="customer_surname"><?php echo esc_html_x( 'Surname', 'transfer_checkout', 'mybooking-wp-plugin') ?>*</label>
                  <input type="text" class="form-control" name="customer_surname" id="customer_surname" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Surname', 'renting_complete', 'mybooking-wp-plugin') ?>:*" maxlength="40">
                </div>

                <div class="form-group col-md-6">
                  <label for="customer_email"><?php echo esc_html_x( 'E-mail', 'transfer_checkout', 'mybooking-wp-plugin') ?>*</label>
                  <input type="text" class="form-control" name="customer_email" id="customer_email" autocomplete="off" placeholder="<?php echo esc_attr_x( 'E-mail', 'renting_complete', 'mybooking-wp-plugin') ?>:*" maxlength="50">
                </div>

                <div class="form-group col-md-6">
                  <label for="customer_email"><?php echo esc_html_x( 'Confirm E-mail', 'transfer_checkout', 'mybooking-wp-plugin') ?>*</label>
                  <input type="text" class="form-control" name="confirm_customer_email" autocomplete="off" id="confirm_customer_email" placeholder="<?php echo esc_attr_x( 'Confirm E-mail', 'renting_complete', 'mybooking-wp-plugin') ?>:*" maxlength="50">
                </div>

                <div class="form-group col-md-6">
                    <label for="customer_phone"><?php echo esc_html_x( 'Phone number', 'transfer_checkout', 'mybooking-wp-plugin') ?>*</label>
                    <input type="text" class="form-control" name="customer_phone" id="customer_phone" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Phone number', 'renting_complete', 'mybooking-wp-plugin') ?>:*" maxlength="15">
                </div>

                <div class="form-group col-md-6">
                    <label for="customer_mobile_phone"><?php echo esc_html_x( 'Alternative phone number', 'transfer_checkout', 'mybooking-wp-plugin') ?></label>
                    <input type="text" class="form-control" name="customer_mobile_phone" id="customer_mobile_phone" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Alternative phone number', 'renting_complete', 'mybooking-wp-plugin') ?>:" maxlength="15">
                </div>
              </div>

              <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Additional information", 'transfer_checkout', 'mybooking-wp-plugin') ?></h5>

              <div class="form-group">
                <label for="comments"><?php echo esc_html_x( 'Comments', 'transfer_checkout', 'mybooking-wp-plugin') ?></label>
                <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="<?php echo esc_attr_x( 'Comments', 'renting_complete', 'mybooking-wp-plugin') ?>"></textarea>
              </div>
              <br>

              <!-- Reservation : payment (script_payment_detail) -->
              <div id="mybooking_transfer_payment_detail"></div>
            </form>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_complete', 'mybooking-wp-plugin' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-extra-detail-content">
      </div>
    </div>
  </div>
</div>
