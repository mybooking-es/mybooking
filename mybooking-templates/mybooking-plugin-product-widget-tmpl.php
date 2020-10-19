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
  <% if (product_available) { %>    
    <h4 class="brand-primary my-3">
      <?php echo esc_html_x( 'Reservation summary', 'renting_product_calendar', 'mybooking') ?></h4>

    <% if (shopping_cart.days > 0) { %>
    <p class="color-gray-600"><?php echo esc_html_x( 'Rental duration', 'renting_product_calendar', 'mybooking' ) ?>:
      <span><%=shopping_cart.days%>
        <?php echo esc_html_x( 'day(s)', 'renting_product_calendar', 'mybooking' ) ?></span></p>
    <% } else if (shopping_cart.hours > 0) { %>
    <p class="color-gray-600"><?php echo esc_html_x( 'Rental duration', 'renting_product_calendar', 'mybooking' ) ?>:
      <span><%=shopping_cart.hours%>
        <?php echo esc_html_x( 'hours(s)', 'renting_product_calendar', 'mybooking' ) ?></span></p>
    <% } %>

    <h5><?php echo esc_html_x('Product', 'renting_product_calendar', 'mybooking') ?></h5>
    <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

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