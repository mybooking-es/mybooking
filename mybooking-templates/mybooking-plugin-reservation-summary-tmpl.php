<?php
  /** 
   * The Template for showing the sticky bar in renting choose product
   * 
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound 
   */
?>
<script type="text/tmpl" id="script_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">

        <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>

          <div class="reservation-summary-sticky">
            <div class="sandwitch-wrapper">
              <div class="reservation-summary_pickup_place">
                <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
              </div>
              <div class="reservation-summary_pickup_date">
                <span><%=shopping_cart.date_from_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%> <% } %></span>
              </div>
            </div>
            <div class="separator"></div>
            <div class="sandwitch-wrapper">
              <div class="reservation-summary_return_place">
                <span class="overflow-ellipsis">
                  <%=shopping_cart.return_place_customer_translation%>
                </span>
              </div>

              <% if (configuration.rentDateSelector === 'date_from_duration') { %>
                <!-- Duration -->
                <div class="reservation-summary_return_date">
                  <span><%=shopping_cart.renting_duration_literal%></span>
                </div>
              <% } else { %>
                <div class="reservation-summary_return_date">
                  <span><%=shopping_cart.date_to_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><% } %></span>
                </div>
              <% } %>

            </div>
            <div class="modify-button-wrapper push-to-the-right">
              <button id="modify_reservation_button"
                class="modify-button js-modify-reservation-button"><i
                  class="d-none d-md-inline mr-2 fas fa-pen"></i>
                  <?php echo esc_html_x( 'Edit', 'renting_choose_product', 'mybooking' ) ?>
              </button>
            </div>
          </div>

        <% } else { %>

          <div class="reservation-summary-sticky">
            <div class="reservation-summary_pickup_place">
              <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
            </div>
            <div class="reservation-summary_pickup_date">
              <span><%=shopping_cart.date_from_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></span>
            </div>
            <div class="separator"></div>
            <div class="reservation-summary_return_place d-none d-md-flex">
              <span class="overflow-ellipsis">
                <%=shopping_cart.return_place_customer_translation%>
              </span>
            </div>

            <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <!-- Duration -->
              <div class="reservation-summary_return_date">
                <% if (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day && halfDayTurns && halfDayTurns.length > 0) { %>
                  <!-- Show the turns -->
                  <form name="mybooking-choose-product_duration-form" class="form-inline">
                    <% for (var idx=0; idx<halfDayTurns.length; idx++) { %>
                      <input type="radio" class="mybooking-summary-duration-turn"
                             name="turn" value="<%=halfDayTurns[idx].time_from%>-<%=halfDayTurns[idx].time_to%>"
                        <% if (shopping_cart.time_from === halfDayTurns[idx].time_from &&
                               shopping_cart.time_to === halfDayTurns[idx].time_to) {%>checked<%}%>>
                        <% if (halfDayTurns[idx].name && halfDayTurns[idx].name !== '') { %>
                          &nbsp;<%=halfDayTurns[idx].name%>
                        <% } else { %> 
                          <%=halfDayTurns[idx].time_from%>-<%=halfDayTurns[idx].time_to%>
                        <% } %>
                      </input>&nbsp;
                    <% } %>
                  </form>
                <% } %>
                &nbsp;
                <span><%=shopping_cart.renting_duration_literal%></span>
              </div>
            <% } else { %>
              <!-- // Date/Time to -->
              <div class="reservation-summary_return_date">
                <span><%=shopping_cart.date_to_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
              </div>
            <% } %>

            <div class="modify-button-wrapper">
              <button id="modify_reservation_button"
                class="modify-button js-modify-reservation-button"><i class="d-none d-lg-inline mr-2 fas fa-pen"></i>
                <?php echo esc_html_x( 'Edit', 'renting_choose_product', 'mybooking' ) ?>
              </button>
            </div>
          </div>

        <% } %>
  </div>
</script>