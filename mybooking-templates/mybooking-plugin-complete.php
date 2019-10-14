<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<div class="reservation-step custom-form">

  <!-- Reservation : Selected product -->
  <div id="selected_product" class="product-detail"></div>

  <div class="bg-gray-200">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">

          <div class="col-md-12 bg-white shadow-bottom py-3 px-3 mt-5">
            <!-- Reservation : Extras -->
            <h4 class="brand-primary my-3"><?php _e('Extras', 'mybooking') ?></h4>
            <div id="extras_listing"></div>
          </div>

          <div class="col-md-12 bg-white shadow-bottom py-3 px-3 mt-3 mb-5">
            <!-- Reservation complete -->
            <form id="form-reservation" name="reservation_form">
              <h4 class="brand-primary my-3"><?php _e('Información del cliente', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name"><?php _e('Nombre') ?></label>
                  <input class="form-control" id="customer_name" name="customer_name" type="text" placeholder="<?php _e('Nombre') ?>:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="surname"><?php _e('Apellidos') ?></label>
                  <input class="form-control" id="customer_surname" name="customer_surname" type="text"
                    placeholder="<?php _e('Apellidos') ?>:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="email"><?php _e('Correo eléctronico') ?></label>
                  <input class="form-control" id="customer_email" name="customer_email" type="text"
                    placeholder="<?php _e('Correo eléctronico') ?>:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm_customer_email"><?php _e('Confirmar correo eléctronico') ?></label>
                  <input class="form-control" id="confirm_customer_email" name="confirm_customer_email" type="text"
                    placeholder="<?php _e('Confirmar correo eléctronico') ?>:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone"><?php _e('Teléfono principal') ?></label>
                  <input class="form-control" id="customer_phone" name="customer_phone" type="text"
                    placeholder="<?php _e('Teléfono principal') ?>:*">
                </div>
                <div class="form-group col-md-6">
                  <label for=""><?php _e('Teléfono alternativo') ?></label>
                  <input class="form-control" id="customer_mobile_phone" name="customer_mobile_phone" 
                    type="text" placeholder="<?php _e('Teléfono alternativo') ?>:">
                </div>
              </div>
              <h4 class="brand-primary my-3"><?php _e('Información adicional') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="comments"><?php _e('Comentarios', 'mybooking') ?></label>
                  <textarea name="comments" id="comments" placeholder="<?php _e('Comentarios', 'mybooking') ?>"
                    style="width: 100%; height: 100px; padding: 0.8rem;"></textarea>
                </div>
              </div>
              <h4 class="brand-primary my-3"><?php _e('Dirección del cliente') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="street"><?php _e('Calle', 'mybooking') ?></label>
                  <input class="form-control" id="street" name="street" type="text" placeholder="<?php _e('Calle', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="number"><?php _e('Número', 'mybooking') ?></label>
                  <input class="form-control" id="number" name="number" type="text" placeholder="<?php _e('Número', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="complement"><?php _e('Complemento(piso/puerta)', 'mybooking') ?></label>
                  <input class="form-control" id="complement" name="complement" type="text" placeholder="<?php _e('Complemento(piso/puerta)', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="city"><?php _e('Ciudad', 'mybooking') ?></label>
                  <input class="form-control" id="city" name="city" type="text" placeholder="<?php _e('Ciudad', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="state"><?php _e('Provincia', 'mybooking') ?></label>
                  <input class="form-control" id="state" name="state" type="text" placeholder="<?php _e('Provincia', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="country"><?php _e('País', 'mybooking') ?></label>
                  <input class="form-control" name="country" id="country" type="text" placeholder="<?php _e('País', 'mybooking') ?>:">
                </div>
              </div>
              <h4 class="brand-primary my-3"><?php _e('Datos del conductor') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
                  <input class="form-control" id="driver_name" name="driver_name" type="text"
                    placeholder="<?php _e('Nombre del conductor', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
                  <input class="form-control" id="driver_surname" name="driver_surname" type="text" placeholder="<?php _e('Apellidos del conductor', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_document_id"><?php _e('Nif o pasaporte del conductor', 'mybooking') ?></label>
                  <input class="form-control" id="driver_document_id" name="driver_document_id" type="text" placeholder="<?php _e('Nif o pasaporte del conductor', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_date_of_birth"><?php _e('Fecha de nacimiento del conductor', 'mybooking') ?></label>
                  <input class="form-control" id="driver_date_of_birth" name="driver_date_of_birth" type="text" placeholder="<?php _e('Fecha de nacimiento del conductor', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
                  <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number" type="text" placeholder="<?php _e('Número del carnet de conducir', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
                  <input class="form-control" name="driver_driving_license_date" id="driver_driving_license_date" type="text"
                    placeholder="<?php _e('Fecha expedición carnet de conducir', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?></label>
                  <input class="form-control" name="driver_driving_license_country" id="driver_driving_license_country" type="text"
                    placeholder="<?php _e('País de expedición carnet de conducir', 'mybooking') ?>:">
                </div>
              </div>
              <h4 class="brand-primary my-3"><?php _e('Vuelo') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="flight_company"><?php _e('Compañia') ?></label>
                  <input class="form-control" id="flight_company" name="flight_company" type="text" placeholder="<?php _e('Compañia') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="flight_number"><?php _e('Número de vuelo', 'mybooking') ?></label>
                  <input class="form-control" id="flight_number" name="flight_number" type="text" placeholder="<?php _e('Número de vuelo', 'mybooking') ?>:">
                </div>
                <div class="form-group col-md-6">
                  <label for="flight_time"><?php _e('Hora prevista', 'mybooking') ?></label>
                  <input class="form-control" id="flight_time" name="flight_time" type="text" placeholder="<?php _e('Hora prevista', 'mybooking') ?>:">
                </div>
              </div>
              <!-- Reservation : payment -->
              <div id="payment_detail"></div>
            </form>
           
        </div>
      </div>
      <!-- Reservation: Summary (sidebar) -->
      <div class="col-md-4">
        <div id="reservation_detail"></div>
      </div>
    </div>
  </div>
</div>
<?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
