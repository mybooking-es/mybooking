<?php
/**
*   PLUGIN COMPLETE PAGE
*   --------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*   Areas managed by the Reservation engine
*
*   Container                        Script
*   ----------------------------     ------------------------
*   id=reservation_detail_sticky ->  script_reservation_summary_sticky
*   id=reservation_detail        ->  script_reservation_summary
*   id=extras_listing            ->  script_detailed_extra
*   id=payment_detail            ->  script_payment_detail
*/
?>
<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<!-- Modify reservation -->
<?php if ( $args['selector_in_process'] != 'wizard' ) { ?>
<?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
<?php } ?>

<div class="reservation-step process-container reservation-step-complete custom-form">

  <!-- Reservation Summary sticky -->
  <div id="reservation_detail_sticky" class="sticky-top"></div>

  <!-- Reservation summary detail -->
  <div id="reservation_detail"></div>

  <div class="container">
    <div class="row">
      <div class="col">
        <!-- Reservation : Extras -->
        <div id="extras_listing" class="extras"></div>

        <div class="process-section-box">
          <!-- Reservation complete -->
          <form id="form-reservation" name="reservation_form" class="">
            <h4 class="brand-primary my-3">
            <?php echo _x( "Customer's details", 'renting_complete', 'mybooking-wp-plugin') ?></h4>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name"><?php echo _x( 'Name', 'renting_complete', 'mybooking-wp-plugin') ?> *</label>
                <input class="form-control" id="customer_name" name="customer_name" type="text"
                  placeholder="<?php echo _x( 'Name', 'renting_complete', 'mybooking-wp-plugin') ?>*" maxlength="40">
              </div>
              <div class="form-group col-md-6">
                <label for="surname"><?php echo _x( 'Surname', 'renting_complete', 'mybooking-wp-plugin') ?> *</label>
                <input class="form-control" id="customer_surname" name="customer_surname" type="text"
                  placeholder="<?php echo _x( 'Surname', 'renting_complete', 'mybooking-wp-plugin') ?>" maxlength="40">
              </div>
              <div class="form-group col-md-6">
                <label for="email"><?php echo _x( 'E-mail', 'renting_complete', 'mybooking-wp-plugin') ?> *</label>
                <input class="form-control" id="customer_email" name="customer_email" type="text"
                  placeholder="<?php echo _x( 'E-mail', 'renting_complete', 'mybooking-wp-plugin') ?>" maxlength="50">
              </div>
              <div class="form-group col-md-6">
                <label for="confirm_customer_email"><?php echo _x( 'Confirm E-mail', 'renting_complete', 'mybooking-wp-plugin') ?> *</label>
                <input class="form-control" id="confirm_customer_email" name="confirm_customer_email" type="text"
                  placeholder="<?php echo _x( 'Confirm E-mail', 'renting_complete', 'mybooking-wp-plugin') ?>" maxlength="50">
              </div>
              <div class="form-group col-md-6">
                <label for="customer_phone"><?php echo _x( 'Phone number', 'renting_complete', 'mybooking-wp-plugin') ?>
                  *</label>
                <input class="form-control" id="customer_phone" name="customer_phone" type="text"
                  placeholder="<?php echo _x( 'Phone number', 'renting_complete', 'mybooking-wp-plugin') ?>" maxlength="15">
              </div>
              <div class="form-group col-md-6">
                <label
                  for="customer_mobile_phone"><?php echo _x( 'Alternative phone number', 'renting_complete', 'mybooking-wp-plugin') ?></label>
                <input class="form-control" id="customer_mobile_phone" name="customer_mobile_phone" type="text"
                  placeholder="<?php echo _x( 'Alternative phone number', 'renting_complete', 'mybooking-wp-plugin') ?>" maxlength="15">
              </div>
            </div>
            <h4 class="brand-primary my-3"><?php echo _x( "Additional information", 'renting_complete', 'mybooking-wp-plugin') ?></h4>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="comments"><?php echo _x( 'Comments', 'renting_complete', 'mybooking-wp-plugin') ?></label>
                <textarea name="comments" id="comments" placeholder="<?php echo _x( 'Comments', 'renting_complete', 'mybooking-wp-plugin') ?>"
                  style="width: 100%; height: 100px; padding: 0.8rem;"></textarea>
              </div>
            </div>
            <!-- Reservation : payment -->
            <div id="payment_detail"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Show extra detail modal -->
<div class="modal modal-mybooking" tabindex="-1" role="dialog" id="modalExtraDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-extra-detail-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-extra-detail-content">
      </div>
    </div>
  </div>
</div>