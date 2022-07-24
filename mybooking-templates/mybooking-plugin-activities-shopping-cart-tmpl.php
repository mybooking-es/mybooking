<?php
  /** 
   * The Template for showing the activity shopping cart - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities-shopping-cart-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
   */
?>
<!-- Microtemplates -->

<script type="text/tpml" id="script_shopping_cart_empty">
  <div class="alert alert-warning">
    <p><?php echo esc_html_x( 'Shopping cart is empty', 'activity_shopping_cart', 'mybooking' ) ?></p>
  </div>
</script>

<script type="text/tpml" id="script_products_detail">
  <% for (idx in shopping_cart.items) { %>
    <div class="shoping-cart-activity">
        <div class="shoping-cart-activity__img">
          <img src="<%=shopping_cart.items[idx].photo_full%>" alt=""/>
        </div>
        <h1 class="shoping-cart-activity__title"><%=shopping_cart.items[idx].item_description_customer_translation%></h1>
        <p class="shoping-cart-activity__dates"><%= configuration.formatDate(shopping_cart.items[idx].date) %> <%= shopping_cart.items[idx].time %></p>
        <br>

        <% if (shopping_cart.use_rates) { %>
          <div class="shoping-cart-activity__data">
              <% for (var x=0; x<shopping_cart.items[idx]['items'].length; x++) { %>
                  <div>
                    <%=shopping_cart.items[idx]['items'][x].quantity %>
                    <%=shopping_cart.items[idx]['items'][x].item_price_description %> x
                    <%=configuration.formatCurrency(shopping_cart.items[idx]['items'][x].item_unit_cost) %>
                  </div>
                  <div class="text-right">
                        <%=configuration.formatCurrency(shopping_cart.items[idx]['items'][x].item_cost) %>
                  </div>
              <% } %>  
                <div>
                  <?php echo esc_html_x( 'Total', 'activity_shopping_cart', 'mybooking' ) ?>
                </div>
                <div class="text-right fw-800"><%=configuration.formatCurrency(shopping_cart.items[idx]['total'])%>
                </div>
          </div>
        <% } %>

        <% if (configuration.activityReservationMultipleItems) { %>
          <div class="shoping-cart-activity__trash-button btn-delete-shopping-cart-item"
              data-item-id="<%=shopping_cart.items[idx].item_id%>"
              data-date="<%=shopping_cart.items[idx].date%>"
              data-time="<%=shopping_cart.items[idx].time%>">
              <i class="fas fa-trash-alt"></i>
          </div>
        <% } %>
    </div><!-- /shoping-cart-activity-card -->
  <% } %>
</script>

<!-- Script customer  -->

<script type="text/tmpl" id="script_reservation_form">
  <input type="hidden" name="customer_language" value="<%=language%>"/>

    <h4 class="brand-primary my-3 customer_component">
              <?php echo esc_html_x( "Customer", 'activity_shopping_cart', 'mybooking') ?></h4>

    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label
            for="customer_name"><?php echo esc_html_x( 'Name', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
          <input name="customer_name" id="customer_name" type="text" class="form-control w-100"
            placeholder="<?php echo esc_attr_x( 'Name', 'activity_shopping_cart', 'mybooking' ) ?>*">
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label
            for="customer_surname"><?php echo esc_html_x( 'Surname', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
          <input name="customer_surname" id="customer_surname" type="text" class="form-control w-100"
            placeholder="<?php echo esc_attr_x( 'Surname', 'activity_shopping_cart', 'mybooking' ) ?>*">
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="customer_email"><?php echo esc_html_x( 'E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
            <input name="customer_email" id="customer_email" type="text" class="form-control w-100"
              placeholder="<?php echo esc_attr_x( 'E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*">
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label
              for="confirm_customer_email"><?php echo esc_html_x( 'Confirm E-mail', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
            <input name="confirm_customer_email" id="confirm_customer_email" class="form-control w-100" type="text"
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
            <input name="customer_phone" id="customer_phone" type="text" class="form-control w-100"
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

      <% if (configuration.activityCustomerVehicle) { %>

        <hr>
        <h4 class="brand-primary my-3 customer_component">
              <?php echo esc_html_x( "Vehicle", 'activity_shopping_cart', 'mybooking') ?></h4>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label
                for="customer_stock_brand"><?php echo esc_html_x( 'Brand', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
              <input name="customer_stock_brand" id="customer_stock_brand" type="text" class="form-control w-100"
                placeholder="<?php echo esc_attr_x( 'Brand', 'activity_shopping_cart', 'mybooking' ) ?>*"
                maxlength="100" required>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label
                for="customer_stock_model"><?php echo esc_html_x( 'Model', 'activity_shopping_cart', 'mybooking') ?>*</label>
              <input class="form-control w-100" id="customer_stock_model" name="customer_stock_model" type="text"
                placeholder="<?php echo esc_attr_x( 'Model', 'activity_shopping_cart', 'mybooking') ?>*"
                maxlength="100" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label
                for="customer_stock_plate"><?php echo esc_html_x( 'Stock plate', 'activity_shopping_cart', 'mybooking' ) ?>*</label>
              <input name="customer_stock_plate" id="customer_stock_plate" type="text" class="form-control w-100"
                placeholder="<?php echo esc_attr_x( 'Stock plate', 'activity_shopping_cart', 'mybooking' ) ?>*"
                maxlength="100" required>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label
                for="customer_stock_color"><?php echo esc_html_x( 'Color', 'activity_shopping_cart', 'mybooking') ?></label>
              <input class="form-control w-100" id="customer_stock_color" name="customer_stock_color" type="text"
                placeholder="<?php echo esc_attr_x( 'Color', 'activity_shopping_cart', 'mybooking') ?>"
                maxlength="100">
            </div>
          </div>
        </div>

        <hr>

      <% } %>
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
                    <?php /* translators: %s: terms and conditions URL */ ?>
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
                          <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>" />
                        </label>
                      </div>
                      <div class="form-group col-md-12">
                      <label for="payments_credit_card">
                        <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=shopping_cart.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'activity_shopping_cart', 'mybooking' ) ?>
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
                        </label>
                      </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                <% } else if (shopping_cart.payment_methods.paypal_standard) { %>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>" />
                    <input type="hidden" id="payment_method_value" value="paypal_standard">
                <% } else if (shopping_cart.payment_methods.tpv_virtual) { %>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' )  ?>"/>
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
                        <?php /* translators: %s: terms and conditions URL */ ?>
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