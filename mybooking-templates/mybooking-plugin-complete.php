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
            <h4 class="brand-primary my-3">Extras</h4>
            <div id="extras_listing"></div>
          </div>

          <div class="col-md-12 bg-white shadow-bottom py-3 px-3 mt-3 mb-5">
            <!-- Reservation complete -->
            <form id="form-reservation" name="reservation_form">
              <h4 class="brand-primary my-3">Información del cliente</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input class="form-control" id="name" name="customer_name" type="text" placeholder="Nombre:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="surname">Apellidos</label>
                  <input class="form-control" id="surname" name="customer_surname" type="text"
                    placeholder="Apellidos:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Correo eléctronico</label>
                  <input class="form-control" id="email" name="customer_email" type="text"
                    placeholder="Correo eléctronico:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm_email">Confirmar correo eléctronico</label>
                  <input class="form-control" id="confirm_email" type="text"
                    placeholder="Confirmar Correo eléctronico:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Teléfono principal</label>
                  <input class="form-control" id="phone" name="customer_phone" type="text"
                    placeholder="Teléfono principal:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Teléfono alternativo</label>
                  <input class="form-control" id="mobile_phone" name="customer_mobile_phone" id="customer_mobile_phone"
                    type="text" placeholder="Teléfono alternativo:">
                </div>
              </div>

              <h4 class="brand-primary my-3">Información adicional</h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="comments">Comentarios</label>
                  <textarea name="comments" id="comments" placeholder="Comentarios"
                    style="width: 100%; height: 100px; padding: 0.8rem;"></textarea>
                </div>
              </div>

              <h4 class="brand-primary my-3">Dirección del cliente</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="street">Calle</label>
                  <input class="form-control" id="street" name="street" type="text" placeholder="Calle:">
                </div>
                <div class="form-group col-md-6">
                  <label for="number">Número</label>
                  <input class="form-control" id="number" name="number" type="text" placeholder="Número:">
                </div>
                <div class="form-group col-md-6">
                  <label for="complement">Complemento(piso/puerta)</label>
                  <input class="form-control" id="complement" name="complement" type="text" placeholder="Complemento(piso/puerta):">
                </div>
                <div class="form-group col-md-6">
                  <label for="city">Ciudad</label>
                  <input class="form-control" id="city" name="city" type="text" placeholder="Ciudad:">
                </div>
                <div class="form-group col-md-6">
                  <label for="state">Provincia</label>
                  <input class="form-control" id="state" name="state" type="text" placeholder="Provincia:">
                </div>
                <div class="form-group col-md-6">
                  <label for="country">País</label>
                  <input class="form-control" name="country" id="country" type="text" placeholder="País:">
                </div>
              </div>

              <h4 class="brand-primary my-3">Datos del conductor</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="driver_name">Nombre del conductor</label>
                  <input class="form-control" id="driver_name" name="driver_name" type="text"
                    placeholder="Nombre del conductor:">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Apellidos del conductor</label>
                  <input class="form-control" id="driver_surname" name="driver_surname" type="text" placeholder="Apellidos del conductor:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_document_id">Nif o pasaporte del conductor</label>
                  <input class="form-control" id="driver_document_id" name="driver_document_id" type="text" placeholder="Nif o pasaporte del conductor:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_date_of_birth">Fecha de nacimiento del conductor</label>
                  <input class="form-control" id="driver_date_of_birth" name="driver_date_of_birth" type="text" placeholder="Fecha de nacimiento del conductor:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_number">Número del carnet de conducir</label>
                  <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number" type="text" placeholder="Número del carnet de conducir:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_date">Fecha expedición carnet de conducir</label>
                  <input class="form-control" name="driver_driving_license_date" id="driver_driving_license_date" type="text"
                    placeholder="Fecha expedición carnet de conducir:">
                </div>
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_country">País expedición carnet de conducir</label>
                  <input class="form-control" name="driver_driving_license_country" id="driver_driving_license_country" type="text"
                    placeholder="País expedición carnet de conducir:">
                </div>
              </div>

              <h4 class="brand-primary my-3">Vuelo</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="flight_company">Compañia</label>
                  <input class="form-control" id="Compañia" name="flight_company" type="text" placeholder="Compañia:">
                </div>
                <div class="form-group col-md-6">
                  <label for="flight_number">Número de vuelo</label>
                  <input class="form-control" id="flight_number" name="flight_number" type="text" placeholder="Número de vuelo:">
                </div>
                <div class="form-group col-md-6">
                  <label for="flight_time">Hora prevista</label>
                  <input class="form-control" id="flight_time" name="flight_time" type="text" placeholder="Hora prevista:">
                </div>
              </div>

          <!-- Reservation : payment -->
          <div id="payment_detail"></div>

          <button type="submit" class="btn btn-outline-dark my-5">Solicitar reserva</a>

            </form>
        </div>
      </div>
      <!-- Reservation: Summary (sidebar) -->
      <div class="col-md-4">
        <div id="reservation_detail"></div>
      </div>
    </div>
  </div>
<<<<<<< HEAD
</div>
<?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
=======
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
>>>>>>> 86f482fabec04b5e9938d87748636441c2c0f2ae
