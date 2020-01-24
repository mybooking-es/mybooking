<?php
/**
*   PLUGIN CHOOSE TEMPLATE
*   ----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $list_layout = get_option('global_list_layout');
  if ($list_layout == 0) { ?>

    <!-- Summary Sticky -->
    <script type="text/tmpl" id="script_reservation_summary">
      <div class="reservation-summary-sticky-wrapper">
      <div class="reservation-summary-sticky">
        <div class="reservation-summary-item">
          <!-- primer bloque Recogida -->
          <p>
            <span class="fw-700 d-none d-md-block mr-2"><?php _e('Recogida','mybooking') ?></span>
            <span class="bold-on-mobile"><%=shopping_cart.pickup_place_customer_translation%></span>
          </p>
          <p><%=shopping_cart.date_from_short_format%> - <%=shopping_cart.time_from%></p>
        </div>
        <div class="reservation-summary-separator">
          <i class="fa fa-long-arrow-right"></i>
        </div>
        <div class="reservation-summary-item">
          <!-- Devolución (en móbil muestra lugar sólo cuando es diferente) -->
          <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>
            <p>
              <span class="fw-700 d-none d-md-block mr-2"><?php _e('Devolución','mybooking') ?></span>
              <span class="bold-on-mobile"><%=shopping_cart.return_place_customer_translation%></span>
            </p>
          <% } else { %>
            <p>
              <span class="fw-700 d-none d-md-block mr-2"><?php _e('Devolución','mybooking') ?></span>
              <span class="bold-on-mobile d-none d-md-block"><%=shopping_cart.return_place_customer_translation%></span>
            </p>
          <% } %>
          <p><%=shopping_cart.date_to_short_format%> - <%=shopping_cart.time_to%></p>
        </div>
        <!-- Button trigger modal -->
        <div class="modify-button">
        <button id="modify_reservation_button" data-toggle="modal" data-target="#choose_productModal"><i class="fa fa-edit"></i></button>
        </div>
      </div>
    </div>
    </script>

    <!-- Product Grid -->
    <script type="text/tpml" id="script_detailed_product">
      <div class="magic-cards-container">
        <% for (var idx=0;idx<products.length; idx++) { %>
          <% var product = products[idx]; %>
          <div class="magic-card-wrapper">
          <div class="magic-card">
              <header class="magic-card-header">
                <div class="product-name-and-short-description">
                  <p class="product-name"><%=product.name%></p>
                  <p class="product-short-description"><%=product.short_description%></p>
                </div>
              </header>
              <div class="separator"></div>
              <section class="footer-card">
                <div class="img-wrapper">
                  <img src="<%=product.photo%>" class="product-image">
                </div>
                  <div class="variable-content">
                    <% if (product.price != product.base_price) { %>
                      <% if (product.offer_discount_type == 'percentage') { %>
                        <p class="offer"><%=new Number(product.offer_value)%>% <%=product.offer_name%><span><small class="text-muted ml-2"><s><%= configuration.formatCurrency(product.base_price)%></s></small></span></p>
                      <% } %>
                    <% } %>
                  </div>

                  <% if (product.key_characteristics) { %>
                      <div class="key-characteristics">
                        <% for (characteristic in product.key_characteristics) { %>
                        <div class="key-icon">
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/key_characteristics/<%=characteristic%>.svg"/>
                          <p><%=product.key_characteristics[characteristic]%></p>
                        </div>

                        <% } %>
                      </div>
                  <% } %>

                  <div class="push-down">
                  <p class="product-price"><%=configuration.formatCurrency(product.price)%></p>

                  <% if (product.availability) { %>
                  <a class="btn btn-dark btn-choose-product" data-product="<%=product.code%>"><?php _e('Seleccionar', 'mybooking') ?></a>
                  <% } else { %>
                  <div class="not-available"><?php _e('Modelo no disponible en la oficina y fechas seleccionadas', 'mybooking') ?></div>
                  <% } %>

                  <% if (product.few_available_units) { %>
                    <p class="text-danger mt-3"><?php _e('¡Quedan pocas unidades!') ?></p>
                  <% } %>

                  </div>
              </section>
          </div>
        </div>
          <% } %>
      </div>
    </script>
<?php } else { ?>

<!-- Summary Sticky -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">
  <div class="reservation-summary-sticky">
    <div class="reservation-summary-item">
      <!-- primer bloque Recogida -->
      <p>
        <span class="fw-700 d-none d-md-block mr-2"><?php _e('Recogida','mybooking') ?></span>
        <span class="bold-on-mobile"><%=shopping_cart.pickup_place_customer_translation%></span>
      </p>
      <p><%=shopping_cart.date_from_short_format%> - <%=shopping_cart.time_from%></p>
    </div>
    <div class="reservation-summary-separator">
      <i class="fa fa-long-arrow-right"></i>
    </div>
    <div class="reservation-summary-item">
      <!-- Devolución (en móbil muestra lugar sólo cuando es diferente) -->
      <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>
        <p>
          <span class="fw-700 d-none d-md-block mr-2"><?php _e('Devolución','mybooking') ?></span>
          <span class="bold-on-mobile"><%=shopping_cart.return_place_customer_translation%></span>
        </p>
      <% } else { %>
        <p>
          <span class="fw-700 d-none d-md-block mr-2"><?php _e('Devolución','mybooking') ?></span>
          <span class="bold-on-mobile d-none d-md-block"><%=shopping_cart.return_place_customer_translation%></span>
        </p>
      <% } %>
      <p><%=shopping_cart.date_to_short_format%> - <%=shopping_cart.time_to%></p>
    </div>
    <!-- Button trigger modal -->
    <div class="modify-button">
    <button id="modify_reservation_button" data-toggle="modal" data-target="#choose_productModal"><i class="fa fa-edit"></i></button>
    </div>
  </div>
</div>
</script>

<!-- Product List -->
<script type="text/tpml" id="script_detailed_product">
  <div class="magic-card-horizontal-wrapper">
  <% for (var idx=0;idx<products.length; idx++) { %>
    <% var product = products[idx]; %>
    <div class="magic-card-horizontal">
      <div class="magic-card-horizontal_image">
          <img src="<%=product.photo%>">
      </div>
      <div class="magic-card-horizontal_body">
        <div class="magic-card-horizontal_body-left">
          <div>
          <h6 class="row-card-product-name"><%=product.name%></h6>
          <h7 class="row-card-product-short-description"><%=product.short_description%></h7>
          </div>
          <% if (product.price != product.base_price) { %>
            <% if (product.offer_discount_type == 'percentage') { %>
              <p class="color-gray-500"><%=new Number(product.offer_value)%>% <%=product.offer_name%><span><small class="text-muted ml-2"><s><%= configuration.formatCurrency(product.base_price)%></s></small></span></p>
            <% } %>
          <% } %>
          <% if (product.few_available_units) { %>
            <p class="text-danger mt-3"><?php _e('¡Quedan pocas unidades!', 'mybooking') ?></p>
          <% } %>
          <div class="row-card-price">
            <h2><%=configuration.formatCurrency(product.price)%></h2>
          </div>
        </div>
        <div class="magic-card-horizontal_body-right">
          <div class="magic-card-horizontal_icons">
            <% if (product.key_characteristics) { %>
              <% for (characteristic in product.key_characteristics) { %>
                <div class="magic-icon">
                  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/key_characteristics/<%=characteristic%>.svg"/>
                  <span><%=product.key_characteristics[characteristic]%> </span>
                </div>
              <% } %>
            <% } %>
          </div>
          <% if (product.availability) { %>
            <a class="magic-button btn btn-choose-product" data-product="<%=product.code%>"><?php _e('Selecccionar', 'mybooking') ?></a>
            <% } else { %>
            <p><?php _e('Modelo no disponible en la oficina y fechas seleccionadas', 'mybooking') ?></p>
          <% } %>
        </div>
      </div>
    </div>
    <% } %>
  </div>
</script>

<?php } ?>
