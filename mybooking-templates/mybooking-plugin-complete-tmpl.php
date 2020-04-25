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
</script>

<!-- Extra representation -->
<script type="text/tmpl" id="script_detailed_extra">
  <% if (coverages && coverages.length > 0) { %>
    <div class="bg-white shadow-bottom p-3 mt-5">
      <h4 class="brand-primary my-3"><?php _e('Coberturas', 'mybooking') ?></h4>
      <div class="extras-container">
        <% for (var idx=0;idx<coverages.length;idx++) { %>
          <% var coverage = coverages[idx]; %>
          <div class="extra-wrapper">
            <div class="extra-image">
              <% if (coverage.photo_path != null) { %>
                <img src="<%=coverage.photo_path%>" class="card-img js-extra-info-btn" data-extra="<%=coverage.code%>"/>
              <% } %>
            </div>
            <div class="extra-content">
                <h6 class="lead"><%=coverage.name%></h6>
                    <% if (coverage.max_quantity > 1) { %>
                      <div class="input-group input-group-sm" style="width:90px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary btn-minus-extra"
                              data-value="<%=coverage.code%>"
                              data-max-quantity="<%=coverage.max_quantity%>">-</button>
                          </div>
                          <% value = (extrasInShoppingCart[coverage.code]) ? extrasInShoppingCart[coverage.code] : 0; %>
                          <input type="text" id="extra-<%=coverage.code%>-quantity"
                              class="form-control disabled text-center extra-input" value="<%=value%>" data-extra-code="<%=coverage.code%>"/>
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary btn-plus-extra"
                              data-value="<%=coverage.code%>"
                              data-max-quantity="<%=coverage.max_quantity%>">+</button>
                            </div>
                      </div>
                    <% } else { %>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input extra-checkbox" id="checkboxl<%=coverage.code%>" data-value="<%=coverage.code%>" <% if (extrasInShoppingCart[coverage.code] &&  extrasInShoppingCart[coverage.code] > 0) { %> checked="checked" <% } %>>
                        <label class="custom-control-label" for="checkboxl<%=coverage.code%>"></label>
                      </div>
                    <% } %>
                    <p class="fw-700 mt-2"><%= configuration.formatCurrency(coverage.unit_price)%></p>
            </div>
          </div>
        <% } %>
      </div>
    </div>
  <% } %>
  <% if (extras && extras.length > 0) { %>
    <div class="bg-white shadow-bottom p-3 mt-5">
      <h4 class="brand-primary my-3"><?php _e('Extras', 'mybooking') ?></h4>
      <div class="extras-container">
        <% for (var idx=0;idx<extras.length;idx++) { %>
          <% var extra = extras[idx]; %>
          <div class="extra-wrapper">
            <div class="extra-image">
              <% if (extra.photo_path != null) { %>
                <img src="<%=extra.photo_path%>" class="card-img js-extra-info-btn" data-extra="<%=coverage.code%>" />
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
    </div>
  <% } %>
</script>


<!-- Script that shows the extra detail -->
<script type="text/tmpl" id="script_extra_modal">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <% for (var idx=0; idx<extra.photos.length; idx++) { %>
            <div class="carousel-item <% if (idx==0) {%>active<%}%>">
              <img class="d-block w-100" src="<%=extra.photos[idx].full_photo_path%>" alt="<%=extra.name%>">
            </div>
            <% } %>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">&lt;</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">&gt;</span>
          </a>
        </div>
        <div class="mt-3 text-muted"><%=extra.description%></div>
      </div>
    </div>
  </div>

</script>

<!-- Reservation summary modal -->
<script type="text/tmpl" id="script_reservation_summary_sticky">
  <div class="complete-summary-sticky-wrapper">
      <div class="complete-summary-sticky">
        <div class="complete-summary-left">
          <div class="complete-summary-item">
              <!-- primer bloque Recogida -->
              <p class="color-gray-400"><%=shopping_cart.pickup_place_customer_translation%></p>
              <% if (shopping_cart.days > 0) { %>              
              <p class="color-white"><%=shopping_cart.days%> <?php _e('día/s', 'mybooking') ?></p>
              <% } else if (shopping_cart.hours > 0) { %>
              <p class="color-white"><%=shopping_cart.hours%> <?php _e('hora/s', 'mybooking') ?></p> 
              <% } %>
          </div>
          <!-- Button trigger modal -->
          <div class="modify-button">
            <button id="modify_reservation_button" data-toggle="modal" data-target="#modify_reservation_modal"><i class="fa fa-edit"></i></button>
          </div>
        </div>
        <div class="complete-summary-right">
          <div class="complete-summary-item">
              <p class="color-gray-500">Total</p>
              <p class="complete-summary-item_price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>
          </div>
          <!-- Button trigger modal -->
          <div class="modify-button">
            <button data-toggle="modal" data-target="#viewReservationModal">
              <i class="fa fa-info-circle"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
</script>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">

  <!-- Descktop reservation detail -->
  <div class="product-detail-container d-none d-md-flex">
    <div class="product-detail-content">
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
        <h2 class="product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
        <% if (shopping_cart.days > 0) { %>
        <p class="detail-text"><?php _e('Duración del alquiler','mybooking') ?>: <span><%=shopping_cart.days%> <?php _e('día/s','mybooking') ?></span></p>
        <% } else if (shopping_cart.hours > 0) { %>
        <p class="detail-text"><?php _e('Duración del alquiler','mybooking') ?>: <span><%=shopping_cart.hours%> <?php _e('hora/s','mybooking') ?></span></p>
        <% } %>
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
    </div>
    <div class="product-detail-image">
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
      <img class="img-fluid" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
      <% } %>
    </div>
  </div>

  <div class="modal fade" id="viewReservationModal" tabindex="-1" role="dialog" aria-labelledby="viewModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModal"><?php _e('Detalle de la reserva', 'mybooking') ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body summary-modal">
          <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <div class="product-view">
            <div class="product-view_image">
              <img class="img-fluid" src="<%= shopping_cart.items[0].photo_medium%>">
            </div>
            <div class="product-view_text">
              <p class="fw-700"><%=shopping_cart.items[idx].item_description_customer_translation%></p>
              <% if (shopping_cart.days > 0) { %>
              <p class="color-gray-500"><?php _e('Duración del alquiler', 'mybooking') ?>: <%=shopping_cart.days%>
                <?php _e('día/s', 'mybooking') ?></p>
              <% } else if (shopping_cart.hours > 0) { %>
              <p class="color-gray-500"><?php _e('Duración del alquiler', 'mybooking') ?>: <%=shopping_cart.hours%>
                <?php _e('horas/s', 'mybooking') ?></p>  
              <% } %>  
            </div>
          </div>
          <div class="product-summary-wrapper">
            <div class="product-summary">
              <ul>
                <li><%=shopping_cart.date_from_full_format%> /
                  <%=shopping_cart.time_from%></li>
                <li><%=shopping_cart.pickup_place_customer_translation%></li>
              </ul>
            </div>
            <div class="product-summary_separator">
              <i class="fa fa-long-arrow-right"></i>
            </div>
            <div class="product-summary">
              <ul>
                <li><%=shopping_cart.date_to_full_format%> /
                  <%=shopping_cart.time_to%></li>
                <li><%=shopping_cart.return_place_customer_translation%></li>
              </ul>
            </div>
          </div>
          <% } %>

          <ul class="list-group p-3 summary-modal_list">
            <!-- Product -->
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Total producto', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.item_cost)%></span>
            </li>
            <!-- Extras -->
            <% if (shopping_cart.extras.length > 0) { %>
            <% for (var idx=0; idx<shopping_cart.extras.length; idx++) { %>
            <li class="list-group-item">
              <span class="extra-name"><%=shopping_cart.extras[idx].extra_description_customer_translation%></span>
              <span class="badge badge-primary badge-pill"><%=shopping_cart.extras[idx].quantity%></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
            </li>
            <% } %>
            <% } %>
            <!-- Supplements -->
            <% if (shopping_cart.time_from_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento hora de entrega', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.pickup_place_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento lugar de entrega', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.time_to_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento hora de devolución', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.return_place_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento lugar de devolución', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.driver_age_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento edad del conductor', 'mybooking') ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.category_supplement_1_cost > 0) { %>
            <li class="list-group-item">
              <span class="extra-name"><?php _e('Suplemento combustible', 'mybooking') ?></span>
              <span
                class="extra-price"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></span>
            </li>
            <% } %>
        </div>
        <div class="modal-footer summary-modal_footer">
          <! -- TOTAL -->
            <span class="extra-name fw-700"><?php _e('Total', 'mybooking') ?></span>
            <span class="fw-900 brand-primary"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span>
        </div>
      </div>
    </div>
  </div>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">

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

    <!-- Payment -->

    <% if (sales_process.can_pay) { %>
      <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
        <!-- The payment method will be selected later -->
        <input type="hidden" name="payment" value="none">
      <% } else if (sales_process.payment_methods.paypal_standard) { %>   
        <!-- Fixed paypal standard -->
        <input type="hidden" name="payment" value="paypal_standard">
      <% } else  if (sales_process.payment_methods.tpv_virtual) { %>
        <!-- Fixed tpv -->
        <input type="hidden" name="payment" value="<%=sales_process.payment_methods.tpv_virtual%>">  
      <% } %>  
    <% } else { %>
      <input type="hidden" name="payment" value="none"> 
    <% } %>   

    <!-- More than one option : request / pay on delivery / pay -->

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
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
                         </label>
                       </div>
                       <div class="form-group col-md-12">
                         <label for="payments_credit_card">
                          <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php _e('Tarjeta de crédito/débito','mybooking') ?>
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg"/>
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg"/>
                         </label>
                       </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                <% } else if (sales_process.payment_methods.paypal_standard) { %>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
                <% } else if (sales_process.payment_methods.tpv_virtual) { %>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg"/>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg"/>
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