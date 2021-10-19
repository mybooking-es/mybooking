<?php
  /**
   * The Template for showing the transfer reservation - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-transfer-reservation-tmpl.php
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
        
        <!-- Summary -->
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
            <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-car"></i>&nbsp;<%=booking.origin_point_name_customer_translation%></li>
            <li class="list-group-item reservation-summary-card-detail"><i class="fa fa-map-marker"></i>&nbsp;<%=booking.destination_point_name_customer_translation%></li>
            <li class="list-group-item reservation-summary-card-detail">
              <i class="fa fa-calendar-o"></i>&nbsp;<%=booking.date%>&nbsp;<%=booking.time%>
            </li>
            <li class="list-group-item reservation-summary-card-detail">
              <i class="fa fa-user"></i>&nbsp;<%=booking.number_of_adults%>
              <i class="fa fa-child"></i>&nbsp;<%=booking.number_of_children%>
            </li>
            <% if (booking.engine_modify_dates) { %>
              <li class="list-group-item">
                <button id="modify_reservation_button" class="btn btn-primary w-100"><?php echo esc_html_x( 'Edit', 'transfer_my_reservation', 'mybooking-wp-plugin' ) ?></button>
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
            <h4><?php echo esc_html_x( 'Extras', 'transfer_my_reservation', 'mybooking' ) ?></h4>
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
            <?php echo esc_html_x( "Total", 'transfer_my_reservation', 'mybooking-wp-plugin' ) ?>
            <span class="float-right"><%=configuration.formatCurrency(booking.total_cost)%></span>
          </h3>
        </div>

        <!-- Customer -->
        <div class="process-section-box">
          <!-- Customer -->
          <h4 class="my-3"><?php echo esc_html_x( "Customer's details", 'transfer_my_reservation', 'mybooking') ?></h4>
          <div class="table-responsive">
            <table class="table table-borderless table-striped">
              <tbody>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "Full name", 'transfer_my_reservation', 'mybooking') ?>:</th>
                  <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                </tr>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "E-mail", 'transfer_my_reservation', 'mybooking') ?>:</th>
                  <td><%=booking.customer_email%></td>
                </tr>
                <tr>
                  <th scope="row"><?php echo esc_html_x( "Phone number", 'transfer_my_reservation', 'mybooking') ?>:</th>
                  <td><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Payment -->
        <div id="transfer_payment_detail" class="col process-section-box" style="display:none">
        </div>
      </div>
    </div>
  </div>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_transfer_payment_detail">
  <h4 class="my-3"><%= i18next.t('myReservation.pay.total_payment', {amount:configuration.formatCurrency(amount) }) %></h4>
  <% if (booking.total_paid == 0 && booking.status == 'pending_confirmation') {%>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.booking_amount', {amount:configuration.formatCurrency(booking.booking_amount) }) %>
    </div>
  <% } else if (booking.total_pending > 0 && booking.status != 'pending_confirmation' && booking.status != 'cancelled') { %>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('myReservation.pay.pending_amount', {amount:configuration.formatCurrency(booking.total_pending) }) %>
    </div>      
  <% } %> 
  <form name="payment_form">
    <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
      <div class="alert alert-secondary" role="alert">
        <?php echo wp_kses_post( _x( 'You will be redirected to the <b>payment platform</b> to make the payment securely. You can use <u>Paypal account</u> or <u>credit card</u> to make the payment.', 'transfer_my_reservation', 'mybooking' ) )?>
      </div>     
      <div class="form-row">
         <div class="form-group col-md-12">
           <label for="payments_paypal_standard">
            <input type="radio" name="payment_method_id" value="paypal_standard">&nbsp;<?php echo esc_html_x( 'Paypal', 'transfer_my_reservation', 'mybooking' ) ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>" />
           </label>
         </div>
         <div class="form-group col-md-12">
           <label for="payments_paypal_standard">
            <input type="radio" name="payment_method_id"
              value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'transfer_my_reservation', 'mybooking' ) ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
           </label>
         </div>
      </div>
    <% } else if (sales_process.payment_methods.paypal_standard) {%>
      <div class="alert alert-secondary" role="alert">
        <?php echo wp_kses_post( _x( 'You will be redirected to <b>Paypal payment platform</b> to make the payment securely. You can use <u>Paypal account</u> or <u>credit card</u> to make the payment.', 'transfer_my_reservation', 'mybooking' ) )?>
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
                                     'transfer_my_reservation', 'mybooking' ) )?>
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
  </div>

</script>