<?php
  /** 
   * The Template for showing the renting summary step - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-summary-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
   */
?>
<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="process-section-box">
    <small class="detail-text"> 
      <?php echo esc_html_x( 'Reservation Id', 'renting_summary', 'mybooking') ?>
    </small>
    <h3><%=booking.id%></h3>
    <div class="product-detail-summary-dates mb-3">
      <ul> 
        <li>
          <div class="product-detail_separator">
            <i class="fa fa-long-arrow-right mr-3"></i>
          </div>
          <%=booking.date_from_full_format%>
          <% if (configuration.timeToFrom) { %><%=booking.time_from%><% } %>
        </li>
        <% if (configuration.pickupReturnPlace) { %>
        <li><%=booking.pickup_place_customer_translation%></li>
        <% } %>
      </ul>
      <ul>
        <div class="product-detail_separator">
          <i class="fa fa-long-arrow-left mr-3"></i>
        </div>
        <li><%=booking.date_to_full_format%>
        <% if (configuration.timeToFrom) { %><%=booking.time_to%><% } %>
        </li>
        <% if (configuration.pickupReturnPlace) { %>
        <li><%=booking.return_place_customer_translation%></li>
        <% } %>
      </ul>
    </div>
    <!-- Products -->
    <ul class="list-group resume-product-list mb-3">
      <!-- Show all the products in the reservation -->
      <% for (var idx=0;idx<booking.booking_lines.length;idx++) { %>
        <li class="list-group-item product-detail-list">
          <div class="product-detail-list-img-wrapper">
            <img class="product-detail-list-img" src="<%=booking.booking_lines[idx].photo_full%>" alt="">
          </div>
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
            </span>
          <% } %>
        </li>
      <% } %>
  </ul>
  
  <!-- Extras -->
  <% if (booking.booking_extras.length > 0) { %>
  <ul class="list-group mb-3">
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
  <ul class="list-group mb-3">
    <% if (booking.time_from_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span
        class="extra-name"><?php echo esc_html_x( 'Pick-up time supplement', 'renting_summary', 'mybooking' ) ?></span>
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_from_cost)%></span>
    </li>
    <% } %>
    <% if (booking.pickup_place_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span
        class="extra-name"><?php echo esc_html_x( 'Pick-up place supplement', 'renting_summary', 'mybooking' ) ?></span>
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.pickup_place_cost)%></span>
    </li>
    <% } %>
    <% if (booking.time_to_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span
        class="extra-name"><?php echo esc_html_x( 'Return time supplement', 'renting_summary', 'mybooking' ) ?></span>
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.time_to_cost)%></span>
    </li>
    <% } %>
    <% if (booking.return_place_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span
        class="extra-name"><?php echo esc_html_x( 'Return place supplement', 'renting_summary', 'mybooking' ) ?></span>
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.return_place_cost)%></span>
    </li>
    <% } %>

    <% if (booking.driver_age_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span
        class="extra-name"><?php echo esc_html_x( "Driver's age supplement", 'renting_summary', 'mybooking' ) ?></span>
      <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_cost)%></span>
    </li>
    <% } %>
    <% if (booking.category_supplement_1_cost > 0) { %>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="extra-name"><?php echo esc_html_x( "Petrol supplement", 'renting_summary', 'mybooking' ) ?></span>
      <span
        class="product-amount pull-right"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></span>
    </li>
    <% } %>
  </ul>
  <% } %>
  
  <ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="extra-name"><b><?php echo esc_html_x( 'Total', 'renting_summary', 'mybooking' ) ?></b></span>
      <span class="product-amount pull-right"><b><%=configuration.formatCurrency(booking.total_cost)%></b></span>
    </li>
    <% if (booking.total_paid > 0) { %>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="extra-name"><b><?php echo esc_html_x( 'Total paid', 'renting_summary', 'mybooking' ) ?></b></span>
        <span class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_paid)%></span>
      </li>
    <% } %>
    <% if (booking.total_pending > 0) { %>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="extra-name"><b><?php echo esc_html_x( 'Total pending', 'renting_summary', 'mybooking' ) ?></b></span>
        <span class="product-amount pull-right <% if (booking.total_pending > 0){ %>text-danger<%}%>"><b><%=configuration.formatCurrency(booking.total_pending)%></b></span>
      </li>
    <% } %>
  </ul>

  <% if ( booking.product_guarantee_cost > 0 || booking.product_deposit_cost > 0 || 
         (typeof booking.driver_age_deposit !== 'undefined' && booking.driver_age_deposit > 0) || 
         booking.total_deposit > 0) { %>
   <ul class="list-group mb-3"> 
      <!-- Deposit -->
      <% if (booking.product_guarantee_cost > 0) { %>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span
            class="extra-name"><?php echo esc_html_x( "Guarantee", 'renting_summary', 'mybooking' ) ?></span>
          <span
            class="product-amount pull-right"><%=configuration.formatCurrency(booking.product_guarantee_cost)%></span>
        </li>            
      <% } %>
      <% if (booking.product_deposit_cost > 0) { %>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span class="extra-name">
             <?php /* translators: %s: Product Type (Vehicle, Product, ...) */ ?>
             <?php echo wp_kses_post( sprintf( _x( "%s deposit", 'renting_summary', 'mybooking' ), MyBookingEngineContext::getInstance()->getProduct() ) ) ?>
          </span>
          <span
            class="product-amount pull-right"><%=configuration.formatCurrency(booking.product_deposit_cost)%></span>
        </li>             
      <% } %>
      <% if (typeof booking.driver_age_deposit !== 'undefined' && booking.driver_age_deposit > 0) { %>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span
            class="extra-name"><?php echo esc_html_x( "Driver age deposit", 'renting_summary', 'mybooking' ) ?></span>
          <span
            class="product-amount pull-right"><%=configuration.formatCurrency(booking.driver_age_deposit)%></span>
        </li>               
      <% } %>
      <% if (booking.total_deposit > 0 && booking.number_of_deposits > 1) { %>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span
            class="extra-name"><?php echo esc_html_x( "Total deposit", 'renting_summary', 'mybooking' ) ?></span>
          <span
            class="product-amount pull-right"><%=configuration.formatCurrency(booking.total_deposit)%></span>
        </li>                
      <% } %>
    </ul>  
  <% } %>

  </div>
  <div class="process-section-box">
    <h4 class="my-3"><?php echo esc_html_x( "Customer's details", 'renting_summary', 'mybooking') ?></h4>
    <div class="table-responsive">
      <table class="table table-borderless table-striped">
        <tbody>
          <tr>
            <th scope="row"><?php echo esc_html_x( "Full name", 'renting_summary', 'mybooking') ?>:</th>
            <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
          </tr>
          <tr>
            <th scope="row"><?php echo esc_html_x( "E-mail", 'renting_summary', 'mybooking') ?>:</th>
            <td><%=booking.customer_email%></td>
          </tr>
          <tr>
            <th scope="row"><?php echo esc_html_x( "Phone number", 'renting_summary', 'mybooking') ?>:</th>
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