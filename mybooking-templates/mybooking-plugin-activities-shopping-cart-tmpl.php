<!-- Microtemplates -->

<script type="text/tpml" id="script_shopping_cart_empty">
  <div class="alert alert-warning">
    <p><?php echo esc_html_x( 'Shopping cart is empty', 'activity_shopping_cart', 'mybooking' ) ?></p>
  </div>
</script>

<script type="text/tpml" id="script_products_detail">
  <% for (idx in shopping_cart.items) { %>
  <div class="activity-view-card">
    <div class="card-img-bg-color">
        <div class="activity-card__img">
          <img src="<%=shopping_cart.items[idx].photo_full%>" alt=""/>
        </div>
        <div class="trash-button btn-delete-shopping-cart-item"
            data-item-id="<%=shopping_cart.items[idx].item_id%>"
            data-date="<%=shopping_cart.items[idx].date%>"
            data-time="<%=shopping_cart.items[idx].time%>">
            <i class="fas fa-trash-alt"></i>
        </div>
        <div class="activity-card__img-text">
          <h5 class="card-title color-white"><%=shopping_cart.items[idx].item_description_customer_translation%></h5>
          <p class="card-text color-white"><%= configuration.formatDate(shopping_cart.items[idx].date) %> <%= shopping_cart.items[idx].time %></p>
        </div>
    </div><!-- /bg-color -->
      <table class="table table-activities">
        <tbody>
          <% for (var x=0; x<shopping_cart.items[idx]['items'].length; x++) { %>
            <tr>
                <td><%=shopping_cart.items[idx]['items'][x].quantity %>
                    <%=shopping_cart.items[idx]['items'][x].item_price_description %> x
                    <%=configuration.formatCurrency(shopping_cart.items[idx]['items'][x].item_unit_cost) %>
                </td>
                <td class="text-right">
                    <%=configuration.formatCurrency(shopping_cart.items[idx]['items'][x].item_cost) %>
                </td>
            </tr>
          <% } %>  
          <tr>
            <td><?php echo esc_html_x( 'Total', 'activity_shopping_cart', 'mybooking' ) ?></td>
            <td class="text-right fw-800"><%=configuration.formatCurrency(shopping_cart.items[idx]['total'])%></td>
          </tr>
        </tbody>
      </table>
  </div><!-- /activity-card -->
  <% } %>
</script>

<!-- Script customer  -->

