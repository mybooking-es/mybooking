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
        <button id="modify_reservation_button"><i class="fa fa-edit"></i></button>
        </div>
      </div>
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
            <i type="button" class="fa fa-info-circle" data-toggle="modal" data-target="#infoModal"></i>
        </div>
        <div class="card-static_body">
            <div class="card-static_price">
              <h2><%=configuration.formatCurrency(product.price)%></h2>
            </div>
            <div class="card-static_header">
                <h2 class="card-static_product-name"><%=product.name%></h2>
                <h3 class="card-static_product-short-description"><%=product.short_description%></h3>
            </div>
        
            <% if (product.few_available_units) { %>
              <p class="text-danger card-static_low-availability"><?php _e('¡Quedan pocas unidades!') ?></p>
            <% } %>
            <% if (product.price != product.base_price) { %>
              <% if (product.offer_discount_type == 'percentage') { %>
                <p class="card-static_discount"><%=new Number(product.offer_value)%>% <%=product.offer_name%><br>
                <small class="text-muted ml-2"><s><%= configuration.formatCurrency(product.base_price)%></s></small><span class="ml-2"><%=configuration.formatCurrency(product.price)%></span></p>
              <% } %>
            <% } %>
            
            <div class="card-static_icons">
              <% if (product.key_characteristics) { %> 
                <% for (characteristic in product.key_characteristics) { %>
                  <div class="icon">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/key_characteristics/<%=characteristic%>.svg"/>
                    <span><%=product.key_characteristics[characteristic]%> </span>
                  </div>
                <% } %>
              <% } %>
            </div>
            <% if (product.availability) { %>
              <div class="card-static_btn">
                <a class="button btn btn-choose-product" data-product="<%=product.code%>"><?php _e('Seleccionar', 'mybooking') ?></a>
              </div>
              <% } else { %>
              <p><%= choose_product.model_not_available %></p>
            <% } %>
          </div>
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
    <button id="modify_reservation_button"><i class="fa fa-edit"></i></button>
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