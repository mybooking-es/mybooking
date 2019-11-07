<!-- Product detail -->
<script type="text/tpml" id="script_product_detail">
  <div class="product-detail">
    <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
        <h2 class="product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
        <p class="detail-text"><?php _e('Duración del alquiler', 'mybooking') ?>: <%=shopping_cart.days%> día/s</p>
      <% } %>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></li>
        <li><%=shopping_cart.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></li>
        <li><%=shopping_cart.return_place_customer_translation%></li>
      </ul>
      <button id="modify_reservation_button" class="btn btn-outline-dark my-3" data-toggle="modal" data-target="#choose_productModal"><?php _e('Modificar reserva', 'mybooking') ?></button>
    </div>
    <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
      <img class="img-fluid" src="<%=shopping_cart.items[idx].photo_full%>" alt="">
      <% } %>
    </div>
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
<div class="col sidebar bg-white shadow-bottom py-3 px-3 mt-5">
  <h4 class="brand-primary my-3"><?php _e('Precio', 'mybooking') ?></h4>
  <h5>Total producto</h5>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

  <hr>
      <h5><?php _e('Extras', 'mybooking') ?></h5>
      <ul class="list-group">
      <% for (var idx=0; idx<shopping_cart.extras.length; idx++) { %>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span class="extra-name"><%=shopping_cart.extras[idx].extra_description_customer_translation%></span>
          <span class="badge badge-primary badge-pill"><%=shopping_cart.extras[idx].quantity%></span>
          <span class="extra-price"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
        </li>
      <% } %>
  </ul>

  <% if (shopping_cart.extras_cost > 0) { %>
      <hr>
      <h5><?php _e('Total extras', 'mybooking') ?></h5>
      <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.extras_cost)%></p>
  <% } %>

  <% if (shopping_cart.time_from_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento hora de entrega', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></p>
  <% } %>

  <% if (shopping_cart.pickup_place_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento lugar de entrega', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></p>
  <% } %>

  <% if (shopping_cart.time_to_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento hora de devolución', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></p>
  <% } %>

  <% if (shopping_cart.return_place_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento lugar de devolución', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></p>
  <% } %>

  <% if (shopping_cart.driver_age_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento edad del conductor', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.driver_age_cost)%></p>
  <% } %>

  <% if (shopping_cart.category_supplement_1_cost > 0) { %>
  <hr>
  <h6><?php _e('Suplemento combustible', 'mybooking') ?></h6>
  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.category_supplement_1_cost)%></p>
  <% } %>

  <hr>
  <h5 class="brand-primary"><?php _e('Importe total', 'mybooking') ?></h5>
  <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>
</div>
</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
    <% if (sales_process.can_pay && sales_process.can_request) { %>

      <h4 class="brand-primary my3"><?php _e('Confirmar', 'mybooking') ?></h4>
      <br>

      <div class="field">
        <div class="control">
          <label class="radio">
            <input type="radio" id="none" name="payment" value="none" data-payment-method="none">
            <?php _e('Solicitud de reserva', 'mybooking') ?>
          </label>
          <label class="radio">
            <input type="radio" id="credit-card" name="payment" value="redsys256" data-payment-method="redsys256">
            <?php _e('Pagar', 'mybooking') ?>
          </label>
        </div>
      </div>

      <div class="field is-grouped">
        <div class="control">
          <button type="submit" class="button btn-outline-dark my-5"><?php _e('Confirmar', 'mybooking') ?></a>
        </div>
      </div>

    <% } else if (sales_process.can_request) { %>

      <input type="hidden" name="payment" value="none" data-payment-method="none">
      <div class="field is-grouped">
        <div class="control">
          <button type="submit" class="btn btn-outline-dark my-5"><?php _e('Solicitar reserva', 'mybooking') ?></a>
        </div>
      </div>

    <% } else if (sales_process.can_pay) { %>

      <input type="hidden" name="payment" value="redsys256" data-payment-method="redsys256">
      <div class="field is-grouped">
        <div class="control">
          <button type="submit" class="button btn-outline-dark my-5"><?php _e('Pagar', 'mybooking') ?></a>
        </div>
      </div>
    <% } %>
  </script>
