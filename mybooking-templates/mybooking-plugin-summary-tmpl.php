<?php
/**
*   PLUGIN SUMMARY TEMPLATE
*   -----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">

  <!-- Desktop reservation detail -->
  <div class="product-detail-container d-md-flex">
    <div class="product-detail-content">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
      <% var booking_line = booking.booking_lines[idx]; %>
      <h2 class="product-name mb-3"><%=booking_line.item_description_customer_translation%></h2>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_from_full_format%> / <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_to_full_format%> / <%=booking.time_to%></li>
        <li><%=booking.return_place_customer_translation%></li>
      </ul>
      <% if (booking.days > 0) { %>
      <p class="detail-text mt-3"><?php _e('Duración del alquiler','mybooking') ?>: <span><%=booking.days%>
          <?php _e('día/s','mybooking') ?></span></p>
      <% } else if (booking.hours > 0) { %>
      <p class="detail-text"><?php _e('Duración del alquiler','mybooking') ?>: <span><%=booking.hours%>
          <?php _e('hora/s','mybooking') ?></span></p>
      <% } %>
      <% } %>
    </div>
    <div class="product-detail-image">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
      <img class="img-fluid" src="<%=booking_line.photo_full%>" alt="">
      <% } %>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-8 offset-md-2">
        <div class="col sidebar bg-white shadow-bottom py-3 px-3 my-3">
          <h4 class="color-brand-primary my-3"><?php _e('Resumen', 'mybooking') ?></h4>
          <!-- Products -->
          <ul class="list-group list-group-flush">
            <% for (var idx=0;idx<booking.booking_lines.length;idx++) { %>
            <li class="list-group-item reservation-summary-card-detail">
              <br>
              <!-- Description -->
              <span
                class="extra-name"><b><%=booking.booking_lines[idx].item_description_customer_translation%></b></span>
              <!-- Quantity -->
              <% if (configuration.multipleProductsSelection) { %>
              <span class="badge badge-info"><%=booking.booking_lines[idx].quantity%></span>
              <% } %>
              <!-- Price -->
              <span
                class="product-amount float-right"><%=configuration.formatCurrency(booking.booking_lines[idx].item_cost)%></span>
              <!-- Offer/Promotion Code Appliance -->
              <% if (booking.booking_lines[idx].item_unit_cost_base != booking.booking_lines[idx].item_unit_cost) { %>
              <br>
              <div class="float-right">
                <!-- Offer -->
                <% if (typeof booking.booking_lines[idx].offer_name !== 'undefined' &&
                            booking.booking_lines[idx].offer_name !== null && booking.booking_lines[idx].offer_name !== '') { %>
                <span class="badge badge-info"><%=booking.booking_lines[idx].offer_name%></span>
                <% if (booking.booking_lines[idx].offer_discount_type === 'percentage' && booking.booking_lines[idx].offer_value !== '') {%>
                <span class="text-danger"><%=parseInt(booking.booking_lines[idx].offer_value)%>&#37;</span>
                <% } %>
                <% } %>
                <!-- Promotion Code -->
                <% if (typeof booking.promotion_code !== 'undefined' && booking.promotion_code !== '' &&
                            typeof booking.booking_lines[idx].promotion_code_value !== 'undefined' && booking.booking_lines.promotion_code_value !== '') { %>
                <span class="badge badge-success"><%=booking.promotion_code%></span>
                <% if (booking.booking_lines[idx].promotion_code_discount_type === 'percentage' && booking.booking_lines[idx].promotion_code !== '') {%>
                <span class="text-danger"><%=parseInt(booking.booking_lines[idx].promotion_code_value)%>&#37;</span>
                <% } %>
                <% } %>
                <span class="text-muted">
                  <del><%=configuration.formatCurrency(booking.booking_lines[idx].item_unit_cost_base * booking.booking_lines[idx].quantity)%></del>
                </span>
              </div>
              <% } %>
            </li>
            <% } %>
          </ul>
          <!-- Extras -->
          <% if (booking.booking_extras.length > 0) { %>
          <ul class="list-group">
            <% for (var idx=0; idx<booking.booking_extras.length; idx++) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><%=booking.booking_extras[idx].extra_description_customer_translation%></span>
              <span class="badge badge-primary badge-pill"><%=booking.booking_extras[idx].quantity%></span>
              <span class="extra-price"><%=configuration.formatCurrency(booking.booking_extras[idx].extra_cost)%></span>
            </li>
            <% } %>
          </ul>
          <% } %>
          <!-- Supplements and Totals -->
          <% if (booking.time_from_cost > 0 || booking.pickup_place_cost > 0 ||
                 booking.time_to_cost > 0 || booking.return_place_cost > 0 ||
                 booking.driver_age_cost > 0 || booking.category_supplement_1_cost > 0
                ) { %>
          <ul class="list-group">
            <% if (booking.time_from_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento hora de entrega', 'mybooking') ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (booking.pickup_place_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento lugar de entrega', 'mybooking') ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (booking.time_to_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento hora de devolución', 'mybooking') ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (booking.return_place_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento lugar de devolución', 'mybooking') ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.return_place_cost)%></span>
            </li>
            <% } %>

            <% if (booking.driver_age_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento edad del conductor', 'mybooking') ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (booking.category_supplement_1_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento combustible', 'mybooking') ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></span>
            </li>
            <% } %>
          </ul>
          <% } %>
          <hr>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><b><?php _e('Total', 'mybooking') ?></b></span>
              <span
                class="product-amount pull-right"><b><%=configuration.formatCurrency(booking.total_cost)%></b></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><b><?php _e('Importe pagado', 'mybooking') ?></b></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_paid)%></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><b><?php _e('Importe pendiente', 'mybooking') ?></b></span>
              <span class="product-amount pull-right <% if (booking.total_pending > 0){ %>text-danger<%}%>"><b><%=configuration.formatCurrency(booking.total_pending)%></b></span>
            </li>
          </ul>

        </div><!-- /.col.sidebar -->
      </div><!-- /col -->
      <div class=" col-md-8 offset-md-2 mb-3">
                <div class="col bg-white shadow-bottom p-3">
                  <h4 class="color-brand-primary my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
                  <div class="table-responsive">
                    <table class="table table-borderless table-striped">
                      <tbody>
                        <tr>
                          <th scope="row"><?php _e('Nombre', 'mybooking') ?>:</th>
                          <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                        </tr>
                        <tr>
                          <th scope="row"><?php _e('Correo electrónico', 'mybooking') ?>:</th>
                          <td><%=booking.customer_email%></td>
                        </tr>
                        <tr>
                          <th scope="row"><?php _e('Teléfono', 'mybooking') ?>:</th>
                          <td><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div id="reservation_form_container" class="col bg-white shadow-bottom py-3 px-3 mt-3"
                  style="display:none">
                </div>
                <div id=" payment_detail" class="col bg-white shadow-bottom py-3 px-3" style="display:none">
                </div>

        </div>
      </div><!-- /row -->
    </div><!-- /container-fluid -->

</script>