<script type="text/tmpl" id="script_reservation_form">
  <input type="hidden" name="customer_language" value="<%=language%>"/>
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label
            for="customer_name"><?php echo esc_html_x( 'Name', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
          <input name="customer_name" id="customer_name" type="text" class="w-100"
            placeholder="<?php echo esc_attr_x( 'Name', 'activity_shopping_cart', 'mybooking' ) ?>*">
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label
            for="customer_surname"><?php echo esc_html_x( 'Surname', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
          <input name="customer_surname" id="customer_surname" type="text" class="w-100"
            placeholder="<?php echo esc_attr_x( 'Surname', 'activity_shopping_cart', 'mybooking' ) ?>*">
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="customer_email"><?php echo esc_html_x( 'E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
            <input name="customer_email" id="customer_email" type="text" class="w-100"
              placeholder="<?php echo esc_attr_x( 'E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*">
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="confirm_customer_email"><?php echo esc_html_x( 'Confirm E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
            <input name="confirm_customer_email" id="confirm_customer_email" class="w-100" type="text"
              placeholder="<?php echo esc_attr_x( 'Confirm E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*"
              maxlength="50">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="customer_phone"><?php echo esc_html_x( 'Phone number', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
            <input name="customer_phone" id="customer_phone" type="text" class="w-100"
              placeholder="<?php echo esc_attr_x( 'Phone number', 'activity_shopping_cart', 'mybooking' ) ?>*"
              maxlength="15">
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="customer_mobile_phone"><?php echo esc_html_x( 'Alternative phone number', 'activity_shopping_cart', 'mybooking') ?></label>
            <input class="form-control" id="customer_mobile_phone" name="customer_mobile_phone" type="text"
              placeholder="<?php echo esc_attr_x( 'Alternative phone number', 'activity_shopping_cart', 'mybooking') ?>"
              maxlength="15">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="comments"><?php echo esc_html_x( 'Comments', 'activity_shopping_cart', 'mybooking' ) ?></label>
            <textarea class="w-100 p-3" name="comments" id="comments" rows="5"
                      placeholder="<?php echo esc_attr_x( 'Comments', 'activity_shopping_cart', 'mybooking' ) ?>"></textarea>
          </div>
        </div>
      </div>
</script>

<!-- Script payment -->

<script type="text/tmpl" id="script_payment_detail">

  <% if (shopping_cart.use_rates) { %>
        <div class="jumbotron mb-3">
          <h2 class="h5"><?php echo esc_html_x( 'Total', 'activity_shopping_cart', 'mybooking' ) ?> <span class="pull-right"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span></h2>
          <hr>
        </div>
      <% } %>

      <% if (canPay) { %>
        <% if (shopping_cart.payment_methods.paypal_standard && shopping_cart.payment_methods.tpv_virtual) { %>
          <!-- The payment method will be selected later -->
          <input type="hidden" name="payment" value="none">
        <% } else if (shopping_cart.payment_methods.paypal_standard) { %>   
          <!-- Fixed paypal standard -->
          <input type="hidden" name="payment" value="paypal_standard">
        <% } else  if (shopping_cart.payment_methods.tpv_virtual) { %>
          <!-- Fixed tpv -->
          <input type="hidden" name="payment" value="<%=shopping_cart.payment_methods.tpv_virtual%>">  
        <% } %>  
      <% } else { %>
        <input type="hidden" name="payment" value="none"> 
      <% } %>  

      <% if (canRequestAndPay) { %>
        <hr>
        <div class="form-row">
          <% if (shopping_cart.can_make_request) { %>
            <div class="form-group col-md-12">
              <label>
              <input type="radio" name="complete_action" value="request_reservation" class="complete_action">&nbsp;<?php echo esc_html_x( 'Request reservation', 'activity_shopping_cart', 'mybooking' ) ?>
              </label>
            </div>
          <% } %>
          <% if (canPay) { %>
          <div class="form-group col-md-12">
            <label>
            <input type="radio" name="complete_action" value="pay_now" class="complete_action">&nbsp;<?php echo esc_html_x( 'Pay now', 'activity_shopping_cart', 'mybooking' ) ?>
            </label>
          </div>
          <% } %>
        </div>
      <% } %>

      <!-- Request reservation -->

      <% if (shopping_cart.can_make_request) { %>
      <div id="request_reservation_container" <% if (canRequestAndPay) { %>style="display:none"<%}%>>
        <div class="border p-4">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>
                <input type="checkbox" id="conditions_read_request_reservation" name="conditions_read_request_reservation">&nbsp;
                  <?php if ( empty($args['terms_and_conditions']) ) { ?>
                    <?php echo esc_html_x( 'I have read and hereby accept the terms and conditions', 'activity_shopping_cart', 'mybooking' ) ?>
                  <?php } else { ?>
                    <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">terms and conditions</a>', 
                                                           'activity_shopping_cart',
                                                           'mybooking' ), 
                                                       $args['terms_and_conditions'] ) ) ?> 
                  <?php } ?>  
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success w-100"><?php echo esc_html_x( 'Request reservation', 'activity_shopping_cart', 'mybooking' ) ?></button>
            </div>
          </div>
        </div>
      </div>
      <% } %>

      <% if (canPay) { %>

        <div id="payment_now_container" <% if (canRequestAndPay) { %>style="display:none"<%}%>>

            <div class="border p-4">
                <h4><%=i18next.t('activities.payment.total_payment', {amount: configuration.formatCurrency(paymentAmount)})%></h4>
                <br>

                <!-- Payment amount -->

                <div class="alert alert-info">
                  <p><%=i18next.t('activities.payment.deposit_amount',{amount: configuration.formatCurrency(paymentAmount)})%></p>
                </div>

                <% if (shopping_cart.payment_methods.paypal_standard &&
                      shopping_cart.payment_methods.tpv_virtual) { %>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="payments_paypal_standard">
                          <input type="radio" id="payments_paypal_standard" name="payment_method_select" class="payment_method_select" value="paypal_standard">&nbsp;<?php echo esc_html_x( 'Paypal', 'activity_shopping_cart', 'mybooking' ) ?>
                          <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ) ?>" />
                        </label>
                      </div>
                      <div class="form-group col-md-12">
                      <label for="payments_credit_card">
                        <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=shopping_cart.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'activity_shopping_cart', 'mybooking' ) ?>
                        <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ) ?>"/>
                        <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ) ?>"/>
                        </label>
                      </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                <% } else if (shopping_cart.payment_methods.paypal_standard) { %>
                    <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ) ?>" />
                    <input type="hidden" id="payment_method_value" value="paypal_standard">
                <% } else if (shopping_cart.payment_methods.tpv_virtual) { %>
                    <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ) ?>"/>
                    <img src="<?php echo esc_attr( esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ) ?>"/>
                    <input type="hidden" id="payment_method_value" value="<%=shopping_cart.payment_methods.tpv_virtual%>">
                <% } %>

                <hr>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="payments_paypal_standard">
                      <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;
                      <?php if ( empty($args['terms_and_conditions']) ) { ?>
                        <?php echo esc_html_x( 'I have read and hereby accept the terms and conditions', 'activity_shopping_cart', 'mybooking' ) ?>
                      <?php } else { ?>
                        <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">terms and conditions</a>', 
                                                               'activity_shopping_cart', 
                                                               'mybooking' ), 
                                                           $args['terms_and_conditions'] ) ) ?> 
                      <?php } ?>  
                    </label>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success w-100"><%=i18next.t('activities.payment.payment_button',{amount: configuration.formatCurrency(paymentAmount)})%></a>
                  </div>
                </div>
            </div>

        </div>

      <% } %>  

    </script>