    <!-- Script to show product search -->
    <script type="text/tpml" id="script_detailed_product">
    <% for (var idx=0;idx<products.length; idx++) { %>
      <% var product = products[idx]; %>
      <div class="magic-card">
          <header class="header-card">
              <h1><%=product.name%></h1>
          </header>
          <div class="separator"></div>
          <section class="footer-card">
              <div class="product-wrapper"><img src="<%=product.photo%>" class="product-image"></div>
              <p class="short-description"><%=product.short_description%></p>
              <!-- Offer -->
              <% if (product.price != product.base_price) { %>
                <% if (product.offer_discount_type == 'percentage') { %>
                  <p class="lead mt-2"><%=new Number(product.offer_value)%>% <%=product.offer_name%></p>
                <% } %>
                <p><small class="text-muted"><s><%= configuration.formatCurrency(product.base_price)%></s></small></p>
              <% } %>
              <% if (product.availability) { %>
              <% if (product.few_available_units) { %>
              <p class="text-danger"><?php _e('¡Quedan pocas unidades!') ?></p>
              <% } %>
              <a class="btn btn-light mb30 btn-choose-product" data-product="<%=product.code%>"><?php _e('Seleccionar', 'mybooking') ?></a>
              <% } else { %>
              <p class="has-text-centered"><?php _e('Modelo no disponible en la oficina y fechas seleccionadas', 'mybooking') ?></p>
              <% } %>
              <p class="product-price"><%=configuration.formatCurrency(product.price)%></p>
          </section>
      </div>
      <% } %>
    </script>

    <!-- Script detailed for reservation summary -->
    <script type="text/tmpl" id="script_reservation_summary">
      <div class="bg-white p-3 mb-5 shadow-bottom">
        <h4 class="brand-primary my-3">Detalle de la reserva</h4>
        <h5>Entrega</h5>
        <p class="color-gray-600"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></p>
        <p class="color-gray-600"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.pickup_place_customer_translation%></p>
        <hr>
        <h5>Devolución</h5>
        <p class="color-gray-600"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></p>
        <p class="color-gray-600"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.return_place_customer_translation%></p>
        <hr>
        <!-- Button trigger modal -->
        <button id="modify_reservation_button" class="btn btn-outline-dark" data-toggle="modal" data-target="#choose_productModal"><?php _e('Modificar reserva', 'mybooking') ?></button> 
      </div>
    </script>
