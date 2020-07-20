  <!-- Desktop reservation detail -->
  <div class="product-detail-container d-md-flex">
    <div class="product-detail-content">
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
      <% var booking_line = booking.booking_lines[idx]; %>
      <h2 class="product-name mb-3"><%=booking_line.item_description_customer_translation%></h2>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_from_full_format%> / <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_to_full_format%> / <%=booking.time_to%></li>
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