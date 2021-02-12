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
  <% if (configuration.pickupReturnPlace) { %> 
        <!-- Pickup Place -->
        <div class="form-group"  class="pickup_place_group">
          <label
            for="pickup_place"><?php echo esc_html_x( 'Select pick-up place', 'renting_product_calendar', 'mybooking') ?></label>
          <select id="pickup_place" name="pickup_place" placeholder="<?php echo esc_attr_x( 'Select pick-up place', 'renting_product_calendar', 'mybooking') ?>" 
                  class="form-control w-100"></select>
        </div>

        <!-- Return place -->
        <div class="form-group" class="return_place">
          <label
            for="pickup_place"><?php echo esc_html_x( 'Select return place', 'renting_product_calendar', 'mybooking' ) ?></label>
          <select id="return_place" name="return_place" placeholder="<?php echo esc_attr_x( 'Select return place', 'renting_product_calendar', 'mybooking' ) ?>" 
                  class="form-control w-100"></select>
        </div>
      <% } %>

        <!-- Availability calendar -->
        <div class="form-group">
          <input id="date" type="hidden" name="date"/>
          <div id="date-container" class="disabled-picker"></div>
        </div>

      <% if (configuration.timeToFrom) { %>  
        <!-- Pickup/return time -->
        <div class="form-group time_selector_container">
            <label for="time_from"><?php echo esc_html_x( 'Delivery time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_from" name="time_from" placeholder="<?php echo esc_attr_x( 'hh:mm', 'renting_product_calendar', 'mybooking' ) ?>" disabled 
                    class="form-control w-100"> </select>
        </div>

        <div class="form-group time_selector_container">
            <label for="time_to"><?php echo esc_html_x( 'Collection time', 'renting_product_calendar', 'mybooking' ) ?></label>
            <select id="time_to" name="time_to" placeholder="<?php echo esc_attr_x( 'hh:mm', 'renting_product_calendar', 'mybooking' ) ?>" disabled 
                    class="form-control w-100"> </select>
        </div>
      <% } else { %>
        <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
        <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>  
      <% } %>  
      <!-- Reservation detail -->
      <div id="reservation_detail">
      </div>
        
</script>

<script type="text/tmpl" id="script_reservation_summary">

  <br>
  <hr>
  <!-- Exceeds max duration -->
  <% if (product && product.exceeds_max) { %>
     <div class="alert alert-danger">
        <p class="text-center"><%= i18next.t('chooseProduct.max_duration', {duration: i18next.t('common.'+product.price_units, {count: product.max_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></p>
     </div>  
  <!-- Less than min duration -->  
  <% } else if (product && product.be_less_than_min) { %>
     <div class="alert alert-danger">
        <p class="text-center"><%= i18next.t('chooseProduct.min_duration', {duration: i18next.t('common.'+product.price_units, {count: product.min_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></p>
     </div>  
  <!-- Available --> 
  <% } else if (product_available) { %>    
    <h4 class="brand-primary my-3">
    <?php echo esc_html_x( 'Reservation summary', 'renting_product_calendar', 'mybooking') ?></h4>
    
    <!-- Duration -->
    <% if (shopping_cart.days > 0) { %>
    <p class="color-gray-600">
      <span><%=shopping_cart.days%>
        <?php echo esc_html( MyBookingEngineContext::getInstance()->getDuration() ) ?></span></p>
    <% } else if (shopping_cart.hours > 0) { %>
    <p class="color-gray-600">
      <span><%=shopping_cart.hours%>
        <?php echo esc_html_x( 'hours(s)', 'renting_product_calendar', 'mybooking' ) ?></span></p>
    <% } %>

    <!-- Product -->
    <h5><?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?></h5>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

    <!-- Extras -->
    <% if (shopping_cart.extras.length > 0) { %>
      <% for (var idx=0;idx<shopping_cart.extras.length;idx++) { %>
        <h6><%=shopping_cart.extras[idx].extra_description%> <% if (shopping_cart.extras[idx].quantity > 1) { %><span class="badge badge-info"><%=shopping_cart.extras[idx].quantity%></span> <% } %></h6>
        <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></p>
      <% } %>
    <% } %>

    <!-- Supplements -->
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

    <!-- Total -->
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