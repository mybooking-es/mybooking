<?php
  /**
   * The Template for showing the renting complete step - JS microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-complete-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>

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
            <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
              <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%>
            <% } %>
            </span>
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
            <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <span><%=shopping_cart.renting_duration_literal%>
                  <% if (!shopping_cart.renting_duration_literal) { %>
                    <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                      <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                        - <%= shopping_cart.turn_description %> 
                      <% } else { %>
                        ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                      <% } %>
                    <% } %>
                  <% } %>
              </span>
            <% } else { %>
              <span><%=shopping_cart.date_to_short_format%>
              <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
            <% } %>
          </div>
        </div>
        
        <!-- // Row for price & buttons  -->
        <div class="complete-summary-row">
          <div class="complete-buttons-wrapper">
            <% if (shopping_cart.engine_modify_dates) { %>
              <button class="complete-button" id="modify_reservation_button" data-toggle="modal" data-target="#modify_reservation_modal"><i class="fas fa-pen mr-2"></i>
                <?php echo esc_html_x( 'Edit', 'renting_complete', 'mybooking' ) ?>
              </button>
            <% } %>
          </div>

          <div class="complete-summary-price-wrapper">
            <div class="complete-summary-total-title">
              <?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?></div>
            <div class="complete-summary-total-price">
              <%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </div>
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
          <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%>
          <% } %>
          </span>
        </div>
        <div class="separator"></div>
        <div class="reservation-summary_return_place d-none d-md-flex">
          <span class="overflow-ellipsis">
            <%=shopping_cart.return_place_customer_translation%>
          </span>
        </div>
        <div class="reservation-summary_return_date">
          <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <span><%=shopping_cart.renting_duration_literal%>
                <% if (!shopping_cart.renting_duration_literal) { %>
                  <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                    <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                      - <%= shopping_cart.turn_description %> 
                    <% } else { %>
                      ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                    <% } %>
                  <% } %>
                <% } %>
              </span>
          <% } else { %>
            <span><%=shopping_cart.date_to_short_format%>
            <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
          <% } %>
        </div>
          <!-- // Row for price & buttons -->
          <div class="complete-summary-row">
            <div class="complete-buttons-wrapper">
              <% if (shopping_cart.engine_modify_dates) { %>
                <button class="complete-button" id="modify_reservation_button" data-toggle="modal" data-target="#modify_reservation_modal">
                  <i class="fas fa-pen mr-2"></i><?php echo esc_html_x( 'Edit', 'renting_complete', 'mybooking' ) ?>
                </button>
              <% } %>
            </div>

            <div class="complete-summary-price-wrapper">
              <div class="complete-summary-total-title">
                <?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?>
              </div>
              <div class="complete-summary-total-price">
                <%=configuration.formatCurrency(shopping_cart.total_cost)%>
              </div>
            </div>
          </div>
      </div>
    <% } %>
  </div>
</script>

<!-- Existing customer / New customer -->
<script type="text/template" id="script_complete_complement">
  <div id="reservation_complement_container" class="pt-3">
    <form name="mybooking_select_user_form">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registered_customer" id="mybooking_engine_registered_customer" value="true" checked>
        <label class="form-check-label" for="registered_customer">
          <?php echo esc_html_x( "I'm a registered customer", 'login', 'mybooking') ?>
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registered_customer" id="mybooking_engine_unregistered_customer" value="false">
        <label class="form-check-label" for="unregistered_customer">
          <?php echo esc_html_x( "I'm a new customer", 'login', 'mybooking') ?>
        </label>
      </div>
    </form>
    <hr>
    <form name="mybooking_login_form" class="mybooking_login_form_element" autocomplete="off">
      <div class="form-group">
          <label for="mybooking_login_username"><?php echo esc_html_x( "Username or email", 'login', 'mybooking') ?></label>
          <input type="text" name="username" class="form-control" id="mybooking_login_username" placeholder="<?php echo esc_html_x( "Enter username or email", 'login', 'mybooking') ?>">
      </div>
      <div class="form-group">
          <label for="mybooking_login_password"><?php echo esc_html_x( "Password", 'login', 'mybooking') ?></label>
          <input type="password" name="password" class="form-control" id="mybooking_login_password" placeholder="<?php echo esc_html_x( "Password", 'login', 'mybooking') ?>">
      </div>
      <button type="submit" class="btn btn-primary"><?php echo esc_html_x( "Login", 'login', 'mybooking') ?></button>
    </form>
    <hr class="mybooking_login_form_element">
  </div>
</script>

<script type="text/template" id="script_welcome_customer">
  <div class="alert alert-info">
    <p><%=i18next.t('common.welcomeConnectedUser', {name: user.full_name})%></p>
  </div>
</script>

<script type="text/template" id="script_create_account">

  <div class="form-group mybooking_rent_create_account_selector_container">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="create_customer_account" id="mybooking_engine_rent_create_customer_account" value="true" checked>
        <label class="form-check-label" for="registered_customer">
          <?php echo esc_html_x( "Create account and book a reservation", 'renting_complete_create_account', 'mybooking') ?>
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="create_customer_account" id="mybooking_engine_rent_not_create_customer_account" value="false">
        <label class="form-check-label" for="unregistered_customer">
          <?php echo esc_html_x( "Only book a reservation", 'renting_complete_create_account', 'mybooking') ?>
        </label>
      </div>
  </div>
  <div class="form-group mybooking_rent_create_account_fields_container">
      <div class="form-group">
          <label for="account_password"><?php echo esc_html_x( 'Password', 'renting_complete_create_account', 'mybooking') ?></label>
          <input type="password" class="form-control" name="account_password" id="account_password"  autocomplete="off" placeholder="<?php echo esc_attr_x( 'Password', 'renting_complete_create_account', 'mybooking') ?>:" maxlength="20">
          <small class="form-text text-muted"><?php echo esc_html_x( "Password must contain upper case letter, lower case letter, digit and symbol (@ ! * - _)", 'renting_complete_create_account', 'mybooking') ?></small>
      </div>
  </div>

</script>


<!-- Product detail -->
<script type="text/tpml" id="script_product_detail">
</script>

<!-- Extras & Coverages -->
<script type="text/tmpl" id="script_detailed_extra">

  <!-- Coverages -->

  <% if (coverages && coverages.length > 0) { %>
    <div class="process-section-box">
      <h4 class="brand-primary"><?php echo esc_html_x( 'Coverage', 'renting_complete', 'mybooking') ?></h4>
      <div class="mybooking-complete_extra-container">
        <% for (var idx=0;idx<coverages.length;idx++) { %>
          <% var coverage = coverages[idx]; %>
          <div class="mybooking-complete_extra-item">
            <div class="mybooking-complete_extra-left">
              <div class="mybooking-complete_extra-title">
                <% if (coverage.photo_path != null) { %>
                <img 
                  src="<%=coverage.photo_path%>" 
                  class="card-img js-extra-info-btn"
                  data-extra="<%=coverage.code%>" />
                <% } %>
                <h6 class="lead"><%=coverage.name%></h6>
              </div>
              <div class="mybooking-complete_extra-text"><%=coverage.description%></div>
            </div>
            <div class="mybooking-complete_extra-right">
              <p class="mybooking-complete_extra-price"><%= configuration.formatCurrency(coverage.unit_price)%></p>
              <% if (coverage.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:100px;">
                    <div class="input-group-prepend">
                      <button 
                        class="btn btn-outline-secondary btn-minus-extra"
                        data-value="<%=coverage.code%>"
                        data-max-quantity="<%=coverage.max_sellable_quantity%>">
                          -
                      </button>
                    </div>
                    <% value = (extrasInShoppingCart[coverage.code]) ? extrasInShoppingCart[coverage.code] : 0; %>
                    <input 
                      type="text" 
                      id="extra-<%=coverage.code%>-quantity"
                      class="form-control disabled text-center extra-input" 
                      value="<%=value%>" 
                      data-extra-code="<%=coverage.code%>"/>
                    <div class="input-group-append">
                      <button 
                        class="btn btn-outline-secondary btn-plus-extra"
                        data-value="<%=coverage.code%>"
                        data-max-quantity="<%=coverage.max_sellable_quantity%>">
                          +
                      </button>
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

  <!-- Extras -->

  <% if (extras && extras.length > 0 && extras.filter((theExtra) => theExtra.available).length > 0) { %>
    <div class="process-section-box">
      <h4 class="brand-primary"><?php echo esc_html_x( 'Extras', 'renting_complete', 'mybooking') ?></h4>
      <div class="mybooking-complete_extra-container">
        <% for (var idx=0;idx<extras.length;idx++) { %>
          <% var extra = extras[idx]; %>
          <% if (extra.available) { %>
            <div class="mybooking-complete_extra-item">
              <div class="mybooking-complete_extra-left">
                <div class="mybooking-complete_extra-title">
                  <% if (extra.photo_path != null) { %>
                    <img 
                      src="<%=extra.photo_path%>" 
                      class="card-img js-extra-info-btn" 
                      data-extra="<%=extra.code%>" />
                  <% } %>
                  <h6 class="lead"><%=extra.name%></h6>
                </div>
                <div class="mybooking-complete_extra-text"><%=extra.description%></div>
              </div>
              <div class="mybooking-complete_extra-right">
                <p class="mybooking-complete_extra-price"><%= configuration.formatCurrency(extra.unit_price)%></p>
                <% if (extra.available) { %>
                  <% if (extra.max_quantity > 1) { %>
                    <div class="input-group input-group-sm" style="width:100px;">
                      <div class="input-group-prepend">
                        <button 
                          class="btn btn-outline-secondary btn-minus-extra"
                          data-value="<%=extra.code%>"
                          data-max-quantity="<%=extra.max_sellable_quantity%>">
                            -
                        </button>
                      </div>
                      <% value = (extrasInShoppingCart[extra.code]) ? extrasInShoppingCart[extra.code] : 0; %>
                      <input 
                        type="text" 
                        id="extra-<%=extra.code%>-quantity"
                        class="form-control disabled text-center extra-input" 
                        value="<%=value%>" 
                        data-extra-code="<%=extra.code%>"/>
                      <div class="input-group-append">
                        <button 
                          class="btn btn-outline-secondary btn-plus-extra"
                          data-value="<%=extra.code%>"
                          data-max-quantity="<%=extra.max_sellable_quantity%>">
                            +
                        </button>
                      </div>
                    </div>
                  <% } else { %>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input extra-checkbox" id="checkboxl<%=extra.code%>" data-value="<%=extra.code%>" <% if (extrasInShoppingCart[extra.code] &&  extrasInShoppingCart[extra.code] > 0) { %> checked="checked" <% } %>>
                      <label class="custom-control-label" for="checkboxl<%=extra.code%>"></label>
                    </div>
                  <% } %>
                <% } %>
              </div>
            </div>
          <% } %>
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

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="mybooking-reservation_detail">

    <!-- MULTIPLE PRODUCT DETAILS -->

    <% if (configuration.multipleProductsSelection) { %>
      <div class="mybooking-reservation_detail-container">

        <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <div class="mybooking-reservation_product-item--multi">

            <h2 class="mybooking-reservation_product-name--multi" data-label="<?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?>">
              <%=shopping_cart.items[idx].item_description_customer_translation%>
            </h2>

            <div class="mybooking-reservation_detail-content--multi">
              <img class="mybooking-reservation_product-image--multi" src="<%=shopping_cart.items[idx].photo_medium%>" alt="Product image">
              <span class="mybooking-reservation_detail-info--multi">
                <div class="mybooking-detail_product-item--multi" data-label="<?php echo esc_html_x( 'Price', 'renting_complete', 'mybooking' ) ?>">
                  <span class="mybooking-detail_product-name--multi">
                    <?php echo esc_html_x( 'Price', 'renting_complete', 'mybooking' ) ?>
                  </span>
                  <span class="mybooking-detail_product-price--multi">
                    <%=shopping_cart.items[idx].quantity%>x
                    <%=configuration.formatCurrency(shopping_cart.items[idx].item_unit_cost)%>
                  </span>
                </div>
                <div class="mybooking-detail_product-item--multi" data-label="<?php echo esc_html_x( 'Total', 'renting_complete', 'mybooking' ) ?>">
                  <span class="mybooking-detail_product-name--multi">
                    <?php echo esc_html_x( 'Total', 'renting_complete', 'mybooking' ) ?>
                  </span>
                  <span class="mybooking-detail_product-price--multi">
                    <%=configuration.formatCurrency(shopping_cart.items[idx].item_cost)%>
                  </span>
                </div>

                <div class="mybooking-detail_deposit-item--multi" data-label="<?php echo esc_html_x( 'Deposit', 'renting_complete', 'mybooking' ) ?>">
                  <span class="mybooking-detail_deposit-name">
                    <?php echo esc_html_x( 'Deposit', 'renting_complete', 'mybooking' ) ?>
                  </span>
                  <span class="mybooking-detail_deposit-price">
                    <%=configuration.formatCurrency(shopping_cart.items[idx].product_deposit_cost)%>
                  </span>
                </div>
              </span>
            </div>
          </div>
        <% } %>

        <div>
          <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Delivery', 'renting_complete', 'mybooking') ?></h5>
          <ul>
            <li class="mybooking-reservation_detail-date">
              <span class="dashicons dashicons-calendar-alt"></span> 
              <%=shopping_cart.date_from_full_format%>
              <% if (configuration.timeToFrom) { %>
                <%=shopping_cart.time_from%>
              <%}%>
            </li>
            <li class="mybooking-reservation_detail-place">
              <%=shopping_cart.pickup_place_customer_translation%>
            </li>
          </ul>
        </div>
        
        <% if (configuration.rentDateSelector === 'date_from_duration') { %>
          <div>
            <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Duration', 'renting_complete', 'mybooking') ?></h5>
            <ul>
              <li class="mybooking-reservation_detail-date"><%=shopping_cart.renting_duration_literal%>
                <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                  <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                    - <%= shopping_cart.turn_description %> 
                  <% } else { %>
                    ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                  <% } %>  
                <% } %>
              </li>
              <% if (configuration.pickupReturnPlace) { %>
                <li class="mybooking-reservation_detail-place"><span class="dashicons dashicons-location"></span><%=shopping_cart.return_place_customer_translation%></li>
              <% } %>
            </ul>
          </div>
        <% } else { %>
          <div>
            <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Collection', 'renting_complete', 'mybooking') ?></h5>
            <ul>
              <li class="mybooking-reservation_detail-date"><%=shopping_cart.date_to_full_format%>
                  <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%>
              </li>
              <% if (configuration.pickupReturnPlace) { %>
                <li class="mybooking-reservation_detail-place"><span class="dashicons dashicons-location"></span><%=shopping_cart.return_place_customer_translation%></li>
              <% } %>
            </ul>
          </div>
        <% } %>

        <!-- Extras and suplements -->

        <ul class="mybooking-detail_extra-list">
          <hr>
          <!-- // Extras -->
          <% if (shopping_cart.extras.length > 0) { %>
            <% for (var idx=0; idx<shopping_cart.extras.length; idx++) { %>
              <li class="mybooking-detail_extra-item">
                <span>
                  <span class="badge badge-primary badge-pill"><%=shopping_cart.extras[idx].quantity%></span>
                  <span class="mybooking-detail_extra-name"><%=shopping_cart.extras[idx].extra_description_customer_translation%></span>
                </span>
                <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
              </li>
            <% } %>
          <% } %>
          <!-- // Suplements -->
          <% if (shopping_cart.time_from_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Pick-up time supplement', 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></span>
          </li>
          <% } %>
          <% if (shopping_cart.pickup_place_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Pick-up place supplement', 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></span>
          </li>
          <% } %>
          <% if (shopping_cart.time_to_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Return time supplement', 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></span>
          </li>
          <% } %>
          <% if (shopping_cart.return_place_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Return place supplement', 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></span>
          </li>
          <% } %>
          <% if (shopping_cart.driver_age_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( "Driver's age supplement", 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></span>
          </li>
          <% } %>
          <% if (shopping_cart.category_supplement_1_cost > 0) { %>
          <li class="mybooking-detail_extra-item">
            <span class="mybooking-detail_extra-name"><?php echo esc_html_x( "Petrol supplement", 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></span>
          </li>
          <% } %>
        </ul>
      </div>
    
    <!-- SINGLE PRODUCT DETAILS -->
    
    <% } else { %>
      <div class="mybooking-reservation_detail-container">

        <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <img class="mybooking-reservation_product-image" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
        <% } %>

        <div class="mybooking-reservation_detail-content">
          <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
            <h2 class="mybooking-reservation_product-name">
              <%=shopping_cart.items[idx].item_description_customer_translation%>
            </h2>

            <!-- Optional external driver + driving license -->
            <% if ((  typeof shopping_cart.optional_external_driver !== '' &&
                      shopping_cart.optional_external_driver) ||
                      (typeof shopping_cart.item_driving_license_type_name !== '' &&
                      shopping_cart.item_driving_license_type_name) ) { %>
                <% if (typeof shopping_cart.optional_external_driver !== '' &&
                      shopping_cart.optional_external_driver) { %>
                        <span class="badge badge-secondary"><%=shopping_cart.optional_external_driver%></span>    
                <% } %>
                <% if (typeof shopping_cart.item_driving_license_type_name !== '' &&
                      shopping_cart.item_driving_license_type_name) { %>
                        <span class="badge badge-secondary"><%=shopping_cart.item_driving_license_type_name%></span>    
                <% } %>
                <br><br>
            <% } %>
            
            <!-- Highlight Message -->
            <% if (shopping_cart.items[idx].highlight_message && shopping_cart.items[idx].highlight_message != '') { %>
              <h3 class="h6 text-muted"><%=shopping_cart.items[idx].highlight_message%></h3>
            <% } %>

            <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Delivery', 'renting_complete', 'mybooking') ?></h5>
            <ul>
              <li class="mybooking-reservation_detail-date">
                <span class="dashicons dashicons-calendar-alt"></span>  
                <%=shopping_cart.date_from_full_format%>
                <% if (configuration.timeToFrom) { %>
                  <%=shopping_cart.time_from%>
                <%}%>
              </li>
              <li class="mybooking-reservation_detail-place">
                <span class="dashicons dashicons-location"></span>
                <%=shopping_cart.pickup_place_customer_translation%>
              </li>
            </ul>

            <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Duration', 'renting_complete', 'mybooking') ?></h5>
              <ul>
                <li class="mybooking-reservation_detail-date">
                  <%=shopping_cart.renting_duration_literal%>
                  <% if ( (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day) || (shopping_cart.days == 0) ) { %>
                    <% if ( typeof shopping_cart.turn_description !== 'undefined' && shopping_cart.turn_description !== null && shopping_cart.turn_description !== '') { %>
                      - <%= shopping_cart.turn_description %> 
                    <% } else { %>
                      ( <%= shopping_cart.time_from %> - <%= shopping_cart.time_to %> )
                    <% } %>
                  <% } %>
                </li>
              </ul>
            <% } else { %>
              <h5 class="mybooking-reservation_detail-title"><?php echo esc_html_x('Collection', 'renting_complete', 'mybooking') ?></h5>
              <ul>
                <li class="mybooking-reservation_detail-date">
                  <span class="dashicons dashicons-calendar-alt"></span>
                  <%=shopping_cart.date_to_full_format%>
                  <% if (configuration.timeToFrom) { %>
                    <%=shopping_cart.time_to%>
                  <%}%>
                </li>
                <li class="mybooking-reservation_detail-place"><span class="dashicons dashicons-location"></span><%=shopping_cart.return_place_customer_translation%></li>
              </ul>

              <!-- Duration -->
              <% if (shopping_cart.days > 0) { %>
                <div class="mybooking-reservation_detail-duration">
                  <%=shopping_cart.days%>
                  <?php echo esc_html( MyBookingEngineContext::getInstance()->getDuration() ) ?>
                </div>
              <% } else if (shopping_cart.hours > 0) { %>
                <div class="mybooking-reservation_detail-duration">
                  <%=shopping_cart.hours%>
                  <?php echo esc_html_x( 'hour(s)', 'renting_complete', 'mybooking' ) ?>
                </div>
              <% } %>
            <% } %>
          <% } %>

          <!-- Product Price -->

          <!-- Offer/Promotion Code Appliance -->
          <% for (var idx=0;idx<shopping_cart.items.length;idx++) { %>
            <% if (shopping_cart.items[idx].item_unit_cost_base != shopping_cart.items[idx].item_unit_cost) { %>
              <span class="mybooking-detail_promotion-item">
                
                <!-- Offer -->
                  <span>
                    <% if (typeof shopping_cart.items[idx].offer_name !== 'undefined' && shopping_cart.items[idx].offer_name !== null && shopping_cart.items[idx].offer_name !== '') { %>
                      <span class="badge badge-info"><%=shopping_cart.items[idx].offer_name%></span>
                      <% if (shopping_cart.items[idx].offer_discount_type === 'percentage' && shopping_cart.items[idx].offer_value !== '') {%>
                        <span class="text-danger"><%=parseInt(shopping_cart.items[idx].offer_value)%>&#37;</span>
                      <% } %>
                    <% } %>
                  </span>

                  <!-- Promotion Code -->
                  <span>
                    <% if (typeof shopping_cart.promotion_code !== 'undefined' && shopping_cart.promotion_code !== '' && typeof shopping_cart.items[idx].promotion_code_value !== 'undefined' && shopping_cart.items.promotion_code_value !== '' && shopping_cart.items[idx].promotion_code_value !== '0.0') { %>
                      <span class="badge badge-success"><%=shopping_cart.promotion_code%></span>
                      <% if (shopping_cart.items[idx].promotion_code_discount_type === 'percentage' && shopping_cart.items[idx].promotion_code !== '') {%>
                        <span class="text-danger"><%=parseInt(shopping_cart.items[idx].promotion_code_value)%>&#37;</span>
                      <% } %>
                    <% } %>
                  </span>

                  <del><%=configuration.formatCurrency(shopping_cart.items[idx].item_unit_cost_base * shopping_cart.items[idx].quantity)%></del>
              </span>
            <% } %>
          <% } %>

          <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>       
            <!-- // Product Price -->
            <div class="mybooking-detail_product-total">
              <span class="mybooking-detail_product-name">
                <%=shopping_cart.items[idx].item_description_customer_translation%>
              </span>
              <span class="mybooking-detail_product-price">
                <%=configuration.formatCurrency(shopping_cart.items[idx].item_cost)%>
              </span>
            </div>
          <% } %>

          <!-- Extras and suplements -->

          <ul class="mybooking-detail_extra-list">
            <!-- // Extras -->
            <% if (shopping_cart.extras.length > 0) { %>
              <% for (var idx=0; idx<shopping_cart.extras.length; idx++) { %>
                <li class="mybooking-detail_extra-item">
                  <span>
                    <span class="badge badge-primary badge-pill"><%=shopping_cart.extras[idx].quantity%></span>
                    <span class="mybooking-detail_extra-name"><%=shopping_cart.extras[idx].extra_description_customer_translation%></span>
                  </span>
                  <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
                </li>
              <% } %>
            <% } %>
            <!-- // Suplements -->
            <% if (shopping_cart.time_from_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Pick-up time supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.pickup_place_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Pick-up place supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.time_to_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Return time supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.return_place_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( 'Return place supplement', 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.driver_age_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( "Driver's age supplement", 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></span>
            </li>
            <% } %>
            <% if (shopping_cart.category_supplement_1_cost > 0) { %>
            <li class="mybooking-detail_extra-item">
              <span class="mybooking-detail_extra-name"><?php echo esc_html_x( "Petrol supplement", 'renting_complete', 'mybooking' ) ?></span>
              <span class="mybooking-detail_extra-price"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></span>
            </li>
            <% } %>
          </ul>
        </div>
      </div>
    <% } %>
  </div>

  <!-- // TOTAL -->

  <div class="mybooking-detail_total-box">
    <span class="mybooking-detail_total-text"><?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?></span>
    <span class="mybooking-detail_total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span>
  </div>

  <!-- // Deposit -->
  <% if ( shopping_cart.product_guarantee_cost > 0 || shopping_cart.product_deposit_cost > 0 || (typeof shopping_cart.driver_age_deposit !== 'undefined' && shopping_cart.driver_age_deposit > 0) || shopping_cart.total_deposit > 0) { %>
    <div class="mybooking-detail_deposit-view">
      <ul class="list-group mybooking-detail_deposit-list">
        <% if (shopping_cart.product_guarantee_cost > 0) { %>
          <li class="mybooking-detail_deposit-item">
            <span class="mybooking-detail_deposit-name"><?php echo esc_html_x( "Guarantee", 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_deposit-price"><%=configuration.formatCurrency(shopping_cart.product_guarantee_cost)%></span>
          </li>
        <% } %>
        <% if (shopping_cart.product_deposit_cost > 0) { %>
          <li class="mybooking-detail_deposit-item">
            <span class="mybooking-detail_deposit-name">
              <?php /* translators: %s: Product Type (Vehicle, Product, ...) */ ?>
              <?php echo wp_kses_post( sprintf( _x( "%s deposit", 'renting_complete', 'mybooking' ), MyBookingEngineContext::getInstance()->getProduct() ) ) ?>
            </span>
            <span class="mybooking-detail_deposit-price"><%=configuration.formatCurrency(shopping_cart.product_deposit_cost)%></span>
          </li>
        <% } %>
        <% if (typeof shopping_cart.driver_age_deposit !== 'undefined' && shopping_cart.driver_age_deposit > 0) { %>
          <li class="mybooking-detail_deposit-item">
            <span class="mybooking-detail_deposit-name"><?php echo esc_html_x( "Driver age deposit", 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_deposit-price"><%=configuration.formatCurrency(shopping_cart.driver_age_deposit)%></span>
          </li>
        <% } %>
        <% if (shopping_cart.total_deposit > 0 && shopping_cart.number_of_deposits > 1) { %>
          <li class="mybooking-detail_deposit-item">
            <span class="mybooking-detail_deposit-name"><?php echo esc_html_x( "Total deposit", 'renting_complete', 'mybooking' ) ?></span>
            <span class="mybooking-detail_deposit-price"><%=configuration.formatCurrency(shopping_cart.total_deposit)%></span>
          </li>
        <% } %>
      </ul>
    </div>
  <% } %>
