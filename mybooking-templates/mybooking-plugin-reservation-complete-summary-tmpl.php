<?php
  /** 
   * The Template for showing the sticky bar in renting complete
   * It can not reuse mybooking-plugin-reservation-summary-tmpl.php because of the
   * script Id that is different.
   * 
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
   */
?>
<script type="text/tmpl" id="script_reservation_summary_sticky">
  <div class="reservation-summary-sticky-wrapper">
    <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>
      <div class="reservation-summary-sticky complete-sticky">
        <div class="sandwitch-wrapper">
          <% if ( shopping_cart.rental_location_name ||
                      shopping_cart.pickup_place_customer_translation ||
                      shopping_cart.simple_location_name  
                    )  { %>
            <div class="reservation-summary_pickup_place">
              <span class="overflow-ellipsis">
                <% if ( shopping_cart.pickup_place_customer_translation ) { %>
                  <%=shopping_cart.pickup_place_customer_translation%>
                <% } else if ( shopping_cart.rental_location_name ) { %>
                  <%=shopping_cart.rental_location_name%>
                <% } else if ( shopping_cart.simple_location_name ) { %>
                  <%=shopping_cart.simple_location_name%>
                <% } %>
              </span>
            </div>
          <% } else { %>
            <div class="ml-1"></div>
          <% } %>
          <div class="reservation-summary_pickup_date">
            <span>
              <%=shopping_cart.date_from_short_format%>
              <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
                <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%>
              <% } %>
            </span>
          </div>
        </div>

        <div class="separator"></div>

        <div class="sandwitch-wrapper push-to-the-right">
          <div class="reservation-summary_return_place">
            <span class="overflow-ellipsis">
              <%=shopping_cart.return_place_customer_translation%>
            </span>
          </div>
          <div class="reservation-summary_return_date">
            <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <span>
                <%=shopping_cart.renting_duration_literal%>
                <% if (!shopping_cart.renting_duration_literal) { %>
                  <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                    <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                      - <%= shopping_cart.turn_description %> 
                    <% } else { %>
                      ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                    <% } %>
                  <% } %>
                <% } %>
              </span>
            <% } else { %>
              <span>
                <%=shopping_cart.date_to_short_format%>
                <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%>
              </span>
            <% } %>
          </div>
        </div>
        
        <!-- // Row for price & buttons  -->
        <div class="complete-summary-row">
          <div class="complete-buttons-wrapper"></div>

          <div class="complete-summary-price-wrapper">
            <div class="complete-summary-total-title">
              <?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?>
            </div>
            <div class="complete-summary-total-price">
              <%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </div>
          </div>
        </div>
      </div>
    </div>

    <% } else { %>

      <div class="reservation-summary-sticky">
        <% if ( shopping_cart.rental_location_name ||
                    shopping_cart.pickup_place_customer_translation ||
                    shopping_cart.simple_location_name  
                  )  { %>
          <div class="reservation-summary_pickup_place">
            <span class="overflow-ellipsis">
              <% if ( shopping_cart.pickup_place_customer_translation ) { %>
                <%=shopping_cart.pickup_place_customer_translation%>
              <% } else if ( shopping_cart.rental_location_name ) { %>
                <%=shopping_cart.rental_location_name%>
              <% } else if ( shopping_cart.simple_location_name ) { %>
                <%=shopping_cart.simple_location_name%>
              <% } %>
            </span>
          </div>
        <% } %>
        <div class="reservation-summary_pickup_date">
          <span><%=shopping_cart.date_from_short_format%>
          <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%>
          <% } %>
          </span>
        </div>
        <div class="separator"></div>
        <div class="reservation-summary_return_place d-none d-md-flex">
          <span class="overflow-ellipsis">
            <%=shopping_cart.return_place_customer_translation%>
          </span>
        </div>
        <div class="reservation-summary_return_date">
          <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <span><%=shopping_cart.renting_duration_literal%>
                <% if (!shopping_cart.renting_duration_literal) { %>
                  <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                    <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                      - <%= shopping_cart.turn_description %> 
                    <% } else { %>
                      ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                    <% } %>
                  <% } %>
                <% } %>
              </span>
          <% } else { %>
            <span><%=shopping_cart.date_to_short_format%>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
          <% } %>
        </div>
          <!-- // Row for price & buttons -->
          <div class="complete-summary-row">
            <div class="complete-buttons-wrapper">
            </div>

            <div class="complete-summary-price-wrapper">
              <div class="complete-summary-total-title">
                <?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?>
              </div>
              <div class="complete-summary-total-price">
                <%=configuration.formatCurrency(shopping_cart.total_cost)%>
              </div>
            </div>
          </div>
      </div>
    <% } %>
  </div>
</script>