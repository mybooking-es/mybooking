<?php
  /**
   * The Template for showing the product calendar widget - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-widget-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>
<script type="text/tmpl" id="form_calendar_selector_tmpl">

<ol class="mybooking-product_calendar-step-list">

      <% if (configuration.pickupReturnPlace) { %>

        <li class="mybooking-product_calendar-step">
          <?php echo esc_html_x('Choose delivery and return places', 'renting_product_detail', 'mybooking' ) ?>
        </li>

        <!-- // Pickup Place -->
        <div class="form-group"  class="pickup_place_group">
          <label
            for="pickup_place"><?php echo esc_html_x( 'Select pick-up place', 'renting_product_calendar', 'mybooking') ?></label>
          <select id="pickup_place" name="pickup_place" placeholder="<?php echo esc_attr_x( 'Select pick-up place', 'renting_product_calendar', 'mybooking') ?>"
                  class="form-control w-100"></select>
        </div>

        <!-- // Return place -->
        <div class="form-group" class="return_place">
          <label
            for="pickup_place"><?php echo esc_html_x( 'Select return place', 'renting_product_calendar', 'mybooking' ) ?></label>
          <select id="return_place" name="return_place" placeholder="<?php echo esc_attr_x( 'Select return place', 'renting_product_calendar', 'mybooking' ) ?>"
                  class="form-control w-100"></select>
        </div>
      <% } %>

      <!-- // Rental location selector -->
      <% if (not_hidden_rental_location_code && configuration.selectRentalLocation) { %>
        <div class="form-group">
          <label
          for="rental_location">
            <?php /* translators: %s: Rental Location type */ ?>
            <?php echo wp_kses_post ( sprintf( _x( 'Select %s', 'renting_product_calendar', 'mybooking' ), MyBookingEngineContext::getInstance()->getRentalLocation() ) )?>
          </label>
          <select name="rental_location" id="rental_location" class="form-control w-100"
                placeholder="<?php echo esc_attr( MyBookingEngineContext::getInstance()->getRentalLocation() ) ?>"></select>
        </div>
      <% } %>


      <!-- // One Journal or multiple journals selector -->

      <li class="mybooking-product_calendar-step">
        <?php echo esc_html_x('Select delivery and return dates', 'renting_product_detail', 'mybooking' ) ?>
      </li>

      <% if (configuration.rentingProductOneJournal &&
             configuration.rentingProductMultipleJournals) { %>
        <div class="form-group">
          <input type="radio" name="duration_scope" value="in_one_day" checked/>&nbsp;<?php echo esc_html_x('Hours or one full day', 'renting_product_detail', 'mybooking' ) ?><br>
          <input type="radio" name="duration_scope" value="days"/>&nbsp;<?php echo esc_html_x('Period of dates', 'renting_product_detail', 'mybooking' ) ?>
        </div>
      <% } else if (configuration.rentingProductOneJournal) { %>
        <input type="hidden" name="duration_scope" value="in_one_day">
      <% } else { %>
        <input type="hidden" name="duration_scope" value="days">
      <% } %>

      <!-- // Availability calendar -->
      <div class="form-group">
        <input id="date" type="hidden" name="date"/>
        <div id="mb-date-container-header" style="display:none"></div>
        <div id="date-container" class="disabled-picker"></div>
      </div>

      <% if (configuration.timeToFrom || configuration.timeToFromInOneDay) { %>
        <!-- // Pickup/return time -->
        <div class="form-group time_selector_container js-mybooking-product_calendar-time-hours" style="display: none">
            <label for="time_from"><?php echo esc_html_x( 'Delivery time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_from" name="time_from" placeholder="<?php echo esc_attr_x( 'hh:mm', 'renting_product_calendar', 'mybooking' ) ?>" disabled
                    class="form-control w-100"> </select>
        </div>

        <div class="form-group time_selector_container js-mybooking-product_calendar-time-hours" style="display: none">
            <label for="time_to"><?php echo esc_html_x( 'Collection time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_to" name="time_to" placeholder="<?php echo esc_attr_x( 'hh:mm', 'renting_product_calendar', 'mybooking' ) ?>" disabled
                    class="form-control w-100"> </select>
        </div>

        <div class="form-group js-mybooking-product_calendar-time-ranges" style="display: none">
          <div id="mb_product_calendar_time_ranges_container" class="form-group col-md-12">
          </div>
        </div>

      <% } else { %>
        <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
        <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>
      <% } %>
  </ol>

      <!-- // Reservation detail -->
      <div id="reservation_detail" class="mb-form-group"></div>

</script>

<script type="text/tmpl" id="script_reservation_summary">

  <br>
  <hr>

  <!-- // Exceeds max duration -->
  <% if (product && product.exceeds_max) { %>
     <div class="alert alert-danger">
        <p class="text-center"><%= i18next.t('chooseProduct.max_duration', {duration: i18next.t('common.'+product.price_units, {count: product.max_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></p>
     </div>

  <!-- // Less than min duration -->
  <% } else if (product && product.be_less_than_min) { %>
     <div class="alert alert-danger">
        <p class="text-center"><%= i18next.t('chooseProduct.min_duration', {duration: i18next.t('common.'+product.price_units, {count: product.min_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></p>
     </div>

  <!-- // Available -->
  <% } else if (product_available) { %>
    <h4 class="brand-primary my-3">
    <?php echo esc_html_x( 'Reservation summary', 'renting_product_calendar', 'mybooking') ?></h4>

    <!-- // Duration -->
    <% if (shopping_cart.days > 0) { %>
    <p class="color-gray-600">
      <span><%=shopping_cart.days%>
        <?php echo esc_html( MyBookingEngineContext::getInstance()->getDuration() ) ?></span></p>
    <% } else if (shopping_cart.hours > 0) { %>
    <p class="color-gray-600">
      <span><%=shopping_cart.hours%>
        <?php echo esc_html_x( 'hours(s)', 'renting_product_calendar', 'mybooking' ) ?></span></p>
    <% } %>

    <!-- // Product -->
    <h5><?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?></h5>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

    <!-- // Extras -->
    <% if (shopping_cart.extras.length > 0) { %>
      <% for (var idx=0;idx<shopping_cart.extras.length;idx++) { %>
        <h6><%=shopping_cart.extras[idx].extra_description%> <% if (shopping_cart.extras[idx].quantity > 1) { %><span class="badge badge-info"><%=shopping_cart.extras[idx].quantity%></span> <% } %></h6>
        <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></p>
      <% } %>
    <% } %>

    <!-- // Supplements -->
    <% if (shopping_cart.time_from_cost > 0) { %>
    <h6><?php echo esc_html_x('Pick-up time supplement', 'renting_product_calendar', 'mybooking') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></p>
    <% } %>

    <% if (shopping_cart.pickup_place_cost > 0) { %>
    <h6><?php echo esc_html_x('Pick-up place supplement', 'renting_product_calendar', 'mybooking') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></p>
    <% } %>

    <% if (shopping_cart.time_to_cost > 0) { %>
    <h6><?php echo esc_html_x('Return time supplement', 'renting_product_calendar', 'mybooking') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></p>
    <% } %>

    <% if (shopping_cart.return_place_cost > 0) { %>
    <h6><?php echo esc_html_x('Return place supplement', 'renting_product_calendar', 'mybooking') ?></h6>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></p>
    <% } %>

    <!-- // Total -->
    <h4 class="color-brand-primary my-3">
    <?php echo esc_html_x( 'Total', 'renting_product_calendar', 'mybooking' ) ?>
    </h4>
    <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>

    <hr>

    <div class="form-row">
      <div class="col-md-12">
        <button id="add_to_shopping_cart_btn" class="btn btn-outline-dark my-5 w-100" type="submit"><?php echo esc_html_x('Book', 'renting_product_calendar', 'mybooking') ?></button>
      </div>
    </div>
  <% } else { %>
    <% if (product_type == 'resource') { %>
      <div class="alert alert-danger">
        <p>
          <?php echo esc_html_x( 'Sorry, there is no availability during these hours', 'renting_product_calendar', 'mybooking') ?>
        </p>
      </div>
    <% } else if (product_type == 'category_of_resources') { %>
      <div class="alert alert-warning">
        <p>
          <?php echo esc_html_x( 'Sorry, there is no availability for the entire period. The calendar shows those days when there is availability, but it may not be available for certain consecutive dates.', 'renting_product_calendar', 'mybooking') ?>
        </p>
        <p></p>
      </div>
    <% } %>
  <% } %>

</script>

<script type="text/tmpl" id="script_daily_occupation">
  <div class="row">
    <% for (var idx=0; idx < data.length; idx++) { %>
      <div class="col-md-3">
        <div><%= moment(data[idx].date_from).tz(timezone).format(format) %> <%= data[idx].time_from %></div>
        <div><%= moment(data[idx].date_to).tz(timezone).format(format) %> <%= data[idx].time_to %></div>
      </div>
    <% } %>
  </div>
</script>

<script type="text/tmpl" id="form_calendar_selector_turns_tmpl">
  <% if (turns.length == 0) { %>
    <div class="alert alert-danger">
      <?php echo esc_html_x('We are sorry. There are not defined times. Please, configure them at the calendar', 'renting_product_detail', 'mybooking' ) ?>
    </div>
  <% } else { %>
    <% if (turns.length == 1 && turns[0].full_day) { %>
      <input type="hidden" name="turn" value="<%=turns[0].time_from%>-<%=turns[0].time_to%>"/>
    <% } else { %>
      <% for (var idx=0; idx<turns.length; idx++) { %>
        <input type="radio" name="turn" value="<%=turns[idx].time_from%>-<%=turns[idx].time_to%>" <% if (!turns[idx].availability){%>disabled<% } %>
               class="<% if (turns[idx].availability){%>mybooking-product_calendar-available_turn<% } else {%>mybooking-product_calendar-not_available_turn<% } %>">

          <span class="<% if (turns[idx].availability){%>mybooking-product_calendar-available_turn<% } else {%>mybooking-product_calendar-not_available_turn<% } %>">
            <% if ( typeof turns[idx].name !== 'undefined' && turns[idx].name !== null && turns[idx].name !== '') { %>
              <%=turns[idx].name%>
            <% } else { %>
              <%=turns[idx].time_from%>-<%=turns[idx].time_to%>&nbsp;
            <% } %>
          </span>
      <%} %>
    <% } %>
  <% } %>

</script>
