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
  <div class="process-section-box">
    <small class="detail-text"><?php _e('Localizador','mybooking') ?></small>
    <h3> <%=booking.id%> </h3>

    <div class="product-detail-summary-dates">
      <ul>
        <li><%=booking.date_from_full_format%> <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <div class="product-detail-separator"> <i class="fa fa-long-arrow-right"></i> </div>
      <ul>
        <li><%=booking.date_to_full_format%> <%=booking.time_to%></li>
        <li><%=booking.return_place_customer_translation%></li>
      </ul>
    </div>
    <!-- Products -->
    <ul class="list-group list-group-flush">
      <!-- Show all the products in the reservation -->
      <% for (var idx=0;idx<booking.booking_lines.length;idx++) { %>
        <li class="list-group-item product-detail-list">
          <div class="product-detail-list-img-wrapper">
            <img class="product-detail-list-img" src="<%=booking.booking_lines[idx].photo_full%>" alt="">
          </div>
          <!-- Description -->
          <span
            class="extra-name"><b><%=booking.booking_lines[idx].item_description_customer_translation%></b></span>
          <!-- Quantity -->
          <% if (configuration.multipleProductsSelection) { %>
          <span class="badge badge-info"><%=booking.booking_lines[idx].quantity%></span>
          <% } %>
          <!-- Price -->
          <span
            class="product-amount float-right"><%=configuration.formatCurrency(booking.booking_lines[idx].item_cost)%>
          </span>
          <!-- Offer/Promotion Code Appliance -->
          <% if (booking.booking_lines[idx].item_unit_cost_base != booking.booking_lines[idx].item_unit_cost) { %>
            <span class="float-right mr-2">
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
            <% } %>
            </span>
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
      <span><%=configuration.formatCurrency(booking.booking_extras[idx].extra_cost)%></span>
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
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.pickup_place_cost)%></span>
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
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.return_place_cost)%></span>
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
      <span class="product-amount pull-right"><b><%=configuration.formatCurrency(booking.total_cost)%></b></span>
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

  </div>
        <div class="process-section-box">
          <h4 class="my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
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
        
        <div id="reservation_form_container" class="col bg-white shadow-bottom py-3 px-3 mt-3"
          style="display:none">
        </div>
        <div id=" payment_detail" class="col bg-white shadow-bottom py-3 px-3" style="display:none">
        </div>
      </div>
</script>