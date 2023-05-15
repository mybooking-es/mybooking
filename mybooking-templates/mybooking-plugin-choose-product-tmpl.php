<?php
  /**
   * The Template for showing the renting select product step - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-choose-product-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>

<!-- Summary Sticky -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">

        <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>

          <div class="reservation-summary-sticky">
            <div class="sandwitch-wrapper">
              <div class="reservation-summary_pickup_place">
                <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
              </div>
              <div class="reservation-summary_pickup_date">
                <span><%=shopping_cart.date_from_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%> <% } %></span>
              </div>
            </div>
            <div class="separator"></div>
            <div class="sandwitch-wrapper">
              <div class="reservation-summary_return_place">
                <span class="overflow-ellipsis">
                  <%=shopping_cart.return_place_customer_translation%>
                </span>
              </div>

              <% if (configuration.rentDateSelector === 'date_from_duration') { %>
                <!-- Duration -->
                <div class="reservation-summary_return_date">
                  <span><%=shopping_cart.renting_duration_literal%></span>
                </div>
              <% } else { %>
                <div class="reservation-summary_return_date">
                  <span><%=shopping_cart.date_to_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><% } %></span>
                </div>
              <% } %>

            </div>
            <div class="modify-button-wrapper push-to-the-right">
              <button id="modify_reservation_button"
                class="modify-button"><i
                  class="d-none d-md-inline mr-2 fas fa-pen"></i>
                  <?php echo esc_html_x( 'Edit', 'renting_choose_product', 'mybooking' ) ?>
              </button>
            </div>
          </div>

        <% } else { %>

          <div class="reservation-summary-sticky">
            <div class="reservation-summary_pickup_place">
              <span class="overflow-ellipsis"><%=shopping_cart.pickup_place_customer_translation%></span>
            </div>
            <div class="reservation-summary_pickup_date">
              <span><%=shopping_cart.date_from_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_from%><%}%></span>
            </div>
            <div class="separator"></div>
            <div class="reservation-summary_return_place d-none d-md-flex">
              <span class="overflow-ellipsis">
                <%=shopping_cart.return_place_customer_translation%>
              </span>
            </div>

            <% if (configuration.rentDateSelector === 'date_from_duration') { %>
              <!-- Duration -->
              <div class="reservation-summary_return_date">
                <% if (typeof shopping_cart.half_day !== 'undefined' && shopping_cart.half_day && halfDayTurns && halfDayTurns.length > 0) { %>
                  <!-- Show the turns -->
                  <form name="mybooking-choose-product_duration-form" class="form-inline">
                    <% for (var idx=0; idx<halfDayTurns.length; idx++) { %>
                      <input type="radio" class="mybooking-summary-duration-turn"
                             name="turn" value="<%=halfDayTurns[idx].time_from%>-<%=halfDayTurns[idx].time_to%>"
                        <% if (shopping_cart.time_from === halfDayTurns[idx].time_from &&
                               shopping_cart.time_to === halfDayTurns[idx].time_to) {%>checked<%}%>>
                        <% if (halfDayTurns[idx].name && halfDayTurns[idx].name !== '') { %>
                          &nbsp;<%=halfDayTurns[idx].name%>
                        <% } else { %> 
                          <%=halfDayTurns[idx].time_from%>-<%=halfDayTurns[idx].time_to%>
                        <% } %>
                      </input>&nbsp;
                    <% } %>
                  </form>
                <% } %>
                &nbsp;
                <span><%=shopping_cart.renting_duration_literal%></span>
              </div>
            <% } else { %>
              <!-- // Date/Time to -->
              <div class="reservation-summary_return_date">
                <span><%=shopping_cart.date_to_short_format%> <% if (configuration.timeToFrom) { %><%=shopping_cart.time_to%><%}%></span>
              </div>
            <% } %>

            <div class="modify-button-wrapper">
              <button id="modify_reservation_button"
                class="modify-button"><i class="d-none d-lg-inline mr-2 fas fa-pen"></i>
                <?php echo esc_html_x( 'Edit', 'renting_choose_product', 'mybooking' ) ?>
              </button>
            </div>
          </div>

        <% } %>
  </div>
</script>


<!-- Static cards -->
<script type="text/tpml" id="script_detailed_product">
  <div class="cards-static-container">
    <% for (var idx=0;idx<products.length; idx++) { %>
      <% var product = products[idx]; %>
      <div class="card-static-wrapper">
        <div class="card-static">

          <div class="card-static_image-container">
            <!-- // Few units warning -->
            <% if (product.few_available_units) { %>
              <span class="card-static_low-availability">
                <?php echo esc_html_x('Few units left!','renting_choose_product','mybooking') ?>
              </span>
            <% } %>
            
            <span class="mybooking-card_info-button js-product-info-btn" data-toggle="modal" data-target="#infoModal" data-product="<%=product.code%>">
              <span class="dashicons dashicons-plus-alt"></span> INFO
            </span>

            <img class="card-static_image" src="<%=product.full_photo%>">

            <% if (product.highlight_message && product.highlight_message != '') { %>
              <div class="card-static_custom-message"><%=product.highlight_message%></div>
            <% } %>
          </div>

          <div class="card-static_header">
            <div class="card-static_price">
              <!-- // Price (single product selection) -->
              <!-- // Added category supplements -->
              <% if (!product.exceeds_max && !product.be_less_than_min) { %>
                <% if (!configuration.multipleProductsSelection && (product.availability || !configuration.hidePriceIfNotAvailable)) { %>
                  <h2 class="card-static_amount"><%=configuration.formatCurrency(+product.price +
                      (+product.category_supplement_1_cost || 0) +
                      (+product.category_supplement_2_cost || 0) +
                      (+product.category_supplement_3_cost || 0))%>
                  </h2>
                <% } %>
              <% } %>
              <!-- // Taxes included -->
              <?php if ( array_key_exists('show_taxes_included', $args) && ( $args['show_taxes_included'] ) ): ?>
                <span class="card-static_taxes">
                  <?php echo esc_html_x( 'Taxes included', 'renting_choose_product', 'mybooking') ?>
                </span>
              <?php endif; ?>
            </div>

            <!-- // Offer (single product selection) -->
            <% if (!product.exceeds_max && !product.be_less_than_min) { %>
              <% if (!configuration.multipleProductsSelection && (product.availability || !configuration.hidePriceIfNotAvailable) ) { %>
                <% if (product.price != product.base_price) { %>
                  <% if (product.offer_discount_type == 'percentage' || product.offer_discount_type == 'amount') { %>
                    <span class="card-static_discount">
                      <span class="card-static_discount-badge badge badge-info"><%=new Number(product.offer_value)%>% <%=product.offer_name%></span>
                      <span class="card-static_original-price"><%= configuration.formatCurrency(product.base_price)%></span>
                    </span>
                  <% } else if (typeof shoppingCart.promotion_code !== 'undefined' && shoppingCart.promotion_code !== null
                                && shoppingCart.promotion_code !== '' &&
                                (product.promotion_code_discount_type == 'percentage' || product.promotion_code_discount_type == 'amount') ) { %>
                    <span class="card-static_discount">
                      <span class="card-static_discount-badge badge badge-info"><%=new Number(product.promotion_code_value)%>% <%=shoppingCart.promotion_code%></span>
                      <span class="card-static_original-price"><%= configuration.formatCurrency(product.base_price)%></span>
                    </span>
                  <% } %>
                <% } %>
              <% } %>
            <% } %>
          </div>

          <div class="card-static_body">
            <!-- // Product name and description -->
            <h2 class="card-static_product-name">
              <%=product.name%>
            </h2>
            <h3 class="card-static_product-short-description">
             <%=product.short_description%>
            </h3>

            <% if (+product.category_supplement_1_cost > 0) { %>
            <div class="card-static_price_supplement p-b-1">
              <div class="card-static_price_supplement_price">
                <small><b><%=configuration.formatCurrency(product.price)%></b>&nbsp;<?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() )?></small>
              </div>
              <div class="card-static_price_supplement_supplement_1">
                <small><b><%=configuration.formatCurrency(product.category_supplement_1_cost)%></b>&nbsp;<?php echo esc_html_x( "Petrol supplement", 'renting_complete', 'mybooking' ) ?></small>
              </div>
            </div>
            <% } %>

            <% if ((product.characteristic_length && product.characteristic_length != 0) ||
                (product.characteristic_width && product.characteristic_width != 0) ||
                (product.characteristic_height && product.characteristic_height != 0) || 
                (product.optional_external_driver && product.optional_external_driver != '')) { %>
                <div class="mybooking-product_detailed_characteristics">
                  <!-- Length Eslora -->
                  <% if (product.characteristic_length && product.characteristic_length != 0) { %>
                    <span class="characteristics-text">
                      <small><?php echo esc_html( MyBookingEngineContext::getInstance()->getLength() ) ?> <%=product.characteristic_length%> m.</small>
                    </span>
                  <% } %>
                  <!-- Width Manga -->
                  <% if (product.characteristic_width && product.characteristic_width != 0) { %>
                    <span class="characteristics-text"><small><?php echo esc_html( MyBookingEngineContext::getInstance()->getWidth() ) ?> <%=product.characteristic_width%> m.</small></span>
                  <% } %>
                  <!-- Height Calado -->
                  <% if (product.characteristic_height && product.characteristic_height != 0) { %>
                    <span class="characteristics-text"><small><?php echo esc_html( MyBookingEngineContext::getInstance()->getHeight() ) ?> <%=product.characteristic_height%> m.</small></span>
                  <% } %>
                </div>
                <div class="mybooking-product_detailed_characteristics">
                  <!-- Optional external driver (skipper) -->
                  <% if (product.optional_external_driver && product.optional_external_driver != '') { %>
                    <span class="characteristics-text badge badge-secondary">
                      <%=product.optional_external_driver_name%>
                  </span>
                  <% } %>
                  <!-- Driving license -->
                  <% if (product.optional_external_driver && product.optional_external_driver !== 'required' && 
                         product.driving_license_type_name && product.driving_license_type_name !== '') { %>
                    <span class="characteristics-text badge badge-secondary">
                      <%=product.driving_license_type_name%>
                    </span>
                  <% } %>
                </div>
            <% } %>
          </div>

          <div class="card-static_footer <% if (product.availability && product.variants_enabled) { %>mybooking-product_variant_footer<% } %>">
            <!-- Key characteristics -->
            <div class="card-static_icons">
              <% if (product.key_characteristics) { %>
                <% for (characteristic in product.key_characteristics) { %>
                  <div class="icon">
                    <% var characteristic_image_path = '<?php echo esc_url( get_stylesheet_directory_uri().'/images/key_characteristics/' ) ?>'+characteristic+'.svg'; %>
                    <img src="<%=characteristic_image_path%>" />
                    <span><%=product.key_characteristics[characteristic]%> </span>
                  </div>
                <% } %>
              <% } %>
            </div>

            <!-- // Exceeds max duration -->
            <% if (product.exceeds_max) { %>
              <div class="mybooking-card_product-availability-msg">
                <%= i18next.t('chooseProduct.max_duration', {duration: i18next.t('common.'+product.price_units, {count: product.max_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %>
              </div>

            <!-- // Less than min duration -->
            <% } else if (product.be_less_than_min) { %>
              <div class="mybooking-card_product-availability-msg">
                <%= i18next.t('chooseProduct.min_duration', {duration: i18next.t('common.'+product.price_units, {count: product.min_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %>
              </div>

            <!-- // Available -->
            <% } else if (product.availability) { %>
              <% if (product.variants_enabled) { %>
                <div class="product-variant-resume" data-product-code="<%=product.code%>" style="margin: 0.5rem; 0"></div>
                <!-- // Button -->
                <div class="card-static_btn">
                  <a class="button btn btn-choose-variant" data-toggle="modal" data-target="#infoModal" data-product="<%=product.code%>"><% if (configuration.multipleProductsSelection) { %><?php echo esc_html_x('Select units', 'renting_choose_product', 'mybooking') ?><% } else { %><?php echo esc_html_x('Select options', 'renting_choose_product', 'mybooking') ?><% } %></a>
                </div>
              <% } else { %>
                <% if (configuration.multipleProductsSelection) { %>
                  <!-- // Selector -->
                  <div class="car-listing-selector">
                    <select class="form-control select-choose-product" data-value="<%=product.code%>">
                      <option value="0"><%=i18next.t('chooseProduct.selectUnits')%></option>
                      <% for (var idx2=1;idx2<=(product.available);idx2++) { %>
                      <option value="<%=idx2%>"
                        <% if (shoppingCartProductQuantities[product.code] && idx2 == shoppingCartProductQuantities[product.code]) { %>
                        selected="selected" <%}%>
                        ><%=i18next.t('chooseProduct.units', {count: idx2})%>
                        (<%= configuration.formatCurrency(product.price * idx2) %>) </option>
                      <% } %>
                    </select>
                  </div>
                <% } else { %>
                  <!-- // Button -->
                  <div class="card-static_btn">
                    <a class="button btn btn-choose-product"
                      data-product="<%=product.code%>"><?php echo esc_html_x('Book it!', 'renting_choose_product', 'mybooking') ?></a>
                  </div>
                <% } %>
              <% } %>

            <!-- // Not available -->
            <% } else { %>
              <div class="mybooking-card_product-availability-msg">
                <?php echo esc_html( MyBookingEngineContext::getInstance()->getNotAvailableMessage() ) ?>
              </div>
            <% } %>

          </div>
        </div>
      </div>
    <% } %>
  </div>

  <% if (configuration.multipleProductsSelection) { %>
    <div class="container pb-3">
      <div class="row">
        <div class="col-md-12">
          <button id="go_to_complete"
            class="btn btn-primary"><?php echo esc_html_x( 'Next', 'renting_choose_product', 'mybooking') ?></button>
        </div>
      </div>
    </div>
  <% } %>

  </script>

<!-- Script that shows the product detail -->
<script type="text/tmpl" id="script_product_modal">

  <div class="container">
    <div class="row">
      <div class="mybooking-modal_image-container col-md-7">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <% for (var idx=0; idx<product.photos.length; idx++) { %>
            <div class="carousel-item <% if (idx==0) {%>active<%}%>">
              <img class="d-block w-100" src="<%=product.photos[idx].full_photo_path%>" alt="<%=product.name%>">
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
      </div>
      <div class="mybooking-modal_info-container col-md-5">
        <div class="mybooking-modal_product-description">
          <%=product.short_description%>
        </div>
        <div class="mybooking-modal_product-short-description">
          <%=product.description%>
        </div>
      </div>
    </div>
  </div>

</script>
<!-- Script that shows the product variant selection -->   
<script type="text/tpml" id="script_variant_product_resume">
  <div class="card-static_variant_resume__container">
    <div class="card-static_variant_resume__container_inside">
      <% for (var idxV=0;idxV<variantsSelected.length;idxV++) { %>
        <div class="card-static_variant_resume__box"><span class="card-static_variant_resume__box_inside"><%= variantsSelected[idxV]['quantity'] %></span> <span class="card-static_variant_resume__box_inside"><%= variantsSelected[idxV]['name'] %></span></div>
      <% } %>
    </div>
    <% if (total > 0) { %>
    <strong><span class="float-right"><%=configuration.formatCurrency(total)%></span></strong>
    <% } %>
  </div>
</script>
<script type="text/tpml" id="script_variant_product">
  <form name="variant_product_form">
    <div id="variant_product_selectors" class="row">
      <% if (!configuration.multipleProductsSelection) { %>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <select name="<%= product.code %>" id="<%= product.code %>" class="form-control variant_product_selector">
              <option value="0"><?php echo esc_html_x( 'Select', 'renting_choose_product', 'mybooking') ?></option>
              <% for (var idxV=0;idxV<variants.length;idxV++) { %>
                <% var variant = variants[idxV]; %>
                <option value="<%= variant.code %>" <% if  (variantsSelected[variant.code]) { %>selected<% } %>><%= variant.variant_name %> - <%=configuration.formatCurrency(variant.price)%></option>
              <% } %>
            </select>
          </div>
        </div>
      <% } else { %>
        <% for (var idxV=0;idxV<variants.length;idxV++) { %>
          <% var variant = variants[idxV]; %>
          <div class="col-xs-12 col-sm-4">
            <div class="form-group">
              <label for="<%= variant.code %>">
                <%= variant.variant_name %>
              </label>
              <select name="<%= variant.code %>" id="<%= variant.code %>" <% if  (variant.available < 1) { %>disabled<% } %> class="form-control variant_product_selector">
                <option value="0"><?php echo esc_html_x( 'Select units', 'renting_choose_product', 'mybooking') ?></option>
                <% for (var idxVO=1;idxVO<=variant.available;idxVO++) { %>
                  <option value="<%= idxVO %>"  <% if  (variantsSelected[variant.code] && variantsSelected[variant.code] === idxVO) { %>selected<% } %>><%= idxVO %> <% if  (idxVO > 1) { %><?php echo esc_html_x( 'units', 'renting_choose_product', 'mybooking') ?><% } else { %><?php echo esc_html_x( 'unit', 'renting_choose_product', 'mybooking') ?><% } %> - <%=configuration.formatCurrency(variant.price * idxVO)%></option>
                <% } %>
                </select>
            </div>
          </div>
        <% } %>
      <% } %>
    </div>
    <hr>
    <div class="row">
      <h4 class="col-xs-12 col-sm-6">Total</h4>
      <h4 id="variant_product_total" class="col-xs-12 col-sm-6 text-right">
        <span id="variant_product_total_quantity"> <%=configuration.formatCurrency(total)%></span>
      </h4>
    </div>
  </form>
</script>
