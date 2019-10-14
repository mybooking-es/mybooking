<!-- Product detail -->
<script type="text/tpml" id="script_product_detail">
  <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <h2 class="mb-3 product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
        <% } %>
        <h5>Entrega</h5>
        <ul>
          <li><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></li>
          <li><%=shopping_cart.pickup_place_customer_translation%></li>
        </ul>
        <h5 class="mt-3">Devolución</h5>
        <ul>
          <li><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></li>
          <li><%=shopping_cart.return_place_customer_translation%></li>
        </ul>
  </div>
  <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <div>
              <img src="<%=shopping_cart.items[idx].photo_full%>" alt="" style="max-width: 400px">
          </div>
          <% } %>
  </div>
</script>

<!-- Extra representation -->
<script type="text/template" id="script_detailed_extra">
<div class="card-columns">
  <% for (var idx=0;idx<extras.length;idx++) { %>
    <% var extra = extras[idx]; %>
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <% if (extra.photo_path != null) { %>
              <img src="<%=extra.photo_path%>" class="card-img" alt="..."/>
            <% } %>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><%=extra.name%></h5>
              <% if (extra.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:90px;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary btn-minus-extra"
                        data-value="<%=extra.code%>"
                        data-max-quantity="<%=extra.max_quantity%>">-</button>
                    </div>
                    <% value = (extrasInShoppingCart[extra.code]) ? extrasInShoppingCart[extra.code] : 0; %>
                    <input type="text" id="extra-<%=extra.code%>-quantity"
                        class="form-control disabled text-center" value="<%=value%>"/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-plus-extra"
                        data-value="<%=extra.code%>"
                        data-max-quantity="<%=extra.max_quantity%>">+</button>
                      </div>
                </div>
              <% } else { %>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input extra-checkbox" id="checkboxl<%=extra.code%>" data-value="<%=extra.code%>" <% if (extrasInShoppingCart[extra.code] &&  extrasInShoppingCart[extra.code] > 0) { %> checked="checked" <% } %>>
                  <label class="custom-control-label" for="checkboxl<%=extra.code%>"></label>
                </div>
              <% } %>
              <p class="card-text mt-2"><%= configuration.formatCurrency(extra.unit_price)%></p>
            </div>
          </div>
        </div>
      </div>
  <% } %>
  </div>
</script>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="col sidebar bg-white shadow-bottom py-3 px-3 mt-5 mb-3">
  <h4 class="brand-primary my-3"><?php _e('Detalle de la reserva', 'mybooking') ?></h4>
  <h5><?php _e('Entrega', 'mybooking') ?></h5>
  <p class="color-gray-700"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></p>
  <p class="color-gray-700"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.pickup_place_customer_translation%></p>
  <hr>
  <h5><?php _e('Devolución', 'mybooking') ?></h5>
  <p class="color-gray-700"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></p>
  <p class="color-gray-700"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.return_place_customer_translation%></p>
  <hr>
  <!-- Button trigger modal -->
  <button id="modify_reservation_button" class="btn btn-outline-dark" data-toggle="modal" data-target="#choose_productModal"><?php _e('Modificar reserva', 'mybooking') ?></button>
</div>

<div class="col sidebar bg-white shadow-bottom py-3 px-3">
  <h4 class="brand-primary my-3"><?php _e('Precio', 'mybooking') ?></h4>
  <h5><?php _e('Total producto', 'mybooking') ?></h5>
  <p><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>
  <hr>
  <h5><?php _e('Total extras', 'mybooking') ?></h5>
  <p><%=configuration.formatCurrency(shopping_cart.extras_cost)%></p>
  <hr>
  <h5><?php _e('Total', 'mybooking') ?></h5>
  <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>
</div>
</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="brand-primary my3"><?php _e('Pago', 'mybooking') ?></h4>
  <div class="form-row">
    <div class="form-group col">
      <div class="alert alert-success">
        <p><?php _e('Para confirmar la reserva se requiere una paga y señal del 20% del importe total de la reserva', 'mybooking') ?></p>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-check col">
        <input class="form-check-input  ml-1" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
        <label class="form-check-label ml-4" for="exampleRadios1">
            <?php _e('Sólo solicitud de reserva', 'mybooking') ?>
        </label>
    </div>
  </div>
</script>
