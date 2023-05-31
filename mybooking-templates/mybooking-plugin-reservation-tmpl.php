<?php
  /** 
   * The Template for showing the reservation reservation - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-reservation-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
   */
?>
<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="product-detail-bg-color">
      <% if (configuration.multipleProductsSelection) { %>
        <div class="product-detail-container-several-products">
          <div class="">
            <small class="detail-text">
              <?php echo esc_html_x( 'Reservation Id', 'renting_summary', 'mybooking') ?>
            </small>
            <h3><%=booking.id%></h3>
          </div>
          <!-- Delivery -->
          <div>
              <h5><?php echo esc_html_x('Delivery', 'renting_my_reservation', 'mybooking') ?></h5>
              <ul>
                <li><%=booking.date_from_full_format%> 
                    <% if (configuration.rentDateSelector === 'date_from_duration' && booking.days == 0) { %>
                       (<%=booking.time_from%> - <%=booking.time_to%>)
                    <% } else if (configuration.timeToFrom) { %>
                       <%=booking.time_from%>
                    <% } %>
                </li>
                <% if (configuration.pickupReturnPlace) {%>
                  <li><%=booking.pickup_place_customer_translation%></li>
                <% } %>
              </ul>
          </div>
          <!-- Collection -->
          <% if (configuration.rentDateSelector === 'date_from_date_to' || configuration.pickupReturnPlace) { %>
            <div>
              <h5><?php echo esc_html_x('Collection', 'renting_my_reservation', 'mybooking') ?></h5>
              <ul>
                <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
                  <li><%=booking.date_to_full_format%> 
                    <% if (configuration.timeToFrom) { %><%=booking.time_to%><% } %>
                  </li>
                <% } %>  
                <% if (configuration.pickupReturnPlace) {%>
                  <li><%=booking.return_place_customer_translation%></li>
                <% } %>
              </ul>
            </div>
          <% } %>
          
          <div class="table-responsive mt-5">
            <table class="table product-detail-table table-borderless">
              <thead>
                <tr class="bg-gray-100">
                  <th></th>
                  <th scope="col"><?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?></th>
                  <th scope="col" class="text-right"><?php echo esc_html_x( 'Price', 'renting_complete', 'mybooking' ) ?></th>
                  <th scope="col" class="text-right">
                    <?php echo esc_html_x( 'Quantity', 'renting_complete', 'mybooking' ) ?></th>
                  <th scope="col" class="text-right">
                    <?php echo esc_html_x( 'Total', 'renting_complete', 'mybooking' ) ?></th>
                </tr>
              </thead>
              <tbody>
                <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
                <tr>
                  <td class="text-center text-md-left"><img class="img-fluid" style="max-width: 120px"
                      src="<%=booking.booking_lines[idx].photo_medium%>"
                      alt="">
                  </td>
                  <td data-label="<?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?>"
                    class="align-middle"><%=booking.booking_lines[idx].item_description_customer_translation%></td>
                  <td data-label="<?php echo esc_html_x( 'Price', 'renting_complete', 'mybooking' ) ?>"
                    class="align-middle text-right"><%=configuration.formatCurrency(booking.booking_lines[idx].item_unit_cost)%></td>
                  <td data-label="<?php echo esc_html_x( 'Quantity', 'renting_complete', 'mybooking' ) ?>"
                    class="align-middle text-right"><%=booking.booking_lines[idx].quantity%></td>
                  <td data-label="<?php echo esc_html_x( 'Total', 'renting_complete', 'mybooking' ) ?>"
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
              <!-- Optional external driver + driving license -->
              <% if ((typeof booking.optional_external_driver !== '' &&
                     booking.optional_external_driver) ||
                    (typeof booking.item_driving_license_type_name !== '' &&
                     booking.item_driving_license_type_name) ) { %>
                <% if (typeof booking.optional_external_driver !== '' &&
                      booking.optional_external_driver) { %>
                  <span class="badge badge-secondary"><%=booking.optional_external_driver%></span>    
                <% } %>
                <% if (typeof booking.item_driving_license_type_name !== '' &&
                      booking.item_driving_license_type_name) { %>
                  <span class="badge badge-secondary"><%=booking.item_driving_license_type_name%></span>    
                <% } %>
              <% } %>

              <% if (typeof booking.item_hired_info !== '' &&
                      booking.item_hired_info) { %>
                <p class="text-muted mt-2"><%=booking.item_hired_info%></p>
              <% } %>

              <small class="detail-text"><?php echo esc_html_x( 'Reservation Id', 'renting_my_reservation', 'mybooking') ?></small>
              <h3> <%=booking.id%> </h3>

              <!-- Delivery -->  
              <% if (configuration.rentDateSelector === 'date_from_date_to' || configuration.pickupReturnPlace) { %>
                <h5><?php echo esc_html_x('Delivery', 'renting_my_reservation', 'mybooking') ?></h5>
              <% } %>
              <ul>
                <li>
                    <%=booking.date_from_full_format%> 
                    <% if (configuration.rentDateSelector === 'date_from_duration' && booking.days == 0) { %>
                       (<%=booking.time_from%> - <%=booking.time_to%>)
                    <% } else if (configuration.timeToFrom) { %>
                       <%=booking.time_from%><% } %>
                </li>
                <% if (configuration.pickupReturnPlace) {%>
                  <li><%=booking.pickup_place_customer_translation%></li>
                <% } %>
              </ul>

              <!-- Collection -->
              <% if (configuration.rentDateSelector === 'date_from_date_to' || configuration.pickupReturnPlace) { %>
                <h5 class="mt-3"><?php echo esc_html_x('Collection', 'renting_my_reservation', 'mybooking') ?></h5>
                <ul>
                  <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
                    <li><%=booking.date_to_full_format%> 
                        <% if (configuration.timeToFrom) { %><%=booking.time_to%><% } %>
                    </li>
                  <% } %>
                  <% if (configuration.pickupReturnPlace) {%>
                    <li><%=booking.return_place_customer_translation%></li>
                  <% } %>
                </ul>
              <% } %>  

              <!-- Duration -->  
              <% if (booking.days > 0) { %>
                <p class="detail-text mt-2">
                  <i class="fas fa-clock mr-1"></i><span><%=booking.days%>&nbsp;<?php echo esc_html( MyBookingEngineContext::getInstance()->getDuration() ) ?></span>
                </p>
              <% } else if (booking.hours > 0) { %>
                <p class="detail-text mt-2">
                  <i class="fas fa-clock mr-1"></i><span><%=booking.hours%>&nbsp;<?php echo esc_html_x('hour(s)', 'renting_my_reservation', 'mybooking') ?></span>
                </p>
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

      <!-- Form -->
      <% if (showReservationForm) { %>
        <div class="col-12 col-md-8">
          <div id="reservation_form_container" class="col process-section-box" style="display:none"></div>
          <% if (configuration.guests) { %>
            <!-- Passengers -->
            <div id="passengers_container" class="col process-section-box" style="display:none">
              <h4 class="my-3">
                <?php echo esc_html_x('Passengers', 'renting_my_reservation', 'mybooking') ?>
              </h4>
              
              <div id="passengers_table_container"></div>
              <div id="passengers_form_container"></div>
            </div>
            <!-- End passengers -->
          <% } %>
        </div>
      <% } %>
        
      <!-- Summary -->
      <div class="<% if (showReservationForm) { %>col-md-4<%} else { %>col-12 col-md-8 offset-md-2<% } %>">

        <div class="col process-section-box">
          <h4 class="my-3"><?php echo esc_html_x( 'My reservation', 'renting_my_reservation', 'mybooking') ?></h4>
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
                <% if (booking.booking_lines[idx].item_unit_cost_base > booking.booking_lines[idx].item_unit_cost) { %>
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
                           typeof booking.booking_lines[idx].promotion_code_value !== 'undefined' && booking.booking_lines.promotion_code_value !== '' &&
                           booking.booking_lines[idx].promotion_code_value !== '0.0') { %>
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
                class="extra-name"><?php echo esc_html_x( 'Pick-up time supplement', 'renting_my_reservation', 'mybooking' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (booking.pickup_place_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo esc_html_x( 'Pick-up place supplement', 'renting_my_reservation', 'mybooking' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (booking.time_to_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo esc_html_x( 'Return time supplement', 'renting_my_reservation', 'mybooking' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (booking.return_place_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo esc_html_x( 'Return place supplement', 'renting_my_reservation', 'mybooking' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.return_place_cost)%></span>
            </li>
            <% } %>

            <% if (booking.driver_age_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo esc_html_x( "Driver's age supplement", 'renting_my_reservation', 'mybooking' ) ?></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (booking.category_supplement_1_cost > 0) { %>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><?php echo esc_html_x( "Petrol supplement", 'renting_my_reservation', 'mybooking' ) ?></span>
              <span
                class="product-amount pull-right"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></span>
            </li>
            <% } %>
          </ul>
          <% } %>

          <ul class="list-group border-0 list-group-flush mt-3">
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo esc_html_x( 'Total', 'renting_my_reservation', 'mybooking' ) ?></b></span>
              <span
                class="product-amount pull-right"><b><%=configuration.formatCurrency(booking.total_cost)%></b></span>
            </li>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo esc_html_x( 'Paid', 'renting_my_reservation', 'mybooking' ) ?></b></span>
              <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_paid)%></span>
            </li>
            <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
              <span
                class="extra-name"><b><?php echo esc_html_x( 'Pending', 'renting_my_reservation', 'mybooking' ) ?></b></span>
              <span class="product-amount pull-right <% if (booking.total_pending > 0){ %>text-danger<%}%>"><b><%=configuration.formatCurrency(booking.total_pending)%></b></span>
            </li>
          </ul> 

          <% if ( booking.product_guarantee_cost > 0 || booking.product_deposit_cost > 0 || 
                 (typeof booking.driver_age_deposit !== 'undefined' && booking.driver_age_deposit > 0) || 
                 booking.total_deposit > 0) { %>
           <ul class="list-group border-0 list-group-flush mt-3"> 
              <!-- Deposit -->
              <% if (booking.product_guarantee_cost > 0) { %>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span
                    class="extra-name"><?php echo esc_html_x( "Guarantee", 'renting_my_reservation', 'mybooking' ) ?></span>
                  <span
                    class="product-amount pull-right"><%=configuration.formatCurrency(booking.product_guarantee_cost)%></span>
                </li>            
              <% } %>
              <% if (booking.product_deposit_cost > 0) { %>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class="extra-name">
                    <?php /* translators: %s: Product Type (Vehicle, Product, ...) */ ?>
                    <?php echo wp_kses_post( sprintf( _x( "%s deposit", 'renting_my_reservation', 'mybooking' ), MyBookingEngineContext::getInstance()->getProduct() ) ) ?>
                  </span>
                  <span
                    class="product-amount pull-right"><%=configuration.formatCurrency(booking.product_deposit_cost)%></span>
                </li>             
              <% } %>
              <% if (typeof booking.driver_age_deposit !== 'undefined' && booking.driver_age_deposit > 0) { %>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span
                    class="extra-name"><?php echo esc_html_x( "Driver age deposit", 'renting_my_reservation', 'mybooking' ) ?></span>
                  <span
                    class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_deposit)%></span>
                </li>               
              <% } %>
              <% if (booking.total_deposit > 0 && booking.number_of_deposits > 1) { %>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span
                    class="extra-name"><?php echo esc_html_x( "Total deposit", 'renting_my_reservation', 'mybooking' ) ?></span>
                  <span
                    class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_deposit)%></span>
                </li>                
              <% } %>
            </ul>  
          <% } %>

        </div>


        <div class="col process-section-box">
          <h4 class="my-3">
            <?php echo esc_html_x( "Customer's details", 'renting_my_reservation', 'mybooking') ?></h4>
          <div class="table-responsive">
            <table class="table table-borderless table-striped">
              <tbody>
                <tr>
                  <th scope="row"><i class="far fa-user"></i></th>
                  <td class="text-right"><%=booking.customer_fullname%></td>
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

        <% if (typeof booking.electronic_signature_url !== 'undefined' &&
               booking.electronic_signature_url && booking.electronic_signature_url != '') { %>

          <div class="form-row">
            <div class="form-group col-md-12">
              <!-- // Electronic signature --> 
              <button id="js_mb_electronic_signature_link" class="btn btn-primary w-100">
                 <?php echo esc_html_x( 'Sign contract', 'renting_my_reservation', 'mybooking') ?>
              </button>
            </div>
          </div>

        <% } %>   


        <div id="payment_detail" class="col process-section-box" style="display:none">
        </div>

      </div><!-- / reservation -->

    </div><!-- /row -->
  </div><!-- /container -->

</script>

<!-- Reservation form -->
<script type="text/tmpl" id="script_reservation_form">
  <% if (configuration.rentingFormFillDataAddress || configuration.rentingFormFillDataDriverDetail || configuration.rentingFormFillDataNamedResources) { %>
    <form id="form-reservation" name="booking_information_form" autocomplete="off">
      <!-- Customer address -->
      <h4 class="my-3"><?php echo esc_html_x( 'Customer address', 'renting_my_reservation', 'mybooking') ?></h4>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="street"><?php echo esc_html_x( 'Address', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="street" name="customer_address[street]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Address', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_street%>" 
            maxlength="60" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
        <div class="form-group col-md-4">
          <label for="number"><?php echo esc_html_x( 'Number', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="number" name="customer_address[number]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Number', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_number%>" 
            maxlength="10" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
        <div class="form-group col-md-4">
          <label for="complement"><?php echo esc_html_x( 'Complement', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="complement" name="customer_address[complement]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Complement', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_complement%>"  maxlength="20" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="city"><?php echo esc_html_x( 'City', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="city" name="customer_address[city]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'City', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_city%>" 
            maxlength="60" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
        <div class="form-group col-md-6">
          <label for="state"><?php echo esc_html_x( 'State', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="state" name="customer_address[state]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'State', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_state%>"  
            maxlength="60" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="state"><?php echo esc_html_x( 'Postal Code', 'renting_my_reservation', 'mybooking') ?></label>
          <input class="form-control" id="zip" name="customer_address[zip]" type="text"
            placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Postal Code', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.address_zip%>"  
            maxlength="10" <% if (!booking.can_edit_online){%>disabled<%}%>>
        </div>
        <div class="form-group col-md-6">
          <label class="full-width"
            for="country"><?php echo esc_html_x( 'Country', 'renting_my_reservation', 'mybooking') ?></label>
            <select name="customer_address[country]" id="country" class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>>
            </select>
        </div>
      </div>
      <!-- Driver information -->
      <% if (!booking.has_optional_external_driver) { %>
        <% if (configuration.rentingFormFillDataDriverDetail) { %>
          <h4 class="my-3"><?php echo esc_html( MyBookingEngineContext::getInstance()->getDriver() ) ?></h4>
          <% if (booking.driver_type === 'driver') { %>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="driver_name"><?php echo esc_html_x("Name", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_name" name="driver_name" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Name", 'renting_my_reservation', 'mybooking') ?>")%>"
                  value="<%=booking.driver_name%>"
                  maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
              <div class="form-group col-md-6">
                <label for=""><?php echo esc_html_x("Surname", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_surname" name="driver_surname" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Surname", 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.driver_surname%>"
                  maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="driver_document_id"><?php echo esc_html_x("ID card or passport", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_document_id" name="driver_document_id" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("ID card or passport", 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.driver_document_id%>"
                  maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
              <div class="form-group col-md-6">
                <label
                  for="driver_document_id_date"><?php echo esc_html_x('Date of Issue', 'renting_my_reservation', 'mybooking') ?></label>
                <div class="custom-date-form">
                  <div class="custom-date-item">
                    <select name="driver_document_id_date_day" id="driver_document_id_date_day"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_document_id_date_month" id="driver_document_id_date_month"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_document_id_date_year" id="driver_document_id_date_year"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                </div>
                <input type="hidden" name="driver_document_id_date" id="driver_document_id_date"></input>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label
                  for="driver_date_of_birth"><?php echo esc_html_x('Date of birth', 'renting_my_reservation', 'mybooking') ?></label>
                <div class="custom-date-form">
                  <div class="custom-date-item">
                    <select name="driver_date_of_birth_day" id="driver_date_of_birth_day"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_date_of_birth_month" id="driver_date_of_birth_month"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_date_of_birth_year" id="driver_date_of_birth_year"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                </div>
                <input type="hidden" name="driver_date_of_birth" id="driver_date_of_birth"></input>
              </div>
              <div class="form-group col-md-6">
                <label for="driver_document_id_expiration_date">
                  <?php echo esc_html_x('Date of expiry', 'renting_my_reservation', 'mybooking') ?>
                </label>
                <div class="custom-date-form">
                  <div class="custom-date-item">
                    <select name="driver_document_id_expiration_date_day" id="driver_document_id_expiration_date_day"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_document_id_expiration_date_month" id="driver_document_id_expiration_date_month"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_document_id_expiration_date_year" id="driver_document_id_expiration_date_year"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                </div>
                <input type="hidden" name="driver_document_id_expiration_date" id="driver_document_id_expiration_date"></input>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label
                  for="driver_driving_license_number"><?php echo  esc_html_x('Driving license number', 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number"
                  type="text" placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Driving license number', 'renting_my_reservation', 'mybooking') ?>")%>"
                  value="<%=booking.driver_driving_license_number%>"
                  maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
              <div class="form-group col-md-6">
                <label
                  for="driver_driving_license_date"><?php echo esc_html_x('Driving license date of issue', 'renting_my_reservation', 'mybooking') ?></label>
                <div class="custom-date-form">
                  <div class="custom-date-item">
                    <select name="driver_driving_license_date_day" id="driver_driving_license_date_day"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_driving_license_date_month" id="driver_driving_license_date_month"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_driving_license_date_year" id="driver_driving_license_date_year"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                </div>
                <input type="hidden" name="driver_driving_license_date" id="driver_driving_license_date"></input>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="w-100"
                  for="driver_driving_license_country"><?php echo esc_html_x('Driving license expedition country', 'renting_my_reservation', 'mybooking') ?>
                  </label>
                  <select name="driver_driving_license_country" id="driver_driving_license_country"
                    class="form-control mt-0" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="driver_driving_license_expiration_date">
                  <?php echo esc_html_x('Driving license date of expiry', 'renting_my_reservation', 'mybooking') ?>
                </label>
                <div class="custom-date-form">
                  <div class="custom-date-item">
                    <select name="driver_driving_license_expiration_date_day" id="driver_driving_license_expiration_date_day"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_driving_license_expiration_date_month" id="driver_driving_license_expiration_date_month"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                  <div class="custom-date-item">
                    <select name="driver_driving_license_expiration_date_year" id="driver_driving_license_expiration_date_year"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                  </div>
                </div>
                <input type="hidden" name="driver_driving_license_expiration_date" id="driver_driving_license_expiration_date"></input>
              </div>
            </div>
            <% if (configuration.rentingFormFillDataAdditionalDriver1 || 
                   configuration.rentingFormFillDataAdditionalDriver2) { %>
              <!-- Additional drivers -->
              <h4 class="my-3"><?php echo esc_html_x('Additional drivers', 'renting_my_reservation', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="driver_name"><?php echo esc_html_x("Name", 'renting_my_reservation', 'mybooking') ?></label>
                  <input class="form-control" id="additional_driver_1_name" name="additional_driver_1_name" type="text"
                    placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Name", 'renting_my_reservation', 'mybooking') ?>")%>"
                    value="<%=booking.additional_driver_1_name%>"
                    maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
                <div class="form-group col-md-6">
                  <label for=""><?php echo esc_html_x("Surname", 'renting_my_reservation', 'mybooking') ?></label>
                  <input class="form-control" id="additional_driver_1_surname" name="additional_driver_1_surname" type="text"
                    placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Surname", 'renting_my_reservation', 'mybooking') ?>")%>"
                    value="<%=booking.additional_driver_1_surname%>"
                    maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label
                    for="driver_driving_license_number"><?php echo esc_html_x('Driving license number', 'renting_my_reservation', 'mybooking') ?></label>
                  <input class="form-control" id="additional_driver_1_driving_license_number" name="additional_driver_1_driving_license_number"
                    type="text" placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Driving license number', 'renting_my_reservation', 'mybooking') ?>")%>"
                    value="<%=booking.additional_driver_1_driving_license_number%>"
                    maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
                <div class="form-group col-md-6">
                  <label for="additional_driver_1_driving_license_date">
                    <?php echo esc_html_x('Driving license date of issue', 'renting_my_reservation', 'mybooking') ?>
                  </label>
                  <div class="custom-date-form">
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_date_day" id="additional_driver_1_driving_license_date_day"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_date_month" id="additional_driver_1_driving_license_date_month"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_date_year" id="additional_driver_1_driving_license_date_year"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                  </div>
                  <input type="hidden" name="additional_driver_1_driving_license_date" id="additional_driver_1_driving_license_date"></input>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="driver_driving_license_country">
                    <?php echo esc_html_x('Driving license expedition country', 'renting_my_reservation', 'mybooking') ?>
                    </label>
                    <select name="additional_driver_1_driving_license_country" id="additional_driver_1_driving_license_country"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="additional_driver_1_driving_license_expiration_date">
                    <?php echo esc_html_x('Driving license date of expiry', 'renting_my_reservation', 'mybooking') ?>
                  </label>
                  <div class="custom-date-form">
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_expiration_date_day" id="additional_driver_1_driving_license_expiration_date_day"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_expiration_date_month" id="additional_driver_1_driving_license_expiration_date_month"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                    <div class="custom-date-item">
                      <select name="additional_driver_1_driving_license_expiration_date_year" id="additional_driver_1_driving_license_expiration_date_year"
                        class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                    </div>
                  </div>
                  <input type="hidden" name="additional_driver_1_driving_license_expiration_date" id="additional_driver_1_driving_license_expiration_date"></input>
                </div>
              </div>
              <% if (configuration.rentingFormFillDataAdditionalDriver2) { %>
                <!-- Additional driver 2 -->
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="driver_name"><?php echo esc_html_x("Name", 'renting_my_reservation', 'mybooking') ?></label>
                    <input class="form-control" id="additional_driver_2_name" name="additional_driver_2_name" type="text"
                      placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Name", 'renting_my_reservation', 'mybooking') ?>")%>"
                      value="<%=booking.additional_driver_2_name%>"
                      maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""><?php echo esc_html_x("Surname", 'renting_my_reservation', 'mybooking') ?></label>
                    <input class="form-control" id="additional_driver_2_surname" name="additional_driver_2_surname" type="text"
                      placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Surname", 'renting_my_reservation', 'mybooking') ?>")%>"
                      value="<%=booking.additional_driver_2_surname%>"
                      maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label
                      for="driver_driving_license_number"><?php echo esc_html_x('Driving license number', 'renting_my_reservation', 'mybooking') ?></label>
                    <input class="form-control" id="additional_driver_2_driving_license_number" name="additional_driver_2_driving_license_number"
                      type="text" placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Driving license number', 'renting_my_reservation', 'mybooking') ?>")%>"
                      value="<%=booking.additional_driver_2_driving_license_number%>"
                      maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                  <div class="form-group col-md-6">
                    <label  for="additional_driver_2_driving_license_date">
                      <?php echo esc_html_x('Driving license date of issue', 'renting_my_reservation', 'mybooking') ?>
                    </label>
                    <div class="custom-date-form">
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_date_day" id="additional_driver_2_driving_license_date_day"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_date_month" id="additional_driver_2_driving_license_date_month"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_date_year" id="additional_driver_2_driving_license_date_year"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                    </div>
                    <input type="hidden" name="additional_driver_2_driving_license_date" id="additional_driver_2_driving_license_date"></input>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="additional_driver_2_driving_license_expiration_date">
                      <?php echo esc_html_x('Driving license expedition country', 'renting_my_reservation', 'mybooking') ?>
                    </label>
                    <select name="additional_driver_2_driving_license_country" id="additional_driver_2_driving_license_country"
                      class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="additional_driver_2_driving_license_expiration_date">
                      <?php echo esc_html_x('Driving license date of expiry', 'renting_my_reservation', 'mybooking') ?>
                    </label>
                    <div class="custom-date-form">
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_expiration_date_day" id="additional_driver_2_driving_license_expiration_date_day"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_expiration_date_month" id="additional_driver_2_driving_license_expiration_date_month"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                      <div class="custom-date-item">
                        <select name="additional_driver_2_driving_license_expiration_date_year" id="additional_driver_2_driving_license_expiration_date_year"
                          class="form-control" <% if (!booking.can_edit_online){%>disabled<%}%>></select>
                      </div>
                    </div>
                    <input type="hidden" name="additional_driver_2_driving_license_expiration_date" id="additional_driver_2_driving_license_expiration_date"></input>
                  </div>
                </div>
              <% } %>
            <% } %>  
          <% } else if (booking.driver_type === 'skipper') { %>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="driver_name"><?php echo esc_html_x("Name", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_name" name="driver_name" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Name", 'renting_my_reservation', 'mybooking') ?>")%>"
                  value="<%=booking.driver_name%>"
                  maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
              <div class="form-group col-md-6">
                <label for=""><?php echo esc_html_x("Surname", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_surname" name="driver_surname" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("Surname", 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.driver_surname%>"
                  maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="driver_document_id"><?php echo esc_html_x("ID card or passport", 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_document_id" name="driver_document_id" type="text"
                  placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x("ID card or passport", 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.driver_document_id%>"
                  maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
            </div>
            <div class="form-row">  
              <div class="form-group col-md-6">
                <label
                  for="driver_driving_license_number"><?php echo  esc_html_x('Navigation permission type', 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_driving_license_type" name="driver_driving_license_type"
                  type="text" placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Navigation permission type', 'renting_my_reservation', 'mybooking') ?>")%>"
                  value="<%=booking.driver_driving_license_type%>"
                  maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
              <div class="form-group col-md-6">
                <label
                  for="driver_driving_license_number"><?php echo  esc_html_x('Navigation license number', 'renting_my_reservation', 'mybooking') ?></label>
                <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number"
                  type="text" placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Navigation license number', 'renting_my_reservation', 'mybooking') ?>")%>"
                  value="<%=booking.driver_driving_license_number%>"
                  maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
              </div>
            </div>
          <% } %>
        <% } %> 
      <% } %>
      <!-- Flight information -->
      <% if (configuration.rentingFromFillDataFlight) { %>    
        <h4 class="my-3"><?php echo esc_html_x('Flight', 'renting_my_reservation', 'mybooking') ?></h4>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="flight_company"><?php echo esc_html_x('Company', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_company" name="flight_company" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Company', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.flight_company%>" 
              maxlength="80" <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
          <div class="form-group col-md-4">
            <label for="flight_number"><?php echo esc_html_x('Flight Number', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_number" name="flight_number" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Flight Number', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.flight_number%>" maxlength="10" <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
          <div class="form-group col-md-4">
            <label for="flight_time"><?php echo esc_html_x('Estimated Time', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_time" name="flight_time" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Estimated Time', 'renting_my_reservation', 'mybooking') ?>")%>" value="<%=booking.flight_time%>" 
              maxlength="5" <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
        </div>
        <h4 class="my-3"><?php echo esc_html_x('Return flight', 'renting_my_reservation', 'mybooking') ?></h4>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="flight_company_departure"><?php echo esc_html_x('Company', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_company_departure" name="flight_company_departure" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Company', 'renting_my_reservation', 'mybooking') ?>")%>" 
              value="<%=booking.flight_company_departure%>"
              maxlength="80" <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
          <div class="form-group col-md-4">
            <label for="flight_number_departure"><?php echo esc_html_x('Flight Number', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_number_departure" name="flight_number_departure" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Flight Number', 'renting_my_reservation', 'mybooking') ?>")%>" 
              value="<%=booking.flight_number_departure%>"
              maxlength="10" <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
          <div class="form-group col-md-4">
            <label for="flight_time_departure"><?php echo esc_html_x('Estimated Time', 'renting_my_reservation', 'mybooking') ?></label>
            <input class="form-control" id="flight_time_departure" name="flight_time_departure" type="text"
              placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x('Estimated Time', 'renting_my_reservation', 'mybooking') ?>")%>" 
              value="<%=booking.flight_time_departure%>"
              maxlength="5"  <% if (!booking.can_edit_online){%>disabled<%}%>>
          </div>
        </div>
      <% } %>  
      <!-- Named resources -->
      <% if (configuration.rentingFormFillDataNamedResources) { %>
        <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
           <% var booking_line = booking.booking_lines[idx]; %>
           <h4 class="my-3 p-3 bg-light"><%=booking_line.quantity%> x <%=booking_line.item_description%></h4>
           <% for (var idxResource=0; idxResource<booking.booking_lines[idx].booking_line_resources.length; idxResource++) { %>
              <% var booking_line_resource = booking.booking_lines[idx].booking_line_resources[idxResource]; %>
              <input type="hidden" name="booking_line_resources[<%=booking_line_resource.id%>][id]" value="<%=booking_line_resource.id%>"/>
              <% if (booking_line_resource.pax == 1) { %>
                <h5 class="h5 border p-2"><?php echo esc_html_x( 'Participant', 'renting_my_reservation', 'mybooking') ?> #<%=idxResource+1%></h5>
              <% } else if (booking_line_resource.pax == 2) { %>
                <h5 class="h5 border p-2"><?php echo esc_html_x( 'Participants', 'renting_my_reservation', 'mybooking') ?> #<%=idxResource+1%></h5>
                <h6 class="h6 border p-1 text-right"><?php echo esc_html_x( 'Pax 1', 'renting_my_reservation', 'mybooking') ?></h6>
              <% } %>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="customer_name"><?php echo esc_html_x( 'Name', 'renting_my_reservation', 'mybooking') ?></label>
                  <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_name]"
                         title="<?php echo esc_attr_x( 'Name', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                         class="form-control alt" type="text"
                         placeholder="<?php echo esc_attr_x( 'Name', 'renting_my_reservation', 'mybooking') ?>:" maxlength="80"
                         value="<%=booking_line_resource.resource_user_name%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
                <div class="form-group col-md-4">
                  <label for="customer_name"><?php echo esc_html_x( 'Surname', 'renting_my_reservation', 'mybooking') ?></label>
                  <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_surname]"
                         title="<?php echo esc_attr_x( 'Surname', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                         class="form-control alt" type="text"
                         placeholder="<?php echo esc_attr_x( 'Surname', 'renting_my_reservation', 'mybooking') ?>:" maxlength="80"
                         value="<%=booking_line_resource.resource_user_surname%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
                <div class="form-group col-md-4">
                  <label for="customer_name"><?php echo esc_html_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?></label>
                  <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_document_id]"
                         title="<?php echo esc_attr_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                         class="form-control alt" type="text"
                         placeholder="<?php echo esc_attr_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?>:" maxlength="50"
                         value="<%=booking_line_resource.resource_user_document_id%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="customer_name"><?php echo esc_html_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?></label>
                  <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_phone]"
                         title="<?php echo esc_attr_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                         class="form-control alt" type="text"
                         placeholder="<?php echo esc_attr_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?>:" maxlength="15"
                         value="<%=booking_line_resource.resource_user_phone%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>
                <div class="form-group col-md-4">
                  <label for="customer_name"><?php echo esc_html_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?></label>
                  <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_email]"
                         title="<?php echo esc_attr_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                         class="form-control alt" type="text"
                         placeholder="<?php echo esc_attr_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?>:" maxlength="40"
                         value="<%=booking_line_resource.resource_user_email%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                </div>             
                <% if (configuration.rentingFormFillDataNamedResourcesHeight) { %>   
                  <div class="form-group col-md-2">
                    <label for="customer_name"><?php echo esc_html_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][customer_height]"
                           title="<?php echo esc_attr_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="number"
                           placeholder="<?php echo esc_attr_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?>:" min="0" max="250"
                           value="<%=booking_line_resource.customer_height%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                <% } %>
                <% if (configuration.rentingFormFillDataNamedResourcesWeight) { %>                        
                  <div class="form-group col-md-2">
                    <label for="customer_name"><?php echo esc_html_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][customer_weight]"
                           title="<?php echo esc_attr_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="number"
                           placeholder="<?php echo esc_attr_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?>:"  min="0" max="200"
                           value="<%=booking_line_resource.customer_weight%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                <% } %>
              </div>    
              <% if (booking_line_resource.pax == 2) { %>
                <h6 class="h6 border p-1 text-right"><?php echo esc_html_x( 'Pax 2', 'renting_my_reservation', 'mybooking') ?></h5>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="customer_name"><?php echo esc_html_x( 'Name', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_2_name]"
                           title="<?php echo esc_attr_x( 'Name', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="text"
                           placeholder="<?php echo esc_attr_x( 'Name', 'renting_my_reservation', 'mybooking') ?>:" maxlength="80"
                           value="<%=booking_line_resource.resource_user_2_name%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="customer_name"><?php echo esc_html_x( 'Surname', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_2_surname]"
                           title="<?php echo esc_attr_x( 'Surname', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="text"
                           placeholder="<?php echo esc_attr_x( 'Surname', 'renting_my_reservation', 'mybooking') ?>:" maxlength="80"
                           value="<%=booking_line_resource.resource_user_2_surname%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="customer_name"><?php echo esc_html_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_2_document_id]"
                           title="<?php echo esc_attr_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="text"
                           placeholder="<?php echo esc_attr_x( 'Document ID', 'renting_my_reservation', 'mybooking') ?>:" maxlength="50"
                           value="<%=booking_line_resource.resource_user_2_document_id%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="customer_name"><?php echo esc_html_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_2_phone]"
                           title="<?php echo esc_attr_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="text"
                           placeholder="<?php echo esc_attr_x( 'Phone number', 'renting_my_reservation', 'mybooking') ?>:" maxlength="15"
                           value="<%=booking_line_resource.resource_user_2_phone%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="customer_name"><?php echo esc_html_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?></label>
                    <input name="booking_line_resources[<%=booking_line_resource.id%>][resource_user_2_email]"
                           title="<?php echo esc_attr_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                           class="form-control alt" type="text"
                           placeholder="<?php echo esc_attr_x( 'E-mail', 'renting_my_reservation', 'mybooking') ?>:" maxlength="40"
                           value="<%=booking_line_resource.resource_user_2_email%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                  </div>        
                  <% if (configuration.rentingFormFillDataNamedResourcesHeight) { %>           
                    <div class="form-group col-md-2">
                      <label for="customer_name"><?php echo esc_html_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?></label>
                      <input name="booking_line_resources[<%=booking_line_resource.id%>][customer_2_height]"
                             title="<?php echo esc_attr_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                             class="form-control alt" type="number"
                             placeholder="<?php echo esc_attr_x( 'Height (cm)', 'renting_my_reservation', 'mybooking') ?>:" min="0" max="250"
                             value="<%=booking_line_resource.customer_2_height%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                    </div>
                  <% } %>
                  <% if (configuration.rentingFormFillDataNamedResourcesWeight) { %>                             
                    <div class="form-group col-md-2">
                      <label for="customer_name"><?php echo esc_html_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?></label>
                      <input name="booking_line_resources[<%=booking_line_resource.id%>][customer_2_weight]"
                             title="<?php echo esc_attr_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?>" data-toggle="tooltip"
                             class="form-control alt" type="number"
                             placeholder="<?php echo esc_attr_x( 'Weight (kg)', 'renting_my_reservation', 'mybooking') ?>:" min="0" max="200"
                             value="<%=booking_line_resource.customer_2_weight%>" <% if (!booking.can_edit_online){%>disabled<%}%>>
                    </div>
                  <% } %>
                </div>  
              <% } %>            
           <% } %>
        <% } %>
      <% } %>
      <% if (booking.can_edit_online) { %>    
        <hr>
        <div class="form-row">
          <div class="form-group col-md-12">
            <button class="btn btn-outline-dark" id="btn_update_reservation">
            <?php echo esc_html_x( 'Update', 'renting_my_reservation', 'mybooking') ?></button>
          </div>
        </div>
      <% } %>
    </form>
  <% } %>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="my-3"><%= i18next.t('myReservation.pay.total_payment', {amount:configuration.formatCurrency(amount) }) %></h4>
  <% if (booking.total_paid == 0 && booking.status == 'pending_confirmation') {%>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.booking_amount', {amount:configuration.formatCurrency(booking.booking_amount) }) %>
    </div>
  <% } else if (booking.total_paid == 0 > 0 && booking.total_pending > 0 && booking.status != 'pending_confirmation' && booking.status != 'cancelled') { %>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.pending_amount', {amount:configuration.formatCurrency(booking.total_pending) }) %>
    </div>      
  <% } %> 
  <form name="payment_form">
    <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
      <div class="alert alert-secondary" role="alert">
        <?php echo wp_kses_post( _x( 'You will be redirected to the <b>payment platform</b> to make the payment securely. You can use <u>Paypal account</u> or <u>credit card</u> to make the payment.', 'renting_my_reservation', 'mybooking' ) )?>
      </div>     
      <div class="form-row">
         <div class="form-group col-md-12">
           <label for="payments_paypal_standard">
            <input type="radio" name="payment_method_select" value="paypal_standard">&nbsp;<?php echo esc_html_x( 'Paypal', 'renting_my_reservation', 'mybooking' ) ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>" />
           </label>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-12">
           <label for="payments_paypal_standard">
            <input type="radio" name="payment_method_select"
              value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'renting_my_reservation', 'mybooking' ) ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
           </label>
         </div>
      </div>
    <% } else if (sales_process.payment_methods.paypal_standard) {%>
      <div class="alert alert-secondary" role="alert">
        <?php echo wp_kses_post( _x( 'You will be redirected to <b>Paypal payment platform</b> to make the payment securely. You can use <u>Paypal account</u> or <u>credit card</u> to make the payment.', 'renting_my_reservation', 'mybooking' ) )?>
      </div>      
      <div class="form-row">
        <div class="form-group col-md-12">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>" />
          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>          
        </div>
      </div>
      <input type="hidden" name="payment_method_id" value="paypal_standard" data-payment-method="paypal_standard">
    <% } else if (sales_process.payment_methods.tpv_virtual) {%>
      <div class="alert alert-secondary" role="alert">
        <?php echo wp_kses_post( _x( 'You will be redirected to the <b>payment platform</b> to make the payment securely. You can use <u>credit or debit card</u> to make the payment.',
                                     'renting_my_reservation', 'mybooking' ) )?>
      </div>    
      <div class="form-row">
        <div class="form-group col-md-12">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
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
  </form>

</script>

<!-- Contract block -->

<script type="text/tmpl" id="script_contract_required_data">

  <div class="alert alert-danger" role="alert">
    <?php echo esc_html_x( 'The contract can not be signed. Please, check the errors.', 'renting_my_reservation', 'mybooking' ) ?>
  </div>

  <ul>
  <% for (property in contract_errors) { %>
    <li><%= contract_errors[property] %></li>
  <% } %>
  </ul>

</script>  

<!-- Passengers block -->
<script type="text/tmpl" id="script_passengers_table">
  <div id="passengers_list">
    <div id="passengers_list__not_data" style="display:none">
      <?php echo esc_html_x("No passengers found in reservation", 'renting_my_reservation_passenger', 'mybooking') ?>
    </div>
    <div id="passengers_list__content">
    </div>
    
</script>

<script type="text/tmpl" id="script_passengers_form">
  <br />
  <div id="passengers_error" class="alert alert-danger" style="display: none;"></div>
  <form id="booking_passengers_form" name="booking_passengers_form"> 
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="passenger_name">
          <?php echo esc_html_x("Name", 'renting_my_reservation_passenger', 'mybooking') ?>
          *
        </label>
        <input class="form-control" id="passenger_name" name="passenger_name" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x("Name", 'renting_my_reservation_passenger', 'mybooking') ?>")%>"
        value=""
        maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
      <div class="form-group col-md-6">
        <label for="">
          <?php echo esc_html_x("Surname", 'renting_my_reservation_passenger', 'mybooking') ?>
          *
        </label>
        <input class="form-control" id="passenger_surname" name="passenger_surname" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x("Surname", 'renting_my_reservation_passenger', 'mybooking') ?>")%>" value=""
        maxlength="40" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="passenger_document_id">
          <?php echo esc_html_x("ID card or passport", 'renting_my_reservation_passenger', 'mybooking') ?>
          *
        </label>
        <input class="form-control" id="passenger_document_id" name="passenger_document_id" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x("ID card or passport", 'renting_my_reservation_passenger', 'mybooking') ?>")%>" value=""
        maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
      <!-- <div class="form-group col-md-6">
        <label for="passenger_document_id_date">
          <?php echo esc_html_x('Date of Issue', 'renting_my_reservation_passenger', 'mybooking') ?>
        </label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="passenger_document_id_date_day" id="passenger_document_id_date_day" class="form-control" <% if
              (!booking.can_edit_online){%>disabled<%}%>></select>
          </div>
          <div class="custom-date-item">
            <select name="passenger_document_id_date_month" id="passenger_document_id_date_month" class="form-control" <%
              if (!booking.can_edit_online){%>disabled<%}%>></select>
          </div>
          <div class="custom-date-item">
            <select name="passenger_document_id_date_year" id="passenger_document_id_date_year" class="form-control" <% if
              (!booking.can_edit_online){%>disabled<%}%>></select>
          </div>
        </div>
        <input type="hidden" name="passenger_document_id_date" id="passenger_document_id_date"></input>
      </div> -->
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="passenger_email">
          <?php echo esc_html_x('Email address', 'renting_my_reservation_passenger', 'mybooking') ?>
        </label>
        <input class="form-control" id="passenger_email" name="passenger_email" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x('Email address', 'renting_my_reservation_passenger', 'mybooking') ?>")%>"
        value=""
        maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
      <div class="form-group col-md-6">
        <label for="passenger_phone_number">
          <?php echo esc_html_x('Phone number', 'renting_my_reservation_passenger', 'mybooking') ?>
        </label>
        <input class="form-control" id="passenger_phone_number" name="passenger_phone_number" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x('Phone number', 'renting_my_reservation_passenger', 'mybooking') ?>")%>"
        value=""
        maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="passenger_notes">
          <?php echo esc_html_x('Notes', 'renting_my_reservation_passenger', 'mybooking') ?>
        </label>
        <input class="form-control" id="passenger_notes" name="passenger_notes" type="text"
          placeholder="<%=configuration.escapeHtml(" <?php echo esc_attr_x('Notes', 'renting_my_reservation_passenger', 'mybooking') ?>")%>"
        value=""
        maxlength="50" <% if (!booking.can_edit_online){%>disabled<%}%>>
      </div>
    </div>

    <hr />

    <div id="booking_passengers_form_errors" class="alert alert-danger" style="display:none"></div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_add_passenger" <% if (!booking.can_edit_online){%>disabled<%}%>>
          <?php echo esc_html_x('Add a new passenger', 'renting_my_reservation_passenger', 'mybooking') ?>
        </button>
      </div>
    </div>
  </form>
</script>

<script type="text/tmpl" id="script_passengers_list__item">
  <div style="padding: 0.5rem 0; font-size: 14px;">
    <div class="form-row" style="align-items: center">
      <div class="form-group col-xs-1" style="width: 5%;">
        <span class="badge badge-info" style="position: relative; top: -0.1rem;"><%= index %></span>
      </div>
      <div class="form-group col-xs-9" style="width: 85%;">
        <h6 style="margin: 0;">
          <%= passenger.name %> <%= passenger.surname %> 
        </h6>
      </div>
      <div class="form-group col-xs-2" style="width: 10%;">
        <button class="btn float-right" id="btn_remove_passenger" title="<?php echo esc_attr_x("Remove", 'renting_my_reservation_passenger', 'mybooking') ?>" data-id="<%= passenger.id %>">
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-4">
        <b>
          <?php echo esc_html_x("ID card or passport", 'renting_my_reservation_passenger', 'mybooking') ?>
        </b>
        <br />
        <%= passenger.document_id %>
      </div>
      <!-- <div class="form-group col-sm-4">
        <b>
          <?php echo esc_html_x('Date of Issue', 'renting_my_reservation_passenger', 'mybooking') ?>
        </b>
        <br />
      </div> -->
      <div class="form-group col-sm-4">
        <b>
          <?php echo esc_html_x('Email address', 'renting_my_reservation_passenger', 'mybooking') ?>
        </b>
        <br />
        <%= passenger.email %>
      </div>
      <div class="form-group col-sm-4">
        <b>
          <?php echo esc_html_x('Phone number', 'renting_my_reservation_passenger', 'mybooking') ?>
        </b>
        <br />
        <%= passenger.phone_number %>
      </div>
      <div class="form-group col-sm-12" style="margin-bottom: 0;">
        <b>
          <?php echo esc_html_x('Notes', 'renting_my_reservation_passenger', 'mybooking') ?>
        </b>
        <br />
        <%= passenger.notes %>
      </div>
    </div>

    <hr />
    </div>
  </div>
</script>