</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">

  <!-- Age rule applicate  -->
  <% if (shopping_cart.driver_age_rule_description && shopping_cart.driver_age_rule_description !== '') { %>
    <h4 class="reservation-process_title customer_component">
      <?php echo esc_html_x( 'Driver age', 'renting_complete', 'mybooking' ) ?>
    </h4>
    <div class="form-row">
      <div class="form-group col">
        <%= shopping_cart.driver_age_rule_description %>
      </div>
    </div>
  <% } %>

  <% if (configuration.promotionCode) { %>
    <hr>
    <h4 class="reservation-process_title customer_component">
      <?php echo esc_html_x( 'Promotion code', 'renting_complete', 'mybooking' ) ?>
    </h4>
    <div class="form-row">
      <div class="form-group col">
        <input 
          type="text" 
          class="form-control" 
          size="20" 
          maxlength="30" 
          id="promotion_code" 
          placeholder="<?php echo esc_attr_x( 'Promotion code', 'renting_complete', 'mybooking' ) ?>" 
          <%if (shopping_cart.promotion_code){%>value="<%=shopping_cart.promotion_code%>" disabled<%}%>
        >
      </div>
      <div class="form-group col">
        <button 
          class="btn btn-secondary" 
          id="apply_promotion_code_btn"
          <%if (shopping_cart.promotion_code){%>disabled<%}%>
        >
          <?php echo esc_html_x( 'Apply', 'renting_complete', 'mybooking' ) ?>
        </button>
      </div>
    </div>
  <% } %>

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

    <!-- // Payment -->

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

    <!-- // More than one option : request / pay on delivery / pay -->

    <?php $mybooking_engine_privacy_page = get_privacy_policy_url(); ?>

    <% if (selectionOptions > 1) { %>
      <hr>

      <!-- // Request reservation -->

      <div class="mybooking-payment_option">
        <% if (sales_process.can_request) { %>
          <label class="mybooking-payment_option-item" for="complete_action_request_reservation">
            <input type="radio" id="complete_action_request_reservation" name="complete_action" value="request_reservation" class="complete_action">&nbsp;
            <?php echo esc_html_x( 'Request reservation', 'renting_complete', 'mybooking' ) ?>
          </label>
        <% } %>

        <% if (sales_process.can_request) { %>
          <div id="request_reservation_container" <% if (selectionOptions > 1 || !sales_process.can_request) { %>style="display:none"<%}%>>

            <!-- Conditions -->
            <div class="border p-4">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="conditions_read_request_reservation">
                    <input type="checkbox" id="conditions_read_request_reservation" name="conditions_read_request_reservation">&nbsp;
                    <?php if ( empty($args['terms_and_conditions']) ) { ?>
                      <?php echo esc_html_x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                    <?php } else { ?>
                      <?php /* translators: %s: terms and conditions URL */ ?>
                      <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ) ?>
                    <?php } ?>
                  </label>
                </div>
              </div>

              <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
                <!-- Privacy -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="privacy_read_request_reservation">
                      <input type="checkbox" id="privacy_read_request_reservation" name="privacy_read_request_reservation">
                        <?php /* translators: %s: privacy policy URL */ ?>
                        <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                    </label>
                  </div>
                </div>
              <?php } ?>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary">
                    <?php echo esc_html_x( 'Request reservation', 'renting_complete', 'mybooking' ) ?>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <% } %>

        <!-- // Pay on delivery -->
                
        <% if (sales_process.can_pay_on_delivery) { %>
          <label class="mybooking-payment_option-item" for="complete_action_pay_on_delivery">
            <input type="radio" id="complete_action_pay_on_delivery" name="complete_action" value="pay_on_delivery" class="complete_action">&nbsp;
            <?php echo esc_html_x( 'Book now and pay on arrival', 'renting_complete', 'mybooking' ) ?>
          </label>
        <% } %>
        
        <% if (sales_process.can_pay_on_delivery) { %>
          <div id="payment_on_delivery_container" <% if (selectionOptions > 1 || !sales_process.can_pay_on_delivery) { %>style="display:none"<%}%>>
            
          <!-- Conditions -->
            <div class="border p-4">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="conditions_read_payment_on_delivery">
                    <input type="checkbox" id="conditions_read_payment_on_delivery" name="conditions_read_payment_on_delivery">&nbsp;
                    <?php if ( empty($args['terms_and_conditions']) ) { ?>
                      <?php echo esc_html_x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                    <?php } else { ?>
                      <?php /* translators: %s: terms and conditions URL */ ?>
                      <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ) ?>
                    <?php } ?>
                  </label>
                </div>

                <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
                  <!-- Privacy -->
                  <div class="form-group col-md-12">
                    <label for="privacy_read_payment_on_delivery">
                      <input type="checkbox" id="privacy_read_payment_on_delivery" name="privacy_read_payment_on_delivery">
                        <?php /* translators: %s: privacy policy URL */ ?>
                        <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                    </label>
                  </div>
                <?php } ?>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary">
                    <?php echo esc_html_x( 'Confirm', 'renting_complete', 'mybooking' ) ?>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <% } %>

        <!-- // Pay now -->
        
        <% if (sales_process.can_pay) { %>
          <label class="mybooking-payment_option-item" for="complete_action_pay_now">
            <input type="radio" id="complete_action_pay_now" name="complete_action" value="pay_now" class="complete_action">&nbsp;
            <?php echo esc_html_x( 'Book now and pay now', 'renting_complete', 'mybooking' ) ?>
          </label>
        <% } %>
      </div>
    <% } %>

    <% if (sales_process.can_pay) { %>
      <div id="payment_now_container" <% if (selectionOptions > 1 || !sales_process.can_pay) { %>style="display:none"<%}%>>
        <div class="border p-4">
          <span class="mybooking-detail_total-text"><?php echo esc_html_x( "Total", 'renting_complete', 'mybooking' ) ?></span>
          <span class="mybooking-detail_total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></span>
          <hr>
          <h4>
            <%=i18next.t('complete.reservationForm.total_payment', {amount: configuration.formatCurrency(paymentAmount)})%>
          </h4>
          <br>
          
          <!-- Payment amount -->
          <div class="alert alert-warning">
            <%=i18next.t('complete.reservationForm.booking_amount',{amount: configuration.formatCurrency(paymentAmount)})%>
          </div>

          <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
              <div class="alert alert-secondary" role="alert">
                <?php echo wp_kses_post( _x( 'You will be redirected to the <b>payment platform</b> to make the confirmation payment securely. You can use <u>Paypal account</u> or <u>credit card</u> to make the payment.', 'renting_complete', 'mybooking' ) )?>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="payments_paypal_standard">
                    <input type="radio" id="payments_paypal_standard" name="payment_method_select" class="payment_method_select" value="paypal_standard">&nbsp;<?php echo esc_html_x( 'Paypal', 'renting_complete', 'mybooking' ) ?>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>"/>
                  </label>
                </div>
                <div class="form-group col-md-12">
                  <label for="payments_credit_card">
                    <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'renting_complete', 'mybooking' ) ?>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
                  </label>
                </div>
              </div>
              <div id="payment_method_select_error" class="form-row">
              </div>
          <% } else if (sales_process.payment_methods.paypal_standard) { %>
              <div class="alert alert-secondary" role="alert">
                <?php echo wp_kses_post( _x( 'You will be redirected to <b>Paypal payment platform</b> to make the confirmation payment securely. You can use <u>Paypal</u> or <u>credit card</u> to make the payment.', 'renting_complete', 'mybooking' ) ) ?>
              </div>
              <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>"/>
              <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png') ?>"/>
              <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png') ?>"/>
          <% } else if (sales_process.payment_methods.tpv_virtual) { %>
              <div class="alert alert-secondary" role="alert">
                <small><?php echo wp_kses_post( _x( 'You will be redirected to the <b>credit card payment platform</b> to make the confirmation payment securely.' , 'renting_complete', 'mybooking' )  )?></small>
              </div>
              <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
              <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
          <% } %>

          <hr>

          <!-- Conditions -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="conditions_read_pay_now">
                <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;
                <?php if ( empty($args['terms_and_conditions']) ) { ?>
                  <?php echo esc_html_x( 'I have read and hereby accept the conditions of rental', 'renting_complete', 'mybooking' ) ?>
                <?php } else { ?>
                  <?php /* translators: %s: terms and conditions URL */ ?>
                  <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of rental', 'renting_complete', 'mybooking' ), $args['terms_and_conditions'] ) ) ?>
                <?php } ?>
              </label>
            </div>
          </div>

          <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
            <!-- Privacy -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="privacy_read_pay_now">
                  <input type="checkbox" id="privacy_read_pay_now" name="privacy_read_pay_now">
                    <?php /* translators: %s: privacy policy URL */ ?>
                    <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                </label>
              </div>
            </div>
          <?php } ?>

          <div class="form-row">
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-lg btn-primary">
                <%=i18next.t('complete.reservationForm.payment_button',{amount: configuration.formatCurrency(paymentAmount)})%>
              </button>
            </div>
          </div>
        </div>
      </div>
    <% } %>
</script>
