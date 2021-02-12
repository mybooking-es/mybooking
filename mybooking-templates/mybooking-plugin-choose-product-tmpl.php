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
              <span><%=shopping_cart.date_from_short_format%> <%=shopping_cart.time_from%></span>
            </div>
          </div>
          <div class="separator"></div>
          <div class="sandwitch-wrapper">
            <div class="reservation-summary_return_place">
              <span class="overflow-ellipsis">
                <%=shopping_cart.return_place_customer_translation%>
              </span>
            </div>
            <div class="reservation-summary_return_date">
              <span><%=shopping_cart.date_to_short_format%> <%=shopping_cart.time_to%></span>
            </div>
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
            <span><%=shopping_cart.date_from_short_format%> <%=shopping_cart.time_from%></span>
          </div>
          <div class="separator"></div>
          <div class="reservation-summary_return_place d-none d-md-flex">
            <span class="overflow-ellipsis">
              <%=shopping_cart.return_place_customer_translation%>
            </span>
          </div>
          <div class="reservation-summary_return_date">
            <span><%=shopping_cart.date_to_short_format%> <%=shopping_cart.time_to%></span>
          </div>
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
            <img class="card-static_image" src="<%=product.photo%>">
            <i type="button" class="card-static_info-button fa fa-info-circle js-product-info-btn" data-toggle="modal" data-target="#infoModal" data-product="<%=product.code%>"></i>
            <% if (product.highlight_message && product.highlight_message != '') { %>
            <div class="card-static_custom-message"><%=product.highlight_message%></div>
            <% } %>
          </div>

          <div class="card-static_header">
            <div class="card-static_price">
              <!-- Price (single product selection) -->
              <% if (!product.exceeds_max && !product.be_less_than_min) { %>
                <% if (!configuration.multipleProductsSelection) { %>
                  <h2 class="card-static_amount"><%=configuration.formatCurrency(product.price)%></h2>
                <% } %>
              <% } %>

              <!-- Taxes included -->
              <?php if ( array_key_exists('show_taxes_included', $args) && ( $args['show_taxes_included'] ) ): ?>
                <span class="card-static_taxes">
                  <?php echo esc_html_x( 'Taxes included', 'renting_choose_product', 'mybooking') ?>
                </span>
              <?php endif; ?>
            </div>

            <!-- Offer (single product selection) -->
            <% if (!product.exceeds_max && !product.be_less_than_min) { %>
              <% if (!configuration.multipleProductsSelection) { %>
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
                      <span class="card-static_discount-badge badge badge-success"><%=new Number(product.promotion_code_value)%>% <%=shoppingCart.promotion_code%></span>
                      <span class="card-static_original-price"><%= configuration.formatCurrency(product.base_price)%></span>
                    </span>
                  <% } %>
                <% } %>
              <% } %>
            <% } %>
          </div>

          <div class="card-static_body">
            <!-- Product name and description -->
            <h2 class="card-static_product-name"><%=product.name%></h2>
            <h3 class="card-static_product-short-description"><%=product.short_description%></h3>

            <!-- Few units warning -->
            <% if (product.few_available_units) { %>
              <span class="card-static_low-availability">
                <?php echo esc_html_x('Few units left!','renting_choose_product','mybooking') ?>
              </span>
            <% } %>
          </div>

          <div class="card-static_footer">
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

            <!-- Exceeds max duration -->
            <% if (product.exceeds_max) { %>
              <p class="text-center" style="margin:0">
                <span class="badge badge-danger w-100 text-center"><%= i18next.t('chooseProduct.max_duration', {duration: i18next.t('common.'+product.price_units, {count: product.max_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></span>
              </p>
            <!-- Less than min duration -->
            <% } else if (product.be_less_than_min) { %>
              <p class="text-center" style="margin:0">
                <span class="badge badge-danger w-100 text-center"><%= i18next.t('chooseProduct.min_duration', {duration: i18next.t('common.'+product.price_units, {count: product.min_value, interpolation: {escapeValue: false}} ), interpolation: {escapeValue: false}}) %></span>
              </p>
            <!-- Available -->
            <% } else if (product.availability) { %>
              <% if (configuration.multipleProductsSelection) { %>
                <!-- Selector -->
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
                <!-- Button -->
                  <div class="card-static_btn">
                    <a class="button btn btn-choose-product"
                      data-product="<%=product.code%>"><?php echo esc_html_x('Book it!', 'renting_choose_product', 'mybooking') ?></a>
                  </div>
              <% } %>
            <!-- Not available -->
            <% } else { %>
                  <span class="card-static_not-available">
                  <?php echo esc_html_x( 'Model not available in the office and selected dates', 'renting_choose_product', 'mybooking') ?>
                  </span>
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
      <div class="col-md-12">
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
        <div class="mt-3 text-muted"><%=product.description%></div>
      </div>
    </div>
  </div>

</script>
