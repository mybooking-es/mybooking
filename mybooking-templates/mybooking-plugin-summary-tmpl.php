<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">

  <div class="col-md-8 bg-gray-50 shadow-bottom mb100 summary">
    <div id="selected_product" class="row">
      <% for (var idx=0; idx < booking.booking_lines.length; idx++) { %>
      <%   var booking_line = booking.booking_lines[idx]; %>
        <div class="col-md-6">
            <h4 class="brand-primary my-3"><?php _e('Producto contratado', 'mybooking') ?></h4>
              <p class="color-gray-800"><%=booking_line.item_id%></p>
              <p class="short-description color-gray-500"><%=booking_line.item_description_customer_translation%></p>
              <p class="price"><%=configuration.formatCurrency(booking_line.item_cost)%></p>
        </div>
        <div class="col-md-6">
            <img class="large-img float-right" src="<%=booking_line.photo_medium%>" alt="" style="max-width: 360px">
        </div>
      <% } %>
    </div>
    <% if (booking.booking_extras.length > 0) { %>
    <div id="selected_extras" class="row">
      <div class="col-md-12">
          <h4 class="brand-primary my-3"><?php _e('Extras', 'mybooking') ?></h4>
      </div>
      <% for (var idx=0;idx<booking.booking_extras.length;idx++) { %>
        <div class="col-md-3">
            <p class="color-gray-500"><%=booking.booking_extras[idx].extra_description%></p>
        </div>
        <% if (booking.booking_extras[idx].quantity > 1) {%>
          <div class="co-md-9">
              <span class="color-gray-800"><%=booking.booking_extras[idx].quantity%> x <%= configuration.formatCurrency(booking.booking_extras[idx].extra_unit_cost)%></span>
          </div>
        <% } else { %>
          <div class="co-md-9">
              <span class="color-gray-800"><%= configuration.formatCurrency(booking.booking_extras[idx].extra_cost)%></strong></span>
          </div>
        <% } %>
      <% } %>
    </div>
    <% } %>
    <hr />
    <div id="customer_data" class="row">
      <div class="col-md-12">
          <h4 class="brand-primary my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
      </div>
      <div class="col-md-3">
          <p class="color-gray-500"><?php _e('Nombre', 'mybooking') ?>:</p>
      </div>
      <div class="col-md-9">
          <span class="color-gray-800"><%=booking.customer_name%> <%=booking.customer_surname%></span>
      </div>
      <div class="col-md-3">
          <p class="color-gray-500"><?php _e('Correo eléctrónico', 'mybooking') ?>:</p>
      </div>
      <div class="col-md-9">
          <span class="color-gray-800"><%=booking.customer_email%></span>
      </div>
      <div class="col-md-3">
          <p class="color-gray-500"><?php _e('Teléfono', 'mybooking') ?>:</p>
      </div>
      <div class="col-md-9">
          <span class="color-gray-800"><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></span>
      </div>
    </div>
    <hr />
    <div id="payment_detail" class="row"></div>
  </div>

  <div class="col-md-4">
    <div class="sidebar pl-4">
      <h4 class="brand-primary"><?php _e('Detalles de la reserva', 'mybooking') ?></h4>
      <h5>Entrega</h5>
      <p><span><i class="fa fa-calendar mr-3" aria-hidden="true"></i></span><%=booking.date_from_full_format%> / <%=booking.time_from%></p>
      <p><span><i class="fa fa-map-marker mr-3" aria-hidden="true"></i></span><%=booking.pickup_place_customer_translation%></p>
      <hr>
      <h5>Devolución</h5>
      <p><span><i class="fa fa-calendar mr-3" aria-hidden="true"></i></span><%=booking.date_to_full_format%> / <%=booking.time_to%></p>
      <p><span><i class="fa fa-map-marker mr-3" aria-hidden="true"></i></span><%=booking.return_place_customer_translation%></p>
      <hr>
      <h5><?php _e('Total producto', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.item_cost)%></p>

      <% if (booking.extras_cost > 0) { %>
      <hr>
      <h5><?php _e('Total extras', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.extras_cost)%></p>
      <% } %>

      <% if (booking.time_from_cost > 0) { %>
      <hr>
      <h5><?php _e('Suplemento hora de entrega', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.time_from_cost)%></p>
      <% } %>

      <% if (booking.pickup_place_cost > 0) { %>
      <hr>
      <h5><?php _e('Suplemento lugar de entrega', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.pickup_place_cost)%></p>
      <% } %>

      <% if (booking.time_to_cost > 0) { %>
      <hr>
      <h5><?php _e('Suplemento hora de devolución', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.time_to_cost)%></p>
      <% } %>

      <% if (booking.return_place_cost > 0) { %>
      <hr>
      <h5><?php _e('Suplemento lugar de devolución', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.return_place_cost)%></p>
      <% } %>

      <hr>
      <h5><?php _e('Total', 'mybooking') ?></h5>
      <p><%=configuration.formatCurrency(booking.total_cost)%></p>
    </div>
  </div>

</script>

<!-- Payment -->
<script type="text/tmpl" id="script_payment_detail">
  <div class="col-md-12">
    <h4 class="brand-primary my-3"><?php _e('Pago', 'mybooking') ?></h4>
    <div class="callout small success">
        <p><?php _e('Para confirmar la reserva se requiere una paga y señal del 20% del importe total de la reserva', 'mybooking') ?></p>
    </div>

    <input type="radio" class="mr-2" name="" value="" id="pokemonRed" required><label for="pokemonRed"><?php _e('Tarjeta de crédito (20% de paga y señal para confirmar reserva)', 'mybooking') ?></label>
    <br>

    <input type="radio" class="mr-2" name="" value="" id="pokemonbrand-primary" required><label for="pokemonbrand-primary"><?php _e('PayPal (20% de paga y señal para confirmar reserva)', 'mybooking') ?></label>


  </div>
  <div class="col-md-12">
    <a class="btn btn-outline-dark float-left my-3" href=""><?php _e('Pagar', 'mybooking') ?></a>
  </div>
</script>
