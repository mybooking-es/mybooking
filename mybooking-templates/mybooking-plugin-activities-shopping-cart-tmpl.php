    <!-- Microtemplates -->

    <script type="text/tpml" id="script_shopping_cart_empty">
      <div class="alert alert-warning">
        <p><?php echo _x( 'Shopping cart is empty', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?></p>
      </div>
    </script>

    <script type="text/tpml" id="script_products_detail">

      <% for (idx in shopping_cart.items) { %>
          <div class="card mb-3">

            <% if (shopping_cart.items[idx].photo_full != null) { %>
              <img class="card-img-top shopping-cart-product-photo" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
            <% } else { %>
              <div class="text-center shopping-cart-no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
            <% } %>

            <div class="card-body">
              <h5 class="card-title"><%=shopping_cart.items[idx].item_description_customer_translation%></h5>
              <p class="card-text text-muted"><%= configuration.formatDate(shopping_cart.items[idx].date) %> <%= shopping_cart.items[idx].time %></p>
              <% if (shopping_cart.allow_select_places_for_reservation || shopping_cart.use_rates) { %>
                <br>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <% if (shopping_cart.allow_select_places_for_reservation) { %>
                        <% if (shopping_cart.use_rates) { %>
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
                        <% } else { %>
                          <% for (var x=0; x<shopping_cart.items[idx]['items'].length; x++) { %>
                            <tr>
                                <td><%=shopping_cart.items[idx]['items'][x].quantity %>
                                    <%=shopping_cart.items[idx]['items'][x].item_price_description %> 
                                </td>
                            </tr>
                          <% } %>   
                        <% } %>
                      <% } %>
                      <% if (shopping_cart.use_rates) { %> 
                        <!-- Show the total -->
                        <tr>
                          <td><strong><?php echo _x( 'Total', 'activity_shopping_cart_item', 'mybooking-wp-plugin' ) ?></strong></td>
                          <td class="text-right"><strong><%=configuration.formatCurrency(shopping_cart.items[idx]['total'])%></strong></td>
                        </tr>
                      <% } %>
                    </tbody>
                  </table>
                </div>
              <% } %>
            </div>
            <div class="card-footer">
                <% if (configuration.activityReservationMultipleItems) { %>
                  <button class="btn btn-danger btn-delete-shopping-cart-item pull-right"
                         data-item-id="<%=shopping_cart.items[idx].item_id%>"
                         data-date="<%=shopping_cart.items[idx].date%>"
                         data-time="<%=shopping_cart.items[idx].time%>"><?php echo _x( 'Remove', 'activity_shopping_cart_item', 'mybooking-wp-plugin' ) ?></button>
                <% } %>
            </div>              
          </div>
       <% } %>

    </script>


    <!-- Script reservation form -->

    <script type="text/tmpl" id="script_reservation_form">

        <input type="hidden" name="customer_language" value="<%=language%>"/>
    
        <!-- Reservation complete -->

        <div class="form-group">
          <label for="customer_name"><?php echo _x( 'Name', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>*</label>
          <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="<?php echo _x( 'Name', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>:*">
        </div>

        <div class="form-group">  
          <label for="customer_surname"><?php echo _x( 'Surname', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>*</label>
          <input type="text" class="form-control" name="customer_surname" id="customer_surname" placeholder="<?php echo _x( 'Surname', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>:*">
        </div>

        <div class="form-group">
            <label for="customer_email"><?php echo _x( 'E-mail', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>*</label>
            <input type="text" class="form-control" name="customer_email" id="customer_email" placeholder="<?php echo _x( 'E-mail', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>:*">
        </div>
        <div class="form-group">  
          <label for="customer_email"><?php echo _x( 'Confirm E-mail', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>*</label>
          <input type="text" class="form-control" name="confirm_customer_email" id="confirm_customer_email" placeholder="<?php echo _x( 'Confirm E-mail', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>:*">
        </div>

        <div class="form-group">
            <label for="customer_phone"><?php echo _x( 'Phone number', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>*</label>
            <input type="text" class="form-control" name="customer_phone" id="customer_phone" placeholder="<?php echo _x( 'Phone number', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>:*">
        </div>

        <div class="form-group">
          <label for="comments"><?php echo _x( 'Comments', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?></label>
          <textarea class="form-control" name="comments" id="comments" placeholder="<?php echo _x( 'Comments', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>"></textarea>
        </div>   
      
    </script>

    <!-- Script payment -->

    <script type="text/tmpl" id="script_payment_detail">

      <% if (shopping_cart.use_rates) { %>
        <div class="jumbotron mb-3">
          <h2 class="h5"><?php echo _x( 'Total', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?> <span class="pull-right"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span></h2>
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
                <input type="radio" name="complete_action" value="request_reservation" class="complete_action">&nbsp;<?php echo _x( 'Request reservation', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
               </label>
             </div>
           <% } %>
           <% if (canPay) { %>
           <div class="form-group col-md-12">
             <label>
              <input type="radio" name="complete_action" value="pay_now" class="complete_action">&nbsp;<?php echo _x( 'Pay now', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
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
                    <?php echo _x( 'I have read and hereby accept the terms and conditions', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
                  <?php } else { ?>
                    <?php printf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">terms and conditions</a>', 'activity_shopping_cart', 'mybooking-wp-plugin' ), $args['terms_and_conditions'] ) ?> 
                  <?php } ?>  
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success w-100"><?php echo _x( 'Request reservation', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?></button>
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
                          <input type="radio" id="payments_paypal_standard" name="payment_method_select" class="payment_method_select" value="paypal_standard">&nbsp;<?php echo _x( 'Paypal', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
                          <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-paypal.jpg"/>
                         </label>
                       </div>
                       <div class="form-group col-md-12">
                         <label for="payments_credit_card">
                          <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=shopping_cart.payment_methods.tpv_virtual%>">&nbsp;<?php echo _x( 'Credit or debit card', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
                          <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-visa.jpg"/>
                          <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-mastercard.jpg"/>
                         </label>
                       </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                <% } else if (shopping_cart.payment_methods.paypal_standard) { %>
                    <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-paypal.jpg"/>
                    <input type="hidden" id="payment_method_value" value="paypal_standard">
                <% } else if (shopping_cart.payment_methods.tpv_virtual) { %>
                    <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-mastercard.jpg"/>
                    <img src="<?php echo plugin_dir_url(__DIR__) ?>/assets/images/pm-visa.jpg"/>
                    <input type="hidden" id="payment_method_value" value="<%=shopping_cart.payment_methods.tpv_virtual%>">
                <% } %>

                <hr>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="payments_paypal_standard">
                      <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;
                      <?php if ( empty($args['terms_and_conditions']) ) { ?>
                        <?php echo _x( 'I have read and hereby accept the terms and conditions', 'activity_shopping_cart', 'mybooking-wp-plugin' ) ?>
                      <?php } else { ?>
                        <?php printf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">terms and conditions</a>', 'activity_shopping_cart', 'mybooking-wp-plugin' ), $args['terms_and_conditions'] ) ?> 
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
