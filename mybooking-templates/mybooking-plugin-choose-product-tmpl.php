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

<!-- Summary Sticky -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">
      <div class="reservation-summary-sticky">
        <div class="reservation-summary-item">
          <!-- primer bloque Recogida -->
          <p>
            <span class="d-none d-lg-block mr-2 place-title"><?php _e('Recogida','mybooking') ?></span>
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
              <span class="d-none d-lg-block mr-2 place-title"><?php _e('Devolución','mybooking') ?></span>
              <span class="bold-on-mobile"><%=shopping_cart.return_place_customer_translation%></span>
            </p>
          <% } else { %>
            <p>
              <span class="fw-700 d-none d-lg-block mr-2"><?php _e('Devolución','mybooking') ?></span>
              <span class="bold-on-mobile d-none d-lg-block"><%=shopping_cart.return_place_customer_translation%></span>
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
  <div class="bg-cards-color">
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
                    <% var characteristic_image_path = '<?php echo get_stylesheet_directory_uri() ?>/images/key_characteristics/'+characteristic+'.svg';%>
                    <img src="<%=characteristic_image_path%>" />
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
              <p><?php _e('Modelo no disponible en la oficina y fechas seleccionadas', 'mybooking') ?></p>
            <% } %>
          </div>
        </div>
      </div>
      <% } %>
    </div>
    </div>
      
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