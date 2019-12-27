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
<!-- Script to show product search -->
<script type="text/tpml" id="script_detailed_product">
<% for (var idx=0;idx<products.length; idx++) { %>
  <% var product = products[idx]; %>
  <div class="magic-card">
  <header class="header-card">
          <div class="product-title">
            <p class="product-name"><%=product.name%></p>
            <p class="product-short-description"><%=product.short_description%></p>
          </div>
        </header>
      <div class="separator"></div>
      <section class="footer-card text-center">
        <div class="img-wrapper">
      <img src="<%=product.photo%>" class="product-image"></div>
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

          <div class="abajo">
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
  <% } %>
</script>

<!-- Script detailed for reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="bg-white p-3 mb-5 shadow-bottom">
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
