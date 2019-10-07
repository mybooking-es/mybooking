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
                  <input class="form-control" id="surname" name="customer_surname" type="text" placeholder="Apellidos:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Correo eléctronico</label>
                  <input class="form-control" id="email" name="customer_email" type="text"
                    placeholder="Correo eléctronico:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm_email">Confirmar correo eléctronico</label>
                  <input class="form-control" id="confirm_email" type="text" placeholder="Confirmar Correo eléctronico:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Teléfono principal</label>
                  <input class="form-control" id="phone" name="customer_phone" type="text"
                    placeholder="Teléfono principal:*">
                </div>
                <div class="form-group col-md-6">
                  <label for="mobile_phone">Teléfono alternativo</label>
                  <input class="form-control" id="mobile_phone" name="customer_mobile_phone" id="customer_mobile_phone"
                    type="text" placeholder="Teléfono alternativo:">
                </div>
              </div>

              <h4 class="brand-primary my-3">Información adicional</h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="comments">Comentarios</label>
                  <textarea name="comments" id="comments" placeholder="Comentarios" style="width: 100%; height: 100px; padding: 0.8rem;"></textarea>
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
  </div>
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
