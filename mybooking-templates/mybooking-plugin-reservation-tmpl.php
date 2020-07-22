<?php
/**
*   PLUGIN RESERVATION TEMPLATE
*   ---------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.0
*/
?>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
 <div class="product-detail-bg-color">
  <div class="product-detail-container">
    <div class="product-detail-content">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
      <% var booking_line = booking.booking_lines[idx]; %>
      <h2 class="product-name mb-3"><%=booking_line.item_description_customer_translation%></h2>
      <small class="detail-text"><?php _e('Localizador','mybooking') ?></small>
      <h3> <%=booking.id%> </h3>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_from_full_format%> <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_to_full_format%> <%=booking.time_to%></li>
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
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8 order-12 lg-order-lg-1">
        <div id="reservation_form_container" class="col process-section-box" style="display:none">
        </div>
      </div>

      <!-- Sidebar -->

      <div class="col-12 col-lg-4 order-1 order-lg-12">
        <div class="col process-section-box">
          <h4 class="my-3"><?php _e('Mi reserva', 'mybooking') ?></h4>
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
          <!-- Supplements and totals -->
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
        </div>

        <div class="col process-section-box">
                <h4 class="my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
                <div class="table-responsive">
                  <table class="table table-borderless table-striped">
                    <tbody>
                      <tr>
                        <th scope="row"><?php _e('Nombre', 'mybooking') ?>:</th>
                        <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                      </tr>
                      <tr>
                        <th scope="row"><?php _e('Email', 'mybooking') ?>:</th>
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

        <div id="payment_detail" class="col process-section-box" style="display:none">
        </div>

      </div><!-- /col -->
    </div><!-- /row -->
  </div><!-- /container -->

</script>

