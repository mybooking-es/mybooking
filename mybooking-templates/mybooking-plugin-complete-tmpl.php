<?php
/**
*   PLUGIN COMPLETE TEMPLATE
*   ------------------------
*
* 	@version 0.0.2
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
    <div class="process-section-box">
      <h4 class="brand-primary my-3"><?php echo _x( 'Coverage', 'renting_complete', 'mybooking') ?></h4>
      <div class="extras-container">
        <% for (var idx=0;idx<coverages.length;idx++) { %>
          <% var coverage = coverages[idx]; %>
          <div class="extra-wrapper">
            <div class="extras-left">
              <div class="extra-title">
                <% if (coverage.photo_path != null) { %>
                <img src="<%=coverage.photo_path%>" class="card-img js-extra-info-btn"
                  data-extra="<%=coverage.code%>" />
                <% } %>
                <h6 class="lead"><%=coverage.name%></h6>
              </div>
              <div class="extras-text"><%=coverage.description%></div>
            </div>
            <div class="extras-right">
              <p class="extras-price"><%= configuration.formatCurrency(coverage.unit_price)%></p>
              <% if (coverage.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:100px;">
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
            </div>
          </div>
        <% } %>
      </div>
    </div>
  <% } %>
  <% if (extras && extras.length > 0) { %>
    <div class="process-section-box">
      <h4 class="brand-primary my-3"><?php echo _x( 'Extras', 'renting_complete', 'mybooking') ?></h4>
      <div class="extras-container">
        <% for (var idx=0;idx<extras.length;idx++) { %>
          <% var extra = extras[idx]; %>
          <div class="extra-wrapper">
            <div class="extras-left">
              <div class="extra-title">
                <% if (extra.photo_path != null) { %>
                  <img src="<%=extra.photo_path%>" class="card-img js-extra-info-btn" data-extra="<%=extra.code%>" />
                <% } %>
                <h6 class="lead"><%=extra.name%></h6>
              </div>
              <div class="extras-text"><%=extra.description%></div>
            </div>
            <div class="extras-right">
            <p class="extras-price"><%= configuration.formatCurrency(extra.unit_price)%></p>
              <% if (extra.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:100px;">
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

<!-- Sticky bar complete -->
<script type="text/tmpl" id="script_reservation_summary_sticky">
  <div class="reservation-summary-sticky-wrapper">
    <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>
    <div class="reservation-summary-sticky complete-sticky">
      <div class="sandwitch-wrapper">
          <% if (configuration.pickupReturnPlace) { %>
          <div class="reservation-summary_pickup_place">
            <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
          </div>
          <% } else { %>
          <div class="ml-1"></div>
          }
          <% } %>
        <div class="reservation-summary_pickup_date">
          <span><%=shopping_cart.date_from_short_format%>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></span>
        </div>
      </div>
      <div class="separator"></div>
      <div class="sandwitch-wrapper push-to-the-right">
        <div class="reservation-summary_return_place">
          <span class="overflow-ellipsis">
            <%=shopping_cart.return_place_customer_translation%>
          </span>
        </div>
        <div class="reservation-summary_return_date">
          <span><%=shopping_cart.date_to_short_format%>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
        </div>
      </div>
        <!-- Row for price & buttons  -->
        <div class="complete-summary-row">
          <div class="complete-summary-price-wrapper">
            <div class="complete-summary-total-title">
              <?php echo _x( "Total", 'renting_complete', 'mybooking' ) ?></div>
            <div class="complete-summary-total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </div>
          </div>
          <div class="complete-buttons-wrapper">
            <button id="modify_reservation_button" data-toggle="modal" data-target="#modify_reservation_modal"
              class="complete-button"><i class="fas fa-pen mr-2"></i>
              <?php echo _x( 'Edit', 'renting_complete', 'mybooking' ) ?>
            </button>
            <button data-toggle="modal" data-target="#viewReservationModal" class="complete-button">
              <i class="fas fa-info-circle mr-2"></i><?php echo _x( 'Info', 'renting_complete', 'mybooking' ) ?>
            </button>
          </div>
        </div>
      </div>
    </div>

    <% } else { %>

    <div class="reservation-summary-sticky">
      <% if (configuration.pickupReturnPlace) { %>
        <div class="reservation-summary_pickup_place">
          <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
        </div>
      <% } %>
      <div class="reservation-summary_pickup_date">
        <span><%=shopping_cart.date_from_short_format%>
          <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></span>
      </div>
      <div class="separator"></div>
      <div class="reservation-summary_return_place d-none d-md-flex">
        <span class="overflow-ellipsis">
          <%=shopping_cart.return_place_customer_translation%>
        </span>
      </div>
      <div class="reservation-summary_return_date">
        <span><%=shopping_cart.date_to_short_format%>
          <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
      </div>
        <!-- Row for price & buttons -->
        <div class="complete-summary-row">
          <div class="complete-summary-price-wrapper">
            <div class="complete-summary-total-title">
              <?php echo _x( "Total", 'renting_complete', 'mybooking' ) ?></div>
            <div class="complete-summary-total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </div>
          </div>

          <div class="complete-buttons-wrapper">
            <button id="modify_reservation_button" data-toggle="modal" data-target="#modify_reservation_modal"
              class="complete-button"><?php echo _x( 'Edit', 'renting_complete', 'mybooking' ) ?>
            </button>
            <button data-toggle="modal" data-target="#viewReservationModal" class="complete-button">
              <i class="fas fa-info-circle mr-2"></i><?php echo _x('Info', 'renting_complete', 'mybooking') ?>
            </button>
          </div>
        </div>
    </div>

    <% } %>
  </div>
</script>
<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="product-detail-bg-color">
      <% if (configuration.multipleProductsSelection) { %>
        <div class="product-detail-container-several-products">
            <div>
              <h5 class=""><?php echo _x('Delivery', 'renting_complete', 'mybooking') ?></h5>
              <ul>
                <li><%=shopping_cart.date_from_full_format%>
                  <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></li>
                <li><%=shopping_cart.pickup_place_customer_translation%></li>
              </ul>
            </div>  
            <div>
              <h5 class=""><?php echo _x('Collection', 'renting_complete', 'mybooking') ?></h5>
              <ul>
                <li><%=shopping_cart.date_to_full_format%>
                  <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></li>
                <li><%=shopping_cart.return_place_customer_translation%></li>
              </ul>
            </div>  
        <div class="table-responsive mt-5">
          <table class="table product-detail-table table-borderless">
              <thead>
                <tr class="bg-gray-100">
                  <th></th>
                  <th scope="col">
                    <?php echo _x( 'Product', 'renting_complete', 'mybooking' ) ?></th>
                  <th scope="col" class="text-right">
                    <?php echo _x( 'Price', 'renting_complete', 'mybooking' ) ?></th>
                  <th scope="col" class="text-right">
                    <?php echo _x( 'Quantity', 'renting_complete', 'mybooking' ) ?></th>
                  <th scope="col" class="text-right">
                    <?php echo _x( 'Total', 'renting_complete', 'mybooking' ) ?></th>
                </tr>
              </thead>
              <tbody>
                <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
                  <tr>
                    <td class="text-center text-md-left"><img class="img-fluid" style="max-width: 120px"
                        src="<%=shopping_cart.items[idx].photo_medium%>" alt="">
                    </td>
                    <td data-label="<?php echo _x( 'Product', 'renting_complete', 'mybooking' ) ?>" 
                      class="align-middle">
                      <%=shopping_cart.items[idx].item_description_customer_translation%>
                    </td>
                    <td data-label="<?php echo _x( 'Price', 'renting_complete', 'mybooking' ) ?>"
                      class="align-middle text-right">
                      <%=configuration.formatCurrency(shopping_cart.items[idx].item_unit_cost)%>
                    </td>
                    <td data-label="<?php echo _x( 'Quantity', 'renting_complete', 'mybooking' ) ?>"
                      class="align-middle text-right"><%=shopping_cart.items[idx].quantity%>
                    </td>
                    <td data-label="<?php echo _x( 'Total', 'renting_complete', 'mybooking' ) ?>"
                      class="align-middle text-right">
                      <%=configuration.formatCurrency(shopping_cart.items[idx].item_cost)%>
                    </td>
                  </tr>
                <% } %>  
              </tbody>
          </table>
        </div>
        </div>
      <% } else { %>  
        <div class="product-detail-container">
          <div class="product-detail-content">
            <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
                <h2 class="product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
                <h5 class="mt-3"><?php echo _x('Delivery', 'renting_complete', 'mybooking') ?></h5>
                <ul>
                  <li><%=shopping_cart.date_from_full_format%>
                    <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></li>
                  <li><%=shopping_cart.pickup_place_customer_translation%></li>
                </ul>
                <h5 class="mt-3"><?php echo _x('Collection', 'renting_complete', 'mybooking') ?></h5>
                <ul>
                  <li><%=shopping_cart.date_to_full_format%>
                    <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></li>
                  <li><%=shopping_cart.return_place_customer_translation%></li>
                </ul>
                <% if (shopping_cart.days > 0) { %>
                <p class="detail-text mt-3"><?php echo _x( 'Rental duration', 'renting_complete', 'mybooking' ) ?>: <span><%=shopping_cart.days%>
                    <?php echo _x( 'day(s)', 'renting_complete', 'mybooking' ) ?>
                    </span></p>
                <% } else if (shopping_cart.hours > 0) { %>
                <p class="detail-text"><?php echo _x( 'Rental duration', 'renting_complete', 'mybooking' ) ?>: <span><%=shopping_cart.hours%>
                    <?php echo _x( 'hour(s)', 'renting_complete', 'mybooking' ) ?></span></p>
                <% } %>
            <% } %>
          </div>  
        <div class="product-detail-image">
          <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <img class="img-fluid" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
          <% } %>
        </div>
      </div>    
      <% } %>
  </div>  

  <div class="modal fade" id="viewReservationModal" tabindex="-1" role="dialog"
    aria-labelledby="viewModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModal"><?php echo _x( 'Reservation summary', 'renting_complete', 'mybooking') ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_complete', 'mybooking' ); ?>">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body summary-modal">
        <div class="product-summary-wrapper">
          <div class="product-summary">
            <div class="product-summary_separator">
              <i class="fa fa-long-arrow-right mr-3"></i>
            </div>
            <%=shopping_cart.date_from_full_format%>
            <% if (configuration.timeToFrom) { %>
            <%=shopping_cart.time_from%>
            <% } %>
            <!-- <%=shopping_cart.pickup_place_customer_translation%> -->
          </div>
          <div class="product-summary">
            <div class="product-summary_separator">
              <i class="fa fa-long-arrow-left mr-3"></i>
            </div>
            <%=shopping_cart.date_to_full_format%>
            <% if (configuration.timeToFrom) { %>
            <%=shopping_cart.time_to%>
            <% } %>
            <!-- <%=shopping_cart.return_place_customer_translation%> -->
          </div>
        </div>
        <!-- Duración del alquiler -->
        <div class="rent-duration p-3">
          <p class="mb-0">
            <% if (shopping_cart.days > 0) { %>
            <?php echo _x( 'Rental duration', 'renting_complete', 'mybooking' ) ?>:
            <%=shopping_cart.days%>
            <?php echo _x( 'day(s)', 'renting_complete', 'mybooking' ) ?></p>
          <% } else if (shopping_cart.hours > 0) { %>
          <?php echo _x( 'Rental duration', 'renting_complete', 'mybooking' ) ?>:
          <%=shopping_cart.hours%>
          <?php echo _x('hour(s)', 'renting_complete', 'mybooking') ?></p>
          <% } %>
        </div>      
          <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <div class="product-view">
            <div class="product-view_image d-none d-sm-block">
              <img class="img-fluid" src="<%= shopping_cart.items[idx].photo_medium%>">
            </div>
            <div class="product-view_text">
              <p class="fw-700"><%=shopping_cart.items[idx].item_description_customer_translation%></p>
            </div>
            <!-- Quantity -->
            <% if (configuration.multipleProductsSelection) { %>
            <span class="badge badge-info"><%=shopping_cart.items[idx].quantity%></span>
            <% } %>
            <!-- Price -->
            <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.items[idx].item_cost)%></span>
          </div>
          <% } %>
          <ul class="list-group  summary-modal_list">
            <!-- Products -->
            <% for (var idx=0;idx<shopping_cart.items.length;idx++) { %>
              <!-- Offer/Promotion Code Appliance -->
              <% if (shopping_cart.items[idx].item_unit_cost_base != shopping_cart.items[idx].item_unit_cost) { %>
                <li class="list-group-item">
                  <span class="extra-name">&nbsp;</span>
                  <span class="extra-price">
                    <!-- Offer -->
                    <% if (typeof shopping_cart.items[idx].offer_name !== 'undefined' &&
                          shopping_cart.items[idx].offer_name !== null && shopping_cart.items[idx].offer_name !== '') { %>
                      <span class="badge badge-info"><%=shopping_cart.items[idx].offer_name%></span>
                      <% if (shopping_cart.items[idx].offer_discount_type === 'percentage' && shopping_cart.items[idx].offer_value !== '') {%>
                        <span class="text-danger"><%=parseInt(shopping_cart.items[idx].offer_value)%>&#37;</span>
                      <% } %>
                    <% } %>
                    <!-- Promotion Code -->
                    <% if (typeof shopping_cart.promotion_code !== 'undefined' && shopping_cart.promotion_code !== '' &&
                          typeof shopping_cart.items[idx].promotion_code_value !== 'undefined' && shopping_cart.items.promotion_code_value !== '' &&
                          shopping_cart.items[idx].promotion_code_value !== '0.0') { %>
                      <span class="badge badge-success"><%=shopping_cart.promotion_code%></span>
                      <% if (shopping_cart.items[idx].promotion_code_discount_type === 'percentage' && shopping_cart.items[idx].promotion_code !== '') {%>
                        <span class="text-danger"><%=parseInt(shopping_cart.items[idx].promotion_code_value)%>&#37;</span>
                      <% } %>
                    <% } %>
                    <span class="text-muted">
                      <del><%=configuration.formatCurrency(shopping_cart.items[idx].item_unit_cost_base * shopping_cart.items[idx].quantity)%></del>
                    </span>
                  </span>
                </li>
              <% } %>
            <% } %>
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
              <span
                class="extra-name"><?php echo _x( 'Pick-up time supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.pickup_place_cost > 0) { %>
            <li class="list-group-item">
              <span
                class="extra-name"><?php echo _x( 'Pick-up place supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.time_to_cost > 0) { %>
            <li class="list-group-item">
              <span
                class="extra-name"><?php echo _x( 'Return time supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.return_place_cost > 0) { %>
            <li class="list-group-item">
              <span
                class="extra-name"><?php echo _x( 'Return place supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.driver_age_cost > 0) { %>
            <li class="list-group-item">
              <span
                class="extra-name"><?php echo _x( "Driver's age supplement", 'renting_complete', 'mybooking' ) ?></span>
              <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.category_supplement_1_cost > 0) { %>
            <li class="list-group-item">
              <span
                class="extra-name"><?php echo _x( "Petrol supplement", 'renting_complete', 'mybooking' ) ?></span>
              <span
                class="extra-price"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></span>
            </li>
            <% } %>
          </ul>
        </div>
        <div class="modal-footer summary-modal_footer">
          <! -- TOTAL -->
            <span
              class="extra-name fw-700"><?php echo _x( "Total", 'renting_complete', 'mybooking' ) ?></span>
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
            <input type="radio" name="complete_action" value="request_reservation" class="complete_action">&nbsp;
            <?php echo _x( 'Request reservation', 'renting_complete', 'mybooking' ) ?>
            </label>
          </div>
        <% } %>
        <% if (sales_process.can_pay_on_delivery) { %>
          <div class="form-group col-md-12">
            <label for="payments_paypal_standard">
            <input type="radio" name="complete_action" value="pay_on_delivery" class="complete_action">&nbsp;
            <?php echo _x( 'Pay on arrival', 'renting_complete', 'mybooking' ) ?>
            </label>
          </div>
        <% } %>
        <% if (sales_process.can_pay) { %>
        <div class="form-group col-md-12">
          <label for="payments_paypal_standard">
          <input type="radio" name="complete_action" value="pay_now" class="complete_action">&nbsp;
          <?php echo _x( 'Pay now', 'renting_complete', 'mybooking' ) ?>
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
                  <input type="checkbox" id="conditions_read_request_reservation" name="conditions_read_request_reservation">&nbsp;
                  <?php if ( empty($args['terms_and_conditions']) ) { ?>
                    <?php echo _x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                  <?php } else { ?>
                    <?php printf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ?>
                  <?php } ?>
                </label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-outline-dark">
                  <?php echo _x( 'Request reservation', 'renting_complete', 'mybooking' ) ?>
                </button>
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
                        <input type="checkbox" id="conditions_read_payment_on_delivery" name="conditions_read_payment_on_delivery">&nbsp;
                        <?php if ( empty($args['terms_and_conditions']) ) { ?>
                          <?php echo _x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                        <?php } else { ?>
                          <?php printf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ?>
                        <?php } ?>
                      </label>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-outline-dark"><?php echo _x( 'Confirm', 'renting_complete', 'mybooking' ) ?></button>
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
                        <input type="radio" id="payments_credit_card" name="payment_method_select"
                          class="payment_method_select"
                          value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo _x( 'Credit or debit card', 'renting_complete', 'mybooking' ) ?>
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
                      <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;
                      <?php if ( empty($args['terms_and_conditions']) ) { ?>
                        <?php echo _x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                      <?php } else { ?>
                        <?php printf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ?>
                      <?php } ?>
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