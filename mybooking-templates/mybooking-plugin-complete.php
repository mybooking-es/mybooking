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

<div class="reservation-step custom-form">

  <!-- Reservation Summary sticky -->
  <div id="reservation_detail_sticky" class="sticky-top"></div>
  <!-- Reservation summary detail -->
  <div id="reservation_detail"></div>

  <div class="bg-gray-200">
    <div class="container">
      <div class="row justify-content-center">
          <!-- Reservation : Extras -->
          <div id="extras_listing" class="col-md-12 extras"></div>
          <div class="col-md-12">
            <!-- Reservation complete -->
            <form id="form-reservation" name="reservation_form" class="bg-white shadow-bottom py-3 px-3 mt-3 mb-5">
              <h4 class="brand-primary my-3"><?php _e('Información del cliente', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name"><?php _e('Nombre', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_name" name="customer_name" type="text"
                    placeholder="<?php _e('Nombre', 'mybooking') ?>*"
                    maxlength="40">
                </div>
                <div class="form-group col-md-6">
                  <label for="surname"><?php _e('Apellidos', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_surname" name="customer_surname" type="text"
                    placeholder="<?php _e('Apellidos', 'mybooking') ?>"
                    maxlength="40">
                </div>
                <div class="form-group col-md-6">
                  <label for="email"><?php _e('Correo eléctronico', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_email" name="customer_email" type="text"
                    placeholder="<?php _e('Correo eléctronico', 'mybooking') ?>"
                    maxlength="50">
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm_customer_email"><?php _e('Confirmar correo eléctronico', 'mybooking') ?> *</label>
                  <input class="form-control" id="confirm_customer_email" name="confirm_customer_email" type="text"
                    placeholder="<?php _e('Confirmar correo eléctronico', 'mybooking') ?>"
                    maxlength="50">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone"><?php _e('Teléfono principal', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_phone" name="customer_phone" type="text"
                    placeholder="<?php _e('Teléfono principal', 'mybooking') ?>"
                    maxlength="15">
                </div>
                <div class="form-group col-md-6">
                  <label for=""><?php _e('Teléfono alternativo', 'mybooking') ?></label>
                  <input class="form-control" id="customer_mobile_phone" name="customer_mobile_phone" type="text"
                    placeholder="<?php _e('Teléfono alternativo', 'mybooking') ?>"
                    maxlength="15">
                </div>
              </div>
              <h4 class="brand-primary my-3"><?php _e('Información adicional', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="comments"><?php _e('Comentarios', 'mybooking') ?></label>
                  <textarea name="comments" id="comments" placeholder="<?php _e('Comentarios', 'mybooking') ?>"
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
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
