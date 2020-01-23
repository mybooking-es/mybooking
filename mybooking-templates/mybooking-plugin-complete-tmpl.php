<?php
/**
*   PLUGIN COMPLETE TEMPLATE
*   ------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<!-- Product detail -->
<script type="text/tpml" id="script_product_detail">
  <div class="product-detail">
    <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
        <h2 class="product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
        <p class="detail-text"><?php _e('Duración del alquiler', 'mybooking') ?>: <%=shopping_cart.days%> <?php _e('día/s','mybooking'); ?></p>
      <% } %>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></li>
        <li><%=shopping_cart.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></li>
        <li><%=shopping_cart.return_place_customer_translation%></li>
      </ul>
      <button id="modify_reservation_button" class="btn btn-outline-dark my-3" data-toggle="modal" data-target="#choose_productModal"><?php _e('Modificar reserva', 'mybooking') ?></button>
    </div>
    <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
      <img class="img-fluid" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
      <% } %>
    </div>
  </div>
</script>

<!-- Extra representation -->
<script type="text/template" id="script_detailed_extra">
  <div class="extras-container">
  <% for (var idx=0;idx<extras.length;idx++) { %>
    <% var extra = extras[idx]; %>
    <div class="extra-wrapper">
      <div class="extra-image">
        <% if (extra.photo_path != null) { %>
          <img src="<%=extra.photo_path%>" class="card-img" />
        <% } %>
      </div>
      <div class="extra-content">
          <h6 class="lead"><%=extra.name%></h6>
              <% if (extra.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:90px;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary btn-minus-extra"
                        data-value="<%=extra.code%>"
                        data-max-quantity="<%=extra.max_quantity%>">-</button>
                    </div>
                    <% value = (extrasInShoppingCart[extra.code]) ? extrasInShoppingCart[extra.code] : 0; %>
                    <input type="text" id="extra-<%=extra.code%>-quantity"
                        class="form-control disabled text-center extra-input" value="<%=value%>" data-extra-code="<%=extra.code%>"/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-plus-extra"
                        data-value="<%=extra.code%>"
                        data-max-quantity="<%=extra.max_quantity%>">+</button>
                      </div>
                </div>
              <% } else { %>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input extra-checkbox" id="checkboxl<%=extra.code%>" data-value="<%=extra.code%>" <% if (extrasInShoppingCart[extra.code] &&  extrasInShoppingCart[extra.code] > 0) { %> checked="checked" <% } %>>
                  <label class="custom-control-label" for="checkboxl<%=extra.code%>"></label>
                </div>
              <% } %>
              <p class="fw-700 mt-2"><%= configuration.formatCurrency(extra.unit_price)%></p>
      </div>
    </div>
  <% } %>
  </div>
</script>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
    <h4 class="brand-primary my-3"><?php _e('Resumen de la reserva', 'mybooking') ?></h4>
    <div class="reservation-detail-container">
      <div class="reservation-detail-image-container">
        <div class="reservation-detail-image-wrapper">
          <img class="img-fluid" src="<%= shopping_cart.items[0].photo_medium%>">
        </div>
      </div>
      <div class="reservation-detail-content">
        <ul class="list-group">

          <!-- Product -->

          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="extra-name"><?php _e('Total producto','mybooking') ?></span>
            <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.item_cost)%></span>
          </li>

          <!-- Extras -->

          <% if (shopping_cart.extras.length > 0) { %>
            <% for (var idx=0; idx<shopping_cart.extras.length; idx++) { %>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="extra-name"><%=shopping_cart.extras[idx].extra_description_customer_translation%></span>
                <span class="badge badge-primary badge-pill"><%=shopping_cart.extras[idx].quantity%></span>
                <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
              </li>
            <% } %>
          <% } %>

          <!-- Supplements -->

          <% if (shopping_cart.time_from_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento hora de entrega', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></span>
            </li>
          <% } %>

          <% if (shopping_cart.pickup_place_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento lugar de entrega', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></span>
            </li>
          <% } %>

          <% if (shopping_cart.time_to_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento hora de devolución', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></span>
            </li>
          <% } %>

          <% if (shopping_cart.return_place_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento lugar de devolución', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></span>
            </li>
          <% } %>

          <% if (shopping_cart.driver_age_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento edad del conductor', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></span>
            </li>
          <% } %>

          <% if (shopping_cart.category_supplement_1_cost > 0) { %>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="extra-name"><?php _e('Suplemento combustible', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></span>
            </li>
          <% } %>

          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="extra-name fw-700"><?php _e('Importe total', 'mybooking') ?></span>
            <span class="extra-price fw-600"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span>
          </li>
        </ul>
      </div>
    </div>

    <! -- TOTAL -->
    <hr>
    <p class="total-price text-right mr-3"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
    <input type="hidden" name="payment" value="none">

    <%
       var paymentAmount = 0;
       var selectionOptions = 0;

       if (sales_process.can_request) {
         selectionOptions += 1;
       }

       if (sales_process.can_pay_on_delivery) {
         selectionOptions += 1;
       }

       if (sales_process.can_pay) {
         selectionOptions += 1;
         if (sales_process.can_pay_deposit) {
            paymentAmount = shopping_cart.booking_amount;
         }
         else {
            paymentAmount = shopping_cart.total_cost;
         }
       }
    %>

    <% if (selectionOptions > 1) { %>
      <hr>
      <div class="form-row">
         <% if (sales_process.can_request) { %>
           <div class="form-group col-md-12">
             <label for="payments_paypal_standard">
              <input type="radio" name="complete_action" value="request_reservation" class="complete_action">&nbsp;<?php _e('Solicitud de reserva','mybooking') ?>
             </label>
           </div>
         <% } %>
         <% if (sales_process.can_pay_on_delivery) { %>
           <div class="form-group col-md-12">
             <label for="payments_paypal_standard">
              <input type="radio" name="complete_action" value="pay_on_delivery" class="complete_action">&nbsp;<?php _e('Pagar en destino','mybooking'); ?>
             </label>
           </div>
         <% } %>
         <% if (sales_process.can_pay) { %>
         <div class="form-group col-md-12">
           <label for="payments_paypal_standard">
            <input type="radio" name="complete_action" value="pay_now" class="complete_action">&nbsp;<?php _e('Pagar ahora','mybooking') ?>
           </label>
         </div>
         <% } %>
      </div>
    <% } %>

    <!-- Request reservation -->

    <% if (sales_process.can_request) { %>
    <div id="request_reservation_container" <% if (selectionOptions > 1 || !sales_process.can_request) { %>style="display:none"<%}%>>

        <div class="border p-4">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="payments_paypal_standard">
                <input type="checkbox" id="conditions_read_request_reservation" name="conditions_read_request_reservation">&nbsp;<?php _e('Acepto los términos y condiciones y la política de privacidad','mybooking') ?>
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-outline-dark"><?php _e('Solicitud de reserva','mybooking') ?></button>
            </div>
          </div>
        </div>

    </div>
    <% } %>

    <% if (sales_process.can_pay) { %>

        <% if (sales_process.can_pay_on_delivery) { %>
        <!-- Pay on delivery -->
        <div id="payment_on_delivery_container" <% if (selectionOptions > 1 || !sales_process.can_pay_on_delivery) { %>style="display:none"<%}%>>

            <div class="border p-4">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="payments_paypal_standard">
                      <input type="checkbox" id="conditions_read_payment_on_delivery" name="conditions_read_payment_on_delivery">&nbsp;<?php _e('Acepto los términos y condiciones y la política de privacidad','mybooking') ?>
                    </label>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-outline-dark"><?php _e('Confirmar', 'mybooking') ?></button>
                  </div>
                </div>
            </div>

        </div>
        <% } %>

        <!-- Pay now -->

        <div id="payment_now_container" <% if (selectionOptions > 1 || !sales_process.can_pay) { %>style="display:none"<%}%>>

            <div class="border p-4">
                <h4><%=i18next.t('complete.reservationForm.total_payment', {amount: configuration.formatCurrency(paymentAmount)})%></h4>
                <br>

                <!-- Payment amount -->

                <div class="alert alert-info">
                   <p><%=i18next.t('complete.reservationForm.booking_amount',{amount: configuration.formatCurrency(paymentAmount)})%></p>
                </div>

                <% if (sales_process.payment_methods.paypal_standard &&
                       sales_process.payment_methods.tpv_virtual) { %>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                         <label for="payments_paypal_standard">
                          <input type="radio" id="payments_paypal_standard" name="payment_method_select" class="payment_method_select" value="paypal_standard">&nbsp;Paypal
                          <img src="/assets/images/pm-paypal.jpg"/>
                         </label>
                       </div>
                       <div class="form-group col-md-12">
                         <label for="payments_credit_card">
                          <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php _e('Tarjeta de crédito/débito','mybooking') ?>
                          <img src="/assets/images/pm-visa.jpg"/>
                          <img src="/assets/images/pm-mastercard.jpg"/>
                         </label>
                       </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                <% } else if (sales_process.payment_methods.paypal_standard) { %>
                    <img src="/assets/images/pm-paypal.jpg"/>
                    <input type="hidden" id="payment_method_value" value="paypal_standard">
                <% } else if (sales_process.payment_methods.tpv_virtual) { %>
                    <img src="/assets/images/pm-mastercard.jpg"/>
                    <img src="/assets/images/pm-visa.jpg"/>
                    <input type="hidden" id="payment_method_value" value="<%=sales_process.payment_methods.tpv_virtual%>">
                <% } %>

                <hr>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="payments_paypal_standard">
                      <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;<?php _e('Acepto los términos y condiciones y la política de privacidad','mybooking') ?>
                    </label>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-outline-dark"><%=i18next.t('complete.reservationForm.payment_button',{amount: configuration.formatCurrency(paymentAmount)})%></a>
                  </div>
                </div>
            </div>

        </div>
    <% } %>
</script>
