<?php
  /** 
   * The Template for showing the sticky bar in transfer complete
   * It can not reuse mybooking-plugin-transfer-reservation-summary-tmpl.php because of the
   * script Id that is different.
   */
?>
<script type="text/tmpl" id="script_transfer_reservation_summary_sticky">
  <div class="reservation-summary-sticky-wrapper">
    <div class="reservation-summary-sticky">
      <!-- Transfer type -->
      <% if (shopping_cart.round_trip) { %>
        <span class="mybooking_transfer_reservation-summary_transfer-type">
          <?php echo esc_html_x( 'Round trip', 'transfer_checkout', 'mybooking' ) ?>
          <br>
          <span class="mybooking_transfer_reservation-summary_cost">
            <%=configuration.formatCurrency(shopping_cart.total_cost)%>
          </span>            
        </span>
      <% } else { %>
        <span class="mybooking_transfer_reservation-summary_transfer-type">
          <?php echo esc_html_x( 'One Way', 'transfer_checkout', 'mybooking' ) ?>
          <br>
          <span class="mybooking_transfer_reservation-summary_cost">
            <%=configuration.formatCurrency(shopping_cart.total_cost)%>
          </span>
        </span>
      <% } %>

      <!-- Transfer info -->
      <div class="reservation-summary_info">
        <div class="reservation-summary_block">
          <% if (shopping_cart.round_trip) { %>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span></span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
            <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
            <br>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8592;</span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.return_date%> <%=shopping_cart.return_time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.return_origin_point_name%></span>
            <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.return_destination_point_name%></span>
          <% } else { %>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
            <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
          <% } %>
        </div>
        <div class="reservation-summary_block">
          <span><i class="fa fa-user"></i>&nbsp;<%=shopping_cart.number_of_adults%></span>
          <span><i class="fa fa-child"></i>&nbsp;<%=shopping_cart.number_of_children%></span>
          <span><i class="fa fa-baby"></i>&nbsp;<%=shopping_cart.number_of_infants%></span>
        </div>
      </div>

      <!-- Modify transfer -->
      <button id="mybooking_transfer_modify_reservation_button" class="modify-button">
        <i class="d-none d-md-inline mr-2 fas fa-pen"></i>
        <?php echo esc_html_x( 'Edit', 'transfer_checkout', 'mybooking' ) ?>
      </button>

    </div>
  </div>
</script>