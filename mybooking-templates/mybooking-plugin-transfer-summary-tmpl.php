<?php
  /**
   * The Template for showing the transfer summary step - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-transfer-summary-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>
<!-- Reservation summary -->
<script type="text/tmpl" id="script_transfer_reservation_summary">

  <div class="process-message">
    <h4 id="reservation_title"><%= booking.summary_status %></h4>
  </div>

  <div class="container">
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <div class="process-section-box">

          <!-- Information -->
          <h3 class="reservation-summary_title">
            <%=booking.item_name_customer_translation%>

            <!-- Price -->
            <span class="product-amount float-right">
              <%=configuration.formatCurrency(booking.item_cost)%>
            </span>
          </h3>
          <ul class="list-group list-group-flush">
            <% if (booking.round_trip) { %>
              <li class="list-group-item reservation-summary-card-detail">
                <b><?php echo esc_html_x( 'Going', 'transfer_summary', 'mybooking' ) ?></b>
              </li>  
              <li class="list-group-item reservation-summary-card-detail">
                <i class="fa fa-calendar-o"></i>&nbsp;<%=booking.date%>&nbsp;<%=booking.time%>
              </li>
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-car"></i>&nbsp;<%=booking.origin_point_name_customer_translation%></li>
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-map-marker"></i>&nbsp;<%=booking.destination_point_name_customer_translation%></li>
              <li class="list-group-item reservation-summary-card-detail">
                <b><?php echo esc_html_x( 'Return', 'transfer_summary', 'mybooking' ) ?></b>
              </li>  
              <li class="list-group-item reservation-summary-card-detail">
                <i class="fa fa-calendar-o"></i>&nbsp;<%=booking.return_date%>&nbsp;<%=booking.return_time%>
              </li>                
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-car"></i>&nbsp;<%=booking.return_origin_point_name_customer_translation%></li>
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-map-marker"></i>&nbsp;<%=booking.return_destination_point_name_customer_translation%></li>           
            <% } else { %>
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-car"></i>&nbsp;<%=booking.origin_point_name_customer_translation%></li>
              <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-map-marker"></i>&nbsp;<%=booking.destination_point_name_customer_translation%></li>
              <li class="list-group-item reservation-summary-card-detail">
                <i class="fa fa-calendar-o"></i>&nbsp;<%=booking.date%>&nbsp;<%=booking.time%>
              </li>
            <% } %>
            <li class="list-group-item reservation-summary-card-detail">
              <i class="fa fa-user"></i>&nbsp;<%=booking.number_of_adults%>
              <i class="fa fa-child"></i>&nbsp;<%=booking.number_of_children%>
              <i class="fa fa-baby"></i>&nbsp;<%=booking.number_of_infants%>
            </li>
            <% if (booking.engine_modify_dates) { %>
              <li class="list-group-item">
                <button id="modify_reservation_button" class="btn btn-primary w-100"><?php echo esc_html_x( 'Edit', 'transfer_summary', 'mybooking-wp-plugin' ) ?></button>
              </li>
            <% } %>
          </ul>

          <!-- Product -->
          <ul class="list-group list-group-flush resume-product-list">
            <li class="list-group-item product-detail-list">
              <!-- Photo -->
              <div class="product-detail-list-img-wrapper">
                <img src="<%=booking.item_full_photo%>" alt="Selected product foto">
              </div>
            </li>
          </ul>


          <!-- Extras -->
          <% if (booking.extras.length > 0) { %>
            <h4><?php echo esc_html_x( 'Extras', 'transfer_summary', 'mybooking' ) ?></h4>
            <ul class="list-group list-group-flush">
              <% for (var idx=0;idx<booking.extras.length;idx++) { %>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="extra-name"><b><%=booking.extras[idx].extra_name_customer_translation%></b></span>
                  <span class="badge badge-primary badge-pill"><%=booking.extras[idx].quantity%></span>
                  <span class="product-amount float-right"><%=configuration.formatCurrency(booking.extras[idx].extra_cost)%></span>
              </li>
              <% } %>
            </ul>
          <% } %>

          <!-- Total -->
          <h3 class="mybooking_transfer_reservation_summary_price">
            <?php echo esc_html_x( "Total", 'transfer_summary', 'mybooking-wp-plugin' ) ?>
            <span class="float-right"><%=configuration.formatCurrency(booking.total_cost)%></span>
          </h3>
        </div>

        <div class="process-section-box">
          <!-- Customer -->
          <h4 class="my-3"><?php echo esc_html_x( "Customer's details", 'transfer_summary', 'mybooking') ?></h4>
          <div class="table-responsive">
            <table class="table table-borderless table-striped">
              <tbody>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "Full name", 'transfer_summary', 'mybooking') ?>:</th>
                  <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                </tr>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "E-mail", 'transfer_summary', 'mybooking') ?>:</th>
                  <td><%=booking.customer_email%></td>
                </tr>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "Phone number", 'transfer_summary', 'mybooking') ?>:</th>
                  <td><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>


</script>
