<?php
/**
*   PLUGIN RESERVATION TEMPLATE
*   ---------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.0
*/
?>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="product-detail-bg-color">
      <% if (configuration.multipleProductsSelection) { %>
      <div class="product-detail-container-several-products">
        <div class="">
          <small class="detail-text">
            <?php echo _x( 'Reservation Id', 'renting_summary', 'mybooking-wp-plugin') ?>
          </small>
          <h3><%=booking.id%></h3>
        </div>
        <div>
            <h5><?php echo _x('Delivery', 'renting_my_reservation', 'mybooking') ?></h5>
            <ul>
              <li><%=booking.date_from_full_format%> <%=booking.time_from%></li>
              <li><%=booking.pickup_place_customer_translation%></li>
            </ul>
        </div>
        <div>
          <h5><?php echo _x('Collection', 'renting_my_reservation', 'mybooking') ?></h5>
          <ul>
            <li><%=booking.date_to_full_format%> <%=booking.time_to%></li>
            <li><%=booking.return_place_customer_translation%></li>
          </ul>
        </div>
        <div class="table-responsive mt-5">
          <table class="table product-detail-table table-borderless">
            <thead>
              <tr class="bg-gray-100">
                <th></th>
                <th scope="col"><?php echo _x( 'Product', 'renting_complete', 'mybooking-wp-plugin' ) ?></th>
                <th scope="col" class="text-right"><?php echo _x( 'Price', 'renting_complete', 'mybooking-wp-plugin' ) ?></th>
                <th scope="col" class="text-right">
                  <?php echo _x( 'Quantity', 'renting_complete', 'mybooking-wp-plugin' ) ?></th>
                <th scope="col" class="text-right">
                  <?php echo _x( 'Total', 'renting_complete', 'mybooking-wp-plugin' ) ?></th>
              </tr>
            </thead>
            <tbody>
              <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
              <tr>
                <td class="text-center text-md-left"><img class="img-fluid" style="max-width: 120px"
                    src="<%=booking.booking_lines[idx].photo_medium%>"
                    alt="">
                </td>
                <td data-label="<?php echo _x( 'Product', 'renting_complete', 'mybooking-wp-plugin' ) ?>"
                  class="align-middle"><%=booking.booking_lines[idx].item_description_customer_translation%></td>
                <td data-label="<?php echo _x( 'Price', 'renting_complete', 'mybooking-wp-plugin' ) ?>"
                  class="align-middle text-right"><%=configuration.formatCurrency(booking.booking_lines[idx].item_unit_cost)%></td>
                <td data-label="<?php echo _x( 'Quantity', 'renting_complete', 'mybooking-wp-plugin' ) ?>"
                  class="align-middle text-right"><%=booking.booking_lines[idx].quantity%></td>
                <td data-label="<?php echo _x( 'Total', 'renting_complete', 'mybooking-wp-plugin' ) ?>"
                  class="align-middle text-right">
                  <%=configuration.formatCurrency(booking.booking_lines[idx].item_cost)%></td>
              </tr>
              <% } %>
            </tbody>
          </table>
        </div>
      </div>
      <% } else { %>
      <div class="product-detail-container">
        <div class="product-detail-content">
          <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
            <% var booking_line = booking.booking_lines[idx]; %>
            <h2 class="product-name mb-3"><%=booking_line.item_description_customer_translation%></h2>
            <small class="detail-text"><?php echo _x( 'Reservation Id', 'renting_my_reservation', 'mybooking-wp-plugin') ?></small>
            <h3> <%=booking.id%> </h3>
            <h5><?php echo _x('Delivery', 'renting_my_reservation', 'mybooking') ?></h5>
            <ul>
              <li><%=booking.date_from_full_format%> <%=booking.time_from%></li>
              <li><%=booking.pickup_place_customer_translation%></li>
            </ul>
            <h5 class="mt-3"><?php echo _x('Collection', 'renting_my_reservation', 'mybooking') ?></h5>
            <ul>
              <li><%=booking.date_to_full_format%> <%=booking.time_to%></li>
              <li><%=booking.return_place_customer_translation%></li>
            </ul>
            <% if (booking.days > 0) { %>
              <p class="detail-text mt-3">
              <?php echo _x( 'Rental duration', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?>: <span><%=booking.days%>
                  <?php echo _x( 'day(s)', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span></p>
            <% } else if (booking.hours > 0) { %>
              <p class="detail-text"><?php echo _x( 'Rental duration', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?>: <span><%=booking.hours%>
                  <?php echo _x('hour(s)', 'renting_my_reservation', 'mybooking-wp-plugin') ?></span></p>
            <% } %>
          <% } %>
        </div>
        <div class="product-detail-image">
          <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
            <img class="img-fluid" src="<%=booking_line.photo_full%>" alt="">
          <% } %>
        </div>
      </div>
      <% } %>
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
          <h4 class="my-3"><?php echo _x( 'My reservation', 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
          <!-- Products -->
          <ul class="list-group list-group-flush">
            <% for (var idx=0;idx<booking.booking_lines.length;idx++) { %>
            <li class="border-0 list-group-item reservation-summary-card-detail">
              <!-- Description -->
              <span
                class="extra-name"><b><%=booking.booking_lines[idx].item_description_customer_translation%></b>
              </span>
              <!-- Quantity -->
              <% if (configuration.multipleProductsSelection) { %>
              <span class="badge badge-info"><%=booking.booking_lines[idx].quantity%></span>
              <% } %>
              <!-- Price -->
              <span
                class="product-amount float-right"><%=configuration.formatCurrency(booking.booking_lines[idx].item_cost)%></span>
              <!-- Offer/Promotion Code Appliance -->
              <% if (booking.booking_lines[idx].item_unit_cost_base != booking.booking_lines[idx].item_unit_cost) { %>
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
          <ul class="list-group border-0 list-group-flush">
            <% for (var idx=0; idx<booking.booking_extras.length; idx++) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
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
          <ul class="list-group border-0 list-group-flush">
            <% if (booking.time_from_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( 'Pick-up time supplement', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (booking.pickup_place_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( 'Pick-up place supplement', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (booking.time_to_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( 'Return time supplement', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (booking.return_place_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( 'Return place supplement', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.return_place_cost)%></span>
            </li>
            <% } %>

            <% if (booking.driver_age_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( "Driver's age supplement", 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (booking.category_supplement_1_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo _x( "Petrol supplement", 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></span>
            </li>
            <% } %>
          </ul>
          <% } %>
          <ul class="list-group border-0 list-group-flush mt-3">
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo _x( 'Total', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></b></span>
              <span
                class="product-amount pull-right"><b><%=configuration.formatCurrency(booking.total_cost)%></b></span>
            </li>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo _x( 'Paid', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></b></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_paid)%></span>
            </li>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo _x( 'Pending', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?></b></span>
              <span class="product-amount pull-right <% if (booking.total_pending > 0){ %>text-danger<%}%>"><b><%=configuration.formatCurrency(booking.total_pending)%></b></span>
            </li>
          </ul> 
        </div>

        <div class="col process-section-box">
                <h4 class="my-3">
                  <?php echo _x( "Customer's details", 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
                <div class="table-responsive">
                  <table class="table table-borderless table-striped">
                    <tbody>
                      <tr>
                        <th scope="row"><i class="far fa-user"></i></th>
                        <td class="text-right"><%=booking.customer_name%> <%=booking.customer_surname%></td>
                      </tr>
                      <tr>
                        <th scope="row"><i class="far fa-envelope"></i></th>
                        <td class="text-right"><%=booking.customer_email%></td>
                      </tr>
                      <tr>
                        <th scope="row"><i class="fas fa-phone"></i></th>
                        <td class="text-right"><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </div>

        <div id="payment_detail" class="col process-section-box" style="display:none">
        </div>

      </div><!-- /col sidebar -->
    </div><!-- /row -->
  </div><!-- /container -->

</script>

<!-- Reservation form -->
<script type="text/tmpl" id="script_reservation_form">

  <form id="form-reservation" name="booking_information_form" autocomplete="off">
    <!-- Customer address -->
    <h4 class="my-3"><?php echo _x( 'Customer address', 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="street"><?php echo _x( 'Address', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="street" name="customer_address[street]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Address', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.address_street%>" maxlength="60">
      </div>
      <div class="form-group col-md-6">
        <label for="number"><?php echo _x( 'Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="number" name="customer_address[number]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.address_number%>" maxlength="10">
      </div>
      <div class="form-group col-md-6">
        <label for="complement"><?php echo _x( 'Complement', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="complement" name="customer_address[complement]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Complement', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.address_complement%>"  max_length="20">
      </div>
      <div class="form-group col-md-6">
        <label for="city"><?php echo _x( 'City', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="city" name="customer_address[city]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'City', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.address_city%>" max_length="60">
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php echo _x( 'State', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="state" name="customer_address[state]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'State', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.address_state%>"  max_length="60">
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php echo _x( 'Postal Code', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="zip" name="customer_address[zip]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x( 'State', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.zip%>"  max_length="10">
      </div>
      <div class="form-group col-md-6">
        <label class="full-width"
          for="country"><?php echo _x( 'Country', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
          <select name="customer_address[country]" id="country" class="form-control">
          </select>
      </div>
    </div>
    <!-- Driver information -->
    <h4 class="my-3"><?php _e('Datos del conductor', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php echo  _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="driver_name" name="driver_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo  _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.driver_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="driver_surname" name="driver_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.driver_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_document_id"><?php echo  _x("ID card or passport", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="driver_document_id" name="driver_document_id" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo  _x("ID card or passport", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.driver_document_id%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_document_id_date"><?php echo  _x('Date of Issue', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
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
          for="driver_driving_license_number"><?php echo  _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php echo  _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.driver_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php echo _x('Driving license date of issue', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
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
        <label class="w-100"
          for="driver_driving_license_country"><?php echo  _x('Driving license expedition country', 'renting_my_reservation', 'mybooking-wp-plugin') ?>
          </label>
          <select name="driver_driving_license_country" id="driver_driving_license_country"
            class="form-control mt-0">
          </select>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_date_of_birth"><?php echo  _x('Date of birth', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
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
    <h4 class="my-3"><?php echo _x('Additional drivers', 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php echo _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_1_name" name="additional_driver_1_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_1_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_1_surname" name="additional_driver_1_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_1_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php echo _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_1_driving_license_number" name="additional_driver_1_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php echo _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_1_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php echo _x('Driving license date of issue', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
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
        <label for="driver_driving_license_country">
          <?php echo _x('Driving license expedition country', 'renting_my_reservation', 'mybooking-wp-plugin') ?>
          </label>
          <select name="additional_driver_1_driving_license_country" id="additional_driver_1_driving_license_country"
            class="form-control">
          </select>
        
      </div>
    </div>
    <!-- Additional driver 2 -->
    <hr>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php echo _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_2_name" name="additional_driver_2_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x("Name", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_2_name%>"
          maxlength="40">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_2_surname" name="additional_driver_2_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x("Surname", 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_2_surname%>"
          maxlength="40">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php echo _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="additional_driver_2_driving_license_number" name="additional_driver_2_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php echo _x('Driving license number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>"
          value="<%=booking.additional_driver_2_driving_license_number%>"
          maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php echo _x('Driving license date of issue', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
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
          for="driver_driving_license_country"><?php echo _x('Driving license expedition country', 'renting_my_reservation', 'mybooking-wp-plugin') ?>
              </label>
          <select name="additional_driver_2_driving_license_country" id="additional_driver_2_driving_license_country"
            class="form-control">
          </select>
    
      </div>
    </div>

    <!-- Flight information -->
    <h4 class="my-3"><?php echo _x('Flight', 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="flight_company"><?php echo _x('Company', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_company" name="flight_company" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Company', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_company%>" maxlength="80">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_number"><?php echo _x('Flight Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_number" name="flight_number" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Flight Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_number%>" maxlength="10">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_time"><?php echo _x('Estimated Time', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_time" name="flight_time" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Estimated Time', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_time%>" maxlength="5">
      </div>
    </div>

    <h4 class="my-3"><?php echo _x('Return flight', 'renting_my_reservation', 'mybooking-wp-plugin') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="flight_company_departure"><?php echo _x('Company', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_company_departure" name="flight_company_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Company', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_company_departure%>">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_number_departure"><?php echo _x('Flight Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_number_departure" name="flight_number_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Flight Number', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_number_departure%>">
      </div>
      <div class="form-group col-md-4">
        <label for="flight_time_departure"><?php echo _x('Estimated Time', 'renting_my_reservation', 'mybooking-wp-plugin') ?></label>
        <input class="form-control" id="flight_time_departure" name="flight_time_departure" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo _x('Estimated Time', 'renting_my_reservation', 'mybooking-wp-plugin') ?>")%>" value="<%=booking.flight_time_departure%>">
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_update_reservation">
        <?php echo _x( 'Update', 'renting_my_reservation', 'mybooking-wp-plugin') ?></button>
      </div>
    </div>
  </form>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="my-3"><%= i18next.t('myReservation.pay.total_payment', {amount:configuration.formatCurrency(amount) }) %></h4>
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
          <input type="radio" name="payment_method_id" value="paypal_standard">&nbsp;<?php echo _x( 'Paypal', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
         </label>
       </div>
       <div class="form-group col-md-12">
         <label for="payments_paypal_standard">
          <input type="radio" name="payment_method_id"
            value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo _x( 'Credit or debit card', 'renting_my_reservation', 'mybooking-wp-plugin' ) ?>
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
        <button class="btn btn-outline-dark" id="btn_pay" type="submit"><%= i18next.t('myReservation.pay.payment_button', {amount:configuration.formatCurrency(amount) }) %></button>
      </div>
    </div>
  </div>

</script>