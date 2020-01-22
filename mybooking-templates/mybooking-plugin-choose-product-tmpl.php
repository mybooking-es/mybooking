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
    <!-- Summary sidebar -->
    <script type="text/tmpl" id="script_reservation_summary">
      <div class="shadow-bottom reservation-summary-sidebar">
        <h4 class="brand-primary my-3"><?php _e('Detalles de la reserva', 'mybooking') ?></h4>
        <h5><?php _e('Entrega', 'mybooking') ?></h5>
        <p class="color-gray-600"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></p>
        <p class="color-gray-600"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.pickup_place_customer_translation%></p>
        <hr>
        <h5><?php _e('Devolución', 'mybooking') ?></h5>
        <p class="color-gray-600"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></p>
        <p class="color-gray-600"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.return_place_customer_translation%></p>
        <hr>
        <!-- Button trigger modal -->
        <button id="modify_reservation_button" class="btn btn-outline-dark" data-toggle="modal" data-target="#choose_productModal"><?php _e('Modificar reserva', 'mybooking') ?></button>
      </div>
    </script>
    <!-- product grid list -->
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

<!-- summary horizontal sticky -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">
  <div class="reservation-summary-sticky">
    <div class="reservation-summary-item">
      <!-- primer bloque Recogida -->
      <p>
        <span class="fw-700 d-none d-md-block mr-2">Recogida</span>
        <span class="bold-on-mobile"><%=shopping_cart.pickup_place_customer_translation%></span>
      </p>
      <p><%=shopping_cart.date_from_short_format%> - <%=shopping_cart.time_from%></p>
    </div>
    <div class="reservation-summary-separator">
      <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="reservation-summary-item">
      <!-- Devolución (en móbil muestra lugar sólo cuando es diferente) -->
      <% if ( shopping_cart.pickup_place_customer_translation !== shopping_cart.return_place_customer_translation) { %>
        <p>
          <span class="fw-700 d-none d-md-block mr-2">Devolución</span>
          <span class="bold-on-mobile"><%=shopping_cart.return_place_customer_translation%></span>
        </p>
      <% } else { %>
        <p>
          <span class="fw-700 d-none d-md-block mr-2">Devolución</span>
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

<!-- Script detailed product for choose_product -->
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
