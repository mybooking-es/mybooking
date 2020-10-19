<?php
  /** 
   * The Template for showing the renting select product step - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-choose-product-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
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
          <div class="card-static_image">
              <img src="<%=product.photo%>">
              <i type="button" class="fa fa-info-circle js-product-info-btn" data-toggle="modal" data-target="#infoModal" data-product="<%=product.code%>"></i>
          </div>
          <div class="card-static_body">
            <% if (!configuration.multipleProductsSelection) { %>
              <!-- Price -->
              <div class="card-static_price">
                <h2><%=configuration.formatCurrency(product.price)%></h2>
              </div>
            <% } %>

            <div class="card-static_header">
                <h2 class="card-static_product-name"><%=product.name%></h2>
                <h3 class="card-static_product-short-description"><%=product.short_description%></h3>
            </div>
        
            <% if (product.few_available_units) { %>
              <p class="text-danger card-static_low-availability">
                <?php echo esc_html_x('Few units left!','renting_choose_product','mybooking') ?></p>
            <% } %>

            <% if (!configuration.multipleProductsSelection) { %>
              <!-- Offer name -->
              <% if (product.price != product.base_price) { %>
                <% if (product.offer_discount_type == 'percentage' || product.offer_discount_type == 'amount') { %>
                  <p class="card-static_discount">
                    <span class="badge badge-info"><%=new Number(product.offer_value)%>% <%=product.offer_name%></span><br>
                    <small class="text-muted ml-2"><s><%= configuration.formatCurrency(product.base_price)%></s></small>
                  </p>
                <% } else if (typeof shoppingCart.promotion_code !== 'undefined' && shoppingCart.promotion_code !== null 
                              && shoppingCart.promotion_code !== '' &&
                              (product.promotion_code_discount_type == 'percentage' || product.promotion_code_discount_type == 'amount') ) { %>
                  <p class="card-static_discount">
                    <span class="badge badge-success"><%=new Number(product.promotion_code_value)%>% <%=shoppingCart.promotion_code%></span><br>
                    <small class="text-muted ml-2"><s><%= configuration.formatCurrency(product.base_price)%></s></small>
                  </p>
                <% } %>
              <% } %>
            <% } %>  
            
            <!-- Key characteristics -->
            <div class="card-static_icons">
              <% if (product.key_characteristics) { %> 
                <% for (characteristic in product.key_characteristics) { %>
                  <div class="icon">
                    <% var characteristic_image_path = '<?php echo get_stylesheet_directory_uri() ?>/images/key_characteristics/'+characteristic+'.svg';%>
                    <img src="<%=characteristic_image_path%>" />
                    <span><%=product.key_characteristics[characteristic]%> </span>
                  </div>
                <% } %>
              <% } %>
            </div>
            
            <% if (product.availability) { %>
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
            <% } else { %> 
                  <p class="text-center text-muted">
                  <?php echo esc_html_x( 'Model not available in the office and selected dates', 'renting_choose_product', 'mybooking') ?>
                  </p>
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