<!-- Reservation form -->
<script type="text/tmpl" id="script_reservation_form">

  <form id="form-reservation" name="booking_information_form" autocomplete="off">
    <!-- Customer address -->
    <h4 class="my-3"><?php _e('Dirección del cliente', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="street"><?php _e('Dirección', 'mybooking') ?></label>
        <input class="form-control" id="street" name="customer_address[street]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Dirección', 'mybooking') ?>")%>" value="<%=booking.address_street%>" maxlength="60">
      </div>
      <div class="form-group col-md-6">
        <label for="number"><?php _e('Número', 'mybooking') ?></label>
        <input class="form-control" id="number" name="customer_address[number]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Número', 'mybooking') ?>")%>" value="<%=booking.address_number%>" maxlength="10">
      </div>
      <div class="form-group col-md-6">
        <label for="complement"><?php _e('Complemento (piso/puerta)', 'mybooking') ?></label>
        <input class="form-control" id="complement" name="customer_address[complement]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Complemento (piso/puerta)', 'mybooking') ?>")%>" value="<%=booking.address_complement%>"  max_length="20">
      </div>
      <div class="form-group col-md-6">
        <label for="city"><?php _e('Ciudad', 'mybooking') ?></label>
        <input class="form-control" id="city" name="customer_address[city]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Ciudad', 'mybooking') ?>")%>" value="<%=booking.address_city%>" max_length="60">
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php _e('Provincia', 'mybooking') ?></label>
        <input class="form-control" id="state" name="customer_address[state]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Provincia', 'mybooking') ?>")%>" value="<%=booking.address_state%>"  max_length="60">
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php _e('Código Postal', 'mybooking') ?></label>
        <input class="form-control" id="zip" name="customer_address[zip]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Provincia', 'mybooking') ?>")%>" value="<%=booking.zip%>"  max_length="10">
      </div>
      <div class="form-group col-md-6">
        <label class="full-width" for="country"><?php _e('País', 'mybooking') ?>
          <select name="customer_address[country]" id="country" class="form-control">
          </select>
        </label>
      </div>
    </div>
    <!-- Driver information -->
    <h4 class="my-3"><?php _e('Datos del conductor', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_name" name="driver_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_surname" name="driver_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_document_id"><?php _e('Nif o pasaporte del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_document_id" name="driver_document_id" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nif o pasaporte del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_document_id%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_document_id_date"><?php _e('Fecha de expedición', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="driver_document_id_date_day" id="driver_document_id_date_day"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_document_id_date_month" id="driver_document_id_date_month"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_document_id_date_year" id="driver_document_id_date_year"
              class="form-control"></select>
          </div>
        </div>
        <input type="hidden" name="driver_document_id_date" id="driver_document_id_date"></input>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>"
          value="<%=booking.driver_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="driver_driving_license_date_day" id="driver_driving_license_date_day"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_driving_license_date_month" id="driver_driving_license_date_month"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_driving_license_date_year" id="driver_driving_license_date_year"
              class="form-control"></select>
          </div>
        </div>
        <input type="hidden" name="driver_driving_license_date" id="driver_driving_license_date"></input>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <select name="driver_driving_license_country" id="driver_driving_license_country"
            class="form-control">
          </select>
        </label>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_date_of_birth"><?php _e('Fecha de nacimiento del conductor', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="driver_date_of_birth_day" id="driver_date_of_birth_day"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_date_of_birth_month" id="driver_date_of_birth_month"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="driver_date_of_birth_year" id="driver_date_of_birth_year"
              class="form-control"></select>
          </div>
        </div>
        <input type="hidden" name="driver_date_of_birth" id="driver_date_of_birth"></input>
      </div>
    </div>
    <!-- Additional drivers -->
    <h4 class="my-3"><?php _e('Conductores adicionales', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_name" name="additional_driver_1_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_1_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_surname" name="additional_driver_1_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_1_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_driving_license_number" name="additional_driver_1_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_1_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_day" id="additional_driver_1_driving_license_date_day"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_month" id="additional_driver_1_driving_license_date_month"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_year" id="additional_driver_1_driving_license_date_year"
              class="form-control"></select>
          </div>
        </div>
        <input type="hidden" name="additional_driver_1_driving_license_date" id="additional_driver_1_driving_license_date"></input>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <select name="additional_driver_1_driving_license_country" id="additional_driver_1_driving_license_country"
            class="form-control">
          </select>
        </label>
      </div>
    </div>
    <!-- Additional driver 2 -->
    <hr>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_name" name="additional_driver_2_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_2_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_surname" name="additional_driver_2_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_2_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_driving_license_number" name="additional_driver_2_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>"
          value="<%=booking.additional_driver_2_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_day" id="additional_driver_2_driving_license_date_day"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_month" id="additional_driver_2_driving_license_date_month"
              class="form-control"></select>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_year" id="additional_driver_2_driving_license_date_year"
              class="form-control"></select>
          </div>
        </div>
        <input type="hidden" name="additional_driver_2_driving_license_date" id="additional_driver_2_driving_license_date"></input>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <select name="additional_driver_2_driving_license_country" id="additional_driver_2_driving_license_country"
            class="form-control">
          </select>
        </label>
      </div>
    </div>

    <!-- Flight information -->
    <h4 class="my-3"><?php _e('Vuelo', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="flight_company"><?php _e('Compañia', 'mybooking') ?></label>
        <input class="form-control" id="flight_company" name="flight_company" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Compañia', 'mybooking') ?>")%>" value="<%=booking.flight_company%>" maxlength="80">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_number"><?php _e('Número de vuelo', 'mybooking') ?></label>
        <input class="form-control" id="flight_number" name="flight_number" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Número de vuelo', 'mybooking') ?>")%>" value="<%=booking.flight_number%>" maxlength="10">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_time"><?php _e('Hora prevista', 'mybooking') ?></label>
        <input class="form-control" id="flight_time" name="flight_time" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Hora prevista', 'mybooking') ?>")%>" value="<%=booking.flight_time%>" maxlength="5">
      </div>
    </div>

    <h4 class="my-3"><?php _e('Vuelo de regreso', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="flight_company_departure"><?php _e('Compañia', 'mybooking') ?></label>
        <input class="form-control" id="flight_company_departure" name="flight_company_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Compañia', 'mybooking') ?>")%>" value="<%=booking.flight_company_departure%>">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_number_departure"><?php _e('Número de vuelo', 'mybooking') ?></label>
        <input class="form-control" id="flight_number_departure" name="flight_number_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Número de vuelo', 'mybooking') ?>")%>" value="<%=booking.flight_number_departure%>">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_time_departure"><?php _e('Hora prevista', 'mybooking') ?></label>
        <input class="form-control" id="flight_time_departure" name="flight_time_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Hora prevista', 'mybooking') ?>")%>" value="<%=booking.flight_time_departure%>">
      </div>
    </div>

    <hr>
    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_update_reservation"><?php _e('Actualizar', 'mybooking') ?></button>
      </div>
    </div>
  </form>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="my-3"><?php _e('Pago', 'mybooking') ?></h4>
  <% if (booking.total_paid == 0 && booking.status == 'pending_confirmation') {%>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.booking_amount', {amount:configuration.formatCurrency(booking.booking_amount) }) %>
    </div>
  <% } else if (booking.total_pending > 0 && booking.status != 'pending_confirmation' && booking.status != 'cancelled') { %>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.pending_amount', {amount:configuration.formatCurrency(booking.total_pending) }) %>
    </div>      
  <% } %> 
  <form name="payment_form">
    <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
    <div class="form-row">
       <div class="form-group col-md-12">
         <label for="payments_paypal_standard">
          <input type="radio" name="payment_method_id" value="paypal_standard">&nbsp;<?php _e('Paypal', 'mybooking') ?>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
         </label>
       </div>
       <div class="form-group col-md-12">
         <label for="payments_paypal_standard">
          <input type="radio" name="payment_method_id" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php _e('Tarjeta de crédito/débito', 'mybooking') ?>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg"/>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg"/>
         </label>
       </div>
    </div>
    <% } else if (sales_process.payment_methods.paypal_standard) {%>
      <div class="form-row">
        <div class="form-group col-md-12">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
        </div>
      </div>
      <input type="hidden" name="payment_method_id" value="paypal_standard" data-payment-method="paypal_standard">
    <% } else if (sales_process.payment_methods.tpv_virtual) {%>
      <div class="form-row">
        <div class="form-group col-md-12">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg"/>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg"/>
        </div>
      </div>

      <input type="hidden" name="payment_method_id" value="<%=sales_process.payment_methods.tpv_virtual%>"/>
    <% } %>
    <% if (sales_process.can_pay_deposit) { %>
      <input type="hidden" name="payment" value="deposit"/>
    <% } else if (booking.total_paid == 0) {%>
      <input type="hidden" name="payment" value="total"/>
    <% } else { %>
      <input type="hidden" name="payment" value="pending"/>
    <% } %>
    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_pay" type="submit"><?php _e('Pagar', 'mybooking') ?></button>
      </div>
    </div>
  </div>

</script>